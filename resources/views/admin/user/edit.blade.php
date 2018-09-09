@extends('admin.layouts.main')

@section('content')
 <section class="content-header">
      <h1>User: #{{ $user->id }}</h1>
 
    </section>

    <!-- Main content -->
    {!! Form::model($user, ['route'=>['users.update', $user->id], 'method'=>'PUT', 'class'=>'validate']) !!}
    <section class="content">
          <div class="row">
              <div class="col-md-3">
                  
              @include('admin.partials.errors')
                  
                   <div class="box">
                      <div class="box-body">
                <div class="form-group">
                  <label>First Name</label>
                  <!-- <input name="name" type="text" class="form-control" value="{{ $user->name }}"> Moz takto standart -->
                  {!! Form::input('text', 'first_name', null, ['class'=>'form-control', 'required']) !!}
                </div>
                <div class="form-group">
                  <label>Last Name</label>
                  {!! Form::input('text', 'last_name', null, ['class'=>'form-control', 'required']) !!}

                </div>      
                          
                <div class="form-group">
                  <label>Email</label>
                 {!! Form::input('email', 'email', null, ['class'=>'form-control', 'required']) !!}

                </div>
                          
                <div class="form-group">
                  <label>Password</label>
                 {!! Form::input('password', 'password', null, ['class'=>'form-control']) !!}

                </div>
                          
                 <div class="form-group">
                  <label>Role</label>
                 {!! Form::select('role_id', $roles, null, ['class'=>'form-control', 'required']) !!}

                </div>
                          
               
                </div>
        <div class="box-footer">
         <div class="pull-left">
             <button class="btn btn-success btn-lg">Save</button>
         </div>
         <div class="pull-right">
         <a href="{{route('users.index')}}" class="btn btn-primary btn-lg">Back</a>
         </div>
        </div>
                  </div>
             </div>
        </div>
    </section>
    {!! Form::close() !!}
    
    <!-- /.content -->
@endsection