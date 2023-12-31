<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-10">
                <h2 class="text-3xl font-bold text-theme-primary-100 dark:text-white">
                    All Diagnoses
                </h2>
                @can("$permission-create")
                <div
                    class="lg:absolute lg:inset-y-0 lg:right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <div class="relative ml-3">
                        <div>
                            <x-primary-link class="ml-3" :href="route('admin.diagnoses.create')">
                                Create Diagnoses
                            </x-primary-link>
                        </div>
                    </div>
                </div>
                @endcan
            </div>
        </div>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-theme-primary-700 border border-theme-success-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="p-6 text-gray-900">
                    <div class="card">
                        <div class="card-header">
                            <div class="heading-1 py-3">
                                <h2 class="text-2xl font-bold text-theme-primary-100 dark:text-white">
                                    Create Diagnoses
                                </h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="w-full" action="{{ route('admin.diagnoses.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full lg:w-10/12 px-3 mb-6 lg:mb-3">
                                                <label
                                                    class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                                    {{ __('Diagnoses') }}
                                                </label>
                                                <input required="required" name="diagnoses"
                                                    value="{{ old('diagnoses') }}"
                                                    class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                                    type="text"
                                                    placeholder="{{ __('Please enter diagnoses here') }}...">
                                                @error('name')
                                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                                @enderror

                                            </div>
                                            <div class="flex items-center justify-between w-2/12 -mx-3 mb-2 my-5 px-3 ">
                                                <x-primary-button
                                                    class="w-full text-center flex justify-center rounded-lg border border-theme-success-200"
                                                    style="line-height: 1.50rem;">
                                                    {{ __('Create') }}
                                                </x-primary-button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-theme-primary-700 border border-theme-success-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="p-6 text-gray-900">
                    <div class="card">
                        <div class="card-header">
                            <div class="heading-1 py-3">
                                <h2 class="text-2xl font-bold text-theme-primary-100 dark:text-white">
                                    Diagnoses
                                </h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="ajax-datatable" class=" shadow-md sm:rounded-lg">
                                <table id="diagnoses-datatable" class="w-full text-sm text-left text-gray-200 dark:text-theme-primary-100">
                                    <thead class="text-xs text-white uppercase bg-theme-primary-300 dark:text-white">
                                        <tr>
                                            {{-- <th scope="col" class="rounded-l-lg px-3 py-3 w-1/6" style="text-align: center;">{{ __('#') }}</th> --}}
                                            <th scope="col" class="px-3 py-3 w-1/6" style="text-align: center;">{{ __('Diagnoses') }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/6" style="text-align: center;">{{ __('Created At') }}</th>
                                            <th scope="col" class="rounded-r-lg px-3 py-3 w-1/6 text-center" style="text-align: center;">{{
                                                __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    {{-- <tbody>
                                        @foreach ($diagnoses as $key => $item)
                                        <tr>
                                            <th scope="col" class="px-3 py-3 w-1/5">{{ $key+1 }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/12">{{ $item->diagnoses }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/6">{{ date('d-m-Y',
                                                strtotime($item->created_at));}}</th>
                                            <th scope="col" class="px-3 py-3 w-1/6 text-center">
                                                <a href="javascript:void(0);" onclick="detailsInfo(this)"
                                                    data-id="{{ $item->id }}" data-modal-target="authentication-modal"
                                                    data-modal-toggle="authentication-modal" type="button"
                                                    class="font-medium text-theme-success-200 dark:text-blue-500 hover:underline">
                                                    <svg class="w-6 h-6 text-theme-success-200 dark:text-white"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor" viewBox="0 0 20 18">
                                                        <path
                                                            d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                                                        <path
                                                            d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                                                    </svg>
                                                </a>
                                                <a href="{{route('admin.diagnoses.destroy',$item->id)}}"
                                                    data-modal-target="authentication-modal"
                                                    data-modal-toggle="authentication-modal" type="button"
                                                    class="font-medium text-theme-success-200 dark:text-blue-500 hover:underline">
                                                    <svg class="w-6 h-6 text-theme-danger-500 dark:text-white"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 18 20">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                                                    </svg>
                                                </a>
                                            </th>
                                        </tr>
                                        @endforeach
                                    </tbody> --}}
                                </table>
                            </div>
                        </div>
                        {{-- {{ $diagnoses->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="popup-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-theme-primary-700 rounded-lg shadow dark:bg-gray-700">
                <button type="button" id="hide-modal"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8 content-center">
                    <div id="popup-modal-content">

                    </div>
                    {{-- @php
                    $diagnose = 6
                    @endphp
                    <form class="w-full" action="{{ route('admin.diagnoses.update',$diagnose) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-6">
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full lg:w-2/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                            {{ __('Diagnoses') }}
                                        </label>
                                        <input required="required" name="diagnoses" value="{{ old('diagnoses') }}"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="text" placeholder="{{ __('Please enter diagnoses here') }}...">
                                        @error('name')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>
                                <div class="flex items-center justify-between -mx-3 mb-2 my-5 px-3">

                                    <x-primary-button>
                                        {{ __('Update') }}
                                    </x-primary-button>
                                </div>
                            </div>
                        </div>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script>
        $(document).ready(function() {
                        "use strict";
                        var diagnoses_table = $('#diagnoses-datatable').DataTable({
                            responsive: true,

                            "aaSorting": [
                                [0, "asc"]
                            ],
                            "columnDefs": [{
                                "bSortable": false,
                                "aTargets": []
                            },
                            {
                                className: "text-center",
                                targets: [0, 1]
                            },
                            {
                                "targets": [-1],
                                "createdCell": function(td, cellData, rowData, row, col) {
                                    $(td).eq(-1).addClass('flex justify-center text-center');
                                }
                            }
                         ],
                            'processing': true,
                            'serverSide': true,


                            'lengthMenu': [
                                [10, 25, 50, 100, 250, 500, 1000],
                                [10, 25, 50, 100, 250, 500, "All"]
                            ],

                            dom: '<"flex flex-row items-center justify-between"<"filter"l><"filter"f>>rtip',
                            buttons: [{
                                extend: "copy",
                                exportOptions: {
                                    columns: [0, 1] //Your Colume value those you want
                                },
                                className: "btn-sm prints"
                            }, {
                                extend: "csv",
                                title: "ProductList",
                                exportOptions: {
                                    columns: [0, 1] //Your Colume value those you want print
                                },
                                className: "btn-sm prints"
                            }, {
                                extend: "excel",
                                exportOptions: {
                                    columns: [0, 1] //Your Colume value those you want print
                                },
                                title: "ProductList",
                                className: "btn-sm prints"
                            }, {
                                extend: "pdf",
                                exportOptions: {
                                    columns: [0, 1] //Your Colume value those you want print
                                },
                                title: "ProductList",
                                className: "btn-sm prints"
                            }, {
                                extend: "print",
                                exportOptions: {
                                    columns: [0, 1] //Your Colume value those you want print
                                },
                                title: "<center>DiagnosesList</center>",
                                className: "btn-sm prints"
                            }],

                            'serverMethod': 'post',
                            'ajax': {
                                'headers': {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                'url': "{{ route('admin.diagnoses.list') }}",
                                'data': function(data) {}
                            },
                            'columns': [
                                {
                                    data: 'diagnoses'
                                },
                                {
                                    data: 'created_at'
                                },
                                {
                                    data: 'options'
                                },
                            ],
                             "drawCallback": function() {
                            console.log('object')
                            console.log($('.paginate_button.current'))
                            $('.paginate_button.current').addClass('bg-theme-primary-100').removeClass(
                                'bg-theme-primary-500');
                            $('#diagnoses-datatable_previous').addClass(
                                'flex items-center justify-center h-full py-1.5 px-3  text-gray-200 bg-theme-primary-500 rounded-l-lg border border-theme-success-200 cursor-auto'
                                ).removeClass('paginate_button');
                            $('#diagnoses-datatable_next').addClass(
                                'flex items-center justify-center  py-1.5 px-3 leading-tight text-gray-200 bg-theme-primary-500 rounded-r-lg border border-theme-success-200 hover:bg-theme-primary-300 hover:text-theme-primary-100 '
                                ).removeClass('paginate_button');
                            $('.dataTables_paginate > span a').addClass(
                                'active flex items-center inline-flex justify-center  py-2 px-3 leading-tight text-gray-200 bg-theme-primary-500 border border-theme-success-200 hover:bg-theme-primary-300 hover:text-theme-primary-100 '
                                ).removeClass('paginate_button');
                            $('.active.current').addClass('bg-theme-primary-300').removeClass(
                                'bg-theme-primary-500');
                        }

                        });

                        var searchInput = $('input[type="search"]').addClass(
                        'bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5  placeholder-theme-primary-100 '
                        ).attr('placeholder', 'Search diagnoses');
                        var searchLabel = $('label[for="' + searchInput.attr('id') + '"]')
                            .addClass('text-theme-primary-100');
                        // paging_simple_numbers
                        var lengthSelect = $('.dataTables_length').find('select')
                            .addClass('bg-theme-primary-700 text-theme-primary-100 border border-theme-success-200');
                        var lengthLabel = $('.dataTables_length').find('label')
                            .addClass('text-theme-primary-100');

                        var searchLabel = $('.dataTables_filter').find('label')
                            .addClass('text-theme-primary-100');
                        var totalShow = $('#diagnoses-datatable_info')
                            .addClass('text-theme-primary-100');

                        var lengthOptions = $('.dataTables_length').find('select option')
                            .addClass('text-theme-primary-100');

                        var paginatButton = $('#diagnoses-datatable_paginate')
                            .addClass('inline-flex');


                    $('#diagnoses-datatable_processing').hide();

                    $('#diagnoses-datatable')
                        .on('preXhr.dt', function(e, settings, data) {
                            $('#diagnoses-datatable_processing').show();
                        })

                        .on('xhr.dt', function(e, settings, json, xhr) {
                            $('#diagnoses-datatable_processing').hide();
                        });

                    });


        function detailsInfo(element) {
                const $targetEl = document.getElementById('popup-modal');
                const modal = new Modal($targetEl);
                $('#popup-modal-content').html('');

                var id = $(element).data('id');
                // console.log(id);

                modal.show();

                // Assuming you have a route like 'admin.diagnoses.details'
                $.get('{{ route('admin.diagnoses.modal', ':id') }}'.replace(':id', id), function (data) {
                    $('#popup-modal-content').html(data);

                    $('#hide-modal').click(function (e) {
                        e.preventDefault();
                        modal.hide();
                    });
                });
            }
    </script>
    @endsection
</x-app-layout>
