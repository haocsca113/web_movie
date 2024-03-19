<form action="{{route('locphim')}}" method="GET">
    <style type="text/css">
        .stylish_filter{
            border: 0;
            background: #12171b;
            color: #fff;
        }
        .btn_filter{
            border: 0;
            background: #12171b;
            color: #fff;
            padding: 9px;
        }
    </style>

    <div class="col-md-3">
        <div class="form-group">
            <select class="form-control stylish_filter" name="order" id="exampleFormControlSelect1">
            <option value="">--Sắp xếp--</option>
            <option value="date">Ngày đăng</option>
            <option value="year_release">Năm sản xuất</option>
            <option value="name_a_z">Tên phim</option>
            <option value="watch_views">Lượt xem</option>
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <select class="form-control stylish_filter" name="genre" id="exampleFormControlSelect1">
            <option value="">--Thể loại--</option>
            @foreach($genre as $key => $gen_filter)
                <option value={{$gen_filter->id}}>{{$gen_filter->title}}</option>
            @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <select class="form-control stylish_filter" name="country" id="exampleFormControlSelect1">
            <option value="">--Quốc gia--</option>
            @foreach($country as $key => $coun_filter)
                <option value={{$coun_filter->id}}>{{$coun_filter->title}}</option>
            @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::selectYear('year', 2010, 2024, null, ['class' => 'form-control stylish_filter', 'placeholder' => '--Năm phim--']) !!}
        </div>
    </div>
    
    <div class="col-md-1">
        <input type="submit" class="btn btn-sm btn-default btn_filter" value="Lọc phim">
    </div>
</form>
