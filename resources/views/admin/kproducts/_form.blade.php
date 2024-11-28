<div class="row">

    <div class="form-group">
        <label for="images" class="drop-container">
            <span class="drop-title">Drop files here</span>
            or
            <input type="file" name="file" required>
        </label>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="property_type">KP Title</label>
            <select class="form-control" name="property_type_id" id="propertyType" required>
                @if(isset($property_type)&&isset($property_type['property_type_id']))
                <option value="{{$property_type['property_type_id']}}" selected>
                    {{$property_type['property_type_description']}}
                </option>
                @endif
            </select>
        </div>
    </div>
    <div class="col-lg-6">
        <label for="">KP Author</label>
        <div class="form-group">
            <input type="text" class="form-control" name="entity_name" id="" @if(isset($property_issued))
                value="{{$property_issued->entity_name}}" @endif required>
        </div>
    </div>


    <div class="col-lg-6">
        <div class="form-group">
            <label for="property_type">Publication Date</label>
            <select class="form-control" name="property_type_id" id="propertyType" required>
                @if(isset($property_type)&&isset($property_type['property_type_id']))
                <option value="{{$property_type['property_type_id']}}" selected>
                    {{$property_type['property_type_description']}}
                </option>
                @endif
            </select>
        </div>
    </div>
    <div class="col-lg-6">
        <label for="">Select KP Type</label>
        <div class="form-group">
            <input type="text" class="form-control" name="entity_name" id="" @if(isset($property_issued))
                value="{{$property_issued->entity_name}}" @endif required>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="property_type">KP Description</label>
            <select class="form-control" name="property_type_id" id="propertyType" required>
                @if(isset($property_type)&&isset($property_type['property_type_id']))
                <option value="{{$property_type['property_type_id']}}" selected>
                    {{$property_type['property_type_description']}}
                </option>
                @endif
            </select>
        </div>
    </div>
    <div class="col-lg-6">
        <label for="images" class="drop-container">
            <span class="drop-title">Drop image here</span>
            or
            <input type="file" accept = 'image/jpeg , image/jpg, image/gif, image/png' name="pic_emp" >
          </label>
    </div>


</div>

<div class="col-lg-2">
    <div class="card card-primary">
        <div class="card-header">
            <h5 class="card-title" style="text-align: center!important;float: unset;">
                {{__('Profile Image')}}
            </h5>
        </div>

        <div class="card-body p-1">
            <img class="img-thumbnail"
                src="@if(!empty(auth()->guard('admin')->user()->pic_emp)){{url('uploads/signature/'.auth()->guard('admin')->user()->pic_emp)}} @else {{url('img/no-image.png')}} @endif"
                alt="{{__('pic_emp')}}">

        </div>
        {{-- <div id="pic_emp_data" data-pic_emp="@auth {{ auth()->guard('admin')->user()->pic_emp }} @else null @endauth" style="display: none;"></div> --}}
    </div>
</div>
</div>

<div class="row">
<div class="col-lg-2">

    <div class="input-group form-group mb-3">
        <div class="input-group-prepend">
            {{-- <span class="input-group-text">
                <i class="fas fa-image" aria-hidden="true"></i>
            </span> --}}
        </div>
        {{-- <div class="custom-file">
            <input type="file" accept = 'image/jpeg , image/jpg, image/gif, image/png' class="custom-file-input" id="exampleInputFile" name="pic_emp">
            <label class="custom-file-label" for="exampleInputFile">{{__('')}}</label>
            <input type="file"  name="file" >
        </div> --}}


        <label for="images" class="drop-container">
            <span class="drop-title">Drop image here</span>
            or
            <input type="file" accept = 'image/jpeg , image/jpg, image/gif, image/png' name="pic_emp" >
          </label>





    </div>

</div>
</div>
