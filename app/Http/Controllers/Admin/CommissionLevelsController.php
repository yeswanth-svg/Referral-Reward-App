<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Credits;
use Illuminate\Support\Facades\Validator;

class CommissionLevelsController extends Controller
{
    public function index()
    {
        $levels = Credits::all();
        return view('admin.commission_percentage.index', compact('levels'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'credits' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $level = Credits::find($request->id);
        $level->credits = $request->credits;
        $level->save();

        return redirect()->back()->with('success', 'Commission Percentage Updated Successfully');
    }
}
