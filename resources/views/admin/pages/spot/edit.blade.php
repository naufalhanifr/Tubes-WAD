@extends('admin.templates.default')
@section('content')
<div class="row">
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">Edit Data Spot</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('spot.update', $spot->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="lokasi_id">Lokasi</label>
                        <select name="lokasi_id" id="lokasi_id" class="form-control">
                            @foreach ($lokasi as $item)
                                <option @if($item->id == $spot->lokasi_id) selected @endif value="{{ $item->id }}">{{ $item->nama }}</option>
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
                        <input type="number" name="nomor" class="form-control @error('nomor') is-invalid @enderror" placeholder="Nomor Spot" value="{{ $spot->nomor ?? old('nomor') }}">
                        @error('nomor')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option @if($spot->status == 0) selected @endif value=0>Tersedia</option>
                            <option @if($spot->status == 1) selected @endif value=1>Tidak Tersedia</option>
                        </select>
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