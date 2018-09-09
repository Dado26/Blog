@inject('nav','App\Services\NavigationService')

<div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item {{ isActive('/', true, false) }}" href="{{route('home')}}">Home</a>
          
          @foreach($nav->getCategories() as $category )
          <a class="blog-nav-item {{ isActive('category/'.$category->slug, true, false) }}" href="{{route('category', $category->slug)}}">{{ $category->name }}</a>
        @endforeach
          <a class="blog-nav-item {{ isActive('about', true, false) }}" href="{{route('about')}}">About</a>
         <a class="blog-nav-item {{ isActive('contact', true, false) }}" href="{{route('contact')}}">Contact</a>

         @if( auth()->check())
         <a class="blog-nav-item pull-right" href="{{route('sign_out') }}">Sign out</a
         @else
         <a class="blog-nav-item pull-right {{ isActive('sign-in', true, false) }}" href="{{route('sign_in_form')}}">Sign in</a
         @endif
        </nav>
      </div>
    </div>