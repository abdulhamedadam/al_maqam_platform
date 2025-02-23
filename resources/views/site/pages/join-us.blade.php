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
                        <label for="as-student">Register as a student</label>
                        <input type="radio" name="register_type" id="as-instructor" value="instructor" />
                        <label for="as-instructor">Register as a teacher</label>
                    </div>
                    <span class="required-fields">all fields marked with ( * ) is required</span>
                    <form method="POST" action="{{ route('user.register') }}" id="contact-form" class="default-form">
                        @csrf
                        <div class="row clearfix">
                            <!-- register_type Required - Text Type -->
                            <input type="hidden" name="register_type" id="register_type" value="student">
                            <!-- Name Required - Text Type -->
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="name" placeholder="Your Name*" value="{{ old('name') }}"
                                    required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Email Required - Email Type -->
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="email" name="email" placeholder="Email address*"
                                    value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Password Required - Password Type -->
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="password" name="password" id="password" placeholder="Enter Password*" required
                                    pattern="^[a-zA-Z0-9_\\-.]+$">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Confirm Password Required - Password Type -->
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="password" name="password_confirmation" placeholder="Confirm Password*" required
                                    pattern="^[a-zA-Z0-9_\\-.]+$">
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Phone Required -->
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="tel" id="phone" name="phone" placeholder="Phone*"
                                    value="{{ old('phone') }}" required>
                                <!-- <input type="text" name="phone" placeholder="Phone*" required> -->
                                <div id="phoneError"></div>
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Birthday Required -->
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" id="datepicker" name="birthday" placeholder="Birthday*"
                                    value="{{ old('birthday') }}" required>
                                @error('birthday')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- gender Required -->
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group your-gender">
                                <div class="gender-details">
                                    <h4 class="gender-title">Gender*</h4>
                                    <div class="choose-gender">
                                        <label class="gender-label" for="gender_male">
                                            <input data-name="gender" type="radio" id="gender_male" value="m"
                                                name="gender" {{ old('gender') === 'm' ? 'checked' : '' }} required>Male
                                        </label>
                                        <label class="gender-label" for="gender_female">
                                            <input data-name="gender" type="radio" id="gender_female" value="f"
                                                name="gender" {{ old('gender') === 'f' ? 'checked' : '' }} required>female
                                        </label>
                                    </div>
                                </div>
                                <div id="genderError"></div>
                                @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- country Required -->
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <div class="country-list">
                                    <select id="country" class="form-control" name="country" placeholder="cont" required>
                                        <option selected>Country...</option>
                                        <option>....</option>
                                    </select>
                                </div>
                                @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- state Required -->
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <select id="state" class="form-control" name="state" required>
                                    <option selected>State...</option>
                                    <option>....</option>
                                </select>
                                @error('state')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Be Instructor Fields -->
                            <div class="col-12 form-group additional-fields be-instructor" id="instructor_fields">
                                <h2 class="be-instructor-title divider gradient">Teaching requirements</h2>
                            </div>
                            <!-- admission terms Checkbox Type Required -->
                            <div class="col-lg-12 col-md-6 col-sm-12 form-group additional-fields admission-terms"
                                id="instructor_fields">
                                <label class="label">admission terms*</label>
                                <div class="terms-list">
                                    <input type="checkbox" data-name="admission" id="checkboxPerm" name="admission[]"
                                        value="permission"
                                        {{ is_array(old('admission')) && in_array('permission', old('admission', [])) ? 'checked' : '' }}>Have
                                    permission<br />
                                    <input type="checkbox" data-name="admission" id="checkboxHours" name="admission[]"
                                        value="hours"
                                        {{ is_array(old('admission')) && in_array('hours', old('admission', [])) ? 'checked' : '' }}>Free
                                    5
                                    hours per day<br />
                                    <input type="checkbox" data-name="admission" id="checkboxExperience"
                                        name="admission[]" value="experienced"
                                        {{ is_array(old('admission')) && in_array('experienced', old('admission', [])) ? 'checked' : '' }}>Experienced
                                    in
                                    online
                                    education<br />
                                </div><!-- /.terms-list -->
                                <div id="admissionError"></div>
                                @error('admission')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <hr class="separator">
                            </div><!-- /.col-lg-12 .form-group .admission-terms -->

                            <!-- education - Text Type Optional -->
                            <div class="col-lg-12 col-md-6 col-sm-12 form-group additional-fields education"
                                id="instructor_fields">
                                <label class="label" for="education">education</label>
                                <input type="text" id="education" name="education"
                                    placeholder="Education ( Optional )" value="{{ old('education') }}">
                                @error('education')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <hr class="separator">
                            </div><!-- /.col-lg-12 .form-group .education -->

                            <!-- azhary - Radio Type Required -->
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group additional-fields azhar"
                                id="instructor_fields">
                                <div class="azhar-details">
                                    <h4 class="azhar-title">azhar ?*</h4>
                                    <div class="azhary">
                                        <label class="azhary-label" for="yes_azhar">
                                            <input data-name="azhar" type="radio" id="yes_azhar" value="yazhar"
                                                name="azhary" {{ old('azhary') === 'yazhar' ? 'checked' : '' }}
                                                required>yes
                                        </label>
                                        <label class="azhary-label" for="no_azhar">
                                            <input data-name="azhar" type="radio" id="no_azhar" value="nazhar"
                                                name="azhary" {{ old('azhary') === 'nazhar' ? 'checked' : '' }}
                                                required>no
                                        </label>
                                    </div>
                                </div>
                                <div id="azharError"></div>
                                @error('azhary')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <hr class="separator">
                            </div>

                            <!-- holds a license in the Holy Qur’an by reciting Hafs on the authority of Asim - Radio Type Required  -->
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group additional-fields licenses"
                                id="instructor_fields">
                                <div class="license-details">
                                    <h4 class="license-title">holds a license in the Holy Qur’an by reciting Hafs on the
                                        authority of Asim
                                        ?*</h4>
                                    <div class="holding-license">
                                        <label class="license-label" for="yes_license">
                                            <input type="radio" data-name="license" id="yes_license" value="ylicense"
                                                name="license" {{ old('license') === 'ylicense' ? 'checked' : '' }}
                                                required>yes
                                        </label>
                                        <label class="license-label" for="no_license">
                                            <input type="radio" data-name="license" id="no_license" value="nlicense"
                                                name="license" {{ old('license') === 'nlicense' ? 'checked' : '' }}
                                                required>no
                                        </label>
                                    </div>
                                </div>
                                <div id="licenseError"></div>
                                @error('license')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <hr class="separator">
                            </div>

                            <!-- Do you hold other licenses? - Type Radio + Type Text Required -->
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group additional-fields other-licenses"
                                id="instructor_fields">
                                <div class="other-license-details">
                                    <h4 class="other-license-title">Do you hold other licenses?*</h4>
                                    <div class="holding-other-license">
                                        <label class="other-license-label" for="yes_other_license">
                                            <input type="radio" data-name="other_license" id="yes_other_license"
                                                value="yotherlicense" name="other_license"
                                                {{ old('other_license') === 'yotherlicense' ? 'checked' : '' }}
                                                required>yes
                                        </label>
                                        <label class="other-license-label" for="no_other_license">
                                            <input type="radio" data-name="other_license" id="no_other_license"
                                                value="notherlicense" name="other_license"
                                                {{ old('other_license') === 'notherlicense' ? 'checked' : '' }} required>no
                                        </label>
                                    </div>
                                </div>
                                <div id="text_field_container" class="license-txt-field" style="display: none;">
                                    <label class="license-txt-field-label" for="other_licenses_details">Please
                                        specify:*</label>
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

                            <!-- Do you have experience teaching online? - Type Radio Required -->
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group additional-fields teaching-online"
                                id="instructor_fields">
                                <div class="teaching-online-details">
                                    <h4 class="teaching-online-title">Do you have experience teaching online?*</h4>
                                    <div class="teaching-online-options">
                                        <label class="teaching-online-label" for="yes_teaching_online">
                                            <input type="radio" data-name="teaching_online" id="yes_teaching_online"
                                                value="yteachingonline" name="teaching_online"
                                                {{ old('teaching_online') === 'yteachingonline' ? 'checked' : '' }}
                                                required>yes
                                        </label>
                                        <label class="teaching-online-label" for="no_teaching_online">
                                            <input type="radio" data-name="teaching_online" id="no_teaching_online"
                                                value="nteachingonline" name="teaching_online"
                                                {{ old('teaching_online') === 'nteachingonline' ? 'checked' : '' }}
                                                required>no
                                        </label>
                                    </div>
                                </div>
                                <div id="teaching_onlineError"></div>
                                @error('teaching_online')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <hr class="separator">
                            </div>

                            <!-- Communication platforms that I am good at - Type Checkbox Required -->
                            <div class="col-lg-12 col-md-6 col-sm-12 form-group additional-fields comm-lists"
                                id="instructor_fields">
                                <label class="label">What is Communication platforms that you good at?*</label>
                                <div class="comm-list">
                                    <input type="checkbox" data-name="comm_platform" id="comm_zoom"
                                        name="comm_platform[]" value="zoom"
                                        {{ is_array(old('comm_platform')) && in_array('zoom', old('comm_platform', [])) ? 'checked' : '' }}>zoom<br />
                                    <input type="checkbox" data-name="comm_platform" id="comm_googleMeet"
                                        name="comm_platform[]" value="google"
                                        {{ is_array(old('comm_platform')) && in_array('google', old('comm_platform', [])) ? 'checked' : '' }}>Google
                                    Meet<br />
                                    <input type="checkbox" data-name="comm_platform" id="comm_drive"
                                        name="comm_platform[]" value="drive"
                                        {{ is_array(old('comm_platform')) && in_array('drive', old('comm_platform', [])) ? 'checked' : '' }}>Drive<br />
                                    <input type="checkbox" data-name="comm_platform" id="comm_gmail"
                                        name="comm_platform[]" value="gmail"
                                        {{ is_array(old('comm_platform')) && in_array('gmail', old('comm_platform', [])) ? 'checked' : '' }}>Gmail<br />
                                </div><!-- /.comm-list -->
                                <div id="comm_platformError"></div>
                                @error('comm_platform')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <hr class="separator">
                            </div><!-- /.col-lg-12 .form-group .comm-lists -->

                            <!-- Can you teach kids? -->
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group additional-fields teaching-kids"
                                id="instructor_fields">
                                <div class="teaching-kids-details">
                                    <h4 class="teaching-kids-title">Can you teach kids?*</h4>
                                    <div class="teaching-kids-options">
                                        <label class="teaching-kids-label" for="yes_teaching_kids">
                                            <input data-name="teachingKids" type="radio" id="yes_teaching_kids"
                                                value="yteachingkids" name="teaching_kids"
                                                {{ old('teaching_kids') === 'yteachingkids' ? 'checked' : '' }}
                                                required>yes
                                        </label>
                                        <label class="teaching-kids-label" for="no_teaching_kids">
                                            <input data-name="teachingKids" type="radio" id="no_teaching_kids"
                                                value="nteachingkids" name="teaching_kids"
                                                {{ old('teaching_kids') === 'nteachingkids' ? 'checked' : '' }} required>no
                                        </label>
                                    </div>
                                </div>
                                <div id="teachingKidsError"></div>
                                @error('teaching_kids')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <hr class="separator">
                            </div>

                            <!-- What can you teach - Type Checkbox Required -->
                            <div class="col-lg-12 col-md-6 col-sm-12 form-group additional-fields teaching-lists"
                                id="instructor_fields">
                                <label class="label">What can you teach ?*</label>
                                <div class="teaching-list">
                                    <input type="checkbox" data-name="teaching" id="teaching_quran" name="teaching[]"
                                        value="The_Holy_Quran"
                                        {{ is_array(old('teaching')) && in_array('The_Holy_Quran', old('teaching', [])) ? 'checked' : '' }}>The
                                    Holy
                                    Quran<br />
                                    <input type="checkbox" data-name="teaching" id="teaching_knowledge"
                                        name="teaching[]" value="Religious_Knowledge"
                                        {{ is_array(old('teaching')) && in_array('Religious_Knowledge', old('teaching', [])) ? 'checked' : '' }}>Religious
                                    Knowledge<br />
                                    <input type="checkbox" data-name="teaching" id="teaching_arabic" name="teaching[]"
                                        value="Arabic_Language"
                                        {{ is_array(old('teaching')) && in_array('Arabic_Language', old('teaching', [])) ? 'checked' : '' }}>Arabic
                                    Language<br />
                                </div><!-- /.teaching-list -->
                                <div id="teachingError"></div>
                                <hr class="separator">
                            </div><!-- /.col-lg-12 .form-group .teaching-lists -->

                            <!-- Working hours available daily - Type Checkbox Required -->
                            <div class="col-lg-12 col-md-6 col-sm-12 form-group additional-fields available-working-hours"
                                id="instructor_fields">
                                <label class="label">Working hours available daily:*</label>
                                <div class="working-hours">
                                    <input type="checkbox" data-name="hours_working" id="8_hours"
                                        name="hours_working[]" value="8_hours"
                                        {{ is_array(old('hours_working')) && in_array('8_hours', old('hours_working', [])) ? 'checked' : '' }}>8
                                    Hours<br />
                                    <input type="checkbox" data-name="hours_working" id="4_hours"
                                        name="hours_working[]" value="4_hours"
                                        {{ is_array(old('hours_working')) && in_array('4_hours', old('hours_working', [])) ? 'checked' : '' }}>4
                                    Hours<br />
                                    <input type="checkbox" data-name="hours_working" id="2_hours"
                                        name="hours_working[]" value="2_hours"
                                        {{ is_array(old('hours_working')) && in_array('2_hours', old('hours_working', [])) ? 'checked' : '' }}>2
                                    Hours<br />
                                    <input type="checkbox" data-name="hours_working" id="other_hours"
                                        name="hours_working[]" value="other"
                                        {{ is_array(old('hours_working')) && in_array('other', old('hours_working', [])) ? 'checked' : '' }}>Other<br />
                                </div><!-- /.working-hours -->
                                <div id="other_field" class="other" style="display: none;">
                                    <input type="text" data-name="other_working_hours" id="other_working_hours"
                                        name="other_working_hours" placeholder="Enter working hours"
                                        value="{{ old('other_working_hours') }}" required>
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
                            </div><!-- /.col-lg-12 .form-group .available-working-hours -->

                            <!-- I'm free to work on a shift - Type Checkbox Required  -->
                            <div class="col-lg-12 col-md-6 col-sm-12 form-group additional-fields available-shifts"
                                id="instructor_fields">
                                <label class="label">I'm free to work on a shift:*</label>
                                <div class="working-shifts">
                                    <input type="checkbox" data-name="work_shift" id="morning_shift" name="work_shift[]"
                                        value="Morning_8_AM_1_PM"
                                        {{ is_array(old('work_shift')) && in_array('Morning_8_AM_1_PM', old('work_shift', [])) ? 'checked' : '' }}>Morning
                                    | 8
                                    AM ~ 1 PM<br />
                                    <input type="checkbox" data-name="work_shift" id="evening_shift" name="work_shift[]"
                                        value="Evening_1_PM_6_PM"
                                        {{ is_array(old('work_shift')) && in_array('Evening_1_PM_6_PM', old('work_shift', [])) ? 'checked' : '' }}>Evening
                                    | 1
                                    PM ~ 6 PM<br />
                                    <input type="checkbox" data-name="work_shift" id="evening_shift_1" name="work_shift[]"
                                        value="Evening_6_PM_12_AM"
                                        {{ is_array(old('work_shift')) && in_array('Evening_6_PM_12_AM', old('work_shift', [])) ? 'checked' : '' }}>Evening
                                    | 6
                                    PM ~ 12 AM<br />
                                </div><!-- /.working-shifts -->
                                <div id="work_shiftError"></div>
                                @error('work_shift')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <hr class="separator">
                            </div><!-- /.col-lg-12 .form-group .available-shifts -->

                            <!-- Work available Friday and Saturday? - Type Radio Required -->
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group additional-fields fri-sat"
                                id="instructor_fields">
                                <div class="fri-sat-details">
                                    <h4 class="fri-sat-title">Work available Friday and Saturday?*</h4>
                                    <div class="fri-sat-options">
                                        <label class="fri-sat-label" for="yes_fri_sat">
                                            <input type="radio" data-name="fri_sat" id="yes_fri_sat" value="yfri-sat"
                                                name="fri_sat" {{ old('fri_sat') === 'yfri-sat' ? 'checked' : '' }}
                                                required>yes
                                        </label>
                                        <label class="fri-sat-label" for="no_fri_sat">
                                            <input type="radio" data-name="fri_sat" id="no_fri_sat" value="nfri-sat"
                                                name="fri_sat" {{ old('fri_sat') === 'nfri-sat' ? 'checked' : '' }}
                                                required>no
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
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group additional-fields fri-sat"
                                id="instructor_fields">
                                <h4 class="label audio-recording-title">3-minute audio recording from the middle of the
                                    Quran (Optional)
                                </h4>
                                <label for="audio" class="drop-container" id="dropcontainer">
                                    <span class="drop-title">Drop files here</span>
                                    <span class="or">Or</span>
                                    <input type="file" id="audio" name="audio" accept="audio/*">
                                </label>
                                @error('audio')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <hr class="separator">
                            </div>

                            <!-- CV File -->
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group additional-fields fri-sat"
                                id="instructor_fields">
                                <h4 class="label cv-summery-title">CV Summery*</h4>
                                <p class="subtitle">Maximum file size to upload 10MB</p>
                                <label for="files" class="drop-container" id="dropcontainer">
                                    <span class="drop-title">Drop files here</span>
                                    <span class="or">Or</span>
                                    <input type="file" id="files" name="files">
                                </label>
                                @error('files')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <hr class="separator">
                            </div>

                            <!-- Submit -->
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                <button class="theme-btn style-one" type="submit" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Register
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
                                    already have an account ?
                                    <a href="{{ route('user.login') }}">&nbsp; &nbsp;login here</a>
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
