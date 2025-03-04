@extends('admin.layouts.master')
@section('toolbar')
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        @php
            $title = trans('courses.courses');
            $breadcrumbs = [
                ['label' => 'Home', 'link' => ''],
                ['label' => 'Courses', 'link' => ''],
                ['label' => 'Create', 'link' => ''],
            ];

            PageTitle($title, $breadcrumbs);
        @endphp

        <div class="d-flex align-items-center gap-2 gap-lg-3">

            {{ BackButton(route('admin.courses.index')) }}

        </div>
    </div>
@endsection

@section('css')
    <style>
        .form-check-input {
            width: 3rem;
            height: 1.5rem;
            background-color: #ccc;
            border: none;
            cursor: pointer;
        }

        .form-check-input:checked {
            background-color: #28a745;
        }
    </style>
@endsection

@section('content')

    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <form action="{{ route('admin.courses.store') }}" method="post" id="store_form"
                    class="form d-flex flex-column flex-lg-row">
                    @csrf
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>{{ trans('courses.create') }}</h2>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">

                                            <div id="lecture-container">
                                                <div class="lecture-row d-flex flex-wrap gap-2">
                                                    <div class="fv-row flex-grow-1">
                                                        <label
                                                            class="form-label">{{ trans('courses.num_of_minutes') }}</label>
                                                        <input type="text" name="lectures[0][num_of_minutes]"
                                                            class="form-control mb-2" required />
                                                    </div>
                                                    <div class="fv-row flex-grow-1">
                                                        <label
                                                            class="form-label">{{ trans('courses.lecture_price') }}</label>
                                                        <input type="text" data-index="0"
                                                            name="lectures[0][lecture_price]"
                                                            class="form-control mb-2 lecture_price" required />
                                                    </div>
                                                    <div class="fv-row flex-grow-1">
                                                        <label
                                                            class="form-label">{{ trans('courses.num_of_lectures') }}</label>
                                                        <input type="text" data-index="0"
                                                            name="lectures[0][num_of_lectures]"
                                                            class="form-control mb-2 num_of_lectures" required />
                                                    </div>
                                                    <div class="fv-row flex-grow-1">
                                                        <label
                                                            class="form-label">{{ trans('courses.lectures_in_week') }}</label>
                                                        <input type="text" name="lectures[0][lectures_in_week]"
                                                            class="form-control mb-2" required />
                                                    </div>
                                                    <div class="fv-row flex-grow-1">
                                                        <label class="form-label">{{ trans('courses.total_price') }}</label>
                                                        <input type="text" data-index="0" name="lectures[0][total_price]"
                                                            class="form-control mb-2 total_price" required readonly />
                                                    </div>
                                                    <div class="fv-row flex-grow- ms-3">
                                                        <label class="form-label">{{ trans('courses.for_group') }}</label>
                                                        <div class="form-check form-switch">
                                                            <input type="hidden" name="lectures[0][for_group]"
                                                                value="0">
                                                            <input class="form-check-input toggle-switch for-group-toggle"
                                                                type="checkbox" value="1" name="lectures[0][for_group]"
                                                                data-index="0">
                                                        </div>
                                                    </div>
                                                    <div class="fv-row flex-grow-1 max-in-group-container" data-index="0"
                                                        style="display: none;">
                                                        <label
                                                            class="form-label">{{ trans('courses.max_in_group') }}</label>
                                                        <input type="text" name="lectures[0][max_in_group]"
                                                            class="form-control mb-2" />
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" id="add-lecture-row"
                                                class="btn btn-primary mt-3 mb-3">Add Row</button>

                                            <div class="d-flex flex-wrap">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('courses.section_name') }}</label>
                                                    <select name="section_id" id="section_id" class="form-control mb-2"
                                                        required>
                                                        <option disabled selected value="">
                                                            {{ trans('actions.choose') }}</option>
                                                        @foreach ($sections as $section)
                                                            <option value="{{ $section->id }}">{{ $section->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('section_id')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('courses.name_en') }}</label>
                                                    <input type="text" name="name[en]" id="name_en"
                                                        class="form-control mb-2" value="{{ old('name.en') }}" required />
                                                    @error('name.en')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('courses.name_ar') }}</label>
                                                    <input type="text" name="name[ar]" id="name_ar"
                                                        class="form-control mb-2" value="{{ old('name.ar') }}"
                                                        required />
                                                    @error('name.ar')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label
                                                        class="form-label">{{ trans('courses.description_en') }}</label>
                                                    <textarea name="description[en]" id="description_en" class="form-control mb-2" rows="4" required>{{ old('description.en') }}</textarea>
                                                    @error('description.en')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label
                                                        class="form-label">{{ trans('courses.description_ar') }}</label>
                                                    <textarea name="description[ar]" id="description_ar" class="form-control mb-2" rows="4" required>{{ old('description.ar') }}</textarea>
                                                    @error('description.ar')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label
                                                        class="form-label">{{ trans('courses.seo_head_keyword_en') }}</label>
                                                    <input type="text" name="seo_head_keyword[en]"
                                                        id="seo_head_keyword_en" class="form-control mb-2"
                                                        value="{{ old('seo_head_keyword.en') }}" required />
                                                    @error('seo_head_keyword.en')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label
                                                        class="form-label">{{ trans('courses.seo_head_keyword_ar') }}</label>
                                                    <input type="text" name="seo_head_keyword[ar]"
                                                        id="seo_head_keyword_ar" class="form-control mb-2"
                                                        value="{{ old('seo_head_keyword.ar') }}" required />
                                                    @error('seo_head_keyword.ar')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label
                                                        class="form-label">{{ trans('courses.seo_head_description_en') }}</label>
                                                    <textarea name="seo_head_description[en]" id="seo_head_description_en" class="form-control mb-2" rows="4"
                                                        required>{{ old('seo_head_description.en') }}</textarea>
                                                    @error('seo_head_description.en')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label
                                                        class="form-label">{{ trans('courses.seo_head_description_ar') }}</label>
                                                    <textarea name="seo_head_description[ar]" id="seo_head_description_ar" class="form-control mb-2" rows="4"
                                                        required>{{ old('seo_head_description.ar') }}</textarea>
                                                    @error('seo_head_description.ar')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('courses.min_age') }}</label>
                                                    <input type="text" name="min_age" id="min_age"
                                                        class="form-control mb-2" value="{{ old('min_age') }}"
                                                        required />
                                                    @error('min_age')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('courses.max_age') }}</label>
                                                    <input type="text" name="max_age" id="max_age"
                                                        class="form-control mb-2" value="{{ old('max_age') }}"
                                                        required />
                                                    @error('max_age')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('courses.status') }}</label>
                                                    <div class="form-check form-switch">
                                                        <input type="hidden" name="status" value="0">
                                                        <input class="form-check-input toggle-switch" type="checkbox"
                                                            id="status" name="status" value="1">
                                                    </div>
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('courses.unique') }}</label>
                                                    <div class="form-check form-switch">
                                                        <input type="hidden" name="unique" value="0">
                                                        <input class="form-check-input toggle-switch" type="checkbox"
                                                            id="unique" name="unique" value="1">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                <span class="indicator-label">{{ trans('actions.save') }}</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const status = "{{ old('status', 0) }}";
            const unique = "{{ old('unique', 0) }}";

            if (status == 1) document.getElementById('status').checked = true;
            if (unique == 1) document.getElementById('unique').checked = true;
        });
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let lectureIndex = 1;

            function updateTotalPrice(index) {
                const numOfLecturesInput = document.querySelector(`input[name="lectures[${index}][num_of_lectures]"]`);
                const lecturePriceInput = document.querySelector(`input[name="lectures[${index}][lecture_price]"]`);
                const totalPriceInput = document.querySelector(`input[name="lectures[${index}][total_price]"]`);

                if (numOfLecturesInput && lecturePriceInput && totalPriceInput) {
                    const numOfLectures = parseFloat(numOfLecturesInput.value) || 0;
                    const lecturePrice = parseFloat(lecturePriceInput.value) || 0;
                    const total = (numOfLectures * lecturePrice).toFixed(2);

                    totalPriceInput.value = total;
                }
            }

            function attachEventListeners(index) {
                const numOfLecturesInput = document.querySelector(`input[name="lectures[${index}][num_of_lectures]"]`);
                const lecturePriceInput = document.querySelector(`input[name="lectures[${index}][lecture_price]"]`);
                const totalPriceInput = document.querySelector(`input[name="lectures[${index}][total_price]"]`);

                if (totalPriceInput) {
                    totalPriceInput.setAttribute("readonly", "true");
                }

                if (numOfLecturesInput && lecturePriceInput) {
                    numOfLecturesInput.addEventListener("input", function() {
                        updateTotalPrice(index);
                    });
                    lecturePriceInput.addEventListener("input", function() {
                        updateTotalPrice(index);
                    });
                }
            }

            // Ensure the first row (index 0) has event listeners
            attachEventListeners(0);

            document.getElementById("add-lecture-row").addEventListener("click", function() {
                let container = document.getElementById("lecture-container");
                let firstRow = container.querySelector(".lecture-row"); // Reference first row

                if (!firstRow) {
                    console.error("No existing row found!");
                    return;
                }

                let newRow = firstRow.cloneNode(true); // Clone the first row
                newRow.classList.add("mt-2"); // Add margin for spacing

                // Update names and indexes
                newRow.querySelectorAll("input").forEach((input) => {
                    let name = input.getAttribute("name");
                    if (name) {
                        input.setAttribute("name", name.replace(/\[\d+\]/, `[${lectureIndex}]`));
                    }
                    input.value = ""; // Clear input values
                });

                // Ensure "for_group" input is set correctly (default to 0)
                let forGroupInput = newRow.querySelector('input[name^="lectures"][name$="[for_group]"]');
                if (forGroupInput) {
                    forGroupInput.value = "0"; // Ensure default value
                    forGroupInput.checked = false; // Reset checkbox if applicable
                }

                // Disable total_price input in the new row
                const totalPriceInput = newRow.querySelector(`input[name="lectures[${lectureIndex}][total_price]"]`);
                if (totalPriceInput) {
                    totalPriceInput.setAttribute("readonly", "true");
                }

                // Update toggles and containers
                newRow.querySelectorAll(".for-group-toggle").forEach((toggle) => {
                    toggle.setAttribute("data-index", lectureIndex);
                    toggle.checked = false; // Reset toggle
                });

                newRow.querySelectorAll(".max-in-group-container").forEach((container) => {
                    container.setAttribute("data-index", lectureIndex);
                    container.style.display = "none"; // Hide by default
                });

                container.appendChild(newRow);

                attachEventListeners(lectureIndex);

                lectureIndex++;
            });

            document.addEventListener("change", function(event) {
                if (event.target.classList.contains("for-group-toggle")) {
                    let index = event.target.getAttribute("data-index");
                    let maxInGroupContainer = document.querySelector(`.max-in-group-container[data-index="${index}"]`);

                    if (event.target.checked) {
                        maxInGroupContainer.style.display = "block";
                    } else {
                        maxInGroupContainer.style.display = "none";
                    }
                }
            });
        });
    </script>


@endsection
