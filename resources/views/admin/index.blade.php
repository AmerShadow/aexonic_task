@extends('layouts.layout')
@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12 text-left">
                <a href="{{ route('users.create') }}" class=" btn btn-sm btn-primary"><i class="fa fa-plus"></i> Create
                    New
                </a><br>
            </div>
        </div>
        <div class="animated fadeIn">
            <div class="row">
                @include('partials.alerts')
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">User Table</strong>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>SR NO</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Phone</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Country</th>
                                        <th>PinCode</th>
                                        <th>Profile Picture</th>
                                        <td>status</td>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($users as $row)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->role }}</td>
                                            <td>{{ $row->phone }}</td>
                                            <td>{{ $row->city }}</td>
                                            <td>{{ $row->state }}</td>
                                            <td>{{ $row->country }}</td>
                                            <td>{{ $row->pin_code }}</td>

                                            @if ($row->provider_id)
                                                <td><a href="{{ $row->profile_picture }}"><img
                                                            src="{{ $row->profile_picture }}" width="100" height="100"
                                                            target="blank"></a>
                                                </td>
                                            @else
                                                <td>
                                                    <a href="{{ asset('uploads/userimage/' . $row->profile_picture) }}"
                                                        target="blank">
                                                        <img src="{{ asset('uploads/userimage/' . $row->profile_picture) }}"
                                                            width="100" height="100">
                                                    </a>
                                                </td>
                                            @endif
                                            <td>{{ $row->status ? 'Activated' : 'Blocked' }}</td>

                                            <td>
                                                <a href="{{ route('users.edit', $row->id) }}" class="label  "><i
                                                        class="fa fa-edit fa-1x" style="color: #000"></i> </a>
                                                <a href="{{ route('users.delete', $row->id) }}"
                                                    onclick="return confirm('Are you sure you want to delete this item?');"
                                                    class="label bg-red-active"><i class="fa fa-trash  fa-1x"
                                                        style="color: #000"></i> </a>

                                                @if ($row->status == true)
                                                    <a href="{{ route('users.status', $row->id) }}" class="label  "><i
                                                            class="btn btn-primary">Deactivate</i> </a>
                                                @else
                                                    <a href="{{ route('users.status', $row->id) }}" class="label  "><i
                                                            class="btn btn-primary">Activate</i> </a>

                                                @endif
                                                {{-- <a href="{{route('users.show',$row->id)}}"><span class="label "><i class="fa fa-eye  fa-1x" style="color: #000"></i>&ensp;</span></a> --}}
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- .animated -->
    </div>
    <script src="{{ asset('js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('js/init/datatables-init.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        });
    </script>

@endsection
