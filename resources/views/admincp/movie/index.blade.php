@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{route('movie.create')}}" class="btn btn-primary">Thêm phim</a>
            <table class="table" id="tablephim">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Tập phim</th>
                        <th>Số tập</th>
                        <th>Tags phim</th>
                        <th>Thời lượng phim</th>
                        <th>Image</th>
                        <th>Hot</th>
                        <th>Định dạng</th>
                        <th>Phụ đề</th>
                        {{-- <th>Description</th> --}}
                        <th>Slug</th>
                        <th>Active/Inactive</th>
                        <th>Category</th>
                        <th>Thuộc phim</th>
                        <th>Genre</th>
                        <th>Country</th>
                        <th>Ngày tạo</th>
                        <th>Ngày cập nhật</th>
                        <th>Năm phim</th>
                        <th>Season</th>
                        <th>Top views</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $key => $cate)
                    <tr>
                        <td scope="row">{{$key}}</td>
                        <td>{{$cate->title}}</td>
                        <td><a href="{{route('add-episode', [$cate->id])}}" class="btn btn-danger btn-sm">Thêm tập phim</a></td>
                        <td>
                            {{$cate->episode_count}}/{{$cate->sotap}} tập
                        </td>

                        <td>
                            {{-- {{$cate->tags}} --}}
                            @if($cate->tags != NULL){
                                {{substr($cate->tags, 0, 50)}}...
                            }
                            @else{
                                Chưa có từ khóa cho phim
                            }
                            @endif
                        </td>
                        <td>{{$cate->thoiluong}}</td>
                        <td><img width="100px" src="{{asset('uploads/movie/'.$cate->image)}}"></td>
                        <td>
                            @if($cate->phim_hot == 0)
                                Không
                            @else
                                Có
                            @endif
                        </td>
                        <td>
                            @if($cate->resolution == 0)
                                HD
                            @elseif($cate->resolution == 1)
                                SD
                            @elseif($cate->resolution == 2)
                                HDCam
                            @elseif($cate->resolution == 3)
                                Cam
                            @elseif($cate->resolution == 4)
                                FullHD
                            @else
                                Trailer
                            @endif
                        </td>
                        <td>
                            @if($cate->phude == 0)
                                Phụ đề
                            @else
                                Thuyết minh
                            @endif
                        </td>

                        {{-- <td>{{$cate->description}}</td> --}}
                        
                        <td>{{$cate->slug}}</td>
                        <td>
                            @if($cate->status)
                                Hiển thị
                            @else
                                Không hiển thị
                            @endif
                        </td>
                        <td>{{$cate->category->title}}</td>

                        <td>
                            @if($cate->thuocphim == 'phimle')
                                Phim lẻ
                            @else
                                Phim bộ
                            @endif
                        </td>

                        <td>
                            @foreach($cate->movie_genre as $gen)
                                {{$gen->title}}
                            @endforeach
                        </td>
                        <td>{{$cate->country->title}}</td>

                        <td>{{$cate->ngaytao}}</td>
                        <td>{{$cate->ngaycapnhat}}</td>
                        <td>
                            {!! Form::selectYear('year', 2000, 2024, isset($cate->year) ? $cate->year : '', ['class' => 'select-year', 'id' => $cate->id]) !!}
                        </td>

                        <td>
                            <form method="POST">
                                @csrf
                                {!! Form::selectRange('season', 0, 20, isset($cate->season) ? $cate->season : '', ['class' => 'select-season', 'id' => $cate->id]) !!}
                            </form>
                        </td>

                        <td>
                            {!! Form::select('topview', ['0' => 'Ngày', '1' => 'Tuần', '2' => 'Tháng'], isset($cate->topview) ? $cate->topview : '', ['class' => 'select-topview', 'id' => $cate->id]) !!}
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['movie.destroy', $cate->id], 'onsubmit' => 'return confirm("Xóa hay không?")']) !!}
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            {!! Form::close() !!}

                            <a name="" id="" class="btn btn-warning" href="{{route('movie.edit', $cate->id)}}">Sửa</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
