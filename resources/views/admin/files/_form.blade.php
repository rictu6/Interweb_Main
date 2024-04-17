<div class="form-group">
    <label>{{__('Select Category')}}</label>
    {{-- @can('create_filecategory')
    <button type="button" class="btn btn-warning btn-sm float-right" data-toggle="modal"
        data-target="#filecategory_modal"><i class="fa fa-exclamation-triangle"></i> {{__('Not Listed ?')}}</button>
    @endcan --}}
    <select required class="form-control" name="cat_id" id="filecategory">
        @if(isset($file)&&isset($file['filecategory']))
        <option value="{{$file['filecategory']['cat_id']}}" selected>{{$file['filecategory']['cat_desc']}}</option>
        @endif
    </select>
</div>
<div class="form-group">
    <label for="name">{{__('Reference Number')}}</label>
    <input type="text" placeholder="Reference Number" name="ref_num" id="ref_num" class="form-control" @if(isset($file))
        value="{{$file['ref_num']}}" @endif>
</div>
<div class="form-group">
    <label for="name">{{__('Description')}}</label>
    <input type="text" placeholder="Description" name="file_desc" id="file_desc" class="form-control" @if(isset($file))
        value="{{$file['file_desc']}}" @endif required>
</div>
<div class="form-group">
    <label for="name">{{__('Title/Subject')}}</label>
    <input type="text" placeholder="Title/Subject" name="title_subject" id="title_subject" class="form-control"
        @if(isset($file)) value="{{$file['title_subject']}}" @endif required>
</div>
<div class="form-group">
    <label for="images" class="drop-container">
        <span class="drop-title">Drop files here</span>
        or
        <input type="file" name="file">
    </label>
</div>
<script type="application/javascript">
</script>