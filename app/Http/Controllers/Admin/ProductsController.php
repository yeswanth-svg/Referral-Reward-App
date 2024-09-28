<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NewServiceAdded;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Credits;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\NewProductAdded;
use Illuminate\Support\Facades\Mail;
use App\Models\User;


class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:products|max:255',
            'short_description' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name))) . '-' . time();

        $product = new Product();
        $product->name = $request->name;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->price = $request->price;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalName();
            $destinationPath = public_path('/uploads/products');
            $image->move($destinationPath, $name);
            $product->image = $name;
        }

        $product->slug = $slug;
        $product->save();

        // Store initial credit for the product (credit_value = 0)

        Credits::create([
            'product_id' => $product->id,
            'service_name' => $product->name,
            'credit_value' => 0,
        ]);

        // Notify all users about the new product
        // Notify all users about the new product
        $users = User::all();
        foreach ($users as $user) {
            // Ensure you're passing the product instance here
            Mail::to($user->email)->send(new NewServiceAdded($user, $product));
        }

        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function update(Request $request)
    {
        // Validate the request data




        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'short_description' => 'required',
            'description' => 'required',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Determine the status
        $status = isset($request->status) ? 1 : 0;

        // Generate the slug
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name))) . '-' . time();

        // Find the product by ID
        $product = Product::find($request->id);


        // Check if the product exists
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found!');
        }

        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalName();
            $destinationPath = public_path('/uploads/products');
            $image->move($destinationPath, $name);

            // Add image name to the update data
            $productData['image'] = $name;
        }

        // Prepare the data to update
        $productData = [
            'name' => $request->name,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'price' => $request->price,
            'slug' => $slug,
            'status' => $status,
        ];

        // Update the product
        $product->update($productData);



        // Update credit value in the credits table if necessary
        $credit = Credits::where('product_id', $product->id)->first();
        if ($credit) {
            $credit->update([

                'service_name' => $product->name,
            ]);
        }

        return redirect()->back()->with('success', 'Product updated successfully!');
    }

    public function delete(Request $request)
    {
        // dd($request->all());
        $product = Product::find($request->id);
        if ($product) {
            $product->delete();
            return redirect()->back()->with('success', 'Product deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Product not found!');
        }
    }
}
