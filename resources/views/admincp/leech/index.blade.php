@extends('layouts.app')

@section('content')

<table class="table" id="tablephim">
    <thead>
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>Tên phim</th>
            <th>Slug</th>
            <th>Tên chính thức</th>
            <th>Hình ảnh thumnail</th>
            <th>Hình ảnh poster</th>
            <th>Year</th>
            <th>Quản lý</th>
        </tr>
    </thead>
    <tbody class="order_position">
        @foreach($resp['items'] as $key => $res)
        <tr>
            <td scope="row">{{$key}}</td>
            <td>{{$res['_id']}}</td>
            <td>{{$res['name']}}</td>
            <td>{{$res['slug']}}</td>
            <td>{{$res['origin_name']}}</td>
            <td><img src="{{$resp['pathImage'].$res['thumb_url']}}" width="80px" height="80px"></td>
            <td><img src="{{$resp['pathImage'].$res['poster_url']}}" width="80px" height="80px"></td>
            <td>{{$res['year']}}</td>
            <td>
                <a href="{{route('leech-detail', $res['slug'])}}" class="btn btn-primary btn-sm">Chi tiết phim</a>
                <a href="{{route('leech-episode', $res['slug'])}}" class="btn btn-info btn-sm">Tập phim</a>
                @php
                    $movie = \App\Models\Movie::where('slug', $res['slug'])->first();
                @endphp 
                @if(!$movie)
                    <form method="POST" action="{{route('leech-store', $res['slug'])}}">
                        @csrf
                        <input type="submit" class="btn btn-success btn-sm" value="Thêm phim">
                    </form>
                @else
                    <form method="POST" action="{{route('movie.destroy', $movie->id)}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger btn-sm" value="Xóa phim">
                    </form>
                @endif    
            </td>
            
        </tr>
        @endforeach
    </tbody>
</table>
@endsection