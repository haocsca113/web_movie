@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <a href="{{route('episode.index')}}" class="btn btn-primary">Liệt kê danh sách tập phim</a>
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
                            {!! Form::label('movie', 'Chọn Phim', []) !!}
                            {!! Form::select('movie_id', ['0' => 'Chọn phim', 'Phim mới nhất' => $list_movie], isset($episode) ? $episode->movie_id : '', ['class' => 'form-control select-movie']) !!}
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('linkphim', 'Link Phim', []) !!}
                            {!! Form::text('linkphim', isset($episode) ? $episode->linkphim : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu']) !!}
                        </div>


                        @if(isset($episode))
                            <div class="form-group mb-3">
                                {!! Form::label('episode', 'Tập Phim', []) !!}
                                {!! Form::text('episode', isset($episode) ? $episode->episode : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu', isset($episode) ? 'readonly' : '']) !!}
                            </div>
                        @else
                            <div class="form-group mb-3">
                                {!! Form::label('episode', 'Tập Phim', []) !!}
                                <select name="episode" class="form-control" id="episode">
                                    
                                </select>
                            </div>
                        @endif

                        <div class="form-group mb-3">
                            {!! Form::label('linkserver', 'Link Server', []) !!}
                            {!! Form::select('linkserver', $linkmovie, $episode->server, ['class' => 'form-control']) !!}
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
    </div>
</div>
@endsection
