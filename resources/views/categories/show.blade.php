@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-1">Category Detail</h2>
        <p class="text-muted mb-0">Detail informasi kategori berita</p>
    </div>

    <a href="{{ route('categories.index') }}" class="btn btn-light">
        Kembali
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label text-muted mb-1">Name</label>
            <div class="fw-bold">{{ $category->name }}</div>
        </div>

        <div class="mb-3">
            <label class="form-label text-muted mb-1">Slug</label>
            <div>
                <code>{{ $category->slug }}</code>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label text-muted mb-1">Description</label>
            <div class="text-break">{{ $category->description ?? '-' }}</div>
        </div>

        <div class="mb-3">
            <label class="form-label text-muted mb-1">Is Active</label>
            <div>
                @if($category->is_active)
                    <span class="badge text-bg-success">Active</span>
                @else
                    <span class="badge text-bg-secondary">Inactive</span>
                @endif
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label text-muted mb-1">Jumlah Posts</label>
            <div class="fw-bold">{{ $category->posts->count() }}</div>
        </div>

        <div class="mt-4 d-flex gap-2">
            <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">
                Edit
            </a>
        </div>
    </div>
</div>

@endsection

