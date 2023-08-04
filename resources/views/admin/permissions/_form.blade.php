<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label for="name">{{__('Name')}}</label>
            <input type="text" class="form-control" name="name" id="name" @if(isset($permission))
                value="{{$permission->name}}" @endif required>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="form-group">
            <label for="name">{{__('Key')}}</label>
            <input type="text" class="form-control" name="key" id="key" @if(isset($permission))
                value="{{$permission->key}}" @endif required>
        </div>
    </div>
   

    <div class="col-lg-12">
        <div class="form-group">
            <label>{{__('Module')}}</label>
           

            <select class="form-control" name="id" id="module">
                @if(isset($permission)&&isset($permission['module']))
                    <option value="{{$permission['module']['id']}}" selected>{{$permission['module']['name']}}</option>
                @endif
            </select>

        
            
        </div> 
    </div>


    

</div>