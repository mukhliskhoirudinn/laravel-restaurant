@extends('backend.template.main')

@section('title', 'Transaction: ' . $transaction->code)

@section('content')
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('panel.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('panel.transaction.index') }}">Transaction</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $transaction->name }}</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Transaction: {{ $transaction->name }}</h1>
                <p class="mb-0">Transaction Code: {{ $transaction->code }}</p>
            </div>
            <div>
                <a href="{{ route('panel.transaction.index') }}"
                    class="btn btn-outline-gray-600 d-inline-flex align-items-center">
                    <i class="fas fa-arrow-left me-1"></i> Back
                </a>
            </div>
        </div>
    </div>

    {{-- table --}}
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <th>Date/time</th>
                    <td>: {{ date('d-m-Y', strtotime($transaction->date)) }} /  {{ $transaction->time }}</td>
                </tr>

                <tr>
                    <th>People</th>
                    <td>: {{ $transaction->people }}</td>
                </tr>

                <tr>
                    <th>Name</th>
                    <td>: {{ $transaction->name }}</td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>: {{ $transaction->email }}</td>
                </tr>

                <tr>
                    <th>Phone</th>
                    <td>: {{ $transaction->phone }}</td>
                </tr>

                <tr>
                    <th>Amount</th>
                    <td>: Rp. {{ number_format($transaction->amount, 0, ',', '.') }}</td>
                </tr>

                <tr>
                    <th>Type</th>
                    <td>: {{ $transaction->type }}</td>
                </tr>

                <tr>
                    <th>Message</th>
                    <td>: {{ $transaction->message }}</td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>:
                        @if ($transaction->status == 'pending')
                            <span class="badge bg-warning">Pending</span>
                        @elseif ($transaction->status == 'failed')
                            <span class="badge bg-danger">Failed</span>
                        @else
                            <span class="badge bg-success">Success</span>
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>File</th>
                    <td width="60%">
                        <img src="{{ asset('storage/' . $transaction->file) }}" class="img-fluid" width="20%"
                            target="_blank">
                    </td>
                </tr>

                @isset($review)
                    <tr>
                        <th>Rating</th>
                        <td width="60%">
                            : {{ $review->rate }}
                        </td>
                    </tr>

                    <tr>
                        <th>Comment</th>
                        <td width="60%">
                            : {{ $review->comment }}
                        </td>
                    </tr>
                @endisset
            </table>

            <div class="float-end mt-2">
                <a href="" class="btn btn-warning"><i
                        class="fas fa-edit"></i> Confirm</a>
            </div>
        </div>
    </div>
@endsection
