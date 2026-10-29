@extends('layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Galeri Foto</h1>
        <a href="{{ route('admin.galeri.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50 mr-1"></i> Tambah Foto Galeri
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                @forelse ($galeri as $item)
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="card h-100 shadow-sm border-0">
                            <div style="height: 180px; overflow: hidden; position: relative;" class="rounded-top bg-light">
                                <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}" style="width: 100%; height: 100%; object-fit: cover;">
                                <div style="position: absolute; top: 8px; right: 8px;">
                                    @if ($item->aktif)
                                        <span class="badge badge-success">Aktif</span>
                                    @else
                                        <span class="badge badge-secondary">Non-aktif</span>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <h6 class="font-weight-bold mb-1 text-truncate">{{ $item->judul }}</h6>
                                <p class="text-muted small mb-2 text-truncate">{{ $item->deskripsi ?? '-' }}</p>
                                <span class="badge badge-light border">Urutan: {{ $item->urutan }}</span>
                            </div>
                            <div class="card-footer bg-white p-2 d-flex justify-content-between border-top">
                                <a href="{{ route('admin.galeri.edit', $item->id) }}" class="btn btn-sm btn-info btn-block mr-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST" class="d-inline ml-1" onsubmit="return confirm('Hapus foto ini dari galeri?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-5">
                        <i class="fas fa-images fa-3x mb-3 text-gray-300"></i>
                        <p>Belum ada foto galeri. Klik tombol "Tambah Foto Galeri" untuk menambahkan.</p>
                    </div>
                @endforelse
            </div>
            <div class="d-flex justify-content-center mt-3">
                {{ $galeri->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

