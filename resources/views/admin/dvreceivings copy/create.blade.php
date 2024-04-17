@extends('layouts.app')

@section('title')
{{ __('Encode DV') }}
@endsection

@section('css')
<link rel="stylesheet" href="{{url('plugins/datetimepicker/css/jquery.datetimepicker.min.css')}}">
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fa fa-home"></i>
                    {{__('DV')}}
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.orsheaders.index')}}">{{__('FDMS Dashboard')}}</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.dvreceivings.index')}}">{{ __('DV Receiving Listing') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ __('Encode DV') }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ __('Create DV ') }}</h3>
    </div>
    <!-- /.card-header -->
    <form method="POST" action="{{route('admin.dvreceivings.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="col-lg-12">
                @include('admin.dvreceivings._form')
            </div>
        </div>
        <div class="card-footer">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-check"></i> {{__('Save')}}
                </button>
            </div>
        </div>
    </form>
    <!-- /.card-body -->
</div>



@endsection
@section('scripts')

<script src="{{url('plugins/datetimepicker/js/jquery.datetimepicker.full.js')}}"></script>
<script src="{{url('js/admin/disableInspectElecment.js')}}"></script>
<script src="{{url('js/admin/dvreceivings.js')}}"></script>
@endsection
