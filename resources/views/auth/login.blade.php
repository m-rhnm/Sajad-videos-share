<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
    <link rel="stylesheet" type="text/css" href="/css/rigester.css">
</head>
<body>
  <div class="container">
    <form id="form" class="form">
      <h2>Login</h2>
      
      <div class="form-control">
        <label for="email">Email</label>
        <input type="text" id="email" placeholder="Enter Email" />
        <small>Error Message</small>
      </div>
      <div class="form-control">
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="Enter Password" />
        <small>Error Message</small>
      </div>
      <h3 style="display: inline">if dont have acount</h3><a href="{{ route('register') }}">create one</a> 
   <button type="submit">Submit</button>
    </form>
  </div>
  <script src="/js/rigester.js"></script>
</body>
</html>




