@extends('admin.templates.default')

@section('content')
<div class="row">
  @foreach ($lokasi as $item)
  <div class="col-lg-3">
    <div class="card m-1" style="width: 18rem;">
      <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="..." height="250">
      <div class="card-body">
        <h5 class="card-title">{{ $item->nama }}</h5>
        <p class="card-text">{{ $item->alamat }}</p>
        <div class="text-center">
          {{-- <a href="{{ route('spot',$item->id) }}" class="btn btn-block btn-primary">Lihat Spot</a> --}}
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection