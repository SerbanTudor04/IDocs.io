@extends('admin.admin-master')

@section('content')
@if (in_array('P001', $rights) || ( in_array('P002', $rights)))

<link rel="stylesheet" href="{!! url('assets/css/paginate.css') !!} ">



<div class="container  px-4 mx-auto sm:px-8 ">
    <div class="py-8">
        {{-- TODO de adaugat dark mode support si functionalitatea de fetching --}}
        <div class="flex flex-row justify-between w-full mb-1 sm:mb-0">
            <h2 class="text-2xl leading-tight dark:text-white">
                Documentations
            </h2>
            <div class="text-end">
                <form class="flex flex-col justify-center w-3/4 max-w-md space-y-3 md:flex-row md:w-full md:space-x-3 md:space-y-0">
                    <div class=" relative ">
                        <input type="search" id="form-subscribe-Filter" class=" rounded-lg border-transparent dark:bg-gray-800 dark:text-white flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Filter..."/>
                        </div>
                        <button class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-blue-200" type="submit">
                            Filter
                        </button>
                    </form>
                </div>
            </div>
            <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8"><div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="overflow-hidden">
                    <table id="table__docs" class="min-w-full">
                      <thead class="bg-white dark:bg-gray-900  border-b">
                          <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 dark:text-white px-6 py-4 text-left">
                              <p class="uppercase">Name</p>
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 dark:text-white px-6 py-4 text-left">
                              <p class="uppercase">Short description</p>
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 dark:text-white px-6 py-4 text-left">
                              <p class="uppercase">Created at</p>
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 dark:text-white px-6 py-4 text-left">
                              <p class="uppercase">Created by</p>
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 dark:text-white px-6 py-4 text-left">
                              
                            </th>
                          </tr>
                        </thead>
                      <tbody id="id__docs">
                              <tr  id="loading__docs" class="bg-white  dark:bg-gray-800   border-b transition duration-300 ease-in-out hover:bg-gray-100 dark:hover:bg-blue-100">
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
                    <small class="dark:text-white">Total documentations 
                      <span id="total_docs" class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-blue-400 text-white rounded-full"></span>    
                    </small>
                  </div>
                </div>
              </div>
        </div>
    </div>
    <script>
      // get documenets
      $.ajax({
        url:"{{route('docs.get_documents')}}",
        type:"GET",
        success: function(data){          
            $("#loading__docs").remove();
            $("#total_docs").append(data.length);

            data.forEach(element => {
                    let ops_buttons=`
                        <div class="flex ">
                            <div>
                                <a href="/admin/documentations/delete/${element.id}" type="button" class="inline-block px-6 py-2 border-2 border-0  text-red-600 font-medium text-xs leading-tight uppercase rounded-full   focus:outline-none focus:ring-0 transition duration-150 ease-in-out"><i class="fa-solid fa-trash"></i></a>
                            </div>
                        </div>
                        `;

                    let el_2insert=`
                        <tr id="doc__${element.id}" class="bg-white dark:bg-gray-800 border-b transition duration-300 ease-in-out hover:bg-gray-100 dark:hover:bg-gray-600">
                            <td class="text-sm text-gray-900  dark:text-white       font-light px-6 py-4 whitespace-nowrap">
                              <p class="text-bold ">
                                ${element.name}
                              </p>
                            </td>
                            <td class="text-sm text-gray-900 dark:text-white  font-light px-6 py-4 whitespace-nowrap">
                                ${element.short_description}
                            </td>
                            <td class="text-sm text-gray-900 dark:text-white  font-light px-6 py-4 whitespace-nowrap">
                                ${element.created_at}
        
                            </td>
                            <td class="text-sm text-gray-900 dark:text-white font-light px-6 py-4 whitespace-nowrap">
                                ${element.username} (${element.created_by})

                            </td>
                            <td class="text-sm text-gray-900 dark:text-white  font-light px-6 py-4 whitespace-nowrap">
                                ${ops_buttons}
                            </td>
                        </tr>

                        
                        `;
                        $("#id__docs").append(el_2insert);
            });

        },  
        error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
          } 
      })

    </script>
    <script  src="{!! url('assets/js/paginate.min.js') !!}"></script>
    <script >
      let options = {
          numberPerPage:3,
          constNumberPerPage:2,
          numberOfPages:0,
          goBar:false,
          pageCounter:true,
          hasPagination:true,
      };
      let filterOptions = {
          el:'#form-subscribe-Filter'
      };
      paginate.init('#table__docs',options,filterOptions);
    </script>
    
    @else 
        <div class="bg-white dark:bg-gray-800 w-72 shadow-lg mx-auto rounded-xl p-4">
            <p class="text-red-600 ">
                Your access is forbident to do this action
            </p>

        </div>

    @endif
@endsection