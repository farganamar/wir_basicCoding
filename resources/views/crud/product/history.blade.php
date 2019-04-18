@extends('layouts.crud')
@section('content')
<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    <button class="btn m-btn--pill    btn-success btn-sm" data-toggle="modal" data-target="#m_modal_4">Tambah Product</button>
                </h3>
            </div>
        </div>
    </div>
    <div class="m-portlet__body">
        <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Product</th>
                    <th>Kategori</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Tgl</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($history as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->user->name}}</td>
                    <td>{{$item->user->email}}</td>
                    <td>{{$item->product->name}}</td>
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


@endsection
