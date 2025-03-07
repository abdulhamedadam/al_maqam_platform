@extends('admin.layouts.master')
@section('css')

@endsection
@section('toolbar')
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        @php
            $title = trans('Toolbar.about_us');
         $breadcrumbs = [
                  ['label' => trans('Toolbar.home'), 'link' =>''],
                  ['label' => trans('Toolbar.about_us'), 'link' => ''],
                  ['label' => trans('Toolbar.about_us_list'), 'link' => ''],


                  ];

          PageTitle($title, $breadcrumbs);
        @endphp


        <div class="d-flex align-items-center gap-2 gap-lg-3">
            {{ AddButton(route('admin.about_us.create')) }}


        </div>
    </div>
@endsection

@section('content')

    <div id="kt_app_content_container" class="t_container"
         style="">

        <div class="card shadow-sm" style="border-top: 3px solid #007bff;">


            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title">
                    <h2>{{ trans('about_us.about_us_list') }}</h2>
                </div>

            </div>


            <div class="card-body">
                <div class="card-body">
                    <div class="">

                        {{-- views/admin/categories/index.blade.php --}}
                        <table id="table1" class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="text-align: center;">{{trans('about_us.id')}}</th>
                                <th style="text-align: center;">{{trans('about_us.title')}}</th>
                                <th style="text-align: center;">{{trans('about_us.description')}}</th>
                                <th style="text-align: center;">{{trans('about_us.our_mission')}}</th>
                                <th style="text-align: center;">{{trans('about_us.our_experience')}}</th>
                                <th style="text-align: center;">{{trans('about_us.our_vision')}}</th>
                                <th style="text-align: center;">{{trans('about_us.meta_title')}}</th>
                                <th style="text-align: center;">{{trans('about_us.meta_description')}}</th>
                                <th style="text-align: center;">{{trans('about_us.meta_keywords')}}</th>
                                <th style="text-align: center;">{{trans('about_us.image')}}</th>
                                <th style="text-align: center;">{{trans('about_us.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($all_data as $item)
                                <tr>

                                    <td style="text-align: center;">{{ $item->id }}</td>
                                    <td style="text-align: center;">
                                        {{ $item->title ??  '-' }}
                                    </td>
                                    <td style="text-align: center;">{{ strip_tags($item->description) }}</td>
                                    <td style="text-align: center;">{{ strip_tags($item->our_mission) }}</td>
                                    <td style="text-align: center;">{{ strip_tags($item->our_experience) }}</td>
                                    <td style="text-align: center;">{{ strip_tags($item->our_vision) }}</td>
                                    <td style="text-align: center;">{{ strip_tags($item->meta_title) }}</td>
                                    <td style="text-align: center;">{{ strip_tags($item->meta_description) }}</td>

                                    <td style="text-align: center;">{{ $item->meta_keywords }}</td>

                                    @php

                                        $imagePath = asset('images/' . $item->image);
                                    @endphp
                                    <td style="text-align: center;">
                                        <img src="{{ $imagePath }}" class="img-thumbnail" style="width: 50px; height: 50px; cursor: pointer;" onclick="showImagePopup('{{ $imagePath }}')">
                                    </td>
                                    <td style="text-align: center;">
                                        <a href="{{ route('admin.about_us.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                            <i class="bi bi-pencil"></i> {{ trans('about_us.edit') }}
                                        </a>
                                        <form action="{{ route('admin.about_us.destroy', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ trans('about_us.delete_confirm') }}');">
                                                <i class="bi bi-trash"></i> {{ trans('about_us.delete') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>


                    </div>
                </div>


            </div>


        </div>
    </div>


@endsection

@section('js')

    <script>

        $(document).ready(function () {
            table = $('#table1').DataTable({
                "language": {
                    url: "{{ asset('assets/Arabic.json') }}"
                },
                "processing": true,
                "serverSide": false,
                "order": [],
                "columns": [
                    {data: 'id', className: 'text-center no-export'},
                    {data: 'title', className: 'text-center'},
                    {data: 'description', className: 'text-center'},
                    {data: 'our_mission', className: 'text-center'},
                    {data: 'our_experience', className: 'text-center'},
                    {data: 'our_vision', className: 'text-center'},
                    {data: 'meta_title', className: 'text-center'},
                    {data: 'meta_description', className: 'text-center'},
                    {data: 'meta_keywords', className: 'text-center'},
                    {data: 'image', className: 'text-center'},
                    {data: 'action', name: 'action', orderable: false, className: 'text-center no-export'},
                ],
                "columnDefs": [
                    {
                        "targets": [1, -1], //last column
                        "orderable": false, //set not orderable
                    },
                    {
                        "targets": [1],
                        "createdCell": function (td, cellData, rowData, row, col) {
                            $(td).css({
                                'font-weight': '600',
                                'text-align': 'center',
                                'color': '#6610f2',

                                'vertical-align': 'middle',
                            });
                        }
                    },
                    {
                        "targets": [3],
                        "createdCell": function (td, cellData, rowData, row, col) {
                            $(td).css({
                                'font-weight': '600',
                                'text-align': 'center',
                                'vertical-align': 'middle',
                            });
                        }
                    },
                    {
                        "targets": [2, 4],
                        "createdCell": function (td, cellData, rowData, row, col) {
                            $(td).css({
                                'font-weight': '600',
                                'text-align': 'center',
                                'color': 'green',
                                'vertical-align': 'middle',
                            });
                        }
                    },


                ],
                "order": [],
                "dom": '<"row align-items-center"<"col-md-3"l><"col-md-6"f><"col-md-3"B>>rt<"row align-items-center"<"col-md-6"i><"col-md-6"p>>',
                "buttons": [
                    {
                        "extend": 'excel',

                    },
                    {
                        "extend": 'copy',

                    },
                    {
                        "extend": 'print',

                    }
                ],

                "language": {
                    "lengthMenu": "عرض _MENU_ سجلات",
                    "zeroRecords": "لا توجد سجلات",
                    "info": "عرض الصفحة _PAGE_ من _PAGES_",
                    "infoEmpty": "لا توجد سجلات",
                    "infoFiltered": "(مرشح من _MAX_ إجمالي السجلات)",
                    "search": "بحث:",
                    "paginate": {
                        "first": "الأول",
                        "last": "الأخير",
                        "next": "التالي",
                        "previous": "السابق"
                    }
                },
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "الكل"]],
            });

            $("input").change(function () {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("textarea").change(function () {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("select").change(function () {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
        });
    </script>
    <script>
        function showImagePopup(imageSrc) {
            // Create a div for the modal background
            let modal = document.createElement("div");
            modal.style.position = "fixed";
            modal.style.top = "0";
            modal.style.left = "0";
            modal.style.width = "100%";
            modal.style.height = "100%";
            modal.style.backgroundColor = "rgba(0,0,0,0.8)";
            modal.style.display = "flex";
            modal.style.justifyContent = "center";
            modal.style.alignItems = "center";
            modal.style.zIndex = "1000";

            // Create an image element
            let img = document.createElement("img");
            img.src = imageSrc;
            img.style.maxWidth = "90%";
            img.style.maxHeight = "90%";
            img.style.borderRadius = "10px";
            img.style.boxShadow = "0 4px 8px rgba(255,255,255,0.2)";

            // Close modal on click
            modal.onclick = function () {
                document.body.removeChild(modal);
            };

            modal.appendChild(img);
            document.body.appendChild(modal);
        }
    </script>

    <script>
        $(document).on('click', '.change-status', function() {
            var user_id = $(this).data('id');
            var status = $(this).data('status');
            var button = $(this);

            $.ajax({
                url: "{{ route('admin.about_us.change_status') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: user_id,
                    status: status
                },
                success: function(response) {
                    if (status == 1) {
                        button.removeClass('btn-danger').addClass('btn-success').text("{{ trans('users.active') }}");
                        button.data('status', 0);
                    } else {
                        button.removeClass('btn-success').addClass('btn-danger').text("{{ trans('users.not_active') }}");
                        button.data('status', 1);
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        });
    </script>


@endsection
