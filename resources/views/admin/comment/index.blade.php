@extends('admin.layouts.main')

@section('content')
 <section class="content-header">
      <h1>Comments</h1>
 
    </section>

    <!-- Main content -->
    <section class="content">
          <div class="row">
              <div class="col-md-12">
                  
                  @include('flash::message')
                  
                   <div class="box">
                      <div class="box-body no-padding">
          
            <table class="table table-striped">
                <tbody>
                    <tr>
                  <th style="width: 10px">ID</th>
                  <th>Post</th>
                  <th>Category</th>
                  <th>User</th>
                  <th>Comment</th>
                  <th>Created At</th>
                  <th style="width:140px">Actions</th>

                </tr>
               
                @foreach($comments as $comment)
                <tr>
                <td>{{ $comment->id }}</td> 
                <td><a href="{{  route('post', $comment->post->slug) }}" target="_blank">{{ $comment->post->title }}</a></td>
                 <td>{{ $comment->post->category->name }}</td>
                 <td>{{ $comment->user->getFullName() }}</td>
                 <td>{{ $comment->content}}</td>
                 <td>{{ $comment->created_at->format('d.m.Y H:i:s') }}</td>
                  

                  <td>
                      <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-warning">Edit</a>
                      
                  {!! Form::open(['route'=>['comments.destroy', $comment->id],'method'=>'DELETE', 'class'=>'pull-right']) !!}
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
         {{$comments->render() }}
         </div>
        </div>
                  </div>
             </div>
        </div>
    </section>
    <!-- /.content -->
@endsection