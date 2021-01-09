@extends('admin.templates.default')
@section('content')
<div class="row">
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">Tambah Data Spot</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('spot.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="lokasi_id">Lokasi</label>
                        <select name="lokasi_id" id="lokasi_id" class="form-control">
                            @foreach ($lokasi as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @error('lokasi_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nomor">Nomor Spot</label>
                        <input type="number" name="nomor" class="form-control @error('nomor') is-invalid @enderror" placeholder="Nomor Spot" value="{{ old('nomor') }}">
                        @error('nomor')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="0">Tersedia</option>
                            <option value="1">Tidak Tersedia</option>
                        </select>
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