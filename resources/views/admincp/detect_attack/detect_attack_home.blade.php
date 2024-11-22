@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{-- <form action="{{ route('detect-attack') }}" method="GET">
                <button type="submit" class="btn btn-success">Check Attack</button>
            </form> --}}

            <div class="table-responsive mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Acctack Type</th>
                            <th>Detected At</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detect_attacks as $item)
                            <tr>
                                <td>{{ $item->attack_type }}</td>
                                <td>{{ $item->detected_at }}</td>
                                <td>{{ $item->details }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            
        </div>
    </div>
</div>
@endsection
