@extends('admin.templates.default')

@section('content')
<div class="row">
    <div class="col-lg-12">
        @empty($spot)
            Kosong!
        @endempty
    </div>
</div>

<div class="row">
    @foreach ($spot as $item)
    
    <div class="col-lg-3">
        <div class="card m-1 @if($item->status == 0) bg-success @else  bg-danger @endif" style="width: 18rem;min-height: 200px;">
            <div class="card-body text-center">
                <div style="font-size: 60px;">
                    {{ $item->nomor }}
                </div>
                @if ($item->status == 0)
                    <p class="badge badge-light p-1 pr-2 pl-2" style="font-size: 15px;">Tersedia</p>
                    <a href="{{ route('booking-spot', $item->id) }}" class="btn btn-sm btn-primary d-block">Pesan</a>
                @else
                    <p class="badge badge-light p-1 pr-2 pl-2" style="font-size: 15px;">Tidak Tersedia</p>
                    <a href="#" class="btn btn-sm btn-primary d-block disabled">Pesan</a>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
