<div class="row">
<div class="col-lg-12">
           <div class="form-group">
            <label for="name">{{__('Description')}}</label>
            <input type="text" placeholder="Description" name="pos_desc" id="pos_desc" class="form-control" @if(isset($position)) value="{{$position['pos_desc']}}" @endif required>
           </div>
           <div class="form-group">
            <label for="name">{{__('Salary')}}</label>
            <input type="text" placeholder="Salary" name="salary" id="salary" class="form-control" @if(isset($position)) value="{{$position['salary']}}" @endif required>
           </div>
           <div class="form-group">
            <label for="name">{{__('Salary Grade')}}</label>
            <input type="text" placeholder="Salary Grade" name="salary_grade" id="salary_grade" class="form-control" @if(isset($position)) value="{{$position['salary_grade']}}" @endif required>
           </div>
           
        </div>
    
    
 
    
</div>
