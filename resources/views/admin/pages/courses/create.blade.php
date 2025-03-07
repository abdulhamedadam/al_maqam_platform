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
                <form action="{{ route('admin.courses.store') }}" method="post" id="store_form" enctype="multipart/form-data"
                      class="form d-flex flex-column flex-lg-row">
                    @csrf
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general"
                                 role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>{{ trans('courses.create') }}</h2>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">


                                            <div class="d-flex flex-wrap">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label
                                                        class="form-label">{{ trans('courses.section_name') }}</label>
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
                                                           class="form-control mb-2" value="{{ old('name.en') }}"
                                                           required/>
                                                    @error('name.en')
                                                    <span class="invalid-feedback d-block"
                                                          role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('courses.name_ar') }}</label>
                                                    <input type="text" name="name[ar]" id="name_ar"
                                                           class="form-control mb-2" value="{{ old('name.ar') }}"
                                                           required/>
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
                                                    <textarea name="description[en]" id="description_en"
                                                              class="form-control mb-2" rows="4"
                                                              required>{{ old('description.en') }}</textarea>
                                                    @error('description.en')
                                                    <span class="invalid-feedback d-block"
                                                          role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label
                                                        class="form-label">{{ trans('courses.description_ar') }}</label>
                                                    <textarea name="description[ar]" id="description_ar"
                                                              class="form-control mb-2" rows="4"
                                                              required>{{ old('description.ar') }}</textarea>
                                                    @error('description.ar')
                                                    <span class="invalid-feedback d-block"
                                                          role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                           {{--  course money   --}}
                                            <hr style="margin-top: 30px; width: 100%; border: 2px solid black;">
                                            <div id="lecture-container">
                                                <div class="lecture-row d-flex flex-wrap gap-2">

                                                    <div class="fv-row flex-grow-1">
                                                        <label
                                                            class="form-label">{{ trans('courses.num_of_minutes') }}</label>
                                                        <input type="text" name="lectures[0][num_of_minutes]"
                                                               class="form-control mb-2" required/>
                                                        @foreach ($errors->get('lectures.*.num_of_minutes') as $key => $message)
                                                            <span class="invalid-feedback d-block"
                                                                  role="alert">{{ $message[0] }}</span>
                                                        @endforeach
                                                    </div>

                                                    <div class="fv-row flex-grow-1">
                                                        <label
                                                            class="form-label">{{ trans('courses.lecture_price') }}</label>
                                                        <input type="text" data-index="0"
                                                               name="lectures[0][lecture_price]"
                                                               class="form-control mb-2 lecture_price" required/>
                                                        @foreach ($errors->get('lectures.*.lecture_price') as $key => $message)
                                                            <span class="invalid-feedback d-block"
                                                                  role="alert">{{ $message[0] }}</span>
                                                        @endforeach
                                                    </div>

                                                    <div class="fv-row flex-grow-1">
                                                        <label
                                                            class="form-label">{{ trans('courses.num_of_lectures') }}</label>
                                                        <input type="text" data-index="0"
                                                               name="lectures[0][num_of_lectures]"
                                                               class="form-control mb-2 num_of_lectures" required/>
                                                        @foreach ($errors->get('lectures.*.num_of_lectures') as $key => $message)
                                                            <span class="invalid-feedback d-block"
                                                                  role="alert">{{ $message[0] }}</span>
                                                        @endforeach
                                                    </div>

                                                    <div class="fv-row flex-grow-1">
                                                        <label
                                                            class="form-label">{{ trans('courses.lectures_in_week') }}</label>
                                                        <input type="text" name="lectures[0][lectures_in_week]"
                                                               class="form-control mb-2" required/>
                                                        @foreach ($errors->get('lectures.*.lectures_in_week') as $key => $message)
                                                            <span class="invalid-feedback d-block"
                                                                  role="alert">{{ $message[0] }}</span>
                                                        @endforeach
                                                    </div>

                                                    <div class="fv-row flex-grow-1">
                                                        <label
                                                            class="form-label">{{ trans('courses.total_price') }}</label>
                                                        <input type="text" data-index="0"
                                                               name="lectures[0][total_price]"
                                                               class="form-control mb-2 total_price" required readonly/>
                                                        @foreach ($errors->get('lectures.*.total_price') as $key => $message)
                                                            <span class="invalid-feedback d-block"
                                                                  role="alert">{{ $message[0] }}</span>
                                                        @endforeach
                                                    </div>

                                                    <div class="fv-row flex-grow- ms-3">
                                                        <label
                                                            class="form-label">{{ trans('courses.for_group') }}</label>
                                                        <div class="form-check form-switch mt-3">
                                                            <input type="hidden" name="lectures[0][for_group]"
                                                                   value="0">
                                                            <input
                                                                class="form-check-input toggle-switch for-group-toggle"
                                                                type="checkbox" value="1" name="lectures[0][for_group]"
                                                                data-index="0">
                                                        </div>
                                                        @foreach ($errors->get('lectures.*.for_group') as $key => $message)
                                                            <span class="invalid-feedback d-block"
                                                                  role="alert">{{ $message[0] }}</span>
                                                        @endforeach
                                                    </div>

                                                    <div class="fv-row flex-grow-1 max-in-group-container"
                                                         data-index="0"
                                                         style="display: none;">
                                                        <label
                                                            class="form-label">{{ trans('courses.max_in_group') }}</label>
                                                        <input type="text" name="lectures[0][max_in_group]"
                                                               class="form-control mb-2"/>
                                                        @foreach ($errors->get('lectures.*.max_in_group') as $key => $message)
                                                            <span class="invalid-feedback d-block"
                                                                  role="alert">{{ $message[0] }}</span>
                                                        @endforeach
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

                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label
                                                        class="form-label">{{ trans('courses.seo_head_keyword_en') }}</label>
                                                    <input type="text" name="seo_head_keyword[en]"
                                                           id="seo_head_keyword_en" class="form-control mb-2"
                                                           value="{{ old('seo_head_keyword.en') }}" required/>
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
                                                           value="{{ old('seo_head_keyword.ar') }}" required/>
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
                                                    <textarea name="seo_head_description[en]"
                                                              id="seo_head_description_en" class="form-control mb-2"
                                                              rows="4"
                                                              required>{{ old('seo_head_description.en') }}</textarea>
                                                    @error('seo_head_description.en')
                                                    <span class="invalid-feedback d-block"
                                                          role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label
                                                        class="form-label">{{ trans('courses.seo_head_description_ar') }}</label>
                                                    <textarea name="seo_head_description[ar]"
                                                              id="seo_head_description_ar" class="form-control mb-2"
                                                              rows="4"
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
                                                           required/>
                                                    @error('min_age')
                                                    <span class="invalid-feedback d-block"
                                                          role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('courses.max_age') }}</label>
                                                    <input type="text" name="max_age" id="max_age"
                                                           class="form-control mb-2" value="{{ old('max_age') }}"
                                                           required/>
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
        document.addEventListener("DOMContentLoaded", function () {
            const status = "{{ old('status', 0) }}";
            const unique = "{{ old('unique', 0) }}";

            if (status == 1) document.getElementById('status').checked = true;
            if (unique == 1) document.getElementById('unique').checked = true;
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let lectureIndex = 1;

            function updateTotalPrice(row) {
                const numOfLecturesInput = row.querySelector(`input[name^="lectures["][name$="[num_of_lectures]"]`);
                const lecturePriceInput = row.querySelector(`input[name^="lectures["][name$="[lecture_price]"]`);
                const totalPriceInput = row.querySelector(`input[name^="lectures["][name$="[total_price]"]`);

                if (numOfLecturesInput && lecturePriceInput && totalPriceInput) {
                    const numOfLectures = parseFloat(numOfLecturesInput.value) || 0;
                    const lecturePrice = parseFloat(lecturePriceInput.value) || 0;
                    totalPriceInput.value = (numOfLectures * lecturePrice).toFixed(2);
                }
            }

            function attachEventListeners(row) {
                const numOfLecturesInput = row.querySelector(`input[name^="lectures["][name$="[num_of_lectures]"]`);
                const lecturePriceInput = row.querySelector(`input[name^="lectures["][name$="[lecture_price]"]`);
                const totalPriceInput = row.querySelector(`input[name^="lectures["][name$="[total_price]"]`);
                const forGroupToggle = row.querySelector(`.for-group-toggle`);
                const maxInGroupContainer = row.querySelector(`.max-in-group-container`);

                if (totalPriceInput) totalPriceInput.setAttribute("readonly", "true");

                if (numOfLecturesInput && lecturePriceInput) {
                    numOfLecturesInput.addEventListener("input", () => updateTotalPrice(row));
                    lecturePriceInput.addEventListener("input", () => updateTotalPrice(row));
                }

                if (forGroupToggle && maxInGroupContainer) {
                    forGroupToggle.addEventListener("change", function () {
                        maxInGroupContainer.style.display = this.checked ? "block" : "none";
                    });
                }

                row.querySelector(".remove-lecture-row").addEventListener("click", function () {
                    if (document.querySelectorAll(".lecture-row").length > 1) {
                        row.remove();
                        checkRemoveButtons();
                    }
                });

                checkRemoveButtons();
            }

            function checkRemoveButtons() {
                const rows = document.querySelectorAll(".lecture-row");
                document.querySelectorAll(".remove-lecture-row").forEach(button => {
                    button.style.display = rows.length > 1 ? "inline-block" : "none";
                });
            }

            document.getElementById("add-lecture-row").addEventListener("click", function () {
                let container = document.getElementById("lecture-container");
                let firstRow = container.querySelector(".lecture-row");

                if (!firstRow) {
                    console.error("No existing row found!");
                    return;
                }

                let newRow = firstRow.cloneNode(true);
                newRow.classList.add("mt-2");

                // Reset input values and update name indexes
                newRow.querySelectorAll("input, select, checkbox").forEach(input => {
                    let name = input.getAttribute("name");
                    if (name) {
                        let newName = name.replace(/\[\d+\]/, `[${lectureIndex}]`);
                        input.setAttribute("name", newName);
                    }

                    if (input.type === "checkbox") {
                        input.checked = false;
                    } else {
                        input.value = "";
                    }
                });

                // Ensure the hidden input for 'for_group' also gets updated
                let hiddenForGroupInput = newRow.querySelector(
                    `input[type="hidden"][name^="lectures["][name$="[for_group]"]`);
                if (hiddenForGroupInput) {
                    hiddenForGroupInput.setAttribute("name", `lectures[${lectureIndex}][for_group]`);
                    hiddenForGroupInput.value = "0";
                }

                let forGroupCheckbox = newRow.querySelector(".for-group-toggle");
                if (forGroupCheckbox) {
                    forGroupCheckbox.setAttribute("name", `lectures[${lectureIndex}][for_group]`);
                    forGroupCheckbox.addEventListener("change", function () {
                        hiddenForGroupInput.value = this.checked ? "1" : "0";
                    });
                }

                container.appendChild(newRow);

                attachEventListeners(newRow);

                lectureIndex++;
            });

            document.querySelectorAll(".lecture-row").forEach(row => attachEventListeners(row));

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
