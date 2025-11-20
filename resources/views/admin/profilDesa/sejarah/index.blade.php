@extends('admin.layouts.main')

@section('title', 'Sejarah Desa')

@section('admin-content')
<div class="container-fluid mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Sejarah Desa</h2>

        <a href="{{ route('admin.profilDesa.sejarah.create') }}" class="btn btn-outline-success">
            + Tambah Sejarah
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead class="table-dark text-center">
                    <tr>
                        <th width="5%">No</th>
                        <th width="60%">Sejarah</th>
                        <th width="20%">Dibuat</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($sejarahs as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>

                            <td>{!! Str::limit($item->sejarah, 200) !!}</td>

                            <td class="text-center">{{ $item->created_at->format('d M Y') }}</td>

                            <td class="text-center">
                                <a href="{{ route('admin.profilDesa.sejarah.edit', $item->id) }}" 
                                   class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('admin.profilDesa.sejarah.destroy', $item->id) }}"
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
                            <td colspan="4" class="text-center text-muted">Belum ada data sejarah.</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

            <div class="mt-3">
                {{ $sejarahs->links() }}
            </div>

        </div>
    </div>

</div>
@endsection
