@extends('admin.layout')

@section('title', 'Dashboard')


@section('content')
	
	<style type="text/css">
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
					<li class="active"><a href="{{url('buyer/dashboard')}}" class="btn-ripple">Timeline</a></li>
					<li><a href="{{url('user/dashboard')}}#profile" data-toggle="tab" class="btn-ripple">Profile</a></li>
					<li><a href="{{url('user/dashboard')}}#projects" data-toggle="tab" class="btn-ripple">Projects</a></li>
					<li><a href="{{url('user/dashboard')}}#add_project" data-toggle="tab" class="btn-ripple">Add Project</a></li>
					<li><a href="{{url('user/dashboard')}}#orders" id="order_nav" data-toggle="tab" class="btn-ripple">Orders</a></li>
					<li><a href="{{url('logout')}}" class="btn-ripple ">Logout</a></li>
				</ul>
			</div>

		</div><!--.page-header-->

		<div class="row user-profile">
			<div class="col-md-12">
				<div class="tab-content without-border">
					<div id="timeline" class="tab-pane active">
						@if(session('success'))
							<div class="alert alert-success" role="alert"><strong>Success! </strong>{{session('success')}}</div>
						@endif
						<div class="row masonry">

							<div class="col-md-4">
								<div class="card card-iconic card-green">
									<div class="card-full-icon ion-thumbsup"></div>

									<div class="card-body">
										<i class="card-icon ion-person"></i>
										<h4><b>Rating</b></h4>
										<button class="btn btn-floating btn-blue">45</button>
									</div><!--.card-body-->

								</div><!--.card-->
							</div><!--.col-md-3-->

							<div class="col-md-4">
								<div class="card card-iconic card-blue">
									<div class="card-full-icon ion-happy"></div>

									<div class="card-body">
										<i class="card-icon ion-clipboard"></i>
										<h4><b>New Orders</b></h4>
										<a href="#orders" id="order_dash" data-toggle="tab" class="btn btn-floating btn-orange">45</a>
									</div><!--.card-body-->

								</div><!--.card-->
							</div><!--.col-md-3-->

							<div class="col-md-4">
								<div class="card card-iconic card-yellow">
									<div class="card-full-icon ion-arrow-graph-up-right"></div>

									<div class="card-body">
										<i class="card-icon ion-card"></i>
										<h4><b>Revenue Sales</b></h4>
										<button class="btn btn-floating btn-blue">45</button>
									</div><!--.card-body-->

								</div><!--.card-->
							</div><!--.col-md-3-->

						

						</div><!--.row-->

					</div><!--#timeline.tab-pane-->

					<div id="profile" class="tab-pane">
						<div class="row">
							<div class="col-md-3">
								<ul class="nav nav-tabs borderless vertical">
									<li class="active"><a href="#about_overview" data-toggle="tab">Overview</a></li>
									<li><a href="#edit_profile" data-toggle="tab">Edit Profile</a></li>
									<li><a href="#change_password" data-toggle="tab">Change Password</a></li>
								</ul>
							</div><!--.col-md-3-->
							<div class="col-md-9">
								<div class="tab-content">

									<div class="tab-pane active" id="about_overview">
										<div class="legend">Contact Information</div>
										<div class="row">
											<div class="col-md-3">Mobile Phones</div><!--.col-md-3-->
											<div class="col-md-9">{{$user->profile->phone_no}}</div><!--.col-md-9-->
										</div><!--.row-->
										<div class="row">
											<div class="col-md-3">Address</div><!--.col-md-3-->
											<div class="col-md-9">{{$user->profile->address}}</div><!--.col-md-9-->
										</div><!--.row-->
										<div class="row">
											<div class="col-md-3">Email</div><!--.col-md-3-->
											<div class="col-md-9">{{$user->email}}</div><!--.col-md-9-->
										</div><!--.row-->

										<div class="legend">Basic Information</div>
										<div class="row">
											<div class="col-md-3">First Name</div><!--.col-md-3-->
											<div class="col-md-9">{{$user->user_name}}</div><!--.col-md-9-->
										</div><!--.row-->
										<div class="row">
											<div class="col-md-3">Last Name</div><!--.col-md-3-->
											<div class="col-md-9">{{$user->profile->last_name}}</div><!--.col-md-9-->
										</div><!--.row-->
										<div class="row">
											<div class="col-md-3">Date Of Birth</div><!--.col-md-3-->
											<div class="col-md-9">{{$user->profile->dob}}</div><!--.col-md-9-->
										</div><!--.row-->
									</div><!--#about_overview.tab-pane-->

									<div class="tab-pane" id="edit_profile">
										<form action="{{url('user/update_profile')}}" method="post" enctype="multipart/form-data">
											<input id="token" name="_token" type="text" value="{{csrf_token()}}" hidden>
												<div class="row">

													<div class="col-xs-6">
														<label>First Name</label>
														<div class="form-group">
												          <div class="inputer">
												            <div class="input-wrapper">
												              <input type="text" name="user_name" value="{{$user->user_name}}" class="form-control" placeholder="User Name">
												            </div>
												          </div>
												        </div>
													</div>
													<div class="col-xs-6">
														<label>Last Name</label>
														<div class="form-group">
												          <div class="inputer">
												            <div class="input-wrapper">
												              <input type="text" name="last_name" value="{{$user->profile->last_name}}" class="form-control" placeholder="Enter Last Name">
												            </div>
												          </div>
												        </div>
													</div>

												</div>

												<div class="row">

													
													<div class="col-xs-6">
														<label>Phone Number</label>
														<div class="form-group">
												          <div class="inputer">
												            <div class="input-wrapper">
												              <input type="text" name="phone_no" value="{{$user->profile->phone_no}}" class="form-control" placeholder="Enter Phone Number">
												            </div>
												          </div>
												        </div>
													</div>
													<div class="col-xs-6">
														<label>Address</label>
														<div class="form-group">
												          <div class="inputer">
												            <div class="input-wrapper">
												              <input type="text" name="address" value="{{$user->profile->address}}" class="form-control" placeholder="Enter Address">
												            </div>
												          </div>
												        </div>
													</div>

												</div>

												<div class="row">

													
													<div class="col-xs-6">
														<div class="control-group">
															<label>Date Of Birth</label>
															<div class="controls">
																<div class="input-group">
																	<span class="input-group-addon"><i class="ion-android-calendar"></i></span>
																	<div class="inputer">
																		<div class="input-wrapper">
																			<input type="text" id="dob" style="width: 200px" name="dob" class="form-control " value="{{$user->profile->dob}}" />
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>

												</div>

												<div class="row">

													<div class="col-xs-6">
														<div class="fileinput fileinput-new" data-provides="fileinput">
															<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
															<div>
																<span class="btn btn-default btn-file">
																<span class="fileinput-new">Select image</span>
																<span class="fileinput-exists">Change</span>
																<input type="file" name="profile_image"></span>
																<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
															</div>
														</div>
													</div>

													<!-- <div class="col-xs-6">
														<div class="fileinput fileinput-new" data-provides="fileinput" id="banner_parent">
															<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
															<div>
																<span class="btn btn-default btn-file">
																<span class="fileinput-new">Select Banner</span>
																<span class="fileinput-exists">Change</span>
																<input type="file" id="profile_banner" name="profile_banner" accept="image/*"></span>
																<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
															</div>
														</div>
													</div> -->

												</div>

												<div class="row">

													<div class="col-xs-12">
														<button type="submit" class="btn btn-success pull-right">Update</button>
													</div>

												</div>

										</form>
									</div>

									<div class="tab-pane" id="change_password">
										<form action="{{url('user/change_password')}}" method="post" id="ch_password">
											<input id="token" name="_token" type="text" value="{{csrf_token()}}" hidden>
												<div class="row">

													<div class="col-xs-6">
														<label>Old Password</label>
														<div class="form-group">
												          <div class="inputer">
												            <div class="input-wrapper">
												              <input type="password" placeholder="Enter Password" id="old_password" name="old_password" class="form-control"  required="">
												            </div>
												          </div>
												        </div>
													</div>

												</div>

												<div class="row">

													<div class="col-xs-6">
														<label>New Password</label>
														<div class="form-group">
												          <div class="inputer">
												            <div class="input-wrapper">
												              <input type="password" placeholder="Enter Password" id="new_password" name="new_password" value="" class="form-control"  required="">
												            </div>
												          </div>
												        </div>
													</div>

												</div>

												<div class="row">

													<div class="col-xs-6">
														<label>Confirm Password</label>
														<div class="form-group">
												          <div class="inputer">
												            <div class="input-wrapper">
												              <input type="password" placeholder="Enter Password" id="confirm_password" name="confirm_password" value="" class="form-control" required="">
												            </div>
												          </div>
												        </div>
													</div>

												</div>

												<div class="row">

													<div class="col-xs-12">
														<button type="submit" class="btn change_password btn-success pull-right">Change</button>
													</div>

												</div>

										</form>
									</div>

								</div><!--.tab-content-->

							</div><!--.col-md-9-->
						</div><!--.row-->
					</div><!--#about.tab-pane-->

					<div id="projects" class="tab-pane">

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
							@if(count($projects) > 0)
								@foreach($projects as $key => $pro)
									<div class="col-md-4">
										<div class="card card-meal card-meal-green card-square card-shadow" style="margin-bottom:0px !important;">
											<div class="card-heading" style="border-top-color:{{$pro->project_color}};">
												<h3 class="card-title">{{$pro->project_title}} @if($pro->project_status == '0'){{'(Draft)'}}@endif<small class="pull-right">
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
														<button class="btn btn-red btn-floating" data-toggle="modal" data-target="#modal{{$pro->project_id}}" ><i class="ion-eye-disabled"></i></button>
													@else
														<button class="btn btn-red btn-floating" data-toggle="modal" data-target="#delete{{$pro->project_id}}" ><i class="ion-trash-a"></i></button>
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

								@endforeach
							@else
								<h4>Record Not Found</h4>
							@endif
							</div>

						</div><!--.row-->

					</div><!--#friends.tab-pane-->

					@if(count($projects) > 0)

						@foreach($projects as $pro)

							<div id="{{$pro->project_id}}" class="tab-pane">
								<div class="row">
									<div class="md-8">
										
										<div class="panel bs-wizard bs-wizard-steps">
											<div class="panel-heading" style=" background-color: #337ab7; ">
												<div class="panel-title">
													<h4 style="color:white !important;">Edit Project</h4>
													<div class="steps-pull-right">
														<ul class="wizard-steps">
															<li class="step"><a href="#form{{$pro->project_id}}_tab1" data-toggle="tab" class="btn btn-primary">1</a></li>
															<li class="step"><a href="#form{{$pro->project_id}}_tab2" data-toggle="tab" class="btn btn-white">2</a></li>
															<li class="step"><a href="#form{{$pro->project_id}}_tab3" data-toggle="tab" class="btn btn-white">3</a></li>
														</ul>
													</div><!--.steps-pull-right-->
												</div><!--.panel-title-->
											</div><!--.panel-heading-->
											<div class="panel-body">

												<form id="form{{$pro->project_id}}" class="form-horizontal {{$pro->project_id}}" action="{{url('user/update_project')}}" method="post" enctype="multipart/form-data">
													<input id="token" name="_token" type="text" value="{{csrf_token()}}" hidden>
													<input id="token" name="project_id" type="text" value="{{$pro->project_id}}" hidden>
													<div class="tab-content">
														<div class="tab-pane" id="form{{$pro->project_id}}_tab1">

															<div class="form-group">
																<label class="control-label col-md-4">Category</label>
																<div class="col-md-5">
																	<select class="selecter" name="cat_id">

																		@if(count($categories) > 0)
																			<option>Please Select</option>
																			@foreach($categories as $cat)

																				<option value="{{$cat->cat_id}}" @if($pro->cat_idFk == $cat->cat_id) {{'selected'}} @endif >{{$cat->cat_name}}</option>

																			@endforeach

																		@else
																			<option>Category Not Found</option>
																		@endif

																	</select>
																</div>
															</div><!--.form-group-->
															<div class="form-group">
																<label class="control-label col-md-4">Project Title</label>
																<div class="col-md-5">
																	<div class="inputer">
																		<div class="input-wrapper">
																			<input id="title" type="text" name="project_title" class="form-control" value="{{$pro->project_title}}" required>
																		</div>
																	</div>
																</div>
															</div><!--.form-group-->
															<div class="form-group">
																<label class="control-label col-md-4">Project Description</label>
																<div class="col-md-5">
																	<div class="inputer">
																		<div class="input-wrapper">
																			<textarea name="project_desc" class="form-control" rows="2" required="">{{$pro->project_desc}}</textarea>
																		</div>
																	</div>
																</div>
															</div><!--.form-group-->

														</div><!--.tab-pane-->

														<div class="tab-pane" id="form{{$pro->project_id}}_tab2">
															<div class="form-group">
																<label class="control-label col-md-4">Project Image</label>
																<div class="fileinput fileinput-new" data-provides="fileinput">
																	<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
																		<img src="@if(count($pro->img) > 0) {{url('assets/upload/images/'.$pro->img[0]->project_img)}} @endif">
																	</div>
																	<div>
																		<span class="btn btn-default btn-file">
																		<span class="fileinput-new">Change</span>
																		<span class="fileinput-exists">Change</span>
																		<input type="file" name="project_img" accept="image/*"></span>
																		<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
																	</div>
																</div>
															</div><!--.form-group-->
															<div class="form-group">
																<label class="control-label col-md-4">Project Audio File</label>
																<div class="fileinput fileinput-new" data-provides="fileinput">
																	<span class="btn btn-default btn-file">
																		<span class="fileinput-new">Select file</span>
																		<span class="fileinput-exists">Change</span>
																		<input type="file" name="project_file" accept="audio/*">
																	</span>
																	<span class="fileinput-filename"></span>
																	<a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
																</div>
															</div><!--.form-group-->
														</div><!--.tab-pane-->

														<div class="tab-pane" id="form{{$pro->project_id}}_tab3">
															
															<div class="form-group">
																<label class="control-label col-md-4">Size</label>
																<div class="col-md-5">
																	<div class="clearfix margin-bottom-10">
																		<?php $items = count($pro->size); ?>
																		@if($items != 0)
																			@foreach($sizes as $size)

																				<div class="checkboxer form-inline">
																					<input name="s_cat_id[]" type="checkbox" id="{{$size->s_cat_name}}{{$pro->project_id}}" value="{{$size->s_cat_id}}"
																						@for($i = 0; $i < $items; $i++)
																							@if($pro->size[$i]->s_cat_idFk == $size->s_cat_id)
																								{{'checked'}}
																							@endif
																						@endfor
																					  >
																					<label for="{{$size->s_cat_name}}{{$pro->project_id}}">{{$size->s_cat_name}}</label>
																				</div>

																			@endforeach
																		@else

																			<div class="checkboxer">
																				<input type="checkbox" value="" >
																				<label style="margin-top:17px;" for="other">Other</label>
																			</div><!--.checkbox-->
																			<div class="inputer" class="type">
																				<div class="input-wrapper">
																					<input type="text" name="type" value="{{$pro->type}}" class="form-control" >
																				</div>
																			</div>


																		@endif
																		
																	</div>

																</div>
															</div><!--.form-group-->
															<div class="form-group">
																<label class="control-label col-md-4">Project Price</label>
																<div class="col-md-5">
																	<div class="inputer">
																		<div class="input-wrapper">
																			<input type="text" name="project_price" class="form-control" value="{{$pro->project_price}}" required>
																		</div>
																	</div>
																</div>
															</div><!--.form-group-->

														</div><!--.tab-pane-->
													</div><!--.tab-content-->

												</form>

											</div><!--.panel-body-->
											<div class="panel-footer">
												<ul class="wizard clearfix">
													<li class="bs-wizard-prev pull-left"><button class="btn btn-flat btn-default">Previous</button></li>
													<li class="bs-wizard-next pull-right"><button class="btn btn-blue">Next</button></li>
													<li class="bs-wizard-submit pull-right"><button data-projectID="{{$pro->project_id}}" type="submit" class="btn btn-blue update_project">Update</button></li>
												</ul>
											</div><!--.panel-footer-->
										</div><!--.panel-->
										
									</div>

								</div><!--.row-->
							</div><!--#photos.tab-pane-->
							<script type="text/javascript">
								$(document).ready(function(){

									$('#form{{$pro->project_id}}').bootstrapWizard();

								});
							</script>

						@endforeach

					@endif


					<div id="add_project" class="tab-pane">
						<div class="row">
							<div class="md-12">

								@if(($allow->number_of-$active_projects) > 0)
									<!-- add project form -->
									<div class="panel bs-wizard bs-wizard-progress">
										<div class="panel-heading" style=" background-color: #337ab7; ">
											<div class="panel-title">
												<h3 style="color:white !important;">Add Project
													<div class="progress progress-striped active">
														<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
													</div><!--.progress-->
												</h3>
												
											</div><!--.panel-title-->
										</div><!--.panel-heading-->
										<div class="panel-body">

											<form id="submit_pro" class="form-horizontal" action="{{url('user/add_project')}}" method="post" enctype="multipart/form-data">
												<input id="token" name="_token" type="text" value="{{csrf_token()}}" hidden>
												<ul class="hide">
													<li><a href="#tab1" data-toggle="tab">First</a></li>
													<li><a href="#tab2" data-toggle="tab">Second</a></li>
													<li><a href="#tab3" data-toggle="tab">Third</a></li>
													<li><a href="#tab4" data-toggle="tab">fourth</a></li>
												</ul>

												<div class="tab-content">
													<div class="tab-pane" id="tab1">
														<div class="form-group col-md-12">
															<label class="control-label col-md-2">Select Color</label>
															<div class="col-md-3">
																<div class="radioer">
																	<input type="radio" checked="" name="project_color" required="" id="radio1" value="#f34235">
																	<label for="radio1"><a class="btn btn-floating btn-red" style="margin-left: 80px;"></a></label>
																	
																</div><!--.radio-->
																<div class="radioer">
																	<input type="radio" name="project_color" required="" id="radio2" value="#e81d62">
																	<label for="radio2"><a class="btn btn-floating btn-pink" style="margin-left: 80px;"></a></label>
																	
																</div><!--.radio-->
																<div class="radioer">
																	<input type="radio" name="project_color" required="" id="radio3" value="#9b26af">
																	<label for="radio3"><a class="btn btn-floating btn-purple" style="margin-left: 80px;"></a></label>
																	
																</div><!--.radio-->
																<div class="radioer">
																	<input type="radio" name="project_color" required="" id="radio7" value="#f39c12">
																	<label for="radio7"><a class="btn btn-floating btn-orange" style="margin-left: 80px;"></a></label>
																	
																</div><!--.radio-->
															</div>
															<div class="col-md-3">
																<div class="radioer">
																	<input type="radio" name="project_color" required="" id="radio4" value="#2095f2">
																	<label for="radio4"><a class="btn btn-floating btn-blue" style="margin-left: 80px;"></a></label>
																	
																</div><!--.radio-->
																<div class="radioer">
																	<input type="radio" name="project_color" required="" id="radio5" value="#4bae4f">
																	<label for="radio5"><a class="btn btn-floating btn-green" style="margin-left: 80px;"></a></label>
																	
																</div><!--.radio-->
																<div class="radioer">
																	<input type="radio" name="project_color" required="" id="radio6" value="#feea3a">
																	<label for="radio6"><a class="btn btn-floating btn-yellow" style="margin-left: 80px;"></a></label>
																	
																</div><!--.radio-->
																<div class="radioer">
																	<input type="radio" name="project_color" required="" id="radio8" value="#785447">
																	<label for="radio8"><a class="btn btn-floating btn-brown" style="margin-left: 80px;"></a></label>
																	
																</div><!--.radio-->
															</div>
															<div class="col-md-4 " style="margin-top:20px;" id="test_card">
																<div class="card card-meal card-meal-green card-square card-shadow" style="margin-bottom:0px !important;">
																	<div class="card-heading heading" style="border-top-color:#f34235;">
																		<h3 class="card-title">Test Card <small class="pull-right">
																			Active
																		</small></h3>
																		<div class="card-subhead">
																			By <a style="color:#f34235;">{{Auth::User()->user_name}}</a>
																			<small class="pull-right"></small>
																		</div><!--.card-subhead-->
																	</div><!--.card-heading-->
																</div><!--.card-->
																<style type="text/css">
																	.img::before{
																		background-image: url({{url('assets/globals/img/picjumbo/12.jpg')}});
																	}
																</style>
																<div class="card card-news-more" style=" border-radius: 0px; margin-bottom:0px; ">
																	<div class="card-heading bg-image bg-opaque5 img">
																	
																		<div class="heading-content">
																			<a class="btn btn-floating btn-pink toggle-card-news-more"><i class="ion-more"></i></a>
																		</div>
																	</div><!--.card-heading-->
																	<div class="card-body">
																		<p></p>
																	</div><!--.card-body-->

																</div><!--.card-->

															</div>
														</div><!--.form-group-->

														<div class="row">
															
														</div>

													</div><!--.tab-pane-->
													<div class="tab-pane" id="tab2">
														<div class="form-group">
															<label class="control-label col-md-4">Category</label>
															<div class="col-md-5">
																<select class="selecter" id="cat_id" name="cat_id">

																	@if(count($categories) > 0)
																		@foreach($categories as $cat)

																			<option value="{{$cat->cat_id}}">{{$cat->cat_name}}</option>

																		@endforeach

																	@else
																		<option value="">Category Not Found</option>
																	@endif

																</select>
															</div>
														</div><!--.form-group-->
														<div class="form-group">
															<label class="control-label col-md-4">Project Title</label>
															<div class="col-md-5">
																<div class="inputer">
																	<div class="input-wrapper">
																		<input id="title" type="text" name="project_title" class="form-control" placeholder="Project title" required>
																	</div>
																</div>
															</div>
														</div><!--.form-group-->
														<div class="form-group">
															<label class="control-label col-md-4">Project Description</label>
															<div class="col-md-5">
																<div class="inputer">
																	<div class="input-wrapper">
																		<textarea id="project_desc" name="project_desc" class="form-control" rows="2" placeholder="Project Description.." required=""></textarea>
																	</div>
																</div>
															</div>
														</div><!--.form-group-->

													</div><!--.tab-pane-->

													<div class="tab-pane" id="tab3">
														
														<div class="form-group">
															<label class="control-label col-md-4">Project Image</label>
															<div class="image-editor col-md-4">

														      <input type="file" name="project_img" id="project_img" class="cropit-image-input" required="">
														      <p style="font-size:12px;">*Accepted formats are (Jpg, Jpeg)</p>
														      <div class="cropit-preview"></div>
														      <div class="image-size-label">
														        Resize image
														      </div>
														      <input type="range" class="cropit-image-zoom-input">

														      <label id="message" style="display:none;"></label>
														    </div>
														</div><!--.form-group-->
														<div class="form-group">
															<label class="control-label col-md-4">Project Audio File</label>
															<div class="fileinput fileinput-new" data-provides="fileinput">
																<span class="btn btn-default btn-file">
																	<span class="fileinput-new">Select file</span>
																	<span class="fileinput-exists">Change</span>
																	<input type="file" name="project_file" accept="audio/*">
																</span>
																<span class="fileinput-filename"></span>
																<a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
																<label class="control-label" style="margin-left:100px;">Optional</label>
															</div>
														</div><!--.form-group-->
													</div><!--.tab-pane-->

													<div class="tab-pane" id="tab4">
														<div class="form-group">
															<label class="control-label col-md-4">Size</label>
															<div class="col-md-5">
																<select multiple class="selecter" id="sizes" name="s_cat_id[]">

																	@if(count($sizes) > 0)
																		<option value="">Please Select</option>
																		@foreach($sizes as $size)

																			<option value="{{$size->s_cat_id}}" >{{$size->s_cat_name}}</option>

																		@endforeach

																	@else
																		<option value="">Size Not Found</option>
																	@endif

																</select>
																<div class="checkboxer">
																	<input type="checkbox" value="1" id="other">
																	<label style="margin-top:17px;" for="other">Other</label>
																</div><!--.checkbox-->
																<div class="inputer" id="type" style="display:none;">
																	<div class="input-wrapper">
																		<input type="text"  name="type" value="Other" class="form-control" placeholder="Other">
																	</div>
																</div>
															</div>
														</div><!--.form-group-->
														<div class="form-group">
															<label class="control-label col-md-4">Project Price</label>
															<div class="col-md-5">
																<div class="inputer">
																	<div class="input-wrapper">
																		<input type="text" id="project_price" name="project_price" class="form-control" placeholder="Project Price" required>
																	</div>
																</div>
															</div>
														</div><!--.form-group-->
														
													</div><!--.tab-pane-->

												</div><!--.tab-content-->
												</form>

										</div><!--.panel-body-->
										<div class="panel-footer">
											<ul class="wizard clearfix">
												<li class="bs-wizard-prev pull-left" style=" background-color: #2095f2;"><button class="btn btn-flat" style="color:white;">Previous</button></li>
												<li><h3 style=" text-align: center;margin-bottom: 0px;font-weight: bold;font-size: 23px;color: #2095f2; ">Remaing Projects is @if(count($projects) > 0) {{$allow->number_of-$active_projects}} @else {{$allow->number_of}} @endif</h3></li>
												<li class="bs-wizard-next pull-right"><button class="btn btn-blue">Next</button></li>
												<li class="bs-wizard-submit pull-right" id="submit_project"><button class="btn btn-blue">Preview</button></li>
											</ul>
										</div><!--.panel-foter-->
									</div><!--.panel-->

								@else

									<h3>Free Package is Expired </h3>
									<a href="{{url('seller/purchase')}}" style="margin:10px 0px 50px 0px" class="btn btn-info">Purchase</a>

								@endif
								<!-- end project form -->
							</div>

						</div><!--.row-->
					</div><!--#photos.tab-pane-->


					<div id="salles" class="tab-pane">
						<div class="row image-row">

						</div><!--.row-->
					</div><!--#photos.tab-pane-->

					<div id="orders" class="tab-pane">
						<div class="row">

							<div class="col-md-12">
								@if(count($deals) > 0)
									<div class="panel">
										<div class="panel-heading">
											<div class="panel-title"><h4>Orders</h4></div>
										</div><!--.panel-heading-->
										<div class="panel-body">

											<div class="overflow-table" style=" overflow-x: hidden !important; ">
											<table class="display datatables-basic">
												<thead>
													<tr >
														<th style=" text-align: center !important; ">Buyer</th>
														<th style=" text-align: center !important; ">Address</th>
														<th style=" text-align: center !important; ">Contact</th>
														<th style=" text-align: center !important; ">Project title</th>
														<th style=" text-align: center !important; ">Items</th>
														<th style=" text-align: center !important; ">Price</th>
														<th style=" text-align: center !important; ">Status</th>
														<th style=" text-align: center !important; ">Action</th>
													</tr>
												</thead>
												<tbody>
													

														@foreach($deals as $deal)

														
															<tr style=" text-align: center; ">
																<td>{{$deal->buyer->user_name}}</td>
																<td>{{$deal->address}}</td>
																<td>{{$deal->phone_no}}</td>
																<td>{{$deal->project->project_title}}</td>
																<td>{{$deal->total_items}}</td>
																<td>{{$deal->total_price}}</td>
																<td>{{$deal->deal_status}}</td>
																<td>
																	@if($deal->deal_status == 'Pending')
																		<button class="btn btn-flat btn-green" data-toggle="modal" data-target="#accept{{$deal->deal_id}}" >Accept</button>
																		<button class="btn btn-flat btn-red btn-ripple" data-toggle="modal" data-target="#reject{{$deal->deal_id}}" >Reject</button>
																	@elseif($deal->deal_status == 'Active')
																		
																		<button class="btn btn-flat btn-green btn-ripple">
																			Accepted
																		</button>

																	@elseif($deal->deal_status == 'Canceled')
																		<button class="btn btn-flat btn-red btn-ripple">
																			Rejected
																		</button>
																	@endif
																</td>
															</tr>
														
														@endforeach


													
												</tbody>
											</table>
											</div><!--.overflow-table-->

										</div><!--.panel-body-->
									</div><!--.panel-->
								@else
									<h4>Record Not Found</h4>
								@endif
							</div>

						</div><!--.row-->
					</div><!--#photos.tab-pane-->
					
					
				</div><!--.tab-content-->
			</div><!--.col-->
		</div><!--.row-->

		@if(count($projects) > 0)

			@foreach($projects as $pro)

				<div class="modal scale fade" id="modal{{$pro->project_id}}" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" style=" text-align: center; ">Confirmation</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-md-6">
										<button type="button" class="col-md-12 btn btn-primary" data-dismiss="modal">Close</button>
									</div>
									<div class="col-md-6">
										@if($pro->project_status == "1")
											<a href="{{url('project/delete/'.$pro->project_id)}}" class="col-md-12 btn btn-danger">
												Confirm
											</a>
										@else
											<a href="{{url('project/active/'.$pro->project_id)}}" class="col-md-12 btn btn-info">
												Confirm
											</a>
										@endif
									</div>
								</div>
							</div>
						</div><!--.modal-content-->
					</div><!--.modal-dialog-->
				</div><!--.modal-->

				<div class="modal scale fade" id="delete{{$pro->project_id}}" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" style=" text-align: center; ">Confirmation</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-md-6">
										<button type="button" class="col-md-12 btn btn-primary" data-dismiss="modal">Close</button>
									</div>
									<div class="col-md-6">
											<a href="{{url('project/delete_forever/'.$pro->project_id)}}" class="col-md-12 btn btn-info">
												Confirm
											</a>
									</div>
								</div>
							</div>
						</div><!--.modal-content-->
					</div><!--.modal-dialog-->
				</div><!--.modal-->

			@endforeach

		@endif

		@if(count($deals) > 0)

			@foreach($deals as $deal)

				<div class="modal scale fade" id="accept{{$deal->deal_id}}" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" style=" text-align: center; ">Confirmation</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-md-6">
										<button type="button" class="col-md-12 btn btn-primary" data-dismiss="modal">Close</button>
									</div>
									<div class="col-md-6">
										<a href="{{url('seller/accepted/'.$deal->deal_id)}}" class="col-md-12 btn btn-info">
											Confirm
										</a>
									</div>
								</div>
							</div>
						</div><!--.modal-content-->
					</div><!--.modal-dialog-->
				</div><!--.modal-->

				<div class="modal scale fade" id="reject{{$deal->deal_id}}" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" style=" text-align: center; ">Confirmation</h4>
							</div>
							<div class="modal-body">
								<form action="{{url('seller/reject')}}" method="post">
									<input id="token" name="_token" type="text" value="{{csrf_token()}}" hidden>
									<input id="token" name="deal_id" type="text" value="{{$deal->deal_id}}" hidden>
									
									<div class="row">
										<div class="col-md-6 col-md-offset-3">
											<input type="text" name="reason" class="form-control" placeholder="For Reason" id="reason" required="" style="margin-bottom:10px;border-bottom:1px solid green;">
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<button type="button" class=" col-md-12 btn btn-primary" data-dismiss="modal">Close</button>
										</div>
										<div class="col-md-6">
											<button class="col-md-12 btn btn-info" type="submit">
												Confirm
											</button>
										</div>
									</div>


								</form>
							</div>
						</div><!--.modal-content-->
					</div><!--.modal-dialog-->
				</div><!--.modal-->

			@endforeach

		@endif

		<a data-toggle="modal" data-target="#error" style="display:none;" id="click"></a>

		<div class="modal scale fade" id="error" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" style=" text-align: center; ">To Large! Allow Max 1MB</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-md-2 col-md-offset-10">
										<button type="button" class="col-md-12 btn btn-primary" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div><!--.modal-content-->
					</div><!--.modal-dialog-->
				</div><!--.modal-->

		

		<script type="text/javascript">
			
			$(document).ready(function(){

				$('#other').on('click', function(){

					if($(this).prop('checked') == true){

						$(this).closest('.col-md-5').find('#sizes').prop('disabled', true);
						$(this).closest('.col-md-5').find('#type').show();

					}else{

						$(this).closest('.col-md-5').find('#sizes').prop('disabled', false);
						$(this).closest('.col-md-5').find('#type').hide();

					}

				});

				

				$('input[name=project_color]').on('click', function(){

					var color = $(this).val();
					console.log($('#test_card').find('.heading'));
					$('#test_card').find('.heading').css('border-top-color', color);
					$('#test_card').find('.card-subhead').find('a').css('color', color);

				});

				$('#order_dash').on('click', function(){

					$('#order_nav').closest('ul').find('li.active').removeClass('active');
					$('#order_nav').closest('li').addClass('active');

				});

				$('div.play').on('click', function(){
					
					if($('#audio_play')[0].paused == true){
						$(this).find('.play_i').hide();
						$(this).find('.pause_i').show();
						$('#audio_play')[0].play();
					}else{
						$(this).find('.play_i').show();
						$(this).find('.pause_i').hide();
						$('#audio_play')[0].pause();
					}

				});

				$('#old_password').on('blur', function(){

					var password = $(this).val();

					if(password != ""){

						$.ajax({
			            type: "get",
			              url: '{{ url("check_password")}}/'+password,
			              dataType: ''
			            }).success(function(res) {

			              if(res == 'false'){

			              	$('#old_password').closest('.inputer').removeClass('inputer-green');
			              	$('#old_password').closest('.inputer').addClass('inputer-red');
			                $('#old_password').closest('.input-wrapper').addClass('active');
			                $('#old_password').val("");
			                $('#old_password').attr('placeholder', 'Wrong Password');

			              }else{

			              	$('#old_password').closest('.inputer').removeClass('inputer-red');
			              	$('#old_password').closest('.inputer').addClass('inputer-green');
                			$('#old_password').closest('.input-wrapper').addClass('active');

			              }

			            });

					}

				});

				$('.change_password').on('click', function(e){
					e.preventDefault();

			      var new_pass = $('#new_password').val();
			      var confirm_pass = $('#confirm_password').val();
			       
			      if(new_pass.length >= 8){
			      	console.log(new_pass.length);
			      	if(new_pass == confirm_pass){

				      	$('#confirm_password').closest('.inputer').removeClass('inputer-red');
				        $('#confirm_password').closest('.inputer').addClass('inputer-green');
	                	$('#confirm_password').closest('.input-wrapper').addClass('active');
	                	$('#ch_password').submit();
				      }else{

				      	$('#confirm_password').closest('.inputer').removeClass('inputer-green');
				        $('#confirm_password').closest('.inputer').addClass('inputer-red');
		                $('#confirm_password').closest('.input-wrapper').addClass('active');

				      }

			      }else{
			      	$('#new_password').val('');
			       	$('#confirm_password').val('');
			      	alert('Password Min 8 Characters');

			      }

			    });

			    $('#click_upload').on('click', function(e){
			    	e.preventDefault();
			    	$('#profile_banner').click();

			    });

				var _URL = window.URL || window.webkitURL;
				$("#profile_banner").change(function (e) {
				    var file, img;
				    if ((file = this.files[0])) {

				        img = new Image();
				        img.onload = function () {
				            
				            if(this.width < 1599 && this.height < 749){
				            	alert("To small banner please upload 1600 * 750 or big");

				            	$('#profile_banner').closest('#banner_parent').find('a.fileinput-exists').click();

				            }else{
				            	$('#banner_form').submit();
				            }

				        };
				        img.src = _URL.createObjectURL(file);
				    }
				});
				$("#project_img").change(function (e) {
				    var file, img;
				    if ((file = this.files[0])) {
				    	var size = this.files[0].size / 1024;
				    	console.log(size);
				        img = new Image();
				        img.onload = function () {
				            
				            if(size < 1000){

				            	if(this.width < 399 && this.height < 419){
					            	alert("To small banner please upload 400 * 420 or big");

					            	$('#project_img').val("");

					            }

				            }else{
				            	$('#project_img').val("");
				            	$('#click').click();


				            }

				        };
				        img.src = _URL.createObjectURL(file);
				    }
				});

				$(function() {
		        $('.image-editor').cropit({
		          imageState: {
		            src: 'http://lorempixel.com/640/480/',
		          },
		        });

		        $('.rotate-cw').click(function() {
		          $('.image-editor').cropit('rotateCW');
		        });
		        $('.rotate-ccw').click(function() {
		          $('.image-editor').cropit('rotateCCW');
		        });

		        $('#submit_project').click(function() {
		          var imageData = $('.image-editor').cropit('export', {
															  type: 'image/jpeg',
															  quality: .9,
															  originalSize: true
															});
		          var result = imageData.split(';');
		          var second = result[1].split(',');
		          var final = result[0]+';'+second[1];

		          // $(this).closest('.form-group').find('#project_img').remove();
		          var input = '<input type="hidden" name="project_img_data" id="project_img" value="'+second[1]+'">';
		          $('#submit_pro').append(input);

		          if(second[1] != ""){
					
					$('#submit_pro').submit();
		          	
		          }else{
		          	alert('Please Select A Image');
		          }
		          
		        });
		      });

				$('#number_of').on('blur', function(){

					var per_project = '{{$allow->per_project}}';
					var number_of = $(this).val();
					console.log(number_of);
					if(number_of != ""){
						$('#price').val("");

						var result = parseInt(per_project)*parseInt(number_of);

						$('#price').val(result);

					}

				});

				// $('#submit_project').on('click', function(){
					
				// 	$('#submit_pro').submit();

				// });

				$('#preview').on('click', function(){

					var price = $('#project_price').val();
					if(price != ""){
						
						var color = $('input[name=project_color]:checked').val();
						var cat = $('#cat_id option:selected').html();
						var title = $('#title').val();
						var desc = $('#project_desc').val();
						var img = $('.cropit-preview').find('img').attr('src');
						console.log(title);
						$('#heading').css('border-top-color', color);
						$('#user_name').css('color', color);
						$('.img_preview').css('background-image', 'url('+img+')');
						$('.img_preview').css('background-repeat', 'no-repeat');
						$('.price_preview').html(price);
						$('.desc_preview').html(desc);
						$('.cat_name').html(cat);
						$('.card_title').html(title);
						
						$('#sizes :selected').each(function(i, selected){ 
						  
							if(selected.text == 'Small'){
								$('.small').show();
							}
							if(selected.text == 'Medium'){
								$('.medium').show();
							}
							if(selected.text == 'Large'){
								$('.large').show();
							}

						});

					}

					$('#submit_pro').on(function(e){
						e.preventDefault();
					});

				});

				


				$('.update_project').on('click', function(){

					var project_id = $(this).attr('data-projectID');

					$('.'+project_id+'').submit();

				});

			});

			$('.send_vote').on('click', function(){
				var vote = $(this).attr('data-projectID');
				
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


		</script>
                    
@stop

@section('foot')
    
	@parent
    

@stop


