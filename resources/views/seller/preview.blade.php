@extends('admin.layout')

@section('title', 'Dashboard')


@section('content')
	
	<style type="text/css">
		body{
			text-transform: capitalize;
		}
		.bg-image.bg-opaque5::before{
			opacity: 1 !important;
		}
		.cropit-preview {
        background-color: #f8f8f8;
        background-size: cover;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
        width: 376px;
        height: 412px;
      }

      .cropit-preview-image-container {
        cursor: move;
      }

      .image-size-label {
        margin-top: 10px;
      }

      input, .export {
        display: block;
      }
	</style>

	<div class="page-header full-content parallax" style="height: 600px; overflow: hidden">
			<div class="parallax-bg" style="background: url(@if(Auth::User()->profile->profile_banner == '') {{url('assets/globals/img/picjumbo/large/24.jpg')}} @else {{url('assets/upload/images/'.$user->profile->profile_banner)}} @endif ) 50% 50%; background-size: cover; width: 100%; height: 100%; position: absolute; left: 0; top: 0;">
			</div>

			<div class="profile-info">
				<div class="profile-photo">
					@if(Auth::User()->profile->profile_image != "")
						<img src="{{url('assets/upload/images/'.$user->profile->profile_image)}}" alt="">
					@else
						<img id="upload_img" src="{{url('assets/globals/img/faces/tolga-ergin.jpg')}}" alt="">
					@endif
				</div><!--.profile-photo-->
				<div class="profile-text light" >
					{{Auth::User()->user_name}}
					<span class="caption">{{Auth::user()->caption->role_title}}</span>
				</div><!--.profile-text-->
			</div><!--.profile-info-->

			<div class="row">
				<div class="col-sm-6">
					<h1>User Profile <small >{{Auth::User()->user_name}}</small></h1>
				</div><!--.col-->
				<div class="col-sm-6">
					<ol class="breadcrumb">
						<li><a href="#"><i class="ion-home"></i></a></li>
						<li><a href="#">Pages</a></li>
						<li><a href="#" class="active">User Profile</a></li>
					</ol>
				</div><!--.col-->
				<form action="{{url('user/upload_banner')}}" id="banner_form" method="post" enctype="multipart/form-data">
					<input id="token" name="_token" type="text" value="{{csrf_token()}}" hidden>
				<button title="Change Banner" id="click_upload" class="btn btn-floating btn-blue pull-right" style="margin-top: 50px;margin-right: 20px;">
					<i class="ion-ios-reverse-camera-outline"></i>
				</button>
				<input type="file" id="profile_banner" style="display:none;" name="profile_banner" accept="image/*">
				</form>
			</div><!--.row-->

			<div class="header-tabs sticky">
				<ul class="nav nav-tabs tabs-active-text-white tabs-active-border-yellow" style="width: none !important;">
					<li class="active"><a href="#preview" data-toggle="tab" class="btn-ripple">Preview</a></li>
					<li><a href="{{url('logout')}}" class="btn-ripple ">Logout</a></li>
				</ul>
			</div>

		</div><!--.page-header-->

		<div class="row user-profile">
			<div class="col-md-12">
				<div class="tab-content without-border">

					<div id="preview" class="tab-pane active">

						<div class="row">
							<style type="text/css">
								.play{
									background: #f39c12;
									color: #ffffff;
									display: block;
									position: absolute;
									bottom: 218px;
									left: 173px;
									width: 82px;
									height: 82px;
									border-radius: 40px;
									padding: 6px 10px;
									margin: 0;
									cursor: pointer;
								}
								.play > i{
									position: relative;
									left: 21px;
									top: 16px;
								}
							</style>
						
							<div class="col-md-12">
									<div class="col-md-4 col-md-offset-4">
										<div class="card card-meal card-meal-green card-square card-shadow" style="margin-bottom:0px !important;">
											<div class="card-heading" style="border-top-color:{{$pro->project_color}};">
												<h3 class="card-title">{{$pro->project_title}} <small class="pull-right">
													@if($pro->project_status == "1")
														{{'Active'}}
													@else
														{{'Disabeld'}}
													@endif
												</small></h3>
												<div class="card-subhead">
													By <a href="{{url('user/profile/'.$pro->user_idFk)}}" style="color:{{$pro->project_color}};">{{$pro->user->user_name}}</a>
													<small class="pull-right">@if(count($pro->category) > 0) {{$pro->category->cat_name}} @endif</small>
												</div><!--.card-subhead-->
											</div><!--.card-heading-->
										</div><!--.card-->
										<style type="text/css">
											.img{{$pro->project_id}}::before{
												background-image: url(@if(count($pro->img) > 0) {{url('assets/upload/images/'.$pro->img[0]->project_img)}} @endif);
											}
										</style>
										<div class="card card-news-more" style=" border-radius: 0px; margin-bottom:0px; ">
											<div class="card-heading bg-image bg-opaque5 img{{$pro->project_id}}">
												
												@if(count($pro->audio) > 0)
													<div class="play">
														<audio src="{{url('assets/upload/audio/'.$pro->audio[0]->project_file)}}" id="audio_play"></audio>
														<i class="fa fa-play play_i fa-2x"></i>
														<i class="fa fa-pause pause_i fa-2x" style="display:none;left: 16px;"></i>
													</div>
												@endif	
											
												<div class="heading-content">
													@if($pro->project_status == "1")
														<a href="#{{$pro->project_id}}" data-toggle="tab" class="btn btn-blue btn-floating">
															<i class="ion-edit"></i>
														</a>
														<button class="btn btn-red btn-floating" data-toggle="modal" data-target="#modal{{$pro->project_id}}" ><i class="ion-trash-a"></i></button>
													@else
														<button class="btn btn-green btn-floating" data-toggle="modal" data-target="#modal{{$pro->project_id}}" ><i class="ion-checkmark"></i></button>
													@endif
													<button class="btn btn-floating btn-pink toggle-card-news-more"><i class="ion-more"></i></button>
												</div>
											</div><!--.card-heading-->
											<div class="card-body">
												<p>{{$pro->project_desc}}</p>
											</div><!--.card-body-->

										</div><!--.card-->

										<div class="card card-meal card-meal-green card-square card-shadow">
											<div class="card-footer">
												<button class="btn btn-floating btn-green vote_count" data-vote="{{count($pro->vote)}}">{{count($pro->vote)}}</button>
												
													@if(count($pro->vote) > 0)
														<?php $status = false;?>
														@foreach($pro->vote as $vote)
															
															@if($vote->user_idFk == $user->user_id)
																
																<button data-projectID="{{$pro->project_id}}" class="btn btn-floating btn-blue send_vote" style="float:right;display:none;">
																<i class="ion-thumbsup"></i>
																</button>
																<button data-projectID="{{$pro->project_id}}" class="btn btn-floating btn-green confirm_vote" style=" float:right;">
																	<i class="ion-thumbsup"></i>
																</button>

																<?php $status = true;?>

															@endif

															@if($status == true)

																@break

															@endif

														@endforeach

														@if($status == false)
															<button data-projectID="{{$pro->project_id}}" class="btn btn-floating btn-blue send_vote" style="float:right;">
																<i class="ion-thumbsup"></i>
															</button>
															<button data-projectID="{{$pro->project_id}}" class="btn btn-floating btn-green confirm_vote" style="display:none; float:right;">
																<i class="ion-thumbsup"></i>
															</button>
														@endif

													@else

														<button data-projectID="{{$pro->project_id}}" class="btn btn-floating btn-blue send_vote" style="float:right;">
															<i class="ion-thumbsup"></i>
														</button>
														<button data-projectID="{{$pro->project_id}}" class="btn btn-floating btn-green confirm_vote" style="display:none; float:right;">
															<i class="ion-thumbsup"></i>
														</button>

													@endif
													
													
													<span class="headline" style="margin: 4px 0px;"></span>
													<?php $items = count($pro->size); ?>
													@if($items != 0)

														@for($i = 0; $i < $items; $i++)
															@if($pro->size[$i]->size->s_cat_name == 'Small')
																<button class="btn btn-floating btn-green">S</button>
															@elseif($pro->size[$i]->size->s_cat_name == 'Medium')
																<button class="btn btn-floating btn-green">M</button>
															@elseif($pro->size[$i]->size->s_cat_name == 'Large')
																<button class="btn btn-floating btn-green">L</button>
															@endif
														@endfor

													@else

			                                            @if($pro->type != null)
			                                                <button class="btn btn-green">{{$pro->type}}</button>
			                                            @endif

			                                        @endif
													<button class="btn btn-green" style="float:right;">{{$pro->project_price}} Rs</button>
											</div><!--.card-footer-->
										</div><!--.card-->

									</div>
							</div>

						</div><!--.row-->

						<div class="row">
							<div class="col-md-2 col-md-offset-2">
								<a href="{{url('project/delete/'.$pro->project_id)}}" class="btn btn-danger pull-right">Cancel</a>
							</div>
							<div class="col-md-2 col-md-offset-4">
								<a href="{{url('project/active/'.$pro->project_id)}}" class="btn btn-primary">Publish</a>
							</div>
						</div>

					</div><!--#friends.tab-pane-->
				
					
				</div><!--.tab-content-->
			</div><!--.col-->
		</div><!--.row-->

		<script type="text/javascript">
			
			$(document).ready(function(){


			});


		</script>
                    
@stop

@section('foot')
    
	@parent
    

@stop


