@inject('archives','App\services\ArchivesService') 


<div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>



          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
                @foreach($archives->get() as $archive)
                <li><a href="{{ route('home', ['month'=>$archive->month, 'year'=>$archive->year]) }}">{{ $archive->month .' '.$archive->year }}</a></li>
                @endforeach
            </ol>
          </div>

@inject('tags','App\services\TagsService') 

          <div class="sidebar-module">
            <h4>Tags</h4>
            <ol class="list-unstyled">
                
               @foreach($tags->get() as $tag) 
                
               <li><a href="{{ route('home', ['tag'=>$tag->slug]) }}">{{ $tag->name }}</a></li>
              
              @endforeach
              
            </ol>
          </div>