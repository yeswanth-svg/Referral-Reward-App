<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Leads;
use App\Models\User;
use App\Models\Credits;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function editPassword(Request $request)
    {
        // dd($request->all());
        $user = Admin::find(Auth::guard('admin')->user()->id);
        if ($request->password != $request->c_password) {
            return redirect()->back()->with('error', 'Password and Confirm Password does not match');
        }
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->back()->with('success', 'Your password is updated successfully');
    }
    public function editProfile(Request $request)
    {
        // dd($request->all());
        $user = Admin::find(Auth::guard('admin')->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        if ($request->hasFile('profile_img')) {
            $file = $request->file('profile_img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/profile/', $filename);
            $user->image = $filename;
            $user->save();
        }
        return redirect()->back()->with('success', 'Your profile is updated successfully');
    }
    public function profile()
    {
        return view('admin.profile');
    }


    public function referral_history()
    {
        // Eager load the user relationship to avoid N+1 problem
        $referrals = Leads::with('user')->orderBy('lead_id', 'desc')->get();

        return view('admin.referrals_history', compact('referrals'));
    }

    public function updateReferralStatus(Request $request, $id)
    {
        $referral = Leads::where('lead_id', $id)->firstOrFail();

        // Update the status of the referral
        $referral->status = $request->input('status');
        $referral->save();

        if ($request->input('status') == 'completed') {
            $user = User::find($referral->user_id);

            if ($user) {
                // Fetch the credits record
                $credits = Credits::first(); // Assuming you want the first record

                if ($credits && isset($credits->credits)) { // Use the correct field name here
                    // Add the credit amount from the credits table to the user's credits
                    $user->credits += $credits->credits; // Access the 'credits' field
                    $user->save();
                } else {
                    // If no credits found, handle the scenario (optional)
                    return redirect()->back()->with('error', 'No credit amount found to be added.');
                }
            } else {
                // If no user found, handle the error (optional)
                return redirect()->back()->with('error', 'User not found.');
            }
            return redirect()->back()->with('success', 'Referral status updated and credits added successfully.');
        }

        return redirect()->back()->with('success', 'Referral status updated successfully.');
    }









}
