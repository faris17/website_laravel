@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="mb-1">Categories</h2>
        <p class="text-muted mb-0">
            Kelola kategori berita website
        </p>
    </div>

    <a href="{{ route('categories.create') }}"
       class="btn btn-primary">

        + Tambah Category
    </a>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body p-0">

        <table class="table table-hover mb-0">

            <thead class="table-light">

                <tr>
                    <th width="60">#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th width="180">Action</th>
                </tr>

            </thead>

            <tbody>

                @forelse($categories as $category)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            <strong>
                                {{ $category->name }}
                            </strong>
                        </td>

                        <td>
                            <code>
                                {{ $category->slug }}
                            </code>
                        </td>

                        <td>
                            {{ $category->description }}
                        </td>

                        <td>

                            {{-- add link show category--}}
                            <a href="{{ route('categories.show', $category) }}"
                               class="btn btn-info btn-sm">

                                Detail
                            </a>

                            <a href="{{ route('categories.edit', $category) }}"
                               class="btn btn-warning btn-sm">

                                Edit
                            </a>

                            <form
                                action="{{ route('categories.destroy', $category) }}"
                                method="POST"
                                class="d-inline"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Hapus category ini?')"
                                    class="btn btn-danger btn-sm"
                                >
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5"
                            class="text-center py-4">

                            Belum ada data category

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>


@endsection
