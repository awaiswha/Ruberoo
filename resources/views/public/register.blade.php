<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>User Registration</title>

  <meta name="description" content="">
  <meta name="author" content="">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

  <!-- BEGIN CORE CSS -->
  {{ Html::style('assets/admin1/css/admin1.css') }}
  {{ Html::style('assets/globals/css/elements.css') }}
  <!-- END CORE CSS -->

  <!-- BEGIN PLUGINS CSS -->
  {{ Html::style('assets/globals/plugins/bootstrap-social/bootstrap-social.css') }}
  <!-- END PLUGINS CSS -->

  <!-- FIX PLUGINS -->
  {{ Html::style('assets/globals/css/plugins.css') }}
  <!-- END FIX PLUGINS -->

  <!-- BEGIN SHORTCUT AND TOUCH ICONS -->
  {{ Html::style('assets/globals/img/icons/favicon.ico') }}
  {{ Html::style('assets/globals/img/icons/apple-touch-icon.png') }}
  <!-- END SHORTCUT AND TOUCH ICONS -->
  {{ Html::script('assets/globals/plugins/modernizr/modernizr.min.js') }}
</head>
<body class="bg-login printable">

  <div class="login-screen">
    <div class="panel-login blur-content">
      <div class="panel-heading"><img src="{{url('assets/globals/img/teamfox.png')}}" height="100" alt=""></div><!--.panel-heading-->

      <form action="{{url('public/registration')}}" method="post" id="register">
        <input id="token" name="_token" type="text" value="{{csrf_token()}}" hidden>
      <div id="pane-create-account" class="panel-body active">
        <h2>Create a New Account</h2>
        <div class="form-group">
          <div class="inputer">
            <div class="input-wrapper">
              <input type="text" name="first_name" id="first_name" value="{{old('first_name')}}" class="form-control" placeholder="First Name">
            </div>
          </div>
        </div><!--.form-group-->
        <div class="form-group">
          <div class="inputer">
            <div class="input-wrapper">
              <input type="text" name="last_name" id="last_name" value="{{old('last_name')}}" class="form-control" placeholder="Last Name">
            </div>
          </div>
        </div><!--.form-group-->
        <div class="form-group">
          <div class="inputer">
            <div class="input-wrapper">
              <input type="text" name="user_name" value="{{old('user_name')}}" class="form-control" placeholder="User Name">
            </div>
          </div>
        </div><!--.form-group-->
        <div class="form-group">
          <div class="inputer">
            <div class="input-wrapper">
              <select name="user_type" class="form-control">
                <option>Select Your Professional</option>
                <option value="3" @if(old('user_type') == '3') {{'selected'}} @endif >Seller</option>
                <option value="4" @if(old('user_type') == '4') {{'selected'}} @endif >Buyer</option>
              </select>
            </div>
          </div>
        </div><!--.form-group-->
        <div class="form-group">
          <div class="inputer">
            <div class="input-wrapper">
              <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control" placeholder="Email">
            </div>
          </div>
        </div><!--.form-group-->
        <div class="form-group">
          <div class="inputer">
            <div class="input-wrapper">
              <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Password">
            </div>
          </div>
        </div><!--.form-group-->
        <div class="form-buttons clearfix">
          <a href="{{url('/')}}" class="btn btn-white pull-left show-pane-login">Login</a>
          <button class="btn btn-success pull-right register">Sign Up</button>
        </div><!--.form-buttons-->
      </div><!--#login.panel-body-->

      </form>

    </div><!--.blur-content-->
  </div><!--.login-screen-->

  <div class="bg-blur dark">
    <div class="overlay"></div><!--.overlay-->
  </div><!--.bg-blur-->

  <!-- BEGIN GLOBAL AND THEME VENDORS -->
  {{ Html::script('assets/globals/js/global-vendors.js') }}
  <!-- END GLOBAL AND THEME VENDORS -->

  <!-- BEGIN PLUGINS AREA -->
  <!-- END PLUGINS AREA -->

  <!-- PLUGINS INITIALIZATION AND SETTINGS -->
  {{ Html::script('assets/globals/scripts/user-pages.js') }}
  <!-- END PLUGINS INITIALIZATION AND SETTINGS -->

  <!-- PLEASURE Initializer -->
  {{ Html::script('assets/globals/js/pleasure.js') }}
  <!-- ADMIN 1 Layout Functions -->
  {{ Html::script('assets/admin1/js/layout.js') }}

  <!-- BEGIN INITIALIZATION-->
  <script>
  $(document).ready(function () {
    Pleasure.init();
    Layout.init();
    UserPages.login();
  });
  </script>
  <!-- END INITIALIZATION-->

  <!-- BEGIN Google Analytics -->
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', Pleasure.settings.ga.urchin, Pleasure.settings.ga.url);
    ga('send', 'pageview');


    $(document).ready(function(){

        $('.register').on('click', function(e){
          e.preventDefault();

          var email = $('#email').val();

          if(email != ""){

            $.ajax({
            type: "get",
              url: '{{ url("check_email")}}/'+email,
              dataType: ''
            }).success(function(res) {
              console.log(res);
              if(res == '0'){

                $('#email').css('border', '1px solid green');

                $('#register').submit();

              }else{

                $('#email').css('border', '1px solid red');
                $('#email').val("");
                $('#email').attr('placeholder', 'Email Already Register');

              }

            });

          }


        });

      });

  </script>
  <!-- END Google Analytics -->

</body>
</html>