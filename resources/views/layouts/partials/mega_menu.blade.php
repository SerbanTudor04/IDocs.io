@inject('provider', 'App\Http\Controllers\UtilsController')


<button class="btn btn-dark"  type="button" id="items_menu" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-bars"></i>
</button>
<ul class="dropdown-menu" aria-labelledby="items_menu">
    {{-- <li><a class="dropdown-item" href="#">Action</a></li> --}}
    @foreach ($provider::get_app_links() as $link )
        <li><a class="dropdown-item" href="{{ route($link->url) }}">{{$link->name}} <i class="{{$link->icon}}"></i></a></li>
    @endforeach

</ul>