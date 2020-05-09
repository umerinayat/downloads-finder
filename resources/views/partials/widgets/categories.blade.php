<div class="card my-4">
  <h5 class="card-header">Categories</h5>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-12">
        <ul class="list-unstyled mb-0">

        @php
          function nestedCats ($parentCat) 
          {
            echo "<ul>";
            foreach($parentCat->subCats as $cat)
            {  @endphp
              <li><a href="{{route('categorizedPosts', ['category' => $cat->id ])}}">{{ $cat->name }}</a></li>
              @php nestedCats($cat);
            }
            echo "</ul>";
          }
        @endphp


          @foreach($categories as $cat)
            <li>
                <a href="{{route('categorizedPosts', ['category' => $cat->id ])}}">{{ $cat->name }}</a>
                {{-- @php nestedCats($cat) @endphp --}}
            </li>
          @endforeach
         

        </ul>
      </div>
      
    </div>
  </div>
</div>