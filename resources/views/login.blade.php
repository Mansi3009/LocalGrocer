@extends('layout.app')

@section('content') 
<div class="container img">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <div class="text-center h2 text-secondary"> Login 
              <div class="h5"> Please Login to Proceed
            </div>
            </div>
            <p id="profile-name" class="profile-name-card"></p>
            
            <form class="form-signin" method="post" action="{{route('save_login')}}">
              
              @csrf
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
           
            <div class="forgot-password text-center">Don't Have Account?
            <a href="/registration" class="forgot-password text-center">
              Sign Up
            </a>
            </div>
            <a href="#" class="forgot-password text-center">
                Forgot password
            </a> 
        </div><!-- /card-container -->
    </div><!-- /container -->
@endsection