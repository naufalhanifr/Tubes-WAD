@extends('admin.templates.default')
@section('content')
<div class="row">
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">Tambah Data Lokasi</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('lokasi.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Tempat</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Contoh: Mall" value="{{ old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Tempat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="4" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukan alamat tempat">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">
                        @error('foto')
                            <div class="invalid-feedback d-inline">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn btn-block btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection