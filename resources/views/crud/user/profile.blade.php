@extends('layouts.crud')
@section('head')
    My Profile
@endsection
@section('content')

<div class="m-content">
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="m-portlet m-portlet--full-height  ">
                <div class="m-portlet__body">
                    <div class="m-card-profile">
                        <div class="m-card-profile__title m--hide">
                            Your Profile
                        </div>
                        <div class="m-card-profile__pic">
                            <div class="m-card-profile__pic-wrapper">
                                <img src="{{asset('assets/app/media/img/users/user4.jpg')}}" alt="" />
                            </div>
                        </div>
                        <div class="m-card-profile__details">
                            <span class="m-card-profile__name">{{Auth::user()->name}}</span>
                            <a href="" class="m-card-profile__email m-link">{{Auth::user()->email}}</a>
                        </div>
                    </div>

                    <div class="m-portlet__body-separator"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-8">
            <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                    <i class="flaticon-share m--hide"></i>
                                    Update Profile
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                                    Change Password
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="m_user_profile_tab_1">
                        <form class="m-form m-form--fit m-form--label-align-right" action="{{url('update-profile' , Auth::user()->id)}}" method="POST">
                            @csrf
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group row">
                                    <div class="col-10 ml-auto">
                                        <h3 class="m-form__section">1. Personal Details</h3>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Full Name</label>
                                    <div class="col-7">
                                        <input class="form-control m-input" type="text" name="name" value="{{$user->name}}">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">E-mail</label>
                                    <div class="col-7">
                                        <input class="form-control m-input" type="text" value="{{$user->email}}" readonly>
                                    </div>
                                </div>
                                <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>

                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <div class="row">
                                        <div class="col-2">
                                        </div>
                                        <div class="col-7">
                                            <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Save changes</button>&nbsp;&nbsp;
                                            {{-- <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">Cancel</button> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane " id="m_user_profile_tab_2">
                        <form class="m-form m-form--fit m-form--label-align-right" action="{{url('update-password' , Auth::user()->id)}}" method="POST">
                            @csrf
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group row">
                                    <div class="col-10 ml-auto">
                                        <h3 class="m-form__section">1. Change Password</h3>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Old Password</label>
                                    <div class="col-7">
                                        <input class="form-control m-input" type="password" name="old_password" id="old_pass" required >
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">New Password</label>
                                    <div class="col-7">
                                        <input class="form-control m-input" id="new_pass" type="password" required>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Confirm Password</label>
                                    <div class="col-7">
                                        <input class="form-control m-input" type="password" id="confirm_pass" name="new_pass" required>
                                    </div>
                                </div>
                                <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>

                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <div class="row">
                                        <div class="col-2">
                                        </div>
                                        <div class="col-7">
                                            <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Save changes</button>&nbsp;&nbsp;
                                            {{-- <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">Cancel</button> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        var password_baru = "";
        $('#new_pass').change(function(){
            password_baru = $(this).val();
        });
        $('#confirm_pass').change(function(){
            let ulangi_password = $(this).val();
            if(ulangi_password != password_baru  ){
                $('#confirm_pass').val("");
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": false,
                    "positionClass": "toast-top-full-width",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    };

                    toastr.error("Password yang anda masukkan tidak sama !  ");

            }
        })
        $('#old_pass').change( function(){
            let old_pass = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{url('/cek-password')}}" + "/" + {{Auth::user()->id}} + "/" + old_pass ,
                success:function(data) {
                   if(data != "true")
                   {
                       $('#old_pass').val("");
                        $('#new_pass').val("");
                        $('#confirm_pass').val("");
                       toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": true,
                        "progressBar": false,
                        "positionClass": "toast-top-full-width",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                        };

                        toastr.error("Password yang anda masukkan salah !  ");
                    }
                    else{

                        $('#new_pass').change(function(){
                            password_baru = $(this).val();
                        });
                        $('#confirm_pass').change(function(){
                            let ulangi_password = $(this).val();
                            if(ulangi_password != password_baru  ){
                                $('#confirm_pass').val("");
                                toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": true,
                                    "progressBar": false,
                                    "positionClass": "toast-top-full-width",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                    };

                                    toastr.error("Password yang anda masukkan tidak sama !  ");

                            }
                        })
                    }

                }
            });
        })
        @if (session('success'))
            toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-full-width",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
            };

            toastr.success(
                "{{session('success')}}"
            );
        @endif
    })

</script>


@endsection
