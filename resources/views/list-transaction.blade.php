@extends('layouts.dashboard')

@section('menu')
    <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="m-menu__link m-menu__toggle" title="Non functional dummy link"><span class="m-menu__item-here"></span><span
                class="m-menu__link-text">Category</span><i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>
        <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left"><span class="m-menu__arrow m-menu__arrow--adjust"></span>
            <ul class="m-menu__subnav">
                @foreach ($category as $item)
                    <li class="m-menu__item " aria-haspopup="true"><a href="{{url('category', $item->slug)}}" class="m-menu__link "><span class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span class="m-menu__link-text">{{$item->name}}</span> <span class="m-menu__link-badge"></span> </span></span></a></li>
                @endforeach
            </ul>
        </div>
    </li>
@endsection
@section('header-title')
List Of Transaction
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
                                    List Transaction
                                </a>
                            </li>

                        </ul>
                    </div>

                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="m_user_profile_tab_1">
                            <div class="m-portlet__body">
                                <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Produk</th>
                                            <th>Price</th>
                                            <th>Kategori</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->product->name}}</td>
                                            <td>{{$item->product->price}}</td>
                                            <td>{{$item->product->kategori->name}}</td>
                                            <td>{{$item->qty}}</td>
                                            <td>{{$item->qty * $item->product->price}}</td>
                                            <td>{{$item->created_at}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
