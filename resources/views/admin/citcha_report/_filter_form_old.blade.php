<div id="accordion">
    <div class="card card-info">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="btn btn-primary collapsed"
            aria-expanded="false">
            <i class="fas fa-filter"></i> {{__('Filters')}}
        </a>
        <div id="collapseOne" class="panel-collapse in collapse show">
            <div class="card-body">
                <form method="get" action="{{route('admin.citcha_report.generate_report')}}">
                    <div class="row">

                        <div class="col-lg-3">
                            <div class="form-group">
                              <label for="filter_service">{{__('Service Type')}}</label>
                              <select class="form-control" name="service" id="filter_service" required>
                                @if(isset($ors)&&isset($ors['service']))
                                <option value="{{$ors['service']['service_id']}}" selected>{{$ors['service']['description']}}
                                </option>
                                @endif
                            </select>
                           </div>
                         </div>
                         <div class="col-lg-3">
                            <div class="form-group">
                              <label for="filter_month">{{__('Month')}}</label>
                              <select   id="filter_month"
                              class="form-control" name='month'>
                                <option value="">Month</option>
                                  <option value="01">January</option>
                                   <option value="02">February</option>
                                   <option value="03">March</option>
                                   <option value="04">April</option>
                                   <option value="05">May</option>
                                   <option value="06">June</option>
                                   <option value="07">July</option>
                                   <option value="08">August</option>
                                   <option value="09">September</option>
                                   <option value="10">October</option>
                                   <option value="11">November</option>
                                   <option value="12">December</option>
                                   </select>
                            </div>
                          </div>

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
