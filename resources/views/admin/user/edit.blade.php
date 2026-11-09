@extends('layout.admin.app')
@section('content')
    <!-- Page Header -->
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="/dashboard">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('user.index') }}">User</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Edit Data
                </li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Edit User</h1>
                <p class="mb-0">
                    Form untuk mengubah data user.
                </p>
            </div>
            <div>
                <a href="{{ route('user.index') }}" class="btn btn-primary">
                    Kembali
                </a>
            </div>
        </div>
    </div>
    <!-- Form Edit User -->
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Data gagal divalidasi!</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <!-- Name & Email -->
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">
                                        Name
                                    </label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        value="{{ old('name', $user->name) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">
                                        Email
                                    </label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        value="{{ old('email', $user->email) }}" required>
                                </div>
                            </div>
                            <!-- Password & Confirm Password -->
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="password" class="form-label">
                                        Password <small class="text-muted">(Kosongkan jika tidak diubah)</small>
                                    </label>
                                    <input type="password" id="password" name="password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">
                                        Confirm Password
                                    </label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- Buttons -->
                        <div>
                            <button type="submit" class="btn btn-info">
                                Simpan Perubahan
                            </button>
                            <a href="{{ route('user.index') }}" class="btn btn-outline-secondary ms-2">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
