<div class="" style="margin-top: 30px">
    @if(isset($courses_data) && $courses_data->isNotEmpty())
        <table id="table" class="example table table-bordered responsive nowrap text-center" cellspacing="0"
                width="70%">
            <thead>
            <tr class="greentd" style="background-color: lightgrey" >
                <th>{{trans('students.hash') }}</th>
                <th>{{ trans('students.course_name') }}</th>
                <th>{{ trans('students.description') }}</th>
                <th>{{ trans('students.age') }}</th>
                <th>{{ trans('students.course_section') }}</th>
                <th>{{ trans('students.num_of_lectures') }}</th>
                <th>{{ trans('students.total_price') }}</th>
                <th>{{ trans('students.actions') }}</th>

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
                    <td>{{ $course->money->num_of_lectures}}</td>
                    <td>{{ $course->money->total_price}}</td>
                    <td>
                        <div class="btn-group">
                            <a data-bs-toggle="modal" data-bs-target="#studentsModal" onclick="view_teachers('{{ $course->course_id }}', '{{ $course->money_id }}')" class="btn btn-sm btn-warning" title="{{ trans('company.edit') }}">
                                <i class="bi bi-eye"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info d-flex align-items-center justify-content-center">
            {{ trans('students.no_courses_found') }}
        </div>
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
                            <th>{{ trans('students.name') }}</th>
                            <th>{{ trans('students.email') }}</th>
                            <th>{{ trans('students.country') }}</th>
                            <th>{{ trans('students.state') }}</th>
                            <th>{{ trans('students.day') }}</th>
                            <th>{{ trans('students.start_time') }}</th>
                            <th>{{ trans('students.end_time') }}</th>
                            <th>{{ trans('students.payment_method') }}</th>
                        </tr>
                    </thead>
                    <tbody id="teachersTableBody">

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
        function view_teachers(courseId, moneyId)
        {
            $.ajax({
                url: "{{ route('admin.students.view_teachers', ['courseId' => '__courseId__', 'moneyId' => '__moneyId__']) }}"
                .replace('__courseId__', courseId)
                .replace('__moneyId__', moneyId),
                type: "get",
                success: function (response) {
                    var teachers = response;
                    var tableBody = $('#teachersTableBody');
                    tableBody.empty();
                    teachers.forEach(function(teacherCourse) {
                        let formattedStartTime = formatTime(teacherCourse.start_time);
                        let formattedEndTime = formatTime(teacherCourse.end_time);
                        var row = `
                            <tr>
                                <td>${teacherCourse.teacher.name}</td>
                                <td>${teacherCourse.teacher.email}</td>
                                <td>${teacherCourse.teacher.country}</td>
                                <td>${teacherCourse.teacher.state}</td>
                                <td>${teacherCourse.day}</td>
                                <td>${formattedStartTime}</td>
                                <td>${formattedEndTime}</td>
                                <td>${teacherCourse.payment_method}</td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                },
            });
        }
        function formatTime(time) {
            if (!time) return '';
            let [hours, minutes] = time.split(':');
            let date = new Date();
            date.setHours(hours);
            date.setMinutes(minutes);
            let formattedTime = date.toLocaleTimeString('en-US', {
                hour: '2-digit',
                minute: '2-digit',
                hour12: true
            });

            return formattedTime.replace('AM', 'ص').replace('PM', 'م');
        }
    </script>

@endsection



