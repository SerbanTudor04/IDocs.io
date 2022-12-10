@extends('admin.admin-master')

@section('content')



    @if (in_array('P001',$rights) || in_array('P005',$rights))
        <div id="create_users">
            <a href="{{route('admin.create_users_view')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Create</a>
        </div>
    @endif
    

    <br><br>

    {{-- table of users --}}
    @if (in_array('P001',$rights) || (in_array('P005',$rights) && in_array('P003',$rights)))


    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <table id="table__users" class="min-w-full">
                <thead class="bg-white dark:bg-gray-900  border-b">
                    <tr>
                      <th scope="col" class="text-sm font-medium text-gray-900 dark:text-white px-6 py-4 text-left">
                        <p class="uppercase">Username</p>
                      </th>
                      <th scope="col" class="text-sm font-medium text-gray-900 dark:text-white px-6 py-4 text-left">
                        <p class="uppercase">email</p>
                      </th>
                      <th scope="col" class="text-sm font-medium text-gray-900 dark:text-white px-6 py-4 text-left">
                        <p class="uppercase">Application</p>
                      </th>
                      <th scope="col" class="text-sm font-medium text-gray-900 dark:text-white px-6 py-4 text-left">
                        <p class="uppercase">Staff</p>
                      </th>
                      <th scope="col" class="text-sm font-medium text-gray-900 dark:text-white px-6 py-4 text-left">
                        Options
                      </th>
                    </tr>
                  </thead>
                <tbody id="id__users">
                        <tr  id="loading__users" class="bg-white  dark:bg-gray-800   border-b transition duration-300 ease-in-out hover:bg-gray-100 dark:hover:bg-blue-100">
                            <td class="text-sm text-gray-900 dark:text-white font-light px-6 py-4 whitespace-nowrap">
                              <p class="text-bold ">
                                <i id="spinner_total_users" class="fas fa-spinner fa-spin"></i>
                              </p>
                            </td>
                            <td class="text-sm text-gray-900 dark:text-white font-light px-6 py-4 whitespace-nowrap">
                                <i id="spinner_total_users" class="fas fa-spinner fa-spin"></i>
            
                            </td>
                            <td class="text-sm text-gray-900 dark:text-white font-light px-6 py-4 whitespace-nowrap">
                                <i id="spinner_total_users" class="fas fa-spinner fa-spin"></i>
        
                            </td>
                            <td class="text-sm text-gray-900 dark:text-white font-light px-6 py-4 whitespace-nowrap">
                                <i id="spinner_total_users" class="fas fa-spinner fa-spin"></i>

                            </td>
                            <td class="text-sm text-gray-900 dark:text-white font-light px-6 py-4 whitespace-nowrap">
                                
                            </td>
                        </tr>

                </tbody>
              </table>
              <small>Total users 
                <span id="total_users" class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-blue-400 text-white rounded-full"></span>    
            </small>
            </div>
          </div>
        </div>
      </div>    

        <script>

        $.ajax({
                url:"/admin/api/users_mgm",
                type:"GET",
                success: function(result){
                    $("#loading__users").remove();
                    

                    result.forEach(element => {
                        let staff_badge=`
                        <span class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-red-600 text-white rounded-full">No</span>
                        `;
                        

                        if(element.is_staff==true){
                            staff_badge=`
                            <span class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-green-500 text-white rounded-full">Yes</span>
                        `;
                        }


                        let ops_buttons=`
                        <div class="flex ">
                            <div>
                                <a href="/admin/users/edit/${element.id}" type="button" class="inline-block px-6 py-2 border-2 border-blue-400 text-blue-400 font-medium text-xs leading-tight uppercase rounded-full hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">Edit</a>
                                <a href="/admin/users/delete/${element.id}" type="button" class="inline-block px-6 py-2 border-2 border-red-600 text-red-600 font-medium text-xs leading-tight uppercase rounded-full hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">Delete</a>
                            </div>
                        </div>
                        `;


                        let el_2insert=`
                        <tr id="user__${element.id}" class="bg-white dark:bg-gray-800 border-b transition duration-300 ease-in-out hover:bg-gray-100 dark:hover:bg-gray-600">
                            <td class="text-sm text-gray-900  dark:text-white       font-light px-6 py-4 whitespace-nowrap">
                              <p class="text-bold ">
                                ${element.username}
                              </p>
                            </td>
                            <td class="text-sm text-gray-900 dark:text-white  font-light px-6 py-4 whitespace-nowrap">
                                ${element.email}
                            </td>
                            <td class="text-sm text-gray-900 dark:text-white  font-light px-6 py-4 whitespace-nowrap">
                                ${element.app}
        
                            </td>
                            <td class="text-sm text-gray-900 dark:text-white font-light px-6 py-4 whitespace-nowrap">
                                ${staff_badge}

                            </td>
                            <td class="text-sm text-gray-900 dark:text-white  font-light px-6 py-4 whitespace-nowrap">
                                ${ops_buttons}
                            </td>
                        </tr>

                        
                        `;


                        
                        $("#id__users").append(el_2insert);

                    });

                    $("#total_users").append(result.length);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }     
            })


            
        </script>

    @else

        {{-- restricted --}}
        <p class="text-lg text-red-900">
            You are not allowed to see this content
        </p>
    @endif
@endsection