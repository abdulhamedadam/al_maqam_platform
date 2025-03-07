@extends('admin.layouts.master')
@section('css')

@endsection
@section('toolbar')
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        @php
            $title = trans('sliders.sliders');
         $breadcrumbs = [
                  ['label' => trans('Toolbar.home'), 'link' =>''],
                  ['label' => trans('Toolbar.sliders'), 'link' => ''],
                  ['label' => trans('Toolbar.add_slider'), 'link' => ''],
                  ];

          PageTitle($title, $breadcrumbs);
        @endphp


        <div class="d-flex align-items-center gap-2 gap-lg-3">

            {{ BackButton(route('admin.sliders.index'))}}

        </div>
    </div>

@endsection
@section('content')

    <div id="kt_app_content_container" class="t_container">

        <div class="card shadow-sm" style="border-top: 3px solid #007bff;">

            <div class="card-header">
                <h3 class="card-title">{{trans('sliders.add_slider')}}</h3>
                <div class="card-toolbar">

                    <div class="text-center">

                    </div>
                </div>
            </div>


            <form action="{{ route('admin.sliders.store') }}" method="post" enctype="multipart/form-data"
                  id="store_form">
                @csrf
                <div class="card-body">
                    <div class="row col-md-12" style="margin: 10px">

                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('sliders.title')}}(<span
                                    class="text-muted">{{trans('form.ar')}}</span>)</label>
                            <input type="text" class="form-control" name="title_ar" id="title_ar"
                                   value="{{old('title_ar')}}">
                            @error('title_ar')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('sliders.title')}}(<span
                                    class="text-muted">{{trans('form.en')}}</span>)</label>
                            <input type="text" class="form-control" name="title_en" id="title_en"
                                   value="{{old('title_en')}}">
                            @error('title_en')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="row col-md-12" style="margin: 10px">

                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('sliders.button_text')}}(<span
                                    class="text-muted">{{trans('form.ar')}}</span>)</label>
                            <input type="text" class="form-control" name="button_text_ar" id="button_text_ar"
                                   value="{{old('button_text_ar')}}">
                            @error('button_text_ar')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('sliders.button_text')}}(<span
                                    class="text-muted">{{trans('form.en')}}</span>)</label>
                            <input type="text" class="form-control" name="button_text_en" id="button_text_en"
                                   value="{{old('button_text_en')}}">
                            @error('button_text_en')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="row col-md-12" style="margin: 10px">
                        <label for="name" class="form-label">{{trans('sliders.image')}}</label>
                        <input type="file" class="form-control" name="image" id="image">
                        @error('image')
                        <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="row col-md-12" style="margin: 10px">

                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('sliders.content')}}(<span
                                    class="text-muted">{{trans('form.ar')}}</span>)</label>
                            <textarea type="text" class="form-control" name="description_ar" id="description_ar">
                                {{old('description_ar')}}
                            </textarea>
                            @error('description_ar')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>




                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('sliders.content')}}(<span
                                    class="text-muted">{{trans('form.en')}}</span>)</label>
                            <textarea type="text" class="form-control" name="description_en" id="description_en">
                                {{old('description_en')}}
                            </textarea>
                            @error('description_en')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="row col-md-12" style="margin: 10px">
                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('sliders.meta_title')}}(<span
                                    class="text-muted">{{trans('form.ar')}}</span>)</label>
                            <input type="text" class="form-control" name="meta_title_ar" id="meta_title_ar"
                                   value="{{old('meta_title_ar')}}">
                            @error('meta_title_ar')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('sliders.meta_title')}}(<span
                                    class="text-muted">{{trans('form.en')}}</span>)</label>
                            <input type="text" class="form-control" name="meta_title_en" id="meta_title_en"
                                   value="{{old('meta_title_en')}}">
                            @error('meta_title_en')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="row col-md-12" style="margin: 10px">
                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('sliders.meta_keywords')}}(<span
                                    class="text-muted">{{trans('category.ar')}}</span>)</label>
                            <input type="text" class="form-control" name="meta_keywords_ar" id="meta_keywords_ar"
                                   value="{{old('meta_keywords_ar')}}">
                            @error('meta_keywords_ar')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('sliders.meta_keywords')}}(<span
                                    class="text-muted">{{trans('form.en')}}</span>)</label>
                            <input type="text" class="form-control" name="meta_keywords_en" id="meta_keywords_en"
                                   value="{{old('meta_keywords_en')}}">
                            @error('meta_keywords_en')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="row col-md-12" style="margin: 10px">

                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('sliders.meta_description')}}(<span
                                    class="text-muted">{{trans('category.ar')}}</span>)</label>
                            <textarea type="text" class="form-control" name="meta_description_en"
                                      id="meta_description_en">
                                {{old('meta_description_en')}}
                            </textarea>
                            @error('meta_description_en')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <label for="name" class="form-label">{{trans('sliders.meta_description')}}(<span
                                    class="text-muted">{{trans('category.en')}}</span>)</label>
                            <textarea type="text" class="form-control" name="meta_description_ar"
                                      id="meta_description_ar">
                                {{old('meta_description_ar')}}
                            </textarea>

                            @error('meta_description_ar')
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


        });
    </script>
    <script>
        var input1 = document.querySelector("#tags");
        new Tagify(input1);
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>


@endsection

