{{-- <form id="scheduleForm" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="contact-from-input mb-20">
                                                <label for="day">{{ trans('teachers.day') }}</label>
                                                <select name="day" id="day" class="form-control">
                                                    <option value="Saturday"
                                                        {{ old('day') == 'Saturday' ? 'selected' : '' }}>
                                                        {{ trans('teachers.saturday') }}</option>
                                                    <option value="Sunday" {{ old('day') == 'Sunday' ? 'selected' : '' }}>
                                                        {{ trans('teachers.sunday') }}</option>
                                                    <option value="Monday" {{ old('day') == 'Monday' ? 'selected' : '' }}>
                                                        {{ trans('teachers.monday') }}</option>
                                                    <option value="Tuesday"
                                                        {{ old('day') == 'Tuesday' ? 'selected' : '' }}>
                                                        {{ trans('teachers.tuesday') }}</option>
                                                    <option value="Wednesday"
                                                        {{ old('day') == 'Wednesday' ? 'selected' : '' }}>
                                                        {{ trans('teachers.wednesday') }}</option>
                                                    <option value="Thursday"
                                                        {{ old('day') == 'Thursday' ? 'selected' : '' }}>
                                                        {{ trans('teachers.thursday') }}</option>
                                                    <option value="Friday" {{ old('day') == 'Friday' ? 'selected' : '' }}>
                                                        {{ trans('teachers.friday') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contact-from-input mb-20">
                                                <label for="start_time">{{ trans('teachers.start_time') }}</label>
                                                <input name="start_time" id="start_time" type="time" class="form-control"
                                                    value="{{ old('start_time') }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contact-from-input mb-20">
                                                <label for="end_time">{{ trans('teachers.end_time') }}</label>
                                                <input name="end_time" id="end_time" type="time" class="form-control"
                                                    value="{{ old('end_time') }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="button" id="searchTeachers"
                                                class="btn btn-primary">{{ trans('teachers.search') }}</button>
                                        </div>
                                    </div>
                                </form>

                                <div class="mt-4">
                                    <label for="teacher">{{ trans('teachers.select_teacher') }}</label>
                                    <select id="teacher" name="teacher_id" class="form-control">
                                        <option value="" disabled selected>{{ trans('teachers.choose_teacher') }}
                                        </option>
                                    </select>
                                </div> --}}
