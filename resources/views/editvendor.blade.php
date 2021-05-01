@extends('layout.app')

@section('content')
<form action="{{route('register')}}" method="post">
@csrf
<div class="container register">
    <div class="row">
        
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3>Welcome</h3>
            <p>To The Grocery store <br> with advances <br> level products !</p>
            <input type="submit" name="" value="Login"/><br/>
        </div>
        
        <div class="col-md-9 register-right">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Customer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Vendor</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Customer Registration Form</h3>
                    <div class="row register-form">
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <input type="text" name="first_name" class="form-control" placeholder="First Name *" value="" />
                            </div>
                            
                            <div class="form-group">
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name *" value="" />
                            </div>
                            
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="Your Email *" value="" />
                            </div>                                       
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" name="contact_no" class="form-control" placeholder="Contact no *" value="" />
                            </div>
                    
                            <div class="form-group">
                                <input type="password" name="password" maxlength="8" minlength="6" class="form-control" placeholder="Password *" value="" />
                            </div>
                            
                            <a href="login.php"><button type="submit" name="submit" style="margin-top: 110px; height: 40px;" class="btnRegister"  value="register"/>Register</button></a>
                        </div>
                    </div>
                </div>
                </form>

                <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                
                <form method="post" action="{{route('editvendor')}}" enctype="multipart/form-data">
                @csrf 
                <h3  class="register-heading">Vendor Registration</h3>
                    <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{ $users->id }}">
                            </div>
                                
                            <div class="form-group">
                                <input type="hidden" name="userid" value="{{ $users->user_id }}">
                            </div>

                            <div class="form-group">
                                <input type="text" name="vfirst_name" class="form-control" placeholder="First Name *" value="{{ $users->users->first_name }}" >
                            </div>
                            <div class="form-group">
                                <input type="text" name="vlast_name" class="form-control" placeholder="Last Name *" value="{{ $users->users->last_name }}" />
                            </div>
                            <div class="form-group">
                                <input type="email" name="vemail" class="form-control" placeholder="Email *" value="{{ $users->users->email }}" />
                            </div>
                            <div class="form-group">
                                <input type="number" name="vcontact_no" class="form-control" placeholder="Contact No *" value="{{ $users->users->contact_no }}" />
                            </div>
                            <div class="form-group">
                                <input type="password" name="vpassword" maxlength="8" minlength="6" class="form-control" placeholder="Password *" value="{{ $users->users->password }}" />
                            </div> 

                            <div class="form-group">
                                <input type="text" name="brand_name" class="form-control" placeholder="Your Brand Name *" value="{{ $users->brand_name }}" />
                            </div>
                        </div>

                        <div class="col-md-6">

                        <div class="form-group">
                            <input type="Number" name="establish_year" class="form-control" placeholder="Year Of Establishment *" value="{{ $users->establish_year }}" />
                        </div>

                        <div class="form-group">
                            <input type="text" name="product_category" class="form-control" placeholder="Product Category *" value="{{ $users->product_category }}" />
                        </div>
                        
                        <div class="form-group">
                                <input type="text" name="website_link" class="form-control" placeholder="Website Link [If Available]" value="{{ $users->website_link }}" />
                        </div>

                        <div class="form-group">
                            <input type="file" name="image[]" multiple class="form-control" value="{{ $users->image }}" />Few Images Of the Store [If Available]
                        </div>

                        <div class="form-group">
                            <input type="text" name="registration_proof" class="form-control" placeholder="Registration Proof *" value="{{ $users->registration_proof }}" />
                        </div>

                        <a href="login.php"><button style="height: 40px;" type="submit" name="submit" class="btnRegister" value=""/>Update</button> </a>
                        </div>
                    </div>
                </div>
            </div>
          </form>
        </div>
    </div>
</div>

@endsection

