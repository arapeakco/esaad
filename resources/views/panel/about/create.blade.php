@extends('panel.layout.master' , ['title' => 'عن الحملة'])

@section('content_head')
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">عن الحملة</h3>
            </div>
        </div>
    </div>

@endsection
@section('content')

    @php
        $item = isset($item) ? $item: null;
    @endphp

    {!! Form::open(['method'=> 'POST', 'url'=> url()->current() ,'to'=>url()->current() ,  'class'=>'form-horizontal','id'=>'form']) !!}

    @csrf
    <div class="row">

        <div class="col-md-8">
            <div class="kt-portlet">

                <div class="kt-portlet__body">


                    <div class="form-group">
                        <label>وصف قصير</label>
                        <textarea class="form-control"
                                  name="short_description" required
                                  placeholder="وصف قصير">{{ isset($item) ? $item->short_description : "" }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>رابط اليوتيوب</label>
                        <input class="form-control" type="url"
                               name="url" required placeholder="رابط اليوتيوب"
                               value="{{ isset($item) ? 'https://www.youtube.com/embed/' . $item->data['video'] : "" }}">
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label" style="width: 100%;">
                        <button type="submit" style="width: 100%;" id="m_login_signin_submit" class="btn btn-brand">
                            حفظ
                        </button>
                    </div>
                </div>
            </div>
            <div class="kt-portlet">
                <div class="kt-portlet__body ">


                    <div class="form-group">
                        <label>الصورة</label>
                        <div></div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="imgload" name="image" {{ isset($item) && @$item->data['image'] ? "" : "required"  }} >
                            <label class="custom-file-label" for="imgload" id="imgload">Choose file</label>
                        </div>
                    </div>

                    <div class="img-responsive">
                        <div class="imageEditProfile">
                            <img src="{{ url('image/' . (isset($item) ? @$item->data['image'] : "")  ) }}" alt="" id="imgshow" style="max-width: 100%">
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
    {!! Form::close() !!}

@endsection


@push('js')
    <script src="{{ asset('panelAssets/js/post.js') }}"></script>
    <script>
        $("#imgload").change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imgshow').attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
@endpush
