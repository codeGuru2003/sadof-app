@extends('layouts.app')
@section('content')
<h3>List of Members</h3>
<a href="{{ route('members.create') }}" class="btn btn-primary text-light">Create</a>
<br><br>
<div class="card mb-5">
    <div class="card-body">
        <div class="container-fluid">
            <div class="row">
                {{-- <div class="col-sm-4">
                    <form action="{{ route('members.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                            <input type="file" class="form-control" name="csv_file" id="inputGroupFileAddon04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" accept=".csv,.txt">
                            <input class="btn btn-success" type="submit" value="Upload" id="inputGroupFileAddon04">
                        </div>
                    </form><br>
                </div> --}}
                {{-- <div class="col-sm-2">
                    <form action="{{ route('members.export') }}" method="GET">
                        <button class="btn btn-success">Export Members</button>
                    </form>
                </div> --}}
                <div class="col-sm-6">
                    <form action="#" method="GET">
                        <div class="input-group w-100">
                            <span class="input-group-text">From and To</span>
                            <input name="startDate" type="date" aria-label="from" class="form-control">
                            <input name="endDate" type="date" aria-label="to" class="form-control">
                            <input class="btn btn-success" type="submit" value="Search" id="inputGroupFileAddon04">
                        </div>
                    </form><br>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped nowrap" id="membersTable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Position</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; ?>
                    @foreach ($members as $member)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $member->firstname }}</td>
                            <td>{{ $member->middlename }}</td>
                            <td>{{ $member->lastname }}</td>
                            <td>{{ $member->gname }}</td>
                            <td>{{ $member->pname }}</td>
                            <td><a href="mailto:{{ $member->email }}">{{ $member->email }}</a></td>
                            <td>
                               <div class="row">
                                    <div class="col-4 col-md-4 col-sm-4">
                                        <a href="{{ route('members.edit',['id' => $member->id ]) }}" class="btn btn-warning w-100"><i class="fas fa-edit text-light"></i></a>
                                    </div>
                                    <div class="col-4 col-md-4 col-sm-4">
                                        <a href="{{ route('members.details',['id' => $member->id ]) }}" class="btn btn-primary w-100"><i class="fas fa-book"></i></a>
                                    </div>
                                    <div class="col-4 col-md-4 col-sm-4">
                                        <form action="{{ route('members.delete',['id' => $member->id ]) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-danger w-100"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                               </div>
                            </td>
                            <?php $count++; ?>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script text="text/javascript">
    $(document).ready( function () {
        $('#membersTable').DataTable();
    });
</script>
@endsection
