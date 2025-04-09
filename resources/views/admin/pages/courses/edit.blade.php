@extends('admin.layouts.master')
@section('toolbar')
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        @php
            $title = trans('courses.courses');
            $breadcrumbs = [
                ['label' => 'Home', 'link' => ''],
                ['label' => 'Courses', 'link' => ''],
                ['label' => 'Edit', 'link' => ''],
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
                <form action="{{ route('admin.courses.update', $course->id) }}" method="post" id="store_form" enctype="multipart/form-data"
                    class="form d-flex flex-column flex-lg-row">
                    @csrf
                    @method('PUT')
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>{{ trans('courses.edit') }}</h2>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">


                                            <div class="d-flex flex-wrap" style="margin-top: 10px">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('courses.section_name') }}</label>
                                                    <select name="section_id" id="section_id" class="form-control mb-2"
                                                        required>
                                                        <option disabled selected value="">
                                                            {{ trans('actions.choose') }}</option>
                                                        @foreach ($sections as $section)
                                                            <option value="{{ $section->id }}"
                                                                {{ old('section_id', $course->section_id) == $section->id ? 'selected' : '' }}>
                                                                {{ $section->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('section_id')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5"style="margin-top: 10px">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('courses.name_en') }}</label>
                                                    <input type="text" name="name[en]" id="name_en"
                                                        class="form-control mb-2"
                                                        value="{{ old('name.en', $course->getTranslation('name', 'en')) }}"
                                                        required />
                                                    @error('name.en')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('courses.name_ar') }}</label>
                                                    <input type="text" name="name[ar]" id="name_ar"
                                                        class="form-control mb-2"
                                                        value="{{ old('name.ar', $course->getTranslation('name', 'ar')) }}"
                                                        required />
                                                    @error('name.ar')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5 " style="margin-top: 10px">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label
                                                        class="form-label">{{ trans('courses.description_en') }}</label>
                                                    <textarea name="description[en]" id="description_en" class="form-control mb-2" rows="4" required>{{ old('description.en', $course->getTranslation('description', 'en')) }}</textarea>
                                                    @error('description.en')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label
                                                        class="form-label">{{ trans('courses.description_ar') }}</label>
                                                    <textarea name="description[ar]" id="description_ar" class="form-control mb-2" rows="4" required>{{ old('description.ar', $course->getTranslation('description', 'ar')) }}</textarea>
                                                    @error('description.ar')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap" style="margin-top: 20px">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('courses.image') }}</label>
                                                    <input type="file" class="form-control" name="image" id="image">
                                                    @error('image')
                                                    <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                                                    @enderror
                                                    @php
                                                      //dd($course->name);
                                                        $imagePath = asset('images/' . $course->image);
                                                    @endphp
                                                    @if(isset($course) && $imagePath)
                                                        <div class="mt-2">
                                                            <img src="{{ $imagePath }}" alt="Talab Image" class="img-thumbnail" width="150">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            {{--  course money   --}}
                                            <hr style="margin-top: 30px; width: 100%; border: 2px solid black;">
                                            @foreach ($course->courseMoneys as $index => $lecture)

                                            <input type="hidden" name="lectures[{{ $index }}][id]" value="{{ $lecture->id }}">

                                            <div id="lecture-container">
                                                    <div class="lecture-row d-flex flex-wrap gap-2">
                                                        <div class="fv-row flex-grow-1">
                                                            <label
                                                                class="form-label">{{ trans('courses.num_of_minutes') }}</label>
                                                            <input type="text"
                                                                   name="lectures[{{ $index }}][num_of_minutes]"
                                                                   class="form-control mb-2" required
                                                                   value="{{ old("lectures.$index.num_of_minutes", $lecture->num_of_minuts) }}" />
                                                            @error("lectures.{$index}.num_of_minutes")
                                                            <span class="invalid-feedback d-block"
                                                                  role="alert">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="fv-row flex-grow-1">
                                                            <label
                                                                class="form-label">{{ trans('courses.lecture_price') }}</label>
                                                            <input type="text"
                                                                   name="lectures[{{ $index }}][lecture_price]"
                                                                   class="form-control mb-2 lecture_price" required
                                                                   value="{{ old("lectures.$index.lecture_price", $lecture->lecture_price) }}" />
                                                            @error("lectures.{$index}.lecture_price")
                                                            <span class="invalid-feedback d-block"
                                                                  role="alert">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="fv-row flex-grow-1">
                                                            <label
                                                                class="form-label">{{ trans('courses.num_of_lectures') }}</label>
                                                            <input type="text"
                                                                   name="lectures[{{ $index }}][num_of_lectures]"
                                                                   class="form-control mb-2 num_of_lectures" required
                                                                   value="{{ old("lectures.$index.num_of_lectures", $lecture->num_of_lectures) }}" />
                                                            @error("lectures.{$index}.num_of_lectures")
                                                            <span class="invalid-feedback d-block"
                                                                  role="alert">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="fv-row flex-grow-1">
                                                            <label
                                                                class="form-label">{{ trans('courses.lectures_in_week') }}</label>
                                                            <input type="text"
                                                                   name="lectures[{{ $index }}][lectures_in_week]"
                                                                   class="form-control mb-2" required
                                                                   value="{{ old("lectures.$index.lectures_in_week", $lecture->lectures_in_week) }}" />
                                                            @error("lectures.{$index}.lectures_in_week")
                                                            <span class="invalid-feedback d-block"
                                                                  role="alert">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="fv-row flex-grow-1">
                                                            <label
                                                                class="form-label">{{ trans('courses.total_price') }}</label>
                                                            <input type="text"
                                                                   name="lectures[{{ $index }}][total_price]"
                                                                   class="form-control mb-2 total_price" required readonly
                                                                   value="{{ old("lectures.$index.total_price", $lecture->total_price) }}" />
                                                            @error("lectures.{$index}.total_price")
                                                            <span class="invalid-feedback d-block"
                                                                  role="alert">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="fv-row flex-grow- ms-3">
                                                            <label
                                                                class="form-label">{{ trans('courses.for_group') }}</label>
                                                            <div class="form-check form-switch mt-3">
                                                                <input type="hidden"
                                                                       name="lectures[{{ $index }}][for_group]"
                                                                       value="0">
                                                                <input
                                                                    class="form-check-input toggle-switch for-group-toggle"
                                                                    type="checkbox" value="1"
                                                                    name="lectures[{{ $index }}][for_group]"
                                                                    data-index="{{ $index }}"
                                                                    {{ old("lectures.$index.for_group", $lecture->for_group) ? 'checked' : '' }}>
                                                            </div>
                                                            @error("lectures.{$index}.for_group")
                                                            <span class="invalid-feedback d-block"
                                                                  role="alert">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="fv-row flex-grow-1 max-in-group-container"
                                                             data-index="{{ $index }}"
                                                             style="{{ old("lectures.$index.for_group", $lecture->for_group) ? '' : 'display: none;' }}">
                                                            <label
                                                                class="form-label">{{ trans('courses.max_in_group') }}</label>
                                                            <input type="text"
                                                                   name="lectures[{{ $index }}][max_in_group]"
                                                                   class="form-control mb-2"
                                                                   value="{{ old("lectures.$index.max_in_group", $lecture->max_in_group) }}" />
                                                            @error("lectures.{$index}.max_in_group")
                                                            <span class="invalid-feedback d-block"
                                                                  role="alert">{{ $message }}</span>
                                                            @enderror
                                                        </div>


                                                        <div class="fv-row mt-9">
                                                            <a type="button"
                                                               class="btn btn-icon btn-sm btn-danger remove-lecture-row flex-shrink-0 ms-4"
                                                               title="Delete">

                                                                <i class="bi bi-trash-fill"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach



                                            <a type="button" id="add-lecture-row"
                                               class="btn btn-icon btn-sm btn-primary flex-shrink-0 ms-4">

                                                <span class="svg-icon svg-icon-2">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                       <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                                             rx="1"
                                                             transform="rotate(-90 11.364 20.364)" fill="currentColor"/>
                                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                                          fill="currentColor"/>
                                                   </svg>
                                                </span>
                                            </a>
                                            <hr style="margin-top: 30px; width: 100%; border: 2px solid black;">
                                            {{--  course money   --}}


                                            <div class="d-flex flex-wrap gap-5" style="margin-top: 10px">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label
                                                        class="form-label">{{ trans('courses.seo_head_keyword_en') }}</label>
                                                    <input type="text" name="seo_head_keyword[en]"
                                                        id="seo_head_keyword_en" class="form-control mb-2"
                                                        value="{{ old('seo_head_keyword.en', $course->getTranslation('seo_head_keyword', 'en')) }}"
                                                        required />
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
                                                        value="{{ old('seo_head_keyword.ar', $course->getTranslation('seo_head_keyword', 'ar')) }}"
                                                        required />
                                                    @error('seo_head_keyword.ar')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5" style="margin-top: 10px">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label
                                                        class="form-label">{{ trans('courses.seo_head_description_en') }}</label>
                                                    <textarea name="seo_head_description[en]" id="seo_head_description_en" class="form-control mb-2" rows="4"
                                                        required>{{ old('seo_head_description.en', $course->getTranslation('seo_head_description', 'en')) }}</textarea>
                                                    @error('seo_head_description.en')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label
                                                        class="form-label">{{ trans('courses.seo_head_description_ar') }}</label>
                                                    <textarea name="seo_head_description[ar]" id="seo_head_description_ar" class="form-control mb-2" rows="4"
                                                        required>{{ old('seo_head_description.ar', $course->getTranslation('seo_head_description', 'ar')) }}</textarea>
                                                    @error('seo_head_description.ar')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5" style="margin-top: 10px">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('courses.min_age') }}</label>
                                                    <input type="text" name="min_age" id="min_age"
                                                        class="form-control mb-2"
                                                        value="{{ old('min_age', $course->min_age) }}" required />
                                                    @error('min_age')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('courses.max_age') }}</label>
                                                    <input type="text" name="max_age" id="max_age"
                                                        class="form-control mb-2"
                                                        value="{{ old('max_age', $course->max_age) }}" required />
                                                    @error('max_age')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5" style="margin-top: 10px">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('courses.status') }}</label>
                                                    <div class="form-check form-switch">
                                                        <input type="hidden" name="status" value="0">
                                                        <input class="form-check-input toggle-switch" type="checkbox"
                                                            id="status" name="status" value="1"
                                                            {{ old('status', $course->status) == 1 ? 'checked' : '' }}>
                                                    </div>
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('courses.unique') }}</label>
                                                    <div class="form-check form-switch">
                                                        <input type="hidden" name="unique" value="0">
                                                        <input class="form-check-input toggle-switch" type="checkbox"
                                                            id="unique" name="unique" value="1"
                                                            {{ old('unique', $course->unique) == 1 ? 'checked' : '' }}>
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
            let lectureIndex = document.querySelectorAll(".lecture-row").length; // Start from the existing count

            function updateTotalPrice(index) {
                const numOfLecturesInput = document.querySelector(
                    `input[name="lectures[${index}][num_of_lectures]"]`);
                const lecturePriceInput = document.querySelector(`input[name="lectures[${index}][lecture_price]"]`);
                const totalPriceInput = document.querySelector(`input[name="lectures[${index}][total_price]"]`);

                if (numOfLecturesInput && lecturePriceInput && totalPriceInput) {
                    const numOfLectures = parseFloat(numOfLecturesInput.value) || 0;
                    const lecturePrice = parseFloat(lecturePriceInput.value) || 0;
                    totalPriceInput.value = (numOfLectures * lecturePrice).toFixed(2);
                }
            }

            function attachEventListeners(index) {
                const numOfLecturesInput = document.querySelector(
                    `input[name="lectures[${index}][num_of_lectures]"]`);
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

                document.querySelectorAll(".remove-lecture-row").forEach(button => {
                    button.addEventListener("click", function() {
                        if (document.querySelectorAll(".lecture-row").length > 1) {
                            this.closest(".lecture-row").remove();
                            checkRemoveButtons();
                        }
                    });
                });

                checkRemoveButtons();
            }

            function checkRemoveButtons() {
                const rows = document.querySelectorAll(".lecture-row");
                document.querySelectorAll(".remove-lecture-row").forEach(button => {
                    button.style.display = rows.length > 1 ? "inline-block" : "none";
                });
            }

            document.getElementById("add-lecture-row").addEventListener("click", function() {
                let container = document.getElementById("lecture-container");
                let lastRow = container.querySelector(".lecture-row:last-of-type"); // Get last row

                if (!lastRow) {
                    console.error("No existing row found!");
                    return;
                }

                let newRow = lastRow.cloneNode(true); // Clone the last row
                newRow.classList.add("mt-2"); // Add margin for spacing

                // Update names and indexes
                newRow.querySelectorAll("input").forEach((input) => {
                    let name = input.getAttribute("name");
                    if (name) {
                        input.setAttribute("name", name.replace(/\[\d+\]/, `[${lectureIndex}]`));
                    }
                    input.value = ""; // Clear input values
                });

                // Reset and ensure the 'for_group' checkbox is set correctly
                let forGroupCheckbox = newRow.querySelector(".for-group-toggle");
                if (forGroupCheckbox) {
                    forGroupCheckbox.setAttribute("data-index", lectureIndex);
                    forGroupCheckbox.checked = false;
                    forGroupCheckbox.value = "0"; // Ensure default value is "0"

                    forGroupCheckbox.addEventListener("change", function() {
                        this.value = this.checked ? "1" : "0"; // Update value dynamically
                    });
                }

                // Update max_in_group visibility and set correct data-index
                let maxInGroupContainer = newRow.querySelector(".max-in-group-container");
                if (maxInGroupContainer) {
                    maxInGroupContainer.style.display = "none";
                    maxInGroupContainer.setAttribute("data-index", lectureIndex);
                }

                // Append the new row after the last existing lecture
                container.appendChild(newRow);

                attachEventListeners(lectureIndex);

                lectureIndex++;
            });


            document.addEventListener("change", function(event) {
                if (event.target.classList.contains("for-group-toggle")) {
                    let index = event.target.getAttribute("data-index");
                    let maxInGroupContainer = document.querySelector(
                        `.max-in-group-container[data-index="${index}"]`);

                    if (maxInGroupContainer) {
                        if (event.target.checked) {
                            maxInGroupContainer.style.display = "block";
                        } else {
                            maxInGroupContainer.style.display = "none";
                        }
                    }
                }
            });

            // Attach event listeners to existing lecture rows
            document.querySelectorAll(".lecture-row").forEach((row, index) => {
                attachEventListeners(index);
            });

            checkRemoveButtons();
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#seo_head_description_ar').summernote({
                height: 50,
                minHeight: 100,
                maxHeight: 650,
                focus: true
            });

            $('#seo_head_description_en').summernote({
                height: 50,
                minHeight: 100,
                maxHeight: 650,
                focus: true
            });
            $('#description_ar').summernote({
                height: 50,
                minHeight: 100,
                maxHeight: 650,
                focus: true
            });

            $('#description_en').summernote({
                height: 50,
                minHeight: 100,
                maxHeight: 650,
                focus: true
            });


        });
    </script>
@endsection
