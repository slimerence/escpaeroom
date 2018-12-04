@extends(_get_frontend_theme_path('admin.layout.backend'))

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
        </div>
        <!-- /.row -->

        @include(_get_frontend_theme_path('admin.elements.topnotice'))
        <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-clock-o fa-fw"></i> Coming Reservations
                        <span class="table-control">
                            <button id="btn-show-all-children" class="btn btn-success" type="button">Expand All</button>
                            <button id="btn-hide-all-children" class="btn btn-primary" type="button">Collapse All</button>
                        </span>
                    </div>

                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Reservation Time</th>
                                <th>Game</th>
                                <th>#</th>
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
                            @foreach($comingreservations as $key=>$reservation)
                                <tr class="odd gradeX">
                                    <td>{{ $reservation->at->format('D H:i m-d Y') }}</td>
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
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-8 -->
            <div class="col-lg-4">
                <!-- /.panel -->
                <div class="chat-panel panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-comments fa-fw"></i> Contact
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu slidedown">
                                <li>
                                    <a href="{{ url('admin/home') }}">
                                        <i class="fa fa-refresh fa-fw"></i> Refresh
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/home') }}">
                                        <i class="fa fa-gear fa-fw"></i> Manage
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('logout') }}">
                                        <i class="fa fa-sign-out fa-fw"></i> Sign Out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <ul class="chat">
                            @foreach($leads as $lead)
                            <li class="left clearfix">
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <?php $createtime = $lead->created_at;
                                        $difference = $createtime->diffForHumans();
                                        ?>
                                        <strong class="primary-font">{{ $lead->name }}</strong>
                                        <small class="pull-right text-muted">
                                            <i class="fa fa-clock-o fa-fw"></i> &nbsp;{{ $difference }}
                                        </small>
                                        <div class="caption">
                                            <span><strong>phone:</strong>{{ $lead->phone }}</span>
                                            <span style="float: right;"><strong>email:</strong>{{ $lead->email }}</span>
                                        </div>
                                    </div>
                                    <p style="margin-top: 0.5em;">{{$lead->message}}
                                    </p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.panel-footer -->
                </div>
                <!-- /.panel .chat-panel -->
                <div class="chat-panel panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-comments fa-fw"></i> Franchise
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <ul class="chat">
                            @foreach($franchises as $lead)
                                <li class="left clearfix">
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <?php $createtime = $lead->created_at;
                                            $difference = $createtime->diffForHumans();
                                            ?>
                                            <strong class="primary-font">{{ $lead->name }}</strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> &nbsp;{{ $difference }}
                                            </small>
                                            <div class="caption">
                                                <span><strong>phone:</strong>{{ $lead->phone }}</span>
                                                <span style="float: right;"><strong>email:</strong>{{ $lead->email }}</span>
                                            </div>
                                            @if(isset($lead->money)&& $lead->money !='')
                                                <div class="caption">
                                                    <span><strong>estimated budget:</strong>{{ $lead->money }}</span>
                                                </div>
                                            @endif
                                        </div>
                                        <p style="margin-top: 0.5em;">{{$lead->message}}
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.panel-footer -->
                </div>
            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
@endsection