function doLogin() 
{
  var _token = $('input[name="_token"]').val();
  var email = $('input[name="user_name"]').val();
  var password = $('input[name="password_hash"]').val();

  var cookieName = 'XSRF-TOKEN';

  document.cookie = cookieName + "=" + _token 
      + ";domain=.website.test;path=/";

  $.ajax({
      headers: {
          'XSRF-TOKEN': _token
      },
      url: 'http://hrmis.region6.dilg.gov.ph',
      type: 'POST',
      data: {"_token": _token, "user_name": email, "password_hash": password},
      cache: false,
      success: function (response) {
          alert(response);
      },
      error: function () {
          //
      }
  });

}
