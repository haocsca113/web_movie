@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{-- <form action="{{ route('detect-attack') }}" method="GET">
                <button type="submit" class="btn btn-success">Check Attack</button>
            </form> --}}

            <div class="table-responsive mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Acctack Type</th>
                            <th>Detected At</th>
                            <th>Details</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detect_attacks as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->attack_type }}</td>
                                <td>{{ $item->detected_at }}</td>
                                <td>{{ $item->details }}</td>
                                <td>
                                    <form method="POST" action="{{ route('destroy-detect-attack', [($item->id)]) }}" style="display: inline;">
                                        @csrf
                                        {{-- @method("DELETE") --}}
                                        
                                        <button type="submit" class="btn btn-danger btn-sm" title="Destroy Detect Attack" onclick="return confirm('Confirm delete?')">
                                            <i class="far fa-trash-alt"></i>
                                            Delete
                                        </button>    
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            
        </div>
    </div>
</div>
@endsection
