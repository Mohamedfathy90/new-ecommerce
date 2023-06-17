<?php

namespace App\Http\Controllers;
use App\Models\user;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use function PHPUnit\Framework\fileExists;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('front.profile', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function updateprofile(ProfileUpdateRequest $request): RedirectResponse
    {    
        if($request->has('image')){
            if(fileExists(public_path(auth()->user()->image))){
                unlink(public_path(auth()->user()->image));
            }
            $image_name = 'img_'.time().'.'.request('image')->getclientoriginalextension();
            $image_url = "profile_images/user/";
            request()->file('image')->storeAs($image_url,$image_name);
            $request->validated()['image'] = "/storage/".$image_url.$image_name;
        }
        
        Auth::user()->fill($request->validated());
        
        if (Auth::user()->isDirty('email')) {
            Auth::user()->email_verified_at = null;
        }

        Auth::user()->phone = $request->phone;
        
        Auth::user()->save();
        toastr()->success('Profile updated successfully');
        return redirect('/user/profile');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
