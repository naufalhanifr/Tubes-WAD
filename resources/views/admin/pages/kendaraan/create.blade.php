@extends('admin.templates.default')
@section('content')
<div class="row">
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">Tambah Kendaraan</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('kendaraan.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Kendaraan</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Kendaraan" value="{{ old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis_kendaraan_id">Jenis Kendaraan</label>
                        <select name="jenis_kendaraan_id" id="jenis_kendaraan_id" class="form-control">
                            @foreach ($jenis_kendaraan as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @error('jenis_kendaraan_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="merk">Merk Kendaraan</label>
                        <input type="text" name="merk" class="form-control @error('merk') is-invalid @enderror" placeholder="Merk Kendaraan" value="{{ old('merk') }}">
                        @error('merk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="warna">Warna Kendaraan</label>
                        <input type="text" name="warna" class="form-control @error('warna') is-invalid @enderror" placeholder="Warna Kendaraan" value="{{ old('warna') }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="plat">Plat Kendaraan</label>
                        <input type="text" name="plat" class="form-control @error('plat') is-invalid @enderror" placeholder="Plat Kendaraan" value="{{ old('plat') }}">
                        @error('plat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pemilik">Pemilik Kendaraan</label>
                        <input type="text" name="pemilik" class="form-control @error('pemilik') is-invalid @enderror" placeholder="Pemilik Kendaraan" value="{{ old('pemilik') }}">
                        @error('pemilik')
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