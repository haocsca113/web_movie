@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
             <table class="table" id="tablephim">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Active/Inactive</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody class="order_position">
                    @foreach($linkmovie as $key => $movielink)
                    <tr id="{{$movielink->id}}">
                        <td scope="row">{{$key}}</td>
                        <td>{{$movielink->title}}</td>
                        <td>{{$movielink->description}}</td>
                        <td>
                            @if($movielink->status)
                                Hiển thị
                            @else
                                Không hiển thị
                            @endif
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['linkmovie.destroy', $movielink->id], 'onsubmit' => 'return confirm("Xóa hay không?")']) !!}
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            {!! Form::close() !!}

                            <a name="" id="" class="btn btn-warning" href="{{route('linkmovie.edit', $movielink->id)}}">Sửa</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>


@endsection