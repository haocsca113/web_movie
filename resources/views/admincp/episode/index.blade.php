@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-responsive" id="tablephim">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên phim</th>
                        <th>Hình ảnh</th>
                        <th>Tập phim</th>
                        <th>Link phim</th>
                        {{-- <th>Active/Inactive</th> --}}
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody class="order_position">
                    @foreach($list_episode as $key => $episode)
                        <tr id="{{$episode->id}}">
                            <td scope="row">{{$key}}</td>
                            <td>{{$episode->movie->title}}</td>
                            <td><img width="100px" src="{{asset('uploads/movie/'.$episode->movie->image)}}"></td>
                            <td>{{$episode->episode}}</td>
                            <td>{{$episode->linkphim}}</td>

                            {{-- <td>
                                @if($cate->status)
                                    Hiển thị
                                @else
                                    Không hiển thị
                                @endif
                            </td> --}}

                            <td>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['episode.destroy', $episode->id], 'onsubmit' => 'return confirm("Xóa hay không?")']) !!}
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                {!! Form::close() !!}

                                <a name="" id="" class="btn btn-warning" href="{{route('episode.edit', $episode->id)}}">Sửa</a> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
