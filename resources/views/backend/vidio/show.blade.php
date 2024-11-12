@extends('backend.template.main')

@section('title', 'Show Vidio: ' . $vidio->name)

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
                <li class="breadcrumb-item"><a href="{{ route('panel.vidio.index') }}">Vidio</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $vidio->name }}</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Vidio: {{ $vidio->name }}</h1>
                <p class="mb-0">Details for Vidio: {{ $vidio->name }}</p>
            </div>
            <div>
                <a href="{{ route('panel.vidio.index') }}"
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
                    <th>Name</th>
                    <td>: {{ $vidio->name }}</td>
                </tr>
                <tr>
                    <th>Slug</th>
                    <td>: {{ $vidio->slug }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>: {{ $vidio->description }}</td>
                </tr>
                <tr>
                    <th>Video Link</th>
                    <td>: <a href="https://www.youtube.com/watch?v={{ $vidio->vidio_link }}"
                            target="_blank">{{ 'https://www.youtube.com/watch?v=' . $vidio->vidio_link }}</a></td>
                </tr>

                <tr>
                    <th>Preview Video</th>
                    <td>
                        : <iframe width="560" height="315"
                            src="https://www.youtube.com/embed/{{ $vidio->vidio_link }}" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </td>
                </tr>

                <tr>
                    <th>Created At</th>
                    <td>: {{ date('Y-m-d H:i:s', strtotime($vidio->created_at)) }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>: {{ date('Y-m-d H:i:s', strtotime($vidio->updated_at)) }}</td>
                </tr>
            </table>



            <div class="float-end mt-2">
                <a href="{{ route('panel.vidio.edit', $vidio->uuid) }}" class="btn btn-warning"><i class="fas fa-edit"></i>
                    Edit</a>
            </div>
        </div>
    </div>
@endsection
