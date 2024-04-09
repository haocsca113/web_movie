@extends('layouts.app')

@section('content')
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