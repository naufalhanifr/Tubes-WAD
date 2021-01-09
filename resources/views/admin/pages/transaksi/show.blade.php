@extends('admin.templates.default')
@section('content')
<div class="row">
    <div class="col-lg-6 mb-1">
        <div class="card">
            <div class="card-header">
                Detail Transaksi {{ $item->kode }}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Kode</th>
                            <td>{{ $item->kode }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $item->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Kendaraan</th>
                            <td>
                                <table class="table table-borderless">
                                    <tr>
                                        <th>Nama Kendaraan</th>
                                        <td>{{ $item->kendaraan->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis</th>
                                        <td>{{ $item->kendaraan->jenis->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Merk</th>
                                        <td>{{ $item->kendaraan->merk }}</td>
                                    </tr>
                                    <tr>
                                        <th>Warna</th>
                                        <td>{{ $item->kendaraan->warna }}</td>
                                    </tr>
                                    <tr>
                                        <th>Plat</th>
                                        <td>{{ $item->kendaraan->plat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pemilik</th>
                                        <td>{{ $item->kendaraan->pemilik }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <th>Lokasi</th>
                            <td>{{ $item->spot->lokasi->nama }}</td>
                        </tr>
                        <tr>
                            <th>Spot</th>
                            <td>{{ $item->spot->nomor }}</td>
                        </tr>
                        <tr>
                            <th>Hari\Tanggal</th>
                            <td>{{ $item->created_at->translatedFormat('l, d/m/Y H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th>Jam Masuk</th>
                            <td>{{ $item->jam_masuk->translatedFormat('H:i d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <th>Jam Keluar</th>
                            <td>{{ $item->jam_keluar->translatedFormat('H:i d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <th>Tarif/Jam</th>
                            <td>Rp. {{ number_format($item->kendaraan->jenis->tarif) }}</td>
                        </tr>
                        <tr>
                            <th>Total Jam</th>
                            <td>{{ $total_jam }}</td>
                        </tr>
                        <tr>
                            <th>Total Bayar</th>
                            <td>Rp. {{ number_format($item->total_bayar) }}</td>
                        </tr>
                        <tr>
                            <th>Status Transaksi</th>
                            <td>
                                @if ($item->status_id == 1)
                                <span class="badge badge-primary">BOOKING</span>
                                @elseif($item->status_id == 2)
                                    <span class="badge badge-success">PEMBAYARAN SUCCESS</span>
                                @elseif($item->status_id == 3)
                                    <span class="badge badge-secondary">PARKIR SELESAI</span>
                                @elseif ($item->status_id == 4)
                                    <span class="badge badge-warning">PERINGATAN</span>
                                @elseif ($item->status_id == 5)
                                    <span class="badge badge-danger">GAGAL</span>
                                @elseif ($item->status_id == 6)
                                    <span class="badge badge-info">MENUNGGU VALIDASI</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                    @if (auth()->user()->level === 'user')
                    <div class="d-flex justify-content-between">
                        @if ($item->status_id == 1 || $item->status_id == 6)
                            <a href="{{ route('transaksi.upload', $item->id) }}" class="btn btn btn-primary">Pembayaran</a>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">Bukti Pembayaran</div>
            <div class="card-body">
                @if ($item->bukti_pembayaran !== NULL)
                    <img src="{{ asset('storage/' . $item->bukti_pembayaran) }}" alt="" class="img-fluid">
                @else
                    <div class="alert alert-danger text-center">
                        <strong>Bukit Pembayaran Tidak Ada!</strong>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection