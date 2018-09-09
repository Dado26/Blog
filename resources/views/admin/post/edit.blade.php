@extends('admin.layouts.main')

@section('script')
<!-- DatePicker-->
<script src="{{asset ('admin_assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!--CKEDITOR -->
<script src="{{asset('admin_assets\bower_components\ckeditor\ckeditor.js') }}"></script>

<!--SELECT2 -->
<script src="{{asset('admin_assets/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script>
    $(document).ready(function() {
    $('.datepicker').datepicker();
    
    CKEDITOR.replace('content');
    
    
    $('.select2').select2({
        tags: true,
        multiple: true,
        tokenSeparators: [',',' ']
    });
    
  });
</script>
@endsection

@section('style')
<!-- DatePicker-->
<link rel="stylesheet" href="{{asset ('admin_assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.standalone.min.css') }}">

<!-- Select2-->
<link rel="stylesheet" href="{{asset ('admin_assets/bower_components/select2/dist/css/select2.min.css') }}">

@endsection



@section('content')
 <section class="content-header">
      <h1>Post: {{ $post->title }}</h1>
 
    </section>

    <!-- Main content -->
    {!! Form::model($post, ['route'=>['posts.update', $post->id], 'method'=>'PUT', 'class'=>'validate', 'files'=>true]) !!}
    <section class="content">
          <div class="row">
              <div class="col-md-6">
                  
              @include('admin.partials.errors')
                  
                <div class="box">
                      <div class="box-body">
                <div class="form-group">
                  <label>Title</label>
                  <!-- <input name="name" type="text" class="form-control" value="{{ $post->name }}"> Moz takto standart -->
                  {!! Form::input('text', 'title', null, ['class'=>'form-control', 'required']) !!}
                </div> 
                          
                <div class="form-group">
                  <label>Image</label>
                  {!! Form::file('image',['class'=>'form-control']) !!}
                </div> 
                          
               <div class="form-group">
                  <label>Published From</label>
                  <div class="input-group date">
                      <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                      </div>           
                  @if(is_null($post->published_from))
                  {!! Form::input('text', 'published_from', null, ['class'=>'form-control pull-right datepicker']) !!}
                  @else
                  {!! Form::input('text', 'published_from', $post->published_from->format('d/m/Y'), ['class'=>'form-control pull-right datepicker']) !!}
                  @endif
                </div> 
               </div>
                          
                 <div class="form-group">
                  <label>Category</label>
                 {!! Form::select('category_id', $categories, null, ['class'=>'form-control', 'required']) !!}

                </div>
                          
                <div class="form-group">
                  <label>Content</label>
                 {!! Form::textarea('content', null, ['class'=>'form-control','id'=>'content', 'required']) !!}

                </div>                         
               
                </div>
        <div class="box-footer">
         <div class="pull-left">
             <button class="btn btn-success btn-lg">Save</button>
         </div>
         <div class="pull-right">
         <a href="{{route('posts.index')}}" class="btn btn-primary btn-lg">Back</a>
         </div>
        </div>
                 </div>
             </div>
        @if($post->image)
         <div class="col-md-6">                  
                <div class="box">
                    <div class="box-header">
                        Uploaded Image
                    </div>
                      <div class="box-body">                          
                          <img src="{{ asset('img/posts/'.$post->image) }}" class="img-responsive">               
                      </div>
                </div>
         </div>
        @endif
        
         <div class="col-md-6">                  
                <div class="box">
                    <div class="box-header">
                        Tags
                    </div>
                      <div class="box-body">    
                         {!! Form::select('tags_id[]', $tags,  $post->tags->pluck('id'), ['class'=>'form-control select2','multiple'=>'multiple', 'required']) !!}                         
                      </div>
                </div>
         </div> 
        
        </div>
         
    </section>
    {!! Form::close() !!}
    
    <!-- /.content -->
@endsection