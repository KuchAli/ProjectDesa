@extends('admin.layouts.main')
@section('title', 'Daftar Pengguna')
@section('admin-content')

<div class="container">
    <h1 class="fw-bold fs-2">Daftar Pengguna</h1>
    <span class="fs-5 fw-italic">Berikut adalah daftar pengguna yang terdaftar dalam sistem.</span>
    <hr>
    <div class="d-flex justify-content-end mt-5">
        <a href="{{ route('admin.users.create') }}" class="btn btn-outline-success">+ Tambah Pengguna</a>
    </div>


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-4">
        <thead class="table-success ">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                 <span class="badge 
                            @if($user->role == 'admin') bg-primary
                            @elseif($user->role == 'seller') bg-success
                            @else bg-secondary @endif
                        ">
                            {{ ucfirst($user->role) }}
                        </span>
                </td>
                <td>
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Belum ada user.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $users->links() }}
    </div>
</div>

@endsection
