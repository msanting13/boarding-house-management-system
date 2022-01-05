@extends('admin.layouts.app')
@section('page-title', 'Change Password')
@section('page-heading', 'Change Password')
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item">Landlords</li>
        <li class="breadcrumb-item active">Change Password</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
        @include('templates.success')
        @include('templates.error')
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Change {{ $landlord->full_name }} Password</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('admin.change-password.landlord', $landlord->id) }}" method="POST" role="form">
                    @csrf
                    @method('PATCH') 
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="password">New Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter new password">
                                    @error('password')
                                        <span class="feedback-invalid" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection