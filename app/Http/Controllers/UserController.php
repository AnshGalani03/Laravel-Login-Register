<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\users;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class UserController extends Controller
{
    // function user_list()
    // {
    //     return view('admin.dashboard');
    // }

    function user_list()
    {
        $users = users::all();
        return view('admin.dashboard', ['users' => $users]);
    }

    function update_view($id)
    {
        $users = users::findOrFail($id);
        return view('admin.update', ['users' => $users]);
    }

    function update_user(Request $request, $id)
    {
        $update = users::findorfail($id);
        $request->validate([
            'firstname' => 'required|max:255',
            'dob' => 'required|date|before:-18 years',
            'gender' => 'required',
            'hobbies' => 'required|array|min:3|max:5',
            'hobbies*' => 'required|string|max:255',
        ]);

        $proImage = '';
        try {
            $image = $request->file('image');
            if (isset($image)) {
                $imageName = rand() . $image->getClientOriginalName();
                $image->move(public_path('user'), $imageName);
                $proImage = 'user/' . $imageName;
            }

            $update['fname'] = $request->firstname;
            $update['lname'] = $request->lastname;
            // $update['email'] = $request->email;
            // $update['phone_no'] = $request->phoneno;
            $update['dob'] = $request->dob;
            $update['college_name'] = $request->collegeName;
            $update['education'] = $request->education;
            $update['gender'] = $request->gender;
            $update['hobbies'] = $request->hobbies;
            if ($proImage) {
                $update->image = $proImage;
            }
            $update_user = $update->update();
            if ($update_user) {
                // return back()->with('success', 'User updated successfully');
                return redirect('/dashboard')->with('success', 'User update successfully');
            } else {
                return back()->with('error', 'Unable to update User, try again later');
            }
        } catch (QueryException $e) {
            return back()->with('error', 'Unable to update Profile, try again later');
        }
    }

    function delete_user($id)
    {
        $user = users::findorfail($id);
        $imagePath = public_path($user->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        // Delete product image from public folder
        Storage::delete($imagePath);
        DB::beginTransaction();
        try {
            $user->delete();
            DB::commit();
            return back()->with('success', 'User Delete Successfully');
        } catch (QueryException $ex) {
            DB::rollBack();
            return back()->with('error', 'Unable to delete user, try later');
        }
    }

    function change_pass_view()
    {
        return view('admin.password.change-password');
    }

    function change_pass(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:6',
        ]);

        $currentPassswordStatus = Hash::check($request->current_password, auth()->user()->password);
        if ($currentPassswordStatus) {
            // Current Password and New Password Same so give error
            if (strcmp($request->get('current_password'), $request->new_password) == 0) {
                return back()->with('error', 'New Password can not be same as your current password');
            }
            $user = users::find(Auth::user()->id);
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success', 'Password Update Successfully');
        } else {
            return redirect()->back()->with('error', 'Current Password does not match with Old Password');
        }
    }
}
