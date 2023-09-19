@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'KingCounsel') }}</h3>
                    @can('view-'.str_slug('KingCounsel'))
                    <a  class="btn btn_black pull-right" href="{{url('/kingCounsel/king-counsel')}}"><i class="icon-arrow-left-circle"></i> {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Back') }}</a>
                    @endcan

                    <div class="clearfix"></div>
                    <hr>
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form id="king_counsel_form" method="POST" action="{{ url('/kingCounsel/king-counsel') }}" accept-charset="UTF-8"
                          class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include ('kingCounsel.king-counsel.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function(){
            $("#king_counsel_form").validate({
                // Specify validation rules
                rules: {
                    name: "required",
                },
                messages: {
                    name: {
                        required: "Please enter Name",
                    },
                },
            });
        });
    </script>
@endpush