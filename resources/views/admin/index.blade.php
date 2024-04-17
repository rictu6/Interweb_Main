@extends('layouts.app')

@section('title')
{{__('Dashboard')}}
@endsection

@section('css')
<link rel="stylesheet" href="{{url('plugins/swtich-netliva/css/netliva_switch.css')}}">

@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="nav-icon fas fa-th"></i>
                    {{__('Dashboard')}}
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">{{__('Dashboard')}}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection
@section('content')

@can('admin')
<div class="slideshow-container">
    <div class="mySlides fade">
        <div class="numbertext"></div>
        <img src="slider/slider0.jpg" style="width:100%">

    </div>
    <div class="mySlides fade">
        <div class="numbertext"></div>
        <img src="slider/slider1.jpeg" style="width:100%">

    </div>
    <div class="mySlides fade">
        <div class="numbertext"></div>
        <img src="slider/slider2.jpg" style="width:100%">

    </div>
    <div class="mySlides fade">
        <div class="numbertext"></div>
        <img src="slider/slider3.jpg" style="width:100%">

    </div>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next_1" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>
<div style="text-align:center">
    <span class="dot" onclick="currentSlide(0)"></span>
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
</div>


</div>
{{-- Top Menu Start --}}


{{-- Top Menu End --}}
<br>



<!-- Admin Reports -->
<div class="row">
    <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$divisions_count}}</h3>
                <p>{{__('Divisions')}}</p>
            </div>
            <div class="icon">
                <i class="fas fa-file-contract nav-icon"></i>
            </div>
            <a href="{{route('admin.divisions.index')}}" class="small-box-footer">{{__('More info')}} <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- ./col -->


    <!-- ./col -->
    <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$positions_count}}</h3>
                <p>{{__('Positions')}}</p>
            </div>
            <div class="icon">
                <i class="fas fa-file-contract nav-icon"></i>
            </div>
            <a href="{{route('admin.positions.index')}}" class="small-box-footer">{{__('More info')}} <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$offices_count}}</h3>
                <p>{{__('Offices')}}</p>
            </div>
            <div class="icon">
                <i class="fas fa-file-contract nav-icon"></i>
            </div>
            <a href="{{route('admin.offices.index')}}" class="small-box-footer">{{__('More info')}} <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$sections_count}}</h3>
                <p>{{__('Sections')}}</p>
            </div>
            <div class="icon">
                <i class="fas fa-file-contract nav-icon"></i>
            </div>
            <a href="{{route('admin.sections.index')}}" class="small-box-footer">{{__('More info')}} <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$muncits_count}}</h3>
                <p>{{__('Municipality')}}</p>
            </div>
            <div class="icon">
                <i class="fas fa-file-contract nav-icon"></i>
            </div>
            <a href="{{route('admin.muncits.index')}}" class="small-box-footer">{{__('More info')}} <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$empstatuss_count}}</h3>
                <p>{{__('Employee Status')}}</p>
            </div>
            <div class="icon">
                <i class="fas fa-file-contract nav-icon"></i>
            </div>
            <a href="{{route('admin.empstatuss.index')}}" class="small-box-footer">{{__('More info')}} <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$provinces_count}}</h3>
                <p>{{__('Province')}}</p>
            </div>
            <div class="icon">
                <i class="fas fa-file-contract nav-icon"></i>
            </div>
            <a href="{{route('admin.provinces.index')}}" class="small-box-footer">{{__('More info')}} <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$permissions_count}}</h3>
                <p>{{__('Permission')}}</p>
            </div>
            <div class="icon">
                <i class="fas fa-file-contract nav-icon"></i>
            </div>
            <a href="{{route('admin.permissions.index')}}" class="small-box-footer">{{__('More info')}} <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$roles_count}}</h3>
                <p>{{__('Roles')}}</p>
            </div>
            <div class="icon">
                <i class="fas fa-file-contract nav-icon"></i>
            </div>
            <a href="{{route('admin.roles.index')}}" class="small-box-footer">{{__('More info')}} <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$modules_count}}</h3>
                <p>{{__('Modules')}}</p>
            </div>
            <div class="icon">
                <i class="fas fa-file-contract nav-icon"></i>
            </div>
            <a href="{{route('admin.modules.index')}}" class="small-box-footer">{{__('More info')}} <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$filecategories_count}}</h3>
                <p>{{__('File Categories')}}</p>
            </div>
            <div class="icon">
                <i class="fas fa-file-contract nav-icon"></i>
            </div>
            <a href="{{route('admin.filecategories.index')}}" class="small-box-footer">{{__('More info')}} <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- today statistics -->

</div>
<div class="row">
    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box bg-primary">
          <span class="info-box-icon"><i class="fa fa-list"></i></span>
  
          <div class="info-box-content">
            <span class="info-box-text">{{__('Users')}}</span>
            <span class="info-box-number">{{$users_count}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box bg-primary">
          <span class="info-box-icon"><i class="fa fa-list"></i></span>
  
          <div class="info-box-content">
            <span class="info-box-text">{{__('FTA')}}</span>
            <span class="info-box-number">{{$FTAs_count}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box bg-primary">
          <span class="info-box-icon"><i class="fa fa-list"></i></span>
  
          <div class="info-box-content">
            <span class="info-box-text">{{__('Legal Opinion')}}</span>
            <span class="info-box-number">{{$files_count}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
</div>
@endcan

<div class="row">
    <div class="col-lg-12 table-responsive">
        <div class="card card-danger">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-bell"></i> {{__('Anouncements')}}
                </h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body table-responsive">
                <marquee class="product-list-in-card pl-2 pr-2">There is no announcements yet.</marquee>
            </div>
        </div>

    </div>
</div>

<!-- Today scheduled visits -->
<div class="row">
    <div class="col-lg-12 table-responsive">
        <div class="card card-danger">
          <div class="card-header">
            <h5 class="card-title">
              <i class="fas fa-bell"></i> {{__('Upcoming & Ongoing Activities')}}  ( {{count($upcoming_events)}} )
            </h5>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body table-responsive">
            @if(count($upcoming_events))
            <table class="table table-striped">
              {{-- <thead>
                <tr>
                   <th>{{__('Title')}}</th>
                   <th>{{__('Venue')}}</th>
                   <th>{{__('Start')}}</th>
                   <th>{{__('End')}}</th>
                  
                </tr>
              </thead> --}}
              <tbody>
                @foreach($upcoming_events as $event)
                <tr>
                  <td>
                   
                      {{$event['title']}}
                  
                  </td>
                  <td>
                  
                      {{$event['venue']}}
                
                  </td>
                  <td>
                 
                      {{$event['start']}}
                  
                  </td>
                  <td>
                  
                      {{$event['end']}}
                  
                  </td>
                  {{-- <td>
                    @if(isset($visit['patient']))
                      {{$visit['patient']['phone']}}
                    @endif
                  </td>
                  <td>
                    @if(isset($visit['patient']))
                      {{$visit['patient']['address']}}
                    @endif
                  </td>
                  <td>
                    @if(isset($visit['patient']))
                      {{$visit['patient']['dob']}}
                    @endif
                  </td>
                  <td>
                    @if(isset($visit['patient']))
                      {{$visit['visit_date']}}
                    @endif
                  </td>
                  <td>
                    @if($visit['status'])
                      <input type="checkbox" id="change_status" visit-id="{{$visit['id']}}" checked netliva-switch data-active-text="{{__('Completed')}}" data-passive-text=" {{__('Pending visit')}}"/>
                    @else 
                      <input type="checkbox" id="change_status" visit-id="{{$visit['id']}}" netliva-switch data-active-text="{{__('Completed')}}" data-passive-text=" {{__('Pending visit')}}"/>
                    @endif
                  </td>
                  <td width="100px">
                    @can('view_visit')
                      <a href="{{route('admin.visits.show',$visit['id'])}}" class="btn btn-primary btn-sm">
                        <i class="fa fa-eye"></i>
                      </a>
                    @endcan
                  </td> --}}
                </tr>
                @endforeach
              </tbody>
             
            </table>
            @else 
              <p class="text-danger text-center">{{__('No data available')}}</p>
            @endif
          </div>
        </div>
         
    </div>
  </div>
  <!-- /Today scheduled visits -->
@can('view_online_users')
<!-- Online Users -->
<div class="row">
    <div class="col-lg-12 table-responsive">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-wifi"></i> {{__('Online users')}} ( <span
                        class="online_count">0</span> )</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body pt-0 pb-0">
                <ul class="products-list product-list-in-card pl-2 pr-2 online_list">
                </ul>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
<!-- \Online Users -->
@endcan

@endsection

@section('scripts')
<!-- Switch -->
<script src="{{url('plugins/swtich-netliva/js/netliva_switch.js')}}"></script>
<script src="{{url('js/admin/dashboard.js')}}"></script>
<script src="{{url('js/admin/slider.js')}}"></script>


@endsection