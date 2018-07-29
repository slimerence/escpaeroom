@extends(_get_frontend_theme_path('admin.layout.backend'))

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ $pageTitle }}</h1>
            </div>
        </div>
        <div class="row mx-auto">
            <div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create a period for blocking reservations
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                @include(_get_frontend_theme_path('pages.elements.alert'))
                            </div>
                            <div class="col-lg-6">
                                <form role="form" action="{{ url('admin/reservations/block')}}" method="post" id="UpdateForm">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="booking-time">Game</label>
                                        <select class="custom-select book-input" id="booking-room" name="blockreservation[product_id]">
                                            @foreach($promotionProducts as $key=>$promotionProduct)
                                                <option value="{{ $promotionProduct->id }}">{{ $promotionProduct->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" id="booking-date" class="form-control validate book-input" name="blockreservation[date]" required>
                                        <p class="help-block">Please check date manually before you change!</p>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="booking-time">From</label>
                                                <input type="time" id="start-time" step="1800" class="form-control validate book-input" name="blockreservation[start]">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="booking-time">To</label>
                                                <input type="time" id="end-time" step="1800" class="form-control validate book-input" name="blockreservation[end]">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-default btn-primary">Submit Button</button>
                                </form>
                            </div>
                            <div class="col-lg-12" style="margin-top: 20px;">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Maintenance Record
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Game</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Create Time</th>
                                                <th>Operate</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($maintains as $maintain)
                                                <tr class="odd gradeX">
                                                    <td>{{ $maintain->date }}</td>
                                                    <td>{{ $maintain->product->name }}</td>
                                                    <td>{{ $maintain->start }}</td>
                                                    <td>{{ $maintain->end }}</td>
                                                    <td class="center">{{ $maintain->created_at }}</td>
                                                    <td>
                                                        <a href="{{ url('admin/maintains/delete/'.$maintain->id) }}"><i class="fa fa-trash-o"></i></a>
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
                </div>
            </div>
        </div>

    </div>
    <!-- /#page-wrapper -->
@endsection