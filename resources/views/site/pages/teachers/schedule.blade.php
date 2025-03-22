@extends('site.layouts.main')

@section('title', 'Teacher Profile | Quraan')

@section('header_class', 'student-page')

@section('body_class', 'student-profile')

@section('css')
    <link rel="stylesheet" href="{{ asset('front_assets/css/inc/student-profile.css') }}">
    <style>
        .contact-from-input select {
            height: 60px;
            width: 100%;
            background: #f8f8f9;
            border: none;
            padding: 15px 20px;
            border-radius: 4px;
            outline: 0;
            font-size: 16px;
            color: #333;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            cursor: pointer;
            background-image: url('data:image/svg+xml;utf8,<svg fill="%23333" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/></svg>');
            background-repeat: no-repeat;
            background-position: right 20px center;
            background-size: 12px;
        }
    </style>
@endsection

@section('content')
    <div class="course-details-area pt-120 pb-100">
        <div class="container">
            <div class="student-profile-author pb-30">
                <div class="student-profile-author-img">
                    <img src="{{ asset('front_assets/images/pages/student-profile/course-student.png') }}"
                        alt="img not found" />
                </div>
                <div class="student-profile-author-text">
                    <span>{{ trans('profile.hello') }},</span>
                    <h3 class="student-profile-author-name">{{ auth('web')->user()->name }}</h3>
                </div>
            </div>
            <div class="row">
                @include('site.pages.teachers.teacher_sidebar')
                <div class="col-xl-9 col-lg-8">
                    <div class="student-profile-content">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="contact" role="tabpanel"
                                aria-labelledby="contact-tab">
                                <h4 class="mb-25">{{ trans('profile.teacher_schedules') }}</h4>
                                <form action="{{ route('user.store_schedule') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        {{-- <div class="col-md-6">
                                            <div class="contact-from-input mb-20">
                                                <label for="teacher_name">{{ trans('teachers.teacher_name') }}</label>
                                                <input id="teacher_name" type="text"
                                                    value="{{ auth('web')->user()->name }}" readonly />
                                            </div>
                                        </div> --}}
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
                                                @error('day')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contact-from-input mb-20">
                                                <label for="start_time">{{ trans('teachers.start_time') }}</label>
                                                <input name="start_time" id="start_time" type="time" class="form-control"
                                                    value="{{ old('start_time') }}" />
                                                @error('start_time')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contact-from-input mb-20">
                                                <label for="end_time">{{ trans('teachers.end_time') }}</label>
                                                <input name="end_time" id="end_time" type="time" class="form-control"
                                                    value="{{ old('end_time') }}" />
                                                @error('end_time')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-12">
                                            <div class="contact-from-input mb-20">
                                                <label for="note">{{ trans('teachers.note') }}</label>
                                                <textarea name="note" id="note" class="form-control" placeholder="{{ trans('teachers.note_placeholder') }}">{{ old('note') }}</textarea>
                                                @error('note')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div> --}}
                                        <div class="col-sm-12">
                                            <div class="cont-btn mb-20 mt-10">
                                                <button type="submit"
                                                    class="cont-btn">{{ trans('teachers.save_schedule') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <h4 class="mb-25">{{ trans('profile.teacher_schedules') }}</h4>
                                <table class="table table-bordered text-center">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>{{ trans('teachers.day') }}</th>
                                            <th>{{ trans('teachers.start_time') }}</th>
                                            <th>{{ trans('teachers.end_time') }}</th>
                                            <th>{{ trans('teachers.status') }}</th>
                                            {{-- <th>{{ trans('teachers.note') }}</th> --}}
                                            <th>{{ trans('actions.actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($schedules as $schedule)
                                            <tr>
                                                <td>{{ $schedule->day }}</td>
                                                <td>{{ date('h:i A', strtotime($schedule->start_time)) }}</td>
                                                <td>{{ date('h:i A', strtotime($schedule->end_time)) }}</td>
                                                <td>
                                                    <span
                                                        class="badge {{ $schedule->is_booked ? 'bg-danger text-white' : 'bg-success text-dark' }}">
                                                        {{ $schedule->is_booked ? trans('messages.reserved') : trans('messages.available') }}
                                                    </span>
                                                </td>
                                                {{-- <td>{{ $schedule->note ?? 'N\A' }}</td> --}}
                                                <td>
                                                    <form action="{{ route('user.delete_schedule', $schedule->id) }}"
                                                        method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are you sure?')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">{{ trans('teachers.no_schedules_found') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
