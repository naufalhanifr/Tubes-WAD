@extends('admin.templates.default')
@section('content')
<div class="row">
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">Edit Pembayaran {{ $item->nama }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('pembayaran.update', $item->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="nama">Nama Pembayaran</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Pembayaran" value="{{ $item->nama ?? old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nomor">Nomor</label>
                        <input type="text" name="nomor" class="form-control @error('nomor') is-invalid @enderror" placeholder="Nomor" value="{{ $item->nomor ?? old('nomor') }}">
                        @error('nomor')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="2" class="form-control" placeholder="Optional">{{ $item->deskripsi ?? old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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