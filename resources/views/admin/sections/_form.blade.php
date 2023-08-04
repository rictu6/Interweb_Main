<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label for="name">{{__('Description')}}</label>
            <input type="text" placeholder=" Description" name="sec_desc" id="sec_desc" class="form-control" @if(isset($section)) value="{{$section['sec_desc']}}" @endif required>
       

      
           
            <div class="form-group">
                    <label>{{__('Office')}}</label> 
                    <!-- @can('create_office')
                        <button type="button" class="btn btn-warning btn-sm float-right"  data-toggle="modal" data-target="#office_modal"><i class="fa fa-exclamation-triangle"></i> {{__('Not Listed ?')}}</button>
                    @endcan -->
                    <select class="form-control" name="office_id" id="office">
                        @if(isset($section)&&isset($section['office']))
                            <option value="{{$section['office']['office_id']}}" selected>{{$section['office']['office_desc']}}</option>
                        @endif
                    </select>
               
            </div>
           




           <div class="form-group">
                    <label>{{__('Division')}}</label> 
                    <!-- @can('create_office')
                        <button type="button" class="btn btn-warning btn-sm float-right"  data-toggle="modal" data-target="#office_modal"><i class="fa fa-exclamation-triangle"></i> {{__('Not Listed ?')}}</button>
                    @endcan -->
                    <select class="form-control" name="div_id" id="division">
                        @if(isset($section)&&isset($section['division']))
                            <option value="{{$section['division']['div_id']}}" selected>{{$section['division']['div_desc']}}</option>
                        @endif
                    </select>
               
            </div>

            
           
    </div>
    
    
 
    
</div>
