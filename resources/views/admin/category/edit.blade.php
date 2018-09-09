@extends('admin.layouts.main')

@section('content')
 <section class="content-header">
      <h1>Category: #{{ $category->id }}</h1>
 
    </section>

    <!-- Main content -->
    {!! Form::model($category, ['route'=>['categories.update', $category->id], 'method'=>'PUT', 'class'=>'validate']) !!}
    <section class="content">
          <div class="row">
              <div class="col-md-3">
                  
                @include('admin.partials.errors')

                   <div class="box">
                      <div class="box-body">
                <div class="form-group">
                  <label>Name</label>
                  <!-- <input name="name" type="text" class="form-control" value="{{ $category->name }}"> Moz takto standart -->
                  {!! Form::input('text', 'name', null, ['class'=>'form-control', 'required']) !!}
                </div>
                <div class="form-group">
                  <label>Slug</label>
              {!! Form::input('text', 'slug', null, ['class'=>'form-control', 'required']) !!}

                </div>
                     </div>
        <div class="box-footer">
         <div class="pull-left">
             <button class="btn btn-primary btn-lg">Save</button>
         </div>
         <div class="pull-right">
         <a href="{{route('categories.index')}}" class="btn btn-primary btn-lg">Back</a>
         </div>
        </div>
                  </div>
             </div>
        </div>
    </section>
    {!! Form::close() !!}
    
    <!-- /.content -->
@endsection