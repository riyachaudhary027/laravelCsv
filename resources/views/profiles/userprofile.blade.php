@extends('layout.main')
 
@section('content')

<div class = 'container'>
<h2>Profile Form</h2>

 <form action="{{ url('/profile') }}" method="POST" enctype="multipart/form-data">
 @csrf
 <!-- Profile Image (JPG only) -->
 <label for="profileImage">Profile Image (JPG only):</label>
 <input type="file" id="profileImage" name="profileImage" accept="image/jpeg" required>

 <!-- Name (Text, 25 characters limit) -->
 <label for="name">Name:</label>
 <input type="text" id="name" name="name" maxlength="25" required>

 <!-- Phone (+1- (XXX) XXX-XXXX format) -->
 <label for="phone">Phone:</label>
 <input type="text" id="phone" name="phone"  placeholder="+1-(123) 456-7890" required>

 <!-- Email (Email validation) -->
 <label for="email">Email:</label>
 <input type="email" id="email" name="email" required>

 <!-- Street Address (Text) -->
 <label for="street">Street Address:</label>
 <input type="text" id="street" name="street" required>

 <!-- City (Text) -->
 <label for="city">City:</label>
 <input type="text" id="city" name="city" required>

 <!-- State (Dropdown: CA, NY, AT) -->
 <label for="state">State:</label>
 <select id="state" name="state" required>
     <option value="CA">California (CA)</option>
     <option value="NY">New York (NY)</option>
     <option value="AT">Atlanta (AT)</option>
 </select>

 <!-- Country (Dropdown: IN, US, EU) -->
 <label for="country">Country:</label>
 <select id="country" name="country" required>
     <option value="IN">India (IN)</option>
     <option value="US">United States (US)</option>
     <option value="EU">European Union (EU)</option>
 </select>

 <!-- Submit Button -->
 <button type="submit">Submit</button>
</form>
</div>
@endsection
