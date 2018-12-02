<div class="panel-body">
    <ul class="timeline">
        @foreach( $comingreservations as $key=>$comingreservation )
            <li class="{{ $key%2 ==0 ? '':'timeline-inverted' }}">
                <div class="timeline-badge info"><i class="fa fa-check"></i></div>
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