@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản lý thông tin website</div>

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

                    {!! Form::open(['route' => ['info.update', $info->id], 'method' => 'PUT', 'enctype'=>'multipart/form-data']) !!}

                        <div class="form-group mb-3">
                            {!! Form::label('title', 'Tiêu đề website') !!}
                            {!! Form::text('title', isset($info) ? $info->title : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu']) !!}
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('description', 'Mô tả website') !!}
                            {!! Form::textarea('description', isset($info) ? $info->description : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu', 'id' => 'description']) !!}
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('Logo', 'Hình ảnh logo') !!}
                            {!! Form::file('logo', ['class' => 'form-control-file']) !!}
                            @if(isset($info))
                                <div>
                                    <img width="10%" src="{{asset('uploads/logo/'.$info->logo)}}">
                                </div>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('copyright', 'Copyright') !!}
                            {!! Form::text('copyright', isset($info) ? $info->copyright : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu']) !!}
                        </div>

                        {!! Form::submit('Cập nhật thông tin website', ['class' => 'btn btn-success']) !!}

                    {!! Form::close() !!}
                </div>
            </div>

            {{-- <table class="table" id="tablephim">
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
                            {!! Form::open(['method' => 'DELETE', 'route' => ['info.destroy', $cate->id], 'onsubmit' => 'return confirm("Xóa hay không?")']) !!}
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            {!! Form::close() !!}

                            <a name="" id="" class="btn btn-warning" href="{{route('info.edit', $cate->id)}}">Sửa</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table> --}}
        </div>
    </div>
</div>
@endsection
