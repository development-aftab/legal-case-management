@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'TypeOfMatter') }}</h3>
                    @can('view-'.str_slug('TypeOfMatter'))
                    <a  class="btn btn_black pull-right" href="{{url('/typeOfMatter/type-of-matter')}}"><i class="icon-arrow-left-circle"></i> {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Back') }}</a>
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

                    <form id="typeofmatter_form" method="POST" action="{{ url('/typeOfMatter/type-of-matter') }}" accept-charset="UTF-8"
                          class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include ('typeOfMatter.type-of-matter.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function(){
            $("#typeofmatter_form").validate({
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