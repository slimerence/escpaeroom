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
                        The Text Shown On <a href="{{ url('pricing') }}" target="_blank">Pricing Page</a>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                @include(_get_frontend_theme_path('pages.elements.alert'))
                            </div>
                            <div class="col-lg-12">
                                <form role="form" action="{{ url('admin/info')}}" method="post" id="UpdateForm">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label data-error="wrong" data-success="right" for="book-group" class="font-weight-bold">Display</label>
                                        <select name="info[display]" id="display">
                                            <option value="0" {{ $info->display==0? 'selected':'' }}>No</option>
                                            <option value="1" {{ $info->display==1? 'selected':'' }}>Yes</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <p>Content</p>
                                        <textarea rows="6" class="textarea form-control rich-text-editor" id="booking-message" name="info[content]">{{ $info->content }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-default btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->
@endsection