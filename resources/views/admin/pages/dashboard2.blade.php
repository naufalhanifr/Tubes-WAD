@extends('admin.templates.default')

@section('content')
@if (session('success'))
<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Sukses!</strong> {{ session('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
</div>
@endif
<div class="row">
    @foreach ($lokasi as $item)
    <div class="col-lg-3">
        <div class="card m-1" style="width: 18rem;">
            <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="..." height="250">
            <div class="card-body">
              <h5 class="card-title">{{ $item->nama }}</h5>
              <p class="card-text">{{ $item->alamat }}</p>
              <div class="text-center">
                <a href="{{ route('spot-lokasi',$item->id) }}" class="btn btn-block btn-primary">Lihat Spot</a>
              </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection