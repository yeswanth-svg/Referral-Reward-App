<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Leads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.users.index', compact('users'));
    }

    public function view($id)
    {
        $user = User::find($id);
        // Fetch the leads related to this user
        $referrals = $user->leads; // Assuming you have a 'leads' relationship defined in the User model

        // Alternatively, you could also do a query if there's no relationship
        // $leads = Leads::where('user_id', $id)->orderBy('created_at', 'desc')->get();

        return view('admin.users.view', compact('user', 'referrals'));
    }



    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/profile');
            $image->move($destinationPath, $name);
            $user->image = $name;
        }

        $user->save();

        return redirect()->route('admin.users.index', $user->id)->with('success', 'User updated successfully!');
    }




    public function activate(Request $request)
    {
        // dd($request->all());
        $user = User::find($request->id);
        $user->status = 1;
        $user->save();
        return redirect()->back()->with('success', 'User is activated successfully');
    }
    public function deactivate(Request $request)
    {
        // dd($request->all());
        $user = User::find($request->id);
        $user->status = 0;
        $user->save();
        return redirect()->back()->with('success', 'User is deactivated successfully');
    }
    public function delete(Request $request)
    {
        // dd($request->all());
        $user = User::find($request->id);
        $user->delete();
        return redirect()->back()->with('success', 'User is deleted successfully');
    }
}
