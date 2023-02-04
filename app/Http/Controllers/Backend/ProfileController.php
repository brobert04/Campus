<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index(){
      $id = Auth()->user()->id;
      $user = User::find($id);
      return view('admin.pages.user_profile.index', compact('user'));
    }

    public function settings(){
        $id = Auth()->user()->id;
        $user = User::find($id);
        return view('admin.pages.user_profile.settings', compact('user'));
    }

    public function update(Request $request){
        $this->validate($request, [
            'email' => 'unique:users,email,' . auth()->id(),
            'profile_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            ['email.unique' => 'This email is already taken.',
                'profile_photo.image' => 'The profile photo must be an image.',
                'profile_photo.mimes' => 'The profile photo must be a file of type: jpeg, png, jpg, gif, svg.',
                'profile_photo.max' => 'The profile photo may not be greater than 2MB'
                ]);

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone_number;
        $user->address = $request->address;

        if($request->hasFile('profile_photo')){
            if ($user->image) {
                File::delete('upload/user_images/' . $user->image);
            }
            $extension = $request->file('profile_photo')->getClientOriginalExtension();
            $photo_name = str_replace(' ', '',$request->name) .'_' . time().'.'.$extension;
            $request->file('profile_photo')->move('upload/user_images', $photo_name);
            $user->image = $photo_name;
        }
        $user->save();
        return redirect()->route('profile.index')->with('success', 'Profile updated successfully!');
    }
}
