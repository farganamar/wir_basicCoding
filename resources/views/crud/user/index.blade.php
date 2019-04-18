@extends('layouts.crud')
@section('content')
<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    <button class="btn m-btn--pill    btn-success btn-sm" data-toggle="modal" data-target="#m_modal_4">Tambah User</button>
                </h3>
            </div>
        </div>
    </div>
    <div class="m-portlet__body">
        <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Jabatan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->jabatan}}</td>
                    <td>
                        <button class="btn m-btn--pill btn-primary btn-sm" data-toggle="modal" data-target="#m_modal_edit_{{$item->id}}">Edit</button>
                        <a href="{{url('delete-user' , $item->id)}}"><button class="btn m-btn--pill    btn-danger btn-sm">Delete</button></a>
                        @if ($item->jabatan == "admin")
                            <a href="{{url('ubah-jabatan' , $item->id)}}"><button class="btn m-btn--pill    btn-info btn-sm">Jadikan Author</button></a>
                        @else
                            <a href="{{url('ubah-jabatan' , $item->id)}}"><button class="btn m-btn--pill    btn-warning btn-sm">Jadikan Admin</button></a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


    <div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('/tambah-user')}}"  method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Nama :</label>
                            <input type="text" class="form-control" id="recipient-name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Email :</label>
                            <input type="email" class="form-control" id="recipient-name" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="form-control-label">Jabatan:</label>
                            <select class="form-control" id="message-text" name="jabatan" required>
                                <option value="admin">Admin</option>
                                <option value="author">Author</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary add-article">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@foreach ($user as $item)

<div class="modal fade" id="m_modal_edit_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/edit-user' , $item->id)}}"  method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Nama :</label>
                            <input type="text" class="form-control" id="recipient-name" name="name" value="{{$item->name}}" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Email :</label>
                            <input type="email" class="form-control" id="recipient-name" name="email" value="{{$item->email}}" required>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="form-control-label">Jabatan:</label>
                            <select class="form-control" id="message-text" name="jabatan" required>
                                @if($item->jabatan == "admin")
                                    <option value="admin" selected>Admin</option>
                                    <option value="author" >Author</option>
                                @else
                                    <option value="author" selected>Author</option>
                                    <option value="admin" >Admin</option>
                                @endif
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary add-article">Edit user</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
        $(document).ready(function(){
            $('.add-article').submit();
        @if(count($errors) > 0)
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

            toastr.error(
                "@foreach ($errors->all() as $item){{$item}}@endforeach"
            );
        @endif
        @if (session('error-email'))
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

            toastr.error(
                "{{session('error-slug')}}"
            );
        @endif
        });

    </script>
@endsection
