@extends('admin.layouts.master')
@section('css')

@endsection
@section('toolbar')
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        @php
            $title = trans('Toolbar.about_us');
         $breadcrumbs = [
                  ['label' => trans('Toolbar.home'), 'link' =>''],
                  ['label' => trans('Toolbar.about_us'), 'link' => ''],
                  ['label' => trans('Toolbar.edit_about_us'), 'link' => ''],
                  ];

          PageTitle($title, $breadcrumbs);
        @endphp


        <div class="d-flex align-items-center gap-2 gap-lg-3">

            {{ BackButton(route('admin.about_us.index'))}}

        </div>
    </div>

@endsection
@section('content')

    <div id="kt_app_content_container" class="t_container">

        <div class="card shadow-sm" style="border-top: 3px solid #007bff;">

            <div class="card-header">
                <h3 class="card-title">{{trans('about_us.add_about_us')}}</h3>
                <div class="card-toolbar">

                    <div class="text-center">

                    </div>
                </div>
            </div>


            <form action="{{ route('admin.about_us.update',$record['id']) }}" method="post" enctype="multipart/form-data"
                  id="store_form">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row col-md-12" style="margin: 10px">

                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('about_us.title')}}(<span
                                    class="text-muted">{{trans('form.ar')}}</span>)</label>
                            <input type="text" class="form-control" name="title_ar" id="title_ar"
                                   value="{{old('title_ar',$record['title']['ar'])}}">
                            @error('title_ar')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('about_us.title')}}(<span
                                    class="text-muted">{{trans('form.en')}}</span>)</label>
                            <input type="text" class="form-control" name="title_en" id="title_en"
                                   value="{{old('title_en',$record['title']['en'])}}">
                            @error('title_en')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="row col-md-12" style="margin: 10px">

                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('about_us.content')}}(<span
                                    class="text-muted">{{trans('form.ar')}}</span>)</label>
                            <textarea type="text" class="form-control" name="description_ar" id="description_ar">
                                {{old('description_ar',$record['description']['ar'])}}
                            </textarea>
                            @error('description_ar')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>




                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('about_us.content')}}(<span
                                    class="text-muted">{{trans('form.en')}}</span>)</label>
                            <textarea type="text" class="form-control" name="description_en" id="description_en">
                                {{old('description_en',$record['description']['en'])}}
                            </textarea>
                            @error('description_en')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row col-md-12" style="margin: 10px">

                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('about_us.our_mission')}}(<span
                                    class="text-muted">{{trans('form.ar')}}</span>)</label>
                            <textarea type="text" class="form-control" name="our_mission_ar" id="our_mission_ar">
                                {{old('our_mission_ar',$record['our_mission']['ar'])}}
                            </textarea>
                            @error('our_mission_ar')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('about_us.our_mission')}}(<span
                                    class="text-muted">{{trans('form.en')}}</span>)</label>
                            <textarea type="text" class="form-control" name="our_mission_en" id="our_mission_en">
                                {{old('our_mission_en',$record['our_mission']['en'])}}
                            </textarea>
                            @error('our_mission_en')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="row col-md-12" style="margin: 10px">

                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('about_us.our_experience')}}(<span
                                    class="text-muted">{{trans('form.ar')}}</span>)</label>
                            <textarea type="text" class="form-control" name="our_experience_ar" id="our_experience_ar">
                                {{old('our_experience_ar',$record['our_experience']['ar'])}}
                            </textarea>
                            @error('our_experience_ar')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('about_us.our_experience')}}(<span
                                    class="text-muted">{{trans('form.en')}}</span>)</label>
                            <textarea type="text" class="form-control" name="our_experience_en" id="our_experience_en">
                                {{old('our_experience_en',$record['our_experience']['en'])}}
                            </textarea>
                            @error('our_experience_en')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>


                    <div class="row col-md-12" style="margin: 10px">

                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('about_us.our_vision')}}(<span
                                    class="text-muted">{{trans('form.ar')}}</span>)</label>
                            <textarea type="text" class="form-control" name="our_vision_ar" id="our_vision_ar">
                                {{old('our_vision_ar',$record['our_vision']['ar'])}}
                            </textarea>
                            @error('our_vision_ar')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('about_us.our_vision')}}(<span
                                    class="text-muted">{{trans('form.en')}}</span>)</label>
                            <textarea type="text" class="form-control" name="our_vision_en" id="our_vision_en">
                                {{old('our_vision_en',$record['our_vision']['en'])}}
                            </textarea>
                            @error('our_vision_en')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="row col-md-12" style="margin: 10px">

                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('about_us.notes')}}(<span
                                    class="text-muted">{{trans('form.ar')}}</span>)</label>
                            <textarea type="text" class="form-control" name="notes_ar" id="notes_ar">
                                {{old('notes_ar',$record['notes']['ar'])}}
                            </textarea>
                            @error('notes_ar')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('about_us.notes')}}(<span
                                    class="text-muted">{{trans('form.en')}}</span>)</label>
                            <textarea type="text" class="form-control" name="notes_en" id="notes_en">
                                {{old('notes_en',$record['notes']['en'])}}
                            </textarea>
                            @error('notes_en')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="row col-md-12" style="margin: 10px">
                        <label for="name" class="form-label">{{trans('about_us.image')}}</label>
                        <input type="file" class="form-control" name="image" id="image">
                        @error('image')
                        <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                        @enderror
                        @php

                            $imagePath = asset('images/' . $record['image']);
                        @endphp
                        @if(isset($record) && $imagePath)
                            <div class="mt-2">
                                <img src="{{ $imagePath }}" alt="Talab Image" class="img-thumbnail" width="150">
                            </div>
                        @endif
                    </div>





                    <div class="row col-md-12" style="margin: 10px">
                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('about_us.meta_title')}}(<span
                                    class="text-muted">{{trans('form.ar')}}</span>)</label>
                            <input type="text" class="form-control" name="meta_title_ar" id="meta_title_ar"
                                   value="{{old('meta_title_ar',$record['meta_title']['ar'])}}">
                            @error('meta_title_ar')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('about_us.meta_title')}}(<span
                                    class="text-muted">{{trans('form.en')}}</span>)</label>
                            <input type="text" class="form-control" name="meta_title_en" id="meta_title_en"
                                   value="{{old('meta_title_en',$record['meta_title']['en'])}}">
                            @error('meta_title_en')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="row col-md-12" style="margin: 10px">
                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('about_us.meta_keywords')}}(<span
                                    class="text-muted">{{trans('category.ar')}}</span>)</label>
                            <input type="text" class="form-control" name="meta_keywords_ar" id="meta_keywords_ar"
                                   value="{{old('meta_keywords_ar',$record['meta_keywords']['ar'])}}">
                            @error('meta_keywords_ar')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('about_us.meta_keywords')}}(<span
                                    class="text-muted">{{trans('form.en')}}</span>)</label>
                            <input type="text" class="form-control" name="meta_keywords_en" id="meta_keywords_en"
                                   value="{{old('meta_keywords_en',$record['meta_keywords']['en'])}}">
                            @error('meta_keywords_en')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="row col-md-12" style="margin: 10px">
                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('about_us.meta_description')}}(<span
                                    class="text-muted">{{trans('category.en')}}</span>)</label>
                            <textarea type="text" class="form-control" name="meta_description_ar"
                                      id="meta_description_ar">
                                {{old('meta_description_ar',$record['meta_description']['ar'])}}
                            </textarea>

                            @error('meta_description_ar')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('about_us.meta_description')}}(<span
                                    class="text-muted">{{trans('category.ar')}}</span>)</label>
                            <textarea type="text" class="form-control" name="meta_description_en"
                                      id="meta_description_en">
                                {{old('meta_description_en',$record['meta_description']['en'])}}
                            </textarea>
                            @error('meta_description_en')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>



                    </div>


                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">
                        {{ trans('testimonials.save') }}
                    </button>
                </div>
            </form>
        </div>

    </div>


@stop
@section('js')
    <script>
        function showSuccessMessage(message) {
            $('#success_message').text(message).removeClass('d-none').show();
            setTimeout(function () {
                $('#success_message').fadeOut().addClass('d-none');
            }, 8000);
        }
    </script>

    <script>
        $(document).ready(function () {
            $('#meta_description_ar').summernote({
                height: 50,
                minHeight: 100,
                maxHeight: 650,
                focus: true
            });

            $('#meta_description_en').summernote({
                height: 50,
                minHeight: 100,
                maxHeight:650,
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

            $('#our_vision_en').summernote({
                height: 50,
                minHeight: 100,
                maxHeight: 650,
                focus: true
            });

            $('#our_vision_ar').summernote({
                height: 50,
                minHeight: 100,
                maxHeight: 650,
                focus: true
            });

            $('#our_experience_en').summernote({
                height: 50,
                minHeight: 100,
                maxHeight: 650,
                focus: true
            });

            $('#our_experience_ar').summernote({
                height: 50,
                minHeight: 100,
                maxHeight: 650,
                focus: true
            });

            $('#our_mission_en').summernote({
                height: 50,
                minHeight: 100,
                maxHeight: 650,
                focus: true
            });

            $('#our_mission_ar').summernote({
                height: 50,
                minHeight: 100,
                maxHeight: 650,
                focus: true
            });
            $('#notes_en').summernote({
                height: 50,
                minHeight: 100,
                maxHeight: 650,
                focus: true
            });

            $('#notes_ar').summernote({
                height: 50,
                minHeight: 100,
                maxHeight: 650,
                focus: true
            });


        });
    </script>
    <script>
        var input1 = document.querySelector("#tags");
        new Tagify(input1);
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>


@endsection

