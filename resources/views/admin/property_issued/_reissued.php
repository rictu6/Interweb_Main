<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">


            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="re_issued_qty">Quantity</label>
                            <div class="input-group form-group mb-3">
                                <input type="number" class="form-control" name="re_issued_qty" id="" min="0"
                                    @if(isset($property_issued)) value="" @endif >

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="re_issued_office">Office/Officer</label>
                            <input type="text" class="form-control" name="re_issued_office" id="" @if(isset($property_issued))
                                value="" @endif >
                        </div>
                    </div>
                </div>
                <hr>

            </div>
        </div>
    </div>
</div>
