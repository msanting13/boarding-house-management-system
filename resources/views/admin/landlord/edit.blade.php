@extends('admin.layouts.app')
@section('page-title', 'Edit Landlord')
@section('page-heading', 'Edit Landlord')
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item">Landlords</li>
        <li class="breadcrumb-item active">Edit</li>
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
                  <h3 class="card-title">Edit Landlord Information</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('admin.update.landlord', [$landlord->id, 'type' => 'information']) }}" method="POST" role="form">
                    @csrf
                    @method('PATCH') 
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="firstName">First name</label>
                                    <input type="text" class="form-control @error('given_name') is-invalid @enderror" id="firstName" name="given_name" value="{{ old('given_name', $landlord->given_name) }}" placeholder="Enter First name">
                                    @error('given_name')
                                        <span class="feedback-invalid" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="middleName">Middle name</label>
                                    <input type="text" class="form-control @error('middle_name') is-invalid @enderror" id="middleName" name="middle_name" value="{{ old('middle_name', $landlord->middle_name) }}" placeholder="Enter middle name">
                                    @error('middle_name')
                                        <span class="feedback-invalid" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="lastName">Last name</label>
                                    <input type="text" class="form-control @error('family_name') is-invalid @enderror" id="lastName" name="family_name" value="{{ old('middle_name', $landlord->family_name) }}" placeholder="Enter last name">
                                    @error('family_name')
                                        <span class="feedback-invalid" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="contactNumber">Contact number</label>
                                    <input type="text" class="form-control @error('contact_number') is-invalid @enderror" id="contactNumber" name="contact_number" value="{{ old('contact_number', $landlord->contact_number) }}">
                                    @error('contact_number')
                                        <span class="feedback-invalid" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $landlord->address) }}">
                                    @error('address')
                                        <span class="feedback-invalid" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $landlord->email) }}" placeholder="Enter email">
                                    @error('email')
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
        <div class="col-md-4">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Photo</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('admin.update.landlord', [$landlord->id, 'type' => 'photo']) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        @if (!is_null($landlord->photo))
                            <img src="/storage/users/landlords/{{ $landlord->photo }}" class="img-fluid rounded-circle img-thumbnail mx-auto d-block" width="100">
                        @endif
                        <div class="form-group">
                            <div class="custom-file mt-3">
                                <input type="file" class="custom-file-input  @error('photo') is-invalid @enderror" id="customFile" name="photo">
                                <label class="custom-file-label" for="customFile">Choose photo</label>
                            </div>
                            @error('photo')
                                <span class="feedback-invalid" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection