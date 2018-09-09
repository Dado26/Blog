@extends('front.layouts.main')

@section('title', 'WebDev Blog - Sign In')

@section('content')

 <div class="col-md-6 col-md-offset-3">
                <div class="account-wall">
                    <h2>Sign In</h2>
                    <img class="profile-img img-circle" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=220">
                  
                 @include('front.partials.errors')

                   
                 {!! Form::open(['route'=>'sign_in_attempt', 'method'=>'POST', 'class'=>'form-signin validate']) !!}

                      
                      {!! Form::text('email',null, ['class'=>'form-control','placeholder'=>'Email','required']) !!}
                      {!! Form::password('password', ['class'=>'form-control','placeholder'=>'password','required']) !!}
                      
                      <label class="remember-me">
                      {!! Form::checkbox('remember_me') !!}
                      Remember me
                      </label> 
                      
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
                       
                        {!! Form::close() !!}
                    </form>
                   <a href="{{route('sign_up_form')}}" class="text-center new-account">Create an account</a>

                </div>
            </div>

@endsection