@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <a href="{{route('movie.index')}}" class="btn btn-primary">Liệt kê phim</a>
                <div class="card-header">Quản lý phim</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(!isset($movie))
                        {!! Form::open(['route' => 'movie.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    @else
                        {!! Form::open(['route' => ['movie.update', $movie->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                    @endif

                        <div class="form-group mb-3">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', isset($movie) ? $movie->title : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu', 'id' => 'slug', 'onkeyup' => 'ChangeToSlug()']) !!}
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('sotap', 'Số tập phim') !!}
                            {!! Form::text('sotap', isset($movie) ? $movie->sotap : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu']) !!}
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('thoiluong', 'Thời lượng phim') !!}
                            {!! Form::text('thoiluong', isset($movie) ? $movie->thoiluong : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu']) !!}
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('tên tiếng anh', 'Tên tiếng anh') !!}
                            {!! Form::text('name_eng', isset($movie) ? $movie->name_eng : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu']) !!}
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('trailer', 'Trailer') !!}
                            {!! Form::text('trailer', isset($movie) ? $movie->trailer : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu']) !!}
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('slug', 'Slug') !!}
                            {!! Form::text('slug', isset($movie) ? $movie->slug : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu', 'id' => 'convert_slug']) !!}
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', isset($movie) ? $movie->description : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu', 'id' => 'description']) !!}
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('tags', 'Tags phim') !!}
                            {!! Form::textarea('tags', isset($movie) ? $movie->tags : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu']) !!}
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('status', 'Status') !!}
                            {!! Form::select('status', ['1' => 'Hiển thị', '0' => 'Không hiển thị'], isset($movie) ?$movie->status : '', ['id' => 'status', 'class' => 'form-control']) !!}
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('resolution', 'Định dạng') !!}
                            {!! Form::select('resolution', ['0' => 'HD', '1' => 'SD', '2' => 'HDCam', '3' => 'Cam', '4' => 'FullHD', '5' => 'Trailer'], isset($movie) ? $movie->resolution : '', ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('phude', 'Phụ đề') !!}
                            {!! Form::select('phude', ['0' => 'Phụ đề', '1' => 'Thuyết minh'], isset($movie) ? $movie->phude : '', ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('thuocphim', 'Thuộc phim') !!}
                            {!! Form::select('thuocphim', ['phimle' => 'Phim lẻ', 'phimbo' => 'Phim bộ'], isset($movie) ? $movie->thuocphim : '', ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('Category', 'Category') !!} <br>
                            {{-- {!! Form::select('category_id', $category, isset($movie) ? $movie->category_id : '', ['class' => 'form-control']) !!} --}}

                            @foreach($list_category as $key => $catego) 
                                @if(isset($movie))
                                    {!! Form::checkbox('category[]', $catego->id, isset($movie_category) && $movie_category->contains($catego->id) ? true : false) !!} 
                                @else
                                    {!! Form::checkbox('category[]', $catego->id, '') !!} 
                                @endif  
                                    {!! Form::label('category', $catego->title) !!}
                            @endforeach
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('Genre', 'Genre') !!} <br>
                            {{-- {!! Form::select('genre_id', $genre, isset($movie) ? $movie->genre_id : '', ['class' => 'form-control']) !!} --}}

                            @foreach($list_genre as $key => $gen) 
                                @if(isset($movie))
                                    {!! Form::checkbox('genre[]', $gen->id, isset($movie_genre) && $movie_genre->contains($gen->id) ? true : false) !!} 
                                @else
                                    {!! Form::checkbox('genre[]', $gen->id, '') !!} 
                                @endif  
                                    {!! Form::label('genre', $gen->title) !!}
                            @endforeach
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('Country', 'Country') !!}
                            {!! Form::select('country_id', $country, isset($movie) ? $movie->country_id : '', ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('Hot', 'Hot') !!}
                            {!! Form::select('phim_hot', ['1' => 'Có', '0' => 'Không'], isset($movie) ? $movie->phim_hot : '', ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('Image', 'Image') !!}
                            {!! Form::file('image', ['class' => 'form-control-file']) !!}
                            @if(isset($movie))
                                <div>
                                    <img width="10%" src="{{asset('uploads/movie/'.$movie->image)}}">
                                </div>
                            @endif
                        </div>

                    @if(!isset($movie))
                        {!! Form::submit('Thêm dữ liệu', ['class' => 'btn btn-success']) !!}
                    @else
                        {!! Form::submit('Cập nhật', ['class' => 'btn btn-success']) !!}
                    @endif

                    {!! Form::close() !!}
                </div>
            </div>

            
        </div>
    </div>
</div>
@endsection
