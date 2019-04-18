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
@section('content')

<!--Begin::Section-->
<div class="row">

    @foreach ($produk as $item)

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
                                <img class="m-widget19__img" src="{{asset('assets/app/media/img//users/user4.jpg')}}" alt="">
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
                            {{$item->deskripsi}}
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!--end:: Widgets/Blog-->

    @endforeach


</div>

<!--End::Section-->


@endsection


