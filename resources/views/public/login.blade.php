<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>User</title>

  <meta name="description" content="">
  <meta name="author" content="">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

 {{ Html::style('assets/admin1/css/admin1.css') }}
{{ Html::style('assets/globals/css/elements.css') }}
{{ Html::style('assets/globals/plugins/blueimp-gallery/css/blueimp-gallery.min.css') }}
{{ Html::style('assets/globals/plugins/blueimp-bootstrap-image-gallery/css/bootstrap-image-gallery.min.css') }}
{{ Html::style('assets/globals/plugins/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}
{{ Html::style('assets/globals/plugins/datatables/media/css/jquery.dataTables.min.css') }}
{{ Html::style('assets/globals/plugins/datatables/themes/bootstrap/dataTables.bootstrap.css') }}
{{ Html::style('assets/globals/plugins/components-summernote/dist/summernote.css') }}
{{ Html::style('assets/globals/css/plugins.css') }}
{{ Html::style('assets/globals/img/icons/favicon.ico', array('rel' => "shortcut icon")) }}
{{ Html::style('assets/globals/img/icons/apple-touch-icon.png', array('rel' => 'apple-touch-icon')) }}
{{ Html::style('assets/datepicker/datepicker3.css') }}
{{ Html::style('assets/admin1/css/style.css') }}
{{ Html::style('assets/admin1/css/customStyles.css') }}
{{ Html::script('assets/globals/plugins/modernizr/modernizr.min.js') }}

{{ Html::script('assets/globals/js/global-vendors.js') }}
{{ Html::script('assets/globals/plugins/masonry/dist/masonry.pkgd.min.js') }}
{{ Html::script('assets/globals/plugins/blueimp-gallery/js/jquery.blueimp-gallery.min.js') }}
{{ Html::script('assets/globals/plugins/blueimp-bootstrap-image-gallery/js/bootstrap-image-gallery.min.js') }}
{{ Html::script('assets/globals/plugins/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}
{{ Html::script('assets/globals/scripts/user-pages.js') }}
{{ Html::script('assets/globals/js/pleasure.js') }}
{{ Html::script('assets/datepicker/bootstrap-datepicker.js') }}
{{ Html::script('assets/globals/plugins/jquery-validation/dist/jquery.validate.min.js') }}
{{ Html::script('assets/globals/plugins/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}
{{ Html::script('assets/globals/plugins/datatables/media/js/jquery.dataTables.min.js') }}
{{ Html::script('assets/globals/plugins/datatables/themes/bootstrap/dataTables.bootstrap.js') }}
{{ Html::script('assets/globals/scripts/tables-datatables.js') }}
{{ Html::script('assets/globals/scripts/forms-wizard.js') }}
{{ Html::script('assets/admin1/js/layout.js') }}
{{ Html::script('assets/admin1/js/jquery.cropit.js') }}

  <style type="text/css">
    .signup{
      cursor: pointer;
      color: white;
    }
    .signup:hover{
      cursor: pointer;
      color: #5cb85c;
    }
    .form-control{
      color: #FFF !important;
    }
    .bg-login .bg-blur::before{
      background:url({{url('assets/globals/img/picjumbo/login.jpg')}}) fixed no-repeat;
    }
  </style>
</head>
<body class="bg-login printable">

  <div class="login-screen">
    <div class="panel-login blur-content">
      <div class="panel-heading"><a href="{{url('/')}}"><img src="{{url('assets/admin1/img/headerLogo.png')}}" height="100" alt=""></a></div><!--.panel-heading-->
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
          <li class="show-pane-create-account signup">Create a new account</li>
        </ul>
      </div><!--#login.panel-body-->

      <div id="pane-forgot-password" class="panel-body">
        <h2>Forgot Your Password</h2>
        <form action="{{url('public/forget_password')}}" method="post" id="login">
        <input id="token" name="_token" type="text" value="{{csrf_token()}}" hidden>
        <div class="form-group">
          <div class="inputer">
            <div class="input-wrapper">
              <input type="email" name="email" class="form-control" placeholder="Enter your email address" required="">
            </div>
          </div>
        </div><!--.form-group-->
        <div class="form-buttons clearfix">
          <button class="btn btn-white pull-left show-pane-login">Cancel</button>
          <button type="submit" class="btn btn-success pull-right">Send</button>
        </div><!--.form-buttons-->
        </form>
      </div><!--#pane-forgot-password.panel-body-->

      <form action="{{url('public/registration')}}" method="post" id="register">
        <input id="token" name="_token" type="text" value="{{csrf_token()}}" hidden>
      <div id="pane-create-account" class="panel-body">
        <h2>Create a New Account</h2>
        <!-- <div class="form-group">
          <div class="inputer">
            <div class="input-wrapper">
              <input type="text" name="first_name" id="first_name" value="{{old('first_name')}}" class="form-control" placeholder="First Name">
            </div>
          </div>
        </div> --><!--.form-group-->
        <div class="form-group">
          <div class="inputer">
            <div class="input-wrapper">
              <input type="text" name="user_name" value="{{old('user_name')}}" class="form-control" placeholder="First Name">
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
              <input type="password" name="password" id="password" value="{{old('password')}}" class="form-control" placeholder="Password">
            </div>
          </div>
        </div><!--.form-group-->
        <div class="form-group">
          <label><input id="terms" type="checkbox" name="remember" value=""> Terms & Conditions</label><a style="margin-left:8px;" href="" data-toggle="modal" data-target="#termsmodel">Read More</a>
        </div>
        <div class="form-buttons clearfix">
          <a type="submit" class="btn btn-white pull-left show-pane-login">Cancel</a>
          <button class="btn btn-success pull-right register">Sign Up</button>
        </div><!--.form-buttons-->
      </div><!--#login.panel-body-->

      </form>

    </div><!--.blur-content-->

    
  @if(session('error'))
    <div id="message">
      <div class="alert alert-danger alert-dismissible">
          <p>{{session('error')}}</p>
        </div>
    </div>
  @endif
  @if(session('success'))
    <div id="message">
      <div class="alert alert-success alert-dismissible">
          <p>{{session('success')}}</p>
        </div>
    </div>
  @endif

  </div><!--.login-screen-->

  <div class="bg-blur dark">
    <div class="overlay"></div><!--.overlay-->
  </div><!--.bg-blur-->
  <style type="text/css">
    h5, h4{
      color: rgb(44, 159, 218);
      font-weight: bold;
    }
  </style>

  <div class="modal scale fade" id="termsmodel" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" style=" text-align: center; ">Terms & Conditions</h4>
              </div>
              <div class="modal-body">
                <h5>For Sellers:</h5>
                <p>1. Seller will be responsible for the delivering the right product with in the right time. Cancelation of the order will be on sellers expense</p>
                <p>2. Seller will have to pay any fees relating to listing, promotion activates done by sellers and the percentage charge on the sales decided by the RUBEROO.</p>
                <p>3. Sellers will provide with the original content, copied stuff will be removed from the website. And upon doing again and again seller may be blacklisted.</p>
                <p>4. Seller will be responsible to maintain and update their shops </p>
                <p>5. Seller is responsible to confirm order and delivery of the products.</p>
                <p>6. Seller is responsible to open cash on delivery (COD) account, ruberoo can recommend different shipping companies.</p>
                <p>7. Seller is responsible to clearly list their return policy, if any.</p>
                <h5>For Ruberoo:</h5>
                <p>1. Ruberoo is responsible for marketing the product and make sure the people visit website frequently.</p>
                <p>2. Ruberoo needs to make sure that order is delivering to customer and the balance payment (after appropriate deduction) is made to the seller on the timely basis that is every month. In case of credit card payment. (Should we remove this for later date?)</p>
                <p>3. Ruberoo has the right to un-list any product they don’t find appropriate or up to the standard or upon finding if the product is fake.</p>
                <p>4. Ruberoo is not responsible for any loss or damage of product during the shipping process. In that cases sender should contact the responsible shipping company. </p>
                <h5>Buyer</h5>
                <p>1. Buyer can return the product based with the time frame given by seller for full refund. The return shipment cost will be bare by the buyer. </p>
                <p>2. Customs and other applicable charges charged by the government will be bare by buyers. </p>
                <p>3. For refund, contact seller directly and make sure to return the product in timely manner and according to seller requirements. </p>
                <p>4. Loss, damage or any other mishap with the return shipment will be on buyers responsibility and should be discussed directly with the shipping company. </p>
                <p>5. Refund will be given directly from seller, if any problems please contact ruberoo.</p>
                <p>6. Its buyers responsibly to read each and every detail related to refund and product. Any issues related to products should be sorted directly with the seller. </p>
              </div>
            </div><!--.modal-content-->
          </div><!--.modal-dialog-->
        </div><!--.modal-->


  <!-- BEGIN INITIALIZATION-->
  <script>
  $(document).ready(function () {
    Pleasure.init();
    Layout.init();
    UserPages.login();
    FormsWizard.init();
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

        $('.register').on('click', function(e){
          e.preventDefault();

          var email = $('#email').val();
          var checkbox = $('#terms');

          if(email != ""){

            $.ajax({
            type: "get",
              url: '{{ url("check_email")}}/'+email,
              dataType: ''
            }).success(function(res) {

              if(res == '0'){

                $('#email').closest('.inputer').addClass('inputer-green');
                $('#email').closest('.input-wrapper').addClass('active');
                var password = $('#password').val();

                if(password.length >= 8){
                  
                  if(checkbox.prop('checked') == true){
                    $('#register').submit();
                  }else{
                    alert('Please Firstly Check Terms & Conditions');
                  }

                }else{
                  alert('Password Min 8 Characters');
                  $('#password').val('');
                }
                

              }else{

                $('#email').closest('.inputer').addClass('inputer-red');
                $('#email').closest('.input-wrapper').addClass('active');
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