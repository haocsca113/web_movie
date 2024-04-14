@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản lý quốc gia phim</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(!isset($country))
                        {!! Form::open(['route' => 'country.store', 'method' => 'POST']) !!}
                    @else
                        {!! Form::open(['route' => ['country.update', $country->id], 'method' => 'PUT']) !!}
                    @endif

                        <div class="form-group mb-3">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', isset($country) ? $country->title : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu', 'id' => 'slug', 'onkeyup' => 'ChangeToSlug()']) !!}
                        </div>
                        <div class="form-group mb-3">
                            {!! Form::label('slug', 'Slug') !!}
                            {!! Form::text('slug', isset($country) ? $country->slug : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu', 'id' => 'convert_slug']) !!}
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', isset($country) ? $country->description : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu', 'id' => 'description']) !!}
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('status', 'Status') !!}
                            {!! Form::select('status', ['1' => 'Hiển thị', '0' => 'Không hiển thị'], isset($country) ?$country->status : '', ['id' => 'status', 'class' => 'form-control']) !!}
                        </div>

                    @if(!isset($country))
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
