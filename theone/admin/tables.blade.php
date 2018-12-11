@extends(_get_frontend_theme_path('admin.layout.backend'))

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ $pageTitle }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Reservations
                        <span class="table-control">
                            <button id="btn-show-all-children" class="btn btn-success" type="button">Expand All</button>
                            <button id="btn-hide-all-children" class="btn btn-primary" type="button">Collapse All</button>
                        </span>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Reservation Time</th>
                                <th>Game</th>
                                <th>Participants</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Order#</th>
                                <th>Status</th>
                                <th>Message</th>
                                <th>Note</th>
                                <th>Operate</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reservations as $key=>$reservation)
                                <tr class="odd gradeX">
                                    <td>{{ $reservation->at->format('Y-m-d H:i D') }}</td>
                                    <td>{{ $reservation->product->name }}</td>
                                    <td>{{ $reservation->participants }}</td>
                                    <td class="center">{{ $reservation->name }}</td>
                                    <td class="center">{{ $reservation->phone }}</td>
                                    <td class="center">{{ $reservation->transaction_number }}</td>
                                    <td class="center">
                                        @switch($reservation->status )
                                            @case(1)
                                            Pending
                                            @break

                                            @case(3)
                                            Complete
                                            @break

                                            @case(5)
                                            Host
                                            @break

                                            @default
                                            No Fee
                                        @endswitch
                                    </td>
                                    <td>
                                        {{ $reservation->message }}
                                    </td>
                                    <td>
                                        {{ $reservation->notes }}
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/reservations/edit/'.$reservation->id) }}" class="btn btn-success"><i class="fa fa-pencil-square-o fa-fw"></i> Update</a>
                                        <a href="{{ url('admin/reservations/delete/'.$reservation->id) }}" class="btn btn-danger"><i class="fa fa-trash-o fa-fw"></i>Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /#page-wrapper -->
@endsection