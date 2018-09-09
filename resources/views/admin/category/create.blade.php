
@extends('admin.layouts.main')

@section('content')
 <section class="content-header">
      <h1>Create category</h1>
 
    </section>

    <!-- Main content -->
    {!! Form::open(['route'=>['categories.store'], 'method'=>'POST', 'class'=>'validate']) !!}
    <section class="content">
          <div class="row">
              <div class="col-md-3">
                  
         @include('admin.partials.errors')
     
                   <div class="box">
                      <div class="box-body">
                <div class="form-group">
                  <label>Name</label>
                 
                  {!! Form::input('text', 'name', null, ['class'=>'form-control', 'required']) !!}
                </div>
                <div class="form-group">
                  <label>Slug</label>
              {!! Form::input('text', 'slug', null, ['class'=>'form-control', 'required']) !!}

                </div>
                     </div>
        <div class="box-footer">
         <div class="pull-left">
             <a href="{{route('categories.index')}}" class="btn btn-primary btn-lg">Back</a>
         </div>
         <div class="pull-right">
             <button type="submit" class="btn btn-success btn-lg">Save</button>
         </div>
        </div>
                  </div>
             </div>
        </div>
    </section>
    {!! Form::close() !!}
    
    <!-- /.content -->
@endsection