<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Leads;
use App\Models\UserCommission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::find(Auth::id());
        if ($user->status == 0) {
            // logout user
            Auth::logout();
            return redirect()->back()->with('error', 'Your account is not active. Please contact admin.');
        }
        $commissions = UserCommission::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        return view('user.home', compact('commissions'));
    }
    public function referral_history()
    {
        $referrals = Leads::where('user_id', Auth::id())->orderBy('lead_id', 'desc')->get();
        return view('user.referral_history', compact('referrals'));
    }



    public function open_referral()
    {
        return view('user.new_referral');
    }

    //for new lead generation
    public function generate_referral(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',],
            'phone_number' => ['required', 'string', 'max:10'],
            'project_type' => ['required', 'string', 'max:255',],

        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Please fill all the required fields');
        }
        $lead = Leads::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'project_type' => $request->project_type,
            'referral_code' => auth()->user()->referral_code,
            'user_id' => Auth::id(),
            'status' => 'not_started',

        ]);


        return redirect()->route('open_referral')->with('success', 'Referral was generated successfully.');
    }




    public function referrals()
    {
        return view('user.referrals');
    }
    public function profile()
    {
        return view('user.profile');
    }
    public function orders()
    {
        $orders = Order::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        return view('user.orders', compact('orders'));
    }
    public function editProfile(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users,email,' . Auth::id(),
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Please enter a unique email address');
        }
        // dd($request->all());
        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->area = $request->area;
        $user->city = $request->city;
        $user->save();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/profile/', $filename);
            $user->image = $filename;
            $user->save();
        }
        return redirect()->back()->with('success', 'Your profile is updated successfully');
    }


    public function Userleaderboard(Request $request)
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

        // Get the user's position among all users
        $user = auth()->user(); // Assuming you're using Laravel's built-in authentication
        $userPosition = User::query()
            ->when($selectedCity, function ($q) use ($selectedCity) {
                return $q->where('city', $selectedCity);
            })
            ->orderBy('total_credits', 'desc')
            ->pluck('id') // Only get the IDs to check the position
            ->search($user->id) + 1; // Find the index and add 1 to get the rank

        return view('user.leaderboard', compact('topUsers', 'userPosition'));
    }



}
