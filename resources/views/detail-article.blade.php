@extends('layouts.dashboard')
@section('content')

<!--Begin::Section-->
<div class="row">

    @foreach ($article as $item)

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
                        @if (File::exists(public_path($item->banner)))

                        <img src="{{asset($item->banner)}}" alt="">

                        @else
                        <img src="{{$item->banner}}" alt="">

                        @endif
                        <h3 class="m-widget19__title m--font-light">
                            {{$item->title}}
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
                                    {{$item->author->name}}
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
                            {{$item->content}}
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


