@extends('admin.layouts.main')

@section('content')
 <section class="content-header">
      <h1>Categories
      <a href="{{route('categories.create')}}" class="btn btn-success">New</a>

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
                  <th style="width: 20px">ID</th>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Updated At</th>
                  <th>Created At</th>
                  <th style="width:140px">Actions</th>

                </tr>
               
                @foreach($categories as $category)
                <tr>
                  <td>{{ $category->id }}</td>
                  <td>{{ $category->name }}</td>
                  <td>{{ $category->slug}}</td>
                  <td>{{ $category->updated_at->format('d.m.Y H:i:s') }}</td>
                  <td>{{ $category->created_at->format('d.m.Y H:i:s') }}</td>
                  

                  <td>
                      <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                      
                      {!! Form::open(['route'=>['categories.destroy', $category->id],'method'=>'DELETE', 'class'=>'pull-right']) !!}
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
         {{$categories->render() }}
         </div>
        </div>
                  </div>
             </div>
        </div>
    </section>
    <!-- /.content -->
@endsection