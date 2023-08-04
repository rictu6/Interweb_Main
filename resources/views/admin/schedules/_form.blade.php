
<div class="form-group">
    <label for="name">{{__('Posted By')}}</label>
 
    <input type="hidden" class="form-control" name="emp_id"  value="{{Auth::guard('admin')->user()->emp_id}}"  required>
    <input readonly type="text" class="form-control" placeholder="{{__('Posted By')}}" name="posted_by"  value="{{Auth::guard('admin')->user()->user_name}}"  required>
</div>

<div class="form-group">
    <label for="name">{{__('Posted Date')}}</label>
    <input readonly type="date" class="form-control" placeholder="{{__('Posted Date')}}" name="posted_date" value="<?php echo date('Y-m-d'); ?>"  required>
  
</div>


<div class="form-group">
    <label for="name">{{__('Title/Description')}}</label>
    <input type="text" placeholder="Title/Description" name="title" id="title" class="form-control" @if(isset($user))
        value="{{$user['title']}}" @endif required>
</div>
 
 
<div class="form-group">
    <label for="name">{{__('Venue')}}</label>
    <input type="text" placeholder="Venue" name="venue" id="venue" class="form-control" @if(isset($user))
        value="{{$user['venue']}}" @endif required>
</div>
 




<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">{{__('Hosted By')}}</h3>
    </div>
  
        <div class="card-body">
          

            <div class="row">
                <div class="col-lg-4">
                <div class="form-group">
                    <label>{{__('Select Office')}}</label>
                   
                
                    <select class="form-control" name="office_id" id="office" required>
                        @if(isset($user)&&isset($user['office']))
                            <option value="{{$user['office']['office_id']}}" selected>{{$user['office']['office_desc']}}</option>
                        @endif
                    </select>
                </div>
                </div>
                <div class="col-lg-4">
                <div class="form-group">
                    <label>{{__('Select Division')}}</label>
                    <select class="form-control" name="div_id" id="division" required>
                        @if(isset($user)&&isset($user['division']))
                            <option value="{{$user['division']['div_id']}}" selected>{{$user['division']['acronym']}}</option>
                        @endif
                    </select>
                
                  
                </div>
                </div>
                <div class="col-lg-4">
                <div class="form-group">
                    <label>{{__('Select Section')}}</label>
                    <select  class="form-control" name="sec_id" id="sec_id" >
                        @if(isset($user)&&isset($user['section']))
                        <option value="{{$user['section']['sec_id']}}" selected>{{$user['section']['sec_desc']}}</option>
                    @endif
                    </select>
                </div>
                </div>
                </div>





        </div>
      
       

</div>



<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">{{__('Select Attendees By Position')}}</h3>
    </div>
  
        <div class="card-body">
          


<div class="form-group">
    <label>{{__('Select Position')}}</label>
    <select  class="form-control" name="pos_id" id="position"  >
        @if(isset($user)&&isset($user['position']))
        <option value="{{$user['position']['pos_id']}}" selected>{{$user['position']['pos_desc']}}</option>
    @endif
    </select>
</div>


<div class="form-group">
    <label>{{__('Select Attendee/s')}}</label>
    <select name="roles[]" id="roles_assign" placeholder="{{__('Select Attendee/s')}}" class="form-control select2" multiple required>
        @foreach($roles as $role)
             <option  value="{{$role['emp_id']}}">{{$role['last_name']}}, {{$role['first_name']}} {{$role['middle_name']}}</option>
        @endforeach
     </select>





</div>

        </div>
      
       

</div>
















<div class="form-group">
    <label for="name">{{__('Color Description (Calendar)')}}</label>
    <input type="color" placeholder="Color" name="color" id="color" class="form-control" @if(isset($user))
        value="{{$user['color']}}" @endif required>
</div>
 
 

<div class="row">
    <div class="col-lg-6">
       <div class="form-group">
           <label for="datefrom">{{__('Start Date')}}</label>
               <div class="input-group mb-3">
                   <div class="input-group-prepend">
                     <span class="input-group-text" id="basic-addon1">
                       <i class="fas fa-calendar"></i>
                     </span>
                   </div>
                
                    

                    <input type="text" class="form-control datepicker" placeholder="{{__('Start Date')}}"
                    name="start" required @if(isset($user)) value="{{$user['start']}}" @endif
                    readonly>



               </div>
       </div>
   </div>

   <div class="col-lg-6">
       <div class="form-group">
           <label for="dateto">{{__('End Date')}}</label>
               <div class="input-group mb-3">
                   <div class="input-group-prepend">
                   <span class="input-group-text" id="basic-addon1">
                       <i class="fas fa-calendar"></i>
                   </span>
                   </div>
                   <input type="text" class="form-control datepicker" placeholder="{{__('End Date')}}"
                    name="end" required @if(isset($user)) value="{{$user['end']}}" @endif
                    readonly>

                  

               </div>
            </div>
        </div>
    </div>
{{-- 
<div class="row">
    <div class="col-lg-6">
       <div class="form-group">
           <label for="datefrom">
            {{__('Time From')}}
           </label>
               <div class="input-group mb-3">
                   <div class="input-group-prepend">
                     <span class="input-group-text" id="basic-addon1">
                       <i class="fas fa-clock"></i>
                     </span>
                   </div>
                   <input type="time" placeholder="time_from" name="time_from" id="time_from" class="form-control" @if(isset($user)) value="{{$user['time_from']}}" @endif required>
             
             
                </div>
        </div>
    </div>



   <div class="col-lg-6">
       <div class="form-group">
           <label for="dateto">{{__('Time To')}}</label>
               <div class="input-group mb-3">
                   <div class="input-group-prepend">
                   <span class="input-group-text" id="basic-addon1">
                       <i class="fas fa-clock"></i>
                   </span>
                </div>
                <input type="time" placeholder="time_to" name="time_to" id="time_to" class="form-control" @if(isset($user)) value="{{$user['time_to']}}" @endif required>
            </div>
       </div>
   </div>
</div> --}}
  
</div>


<script type="application/javascript">
</script>