<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Administration</title>

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
  <style type="text/css">
    .signup{
      cursor: pointer;
      color: white;
    }
    .signup:hover{
      cursor: pointer;
      color: #5cb85c;
    }
  </style>
</head>
<body class="bg-login printable">

  <div class="login-screen">
    <div class="panel-login blur-content">
      <div class="panel-heading"><a href="{{url('/')}}"><img src="{{url('assets/globals/img/teamfox.png')}}" height="100" alt=""></a></div><!--.panel-heading-->
      <form action="{{url('public/login')}}" method="post" id="login">
        <input id="token" name="_token" type="text" value="{{csrf_token()}}" hidden>

      <div id="pane-login" class="panel-body active">
        <h2>Login to Dashboard</h2>
        <div class="form-group">
          <div class="inputer">
            <div class="input-wrapper">
              <input type="email" name="email" id="login_email" class="form-control" placeholder="Enter your email address" required="">
            </div>
          </div>
        </div><!--.form-group-->
        <div class="form-group">
          <div class="inputer">
            <div class="input-wrapper">
              <input type="password" name="password" class="form-control" placeholder="Enter your password" required="">
            </div>
          </div>
        </div><!--.form-group-->
        <div class="form-buttons clearfix">
          <label class="pull-left"><input type="checkbox" name="remember" value="1"> Remember me</label>
          <button class="btn btn-success pull-right login">Login</button>
        </div><!--.form-buttons-->
        </form>
        <ul class="extra-links">
          <li class="show-pane-forgot-password signup">Forgot your password</a></li>
        </ul>
      </div><!--#login.panel-body-->

      <div id="pane-forgot-password" class="panel-body">
        <h2>Forgot Your Password</h2>
        <div class="form-group">
          <div class="inputer">
            <div class="input-wrapper">
              <input type="email" class="form-control" placeholder="Enter your email address">
            </div>
          </div>
        </div><!--.form-group-->
        <div class="form-buttons clearfix">
          <button type="submit" class="btn btn-white pull-left show-pane-login">Cancel</button>
          <button type="submit" class="btn btn-success pull-right">Send</button>
        </div><!--.form-buttons-->
      </div><!--#pane-forgot-password.panel-body-->


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

        $('.login').on('click', function(e){
          e.preventDefault();

          var email = $('#login_email').val();

          if(email != ""){

            $.ajax({
            type: "get",
              url: '{{ url("check_email")}}/'+email,
              dataType: ''
            }).success(function(res) {
              console.log(res);
              if(res == '1'){

                $('#login_email').closest('.inputer').addClass('inputer-green');
                $('#login_email').closest('.input-wrapper').addClass('active');

                $('#login').submit();

              }else{

                $('#login_email').closest('.inputer').addClass('inputer-red');
                $('#login_email').closest('.input-wrapper').addClass('active');
                $('#login_email').val("");
                $('#login_email').attr('placeholder', 'Email Not Register! Register First');

              }

            });

          }


        });


      });

  </script>
  <!-- END Google Analytics -->

</body>
</html>