<div class="" style="margin-top: 30px">
    @if(isset($students_data) && $students_data->isNotEmpty() )
        <table id="table" class="example table table-bordered responsive nowrap text-center" cellspacing="0"
            width="70%">
            <thead>
            <tr class="greentd" style="background-color: lightgrey" >
                <th>{{trans('teachers.hash') }}</th>
                <th>{{ trans('teachers.name') }}</th>
                <th>{{ trans('teachers.email') }}</th>
                <th>{{ trans('teachers.phone') }}</th>
                <th>{{ trans('teachers.gender') }}</th>
                <th>{{ trans('teachers.country') }}</th>
                <th>{{ trans('teachers.state') }}</th>
                <th>{{ trans('teachers.actions') }}</th>
            </tr>
            </thead>
            <tbody>
            @php
                $x = 1;
            @endphp
            @foreach ($students_data as $student)
                <tr>
                    <td>{{ $x++ }}</td>
                    <td>{{ $student->student->name }}</td>
                    <td>{{ $student->student->email }}</td>
                    <td>{{ $student->student->phone }}</td>
                    <td>{{ $student->student->gender == 'm' ? trans('teachers.male') : trans('teachers.female') }}</td>
                    <td>{{ $student->student->country }}</td>
                    <td>{{ $student->student->state }}</td>
                    <td>
                        <div class="btn-group">
                            <a data-bs-toggle="modal" data-bs-target="#coursesModal" onclick="view_courses({{ $student->student->id }})" class="btn btn-sm btn-warning" title="{{ trans('company.edit') }}">
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

<div class="modal fade" id="coursesModal" tabindex="-1" aria-labelledby="coursesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="coursesModalLabel">{{ trans('teachers.students_enrolled') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="table" class="example table table-bordered responsive nowrap text-center" cellspacing="0"
                    width="70%">
                    <thead>
                        <tr class="greentd" style="background-color: lightgrey">
                            <th>{{ trans('teachers.name') }}</th>
                            <th>{{ trans('teachers.description') }}</th>
                            <th>{{ trans('teachers.age') }}</th>
                            <th>{{ trans('teachers.section') }}</th>
                            <th>{{ trans('teachers.num_of_lectures') }}</th>
                            <th>{{ trans('teachers.total_price') }}</th>
                            <th>{{ trans('teachers.day') }}</th>
                            <th>{{ trans('teachers.start_time') }}</th>
                            <th>{{ trans('teachers.end_time') }}</th>
                            <th>{{ trans('teachers.payment_method') }}</th>
                        </tr>
                    </thead>
                    <tbody id="coursesTableBody">

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
        function view_courses(id)
        {
            $.ajax({
                url: "{{ route('admin.teachers.view_courses', ['id' => '__id__']) }}".replace('__id__', id),
                type: "get",
                success: function (response) {
                    var courses = response;
                    console.log(courses);
                    var tableBody = $('#coursesTableBody');
                    tableBody.empty();
                    var currentLocale = "{{ app()->getLocale() }}";
                    courses.forEach(function(courseStudent) {
                        let formattedStartTime = formatTime(courseStudent.start_time);
                        let formattedEndTime = formatTime(courseStudent.end_time);
                        var row = `
                            <tr>
                                <td>${courseStudent.course.name[currentLocale]}</td>
                                <td>${courseStudent.course.seo_head_description[currentLocale]}</td>
                                <td>${courseStudent.course.min_age + '-' + courseStudent.course.max_age}</td>
                                <td>${courseStudent.course.section.name[currentLocale]}</td>
                                <td>${courseStudent.money.num_of_lectures}</td>
                                <td>${courseStudent.money.total_price}</td>
                                <td>${courseStudent.day}</td>
                                <td>${formattedStartTime}</td>
                                <td>${formattedEndTime}</td>
                                <td>${courseStudent.payment_method}</td>
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



