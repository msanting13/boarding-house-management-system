@extends('admin.layouts.app')
@section('page-title', 'Manage Landlord')
@section('page-heading', 'Manage Landlord')
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item">Landlords</li>
        <li class="breadcrumb-item active">Manage Landlord</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('templates.error')
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Landlords</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="landlordsDataTable">
                            <thead>
                                <tr>
                                    <th>First name</th>
                                    <th>Middle name</th>
                                    <th>Last name</th>
                                    <th>Email</th>
                                    <th>Contact number</th>
                                    {{-- <th>Address</th> --}}
                                    <th>Date updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('page-js-scripts')
<script>
    $(function () {
        $("#landlordsDataTable").DataTable({
        "lengthMenu": [ [5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"] ],
        "columnDefs": [
            {
            "orderable": false, "targets": [6]
            },
            {
            targets:5, render:function(data){
            return moment(data).format('MMM DD, YYYY h:mm A');
            }
        }],
        "order": [[ 5, "desc" ]],
        "processing": true,
        "serverSide": true,
        "ajax":{
            "url": "{{ route('admin.landlord.datasource') }}",
            "type": "POST",
            "data":{ _token: "{{csrf_token()}}"}
        },
        "columns": [
                {data: 'given_name', name: 'given_name'},
                {data: 'middle_name', name: 'middle_name'},
                {data: 'family_name', name: 'family_name'},
                {data: 'email', name: 'email'},
                {data: 'contact_number', name: 'contact_number'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'action', name: 'action'}
        ],
        "initComplete": function () {
        }
        });
    });
</script>
@endpush