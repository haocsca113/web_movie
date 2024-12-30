@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản lý tập phim</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(!isset($episode))
                        {!! Form::open(['route' => 'episode.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    @else
                        {!! Form::open(['route' => ['episode.update', $episode->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                    @endif

                        <div class="form-group mb-3">
                            {!! Form::label('movie_title', 'Phim', []) !!}
                            {!! Form::text('movie_title', isset($movie) ? $movie->title : '', ['class' => 'form-control', 'readonly']) !!}
                            {!! Form::hidden('movie_id', isset($movie) ? $movie->id : '', []) !!}
                        </div>
                        
                        <div class="form-group mb-3">
                            {!! Form::label('linkphim', 'Link Phim', []) !!}
                            {!! Form::text('linkphim', isset($episode) ? $episode->linkphim : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu']) !!}
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('linkvideotructiep', 'Link Video Trực Tiếp', []) !!}
                            {!! Form::text('linkvideotructiep', isset($episode) ? $episode->linkvideotructiep : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu']) !!}
                        </div>


                        @if(isset($episode))
                            <div class="form-group mb-3">
                                {!! Form::label('episode', 'Tập Phim', []) !!}
                                {!! Form::text('episode', isset($episode) ? $episode->episode : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu', isset($episode) ? 'readonly' : '']) !!}
                            </div>
                        @else
                            <div class="form-group mb-3">
                                {!! Form::label('episode', 'Tập Phim', []) !!}
                                {!! Form::selectRange('episode', 1, $movie->sotap, $movie->sotap, ['class' => 'form-control']) !!}
                            </div>
                        @endif

                        <div class="form-group mb-3">
                            {!! Form::label('linkserver', 'Link Server', []) !!}
                            {!! Form::select('linkserver', $linkmovie, '', ['class' => 'form-control']) !!}
                        </div>


                        @if(!isset($episode))
                            {!! Form::submit('Thêm tập phim', ['class' => 'btn btn-success']) !!}
                        @else
                            {!! Form::submit('Cập nhật tập phim', ['class' => 'btn btn-success']) !!}
                        @endif

                    {!! Form::close() !!}
                </div>
            </div> 
        </div>
 
        {{-- Liet ke phim --}}
        <div class="col-md-12">
            <table class="table table-responsive" id="tablephim">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên phim</th>
                        <th>Hình ảnh</th>
                        <th>Tập phim</th>
                        <th>Link phim</th>
                        <th>Link video trực tiếp M3U8</th>
                        <th>Server</th>
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
                            <td>{{$episode->linkvideotructiep}}</td>

                            <td>
                                @foreach($list_server as $key => $server_link)
                                    @if($episode->server == $server_link->id)
                                        {{$server_link->title}}
                                    @endif
                                @endforeach
                            </td>

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
