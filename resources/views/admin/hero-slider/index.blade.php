@extends('layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Hero Slider (Banner Beranda)</h1>
        <a href="{{ route('admin.hero-slider.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50 mr-1"></i> Tambah Banner Baru
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
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="thead-light text-center">
                        <tr>
                            <th width="50">Urutan</th>
                            <th width="140">Gambar Banner</th>
                            <th>Judul Banner</th>
                            <th>Deskripsi</th>
                            <th width="90">Status</th>
                            <th width="130">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sliders as $s)
                            <tr>
                                <td class="text-center font-weight-bold">{{ $s->urutan }}</td>
                                <td class="text-center">
                                    <img src="{{ asset($s->gambar) }}" alt="{{ $s->judul }}" class="img-thumbnail" style="max-height: 70px; max-width: 120px; object-fit: cover;">
                                </td>
                                <td class="font-weight-bold">{{ $s->judul }}</td>
                                <td class="small text-muted">{{ Str::limit($s->deskripsi, 80) }}</td>
                                <td class="text-center">
                                    @if ($s->aktif)
                                        <span class="badge badge-success px-2 py-1">Aktif</span>
                                    @else
                                        <span class="badge badge-secondary px-2 py-1">Non-aktif</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.hero-slider.edit', $s->id) }}" class="btn btn-sm btn-info" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.hero-slider.destroy', $s->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus banner ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">Belum ada banner slider. Klik tombol "Tambah Banner Baru" di atas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
