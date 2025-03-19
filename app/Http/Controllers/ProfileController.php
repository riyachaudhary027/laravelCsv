<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function showForm()
    {
        return view('profiles.userprofile'); // Show the form
    }

    public function store(Request $request)
    {
        // Validate the request data
        
        $validatedData = $request->validate([
            'profileImage' => 'required|image|mimes:jpeg,jpg|max:2048', // Image validation
            'name' => 'required|string|max:25', // Name should be a string
            'phone' => 'required|regex:/^\+91-\(\d{3}\) \d{3}-\d{4}$/', // Indian phone number validation
            'email' => 'required|email', // Email validation
            'street' => 'required|string', // Street address validation
            'city' => 'required|string', // City validation
            'state' => 'required|in:CA,NY,AT', // State validation
            'country' => 'required|in:IN,US,EU', // Country validation
        ]);

        // Handle the profile image upload
        if ($request->hasFile('profileImage')) {
            $imagePath = $request->file('profileImage')->store('profile_images', 'public');
        }

        // Save the data to the database using the Profile model
        Profile::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'street' => $request->street,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'profile_image' => $imagePath,
        ]);

        // Redirect or return response with success message
        return redirect()->route('profile.list')->with('success', 'Profile saved successfully!');
    }
    public function showUsers()
    {
        // Retrieve all profiles from the database
        $profiles = Profile::all();

        // Pass the profiles to the view
        return view('profiles.userlist', compact('profiles'));
    }
    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
        // dd($profile);
     
        return view('profiles.useredit', compact('profile'));
    }

    // Update an existing profile
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
        ]);

        $profile = Profile::findOrFail($id);

        if ($request->hasFile('profile_image')) {
            // Delete old image from storage
            Storage::delete('public/' . $profile->profile_image);

            // Store the new image
            $profileImage = $request->file('profile_image')->store('profile_images', 'public');
            $profile->profile_image = $profileImage;
        }

        $profile->update($request->only('name', 'phone', 'email', 'street', 'city', 'state', 'country'));

        return redirect()->route('profile.list')->with('success', 'Profile updated successfully');
    }

    // Delete a profile
    public function destroy($id)
    {
        $profile = Profile::findOrFail($id);

        // Delete the profile image from storage
        Storage::delete('public/' . $profile->profile_image);

        // Delete the profile from the database
        $profile->delete();

        return redirect()->route('profile.list')->with('success', 'Profile deleted successfully');
    }

    
}
