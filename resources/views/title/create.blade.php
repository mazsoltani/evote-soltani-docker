@extends('layouts.app')
@section('content')
    <div class="container ">
        <div class="card-columns d-flex justify-content-center">
            <div class="card col-sm-12">
                <h5 class="mt-3 mb-5">New Title</h5>
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
                <form method="POST" action="{{ url('vote/create1') }}" id="form">
                    {{csrf_field()}}
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Start time</label>
                            <input type="text" name="starttime" id="starttime" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">End Time</label>
                            <input type="text" name="endtime" id="endtime" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputPassword4" >List Of Choices</label>
                            <input type="text" class="form-control" name="loc1" id="loc1">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" name="loc2" id="loc2">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" name="loc3" id="loc3">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" name="loc4" id="loc4">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" name="loc5" id="loc5">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" name="loc6" id="loc6">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" name="loc7" id="loc7">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" name="loc8" id="loc8">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" name="loc9" id="loc9">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" name="loc10" id="loc10">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-primary mb-5">Insert</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection

@section('script')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $('#starttime').datepicker({ dateFormat: "yy-MM-dd"}).val();
        $('#endtime').datepicker({  dateFormat: "yy-MM-dd" }).val();
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
