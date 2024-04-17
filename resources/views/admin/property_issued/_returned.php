<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">


            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="returned_qty">Quantity</label>
                            <div class="input-group form-group mb-3">
                                <input type="number" class="form-control" name="returned_qty" id="" min="0"
                                    @if(isset($property_issued)) value="" @endif >

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="returned_office">Office/Officer</label>
                            <input type="text" class="form-control" name="returned_office" id="" @if(isset($property_issued))
                                value="" @endif >
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="issued_qty">Disposed Quantity</label>
                            <div class="input-group form-group mb-3">
                                <input type="number" class="form-control" name="disposed_qty" id="" min="0"
                                    @if(isset($property_issued)) value="" @endif >

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="issued_qty">Balance Quantity</label>
                            <div class="input-group form-group mb-3">
                                <input type="number" class="form-control" name="balance_qty" id="" min="0"
                                    @if(isset($property_issued)) value="" @endif >

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
