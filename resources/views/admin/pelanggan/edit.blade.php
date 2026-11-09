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
                        <a href="{{ route('pelanggan.index') }}">Pelanggan</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Edit Data
                    </li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Edit Pelanggan</h1>
                    <p class="mb-0">
                        Form untuk mengubah data pelanggan.
                    </p>
                </div>
                <div>
                    <a href="{{ route('pelanggan.index') }}" class="btn btn-primary">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
        <!-- Form Edit Pelanggan -->
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
                        <form action="{{ route('pelanggan.update', $dataPelanggan->pelanggan_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-4">
                                <!-- First Name -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="mb-3">
                                        <label for="first_name" class="form-label">
                                            First Name
                                        </label>
                                        <input type="text" id="first_name" name="first_name" class="form-control"
                                            value="{{ $dataPelanggan->first_name }}" required>
                                    </div>
                                    <!-- Last Name -->
                                    <div class="mb-3">
                                        <label for="last_name" class="form-label">
                                            Last Name
                                        </label>
                                        <input type="text" id="last_name" name="last_name" class="form-control"
                                            value="{{ $dataPelanggan->last_name }}" required>
                                    </div>
                                </div>
                                <!-- Birthday and Gender -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="mb-3">
                                        <label for="birthday" class="form-label">
                                            Birthday
                                        </label>
                                        <input type="date" id="birthday" name="birthday" class="form-control"
                                            value="{{ $dataPelanggan->birthday }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">
                                            Gender
                                        </label>
                                        <select class="form-select mb-0" id="gender" name="gender" aria-label="Gender">
                                            <option value="" disabled {{ empty($dataPelanggan->gender) ? 'selected' : '' }}>-- Pilih Gender --</option>
                                            <option value="Female" {{ $dataPelanggan->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                            <option value="Male" {{ $dataPelanggan->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Email and Phone -->
                                <div class="col-lg-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">
                                            Email
                                        </label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            value="{{ $dataPelanggan->email }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">
                                            Phone
                                        </label>
                                        <input type="text" id="phone" name="phone" class="form-control"
                                            value="{{ $dataPelanggan->phone }}">
                                    </div>
                                    <!-- Buttons -->
                                    <div>
                                        <button type="submit" class="btn btn-info">
                                            Simpan Perubahan
                                        </button>
                                        <a href="{{ route('pelanggan.index') }}"
                                            class="btn btn-outline-secondary ms-2">
                                            Batal
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection