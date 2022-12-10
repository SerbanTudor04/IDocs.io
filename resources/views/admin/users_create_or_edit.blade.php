@extends('admin.admin-master')

@section('content')


    @if (in_array('P001', $rights) || (in_array('P005', $rights) && in_array('P003', $rights)))
        <div class="container max-w-full mx-auto md:py-24 px-6">
            <div class="max-w-sm  bg-white rounded-xl dark:bg-gray-800 mx-auto px-6">
                <div class="relative  flex flex-wrap">
                    <div class="w-full relative">
                        <div class="md:mt-6">
                            <div class="text-center font-semibold text-black dark:text-white">
                                Users Management
                            </div>
                            <div class="text-center font-base text-black dark:text-white">
                                @if ($id)
                                    Edit user
                                @else
                                    Create a new user
                                @endif
                            </div>
                            <form class="mt-8 mb-3" id="users__edit__or__create">
                                <input id="csrf__token" type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <div class="mx-auto max-w-lg ">
                                    <div class="py-1">
                                        <span class="px-1 text-sm text-blue-600">Username</span>
                                        <input id="users__form__username" placeholder="" type="text"
                                            class="text-md block px-3 py-2 rounded-lg w-full
                          bg-white dark:bg-gray-800 dark:text-white  border-2 border-blue-300 placeholder-blue-600 shadow-md focus:placeholder-blue-500 focus:bg-white dark:focus:bg-gray-800  focus:border-blue-600 focus:outline-none">
                                    </div>
                                    <div class="py-1">
                                        <span class="px-1 text-sm text-blue-600">Full name</span>
                                        <input id="users__form__name" placeholder="" type="text"
                                            class="text-md block px-3 py-2 rounded-lg w-full
                        bg-white dark:bg-gray-800 dark:text-white  border-2 border-blue-300 placeholder-blue-600 shadow-md focus:placeholder-blue-500 focus:bg-white dark:focus:bg-gray-800  focus:border-blue-600 focus:outline-none">
                                    </div>
                                    <div class="py-1">
                                        <span class="px-1 text-sm text-blue-600">Email</span>
                                        <input id="users__form__email" placeholder="" type="email"
                                            class="text-md block px-3 py-2 rounded-lg w-full
                          bg-white dark:bg-gray-800 dark:text-white  border-2 border-blue-300 placeholder-blue-600 shadow-md focus:placeholder-blue-500 focus:bg-white dark:focus:bg-gray-800 focus:border-blue-600 focus:outline-none">
                                    </div>


                                    <div class="py-1">
                                        <span class="px-1 text-sm text-blue-600">Application</span>
                                        <select id="users__form__apps"
                                            class="text-md block px-3 py-2 rounded-lg w-full
                                            bg-white dark:bg-gray-800 dark:text-white  border-2 border-blue-300 placeholder-blue-600 shadow-md focus:placeholder-blue-500 focus:bg-white dark:focus:bg-gray-800 focus:border-blue-600 focus:outline-none">

                                        </select>
                                    </div>



                                    <div class="py-1">
                                        <span class="px-1 text-sm text-blue-600">Password</span>
                                        <input id="users__form__password" placeholder="" type="password"
                                            class="text-md block px-3 py-2 rounded-lg w-full
                          bg-white dark:bg-gray-800 dark:text-white  border-2 border-blue-300 placeholder-blue-600 shadow-md focus:placeholder-blue-500 focus:bg-white dark:focus:bg-gray-800 focus:border-blue-600 focus:outline-none">
                                    </div>

                                    <div class="py-1">
                                        <input id="default-checkbox" type="checkbox" value=""
                                            class="w-4 h-4 text-blue-600 bg-gray-100 dark:bg-gray-800  rounded border-gray-300  dark:border-gray-800 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-blue-700 dark:border-blue-600">
                                        <label for="default-checkbox"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-white">Is
                                            staff?</label>
                                    </div>



                                    @if ($id)
                                        <button id="edit__user__submit"
                                            class="mt-3 text-lg font-semibold
                                                bg-blue-500 hover:bg-blue-700 w-full text-white rounded-lg
                        px-6 py-3 block shadow-xl hover:text-white ">
                                            Modify user

                                        </button>
                                    @else
                                        <button id="create__user__submit"
                                            class="mt-3 text-lg font-semibold
                                                bg-blue-500 hover:bg-blue-70 w-full text-white rounded-lg
                                      px-6 py-3 block shadow-xl hover:text-white ">
                                            Create user
                                        </button>
                                    @endif
                                    <small class="text-gray-400">Permisions management coming soon.</small>
                                    
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $.ajax({
                url: "/admin/api/users_mgm_edit/get_apps",
                type: "GET",
                success: function(results) {
                    results.forEach(element => {


                        let option = `<option value="${element.id}">${element.name}</option>`
                        $('#users__form__apps').append(option)
                    });
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            })



            let user_id = "{{ $id }}"
            console.log(user_id)


            if (user_id.length > 0) {
                console.log("Getting users info")
                $.ajax({
                    url: "/admin/api/users_mgm_edit/{{ $id }}",
                    type: "GET",
                    success: function(result) {
                        console.log(result[0])
                        $("#users__form__apps").val(result[0].app_id)
                        $("#users__form__username").val(result[0].username)
                        $("#users__form__name").val(result[0].name)
                        $("#users__form__email").val(result[0].email)
                        $("#users__form__password").val("passwordsuperstrong")
                        $("#default-checkbox").prop("checked", result[0].is_staff)

                        // default-checkbox

                    },
                    error: function(xhr, resp, text) {
                        console.log(xhr, resp, text);
                    }
                })


            }

            $("#users__edit__or__create").submit(function(e) {
                e.preventDefault();

                var formData = {
                    app_id: $("#users__form__apps").val(),
                    username: $("#users__form__username").val(),
                    name: $("#users__form__name").val(),
                    email: $("#users__form__email").val(),
                    password: $("#users__form__password").val(),
                    is_staff: $("#default-checkbox").prop("checked"),
                    _token: $("#csrf__token").val()
                }
                if (user_id.length > 0) {
                    $.ajax({
                        type: "POST",
                        url: `/admin/api/users_mgm/edit/${user_id}`,
                        data: formData,
                        dataType: "json",
                        encode: true,
                    }).done(function(data) {
                        $(location).prop('href', '/admin/users')

                    });


                } else {
                    $.ajax({
                        type: "POST",
                        url: `/admin/api/users_mgm/create`,
                        data: formData,
                        dataType: "json",
                        encode: true,
                    }).done(function(data) {
                        $(location).prop('href', '/admin/users')
                    });

                }

            });
        </script>
    @endif


@endsection
