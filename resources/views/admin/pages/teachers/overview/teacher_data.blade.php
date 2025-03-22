<div class="card shadow-sm">
    <div class="card-body">
        <div class="mb-4">
            <label class="form-label fw-bold">{{ trans('teachers.admission_terms') }}</label>
            <div class="d-flex flex-wrap gap-3">
                @php
                    $selectedTerms = json_decode($all_data->teacher->admission_terms) ?? [];
                @endphp
                <div class="form-check">
                    <input disabled class="form-check-input" type="checkbox" name="admission_terms[]" value="permission"
                        id="havePermission" {{ in_array('permission', $selectedTerms) ? 'checked' : '' }}>
                    <label class="form-check-label" for="havePermission">{{ trans('teachers.have_permission') }}</label>
                </div>
                <div class="form-check">
                    <input disabled class="form-check-input" type="checkbox" name="admission_terms[]" value="hours"
                        id="fiveHoursPerDay" {{ in_array('hours', $selectedTerms) ? 'checked' : '' }}>
                    <label class="form-check-label"
                        for="fiveHoursPerDay">{{ trans('teachers.free_5_hours_per_day') }}</label>
                </div>
                <div class="form-check">
                    <input disabled class="form-check-input" type="checkbox" name="admission_terms[]"
                        value="experienced" id="onlineExperience"
                        {{ in_array('experienced', $selectedTerms) ? 'checked' : '' }}>
                    <label class="form-check-label"
                        for="onlineExperience">{{ trans('teachers.experienced_in_online_education') }}</label>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">{{ trans('teachers.education_optional') }}</label>
            <input disabled type="text" name="education" value="{{ $all_data->teacher->education ?? '' }}"
                class="form-control">
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">{{ trans('teachers.azhar') }}</label>
            <div class="d-flex gap-3">
                <div class="form-check">
                    <input disabled class="form-check-input" type="radio" name="azhar" value="yazhar" id="yesAzhar"
                        {{ $all_data->teacher->azhar === 'yazhar' ? 'checked' : '' }}>
                    <label class="form-check-label" for="yesAzhar">{{ trans('teachers.yes') }}</label>
                </div>
                <div class="form-check">
                    <input disabled class="form-check-input" type="radio" name="azhar" value="nazhar" id="noAzhar"
                        {{ $all_data->teacher->azhar === 'nazhar' ? 'checked' : '' }}>
                    <label class="form-check-label" for="noAzhar">{{ trans('teachers.no') }}</label>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">{{ trans('teachers.quran_license') }}</label>
            <div class="d-flex gap-3">
                <div class="form-check">
                    <input disabled class="form-check-input" type="radio" name="quran_license" value="ylicense"
                        id="yesQuranLicense" {{ $all_data->teacher->quran_license === 'ylicense' ? 'checked' : '' }}>
                    <label class="form-check-label" for="yesQuranLicense">{{ trans('teachers.yes') }}</label>
                </div>
                <div class="form-check">
                    <input disabled class="form-check-input" type="radio" name="quran_license" value="nlicense"
                        id="noQuranLicense" {{ $all_data->teacher->quran_license === 'nlicense' ? 'checked' : '' }}>
                    <label class="form-check-label" for="noQuranLicense">{{ trans('teachers.no') }}</label>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">{{ trans('teachers.other_licenses') }}</label>
            <div class="d-flex gap-3">
                <div class="form-check">
                    <input disabled class="form-check-input" type="radio" name="other_license" value="yotherlicense"
                        id="yesOtherLicense"
                        {{ $all_data->teacher->other_license === 'yotherlicense' ? 'checked' : '' }}>
                    <label class="form-check-label" for="yesOtherLicense">{{ trans('teachers.yes') }}</label>
                </div>
                <div class="form-check">
                    <input disabled class="form-check-input" type="radio" name="other_license" value="notherlicense"
                        id="noOtherLicense"
                        {{ $all_data->teacher->other_license === 'notherlicense' ? 'checked' : '' }}>
                    <label class="form-check-label" for="noOtherLicense">{{ trans('teachers.no') }}</label>
                </div>
            </div>
            @if ($all_data->teacher->other_license === 'yotherlicense')
                <input disabled type="text" id="other_license_details" name="other_license_details"
                    class="form-control mt-2" value="{{ $all_data->teacher->other_license_details ?? '' }}">
            @endif
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">{{ trans('teachers.teaching_online') }}</label>
            <div class="d-flex gap-3">
                <div class="form-check">
                    <input disabled class="form-check-input" type="radio" name="teaching_online"
                        value="yteachingonline" id="yesTeachingOnline"
                        {{ $all_data->teacher->teaching_online === 'yteachingonline' ? 'checked' : '' }}>
                    <label class="form-check-label" for="yesTeachingOnline">{{ trans('teachers.yes') }}</label>
                </div>
                <div class="form-check">
                    <input disabled class="form-check-input" type="radio" name="teaching_online"
                        value="nteachingonline" id="noTeachingOnline"
                        {{ $all_data->teacher->teaching_online === 'nteachingonline' ? 'checked' : '' }}>
                    <label class="form-check-label" for="noTeachingOnline">{{ trans('teachers.no') }}</label>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">{{ trans('teachers.communication_platforms') }}</label>
            <div class="d-flex flex-wrap gap-3">
                @php
                    $selectedPlatforms = json_decode($all_data->teacher->communication_platforms) ?? [];
                @endphp
                <div class="form-check">
                    <input disabled class="form-check-input" type="checkbox" name="communication_platforms[]"
                        value="zoom" id="zoom" {{ in_array('zoom', $selectedPlatforms) ? 'checked' : '' }}>
                    <label class="form-check-label" for="zoom">{{ trans('teachers.zoom') }}</label>
                </div>
                <div class="form-check">
                    <input disabled class="form-check-input" type="checkbox" name="communication_platforms[]"
                        value="google" id="googleMeet" {{ in_array('google', $selectedPlatforms) ? 'checked' : '' }}>
                    <label class="form-check-label" for="googleMeet">{{ trans('teachers.google_meet') }}</label>
                </div>
                <div class="form-check">
                    <input disabled class="form-check-input" type="checkbox" name="communication_platforms[]"
                        value="drive" id="drive" {{ in_array('drive', $selectedPlatforms) ? 'checked' : '' }}>
                    <label class="form-check-label" for="drive">{{ trans('teachers.drive') }}</label>
                </div>
                <div class="form-check">
                    <input disabled class="form-check-input" type="checkbox" name="communication_platforms[]"
                        value="gmail" id="gmail" {{ in_array('gmail', $selectedPlatforms) ? 'checked' : '' }}>
                    <label class="form-check-label" for="gmail">{{ trans('teachers.gmail') }}</label>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">{{ trans('teachers.teach_kids') }}</label>
            <div class="d-flex gap-3">
                <div class="form-check">
                    <input disabled class="form-check-input" type="radio" name="teaching_kids"
                        value="yteachingkids" id="teachingKidsYes"
                        {{ $all_data->teacher->teaching_kids == 'yteachingkids' ? 'checked' : '' }}>
                    <label class="form-check-label" for="teachingKidsYes">{{ trans('teachers.yes') }}</label>
                </div>
                <div class="form-check">
                    <input disabled class="form-check-input" type="radio" name="teaching_kids"
                        value="nteachingkids" id="teachingKidsNo"
                        {{ $all_data->teacher->teaching_kids == 'nteachingkids' ? 'checked' : '' }}>
                    <label class="form-check-label" for="teachingKidsNo">{{ trans('teachers.no') }}</label>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">{{ trans('teachers.what_teacher_can_teach') }}</label>
            <div class="d-flex flex-wrap gap-3">
                @php
                    $selectedSubjects = json_decode($all_data->teacher->teaching_subjects) ?? [];
                @endphp
                <div class="form-check">
                    <input disabled class="form-check-input" type="checkbox" name="teaching_subjects[]"
                        value="The_Holy_Quran" id="The_Holy_Quran"
                        {{ in_array('The_Holy_Quran', $selectedSubjects) ? 'checked' : '' }}>
                    <label class="form-check-label"
                        for="The_Holy_Quran">{{ trans('teachers.the_holy_quran') }}</label>
                </div>
                <div class="form-check">
                    <input disabled class="form-check-input" type="checkbox" name="teaching_subjects[]"
                        value="Religious_Knowledge" id="Religious_Knowledge"
                        {{ in_array('Religious_Knowledge', $selectedSubjects) ? 'checked' : '' }}>
                    <label class="form-check-label"
                        for="Religious_Knowledge">{{ trans('teachers.religious_knowledge') }}</label>
                </div>
                <div class="form-check">
                    <input disabled class="form-check-input" type="checkbox" name="teaching_subjects[]"
                        value="Arabic_Language" id="Arabic_Language"
                        {{ in_array('Arabic_Language', $selectedSubjects) ? 'checked' : '' }}>
                    <label class="form-check-label"
                        for="Arabic_Language">{{ trans('teachers.arabic_language') }}</label>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">{{ trans('teachers.working_hours_available_daily') }}</label>
            <div class="d-flex flex-wrap gap-3">
                @php
                    $selectedHours = json_decode($all_data->teacher->working_hours) ?? [];
                @endphp
                <div class="form-check">
                    <input disabled class="form-check-input" type="checkbox" name="working_hours[]" value="8_hours"
                        id="eightHours" {{ in_array('8_hours', $selectedHours) ? 'checked' : '' }}>
                    <label class="form-check-label" for="eightHours">{{ trans('teachers.eight_hours') }}</label>
                </div>
                <div class="form-check">
                    <input disabled class="form-check-input" type="checkbox" name="working_hours[]" value="4_hours"
                        id="fourHours" {{ in_array('4_hours', $selectedHours) ? 'checked' : '' }}>
                    <label class="form-check-label" for="fourHours">{{ trans('teachers.four_hours') }}</label>
                </div>
                <div class="form-check">
                    <input disabled class="form-check-input" type="checkbox" name="working_hours[]" value="2_hours"
                        id="twoHours" {{ in_array('2_hours', $selectedHours) ? 'checked' : '' }}>
                    <label class="form-check-label" for="twoHours">{{ trans('teachers.two_hours') }}</label>
                </div>
                <div class="form-check">
                    <input disabled class="form-check-input" type="checkbox" name="working_hours[]" value="other"
                        id="otherHours" {{ in_array('other', $selectedHours) ? 'checked' : '' }}>
                    <label class="form-check-label" for="otherHours">{{ trans('teachers.other') }}</label>
                </div>
            </div>
            @if (in_array('other', $selectedHours))
                <input disabled type="text" id="other_working_hours" name="other_working_hours"
                    class="form-control mt-2" value="{{ $all_data->teacher->other_working_hours ?? '' }}">
            @endif
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">{{ trans('teachers.free_to_work_on_shift') }}</label>
            <div class="d-flex flex-wrap gap-3">
                @php
                    $selectedShifts = json_decode($all_data->teacher->work_shifts) ?? [];
                @endphp
                <div class="form-check">
                    <input disabled class="form-check-input" type="checkbox" name="work_shifts[]"
                        value="Morning_8_AM_1_PM" id="Morning_8_AM_1_PM"
                        {{ in_array('Morning_8_AM_1_PM', $selectedShifts) ? 'checked' : '' }}>
                    <label class="form-check-label"
                        for="Morning_8_AM_1_PM">{{ trans('teachers.morning_8_am_1_pm') }}</label>
                </div>
                <div class="form-check">
                    <input disabled class="form-check-input" type="checkbox" name="work_shifts[]"
                        value="Evening_1_PM_6_PM" id="Evening_1_PM_6_PM"
                        {{ in_array('Evening_1_PM_6_PM', $selectedShifts) ? 'checked' : '' }}>
                    <label class="form-check-label"
                        for="Evening_1_PM_6_PM">{{ trans('teachers.evening_1_pm_6_pm') }}</label>
                </div>
                <div class="form-check">
                    <input disabled class="form-check-input" type="checkbox" name="work_shifts[]"
                        value="Evening_6_PM_12_AM" id="Evening_6_PM_12_AM"
                        {{ in_array('Evening_6_PM_12_AM', $selectedShifts) ? 'checked' : '' }}>
                    <label class="form-check-label"
                        for="Evening_6_PM_12_AM">{{ trans('teachers.evening_6_pm_12_am') }}</label>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">{{ trans('teachers.work_friday_saturday') }}</label>
            <div class="d-flex gap-3">
                <div class="form-check">
                    <input disabled class="form-check-input" type="radio" name="fri_sat_work" value="yfri-sat"
                        id="friSatYes" {{ $all_data->teacher->fri_sat_work === 'yfri-sat' ? 'checked' : '' }}>
                    <label class="form-check-label" for="friSatYes">{{ trans('teachers.yes') }}</label>
                </div>
                <div class="form-check">
                    <input disabled class="form-check-input" type="radio" name="fri_sat_work" value="nfri-sat"
                        id="friSatNo" {{ $all_data->teacher->fri_sat_work === 'nfri-sat' ? 'checked' : '' }}>
                    <label class="form-check-label" for="friSatNo">{{ trans('teachers.no') }}</label>
                </div>
            </div>
        </div>
    </div>
</div>
