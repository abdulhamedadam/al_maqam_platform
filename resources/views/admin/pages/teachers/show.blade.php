@extends('admin.layouts.master')
@section('toolbar')
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        @php
            $title = trans('teachers.teachers');
            $breadcrumbs = [
                ['label' => 'Home', 'link' => ''],
                ['label' => 'Teachers', 'link' => ''],
                ['label' => 'Show', 'link' => ''],
            ];

            PageTitle($title, $breadcrumbs);
        @endphp
    </div>
@endsection

@section('content')

    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid">

            <div id="kt_app_content_container" class="app-container container-xxl">

                <form class="form d-flex flex-column flex-lg-row">

                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">

                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>General</h2>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('teachers.name') }}</label>
                                                    <input disabled type="text" name="name" id="name"
                                                        class="form-control mb-2" value="{{ $teacher->name }}" required />
                                                </div>

                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('teachers.email') }}</label>
                                                    <input disabled type="email" name="email" id="email"
                                                        class="form-control mb-2" value="{{ $teacher->email }}" required />
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('teachers.phone') }}</label>
                                                    <input disabled type="text" name="phone" id="phone"
                                                        class="form-control mb-2" value="{{ $teacher->phone }}" required />
                                                </div>

                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('teachers.birthday') }}</label>
                                                    <input disabled type="date" name="birthday" id="birthday"
                                                        class="form-control mb-2" value="{{ $teacher->birthday }}" required />
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('teachers.gender') }}</label>
                                                    <select disabled name="gender" id="gender" class="form-control mb-2" required>
                                                        <option value="m" {{ $teacher->gender == 'm' ? 'selected' : '' }}>
                                                            {{ trans('teachers.male') }}
                                                        </option>
                                                        <option value="f" {{ $teacher->gender == 'f' ? 'selected' : '' }}>
                                                            {{ trans('teachers.female') }}
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('teachers.country') }}</label>
                                                    <input disabled type="text" name="country" id="country"
                                                        class="form-control mb-2" value="{{ $teacher->country }}" required />
                                                </div>
                                            </div>

                                            <div class="fv-row w-100">
                                                <label class="form-label">{{ trans('teachers.state') }}</label>
                                                <input disabled type="text" name="state" id="state"
                                                    class="form-control mb-2" value="{{ $teacher->state }}" required />
                                            </div>
                                        </div>

                                    </div>

                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Teaching Requirements</h2>
                                            </div>
                                        </div>

                                        <div class="card-body pt-0">

                                            <!-- Admission Terms -->
                                            <div class="fv-row w-100 mb-4">
                                                <label class="form-label">Admission Terms*</label>
                                                <div class="d-flex flex-wrap justify-content-between">

                                                    @php
                                                        $selectedTerms = json_decode($teacher->teacher->admission_terms) ?? [];
                                                    @endphp

                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="checkbox"
                                                            name="admission_terms[]" value="permission"
                                                            id="havePermission"
                                                            {{ in_array('permission' , $selectedTerms) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="havePermission">Have Permission</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="checkbox"
                                                            name="admission_terms[]" value="hours"
                                                            id="fiveHoursPerDay"
                                                            {{ in_array('hours' , $selectedTerms) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="fiveHoursPerDay">Free 5 Hours Per Day</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="checkbox"
                                                            name="admission_terms[]" value="experienced"
                                                            id="onlineExperience"
                                                            {{ in_array('experienced' , $selectedTerms)? 'checked' : '' }}>
                                                        <label class="form-check-label" for="onlineExperience">Experienced In Online Education</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Education -->
                                            <div class="fv-row w-100 mb-4">
                                                <label class="form-label">Education (Optional)</label>
                                                <input disabled type="text" name="education" value="{{ $teacher->teacher->education ?? '' }}" class="form-control mb-2">
                                            </div>

                                            <!-- Azhar -->
                                            <div class="fv-row w-100 mb-4">
                                                <label class="form-label">Azhar?*</label>
                                                <div class="d-flex gap-3">
                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="radio" name="azhar"
                                                            value="yazhar" id="yesAzhar"
                                                            {{ $teacher->teacher->azhar === 'yazhar' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="yesAzhar">Yes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="radio" name="azhar"
                                                            value="nazhar" id="noAzhar"
                                                            {{ $teacher->teacher->azhar === 'nazhar' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="noAzhar">No</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Quran License -->
                                            <div class="fv-row w-100 mb-4">
                                                <label class="form-label">Holds a license in the Holy Qur’an by reciting Hafs?*</label>
                                                <div class="d-flex gap-3">
                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="radio" name="quran_license"
                                                            value="ylicense" id="yesQuranLicense"
                                                            {{ $teacher->teacher->quran_license === 'ylicense' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="yesQuranLicense">Yes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="radio" name="quran_license"
                                                            value="nlicense" id="noQuranLicense"
                                                            {{ $teacher->teacher->quran_license === 'nlicense' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="noQuranLicense">No</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Other Licenses -->
                                            <div class="fv-row w-100 mb-4">
                                                <label class="form-label">Holds other licenses?*</label>
                                                <div class="d-flex gap-3">
                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="radio" name="other_license"
                                                            value="yotherlicense" id="yesOtherLicense"
                                                            {{ $teacher->teacher->other_license === 'yotherlicense' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="yesOtherLicense">Yes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="radio" name="other_license"
                                                            value="notherlicense" id="noOtherLicense"
                                                            {{ $teacher->teacher->other_license === 'notherlicense' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="noOtherLicense">No</label>
                                                    </div>
                                                </div>

                                                @if ($teacher->teacher->other_license === 'yotherlicense')
                                                    <input disabled type="text" id="other_license_details"
                                                    name="other_license_details" class="form-control mt-2"
                                                    value="{{ $teacher->teacher->other_license_details ?? '' }}">
                                                @endif
                                            </div>

                                            <!-- Teaching Online -->
                                            <div class="fv-row w-100 mb-4">
                                                <label class="form-label">Have experience teaching online?*</label>
                                                <div class="d-flex gap-3">
                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="radio"
                                                            name="teaching_online" value="yteachingonline"
                                                            id="yesTeachingOnline"
                                                            {{ $teacher->teacher->teaching_online === 'yteachingonline' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="yesTeachingOnline">Yes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="radio"
                                                            name="teaching_online" value="nteachingonline"
                                                            id="noTeachingOnline"
                                                            {{ $teacher->teacher->teaching_online === 'nteachingonline' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="noTeachingOnline">No</label>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Communication Platforms -->
                                            <div class="fv-row w-100 mb-4">
                                                <label class="form-label">What Communication Platforms Are You Good At?*</label>
                                                <div class="d-flex flex-wrap justify-content-between">

                                                    @php
                                                        $selectedPlatforms = json_decode($teacher->teacher->communication_platforms) ?? [];
                                                    @endphp

                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="checkbox"
                                                            name="communication_platforms[]" value="zoom"
                                                            id="zoom" {{ in_array('zoom', $selectedPlatforms ) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="zoom">Zoom</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="checkbox"
                                                            name="communication_platforms[]" value="google"
                                                            id="googleMeet" {{ in_array('google', $selectedPlatforms ) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="googleMeet">Google Meet</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="checkbox"
                                                            name="communication_platforms[]" value="drive"
                                                            id="drive" {{ in_array('drive', $selectedPlatforms) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="drive">Drive</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="checkbox"
                                                            name="communication_platforms[]" value="gmail"
                                                            id="gmail" {{ in_array('gmail', $selectedPlatforms) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="gmail">Gmail</label>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Teach Kids -->
                                            <div class="fv-row w-100 mb-4">
                                                <label class="form-label">Teach kids?*</label>
                                                <div class="d-flex gap-3">
                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="radio" name="teaching_kids" value="yteachingkids" id="teachingKidsYes"
                                                            {{ $teacher->teacher->teaching_kids == 'yteachingkids' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="teachingKidsYes">Yes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="radio" name="teaching_kids" value="nteachingkids" id="teachingKidsNo"
                                                            {{ $teacher->teacher->teaching_kids == 'nteachingkids' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="teachingKidsNo">No</label>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Can Teach -->
                                            <div class="fv-row w-100 mb-4">
                                                <label class="form-label">What teacher can teach?*</label>
                                                <div class="d-flex flex-wrap justify-content-between">
                                                    @php
                                                        $selectedSubjects = json_decode($teacher->teacher->teaching_subjects) ?? [];
                                                    @endphp

                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="checkbox" name="teaching_subjects[]" value="The_Holy_Quran"
                                                            id="The_Holy_Quran" {{ in_array('The_Holy_Quran', $selectedSubjects) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="The_Holy_Quran">The Holy Quran</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="checkbox" name="teaching_subjects[]" value="Religious_Knowledge"
                                                            id="Religious_Knowledge" {{ in_array('Religious_Knowledge', $selectedSubjects) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="Religious_Knowledge">Religious Knowledge</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="checkbox" name="teaching_subjects[]" value="Arabic_Language"
                                                            id="Arabic_Language" {{ in_array('Arabic_Language', $selectedSubjects) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="Arabic_Language">Arabic Language</label>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Working Hours Available Daily -->
                                            <div class="fv-row w-100 mb-4">
                                                <label class="form-label">Working Hours Available Daily:*</label>
                                                <div class="d-flex flex-wrap justify-content-between">
                                                    @php
                                                        $selectedHours = json_decode($teacher->teacher->working_hours) ?? [];
                                                    @endphp

                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="checkbox" name="working_hours[]" value="8_hours" id="eightHours"
                                                            {{ in_array('8_hours', $selectedHours) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="eightHours">8 Hours</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="checkbox" name="working_hours[]" value="4_hours" id="fourHours"
                                                            {{ in_array('4_hours', $selectedHours) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="fourHours">4 Hours</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="checkbox" name="working_hours[]" value="2_hours" id="twoHours"
                                                            {{ in_array('2_hours', $selectedHours) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="twoHours">2 Hours</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="checkbox" name="working_hours[]" value="other" id="otherHours"
                                                             {{ in_array('other', $selectedHours) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="otherHours">Other</label>
                                                    </div>
                                                </div>

                                                @if (in_array('other', $selectedHours))
                                                    <input disabled type="text" id="other_working_hours" name="other_working_hours" class="form-control mt-2"
                                                    value="{{ $teacher->teacher->other_working_hours ?? '' }}">
                                                @endif
                                            </div>

                                            <!-- Shift -->
                                            <div class="fv-row w-100 mb-4">
                                                <label class="form-label">Free to work on a shift:*</label>
                                                <div class="d-flex flex-wrap justify-content-between">
                                                    @php
                                                        $selectedShifts = json_decode($teacher->teacher->work_shifts) ?? [];
                                                    @endphp

                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="checkbox" name="work_shifts[]" value="Morning_8_AM_1_PM" id="Morning_8_AM_1_PM"
                                                            {{ in_array('Morning_8_AM_1_PM', $selectedShifts) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="Morning_8_AM_1_PM">Morning | 8 AM ~ 1 PM</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="checkbox" name="work_shifts[]" value="Evening_1_PM_6_PM" id="Evening_1_PM_6_PM"
                                                            {{ in_array('Evening_1_PM_6_PM', $selectedShifts) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="Evening_1_PM_6_PM">Evening | 1 PM ~ 6 PM</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="checkbox" name="work_shifts[]" value="Evening_6_PM_12_AM" id="Evening_6_PM_12_AM"
                                                            {{ in_array('Evening_6_PM_12_AM', $selectedShifts) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="Evening_6_PM_12_AM">Evening | 6 PM ~ 12 AM</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Work Friday & Saturday -->
                                            <div class="fv-row w-100">
                                                <label class="form-label">Work available Friday and Saturday?*</label>
                                                <div class="d-flex gap-3">
                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="radio" name="fri_sat_work" value="yfri-sat" id="friSatYes"
                                                            {{ $teacher->teacher->fri_sat_work === 'yfri-sat' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="friSatYes">Yes</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="radio" name="fri_sat_work" value="nfri-sat" id="friSatNo"
                                                            {{ $teacher->teacher->fri_sat_work === 'nfri-sat' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="friSatNo">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        var myDropzone = new Dropzone("#kt_ecommerce_add_product_media", {
            url: "https://keenthemes.com/scripts/void.php",
            paramName: "file",
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            accept: function(file, done) {
                if (file.name == "wow.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            }
        });
    </script>
@endsection
