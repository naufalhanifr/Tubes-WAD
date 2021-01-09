@extends('admin.templates.default')
@section('content')
<div class="row">
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">Booking Spot</div>
            <div class="card-body">
                <form action="{{ route('booking-spot-store', $spot->id) }}" method="post">
                    @csrf
                    <strong class="font-italic">Kendaraan</strong>
                    <div class="form-row mt-3">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control @error('nama_kendaraan') is-invalid @enderror" id="nama_kendaraan" name="nama_kendaraan" placeholder="Nama Kendaraan" value="{{ old('nama_kendaraan') }}">
                            @error('nama_kendaraan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <select name="jenis_kendaraan_id" id="" class="form-control">
                                @foreach ($jenis_kendaraan as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('jenis_kendaraan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control @error('merk') is-invalid @enderror" id="merk" name="merk" placeholder="Merk" value="{{ old('merk') }}">
                            @error('merk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control @error('plat') is-invalid @enderror" id="warna" name="warna" placeholder="Warna" value="{{ old('warna') }}">
                            @error('warna')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control @error('plat') is-invalid @enderror" id="plat" name="plat" placeholder="Plat Nomor" value="{{ old('plat') }}">
                            @error('plat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control @error('pemilik') is-invalid @enderror" id="pemilik" name="pemilik" placeholder="Pemilik" value="{{ old('pemilik') }}">
                            @error('pemilik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="jam_masuk">Jam Masuk</label>
                            {{-- <input type="datetime-local" class="form-control @error('jam_masuk') is-invalid @enderror" id="jam_masuk" name="jam_masuk" value="{{ old('jam_masuk') }}">
                            @error('jam_masuk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror --}}
                            <input type="text" name="jam_masuk" value="{{ Carbon\Carbon::now() }}" readonly class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="jam_keluar">Jam Keluar</label>
                            <input type="datetime-local" class="form-control @error('jam_keluar') is-invalid @enderror" id="jam_keluar" name="jam_keluar" value="{{ old('jam_keluar') }}">
                            @error('jam_keluar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary">Booking</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection