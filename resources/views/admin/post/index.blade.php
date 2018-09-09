@extends('admin.layouts.main')

@section('script')
 <script>
    $(".pull-right").on("submit", function(){
        return confirm("Are you sure to delete this post and his comments?");
    });
</script>
@endsection

@section('content')

 <section class="content-header">
      <h1>Posts
      <a href="{{route('posts.create')}}" class="btn btn-success">New</a>

      </h1>
 
    </section>

    <!-- Main content -->
    <section class="content">
          <div class="row">
              <div class="col-md-12">
                  
                  @include('flash::message')
                  
                   <div class="box">
                      <div class="box-body no-padding">
          
            <table class="table table-striped">
                <tbody><tr>
                  <th style="width: 20px">ID</th>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Category</th>
                  <th>Published From</th>
                  <th>Updated At</th>
                  <th>Created At</th>
                  <th style="width:140px">Actions</th>

                </tr>
               
                @foreach($posts as $post)
                <tr>
                  <td>{{ $post->id }}</td>
                  <td><a href="{{  route('post', $post->slug) }}" target="_blank">{{ $post->title}}</a></td>
                  <td>{{ $post->user->getFullName() }}</td>
                  <td>{{ $post->category->name}}</td>
                  <td>{{ ($post->published_from) ? $post->published_from->format('d.m.Y H:i:s') : 'Published' }}</td>
                  <td>{{ ($post->updated_at) ? $post->updated_at->format('d.m.Y H:i:s') : 'Not Updated' }}</td>
                  <td>{{ $post->created_at->format('d.m.Y H:i:s') }}</td>
                  

                  <td>
                 
                      <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                      
                      {!! Form::open(['route'=>['posts.destroy', $post->id],'method'=>'DELETE', 'class'=>'pull-right']) !!}
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
         {{$posts->render() }}
         </div>
        </div>
                  </div>
             </div>
        </div>
    </section>
    <!-- /.content -->
@endsection