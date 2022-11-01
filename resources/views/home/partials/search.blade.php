<form action="{{ route('home.results') }}" method="GET">
    <div class="input-group">
        @if ($q)
            <input id="search-focus" type="search" name="q" value="{{ $q }}"  placeholder="Type your curiosity and let us find the documentations" class="form-control " />
        @else
        <input id="search-focus" type="search" name="q" value="{{ old('q')}}"  placeholder="Type your curiosity and let us find the documentations" class="form-control " />
        
        @endif
        <div class="btn-group" role="group" aria-label="Basic example">

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i>
              </button>
              <a href="{{route('documents.add_show')}}" class="btn btn-primary">
                Add Document <i class="fa fa-plus"></i>
      
              </a>
        </div>

    </div>    
</form>