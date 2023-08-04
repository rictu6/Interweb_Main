<div class="row">
    <div class="col-lg-12">
      <div class="form-group">
        <label for="name">{{__('Name')}}</label>
        <input type="text" class="form-control" name="name" id="name" @if(isset($module)) value="{{$module->name}}" @endif required>
      </div>
    </div>
   
   
  
    
</div>
