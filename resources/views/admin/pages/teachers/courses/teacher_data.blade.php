<div class="" style="margin-top: 30px">
    @if(isset($courses_data) || !empty($courses_data ) || $courses_data->isEmpty() )
        <table id="table" class="example table table-bordered responsive nowrap text-center" cellspacing="0"
               width="70%">
            <thead>
            <tr class="greentd" style="background-color: lightgrey" >
                <th>{{trans('teachers.hash') }}</th>
                <th>{{ trans('teachers.course_name') }}</th>
                <th>{{ trans('teachers.description') }}</th>
                <th>{{ trans('teachers.age') }}</th>
                <th>{{ trans('teachers.course_section') }}</th>
                <th>{{ trans('teachers.actions') }}</th>

            </tr>
            </thead>
            <tbody>
            @php
                $x = 1;
            @endphp
            @foreach ($courses_data as $course)
                <tr>
                    <td>{{ $x++ }}</td>
                    <td>{{ $course->course->name }}</td>
                    <td>{!! $course->course->seo_head_description !!}</td>
                    <td>{{ $course->course->min_age .'-'. $course->course->max_age}}</td>
                    <td>{{ $course->course->section->name}}</td>
                    <td>
                        <div class="btn-group">
                            <a data-bs-toggle="modal" data-bs-target="#studentsModal" onclick="view_students({{ $course->course->id }})" class="btn btn-sm btn-warning" title="{{ trans('company.edit') }}">
                                <i class="bi bi-eye"></i>
                            </a>
                        </div>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>

<div class="modal fade" id="studentsModal" tabindex="-1" aria-labelledby="studentsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="studentsModalLabel">{{ trans('teachers.students_enrolled') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="table" class="example table table-bordered responsive nowrap text-center" cellspacing="0"
                    width="70%">
                    <thead>
                        <tr class="greentd" style="background-color: lightgrey">
                            <th>{{ trans('teachers.name') }}</th>
                            <th>{{ trans('teachers.email') }}</th>
                            <th>{{ trans('teachers.country') }}</th>
                            <th>{{ trans('teachers.state') }}</th>
                            <th>{{ trans('teachers.day') }}</th>
                            <th>{{ trans('teachers.start_time') }}</th>
                            <th>{{ trans('teachers.end_time') }}</th>
                            <th>{{ trans('teachers.payment_method') }}</th>
                        </tr>
                    </thead>
                    <tbody id="studentsTableBody">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ trans('teachers.close') }}</button>
            </div>
        </div>
    </div>
</div>

@section('js')
    <script>
        function view_students(id)
        {
            $.ajax({
                url: "{{ route('admin.teachers.view_students', ['id' => '__id__']) }}".replace('__id__', id),
                type: "get",
                success: function (response) {
                    var students = response;
                    var tableBody = $('#studentsTableBody');
                    tableBody.empty();
                    students.forEach(function(studentCourse) {
                        var row = `
                            <tr>
                                <td>${studentCourse.student.name}</td>
                                <td>${studentCourse.student.email}</td>
                                <td>${studentCourse.student.country}</td>
                                <td>${studentCourse.student.state}</td>
                                <td>${studentCourse.day}</td>
                                <td>${studentCourse.start_time}</td>
                                <td>${studentCourse.end_time}</td>
                                <td>${studentCourse.payment_method}</td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                },
            });
        }
    </script>

@endsection



