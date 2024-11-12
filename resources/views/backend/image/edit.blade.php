@extends('backend.template.main')

@section('title', 'Edit Image')

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
                <li class="breadcrumb-item"><a href="{{ route('panel.image.index') }}">Image</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Image</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Edit Image</h1>
                <p class="mb-0">Ubah Gambar Yummy Restoran</p>
            </div>
            <div>
                <a href="{{ route('panel.image.index') }}"
                    class="btn btn-outline-gray-600 d-inline-flex align-items-center">
                    <i class="fas fa-arrow-left me-1"></i> Back
                </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- form --}}
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <form action="{{ route('panel.image.update', $image->uuid) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $image->name) }}">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="name">Description</label>
                    <textarea name="description" id="description" cols="5" rows="5"
                        class="form-control  @error('description') is-invalid @enderror">{{ old('description', $image->description) }}</textarea>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="file">File</label>
                    <input type="file" name="file" id="file" accept="image/*"
                        class="form-control  @error('file') is-invalid @enderror">

                    <div>
                        <img src="{{ asset('storage/' . $image->file) }}" alt="" class="img-fluid mt-3" width="15%">
                    </div>

                    @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="float-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
