<div class="modal fade" id="filecategory_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">{{__('Create File Category')}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="{{route('ajax.create_filecategory')}}" method="POST" id="create_filecategory">
            @csrf
            <div class="text-danger" id="filecategory_modal_error"></div>
            <div class="modal-body" id="create_filecategory_inputs">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            {{-- <label for="create_cat_desc">{{__('Name')}}</label>
                            <input type="name" id="create_filecategory_cat_desc" name="cat_desc" placeholder="{{__('Category Description')}}" class="form-control" required> --}}
                            <input type="name" id="cat_id" name="cat_desc" placeholder="{{__('Category Description')}}" class="form-control" required>
                       
                       
                       
                       
                          </div> 
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('Close')}}</button>
                <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
            </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>