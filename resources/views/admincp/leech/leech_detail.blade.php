@extends('layouts.app')

@section('content')

{{-- <div class="table-responsive">

</div> --}}

<table class="table" id="tablephim">
    <thead>
        <tr>
            <th>#</th>
            <th>_id</th>
            <th>name</th>
            <th>slug</th>
            <th>origin_name</th>

            <th>content</th>
            <th>type</th>
            <th>status</th>
            <th>thumb_url</th>
            <th>poster_url</th>

            <th>is_copyright</th>
            <th>sub_docquyen</th>
            <th>chieurap</th>
            <th>trailer_url</th>
            <th>time</th>

            <th>episode_current</th>
            <th>episode_total</th>
            <th>quality</th>
            <th>lang</th>
            <th>notify</th>

            <th>showtimes</th>
            <th>year</th>
            <th>view</th>

            <th>actor</th>
            <th>director</th>
            <th>category</th>
            <th>country</th>
        </tr>
    </thead>
    <tbody class="order_position">
        @foreach($resp_movie as $key => $res)
        <tr>
            <td scope="row">{{$key}}</td>
            <td>{{$res['_id']}}</td>
            <td>{{$res['name']}}</td>
            <td>{{$res['slug']}}</td>
            <td>{{$res['origin_name']}}</td>

            <td>{!!substr($res['content'], 0, 50)!!}...</td>
            <td>{{$res['type']}}</td>
            <td>{{$res['status']}}</td>
            <td><img src="{{$res['thumb_url']}}" width="80px" height="80px"></td>
            <td><img src="{{$res['poster_url']}}" width="80px" height="80px"></td>
            

            <td>
                @if($res['is_copyright'] == true)
                    <span class="text text-success">True</span>
                @else
                    <span class="text text-danger">False</span>
                @endif
            </td>
            <td>
                @if($res['sub_docquyen'] == true)
                    <span class="text text-success">True</span>
                @else
                    <span class="text text-danger">False</span>
                @endif
            </td>
            <td>
                @if($res['chieurap'] == true)
                    <span class="text text-success">True</span>
                @else
                    <span class="text text-danger">False</span>
                @endif
            </td>
            <td>{{$res['trailer_url']}}</td>
            <td>{{$res['time']}}</td>
            
            <td>{{$res['episode_current']}}</td>
            <td>{{$res['episode_total']}}</td>
            <td>{{$res['quality']}}</td>
            <td>{{$res['lang']}}</td>
            <td>{{$res['notify']}}</td>

            <td>{{$res['showtimes']}}</td>
            <td>{{$res['year']}}</td>
            <td>{{$res['view']}}</td>
          
            <td>
                @foreach($res['actor'] as $actor)
                    <span class="badge badge-info">{{$actor}}</span>
                @endforeach
            </td>
            <td>
                @foreach($res['director'] as $director)
                    <span class="badge badge-info">{{$director}}</span>
                @endforeach
            </td>
            <td>
                @foreach($res['category'] as $category)
                    <span class="badge badge-info">{{$category['name']}}</span>
                @endforeach
            </td>
            <td>
                @foreach($res['country'] as $country)
                    <span class="badge badge-info">{{$country['name']}}</span>
                @endforeach
            </td>
            
        </tr>
        @endforeach
    </tbody>
</table>
@endsection