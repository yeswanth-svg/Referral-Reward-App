<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Credits;
use Illuminate\Support\Facades\Validator;

class CreditsLevelsController extends Controller
{
    public function index()
    {
        $credits = Credits::all();
        return view('admin.commission_percentage.index', compact('credits'));
    }

    public function update(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'credit_value' => 'required|numeric|min:0', // Ensure credit_value is numeric and non-negative
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find the credit record by ID and update it
        $credits = Credits::find($request->id);
        $credits->credit_value = $request->credit_value;
        $credits->save();

        return redirect()->back()->with('success', 'Credits Updated Successfully');
    }
}
