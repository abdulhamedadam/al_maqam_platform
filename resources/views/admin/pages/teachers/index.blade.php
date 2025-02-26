@extends('admin.layouts.master')
<style>
    .btn:not(.btn-outline):not(.btn-dashed):not(.border-hover):not(.border-active):not(.btn-flush):not(.btn-icon).btn-sm,
    .btn-group-sm>.btn:not(.btn-outline):not(.btn-dashed):not(.border-hover):not(.border-active):not(.btn-flush):not(.btn-icon) {
        padding: 10px 12px !important;
    }
    #table1 {
        font-size: small !important;
    }
</style>

@section('toolbar')
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        @php
            $title = trans('students.teachers');
            $breadcrumbs = [
                ['label' => 'Home', 'link' => ''],
                ['label' => 'Teachers', 'link' => ''],
                ['label' => 'Index', 'link' => ''],
            ];

            PageTitle($title, $breadcrumbs);
        @endphp


        @if ($status == \App\Enums\TeacherStatus::Approved->value)
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                {{ AddButton(route('admin.teachers.create')) }}
            </div>
        @endif
    </div>

@endsection

@section('content')

    <div id="kt_app_content_container" class="app-container container-xxxl">

        <div class="card shadow-sm" style="border-top: 3px solid #007bff;">
            @php
                $headers = [
                    'teachers.id',
                    'teachers.name',
                    'teachers.email',
                    'teachers.phone',
                    'teachers.birthday',
                    'teachers.gender',
                    'teachers.country',
                    'teachers.state',
                    'actions.actions',
                ];

                generateTable($headers);
            @endphp
        </div>

    </div>
@stop
@section('js')

    <script>
        $(document).ready(function() {
            //datatables
            table = $('#table1').DataTable({
                "language": {
                    url: "{{ asset('assets/Arabic.json') }}"
                },
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "{{ route('admin.teachers.index') }}?status=" + "{{ request('status') }}",
                    type: 'GET'
                },
                "columns": [
                    {
                        data: 'id',
                        className: 'text-center no-export'
                    },
                    {
                        data: 'name',
                        className: 'text-center'
                    },
                    {
                        data: 'email',
                        className: 'text-center'
                    },
                    {
                        data: 'phone',
                        className: 'text-center'
                    },
                    {
                        data: 'birthday',
                        className: 'text-center'
                    },
                    {
                        data: 'gender',
                        className: 'text-center'
                    },
                    {
                        data: 'country',
                        className: 'text-center'
                    },
                    {
                        data: 'state',
                        className: 'text-center'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        className: 'text-center no-export'
                    },
                ],

                "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                },

                ],
                "order": [],
                "dom": '<"row align-items-center"<"col-md-3"l><"col-md-6"f><"col-md-3"B>>rt<"row align-items-center"<"col-md-6"i><"col-md-6"p>>',
                "buttons": [{
                    "extend": 'excel',
                    ////  "text": '<i class="bi bi-file-earmark-excel"></i>إكسل',
                    // "className": 'btn btn-dark'
                },
                    {
                        "extend": 'copy',
                        //  "text": '<i class="bi bi-clipboard"></i>نسخ',
                        //   "className": 'btn btn-primary'
                    },
                    {
                        "extend": 'print',
                        //  "text": '<i class="bi bi-clipboard"></i>نسخ',
                        //   "className": 'btn btn-primary'
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
                "lengthMenu": [
                    [10, 5, 25, 50, -1],
                    [10, 5, 25, 50, "الكل"]
                ],
            });

            $("input").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("textarea").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("select").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
        });
    </script>

    <script>
        function confirmDelete(teacherId) {
            Swal.fire({
                title: '{{ trans('employees.confirm_delete') }}',
                text: '{{ trans('clients.delete_warning') }}',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: '{{ trans('employees.yes_delete') }}',
                cancelButtonText: '{{ trans('employees.cancel') }}'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + teacherId).submit();
                }
            });
        }
    </script>
    <script>
        function showImagePopup(imageUrl) {
            const popup = document.createElement('div');
            popup.style.position = 'fixed';
            popup.style.top = '50%';
            popup.style.left = '50%';
            popup.style.transform = 'translate(-50%, -50%)';
            popup.style.backgroundColor = '#fff';
            popup.style.padding = '10px';
            popup.style.border = '1px solid #ccc';
            popup.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.2)';
            popup.style.zIndex = 1000;

            const img = document.createElement('img');
            img.src = imageUrl;
            img.style.maxWidth = '90vw';
            img.style.maxHeight = '90vh';

            const closeBtn = document.createElement('button');
            closeBtn.textContent = 'Close';
            closeBtn.style.marginTop = '10px';
            closeBtn.style.cursor = 'pointer';
            closeBtn.onclick = () => {
                document.body.removeChild(popup);
            };

            popup.appendChild(img);
            popup.appendChild(closeBtn);
            document.body.appendChild(popup);
        }
    </script>

@endsection
