@extends('admin.templates.default')
@section('content')
<div class="row">
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">Edit Data {{ $lokasi->nama }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('lokasi.update', $lokasi->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="nama">Nama Tempat</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Contoh: Mall" value="{{ $lokasi->nama ?? old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Tempat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="4" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukan alamat tempat">{{ $lokasi->alamat ?? old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <img src="{{ asset('storage/' . $lokasi->foto) }}" class="img-fluid">
                        </div>
                        <div class="col-lg-9">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">
                            @error('foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn btn-block btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection