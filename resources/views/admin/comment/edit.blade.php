@extends('admin.layouts.main')

@section('content')
 <section class="content-header">
      <h1>Comments: #{{ $comment->id }}</h1>
      <h3>User: {{ $comment->user->getFullName() }}</h3>
      <h3>User:<a href="{{  route('post', $comment->post->slug) }}" target="_blank">{{ $comment->post->title}}</a></h3>

    </section>

    <!-- Main content -->
    {!! Form::model($comment, ['route'=>['comments.update', $comment->id], 'method'=>'PUT', 'class'=>'validate']) !!}
    <section class="content">
          <div class="row">
              <div class="col-md-3">
                  
              @include('admin.partials.errors')
                  
                   <div class="box">
                      <div class="box-body">
                         <div class="form-group">
                          <label>Comment</label>
                  <!-- <input name="name" type="text" class="form-control" value="{{ $comment->name }}"> Moz takto standart -->
                  {!! Form::textarea('content', null, ['class'=>'form-control', 'required']) !!}
                          </div>
                     </div>
        <div class="box-footer">
         <div class="pull-right">
              <a href="{{route('comments.index')}}" class="btn btn-primary btn-lg">Back</a>
         </div>
         <div class="pull-left">
             <button class="btn btn-success btn-lg">Save</button>
         </div>
         
        </div>
                  </div>
             </div>
        </div>
    </section>
    {!! Form::close() !!}
    
    <!-- /.content -->
@endsection