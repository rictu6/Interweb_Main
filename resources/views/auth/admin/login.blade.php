@extends('layouts.auth')
@section('title')
  {{__('Login Panel')}}
@endsection
@section('content')

<form action="{{route('admin.auth.login_submit')}}" method="post" class="validate-form">

    <span class="login100-form-title p-b-43">
        {{__('Login')}}
    </span>

    <div class="wrap-input100 validate-input @if($errors->has('user_name')) error-validation @endif">
        <input class="input100" type="text" name="user_name" id="user_name" value="{{old('user_name')}}" required>
        <span class="focus-input100"></span>
        <span class="label-input100">{{__('User Name')}}</span>
    </div>

    <div class="wrap-input100 validate-input @if($errors->has('password_hash')) error-validation @endif">
        <input class="input100" type="password" name="password_hash" id="password_hash" required>
        <span class="focus-input100"></span>
        <span class="label-input100">{{__('Password')}}</span>
    </div>

    <div class="flex-sb-m w-full p-t-3 p-b-32">
        <div class="contact100-form-checkbox">
            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
            <label class="label-checkbox100" for="ckb1">
                {{__('Remember Me')}}
            </label>
        </div>

        <div>
            <a href="{{route('admin.reset.mail')}}" class="txt1">
                {{__('Forgot Password?')}}
            </a>
        </div>
    </div>


    <div class="container-login100-form-btn">
        <button class="login100-form-btn" type="submit">
            {{__('Login')}}
        </button>
    </div>


</form>


@endsection

@section('scripts')
<script src="{{url('js/admin/disableInspectElecment.js')}}"></script>
<script src="{{url('js/admin/preventbackbutton.js')}}"></script>
@endsection
