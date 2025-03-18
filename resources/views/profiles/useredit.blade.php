@extends('layout.main')
 
@section('content')

<div class = 'container'>
<h2> Edit profile</h2>

<form action="{{ route('profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
    @csrf


    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ old('name', $profile->name) }}" required><br>

    <label for="phone">Phone:</label>
    <input type="text" name="phone" value="{{ old('phone', $profile->phone) }}" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ old('email', $profile->email) }}" required><br>

    <label for="street">Street Address:</label>
    <input type="text" name="street" value="{{ old('street', $profile->street) }}" required><br>

    <label for="city">City:</label>
    <input type="text" name="city" value="{{ old('city', $profile->city) }}" required><br>

    <label for="state">State:</label>
    <input type="text" name="state" value="{{ old('state', $profile->state) }}" required><br>

    <label for="country">Country:</label>
    <input type="text" name="country" value="{{ old('country', $profile->country) }}" required><br>

    <label for="profile_image">Profile Image:</label>
    <input type="file" name="profile_image"><br>

    <button type="submit">Update Profile</button>
</form>

</div>
@endsection
