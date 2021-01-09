@extends('admin.templates.default')
@section('content')
<div class="row">
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">Edit User {{ $item->username }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('user.update', $item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" value="{{ $item->name ?? old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" value="{{ $item->username ?? old('username') }}">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ $item->email ?? old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" value="{{ old('password') }}">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Nomor Hp</label>
                        <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Nomor Hp" value="{{ $item->phone_number ?? old('phone_number') }}">
                        @error('phone_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" class="form-control" id="level">
                            <option value="" selected disabled>--Pilih Level--</option>
                            <option @if($item->level === 'administrator') selected @endif value="administrator">Administrator</option>
                            <option @if($item->level === 'user') selected @endif value="user">User</option>
                        </select>
                        @error('level')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <img src="{{ $item->photo() }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-9">
                            <label for="avatar">Foto Baru</label>
                            <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror">
                            @error('avatar')
                                <div class="invalid-feedback d-inline">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
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