<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
                <h5 class="card-title">
                    {{__('Account Information')}}
                </h5>
            </div>
            <div class="card-body">
                <label for="user_name">{{__('Username')}}</label>
                <div class="input-group mb-3">
                    {{-- <div class="input-group-prepend">
                        <span class="input-group-text">

                        </span>
                    </div> --}}

                    <input type="text" class="form-control" placeholder="{{__('Username')}}" name="user_name"
                       readonly value="{{auth()->guard('admin')->user()->user_name}}" required>

                </div>
                <label for="email">{{__('Email Address')}}</label>
                <div class="input-group mb-3">
                    {{-- <div class="input-group-prepend">
                        <span class="input-group-text">

                        </span>
                    </div> --}}


                    <input type="email" class="form-control" placeholder="{{__('Email Address')}}" name="email"
                        value="{{auth()->guard('admin')->user()->email}}" required>
                </div>
                <label for="Password">{{__('Password')}}</label>
                <div class="input-group mb-3">
                    {{-- <div class="input-group-prepend">
                        <span class="input-group-text">

                        </span>
                    </div> --}}

                    <input type="password" class="form-control" placeholder="{{__('Password')}}" name="password_hash"
                        id="password_hash">
                </div>
                <label for="Password">{{__('Password')}}</label>
                <div class="input-group mb-3">
                    {{-- <div class="input-group-prepend">
                        <span class="input-group-text">

                        </span>
                    </div> --}}

                    <input type="password" class="form-control" placeholder="{{__('Password Confirmation')}}"
                        name="password_confirmation" id="password_confirmation">
                </div>


            </div>
        </div>
    </div>
</div>

