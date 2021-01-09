@extends('admin.templates.default')
@section('content')
<div class="row">
    <div class="col-lg-6">
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
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                Profile {{ $admin->name }}
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img src="{{ auth()->user()->photo() }}" alt="" class="img-fluid rounded-circle" style="height:200px;width:200px;">
                    <h3 class="pt-2 pb-2">{{ Str::ucfirst($admin->level) }}</h3>
                </div>
                <table class="table table-borderless">
                    <tr>
                        <th>Nama</th>
                        <td>{{ $admin->name }}</td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>{{ $admin->username }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $admin->email }}</td>
                    </tr>
                    <tr>
                        <th>No. HP</th>
                        <td>{{ $admin->phone_number }}</td>
                    </tr>
                    <tr>
                        <th>Berabung</th>
                        <td>{{ $admin->created_at->translatedFormat('l, d F Y') }}</td>
                    </tr>
                </table>
                <a href="{{ route('edit-profile') }}" class="btn btn-info  float-right">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection