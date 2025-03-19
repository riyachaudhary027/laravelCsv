<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profiles</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <!-- Add CSV Button -->
    <form action="{{ route('import.users') }}" method="POST" enctype="multipart/form-data">
        @csrf
<input type="file" name="file" required>
<button type="submit">Import CSV</button>
</form>
    <br>

    <h2>User Profiles</h2>

    <!-- Display Success Message -->
    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table to Display All Profiles -->
    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Street Address</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>Profile Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($profiles as $profile)
                <tr>
                    <td>{{ $profile->name }}</td>
                    <td>{{ $profile->phone }}</td>
                    <td>{{ $profile->email }}</td>
                    <td>{{ $profile->street }}</td>
                    <td>{{ $profile->city }}</td>
                    <td>{{ $profile->state }}</td>
                    <td>{{ $profile->country }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $profile->profile_image) }}" alt="Profile Image" width="100">
                    </td>
                    <td>
                        <!-- Edit Link -->
                        <a href="{{ route('profile.edit', $profile->id) }}">Edit</a> |
                        
                        <!-- Delete Link -->
                        <form action="{{ route('profile.delete', $profile->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this profile?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Link to Go Back to the Form -->
    <br>
    <a href="{{ route('profile.index') }}">Go back to Profile Form</a>

</body>

</html>
