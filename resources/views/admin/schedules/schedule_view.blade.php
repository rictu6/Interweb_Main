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
    <h3 class="card-title">{{__('View Schedules')}}</h3>
    @can('create_schedule')
  
    @endcan
  </div>
  
  <div class="card-body">
    <div class="row table-responsive">
      <div class="col-12">
        <table id="schedules_table" class="table table-striped table-hover table-bordered"  width="100%">
          <thead>
            <tr>
             
             
              <th  width="150px">{{__('What')}}</th>
              <th width="150px">{{__('Date Range')}}</th>
              <th  width="150px">{{__('Time Range')}}</th>
              <th  width="150px">{{__('Where')}}</th>
              <th >{{__('Who')}}</th>
             
             
            </tr>
          </thead>
             <tbody>

{{--         
            <tr>
              <td>{{$users->title}}</td>
              <td>{{date('d-M-Y', strtotime($users->start)) . "   " . "TO" . "   " .date('d-M-Y', strtotime($users->end)) }}</td>
               <td>{{date('h:i A', strtotime($users->time_start))            . "   " . "TO" . "   " .date('h:i A', strtotime($users->time_end)) }}</td>
              <td>{{$users->venue}}</td>
                 @foreach($roles as $data) 
  <td>{{$data->attendee_name}}</td>
  @endforeach
            </tr>
             --}}
         
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

@endsection
@section('scripts')
    <script src="{{url('js/admin/schedules _view.js')}}"></script>
  
@endsection