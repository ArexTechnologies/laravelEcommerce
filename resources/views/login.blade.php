<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
   <x-navbar></x-navbar>
    <div style="width: 100%;height:100%;text-align:center; ">
    
       
      <div style="width: 22rem;text-align:center;margin-left:35%;margin-top:10%;" class="card form-control shadow-lg">
          <h3>Sign-In</h3>
<form action="/users/authenticate" method="POST" class="justify-center">
  @csrf
 <label class="form-label">
Email
<br>
     <input class="form-control"  style="border-radius: 10px" type="email" placeholder="type your email" name="email" value="{{old('email')}}">
      @error('email')
   <p style="color: red">{{$message}}</p>
   @enderror
    </label>

       <label class="form-label">
Password
<br>
 <input class="form-control"  style="border-radius: 10px" type="password" placeholder="type your password" name="password" value="{{old('password')}}">
  @error('password')
   <p style="color: red">{{$message}}</p>
   @enderror  
       </label>
   <br>
       <input class="btn btn-primary" type="submit">
       <br>
      Dont have an account ? <a href="/register">Register</a>
</form>

      </div>
    </div> 
</body>
</html>
















    