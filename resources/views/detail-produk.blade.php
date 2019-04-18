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
                            <a href="{{url('list-product', $item->id)}}">
                            <div class="m-widget19__user-img">
                                <img class="m-widget19__img" src="{{asset('assets/app/media/img//users/user4.jpg')}}" alt="">
                            </div>
                            <div class="m-widget19__info">
                                    <span class="m-widget19__username">
                                        {{$item->user->name}}
                                    </span>
                                </a><br>
                                <span class="m-widget19__time">
                                    Rp {{$item->price}}
                                </span>
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
                        <div class="m-widget19__action">
                            @guest
                                <p class="m--font-danger">Login untuk membeli</p>
                            @endguest
                            @auth
                                <button type="button" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom" data-toggle="modal" data-target="#m_modal_cart">Beli</button>
                            @endauth
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!--end:: Widgets/Blog-->

        <div class="modal fade" id="m_modal_cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ url('/beli-barang', $item->id) }}">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">{{$item->name}}</label>
                                <label for="recipient-name" class="form-control-label" id="price">Rp {{$item->price}}</label>
                            </div>
                            <div class="form-group">
                                    <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height-: 286px">
                                        @if (File::exists(public_path($item->image)))

                                        <img src="{{asset($item->image)}}" alt="" height="200" width="400">

                                        @else
                                        <img src="{{$item->image}}" alt="">

                                        @endif
                                        <div class="m-widget19__shadow"></div>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="form-control-label">qty:</label>
                                <select class="form-control" id="qty" name="qty" required>
                                    @for ($i = 1; $i <= $item->qty ; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="form-control-label">Total : <span class="m--font-danger">Rp <span id="total"></span> </span></label>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" id="btn-register">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach


</div>

<!--End::Section-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#qty').change(function(){
            let qty = $(this).val();
            let harga = {{$produk[0]->price}};
            $('#total').text("");
            $('#total').text(qty * harga);
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


