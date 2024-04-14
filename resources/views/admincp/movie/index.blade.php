@extends('layouts.app')

@section('content')

<div class="modal" id="videoModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><span id="video_title"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="video_desc"></p>
        <p id="video_link"></p>
      </div>
      <div class="modal-footer">
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{route('movie.create')}}" class="btn btn-primary">Thêm phim</a>
            <table class="row-border hover table" id="tablephim">
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
                        <th>Genre</th>
                        <th>Country</th>
                        <th>Thuộc phim</th>

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

                        <td>
                            <a href="{{route('add-episode', [$cate->id])}}" class="btn btn-danger btn-sm">Thêm tập phim</a>
                            @foreach($cate->episode as $key => $epi)
                                <a class="show_video" data-movie_video_id={{$epi->movie_id}} data-video_episode={{$epi->episode}} style="color: #fff; cursor:pointer;">
                                    <span class="badge text-bg-dark">{{$epi->episode}}</span>
                                </a>
                            @endforeach
                        </td>


                        <td>
                            {{$cate->episode_count}}/{{$cate->sotap}} tập
                        </td>

                        <td>
                            @if($cate->tags != NULL){
                                {{substr($cate->tags, 0, 50)}}...
                            }
                            @else{
                                Chưa có từ khóa cho phim
                            }
                            @endif
                        </td>
                        <td>{{$cate->thoiluong}}</td>

                        <td>
                            <img width="100px" src="{{asset('uploads/movie/'.$cate->image)}}">

                            <input type="file" data-movie_id="{{$cate->id}}" id="file-{{$cate->id}}" name="image_choose" class="form-control-file file_image" accept="image/*">

                            <span id="success_image"></span>
                        </td>

                        <td>
                            {{-- @if($cate->phim_hot == 0)
                                Không
                            @else
                                Có
                            @endif --}}

                            <select id="{{$cate->id}}" class="phimhot_choose">
                                @if($cate->phim_hot == 0)
                                    <option value="1">Có</option>
                                    <option selected value="0">Không</option>
                                @else
                                    <option selected value="1">Có</option>
                                    <option value="0">Không</option>
                                @endif
                            </select>
                        </td>

                        <td>
                            {{-- @if($cate->resolution == 0)
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
                            @endif --}}

                            @php
                                $options = array('0' => 'HD', '1' => 'SD', '2' => 'HDCam', '3' => 'Cam', '4' => 'FullHD', '5' => 'Trailer');
                            @endphp
                            <select id="{{$cate->id}}" class="resolution_choose">
                                @foreach($options as $key => $resolution)
                                    <option {{$cate->resolution == $key ? 'selected' : ''}} value="{{$key}}">{{$resolution}}</option>
                                @endforeach
                            </select>
                        </td>

                        <td>
                            {{-- @if($cate->phude == 0)
                                Phụ đề
                            @else
                                Thuyết minh
                            @endif --}}

                            <select id="{{$cate->id}}" class="phude_choose">
                                @if($cate->phude == 0)
                                    <option value="1">Thuyết minh</option>
                                    <option selected value="0">Phụ đề</option>
                                @else
                                    <option selected value="1">Thuyết minh</option>
                                    <option value="0">Phụ đề</option>
                                @endif
                            </select>
                        </td>

                        {{-- <td>{{$cate->description}}</td> --}}
                        
                        <td>{{$cate->slug}}</td>

                        <td>
                            {{-- @if($cate->status)
                                Hiển thị
                            @else
                                Không hiển thị
                            @endif --}}

                            <select id="{{$cate->id}}" class="trangthai_choose">
                                @if($cate->status == 0)
                                    <option value="1">Hiển thị</option>
                                    <option selected value="0">Không</option>
                                @else
                                    <option selected value="1">Hiển thị</option>
                                    <option value="0">Không</option>
                                @endif
                            </select>
                        </td>

                        <td>
                            {{-- {{$cate->category->title}} --}}
                            {!! Form::select('category_id', $category, isset($cate) ? $cate->category->id : '', ['class' => 'form-control category_choose', 'id' => $cate->id]) !!}
                        </td>

                        <td>
                            @foreach($cate->movie_genre as $gen)
                                {{$gen->title}}
                            @endforeach
                        </td>

                        <td>
                            {{-- {{$cate->country->title}} --}}
                            {!! Form::select('country_id', $country, isset($cate) ? $cate->country->id : '', ['class' => 'form-control country_choose', 'id' => $cate->id]) !!}
                        </td>

                        <td>
                            {{-- @if($cate->thuocphim == 'phimle')
                                Phim lẻ
                            @else
                                Phim bộ
                            @endif --}}

                            <select id="{{$cate->id}}" class="thuocphim_choose">
                                @if($cate->thuocphim == 'phimbo')
                                    <option value="phimle">Phim lẻ</option>
                                    <option selected value="phimbo">Phim bộ</option>
                                @else
                                    <option selected value="phimle">Phim lẻ</option>
                                    <option value="phimbo">Phim bộ</option>
                                @endif
                            </select>
                        </td>

                        <td>{{$cate->ngaytao}}</td>
                        <td>{{$cate->ngaycapnhat}}</td>
                        <td>
                            {!! Form::selectYear('year', 2000, 2024, isset($cate->year) ? $cate->year : '', ['class' => 'select-year', 'id' => $cate->id, 'placeholder' => '--Năm phim--']) !!}
                        </td>

                        <td>
                            <form method="POST">
                                @csrf
                                {!! Form::selectRange('season', 0, 20, isset($cate->season) ? $cate->season : '', ['class' => 'select-season', 'id' => $cate->id]) !!}
                            </form>
                        </td>

                        <td>
                            {!! Form::select('topview', ['0' => 'Ngày', '1' => 'Tuần', '2' => 'Tháng'], isset($cate->topview) ? $cate->topview : '', ['class' => 'select-topview', 'id' => $cate->id, 'placeholder' => '--Views--']) !!}
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
