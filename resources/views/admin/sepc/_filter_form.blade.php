<div id="accordion">
    <div class="card card-info">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="btn btn-primary collapsed"
            aria-expanded="false">
            <i class="fas fa-filter"></i> {{__('Filters')}}
        </a>
        <div id="collapseOne" class="panel-collapse in collapse show">
            <div class="card-body">
                <form method="get" action="{{route('admin.inventory_report.property_issued_registry')}}">
                    <div class="row">

                        <div class="col-lg-3">
                            <div class="form-group">
                              <label for="filter_date">{{__('Date')}}</label>
                              <input type="text" class="form-control datepickerrange" id="filter_date" placeholder="{{__('Date')}}">
                           </div>
                         </div>
                         {{-- <div class="col-lg-3">
                            <div class="form-group">
                               <label for="filter_status">{{__('Status')}}</label>
                               <select name="filter_status" id="filter_status" class="form-control select2">
                                  <option value="" selected>{{__('All')}}</option>
                                  <option value="done">{{__('Done')}}</option>
                                  <option value="ongoing">{{__('Ongoing')}}</option>
                               </select>
                            </div>
                          </div> --}}

                        <!-- Show in report -->
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label for="">{{__('Show Details')}}</label>
                            <ul class="pl-0" style="list-style-type: none">
                                <li>
                                    <input type="checkbox" name="show_csr1" id="show_csr1"
                                        @if(request()->has('show_csr1')) checked @endif>
                                    <label for="show_csr1">{{__('Show CSR1')}}</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="show_expenses" id="show_expenses"
                                        @if(request()->has('show_expenses')) checked @endif>
                                    <label for="show_expenses">{{__('Show Expenses')}}</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="show_profit" id="show_profit"
                                        @if(request()->has('show_profit')) checked @endif>
                                    <label for="show_profit">{{__('Show Profit')}}</label>
                                </li>
                            </ul>
                        </div>
                        <!-- \Show in report -->

                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 d-flex align-items-center">
                            <button type="submit" class="btn btn-primary form-control">
                                <i class="fas fa-cog"></i>
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
