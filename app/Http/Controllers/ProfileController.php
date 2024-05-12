<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{

    public function index() {
        $user = auth()->user();
        return view('profile.profile_page', ['user'=>$user]);
    }

    public function update(Request $request, string $user_id)
    {
        $user = User::find($user_id);
        $request->validate([
            'image' => 'image|mimes:png,jpg,jpeg,gif,svg|max:2048'
        ]);
        if ($request->hasFile('image')) {
            $image_name = time() . '.' . $request->image->extension();
            $request->image->move(public_path('image/avatars'), $image_name);
            $user->user_avatar = $image_name;
        }
        $user->fill([
            'name' => $request->input('e_name'),
            'email' => $request->input('e_email'),
            // 'user_avatar' => $image_name,
        ]);
        $user->save();
        // return $user;
        return $user;
    }


}
