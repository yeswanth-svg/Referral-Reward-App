<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserEarning;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Affiliate;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'area' => ['required', 'string',],
            'city' => ['required', 'string',],
            'aadhar_number' => ['required', 'numeric', 'min:12',],
        ]);
    }

    protected function create(array $data)
    {
        // Validate the request data including the image
        $request = request();  // Get the request instance
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'area' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'aadhar_number' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  // Validate image
        ]);

        // Create the user record
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'referral_code' => $this->generateReferralCode(),
            'area' => $data['area'],
            'city' => $data['city'],
            'aadhar_number' => $data['aadhar_number'],
        ]);

        // Check if an image is uploaded
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            // Move the file to the 'uploads/profile/' directory
            $file->move(public_path('uploads/profile/'), $filename);

            // Save the image path to the user's record
            $user->image = $filename;
            $user->save();
        }



        return $user;
    }




    protected function registered(Request $request, $user)
    {
        $this->moveItemsFromSessionToDatabase($user->id);
        if (session()->has('checkout')) {
            return redirect()->route('checkout');
        }
        // if user doesn't have a record in UserEarning then create one
        if (!UserEarning::where('user_id', $user->id)->exists()) {
            $userEarning = new UserEarning([
                'user_id' => $user->id,
            ]);
            $userEarning->save();
        }
    }

    protected function moveItemsFromSessionToDatabase($userId)
    {
        $cart = session()->get('cart');

        if ($cart) {
            foreach ($cart as $productId => $item) {
                $existingCartItem = Cart::where('user_id', $userId)
                    ->where('product_id', $item['product_id'])
                    ->first();

                if ($existingCartItem) {
                    $existingCartItem->quantity += $item['quantity'];
                    $existingCartItem->save();
                } else {
                    $newCartItem = new Cart([
                        'user_id' => $userId,
                        'product_id' => $item['product_id'],
                        'quantity' => $item['quantity'],
                    ]);
                    $newCartItem->save();
                }
            }
            session()->forget('cart');
        }
    }

    protected function generateReferralCode()
    {
        do {
            $referralCode = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
        } while (User::where('referral_code', $referralCode)->exists());

        return $referralCode;
    }

    protected function getParentId($referralCode)
    {
        $parentUser = User::where('referral_code', $referralCode)->first();
        return $parentUser ? $parentUser->id : null;
    }
}
