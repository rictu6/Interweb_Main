@extends('layouts.app')

@section('title')
{{__('Schedules')}}
@endsection

@section('breadcrumb')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">
          <i class="fa fa-cogs nav-icon"></i>
          {{__('Schedules')}}
        </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
          <li class="breadcrumb-item active">{{__('Schedules')}}</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<div class="card card-primary card-outline">
  <div class="card-header">
    <h3 class="card-title">{{__('Schedules Table')}}</h3>
    @can('create_schedule')
    <a href="{{route('admin.schedules.create')}}" class="btn btn-primary btn-sm float-right">
     <i class="fa fa-plus"></i> {{__('Create')}}
    </a>
    @endcan
  </div>
  {{-- <!-- /.card-header @if(isset($user)&&$user['is_drafted']==1&&isset($user)&&$user['is_submitted']==0) selected display  @else hidden @endif --> --}}
  <div class="card-body">
    <div class="row table-responsive">
      <div class="col-12">
   
        <table id="schedules_table" class="table table-striped table-hover table-bordered"  width="100%" >
          <thead>
            <tr>
              <th>#</th>
              <th>{{__('Posted By')}}</th>
              {{-- <th>{{__('Posted Date')}}</th> --}}
              <th>{{__('Title')}}</th>
              <th>{{__('Venue')}}</th>
              {{-- <th>{{__('Office')}}</th>
              <th width="50px">{{__('Division')}}</th>
              <th>{{__('Section')}}</th>
              <th>{{__('Position')}}</th> --}}
              <th>{{__('Start Date')}}</th>
              <th>{{__('End Date')}}</th>
              <th>{{__('Start Time')}}</th>
              <th>{{__('End Time')}}</th>
              <th>{{__('Attendee')}}</th>
                   <th>{{__('Encoder Submitted/Drafted')}}</th>
                <th>{{__('SRMU Action')}}</th>
                  <th>{{__('RDs Action')}}</th>
                    <th>{{__('Event Status')}}</th>
                
                     <th>{{__('Remarks')}}</th>
              <th>{{__('Action')}}</th>
            </tr>
          </thead>
          
          <tbody>

            {{-- @foreach($file as $data)
            <tr>
              <td>{{$data->id}}</td>
              <td>{{$data->file}}</td>
              <td>{{$data->ref_num}}</td>
              <td>{{$data->file_desc}}</td>
              <td>{{$data->title_subject}}</td>
              <td><a href="{{url('/download',$data->file)}}">Download</a></td>
            </tr> --}}
            
          
          </tbody>
        </table>
       
      </div>
    </div>
  </div>
  <!-- /.card-body -->
</div>

@endsection
@section('scripts')
  <script src="{{url('js/admin/schedules.js')}}"></script>
  {{-- <script src="{{url('js/admin/disableInspectElecment.js')}}"></script> --}}
@endsection