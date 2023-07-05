<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Profile::get();
    }

    /**
     * Display a given resource
     */
    public function show(Profile $profile)
    {
        if($profile->public || auth()->user()->id === $profile->user_id) {
            return $profile;
        }
        return "Unauthorized";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileRequest $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required', 
            'biography' => 'required',
            'public' => 'required'
        ]);

       return Profile::create([
            'user_id' => auth()->user()->id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'biography' => $request->biography,
            'public' => $request->public
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Profile $profile)
    {
        if ($profile->user_id !== auth()->user()->id) {
            return 'Unauthorized';
        }
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required', 
            'biography' => 'required',
            'public' => 'required'
        ]);

        $profile->firstname = $request->firstname;
        $profile->lastname = $request->lastname;
        $profile->biography = $request->biography;
        $profile->public = $request->public;

        $profile->save();
        return $profile;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        if ($profile->user_id !== auth()->user()->id) {
            return 'Unauthorized';
        }
        return $profile->delete();
    }
}
