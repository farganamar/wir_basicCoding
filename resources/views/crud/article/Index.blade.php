@extends('layouts.crud')
@section('content')
<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    <button class="btn m-btn--pill    btn-success btn-sm" data-toggle="modal" data-target="#m_modal_4">Tambah Artikel</button>
                </h3>
            </div>
        </div>
    </div>
    <div class="m-portlet__body">
        <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($article as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->content}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td><button class="btn m-btn--pill btn-primary btn-sm" data-toggle="modal" data-target="#m_modal_edit_{{$item->id}}">Edit</button><a href="{{url('delete-artikel' , $item->id)}}"><button class="btn m-btn--pill    btn-danger btn-sm">Delete</button></a></td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Artikel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('/tambah-artikel')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Judul:</label>
                            <input type="text" class="form-control" id="recipient-name" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="form-control-label">Kategori:</label>
                            <select class="form-control" id="message-text" name="category" required>
                                @foreach ($kategori as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="form-control-label">Konten:</label>
                            <textarea class="form-control" id="message-text" name="content" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">Banner</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="banner" required>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary add-article">Add Article</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@foreach ($article as $item)

<div class="modal fade" id="m_modal_edit_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Artikel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/edit-artikel' , $item->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Judul:</label>
                        <input type="text" class="form-control" id="recipient-name" name="title" value="{{$item->title}}" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">Kategori:</label>
                        <select class="form-control" id="message-text" name="category" required>
                            @foreach ($kategori as $k)
                            @if ($k->id == $item->category_id)
                            <option value="{{$k->id}}" selected >{{$k->name}}</option>
                            @else
                            <option value="{{$k->id}}" >{{$k->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">Konten:</label>
                        <textarea class="form-control" id="message-text" name="content" required>{{$item->content}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Banner</label>
                            <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height-: 286px">
                                @if (File::exists(public_path($item->banner)))

                                <img src="{{asset($item->banner)}}" alt="" height="200" width="400">

                                @else
                                <img src="{{$item->banner}}" alt="">

                                @endif
                                <div class="m-widget19__shadow"></div>
                            </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="banner" value="public/{{$item->banner}}" required>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary add-article">Add Article</button>
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
        @if (session('error-slug'))
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
