<div class="row">
       <div class="col-lg-12">
           <div class="form-group">
            <label for="Description">{{__('Description')}}</label>
            <input type="text" placeholder="Description" name="div_desc" id="div_desc" class="form-control" @if(isset($division)) value="{{$division['div_desc']}}" @endif required>
           </div>
        </div>

        <div class="col-lg-12">
            <div class="form-group">
             <label for="acronym">{{__('Acronym')}}</label>
             <input type="text" placeholder="Acronym" name="div_acronym" id="acronym" class="form-control" @if(isset($division)) value="{{$division['div_acronym']}}" @endif required>
            </div>
         </div>

         {{-- <a href="{{url('img/reports_logo.png')}}" data-toggle="lightbox" data-title="Reports logo">
            <i class="fa fa-image"></i>
          </a> --}}

</div>
