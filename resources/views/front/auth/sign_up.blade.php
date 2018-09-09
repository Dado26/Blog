@extends('front.layouts.main')

@section('title', 'WebDev Blog - Sign Up')

@section('content')

 <div class="col-md-6 col-md-offset-3">
                <div class="account-wall">
                    <h2>Sign Up</h2>
                    <img class="profile-img img-circle" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=220">
                  
                 @include('front.partials.errors')

                   
                 {!! Form::open(['route'=>'sign_up_attempt', 'method'=>'POST', 'class'=>'form-signin validate']) !!}

                      
                      {!! Form::text('email',null, ['class'=>'form-control','placeholder'=>'Email','required']) !!}
                      
                      {!! Form::password('password', ['class'=>'form-control','placeholder'=>'password','required']) !!}
                      
                        {!! Form::text('first_name',null, ['class'=>'form-control','placeholder'=>'First Name', 'required']) !!}
                      
                       {!! Form::text('last_name',null, ['class'=>'form-control','placeholder'=>'Last Name', 'required']) !!}

                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
                       
                        {!! Form::close() !!}
                    
                   <a href="{{route('sign_in_form')}}" class="text-center new-account">Already have an account</a>

                </div>
            </div>

@endsection