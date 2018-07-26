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
                    </div>

                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <ul class="timeline">
                            @foreach( $comingreservations as $key=>$comingreservation )
                                <li class="{{ $key%2 ==0 ? '':'timeline-inverted' }}">
                                    <div class="timeline-badge info"><i class="fa fa-check"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">{{ substr($comingreservation->at,0,16) }} for {{ $comingreservation->product->name }}</h4>
                                            <?php $createtime = $comingreservation->created_at;
                                                $diff = $createtime->diffForHumans();
                                            ?>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> &nbsp;{{ $diff }}</small></p>
                                        </div>
                                        <div class="timeline-body">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12"><p><span style="font-weight: bold;">name:</span>{{ $comingreservation->name }}</p></div>
                                                <div class="col-md-6 col-sm-12"><p><span style="font-weight: bold;">participants:</span>{{ $comingreservation->participants }}</p></div>
                                                <div class="col-sm-12"><p><span style="font-weight: bold;">phone:</span>{{ $comingreservation->phone }}</div>
                                                <div class="col-sm-12"><p><span style="font-weight: bold;">email:</span>{{ $comingreservation->email }}</div>
                                                @if($comingreservation->message && $comingreservation->message!='')
                                                    <div class="col-sm-12"><p><span style="font-weight: bold;">message:</span>{{ $comingreservation->message }}</div>
                                                @endif
                                            </div>
                                            <hr>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fa fa-gear"></i> <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="{{ url('admin/reservations/edit/'.$comingreservation->id) }}">Edit</a>
                                                    </li>
                                                    <li><a href="{{ url('admin/reservations/delete/'.$comingreservation->id) }}">Cancel</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-8 -->
            <div class="col-lg-4">
                <!-- /.panel -->
                <div class="chat-panel panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-comments fa-fw"></i> Leads
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
                                    </div>
                                    <p>{{$lead->message}}
                                    </p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.panel-footer -->
                </div>
                <!-- /.panel .chat-panel -->
            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
@endsection