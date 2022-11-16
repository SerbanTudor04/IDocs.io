@inject('provider', 'App\Http\Controllers\UtilsController')


<button class="btn btn-dark"  type="button" id="items_menu" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-ellipsis"></i>
</button>
<ul class="dropdown-menu" aria-labelledby="items_menu">
    <li><a class="dropdown-item" href="{{route('logout.perform')}}">Log out</a></li>
</ul>