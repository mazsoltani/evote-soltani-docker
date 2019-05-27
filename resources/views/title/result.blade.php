@extends('layouts.app')
@section('content')
    <div class="container ">
        <div class="card-columns d-flex justify-content-center">
            <div class="card col-sm-12">
                <h5 class="mt-3 mb-5">Voting</h5>
                @if (isset($alert))
                    <div class="alert alert-success small alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {!! $alert !!}.
                    </div>
                @endif
                @if (isset($error))
                    <div class="alert alert-danger small alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {!! $error !!}.
                    </div>
                @endif
                <form method="POST" action="{{ url('vote/result1') }}" id="form">
                    {{csrf_field()}}
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Title</label>
                            <select name="vid" id="vid" class="form-control">
                                @foreach($votes as $key => $value)
                                    <option value="{{ $key }}" {{ old('vid') == $key ? 'selected' : ''}}>{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-primary mb-5">search</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function () {
            $('#vid').on('change', function () {
                var vid = $(this).val();
                var token = $('meta[name="csrf-token"]').attr('content');
                if (vid) {
                    $.ajax({
                        method: 'get',
                        url: '/findchoices/' + vid,
                        data: {'vid': vid},
                        success: function (data) {
                            if (data) {
                                $('#loc').empty();
                                $('#loc').focus;
                                $('#loc').append('<option value="">-- Select  --</option>');
                                $.each(data, function (key, value) {
                                    $('#loc').append('<option value="' + key + '">' + value + '</option>');
                                });
                            } else {
                                $('#loc').empty();
                            }
                        }
                    });
                } else {
                    $('#loc').empty();
                }
            });
        });
    </script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $('#starttime').datepicker({ dateFormat: "yy-mm-dd"}).val();
        $('#endtime').datepicker({  dateFormat: "yy-mm-dd" }).val();
    </script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script type="text/javascript">
        $("#form").validate({
            rules: {
                uname: {required: true},
                ustate: {required: true},
                usity: {required: true},
                usummermax: {digits: true},
                uwintermin: {digits: true},
                uwrank: {digits: true},
                ucrank: {digits: true}
            }
        });
    </script>
@endsection
