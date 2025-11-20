@extends('admin.layouts.main')

@section('title', 'Visi & Misi Desa')

@section('admin-content')
<div class="container-fluid mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Visi & Misi Desa</h2>

        <a href="{{ route('admin.profilDesa.visiMisi.create') }}" class="btn btn-outline-success">
            + Tambah Visi Misi
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead class="table-success">
                    <tr class="text-center">
                        <th width="5%">No</th>
                        <th width="40%">Visi</th>
                        <th width="40%">Misi</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($visiMisis as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>

                            <td>{!! Str::limit($item->visi, 100) !!}</td>
                            <td>{!! Str::limit($item->misi, 100) !!}</td>

                            <td class="text-center ">
                                <a href="{{ route('admin.profilDesa.visiMisi.edit', $item->id) }}"
                                   class="btn btn-warning btn-sm ">
                                    Edit
                                </a>

                                <form action="{{ route('admin.profilDesa.visiMisi.destroy', $item->id) }}"
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
                            <td colspan="4" class="text-center text-muted">
                                Belum ada data visi misi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
