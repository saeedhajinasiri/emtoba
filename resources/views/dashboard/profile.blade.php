@extends('site.main')

@section('content')
    <div class="container">

        <div class="reserveBox" id="info2">
            <section class="reserveBoxSection rprofileForm">
                <h2 class="reserveBoxSectionTitle">ویرایش اطلاعات </h2>
                {!! form_start($form) !!}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">نام</label>
                            {!! form_widget($form->name) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">ایمیل</label>
                            {!! form_widget($form->email) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="username">نام کاربری</label>
                            {!! form_widget($form->username) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="password">رمز عبور</label>
                            {!! form_widget($form->password) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="password_confirmation">تکرار رمز عبور</label>
                            {!! form_widget($form->password_confirmation) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="mobile">موبایل</label>
                            {!! form_widget($form->mobile) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">شهر سکونت</label>
                            {!! form_widget($form->location_id) !!}
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="ذخیره">
                        </div>
                    </div>
                </div>
                {!! form_end($form, false) !!}
            </section>
        </div>
    </div>
@stop

@section('stylesheets')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
        $('#location_id').select2();
    </script>
@stop