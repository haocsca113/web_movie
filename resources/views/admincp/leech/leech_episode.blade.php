@extends('layouts.app')

@section('content')

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Link Embeb</th>
            <th>Link M3u8</th>
            <th>Tên phim</th>
            <th>Slug</th>
            <th>Số tập</th>

            <th>Tập phim</th>
            <th>Quản lý</th>
        </tr>
    </thead>
    <tbody class="order_position">
        @foreach($resp['episodes'] as $key => $res)
        <tr>
            <td scope="row">{{$key}}</td>
            <td>
                @foreach($res['server_data'] as $key => $server_1)
                    <ul>
                        <li>
                            Tập {{$server_1['name']}}
                            <input type="text" class="form-control" value={{$server_1['link_embed']}}>    
                        </li>
                        
                    </ul>
                @endforeach
            </td>
            <td>
                @foreach($res['server_data'] as $key => $server_2)
                    <ul>
                        <li>
                            Tập {{$server_2['name']}}
                            <input type="text" class="form-control" value={{$server_2['link_m3u8']}}>    
                        </li>
                        
                    </ul>
                @endforeach
            </td>
            <td>{{$resp['movie']['name']}}</td>
            <td>{{$resp['movie']['slug']}}</td>
            <td>{{$resp['movie']['episode_total']}}</td>
            
            <td>
                {{$res['server_name']}}
            </td>
            
            <td>
                <form method="POST" action="{{route('leech-episode-store', [$resp['movie']['slug']])}}">
                    @csrf
                    <input type="submit" value="Thêm tập phim" class="btn btn-success btn-sm">
                </form>
                <form method="POST" action="">
                    @csrf
                    <input type="submit" value="Xóa tập phim" class="btn btn-danger btn-sm">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection