@extends('admin.templates.default')
@section('content')
<div class="row">
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">Ubah Password</div>
            <div class="card-body">
                <form action="{{ route('update-password') }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="">Password Saat Ini</label>
                        <input type="password" name="password" class="form-control" placeholder="Password Saat Ini">
                        @if (session('failed'))
                            <div class="invalid-feedback">
                                {{ session('failed') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Password Baru</label>
                        <input type="password" name="password_baru" class="form-control" placeholder="Password Baru">
                    </div>
                    <div class="form-group">
                        <label for="">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary btn-block">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection