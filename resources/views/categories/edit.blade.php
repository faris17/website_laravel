@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="mb-1">Edit Category</h2>
        <p class="text-muted mb-0">
            Halaman untuk mengedit category
        </p>
    </div>  
    <a href="{{ route('categories.index') }}"
       class="btn btn-light">

        Kembali
    </a>
</div>  
<div class="card border-0 shadow-sm">

    <div class="card-body">

        <form action="{{ route('categories.update', $category->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" required name="name" id="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name', $category->name) }}"
                       placeholder="Masukkan nama category">

                @error('name')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description"
                          class="form-control @error('description') is-invalid @enderror"
                          rows="4"
                          placeholder="Masukkan deskripsi category">{{ old('description', $category->description) }}</textarea>

                @error('description')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-warning">
                Update
            </button>

        </form>

    </div>
</div>
@endsection
