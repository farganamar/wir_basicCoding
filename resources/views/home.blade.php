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
Home
@endsection
@section('date')
    <span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
        <span class="m-subheader__daterange-label">
            <span class="m-subheader__daterange-title"></span>
            <span class="m-subheader__daterange-date m--font-brand"></span>
        </span>
        <a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
            <i class="la la-angle-down"></i>
        </a>
    </span>
@endsection
@section('content')

<!--Begin::Section-->
<div class="row">

    @foreach ($produk as $item)
    <div class="col-xl-4">

        <!--begin:: Widgets/Blog-->
        <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height  m-portlet--rounded-force">
            <div class="m-portlet__head m-portlet__head--fit">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-action">
                        <button type="button" class="btn btn-sm m-btn--pill  btn-brand">{{$item->kategori->name}}</button>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="m-widget19">
                    <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height-: 286px">
                        @if (File::exists(public_path($item->image)))

                        <img src="{{asset($item->image)}}" alt="">

                        @else
                        <img src="{{$item->image}}" alt="">

                        @endif
                        <h3 class="m-widget19__title m--font-light">
                            {{$item->name}}
                        </h3>
                        <div class="m-widget19__shadow"></div>
                    </div>
                    <div class="m-widget19__content">
                        <div class="m-widget19__header">
                            <div class="m-widget19__user-img">
                                @if ($item->author->jabatan == "admin")
                                <img class="m-widget19__img" src="assets/app/media/img//users/user4.jpg" alt="">

                                @else
                                <img class="m-widget19__img" src="assets/app/media/img//users/user5.jpg" alt="">
                                @endif
                            </div>
                            <div class="m-widget19__info">
                                <span class="m-widget19__username">
                                    {{$item->user->name}}
                                </span><br>
                                {{-- <span class="m-widget19__time">
                                    UX/UI Designer, Google
                                </span> --}}
                            </div>
                            <div class="m-widget19__stats">
                                {{-- <span class="m-widget19__number m--font-brand">
                                    18
                                </span>
                                <span class="m-widget19__comment">
                                    Comments
                                </span> --}}
                            </div>
                        </div>
                        <div class="m-widget19__body">
                            {{str_limit($item->deskripsi, $limit = 150)}}
                        </div>
                    </div>
                    <div class="m-widget19__action">
                        <a href="{{url('news' , $item->slug)}}"><button type="button" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom">Read More</button></a>
                    </div>
                </div>
            </div>
        </div>

        <!--end:: Widgets/Blog-->
    </div>

    @endforeach

</div>
<div class="row">
    <div class="col-xl-12">

        {{$produk->links()}}

    </div>

</div>

<!--End::Section-->


@endsection


