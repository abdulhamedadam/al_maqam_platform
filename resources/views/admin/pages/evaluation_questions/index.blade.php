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
            $title = trans('evaluation_questions.title');
            $breadcrumbs = [
                ['label' => trans('Toolbar.home'), 'link' => ''],
                ['label' => trans('Toolbar.evaluation_questions'), 'link' => route('admin.evaluation_questions.index')],
            ];
            PageTitle($title, $breadcrumbs);
        @endphp

        <div class="d-flex align-items-center gap-2 gap-lg-3">
            {{ AddButton(route('admin.evaluation_questions.create')) }}
        </div>
    </div>
@endsection

@section('content')
    <div id="kt_app_content_container" class="app-container container-xxxl">
        <div class="card shadow-sm" style="border-top: 3px solid #007bff;">
            @php
                $headers = [
                    'evaluation_questions.id',
                    'evaluation_questions.question',
                    'evaluation_questions.type',
                    'evaluation_questions.answer_type',
                    'evaluation_questions.is_required',
                    'evaluation_questions.course',
                    'evaluation_questions.status',
                    'evaluation_questions.actions',
                ];
                generateTable($headers);
            @endphp
        </div>
    </div>
@stop

@section('js')
<script>
    $(document).ready(function () {
        $('#table1').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.evaluation_questions.index') }}",
            language: {
                url: "{{ asset('assets/Arabic.json') }}"
            },
            columns: [
                { data: 'id', className: 'text-center' },
                { data: 'question', className: 'text-center' },
                { data: 'type', className: 'text-center' },
                { data: 'answer_type', className: 'text-center' },
                { data: 'is_required', className: 'text-center' },
                { data: 'course_name', className: 'text-center' },
                { data: 'is_active', className: 'text-center' },
                { data: 'action', className: 'text-center', orderable: false, searchable: false }
            ],
            dom: '<"row align-items-center"<"col-md-3"l><"col-md-6"f><"col-md-3"B>>rt<"row align-items-center"<"col-md-6"i><"col-md-6"p>>',
            buttons: ['excel', 'copy', 'print'],
            lengthMenu: [
                [10, 5, 25, 50, -1],
                [10, 5, 25, 50, "الكل"]
            ],
        });
    });

    function confirmDelete(id) {
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
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }

    function toggleStatus(id) {
        $.ajax({
            url: '{{ route("admin.evaluation_questions.change_status") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: function (response) {
                $('#table1').DataTable().ajax.reload(null, false);
            }
        });
    }
</script>
@endsection
