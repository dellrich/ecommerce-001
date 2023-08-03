<?php

namespace App\Http\Controllers;

use user;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    

            /**
             * Display the user's profile form.
             */
            public function edit(Request $request): View
            {
                     if(Auth::user()->utype == "USR")
                    {
                        return view('user.profile.edit', [
                        'user' => $request->user(),
                         ]);
                    }else {

                         return view('admin.profile.edit', [
                        'user' => $request->user(),
                         ]);
                    }

                   
                
            }

            /**
             * Update the user's profile information.
             */
            public function update(ProfileUpdateRequest $request): RedirectResponse
            {
                $request->user()->fill($request->validated());

                if(Auth::user()->utype == "USR")
                {
                    
                    if ($request->user()->isDirty('email')) {
                        $request->user()->email_verified_at = null;
                     }

                    $request->user()->save();

                    return Redirect::route('user.profile.edit')->with('status', 'profile-updated');

                }else {

                    if ($request->user()->isDirty('email')) {
                        $request->user()->email_verified_at = null;
                     }

                    $request->user()->save();

                    return Redirect::route('admin.profile.edit')->with('status', 'profile-updated');

                }

               
            }

            /**
             * Delete the user's account.
             */
            public function destroy(Request $request): RedirectResponse
            {

                if(Auth::user()->utype == "USR")
                {
                    $request->validateWithBag('userDeletion', [
                        'password' => ['required', 'current-password'],
                    ]);
    
                    $user = $request->user();
    
                    Auth::logout();
    
                    $user->delete();
    
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
    
                    return Redirect::to('/');

                }else {

                    $request->validateWithBag('userDeletion', [
                        'password' => ['required', 'current-password'],
                    ]);
    
                    $user = $request->user();
    
                    Auth::logout();
    
                    $user->delete();
    
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
    
                    return Redirect::to('/');

                }
               
            }
}

