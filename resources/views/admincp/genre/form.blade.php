@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản lý thể loại</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(!isset($genre))
                        {!! Form::open(['route' => 'genre.store', 'method' => 'POST']) !!}
                    @else
                        {!! Form::open(['route' => ['genre.update', $genre->id], 'method' => 'PUT']) !!}
                    @endif

                        <div class="form-group mb-3">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', isset($genre) ? $genre->title : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu', 'id' => 'slug', 'onkeyup' => 'ChangeToSlug()']) !!}
                        </div>
                        <div class="form-group mb-3">
                            {!! Form::label('slug', 'Slug') !!}
                            {!! Form::text('slug', isset($genre) ? $genre->slug : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu', 'id' => 'convert_slug']) !!}
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', isset($genre) ? $genre->description : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu', 'id' => 'description']) !!}
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('status', 'Status') !!}
                            {!! Form::select('status', ['1' => 'Hiển thị', '0' => 'Không hiển thị'], isset($genre) ?$genre->status : '', ['id' => 'status', 'class' => 'form-control']) !!}
                        </div>

                    @if(!isset($genre))
                        {!! Form::submit('Thêm dữ liệu', ['class' => 'btn btn-success']) !!}
                    @else
                        {!! Form::submit('Cập nhật', ['class' => 'btn btn-success']) !!}
                    @endif

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
                <tbody>
                    @foreach($list as $key => $cate)
                    <tr>
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
                            {!! Form::open(['method' => 'DELETE', 'route' => ['genre.destroy', $cate->id], 'onsubmit' => 'return confirm("Xóa hay không?")']) !!}
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            {!! Form::close() !!}

                            <a name="" id="" class="btn btn-warning" href="{{route('genre.edit', $cate->id)}}">Sửa</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
