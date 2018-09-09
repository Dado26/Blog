@extends('front.layouts.main')

@section('script')
<script>
    $(document).ready(function(){
        
        @if(auth()->check() )
            
        window.routes.add_comment = '{{ route('add_comment', $post->slug) }}';
        window.routes.delete_comment = '{{ route('delete_comment') }}';
        window.user.fullName = '{{auth()->user()->getFullName() }}';
       
       
          
        window.initPostPage(); 
        
        @endif
    });
</script>    
@endsection


@section('content')
 <div class="blog-post add-margin-top">
     <h2 class="blog-post-title">{{ $post->title }}</h2>
     
     <hr>
    @if($post->image)
     <img src="{{ asset('img/posts/'.$post->image) }}" class="img-responsive">    
     <hr>
    @endif
    
     {!! $post->content !!}
        
     @if (count($post->tags) )
     <hr>
     <h4>Tags</h4>
     <p>
         @foreach($post->tags as $tag)
         <a href="{{ route('home', ['tag'=>$tag->slug]) }}" class="btn btn-primary">{{ $tag->name }}</a>
         @endforeach
     </p>
     @endif  
     
     <hr>
     
     <h4>Comments</h4>
     
     <div id="comments-container">
         
   @forelse($post->comments as $comment)     
     <div class="media">
  <div class="media-left media-middle">
    
<img class="profile-img img-circle" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=60">

  </div>
  <div class="media-body">
      <h4 class="media-heading">{{ $comment->user->getFullName() }} 
          <span class="commented-at"> {{ $comment->created_at->diffForHumans() }} </span> 
        
         
          
         @if($user)
          
         @if(auth()->user()->id == $comment->user_id || auth()->user()->isAdmin())
                   
         <button class="btn btn-danger btn-sm pull-right delete-btn" data-comment-id="{{ $comment->id }}">&times;</button>          
         
         @endif
               
         @endif
          
      </h4>
    <p>{{ $comment->content }}</p>
    </div>
  </div>
   @empty
   <p>No Comments</p> 
   @endforelse
         
</div>
     
     <hr>
     @if(auth()->check() )
     <div id="new-comment-container">
         <h4>Add new comments</h4>
        <div class="media">
  <div class="media-left">
    <a href="#">
<img class="profile-img img-circle" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=60">

    </a>
  </div>
  <div class="media-body">
      <textarea id="new-comment" class="form-control"></textarea>
  </div>
            
      <button id="submit-comment" class="btn btn-primary pull-right">Submit</button>

  </div> 
         
 </div>
  @endif      
 
 </div>

   

@endsection
