@extends('front.layouts.main')


@section('header')
 <div class="blog-header">
        <h1 class="blog-title">WebDev Blog</h1>
        <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
  </div>

@endsection

@section('content')

@foreach($posts as $post)
 <div class="blog-post">
            <h2 class="blog-post-title">
                <a href="{{ route('post', $post->slug) }}"> {{ $post->title }} </a>
            </h2>
            <p class="blog-post-meta">{{ $post->created_at->format('F j, Y') }}  by  <a href="#">{{ $post->user->getFullName()}}</a></p>

           
            <p>{!! str_limit($post->content, 300) !!}</p>
          </div><!-- /.blog-post -->
@endforeach

          <nav>
              {!! $posts->appends($_GET)->render() !!}
          </nav>

@endsection
