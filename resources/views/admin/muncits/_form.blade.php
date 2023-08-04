<div class="row">
<div class="col-lg-12">
<div class="form-group">
            <label for="name">{{__('Description')}}</label>
            <input type="text" placeholder="Description" name="muncit_desc" id="muncit_desc" class="form-control" @if(isset($muncit)) value="{{$muncit['muncit_desc']}}" @endif required>
           </div>
           <div class="form-group">
            <label for="name">{{__('Region Code')}}</label>
            <input type="text" placeholder="Region Code" name="reg_code" id="reg_code" class="form-control" @if(isset($muncit)) value="{{$muncit['reg_code']}}" @endif required>
           </div>
           <div class="form-group">
            <label for="name">{{__('Province Code')}}</label>
            <input type="text" placeholder="Province Code" name="prov_code" id="prov_code" class="form-control" @if(isset($muncit)) value="{{$muncit['prov_code']}}" @endif required>
           </div>
           <div class="form-group">
            <label for="name">{{__('PSGC')}}</label>
            <input type="text" placeholder="PSGC" name="psgc" id="psgc" class="form-control" @if(isset($muncit)) value="{{$muncit['psgc']}}" @endif required>
           </div>
           <div class="form-group">
            <label for="name">{{__('INC  Class')}}</label>
            <input type="text" placeholder="Class" name="inc_class" id="inc_class" class="form-control" @if(isset($muncit)) value="{{$muncit['inc_class']}}" @endif required>
           </div>
</div>
    
    
 
    
</div>
