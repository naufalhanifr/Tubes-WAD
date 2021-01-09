@extends('admin.templates.default')
@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                Edit Profile {{ $admin->name }}
            </div>
            <div class="card-body">
                <form action="{{ route('update-profile') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" value="{{ $admin->email }}" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" value="{{ $admin->username }}" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" value="{{ $admin->name ?? old('name')}}" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">No. Hp</label>
                        <input type="text" value="{{ $admin->phone_number ?? old('phone_number') }}" name="phone_number" class="form-control">
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-2">
                            <img src="{{ $admin->photo() }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-lg-10">
                            <label for="">Foto</label>
                            <input type="file" name="avatar" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary float-right">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection