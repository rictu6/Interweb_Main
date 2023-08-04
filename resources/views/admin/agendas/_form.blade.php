<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label for="agenda_date">{{__('Date Of Agenda')}}</label>
            <div class="input-group form-group mb-3">
               
                <input type="text" class="form-control datepicker" placeholder="{{__('Date Of Agenda')}}"
                    name="agenda_date" required @if(isset($agenda)) value="{{$agenda['agenda_date']}}" @endif
                    readonly>
            </div>
        </div>
    </div>
       <div class="col-lg-12">
           <div class="form-group">
            <label for="name">{{__('Description')}}</label>
            <input type="text" placeholder="Description" name="name" id="name" class="form-control" @if(isset($agenda)) value="{{$agenda['name']}}" @endif required>
           </div>
        </div>
    
    
 
    
</div>
