@extends('backend.template.main')

@section('title', 'Edit Chef')

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
                <li class="breadcrumb-item"><a href="{{ route('panel.chef.index') }}">Chef</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Chef</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Edit Chef</h1>
                <p class="mb-0">Ubah Chef Yummy Restoran</p>
            </div>
            <div>
                <a href="{{ route('panel.chef.index') }}" class="btn btn-outline-gray-600 d-inline-flex align-items-center">
                    <i class="fas fa-arrow-left me-1"></i> Back
                </a>
            </div>
        </div>
    </div>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- form --}}
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <form action="{{ route('panel.chef.update', $chef->uuid) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $chef->name) }}">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="position">Position</label>
                            <select name="position" id="position"
                                class="form-select @error('position') is-invalid @enderror">
                                <option value="" hidden>-- select position --</option>
                                <option value="Master Chef" {{ old('position', $chef->position) == 'Master Chef' ? 'selected' : ''}}>Master Chef</option>
                                <option value="Patissier" {{ old('position', $chef->position) == 'Patissier' ? 'selected' : ''}}>Patissier</option>
                                <option value="Chef" {{ old('position', $chef->position) == 'Chef' ? 'selected' : ''}}>Chef</option>
                            </select>

                            @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="name">Description</label>
                    <textarea name="description" id="description" cols="5" rows="5"
                        class="form-control  @error('description') is-invalid @enderror">{{ old('description', $chef->description) }}</textarea>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="insta_link">Instagram Link</label>
                            <input type="text" name="insta_link" id="insta_link"
                                class="form-control @error('insta_link') is-invalid @enderror"
                                value="{{ old('insta_link', $chef->insta_link) }}">

                            @error('insta_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="linked_link">LinkedIn Link</label>
                            <input type="text" name="linked_link" id="linked_link"
                                class="form-control @error('linked_link') is-invalid @enderror"
                                value="{{ old('linked_link', $chef->linked_link) }}">

                            @error('linked_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" id="photo" accept="image/*"
                        class="form-control  @error('photo') is-invalid @enderror">

                    @if ($chef->photo)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $chef->photo) }}" width="100">
                        </div>
                    @endif

                    @error('photo')
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
