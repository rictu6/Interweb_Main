@extends('layouts.appSchedule')

@section('title')
{{__('Edit Schedule')}}
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
                    <li class="breadcrumb-item"><a href="{{route('admin.schedules.index')}}">{{__('Schedules')}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{__('Edit schedule')}}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{__('Edit Schedule')}}</h3>
    </div>
    <!-- /.card-header -->
    <form method="POST" action="{{route('admin.schedules.update',$user->id)}}" enctype="multipart/form-data">
        <!-- /.card-header -->
        <div class="card-body">
            @csrf
            @method('put')
            <input type="hidden" id="user_roles" value="{{$user['roles']}}">
            <div class="card-body">
                <div class="col-lg-12">
                    @include('admin.schedules._form')
                </div>
            </div>
              <div class="card-footer">
               @can('view_encoder_schedule')
            <button type="submit" class="btn btn-primary" name="action" value="draft"  @if(isset($user)&&$user['is_submitted']==1) selected  hidden @endif >
              <i class="fa fa-check"></i> {{__('Save as Draft')}}
            </button>
            @endcan
              <button type="submit" class="btn btn-primary" name="action" value="submit" @if(isset($user)&&$user['status3']== "Conducted" ) selected
             selected hidden @endif >
              <i class="fa fa-check"></i> {{__('Submit')}}
            </button>
        </div>

    </form>

</div>

@endsection

@section('scripts')
  <script>
 

       var destinationInput2 = document.getElementById("statusSRMU");
      var appearDiv2 = document.getElementById("appearSRMURemarks");
  
      if (destinationInput2.value.toLowerCase() === "returned" ) {
        appearDiv2.style.display = "block";
      } 
      else if (destinationInput2.value.toLowerCase() === "reconsideration" ) {
        appearDiv2.style.display = "block";
      }
      else if (destinationInput2.value.toLowerCase() === "approval" ) {
         appearDiv2.style.display = "none";
      }
      else
      {
        appearDiv2.style.display = "none";
      }

    
  
      destinationInput2.addEventListener("input", function() {
        if (destinationInput2.value.toLowerCase() === "returned") {
          appearDiv2.style.display = "block";
        } 
         else if (destinationInput2.value.toLowerCase() === "reconsideration" ) {
        appearDiv2.style.display = "block";
      }
      else if (destinationInput2.value.toLowerCase() === "approval" ) {
       appearDiv2.style.display = "none";
      }
        else 
        {
          appearDiv2.style.display = "none";
        }
      });
    </script>
  


 <script>
  var destinationInput2 = document.getElementById("statusEncoder");
      var appearDiv2 = document.getElementById("appearEncoderRemarks");
  
      if (destinationInput2.value.toLowerCase() === "returned" ) {
        appearDiv2.style.display = "block";
      } 
      else if (destinationInput2.value.toLowerCase() === "reconsideration" ) {
        appearDiv2.style.display = "block";
      }
      else if (destinationInput2.value.toLowerCase() === "approval" ) {
         appearDiv2.style.display = "none";
      }
      else
      {
        appearDiv2.style.display = "none";
      }

     
  
      destinationInput2.addEventListener("input", function() {
        if (destinationInput2.value.toLowerCase() === "returned") {
          appearDiv2.style.display = "block";
        } 
         else if (destinationInput2.value.toLowerCase() === "reconsideration" ) {
        appearDiv2.style.display = "block";
      }
      else if (destinationInput2.value.toLowerCase() === "approval" ) {
       appearDiv2.style.display = "none";
      }
        else 
        {
          appearDiv2.style.display = "none";
        }
      });
    </script>










   <script>



       var destinationInput2 = document.getElementById("statusRD");
      var appearDiv2 = document.getElementById("appearRDRemarks");
  
      if (destinationInput2.value.toLowerCase() === "returned" ) {
        appearDiv2.style.display = "block";
      } 
      else if (destinationInput2.value.toLowerCase() === "reconsideration" ) {
        appearDiv2.style.display = "block";
      }
      else if (destinationInput2.value.toLowerCase() === "approval" ) {
         appearDiv2.style.display = "none";
      }
      else
      {
        appearDiv2.style.display = "none";
      }
  
      destinationInput2.addEventListener("input", function() {
        if (destinationInput2.value.toLowerCase() === "returned") {
          appearDiv2.style.display = "block";
        } 
         else if (destinationInput2.value.toLowerCase() === "reconsideration" ) {
        appearDiv2.style.display = "block";
      }
      else if (destinationInput2.value.toLowerCase() === "approval" ) {
       appearDiv2.style.display = "none";
      }
        else 
        {
          appearDiv2.style.display = "none";
        }
      });
    </script>
  



















 <script>
  var destinationInput = document.getElementById("status2RD");
      var appearDiv = document.getElementById("appearRDRemarks2");
  
      if (destinationInput.value.toLowerCase() === "disapproved" ) {
        appearDiv.style.display = "block";
      } 
      else if (destinationInput.value.toLowerCase() === "approved" ) {
        appearDiv.style.display = "none";
      }
    
      else
      {
        appearDiv.style.display = "none";
      }

     
      destinationInput.addEventListener("input", function() {
        if (destinationInput.value.toLowerCase() === "disapproved") {
          appearDiv.style.display = "block";
        } 
         else if (destinationInput.value.toLowerCase() === "approved" ) {
        appearDiv.style.display = "none";
      }
    
        else 
        {
          appearDiv.style.display = "none";
        }
      });
    </script>




    
 <script>
  

       var destinationInput = document.getElementById("status2Encoder");
      var appearDiv = document.getElementById("appearEncoderRemarks2");
  
      if (destinationInput.value.toLowerCase() === "disapproved" ) {
        appearDiv.style.display = "block";
      } 
      else if (destinationInput.value.toLowerCase() === "approved" ) {
        appearDiv.style.display = "none";
      }
    
      else
      {
        appearDiv.style.display = "none";
      }
  

  
      destinationInput.addEventListener("input", function() {
        if (destinationInput.value.toLowerCase() === "disapproved") {
          appearDiv.style.display = "block";
        } 
         else if (destinationInput.value.toLowerCase() === "approved" ) {
        appearDiv.style.display = "none";
      }
    
        else 
        {
          appearDiv.style.display = "none";
        }
      });
    </script>




    
 <script>
 
   var destinationInput = document.getElementById("status2SRMU");
      var appearDiv = document.getElementById("appearSRMURemarks2");
  
      if (destinationInput.value.toLowerCase() === "disapproved" ) {
        appearDiv.style.display = "block";
      } 
      else if (destinationInput.value.toLowerCase() === "approved" ) {
        appearDiv.style.display = "none";
      }
    
      else
      {
        appearDiv.style.display = "none";
      }
  
  
      destinationInput.addEventListener("input", function() {
        if (destinationInput.value.toLowerCase() === "disapproved") {
          appearDiv.style.display = "block";
        } 
         else if (destinationInput.value.toLowerCase() === "approved" ) {
        appearDiv.style.display = "none";
      }
    
        else 
        {
          appearDiv.style.display = "none";
        }
      });
    </script>





















<script src="{{url('js/admin/disableInspectElecment.js')}}"></script>
  <script src="{{url('js/admin/schedules.js')}}"></script>
 
@endsection
