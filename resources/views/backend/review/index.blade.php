@extends('backend.template.main')

@section('title', 'Review')

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
                <li class="breadcrumb-item active" aria-current="page">Review</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Review</h1>
                <p class="mb-0">Daftar Review Yummy Restoran</p>
            </div>
        </div>
    </div>

     @session('success')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endsession

    {{-- table --}}
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-hover table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">No</th>
                            <th class="border-0">Code</th>
                            <th class="border-0">Rating</th>
                            <th class="border-0">Created At</th>
                            <th class="border-0 rounded-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reviews as $item)
                            <tr>
                                <td>{{ ($reviews->currentPage() - 1) * $reviews->perPage() + $loop->iteration }}</td>
                                <td>{{ $item->transaction->code }}</td>
                                <td>{{ $item->rate }}</td>
                                <td>{{ date('d-m-Y H:i', strtotime($item->created_at)) }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('panel.review.show', $item->uuid) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <button class="btn btn-sm btn-danger" onclick="deleteReview(this)" data-uuid="{{ $item->uuid }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No Data Available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- pagination --}}
                <div class="mt-3">
                    {{ $reviews->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const deleteReview = (e) => {
            let uuid = e.getAttribute('data-uuid')

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "DELETE",
                        url: `/panel/review/${uuid}`,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            Swal.fire({
                                title: "Deleted!",
                                text: data.message,
                                icon: "success",
                                timer: 2500,
                                showConfirmButton: false
                            }).then(() => {
                                window.location.reload();
                            });
                        },
                        error: function(data) {
                            Swal.fire({
                                title: "Failed!",
                                text: "Your data has not been deleted.",
                                icon: "error"
                            });

                            console.log(data);
                        }
                    });
                }
            });
        }
    </script>
@endpush
