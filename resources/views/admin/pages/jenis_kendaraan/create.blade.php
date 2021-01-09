@extends('admin.templates.default')
@section('content')
<div class="row">
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">Tambah Jenis Kendaraan</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('jenis-kendaraan.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Jenis Kendaraan</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukan Jenis Kendaraan" value="{{ old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tarif">Tarif/Jam</label>
                        <input type="text" name="tarif" class="form-control @error('tarif') is-invalid @enderror" placeholder="Masukan Tarif/Jam" value="{{ old('tarif') }}">
                        @error('tarif')
                            <div class="invalid-feedback">
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