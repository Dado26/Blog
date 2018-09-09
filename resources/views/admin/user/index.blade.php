@extends('admin.layouts.main')

@section('content')
 <section class="content-header">
      <h1>Users
      <a href="{{route('users.create')}}" class="btn btn-success">New</a>

      </h1>
 
    </section>

    <!-- Main content -->
    <section class="content">
          <div class="row">
              <div class="col-md-6">
                  
                  @include('flash::message')
                  
                   <div class="box">
                      <div class="box-body no-padding">
          
            <table class="table table-striped">
                <tbody><tr>
                  <th style="width: 10px">ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Updated At</th>
                  <th>Created At</th>
                  <th style="width:140px">Actions</th>

                </tr>
               
                @foreach($users as $user)
                <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->first_name }}</td>
                  <td>{{ $user->last_name}}</td>
                  <td>{{ $user->email}}</td>
                  <td>{{ $user->role->name}}</td>
                  <td>{{ $user->updated_at->format('d.m.Y H:i:s') }}</td>
                  <td>{{ $user->created_at->format('d.m.Y H:i:s') }}</td>
                  

                  <td>
                      <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                      
                      {!! Form::open(['route'=>['users.destroy', $user->id],'method'=>'DELETE', 'class'=>'pull-right']) !!}
                      <button type="submit" class="btn btn-danger">Delete</button>
                      {!!Form::close()!!}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            
                     </div>
        <div class="box-footer">
         <div class="pull-right">
         {{$users->render() }}
         </div>
        </div>
                  </div>
             </div>
        </div>
    </section>
    <!-- /.content -->
@endsection