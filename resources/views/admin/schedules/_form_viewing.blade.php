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
    @can('view_encoder_schedule')
    <a href="{{route('admin.schedules.create')}}" class="btn btn-primary btn-sm float-right">
     <i class="fa fa-plus"></i> {{__('Create')}}
    </a>
    @endcan
    @endcan
  </div>
  {{-- <!-- /.card-header @if(isset($user)&&$user['is_drafted']==1&&isset($user)&&$user['is_submitted']==0) selected display  @else hidden @endif --> --}}
  <div class="card-body">
   
      <div class="col-12">
    
        <table class="table table-striped table-hover table-bordered"  width="100%" >
          <thead>
            <tr>
             <th>{{__('Title')}}</th>
              <th>{{__('Venue')}}</th>
              <th>{{__('Date')}}</th>
              <th>{{__('Time')}}</th>
              <th>{{__('Attendees')}}</th>
                <th>{{__('Status')}}</th>
           
                   
            </tr>
          </thead>
          
          <tbody>

            @foreach($scheduleuser as $data)
            <tr>
              <td>{{$data->title}}</td>
              <td>{{$data->venue}}</td>
              <td>{{date('M-d-Y', strtotime($data->start)) }} to {{date('M-d-Y', strtotime($data->end))}}</td>
              <td>{{date('h:i A', strtotime($data->time_start))}} to {{date('h:i A', strtotime($data->time_end))}}</td>
              <td>{{$data->attendee_name}}</td>
                <td>{{$data->status3}}</td>
             
            </tr>
            
            @endforeach
          </tbody>
        </table>
       
      </div>
  
  </div>
  <!-- /.card-body -->
</div>

@endsection
@section('scripts')
  <script src="{{url('js/admin/schedules_view.js')}}"></script>
  {{-- <script src="{{url('js/admin/disableInspectElecment.js')}}"></script> --}}
  
@endsection
