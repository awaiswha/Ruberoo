@extends('admin.layout')

@section('title', 'Profile')


@section('content')
	
	<style type="text/css">
		body{
			text-transform: capitalize;
		}
		.bg-image.bg-opaque5::before{
			opacity: 1 !important;
		}
	</style>

	<div class="page-header full-content parallax" style="height: 600px; overflow: hidden">
			<div class="parallax-bg" style="background: url(@if($profile[0]->profile->profile_banner == '') {{url('assets/globals/img/picjumbo/large/24.jpg')}} @else {{url('assets/upload/images/'.$profile[0]->profile->profile_banner)}} @endif ) 50% 50%; background-size: cover; width: 100%; height: 100%; position: absolute; left: 0; top: 0;">
			</div>

			<div class="profile-info">
				<div class="profile-photo">
					@if($profile[0]->profile->profile_image != "")
						<img src="{{url('assets/upload/images/'.$profile[0]->profile->profile_image)}}" alt="">
					@else
						<img id="upload_img" src="{{url('assets/globals/img/faces/tolga-ergin.jpg')}}" alt="">
					@endif
				</div><!--.profile-photo-->
				<div class="profile-text light" >
					{{$profile[0]->user_name}}
					<span class="caption">{{$profile[0]->caption->role_title}}</span>
				</div><!--.profile-text-->
			</div><!--.profile-info-->

			<div class="row">
				<div class="col-sm-6">
					<h1>User Profile <small >{{$profile[0]->user_name}}</small></h1>
				</div><!--.col-->
				<div class="col-sm-6">
					<ol class="breadcrumb">
						<li><a href="#"><i class="ion-home"></i></a></li>
						<li><a href="#">Pages</a></li>
						<li><a href="#" class="active">User Profile</a></li>
					</ol>
				</div><!--.col-->
			</div><!--.row-->

			<div class="header-tabs sticky">
				<ul class="nav nav-tabs tabs-active-text-white tabs-active-border-yellow" style="width: none !important;">
					<li class="active"><a href="#timeline" data-toggle="tab" class="btn-ripple">Timeline</a></li>
				</ul>
			</div>

		</div><!--.page-header-->

		<div class="row user-profile">
			<div class="col-md-12">
				<div class="tab-content without-border">
					<div id="timeline" class="tab-pane active">
						<div class="row masonry">

							<div class="col-md-12">
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
				                        </style>
				                        <!-- Modal Box -->
				                        <!-- Card -->
				                        
				                        <!-- Card -->
				                        <div class="col-md-4">
				                            <div class="card card-meal card-meal-indigo card-square card-shadow">
				                                
				                                <div class="card-heading">
				                                    <h3 class="card-title">{{$project->project_title}}</h3>
				                                    <div class="card-subhead">By <a href="{{url('user/profile/'.$project->user_idFk)}}">{{$project->user->user_name}}</a></div>
				                                </div>
				                                
				                                <div class="card-body">
				                                    <div class="image">
				                                        <a href="#" data-toggle="modal" data-target="#more{{$project->project_id}}"><img src="@if(count($project->img) > 0) {{url('assets/upload/images/'.$project->img[0]->project_img)}} @endif" alt=""></a>
				                                    </div><!--.image-->
				                                </div><!--.card-body-->
				                                
				                                <div class="card-footer">
				                                    <div class="cardShortDesc">
				                                    <h4>Rs. {{$project->project_price}}</h4>
				                                    <div class="clearfix"></div>
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
			                                                    <button class="btn btn-green">{{$project->type}}</button>
			                                                @endif

			                                            @endif
				                                        
				                                    </ul>
				                                    <div class="clearfix"></div>
				                                        <button class="btn btn-floating btn-green vote_count" style="margin-right:8px;" data-vote="{{count($project->vote)}}">{{count($project->vote)}}</button>

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
				                                    </div>
				                                    <a href="#" class="pull-right" data-toggle="modal" data-target="#more{{$project->project_id}}"><i class="fa fa-ellipsis-h"></i></a>
				                                </div>
				                            </div>
				                        </div>
				                        
				                        <!-- Modal Box -->
				                        


				                    @endif

				                @endforeach


				            @else


				                <h3>Recond Not Found</h3>
				            @endif
							</div>

						</div><!--.row-->

					</div><!--#timeline.tab-pane-->
					
					
				</div><!--.tab-content-->
			</div><!--.col-->
		</div><!--.row-->


		@if(count($projects) > 0)

			@foreach($projects as $project)

				<div class="modal fade full-height" id="more{{$project->project_id}}" tabindex="-1" role="dialog" aria-hidden="true">
				                            <div class="modal-dialog">
				                                <div class="modal-content">
				                                    <div class="modal-header">
				                                        <h2 class="modal-title">{{$project->project_title}}</h2>
				                                        <p>By <a href="#">{{$project->user->user_name}}</a></p>
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
				                                                    <button class="btn btn-green">{{$project->type}}</button>
				                                                @endif

				                                            @endif
				                                        </ul>
				                                        
				                                        <div class="clearfix"></div>
				                                        
				                                        <h2>Description:</h2>
				                                        <p>{{$project->project_desc}}</p>
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
				                                        <button type="button" class="btn btn-flat btn-default" data-dismiss="modal">&times;</button>
				                                    </div>
				                                </div>
				                            </div>
				                        </div>
				                        <!-- Modal Box -->
				                        <!-- Card -->

			@endforeach

		@endif

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
                    
@stop

@section('foot')
    
	@parent
    

@stop


