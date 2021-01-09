@extends('admin.templates.default')

@section('content')
<div class="row">
    <div class="col-lg-12">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h6 class="card-title">
                    @if (auth()->user()->level === 'administrator')
                    Data Transaksi
                    @else
                    History Transaksi
                    @endif
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dtable" class="table table-hover table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Kendaraan</th>
                                <th>Lokasi</th>
                                <th>Spot</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->kendaraan->nama }}</td>
                                    <td>{{ $item->spot->lokasi->nama }}</td>
                                    <td>{{ $item->spot->nomor }}</td>
                                    <td>{{ $item->created_at->translatedFormat('H:i:s d/m/Y') }}</td>
                                    <td>
                                        @if ($item->status_id == 1)
                                            <span class="badge badge-primary">BOOKING</span>
                                        @elseif($item->status_id == 2 && $item->jam_keluar > Carbon\Carbon::now())
                                            <span class="badge badge-success">PEMBAYARAN SUCCESS</span>
                                        @elseif($item->status_id == 3)
                                            <span class="badge badge-secondary">PARKIR SELESAI</span>
                                        @elseif ($item->status_id == 2 && $item->jam_keluar < Carbon\Carbon::now())
                                            <span class="badge badge-warning">PERINGATAN</span>
                                        @elseif ($item->status_id == 5)
                                            <span class="badge badge-danger">GAGAL</span>
                                        @elseif ($item->status_id == 6)
                                            <span class="badge badge-info">MENUNGGU VALIDASI</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if (auth()->user()->level === 'administrator')
                                            @if ($item->created_at->addMinute(30) < Carbon\Carbon::now() && $item->status_id == 1)
                                                <a href="{{ route('transaksi.set-status', $item->id) }}?status_id=5" class="btn btn-sm btn-secondary" title="Klik untuk merubah status ke gagal">Kadaluarsa</a>
                                            @elseif($item->status_id == 6)
                                                @if ($item->updated_at->addMinute(20) < Carbon\Carbon::now() && $item->status_id == 6 || $item->status_id == 1)
                                                <a href="{{ route('transaksi.set-status', $item->id) }}?status_id=5" class="btn btn-sm btn-dark" title="Klik untuk merubah status Pembayaran Gagal">Gagal</a>                                           
                                                @endif
                                                <a href="{{ route('transaksi.set-status', $item->id) }}?status_id=2" class="btn btn-sm btn-secondary" title="Klik untuk merubah status Pembayaran Sukses">Validasi</a>
                                            @elseif($item->jam_keluar < Carbon\Carbon::now() && $item->status_id == 2 )
                                                <a href="{{ route('transaksi.set-status', $item->id) }}?status_id=3" class="btn btn-sm btn-secondary" title="Klik untuk merubah status Parkir Selesai">Parkir Selesai</a>
                                            @endif
                                            
                                            <a href="{{ route('transaksi.show', $item->id) }}" class="btn btn-sm btn-warning">Show</a>
                                            <form action="{{ route('transaksi.destroy', $item->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</button>
                                            </form>
                                        @else
                                        @if ($item->status_id == 2)
                                        <form action="{{ route('transaksi.set-status', $item->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('patch')
                                            <button class="btn btn-sm btn-secondary">Parkir Selesai</button>
                                        </form>
                                        @endif
                                                
                                        <a href="{{ route('transaksi.show', $item->id) }}" class="btn btn-sm btn-warning">Show</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('afterStyle')
<!-- Custom styles for this page -->
<link href="{{ asset('assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@push('afterScripts')
<!-- Page level plugins -->
<script src="{{ asset('assets/sbadmin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('assets/sbadmin/js/demo/datatables-demo.js') }}"></script>
	
<script>
    $(function(){
        $('#dtable').DataTable();
    } );
</script>
@endpush