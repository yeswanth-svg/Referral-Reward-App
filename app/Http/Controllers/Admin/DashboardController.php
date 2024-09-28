<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Leads;
use App\Models\User;
use App\Models\Credits;
use Illuminate\Support\Facades\Auth;
use App\Mail\CreditPointsAdded;
use Illuminate\Support\Facades\Mail;


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
        // Get the referral based on the lead_id
        $referral = Leads::where('lead_id', $id)->firstOrFail();

        // Update the status of the referral
        $referral->status = $request->input('status');
        $referral->save();

        // Check if the status is 'completed'
        if ($request->input('status') == 'completed') {
            // Get the user who generated the lead
            $user = User::find($referral->user_id);

            if ($user) {


                // Fetch the credits for the specific project type
                $credits = Credits::where('service_name', $referral->project_type)->first();


                if ($credits) {


                    // Access the credit amount directly from attributes
                    $creditAmount = $credits->credit_value; // Ensure this matches the correct attribute name in your Credits model



                    // Update the user's credits
                    $user->total_credits += $creditAmount;
                    $user->withdrawal_credits += $creditAmount;

                    // Save the updated user instance
                    $user->save();
                    // Send email notification
                    Mail::to($user->email)->send(new CreditPointsAdded($user, $credits->credit_value, $referral->project_type));
                } else {
                    // Handle case where no matching credits are found
                    return redirect()->back()->with('error', 'No credit amount found for this project type.');
                }
            } else {
                // Handle case where no user is found
                return redirect()->back()->with('error', 'User not found.');
            }
            return redirect()->back()->with('success', 'Referral status updated and credits added successfully.');

        }

        return redirect()->back()->with('success', 'Referral status updated successfully.');
    }


    public function leaderboard(Request $request)
    {
        // Get selected city from the request
        $selectedCity = $request->input('city');

        // Fetch users based on the selected city or get all users
        $query = User::query();

        if ($selectedCity) {
            $query->where('city', $selectedCity);
        }

        // Get the top users based on total credits
        $topUsers = $query->orderBy('total_credits', 'desc')->take(10)->get();

        return view('admin.leaderboard', compact('topUsers'));
    }




}
