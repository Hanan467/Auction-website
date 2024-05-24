<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class AdminUserController extends Controller
{
    public function bidders(){
            $data = User::where('role', 'bidder')->where('is_deleted', '0')->get();
            return view('admin.user.bidders', compact('data'));
    }

    public function sellers(){
        $data = User::where('role', 'seller')->where('is_deleted', '0')->get();
        return view('admin.user.index', compact('data'));
    }

    // public function updateSeller(Request $request, User $user)
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
    //         'role' => ['required', 'string']
    //     ]); 
    //     $user = User::where('role', 'seller')->find($request->id);
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->role = $request->role;
    //     $user->save();

    //     return redirect()->route('admin.user.index')->with('success','User updated successfully.');
    // }
    public function destroy($id)
    {
        User::where('id',decrypt($id))->update(
            ['is_deleted'=>'1']
        );
        return redirect()->back()->with('success','User deleted successfully.');
    }
}


