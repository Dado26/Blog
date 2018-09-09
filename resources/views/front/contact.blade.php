@extends('front.layouts.main')

@section('title', 'WebDev Blog - Contact')

@section('content')

 <div class="col-md-8 col-md-offset-2">
                <div class="account-wall">
                    <h2>Contact</h2>
                    
                 @include('flash::message') 
                    
                 @include('front.partials.errors')

                   
                 {!! Form::open(['route'=>'send_contact_email_attempt', 'method'=>'POST', 'class'=>'validate']) !!}

                      
                      {!! Form::text('name',null, ['class'=>'form-control','placeholder'=>'Name','required']) !!}
                      
                      {!! Form::text('email', null, ['class'=>'form-control','placeholder'=>'email','required']) !!}
                      
                        {!! Form::text('subject',null, ['class'=>'form-control','placeholder'=>'Subject']) !!}
                      
                       {!! Form::textarea('content',null, ['class'=>'form-control','required']) !!}

                        <button class="btn btn-lg btn-primary btn-block" type="submit">Send</button>
                       
                  {!! Form::close() !!}
               
                 

                </div>
            </div>

@endsection