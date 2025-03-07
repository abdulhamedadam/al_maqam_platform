@extends('site.layouts.main')

@section('title', 'Join Us | Quraan')

@section('header_class', 'join-page')

@section('body_class', 'join-us-page')

@section('css')
    <link rel="stylesheet" href="{{ asset('front_assets/css/inc/join-us.css') }}">
@endsection

@section('content')

    <section class="register-style join-us-page"
        style="background-image: url('{{ asset('front_assets/images/pages/join-login/mecca.jpg') }}')">
        <div class="container">
            <div class="col-xl-8 col-lg-12 col-md-12 inner-column">
                <div class="sec-title left light">
                    <h5>Join Us</h5>
                    <h2>Register a new account</h2>
                </div>

                <div class="form-content">

                    <div class="register-type">
                        <input type="radio" name="register_type" id="as-student" value="student" checked />
                        <label for="as-student">{{trans('site.register_as_a_student')}}</label>
                        <input type="radio" name="register_type" id="as-instructor" value="instructor" />
                        <label for="as-instructor">{{trans('site.register_as_a_teacher')}}</label>
                    </div>
                    <span class="required-fields">{{trans('site.required_join_us_message')}}</span>
                    <form method="POST" action="{{ route('user.register') }}" id="contact-form" class="default-form" enctype="multipart/form-data">
                        @csrf
                        <div class="row clearfix">
                            <!-- نوع التسجيل مطلوب - نص -->
                            <input type="hidden" name="register_type" id="register_type" value="student">

                            <!-- الاسم مطلوب - نص -->
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="name" placeholder="{{ trans('site.your_name') }}*" value="{{ old('name') }}" required>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- البريد الإلكتروني مطلوب - نوع البريد الإلكتروني -->
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="email" name="email" placeholder="{{ trans('site.email_address') }}*" value="{{ old('email') }}" required>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- كلمة المرور مطلوبة - نوع كلمة المرور -->
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="password" name="password" id="password" placeholder="{{ trans('site.enter_password') }}*" required pattern="^[a-zA-Z0-9_\\-.]+$">
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- تأكيد كلمة المرور مطلوب - نوع كلمة المرور -->
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="password" name="password_confirmation" placeholder="{{ trans('site.confirm_password') }}*" required pattern="^[a-zA-Z0-9_\\-.]+$">
                                @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- الهاتف مطلوب -->
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="tel" id="phone" name="phone" placeholder="{{ trans('site.phone') }}*" value="{{ old('phone') }}" required>
                                <div id="phoneError"></div>
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <!-- تاريخ الميلاد مطلوب -->
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" id="datepicker" name="birthday" placeholder="{{ trans('site.birthday') }}*"
                                       value="{{ old('birthday') }}" required>
                                @error('birthday')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- الجنس مطلوب -->
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group your-gender">
                                <div class="gender-details">
                                    <h4 class="gender-title">{{ trans('site.gender') }}*</h4>
                                    <div class="choose-gender">
                                        <label class="gender-label" for="gender_male">
                                            <input data-name="gender" type="radio" id="gender_male" value="m" name="gender"
                                                   {{ old('gender') === 'm' ? 'checked' : '' }} required>
                                            {{ trans('site.male') }}
                                        </label>
                                        <label class="gender-label" for="gender_female">
                                            <input data-name="gender" type="radio" id="gender_female" value="f" name="gender"
                                                   {{ old('gender') === 'f' ? 'checked' : '' }} required>
                                            {{ trans('site.female') }}
                                        </label>
                                    </div>
                                </div>
                                <div id="genderError"></div>
                                @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- الدولة مطلوبة -->
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <div class="country-list">
                                    <select id="country" class="form-control" name="country" required>
                                        <option selected>{{ trans('site.country') }}...</option>
                                        <option>....</option>
                                    </select>
                                </div>
                                @error('country')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- الولاية / المحافظة مطلوبة -->
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <select id="state" class="form-control" name="state" required>
                                    <option selected>{{ trans('site.state') }}...</option>
                                    <option>....</option>
                                </select>
                                @error('state')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- متطلبات التدريس -->
                            <div class="col-12 form-group additional-fields be-instructor" id="instructor_fields">
                                <h2 class="be-instructor-title divider gradient">{{ trans('site.teaching_requirements') }}</h2>
                            </div>

                            <!-- admission terms Checkbox Type Required -->
                            <div class="col-lg-12 col-md-6 col-sm-12 form-group additional-fields admission-terms" id="instructor_fields">
                                <label class="label">{{ trans('site.admission_terms') }}*</label>
                                <div class="terms-list">
                                    <input type="checkbox" data-name="admission" id="checkboxPerm" name="admission[]" value="permission"
                                        {{ is_array(old('admission')) && in_array('permission', old('admission', [])) ? 'checked' : '' }}>
                                    {{ trans('site.have_permission') }}<br />

                                    <input type="checkbox" data-name="admission" id="checkboxHours" name="admission[]" value="hours"
                                        {{ is_array(old('admission')) && in_array('hours', old('admission', [])) ? 'checked' : '' }}>
                                    {{ trans('site.free_hours') }}<br />

                                    <input type="checkbox" data-name="admission" id="checkboxExperience" name="admission[]" value="experienced"
                                        {{ is_array(old('admission')) && in_array('experienced', old('admission', [])) ? 'checked' : '' }}>
                                    {{ trans('site.experienced_online_education') }}<br />
                                </div>
                                <!-- /.terms-list -->
                                <div id="admissionError"></div>
                                @error('admission')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <hr class="separator">
                            </div>

                            <!-- /.col-lg-12 .form-group .admission-terms -->

                            <!-- التعليم - إدخال نصي اختياري -->
                            <div class="col-lg-12 col-md-6 col-sm-12 form-group additional-fields education" id="instructor_fields">
                                <label class="label" for="education">{{ trans('site.education') }}</label>
                                <input type="text" id="education" name="education"
                                       placeholder="{{ trans('site.education_placeholder') }}" value="{{ old('education') }}">
                                @error('education')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <hr class="separator">
                            </div>

                            <!-- أزهري - اختيار مطلوب -->
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group additional-fields azhar" id="instructor_fields">
                                <div class="azhar-details">
                                    <h4 class="azhar-title">{{ trans('site.azhar') }} ?*</h4>
                                    <div class="azhary">
                                        <label class="azhary-label" for="yes_azhar">
                                            <input data-name="azhar" type="radio" id="yes_azhar" value="yazhar"
                                                   name="azhary" {{ old('azhary') === 'yazhar' ? 'checked' : '' }} required>
                                            {{ trans('site.yes') }}
                                        </label>
                                        <label class="azhary-label" for="no_azhar">
                                            <input data-name="azhar" type="radio" id="no_azhar" value="nazhar"
                                                   name="azhary" {{ old('azhary') === 'nazhar' ? 'checked' : '' }} required>
                                            {{ trans('site.no') }}
                                        </label>
                                    </div>
                                </div>
                                <div id="azharError"></div>
                                @error('azhary')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <hr class="separator">
                            </div>

                            <!-- حاصل على إجازة في القرآن الكريم برواية حفص عن عاصم - اختيار مطلوب -->
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group additional-fields licenses" id="instructor_fields">
                                <div class="license-details">
                                    <h4 class="license-title">{{ trans('site.holds_quran_license') }} ?*</h4>
                                    <div class="holding-license">
                                        <label class="license-label" for="yes_license">
                                            <input type="radio" data-name="license" id="yes_license" value="ylicense"
                                                   name="license" {{ old('license') === 'ylicense' ? 'checked' : '' }} required>
                                            {{ trans('site.yes') }}
                                        </label>
                                        <label class="license-label" for="no_license">
                                            <input type="radio" data-name="license" id="no_license" value="nlicense"
                                                   name="license" {{ old('license') === 'nlicense' ? 'checked' : '' }} required>
                                            {{ trans('site.no') }}
                                        </label>
                                    </div>
                                </div>
                                <div id="licenseError"></div>
                                @error('license')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <hr class="separator">
                            </div>

                            <!-- هل لديك أي تراخيص أخرى؟ - نوع Radio + نوع Text مطلوب -->
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group additional-fields other-licenses" id="instructor_fields">
                                <div class="other-license-details">
                                    <h4 class="other-license-title">{{ trans('site.holds_other_licenses') }} ?*</h4>
                                    <div class="holding-other-license">
                                        <label class="other-license-label" for="yes_other_license">
                                            <input type="radio" data-name="other_license" id="yes_other_license"
                                                   value="yotherlicense" name="other_license"
                                                   {{ old('other_license') === 'yotherlicense' ? 'checked' : '' }} required>
                                            {{ trans('site.yes') }}
                                        </label>
                                        <label class="other-license-label" for="no_other_license">
                                            <input type="radio" data-name="other_license" id="no_other_license"
                                                   value="notherlicense" name="other_license"
                                                   {{ old('other_license') === 'notherlicense' ? 'checked' : '' }} required>
                                            {{ trans('site.no') }}
                                        </label>
                                    </div>
                                </div>
                                <div id="text_field_container" class="license-txt-field" style="display: none;">
                                    <label class="license-txt-field-label" for="other_licenses_details">
                                        {{ trans('site.please_specify') }} *
                                    </label>
                                    <input type="text" id="other_licenses_details" name="other_licenses_details"
                                           value="{{ old('other_licenses_details') }}" required>
                                </div>
                                <div id="other_licenseError"></div>
                                @error('other_license')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                @error('other_licenses_details')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <hr class="separator">
                            </div>


                            <!-- هل لديك خبرة في التدريس عبر الإنترنت؟ - نوع Radio مطلوب -->
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group additional-fields teaching-online" id="instructor_fields">
                                <div class="teaching-online-details">
                                    <h4 class="teaching-online-title">{{ trans('site.teaching_online_experience') }} ?*</h4>
                                    <div class="teaching-online-options">
                                        <label class="teaching-online-label" for="yes_teaching_online">
                                            <input type="radio" data-name="teaching_online" id="yes_teaching_online"
                                                   value="yteachingonline" name="teaching_online"
                                                   {{ old('teaching_online') === 'yteachingonline' ? 'checked' : '' }} required>
                                            {{ trans('site.yes') }}
                                        </label>
                                        <label class="teaching-online-label" for="no_teaching_online">
                                            <input type="radio" data-name="teaching_online" id="no_teaching_online"
                                                   value="nteachingonline" name="teaching_online"
                                                   {{ old('teaching_online') === 'nteachingonline' ? 'checked' : '' }} required>
                                            {{ trans('site.no') }}
                                        </label>
                                    </div>
                                </div>
                                <div id="teaching_onlineError"></div>
                                @error('teaching_online')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <hr class="separator">
                            </div>


                            <!-- منصات التواصل التي تجيد استخدامها - نوع Checkbox مطلوب -->
                            <div class="col-lg-12 col-md-6 col-sm-12 form-group additional-fields comm-lists" id="instructor_fields">
                                <label class="label">{{ trans('site.comm_platforms') }} *</label>
                                <div class="comm-list">
                                    <input type="checkbox" data-name="comm_platform" id="comm_zoom"
                                           name="comm_platform[]" value="zoom"
                                        {{ is_array(old('comm_platform')) && in_array('zoom', old('comm_platform', [])) ? 'checked' : '' }}>
                                    {{ trans('site.zoom') }}<br />

                                    <input type="checkbox" data-name="comm_platform" id="comm_googleMeet"
                                           name="comm_platform[]" value="google"
                                        {{ is_array(old('comm_platform')) && in_array('google', old('comm_platform', [])) ? 'checked' : '' }}>
                                    {{ trans('site.google_meet') }}<br />

                                    <input type="checkbox" data-name="comm_platform" id="comm_drive"
                                           name="comm_platform[]" value="drive"
                                        {{ is_array(old('comm_platform')) && in_array('drive', old('comm_platform', [])) ? 'checked' : '' }}>
                                    {{ trans('site.drive') }}<br />

                                    <input type="checkbox" data-name="comm_platform" id="comm_gmail"
                                           name="comm_platform[]" value="gmail"
                                        {{ is_array(old('comm_platform')) && in_array('gmail', old('comm_platform', [])) ? 'checked' : '' }}>
                                    {{ trans('site.gmail') }}<br />
                                </div><!-- /.comm-list -->
                                <div id="comm_platformError"></div>
                                @error('comm_platform')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <hr class="separator">
                            </div><!-- /.col-lg-12 .form-group .comm-lists -->

                            <!-- هل يمكنك تعليم الأطفال؟ -->
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group additional-fields teaching-kids" id="instructor_fields">
                                <div class="teaching-kids-details">
                                    <h4 class="teaching-kids-title">{{ trans('site.teaching_kids') }} ?*</h4>
                                    <div class="teaching-kids-options">
                                        <label class="teaching-kids-label" for="yes_teaching_kids">
                                            <input data-name="teachingKids" type="radio" id="yes_teaching_kids"
                                                   value="yteachingkids" name="teaching_kids"
                                                   {{ old('teaching_kids') === 'yteachingkids' ? 'checked' : '' }} required>
                                            {{ trans('site.yes') }}
                                        </label>
                                        <label class="teaching-kids-label" for="no_teaching_kids">
                                            <input data-name="teachingKids" type="radio" id="no_teaching_kids"
                                                   value="nteachingkids" name="teaching_kids"
                                                   {{ old('teaching_kids') === 'nteachingkids' ? 'checked' : '' }} required>
                                            {{ trans('site.no') }}
                                        </label>
                                    </div>
                                </div>
                                <div id="teachingKidsError"></div>
                                @error('teaching_kids')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <hr class="separator">
                            </div>


                            <div class="col-lg-12 col-md-6 col-sm-12 form-group additional-fields teaching-lists" id="instructor_fields">
                                <label class="label">{{ trans('site.what_can_you_teach') }} ?*</label>
                                <div class="teaching-list">
                                    @foreach ($sections as $section)


                                        <input type="checkbox" data-name="teaching" id="teaching_{{ $section->id }}"
                                               name="teaching[]" value="{{ $section->name }}"
                                            {{ is_array(old('teaching')) && in_array($section->name, old('teaching', [])) ? 'checked' : '' }}>
                                        {{ $section->name }}<br />
                                    @endforeach
                                </div><!-- /.teaching-list -->
                                <div id="teachingError"></div>
                                <hr class="separator">
                            </div>

                            <!-- ساعات العمل المتاحة يوميًا / Working hours available daily -->
                            <div class="col-lg-12 col-md-6 col-sm-12 form-group additional-fields available-working-hours" id="instructor_fields">
                                <label class="label">{{ trans('site.working_hours_available_daily') }}:*</label>
                                <div class="working-hours">
                                    <input type="checkbox" data-name="hours_working" id="full_time" name="hours_working[]" value="Full_Time"
                                        {{ is_array(old('hours_working')) && in_array('Full_Time', old('hours_working', [])) ? 'checked' : '' }}>
                                    {{ trans('site.full_time') }}<br />

                                    <input type="checkbox" data-name="hours_working" id="part_time" name="hours_working[]" value="Part_Time"
                                        {{ is_array(old('hours_working')) && in_array('Part_Time', old('hours_working', [])) ? 'checked' : '' }}>
                                    {{ trans('site.part_time') }}<br />

                                    <input type="checkbox" data-name="hours_working" id="flexible" name="hours_working[]" value="Flexible"
                                        {{ is_array(old('hours_working')) && in_array('Flexible', old('hours_working', [])) ? 'checked' : '' }}>
                                    {{ trans('site.flexible') }}<br />

                                    <input type="checkbox" data-name="hours_working" id="other_hours" name="hours_working[]" value="Other"
                                        {{ is_array(old('hours_working')) && in_array('Other', old('hours_working', [])) ? 'checked' : '' }}>
                                    {{ trans('site.other') }}<br />
                                </div><!-- /.working-hours -->
                                <div id="other_field" class="other" style="display: none;">
                                    <input type="text" data-name="other_working_hours" id="other_working_hours" name="other_working_hours"
                                           placeholder="{{ trans('site.enter_working_hours') }}" value="{{ old('other_working_hours') }}" required>
                                    <div id="other_working_hoursError"></div>
                                </div>
                                @error('hours_working')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                @error('other_working_hours')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div id="hours_workingError"></div>
                                <hr class="separator">
                            </div>

                            <!-- I'm free to work on a shift - Type Checkbox Required -->
                            <div class="col-lg-12 col-md-6 col-sm-12 form-group additional-fields available-shifts" id="instructor_fields">
                                <label class="label">{{ trans('site.free_to_work_shift') }}:*</label>
                                <div class="working-shifts">
                                    <input type="checkbox" data-name="work_shift" id="morning_shift" name="work_shift[]" value="Morning_8_AM_1_PM"
                                        {{ is_array(old('work_shift')) && in_array('Morning_8_AM_1_PM', old('work_shift', [])) ? 'checked' : '' }}>
                                    {{ trans('site.morning_shift') }}<br />

                                    <input type="checkbox" data-name="work_shift" id="evening_shift" name="work_shift[]" value="Evening_1_PM_6_PM"
                                        {{ is_array(old('work_shift')) && in_array('Evening_1_PM_6_PM', old('work_shift', [])) ? 'checked' : '' }}>
                                    {{ trans('site.evening_shift_1') }}<br />

                                    <input type="checkbox" data-name="work_shift" id="evening_shift_1" name="work_shift[]" value="Evening_6_PM_12_AM"
                                        {{ is_array(old('work_shift')) && in_array('Evening_6_PM_12_AM', old('work_shift', [])) ? 'checked' : '' }}>
                                    {{ trans('site.evening_shift_2') }}<br />
                                </div><!-- /.working-shifts -->

                                <div id="work_shiftError"></div>
                                @error('work_shift')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <hr class="separator">
                            </div>

                            <!-- Work available Friday and Saturday? - Type Radio Required -->
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group additional-fields fri-sat" id="instructor_fields">
                                <div class="fri-sat-details">
                                    <h4 class="fri-sat-title">{{ trans('site.work_available_fri_sat') }}*</h4>
                                    <div class="fri-sat-options">
                                        <label class="fri-sat-label" for="yes_fri_sat">
                                            <input type="radio" data-name="fri_sat" id="yes_fri_sat" value="yfri-sat" name="fri_sat"
                                                   {{ old('fri_sat') === 'yfri-sat' ? 'checked' : '' }} required>
                                            {{ trans('site.yes') }}
                                        </label>
                                        <label class="fri-sat-label" for="no_fri_sat">
                                            <input type="radio" data-name="fri_sat" id="no_fri_sat" value="nfri-sat" name="fri_sat"
                                                   {{ old('fri_sat') === 'nfri-sat' ? 'checked' : '' }} required>
                                            {{ trans('site.no') }}
                                        </label>
                                    </div>
                                </div>
                                <div id="fri_satError"></div>
                                @error('fri_sat')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <hr class="separator">
                            </div>

                            <!-- Audio File -->
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group additional-fields" id="instructor_fields">
                                <h4 class="label audio-recording-title">{{ trans('site.audio_recording') }}</h4>
                                <label for="audio" class="drop-container" id="dropcontainer">
                                    <span class="drop-title">{{ trans('site.drop_files_here') }}</span>
                                    <span class="or">{{ trans('site.or') }}</span>
                                    <input type="file" id="audio" name="audio" accept="audio/*">
                                </label>
                                @error('audio')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <hr class="separator">
                            </div>

                            <!-- CV File -->
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group additional-fields" id="instructor_fields">
                                <h4 class="label cv-summery-title">{{ trans('site.cv_summary') }}*</h4>
                                <p class="subtitle">{{ trans('site.max_file_size', ['size' => '10MB']) }}</p>
                                <label for="files" class="drop-container" id="dropcontainer">
                                    <span class="drop-title">{{ trans('site.drop_files_here') }}</span>
                                    <span class="or">{{ trans('site.or') }}</span>
                                    <input type="file" id="files" name="files">
                                </label>
                                @error('files')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <hr class="separator">
                            </div>

                            <!-- Submit -->
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                <button class="theme-btn style-one" type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    {{ trans('site.register') }}
                                </button>
                            </div>

                            <!-- Modal -->
                            {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="has-account">
                                <h2 class="exist-account">
                                    {{ trans('site.already_have_account') }}
                                    <a href="{{ route('user.login') }}">&nbsp;&nbsp;{{ trans('site.login_here') }}</a>
                                </h2>
                            </div>

                        </div>
                    </form>


                </div>

            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('front_assets/js/libs/jquery-ui.min.js') }}"></script>
@endsection
