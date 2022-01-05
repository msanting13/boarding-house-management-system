@extends('admin.layouts.app')
@section('page-title', $landlord->full_name)
@section('page-heading', 'Profile')
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item">Landlords</li>
        <li class="breadcrumb-item active">Profile</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="/storage/users/landlords/{{ $landlord->photo }}" alt="{{ $landlord->full_name }}">
                    </div>
                    <h3 class="profile-username text-center">Nina Mcintire</h3>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->

        <div class="col-md-9">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Basic Information</h3>
                </div>
                <div class="card-body p-2">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>First name</th>
                                <td>{{ $landlord->given_name }}</td>
                            </tr>
                            <tr>
                                <th>Middle name</th>
                                <td>{{ $landlord->middle_name }}</td>
                            </tr>
                            <tr>
                                <th>Last name</th>
                                <td>{{ $landlord->family_name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $landlord->email }}</td>
                            </tr>
                            <tr>
                                <th>Contact number</th>
                                <td>{{ $landlord->contact_number }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $landlord->address }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('page-js-scripts')
<script>
</script>
@endpush