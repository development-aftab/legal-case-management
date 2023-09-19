@extends('layouts.master')
@push('css')
<link href="{{asset('plugins/components/custom-select/custom-select.css')}}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
<section class="">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Edit {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Client') }} #{{ $client->id }}</h3>
                    @can('view-'.str_slug('Client'))
                        <a class="btn btn_black pull-right" href="{{ url('/client/client') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
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

                    <form method="POST" action="{{ url('/client/client/' . $client->id) }}" accept-charset="UTF-8" class="form-horizontal row dashboard_form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        @include ('client.client.form', ['submitButtonText' => 'Update'])

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>    
@endsection
@push('js')
<script >
    jQuery("input[type='file']").on("change", function(e){
        var fileName = e.target.files[0].name;
        console.log(fileName);
        jQuery(this).next().children().text( fileName );
    });
</script>


@endpush