@extends('layouts.foradmin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2>
                Log activities
            </h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="example1">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Transaction ID</th>
                            <th>Log</th>
                            <th>Executor ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dt->transaction_id }}</td>
                                <td>{{ $dt->log }}</td>
                                <td>{{ $dt->executor_id }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
