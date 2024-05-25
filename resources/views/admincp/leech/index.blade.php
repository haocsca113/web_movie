@extends('layouts.app')

@section('content')

<!-- Modal -->
<div class="modal fade" id="chitietphim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span id="content-title"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span id="content-detail"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

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
                <!-- Button trigger modal -->
                <button type="button" data-movie_slug="{{$res['slug']}}" class="btn btn-primary btn-sm leech_details" data-toggle="modal" data-target="#chitietphim">
                    Chi tiết phim
                </button>

                {{-- <a href="{{route('leech-detail', $res['slug'])}}" class="btn btn-primary btn-sm">Chi tiết phim</a> --}}
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