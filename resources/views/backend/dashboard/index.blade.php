@extends('backend.template.main')

@section('title', 'Dashboard')

@section('content')
    <div class="py-4">
        <h1 class="h3">Dashboard</h1>
    </div>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow bg-primary text-white" style="height: 150px;">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-money-bill-wave fa-3x me-3"></i>
                    <div>
                        <h2 class="h6 mb-0">Total Transactions</h2>
                        <p class="h2 mb-0">{{ $totalTransactions }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow bg-success text-white" style="height: 150px;">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-check-circle fa-3x me-3"></i>
                    <div>
                        <h2 class="h6 mb-0">Successful Transactions</h2>
                        <p class="h2 mb-0">{{ $totalSuccessful }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow bg-warning text-dark" style="height: 150px;">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-hourglass-half fa-3x me-3"></i>
                    <div>
                        <h2 class="h6 mb-0">Pending Transactions</h2>
                        <p class="h2 mb-0">{{ $totalPending }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow bg-danger text-white" style="height: 150px;">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-times-circle fa-3x me-3"></i>
                    <div>
                        <h2 class="h6 mb-0">Failed Transactions</h2>
                        <p class="h2 mb-0">{{ $totalFailed }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h2 class="h5">Transaksi Terbaru</h2>
                    <table class="table table-hover table-striped mt-3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentTransactions as $transaction)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaction->name }}</td>
                                    <td>Rp. {{ number_format($transaction->amount, 0, ',', '.') }}</td>
                                    <td>
                                        <span
                                            class="badge {{ $transaction->status === 'success' ? 'bg-success' : ($transaction->status === 'pending' ? 'bg-warning' : 'bg-danger') }}">
                                            {{ ucfirst($transaction->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $transaction->created_at->format('Y-m-d') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
