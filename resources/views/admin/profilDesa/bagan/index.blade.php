@extends('admin.layouts.main')

@section('title', 'Bagan Organisasi')

@section('admin-content')
<div class="container-fluid mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Bagan Organisasi Desa</h2>

        <a href="{{ route('admin.profilDesa.bagan.create') }}" class="btn btn-outline-success">
            + Tambah Bagan
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead class="table-success text-center">
                    <tr>
                        <th width="5%">No</th>
                        <th width="20%">Slug</th>
                        <th width="40%">Gambar</th>
                        <th width="20%">Dibuat</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($bagans as $item)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $item->bagan_slug }}</td>

                            <td>
                                @if($item->image_bagan)
                                    <img src="{{ asset('storage/' . $item->image_bagan) }}"
                                         width="180" class="img-thumbnail">
                                @else
                                    <span class="text-muted">Tidak ada gambar</span>
                                @endif
                            </td>

                            <td>{{ $item->created_at->format('d M Y') }}</td>

                            <td>

                                <form action="{{ route('admin.profilDesa.bagan.destroy', $item->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5"
                                class="text-center text-muted">
                                Belum ada data bagan organisasi.
                            </td>  
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection 