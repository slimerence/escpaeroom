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
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Time</th>
                                <th>Game</th>
                                <th>Participants</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Operate</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reservations as $reservation)
                            <tr class="odd gradeX">
                                <td>{{ $reservation->at }}</td>
                                <td>{{ $reservation->product->name }}</td>
                                <td>{{ $reservation->participants }}</td>
                                <td class="center">{{ $reservation->name }}</td>
                                <td class="center">{{ $reservation->phone }}</td>
                                <td>
                                    <a href="{{ url('admin/reservations/edit/'.$reservation->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="{{ url('admin/reservations/delete/'.$reservation->id) }}"><i class="fa fa-trash-o"></i></a>
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