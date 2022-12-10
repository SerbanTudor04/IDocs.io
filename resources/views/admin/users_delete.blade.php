@extends('admin.admin-master')

@section('content')
@if (in_array('P001', $rights) || (in_array('P005', $rights) && in_array('P003', $rights)))


<form action="{{route('admin.delete_users_post')}}" method="POST">
    <div class="bg-white dark:bg-gray-800 w-full rounded-xl mx-auto p-8">
        {{-- <img src="/icons/rocket.svg" class="w-10 h-10 m-auto mb-8"/> --}}
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="id" value="{{ $user->id }}" />


        <div class="w-10 h-10 m-auto mb-8">
            
            <i class="fa-solid fa-user-minus w-full md:w-2/3 m-auto text-center text-lg md:text-3xl text-red-600 "></i>
        </div>
        <p class="text-gray-600 dark:text-white w-full md:w-2/3 m-auto text-center text-lg md:text-3xl">
    
            Would you like to delete <span class="text-red-600">{{$user->username}}</span>?
        </p>
        <div class="flex items-center justify-center mt-8">
            <button type="submit" href="#" class="relative block w-full text-center  bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                    Yes
            </button>
    
        </div>

    </div>
    
</form>
@else
    <div class="bg-white dark:bg-gray-800 w-72 shadow-lg mx-auto rounded-xl p-4">
        <p class="text-red-600 ">
            Your access is forbident to do this action
        </p>

    </div>

@endif


@endsection