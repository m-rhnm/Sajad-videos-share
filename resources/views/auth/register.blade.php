<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>rigester</title>
    <link rel="stylesheet" type="text/css" href="/css/rigester.css">
</head>
<body>
  <div class="container">
    <form id="form" class="form" action="{{ route('register.store') }}" method="POST">
      @csrf
      <h2>Rigester with Us</h2>
      @include('errors.message')
      <div class="form-control">
        <label for="username">Username</label>
        <input type="text" id="username" name="name" placeholder="Enter Username" />
        <small>Error Message</small>
      </div>
      
      <div class="form-control">
        <label for="email">Email</label>
        <input type="text" id="email" name="email" placeholder="Enter Email" />
        <small>Error Message</small>
      </div>
      <div class="form-control">
        <label>Phone Number</label>
        <input type="text" id="phone_number"  name="phone_number" placeholder="Enter Phone Number" />
        <small>Error Message</small>
      </div>
      <div class="form-control">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter Password" />
        <small>Error Message</small>
      </div>
      <div class="form-control">
        <label for="password2">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Enter Password again" />
        <small>Error Message</small>
      </div>
      <h3 style="display: inline">Do you have acount?</h3><a href="{{ route('login') }}">login</a> 
   <button type="submit">Submit</button>
    </form>
  </div>
</body>
</html>




