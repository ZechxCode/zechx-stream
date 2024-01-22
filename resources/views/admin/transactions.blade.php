@extends('admin.layouts.base')
@section('title', 'Transaction')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Transactions</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table id="transaction" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Package</th>
                                        <th>User Email</th>
                                        <th>Amount</th>
                                        <th>Transaction Code</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $trx)
                                        <tr>
                                            <td>{{ $trx->id }}</td>
                                            <td>{{ $trx->Package->name }}</td>
                                            <td>{{ $trx->User->email }}</td>
                                            <td>Rp {{ $trx->amount }}</td>
                                            <td>{{ $trx->transaction_code }}</td>
                                            <td>{{ $trx->status }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        $('#transaction').dataTable();
    </script>
@endsection
