@extends('layouts.app')

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#category">
  Thêm nhanh
</button>

<!-- Modal -->
<div class="modal fade" id="category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    {!! Form::open(['route' => 'category.store', 'method' => 'POST']) !!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục phim</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">Quản lý danh mục</div>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <div class="form-group mb-3">
                                {!! Form::label('title', 'Title') !!}
                                {!! Form::text('title', isset($category) ? $category->title : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu', 'id' => 'slug', 'onkeyup' => 'ChangeToSlug()']) !!}
                            </div>
                            <div class="form-group mb-3">
                                {!! Form::label('slug', 'Slug') !!}
                                {!! Form::text('slug', isset($category) ? $category->slug : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu', 'id' => 'convert_slug']) !!}
                            </div>

                            <div class="form-group mb-3">
                                {!! Form::label('description', 'Description') !!}
                                {!! Form::textarea('description', isset($category) ? $category->description : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu', 'id' => 'description']) !!}
                            </div>

                            <div class="form-group mb-3">
                                {!! Form::label('status', 'Status') !!}
                                {!! Form::select('status', ['1' => 'Hiển thị', '0' => 'Không hiển thị'], isset($category) ?$category->status : '', ['id' => 'status', 'class' => 'form-control']) !!}
                            </div> 

                        {{-- @if(!isset($category))
                            {!! Form::submit('Thêm dữ liệu', ['class' => 'btn btn-success']) !!}
                        @else
                            {!! Form::submit('Cập nhật', ['class' => 'btn btn-success']) !!}
                        @endif --}}

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Thêm</button> --}}
                {!! Form::submit('Thêm Danh Mục', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    {!! Form::close() !!}
  </div>
</div>

<table class="table" id="tablephim">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Description</th>
            <th>Slug</th>
            <th>Active/Inactive</th>
            <th>Manage</th>
        </tr>
    </thead>
    <tbody class="order_position">
        @foreach($list as $key => $cate)
        <tr id="{{$cate->id}}">
            <td scope="row">{{$key}}</td>
            <td>{{$cate->title}}</td>
            <td>{{$cate->description}}</td>
            <td>{{$cate->slug}}</td>
            <td>
                @if($cate->status)
                    Hiển thị
                @else
                    Không hiển thị
                @endif
            </td>
            <td>
                {!! Form::open(['method' => 'DELETE', 'route' => ['category.destroy', $cate->id], 'onsubmit' => 'return confirm("Xóa hay không?")']) !!}
                    <button type="submit" class="btn btn-danger">Xóa</button>
                {!! Form::close() !!}

                <a name="" id="" class="btn btn-warning" href="{{route('category.edit', $cate->id)}}">Sửa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection