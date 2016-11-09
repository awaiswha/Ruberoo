<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Ruberoo</title>

	<meta name="description" content="Pleasure is responsive, material admin dashboard panel">
	<meta name="author" content="Teamfox">

	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<meta name="apple-touch-fullscreen" content="yes">

	<link rel="stylesheet" href="{{url('assets/admin1/css/customStyles.css')}}">
    <link rel="stylesheet" href="{{url('assets/admin1/css/admin2.css')}}">
	<link rel="stylesheet" href="{{url('assets/globals/css/elements.css')}}">
	<!-- END CORE CSS -->

	<!-- BEGIN PLUGINS CSS -->
	<link rel="stylesheet" href="{{url('assets/globals/plugins/rickshaw/rickshaw.min.css')}}">
	<link rel="stylesheet" href="{{url('assets/globals/plugins/bxslider/jquery.bxslider.css')}}">

	<link rel="stylesheet" href="{{url('assets/globals/css/plugins.css')}}">
	<!-- END PLUGINS CSS -->

	<!-- BEGIN SHORTCUT AND TOUCH ICONS -->
	<link rel="shortcut icon" href="{{url('assets/globals/img/icons/favicon.ico')}}">
	<link rel="apple-touch-icon" href="{{url('assets/globals/img/icons/apple-touch-icon.png')}}">
	<!-- END SHORTCUT AND TOUCH ICONS -->

	<script src="{{url('assets/globals/plugins/modernizr/modernizr.min.js')}}"></script>
</head>
<body>

	<div class="nav-bar-container">

        <!-- BEGIN ICONS -->
        <div class="nav-menu">
            <div class="hamburger">
                <span class="patty"></span>
                <span class="patty"></span>
                <span class="patty"></span>
                <span class="patty"></span>
                <span class="patty"></span>
                <span class="patty"></span>
            </div><!--.hamburger-->
        </div><!--.nav-menu-->

        <!-- <div class="nav-search">
            <span class="search"></span>
        </divnav-search-->
        <!-- END OF ICONS -->

        <div class="nav-bar-border"></div><!--.nav-bar-border-->

        <!-- BEGIN OVERLAY HELPERS -->
        <div class="overlay">
            <div class="starting-point">
                <span></span>
            </div><!--.starting-point-->
            <div class="logo">Ruberoo</div><!--.logo-->
        </div><!--.overlay-->

        <div class="overlay-secondary"></div><!--.overlay-secondary-->
        <!-- END OF OVERLAY HELPERS -->

    </div><!--.nav-bar-container-->

    <div class="content">

        <div class="page-header full-content">
            <div class="headerNav">
                <ul>
                    <li><a href="#">Fashion</a></li>
                    <li><a href="#">Beauty</a></li>
                    <li><a href="#">Technology</a></li>
                    <li><a href="#">Science</a></li>
                    <li><a href="#">Mechanical</a></li>
                    <li><a href="#">Dealers</a></li>
                </ul>
            </div>
            <div class="headerLogo"><img src="{{url('assets/admin1/img/headerLogo.png')}}" width="350" height="150" alt=""></div>
        </div><!--.page-header-->
        
    <div class="page-content">
    
        <!-- Card Row-->
        <div class="row">
            <style type="text/css">
                .likes{
                    display: block;
                    position: relative;
                    float: right;
                    margin-top: 53px;
                }
                .modal.in .modal-dialog{
                    width:950px !important;
                }
            </style>

            @if(count($projects) > 0)


                @foreach($projects as $project)


                    @if($project->user != null)

                        <style type="text/css">
                            .card.card-meal.card-meal-indigo .card-heading {
                                border-top-color: {{$project->project_color}};
                            }
                            .card.card-meal.card-meal-indigo a {
                                color: {{$project->project_color}};
                            }
                            @if($project->type != null)
                                
                                .cardShortDesc > ul.elements {
                                    margin: 0 0 0 0 !important;
                                }
                            @endif
                        </style>
                        <!-- Modal Box -->
                        <!-- Card -->
                        
                        <!-- Card -->
                        <!-- Card -->
                        <div class="col-md-3">
                            <div class="card card-meal card-meal-red card-square card-shadow">
                                
                                <div class="card-heading">
                                    <h3 class="card-title">{{$project->project_title}} <p style="float:right">Rs. {{$project->project_price}}</p></h3>
                                    <div class="card-subhead">By <a href="{{url('user/profile/'.$project->user_idFk)}}">{{$project->user->user_name}}</a></div>
                                </div>
                                
                                <div class="card-body">
                                    <div class="image">
                                        <a href="#" data-toggle="modal" data-target="#more{{$project->project_id}}"><img src="@if(count($project->img) > 0) {{url('assets/upload/images/'.$project->img[0]->project_img)}} @endif" alt=""></a>
                                    </div><!--.image-->
                                </div><!--.card-body-->
                                
                                <div class="card-footer">
                                    
                                 
                                       
                                 
                                    <a href="#" class="pull-right" data-toggle="modal" data-target="#more{{$project->project_id}}"><i class="fa fa-ellipsis-h"></i></a>
                                     
                                </div>
                            </div>
                        </div>
                        
                        <!-- Modal Box -->
                        <div class="modal fade scale" id="more{{$project->project_id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title">Card Heading</h2>
                                        <p>By <a href="#">Richard</a></p>
                                    </div>
                                    <div class="modal-body">
                                    <img src="@if(count($project->img) > 0) {{url('assets/upload/images/'.$project->img[1]->project_img)}} @endif" alt="">
                                        <div class="cardDesc">
                                        <h1>Rs. {{$project->project_price}}</h1>
                                        
                                        <div class="clearfix"></div>
                                        
                                        <h2>Sizes:</h2>
                                        <ul class="elements">
                                            <?php $items = count($project->size); ?>
                                            @if($items != 0)

                                                @for($i = 0; $i < $items; $i++)
                                                    @if($project->size[$i]->size->s_cat_name == 'Small')
                                                        <li><a href="#">S</a></li>
                                                    @elseif($project->size[$i]->size->s_cat_name == 'Medium')
                                                        <li><a href="#">M</a></li>
                                                    @elseif($project->size[$i]->size->s_cat_name == 'Large')
                                                        <li><a href="#">L</a></li>
                                                    @endif
                                                @endfor

                                            @else

                                                @if($project->type != null)
                                                    <p style="margin-bottom:0px;">{{$project->type}}</p>
                                                @endif

                                            @endif
                                        </ul>
                                        
                                        <div class="clearfix"></div>

                                        
                                        <h2>Description:</h2>
                                        <p>{{$project->project_desc}}</p>
                                        </div>
                                        <div class="likes">
                                         <button class="btn btn-floating btn-green vote_count" style="margin-right:8px;" data-vote="{{count($project->vote)}}">{{count($project->vote)}}</button>

                                        @if(Auth::User())


                                            @if(count($project->vote) > 0)
                                                <?php $status = false;?>
                                                @foreach($project->vote as $vote)
                                                    
                                                    @if($vote->user_idFk == $user->user_id)
                                                        
                                                        <button data-projectID="{{$project->project_id}}" class="btn btn-floating btn-blue send_vote" style="float:right;display:none;">
                                                        <i class="ion-thumbsup"></i>
                                                        </button>
                                                        <button data-projectID="{{$project->project_id}}" class="btn btn-floating btn-green confirm_vote" style=" float:right;">
                                                            <i class="ion-thumbsup"></i>
                                                        </button>

                                                        <?php $status = true;?>

                                                    @endif

                                                    @if($status == true)

                                                        @break

                                                    @endif

                                                @endforeach
                                                
                                                @if($status == false)
                                                    <button data-projectID="{{$project->project_id}}" class="btn btn-floating btn-blue send_vote" style="float:right;">
                                                        <i class="ion-thumbsup"></i>
                                                    </button>
                                                    <button data-projectID="{{$project->project_id}}" class="btn btn-floating btn-green confirm_vote" style="display:none; float:right;">
                                                        <i class="ion-thumbsup"></i>
                                                    </button>
                                                @endif

                                            @else

                                                <button data-projectID="{{$project->project_id}}" class="btn btn-floating btn-blue send_vote" style="float:right;">
                                                    <i class="ion-thumbsup"></i>
                                                </button>
                                                <button data-projectID="{{$project->project_id}}" class="btn btn-floating btn-green confirm_vote" style="display:none; float:right;">
                                                    <i class="ion-thumbsup"></i>
                                                </button>

                                            @endif


                                        @endif
                                     </div> 
                                    </div>
                                    <div class="modal-footer">
                                        @if(!Auth::guest())
                                            @if(Auth::User()->user_role_idFk == 4)
                                                <a href="{{url('buyer/dashboard/'.$project->project_id)}}" class="btn btn-primary" >Add to Cart</a>
                                            @endif
                                        @else
                                            <a href="{{url('login/'.$project->project_id)}}" class="btn btn-primary" >Add to Cart</a>
                                        @endif
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Box -->
                        <!-- Card -->


                    @endif

                @endforeach


            @else


                <h3>Recond Not Found</h3>
            @endif

		</div>
        <!-- Card Row-->
        
        <div class="clearfix"><p>&nbsp;</p></div>
        
    </div>
        
	</div><!--.content-->

    <div class="layer-container">

        <!-- BEGIN MENU LAYER -->
        <div class="menu-layer">
            <ul>
                <li data-open-after="true"><a href="index.html">Ruberoo</a></li>
                <li><a href="#">Fashion</a></li>
                <li><a href="#">Beauty</a></li>
                <li><a href="#">Technology</a></li>
                <li><a href="#">Science</a></li>
                <li><a href="#">Mechanical</a></li>
                <li><a href="#">Dealers</a></li>
                @if(Auth::guest())
                    <li><a href="{{'login'}}">Login</a></li>
                @else
                     @if(Auth::User()->user_role_idFk == 1)
                        <li><a href="{{'admin/dashboard'}}">My Acount</a></li>
                    @elseif(Auth::User()->user_role_idFk == 3)
                        <li><a href="{{'user/dashboard'}}">My Acount</a></li>
                    @elseif(Auth::User()->user_role_idFk == 4)
                        <li><a href="{{'buyer/dashboard'}}">My Acount</a></li>
                    @endif
                @endif
            </ul>
        </div><!--.menu-layer-->
        <!-- END OF MENU LAYER -->

        <!-- BEGIN SEARCH LAYER -->
        <div class="search-layer">
            <!-- <div class="search">
                <form action="pages-search-results.html">
                    <div class="form-group">
                        <input type="text" id="input-search" class="form-control" placeholder="type something">
                        <button type="submit" class="btn btn-default disabled"><i class="ion-search"></i></button>
                    </div>
                </form>
            </div> --><!--.search-->

            <div class="results">
                <div class="row">
                    <div class="col-md-4">
                        <div class="result result-users">
                            <h4>USERS <small>(3)</small></h4>

                            <ul class="list-material">
                                <li class="has-action-left">
                                    <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                    <a href="#" class="visible">
                                        <div class="list-action-left">
                                            <img src="../../assets/globals/img/faces/1.jpg" class="face-radius" alt="">
                                        </div>
                                        <div class="list-content">
                                            <span class="title">Pari Subramanium</span>
                                            <span class="caption">Legacy Response Assistant</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="has-action-left">
                                    <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                    <a href="#" class="visible">
                                        <div class="list-action-left">
                                            <img src="../../assets/globals/img/faces/10.jpg" class="face-radius" alt="">
                                        </div>
                                        <div class="list-content">
                                            <span class="title">Andrew Fox</span>
                                            <span class="caption">National Branding Technician</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="has-action-left">
                                    <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                    <a href="#" class="visible">
                                        <div class="list-action-left">
                                            <img src="../../assets/globals/img/faces/11.jpg" class="face-radius" alt="">
                                        </div>
                                        <div class="list-content">
                                            <span class="title">Lieke Vermeulen</span>
                                            <span class="caption">Global Tactics Consultant</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>

                        </div><!--.results-user-->
                    </div><!--.col-->
                    <div class="col-md-4">
                        <div class="result result-posts">
                            <h4>POSTS <small>(5)</small></h4>

                            <ul class="list-material">
                                <li class="has-action-left">
                                    <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                    <a href="#" class="visible">
                                        <div class="list-action-left">
                                            <img src="../../assets/globals/img/picjumbo/1.jpg" class="img-radius" alt="">
                                        </div>
                                        <div class="list-content">
                                            <span class="title">Mobile Trends for 2015</span>
                                            <span class="caption">Collaboratively administrate empowered markets via plug-and-play networks.</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="has-action-left">
                                    <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                    <a href="#" class="visible">
                                        <div class="list-action-left">
                                            <img src="../../assets/globals/img/picjumbo/10.jpg" class="img-radius" alt="">
                                        </div>
                                        <div class="list-content">
                                            <span class="title">Interview with Phillip Riley</span>
                                            <span class="caption">Dynamically procrastinate B2C users after installed base benefits.</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="has-action-left">
                                    <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                    <a href="#" class="visible">
                                        <div class="list-action-left">
                                            <img src="../../assets/globals/img/picjumbo/11.jpg" class="img-radius" alt="">
                                        </div>
                                        <div class="list-content">
                                            <span class="title">Workspaces</span>
                                            <span class="caption">Dramatically visualize customer directed convergence without revolutionary ROI.</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="has-action-left">
                                    <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                    <a href="#" class="visible">
                                        <div class="list-action-left">
                                            <img src="../../assets/globals/img/picjumbo/5.jpg" class="img-radius" alt="">
                                        </div>
                                        <div class="list-content">
                                            <span class="title">Graphics &amp; Multimedia</span>
                                            <span class="caption">Efficiently unleash cross-media information without cross-media value.</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="has-action-left">
                                    <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                    <a href="#" class="visible">
                                        <div class="list-action-left">
                                            <img src="../../assets/globals/img/picjumbo/6.jpg" class="img-radius" alt="">
                                        </div>
                                        <div class="list-content">
                                            <span class="title">Interactive Storytelling</span>
                                            <span class="caption">Quickly maximize timely deliverables for real-time schemas.</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>

                        </div><!--.results-posts-->
                    </div><!--.col-->
                    <div class="col-md-4">
                        <div class="result result-files">
                            <h4>FILES <small>(0)</small></h4>
                            <p>No results were found</p>
                        </div><!--.results-files-->
                    </div><!--.col-->

                </div><!--.row-->
            </div><!--.results-->
        </div><!--.search-layer-->
        <!-- END OF SEARCH LAYER -->

    </div><!--.layer-container-->


	<!-- BEGIN GLOBAL AND THEME VENDORS -->
	<!-- END GLOBAL AND THEME VENDORS -->
	{{ Html::script('assets/globals/js/global-vendors.js') }}
	<!-- BEGIN PLUGINS AREA -->
	<script src="http://maps.google.com/maps/api/js?sensor=true&amp;libraries=places"></script>
	<script src="{{url('assets/globals/plugins/gmaps/gmaps.js')}}"></script>
	<script src="{{url('assets/globals/plugins/bxslider/jquery.bxslider.min.js')}}"></script>
	<script src="{{url('assets/globals/plugins/audiojs/audiojs/audio.min.js')}}"></script>
	<script src="{{url('assets/globals/plugins/d3/d3.min.js')}}"></script>
	<script src="{{url('assets/globals/plugins/rickshaw/rickshaw.min.js')}}"></script>
	<script src="{{url('assets/globals/plugins/jquery-knob/excanvas.js')}}"></script>
	<script src="{{url('assets/globals/plugins/jquery-knob/dist/jquery.knob.min.js')}}"></script>
	<script src="{{url('assets/globals/plugins/gauge/gauge.min.js')}}"></script>
	<!-- END PLUGINS AREA -->

	<!-- PLEASURE -->
	<script src="{{url('assets/globals/js/pleasure.js')}}"></script>
	<!-- ADMIN 1 -->
	<script src="{{url('assets/admin1/js/layout.js')}}"></script>

	<script src="{{url('assets/globals/scripts/sliders.js')}}"></script>
	<script src="{{url('assets/globals/scripts/maps-google.js')}}"></script>
	<script src="{{url('assets/globals/scripts/widget-audio.js')}}"></script>
	<script src="{{url('assets/globals/scripts/charts-knob.js')}}"></script>
	<script src="{{url('assets/globals/scripts/index.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            $('.send_vote').on('click', function(){
                var vote = $(this).attr('data-projectID');
                    
                @if(Auth::guest())
                    alert('Login First');
                @else

                    if(vote != ""){

                        $.ajax({
                            type: "get",
                            url: '{{ url("project/vote/")}}/'+vote,
                            dataType: ''
                        }).success(function(res) {

                        });

                        $(this).css('display', 'none');
                        $(this).siblings('.confirm_vote').css('display', 'block');

                        var count = $(this).siblings('.vote_count').html();
                        
                        $(this).siblings('.vote_count').html("");
                        $(this).siblings('.vote_count').html((parseInt(count) + 1));

                    }

                @endif
            });

            $('.confirm_vote').on('click', function(){

                var vote = $(this).attr('data-projectID');
                
                if(vote != ""){

                    $.ajax({
                        type: "get",
                        url: '{{ url("project/cancel_vote/")}}/'+vote,
                        dataType: ''
                    }).success(function(res) {

                    });

                    $(this).css('display', 'none');
                    $(this).siblings('.send_vote').css('display', 'block');

                    var count = $(this).siblings('.vote_count').html();
                    
                    $(this).siblings('.vote_count').html("");
                    $(this).siblings('.vote_count').html((parseInt(count) - 1));

                }

            });

        });
    </script>

	<!-- BEGIN INITIALIZATION-->
	<script>
	$(document).ready(function () {
		Pleasure.init();
		Layout.init();

		Index.init();
		WidgetAudio.single();
		ChartsKnob.init();

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

        
	</script>
	<!-- END Google Analytics -->

</body>
</html>