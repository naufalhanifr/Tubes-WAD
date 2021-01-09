@extends('admin.templates.default')
@section('content')
<div class="row">
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">Metode Pembayaran</div>
            <div class="card-body">
                @foreach ($pembayaran as $item)
                    <table class="table table-borderless">
                        <tr>
                            <th>{{ $item->nama }}</th>
                            <td>{{ $item->nomor }}</td>
                        </tr>
                    </table>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">Upload Bukti Pembayaran</div>
            <div class="card-body">
                <form action="{{ route('transaksi.upload.update', $transaksi->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="">Bukti</label>
                        <input type="file" class="form-control @error('bukti_pembayaran') is-invalid @enderror" name="bukti_pembayaran">
                        @error('bukti_pembayaran')
                            <div class="invalid-feedback d-inline">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-sm btn-block btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection