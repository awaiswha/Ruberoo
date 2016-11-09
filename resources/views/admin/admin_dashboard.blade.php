@extends('admin.layout')

@section('title', 'Dashboard')


@section('content')
	
	<style type="text/css">
		.bg-image.bg-opaque5::before{
			opacity: 1 !important;
		}
	</style>

	<div class="page-header full-content parallax" style="height: 281px; overflow: hidden">
			<!-- <div class="parallax-bg" style="background: url(@if(Auth::User()->profile->profile_banner == '') {{url('assets/globals/img/picjumbo/large/24.jpg')}} @else {{url('assets/upload/images/'.$user->profile->profile_banner)}} @endif) 50% 50%; background-size: cover; width: 100%; height: 100%; position: absolute; left: 0; top: 0;">
			</div> -->

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
						<li><a href="#">{{Auth::User()->user_name}}</a></li>
						<li><a href="#profile" data-toggle="tab" class="btn-ripple">Profile</a></li>
					</ol>
				</div><!--.col-->
			</div><!--.row-->

			<div class="header-tabs scrollable-tabs sticky">
				<ul class="nav nav-tabs tabs-active-text-white tabs-active-border-yellow" style="width: none !important;">
					<li class="active"><a href="{{url('buyer/dashboard')}}" class="btn-ripple">Dashboard</a></li>
					<!-- <li><a href="#profile" data-toggle="tab" class="btn-ripple">Profile</a></li> -->
					@if(Auth::User()->user_role_idFk == 1)
						<li><a href="#admin" data-toggle="tab" class="btn-ripple">Create Admin</a></li>
					@endif
					<li><a href="#users" data-toggle="tab" class="btn-ripple">Users</a></li>
					<li><a href="#categories" data-toggle="tab" class="btn-ripple">Categories</a></li>
					<li><a href="#orders" data-toggle="tab" class="btn-ripple">Orders</a></li>
					<li><a href="#payment_history" data-toggle="tab" class="btn-ripple">Financials</a></li>
					<li><a href="#performers" data-toggle="tab" class="btn-ripple">Performers</a></li>
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
								<div class="card card-iconic card-blue">
									<div class="card-full-icon ion-happy"></div>

									<div class="card-body">
										<i class="card-icon ion-clipboard"></i>
										<h4><b>Orders</b></h4>
										<a class="btn btn-floating btn-orange">45</a>
									</div><!--.card-body-->

								</div><!--.card-->
							</div><!--.col-md-3-->

							<div class="col-md-4">
								<div class="card card-iconic card-green">
									<div class="card-full-icon ion-thumbsup"></div>

									<div class="card-body">
										<i class="card-icon ion-person"></i>
										<h4><b>Visitor's</b></h4>
										<button class="btn btn-floating btn-blue">45</button>
									</div><!--.card-body-->

								</div><!--.card-->
							</div><!--.col-md-3-->

							<div class="col-md-4">
								<div class="card card-iconic card-yellow">
									<div class="card-full-icon ion-arrow-graph-up-right"></div>

									<div class="card-body">
										<i class="card-icon ion-card"></i>
										<h4><b>Performers</b></h4>
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

					<div id="admin" class="tab-pane">
						<div class="row">
							
							<div class="col-md-12">
								
								<div class="panel bs-wizard bs-wizard-progress">
									<div class="panel-heading" style=" background-color: #337ab7; ">
										<div class="panel-title">
											<h4 style="color:white !important;">Add Admin</h4>
											<div class="progress progress-striped active">
												<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
											</div><!--.progress-->
										</div><!--.panel-title-->
									</div><!--.panel-heading-->
									<div class="panel-body">

										<form id="add_admin" class="form-horizontal" action="{{url('admin/add_admin')}}" method="post">
											<input id="token" name="_token" type="text" value="{{csrf_token()}}" hidden>
											<ul class="hide">
												<li><a href="#tab1" data-toggle="tab">First</a></li>
												<li><a href="#tab2" data-toggle="tab">Second</a></li>
											</ul>

											<div class="tab-content">
												<div class="tab-pane" id="tab1">
													<div class="form-group">
														<label class="control-label col-md-4">User Name</label>
														<div class="col-md-5">
															<input id="name" type="text" name="user_name" class="form-control" required>
														</div>
													</div><!--.form-group-->
													<div class="form-group">
														<label class="control-label col-md-4">First Name</label>
														<div class="col-md-5">
															<input id="name" type="text" name="first_name" class="form-control"  required>
														</div>
													</div><!--.form-group-->
													<div class="form-group">
														<label class="control-label col-md-4">Last Name</label>
														<div class="col-md-5">
															<input id="name" type="text" name="last_name" class="form-control" required>
														</div>
													</div><!--.form-group-->
													
												</div><!--.tab-pane-->

												<div class="tab-pane" id="tab2">

													<div class="form-group">
														<label class="control-label col-md-4">Email</label>
														<div class="col-md-5">
															<div class="inputer">
																<div class="input-wrapper">
																	<input id="email" type="email" name="email" class="form-control" required>
																</div>
															</div>
														</div>
													</div><!--.form-group-->
													<div class="form-group">
														<label class="control-label col-md-4">Password</label>
														<div class="col-md-5">
															<div class="inputer">
																<div class="input-wrapper">
																	<input id="password" type="password" name="password" class="form-control"  required>
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
											<li class="bs-wizard-next pull-right" id="preview"><button class="btn btn-blue">Next</button></li>
											<li class="bs-wizard-submit pull-right" id="submit_admin"><button class="btn btn-blue">Save</button></li>
										</ul>
									</div><!--.panel-foter-->
								</div><!--.panel-->

							</div>

						</div><!--.row-->
					</div><!--#about.tab-pane-->

					<div id="users" class="tab-pane">
						<div class="row">
							
							<div class="col-md-12">
								@if(count($users) > 0)
									<div class="panel">
										<div class="panel-heading">
											<div class="panel-title"><h4>Users</h4></div>
										</div><!--.panel-heading-->
										<div class="panel-body">

											<div class="overflow-table" style=" overflow-x: hidden !important; ">
												<button class="btn col-md-1 filter col-md-offset-4 btn-primary" data-value="All">All</button>
												@if(Auth::User()->user_role_idFk == 1)
													<button class="btn col-md-1 filter btn-primary" data-value="Admin" style="margin-left:10px;">Admin</button>
												@endif
												<button class="btn col-md-1 filter btn-primary" data-value="Seller" style="margin:0px 10px;">Seller</button>
												<button class="btn col-md-1 filter btn-primary" data-value="Buyer">Buyer</button>
											<table class="display datatables-basic">
												<thead>
													<tr >
														<th style=" text-align: center !important; ">Name</th>
														<th style=" text-align: center !important; ">Role</th>
														<th style=" text-align: center !important; ">Phone No</th>
														<th style=" text-align: center !important; ">Email</th>
														<th style=" text-align: center !important; ">Status</th>
														<th style=" text-align: center !important; ">Action</th>
													</tr>
												</thead>
												<tbody>
													

														@foreach($users as $user)

														
															<tr style=" text-align: center; ">
																<td>
																	@if($user->user_role_idFk == 3)
																		<a href="{{url('user/profile/'.$user->user_id)}}">{{$user->user_name}}</a>
																	@else
																		{{$user->user_name}}
																	@endif
																</td>
																<td>{{$user->caption->role_title}}</td>
																<td>{{$user->profile->phone_no}}</td>
																<td>{{$user->email}}</td>
																<td>
																	@if($user->user_status == '1')
																		{{'Active'}}
																	@else
																		{{'Disabled'}}
																	@endif
																</td>
																<td>
																	@if($user->user_status == '1')
																		<button class="btn btn-flat btn-red btn-ripple" data-toggle="modal" data-target="#{{$user->user_id}}" >Block</button>

																	@else
																		<button class="btn btn-flat btn-green btn-ripple" data-toggle="modal" data-target="#{{$user->user_id}}" >Un Block</button>
																	@endif
																</td>
															</tr>

														@endforeach

													
												</tbody>
											</table>
											</div><!--.overflow-table-->

										</div><!--.panel-body-->
									</div><!--.panel-->
									<script type="text/javascript">
										$(document).ready(function(){

											$('.filter').on('click', function(){

												var value = $(this).attr('data-value');

												if(value == 'All'){

													$('.overflow-table').find('.input-sm').val("");
													$('.input-sm').keyup();

												}else{

													$('.overflow-table').find('.input-sm').val(value);
													$('.input-sm').keyup();

												}

											});

										});
									</script>
								@else
									<h4>Record Not Found</h4>
								@endif
							</div>

						</div><!--.row-->
					</div><!--#about.tab-pane-->

					<div id="categories" class="tab-pane">
						<div class="row">
							<div class="col-md-3">
								<ul class="nav nav-tabs borderless vertical">
									<li class="active"><a href="#cat_overview" data-toggle="tab">Overview</a></li>
									<li><a href="#add_category" data-toggle="tab">Add Category</a></li>
								</ul>
							</div><!--.col-md-3-->
							<div class="col-md-9">
								<div class="tab-content">

									<div class="tab-pane active" id="cat_overview">
										<div class="legend">Defult Categories</div>
										
										@if(count($categories) > 0)

											@foreach($categories as $cat)

												<div class="row" style="margin-bottom:15px;">
													<div class="col-md-5">{{$cat->cat_name}}</div><!--.col-md-3-->
													<div class="col-md-3">
														<a href="{{url('cat/delete/'.$cat->cat_id)}}" class="btn pull-right btn-floating btn-smal btn-danger"><i class="ion-android-delete"></i></a>
													</div><!--.col-md-3-->
												</div><!--.row-->

											@endforeach

										@else

											<div class="row" style="margin-bottom:15px;">
												<div class="col-md-5">No Category Added</div><!--.col-md-3-->
												<div class="col-md-3">
													<a href="#add_category" class="btn btn-info" data-toggle="tab">Add Category</a>
												</div><!--.col-md-3-->
											</div><!--.row-->

										@endif
										
									</div><!--#about_overview.tab-pane-->

									<div class="tab-pane" id="add_category">

										@if(count($categories) > 0)

											@foreach($categories as $cat)

												<form action="{{url('user/update_category')}}" method="post">
													<input id="token" name="_token" type="text" value="{{csrf_token()}}" hidden>
													<input id="token" name="cat_id" type="text" value="{{$cat->cat_id}}" hidden>
													<div class="row">

														<div class="col-xs-8">
															<label>Category Name</label>
															<div class="form-group">
													          <div class="inputer">
													            <div class="input-wrapper">
													              <input type="text" name="cat_name" value="{{$cat->cat_name}}" class="form-control" required="">
													            </div>
													          </div>
													        </div>
														</div>

													</div>

													<div class="row">

														<div class="col-xs-8">
															<button type="submit" class="btn btn-success pull-right">Update</button>
														</div>

													</div>

												</form>

											@endforeach

										@endif

										<form action="{{url('user/add_category')}}" method="post">
											<input id="token" name="_token" type="text" value="{{csrf_token()}}" hidden>
											<div class="row">

												<div class="col-xs-8">
													<label>New Category</label>
													<div class="form-group">
											          <div class="inputer">
											            <div class="input-wrapper">
											              <input type="text" name="cat_name" value="{{$user->cat_name}}" class="form-control" placeholder="Category Name Here" required="">
											            </div>
											          </div>
											        </div>
												</div>

											</div>

											<div class="row">

												<div class="col-xs-8">
													<button type="submit" class="btn btn-success pull-right">Save</button>
												</div>

											</div>

										</form>
									</div>
								</div><!--.tab-content-->

							</div><!--.col-md-9-->
						</div><!--.row-->
					</div><!--#about.tab-pane-->

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
														<th style=" text-align: center !important; ">Seller</th>
														<th style=" text-align: center !important; ">Project title</th>
														<th style=" text-align: center !important; ">Items</th>
														<th style=" text-align: center !important; ">price</th>
														<th style=" text-align: center !important; ">Status</th>
													</tr>
												</thead>
												<tbody>
													

														@foreach($deals as $deal)
														
															<tr style=" text-align: center; ">
																<td>{{$deal->buyer->user_name}}</td>
																<td>
																	<a href="{{url('user/profile/'.$deal->seller->user_id)}}">{{$deal->seller->user_name}}</a>
																</td>
																<td>{{$deal->project->project_title}}</td>
																<td>{{$deal->total_items}}</td>
																<td>{{$deal->total_price}}</td>
																<td>{{$deal->deal_status}}</td>
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

					<div id="payment_history" class="tab-pane">
						<div class="row">
							
							<div class="col-md-12">
								@if(count($history) > 0)
									<div class="panel">
										<div class="panel-heading">
											<div class="panel-title"><h4>Users</h4></div>
										</div><!--.panel-heading-->
										<div class="panel-body">

											<div class="overflow-table" style=" overflow-x: hidden !important; ">
											<table class="display datatables-basic">
												<thead>
													<tr >
														<th style=" text-align: center !important; ">Name</th>
														<th style=" text-align: center !important; ">Projects</th>
														<th style=" text-align: center !important; ">Amount Due</th>
														<th style=" text-align: center !important; ">Amount Paid</th>
														<th style=" text-align: center !important; ">Phone No</th>
														<th style=" text-align: center !important; ">Status</th>
														<th style=" text-align: center !important; ">Payment</th>
														<th style=" text-align: center !important; ">Action</th>
													</tr>
												</thead>
												<tbody>
													

														@foreach($history as $user)

														
															<tr style=" text-align: center; ">
																<td>{{$user->user->user_name}}</td>
																<td>{{count($user->user->projects)}}</td>
																<td>
																	{{$user->per_project}}
																</td>
																<td>
																	@if($user->allow_status == 0)
																		{{'0'}}
																	@else
																		{{$user->per_project}}
																	@endif
																</td>
																<td>{{$user->user->profile->phone_no}}</td>
																<td>
																	@if($user->user->user_status == '1')
																		{{'Active'}}
																	@else
																		{{'Disabled'}}
																	@endif
																</td>
																<td>
																	@if($user->allow_status == 0)
																		<button class="btn btn-flat btn-info btn-ripple" data-toggle="modal" data-target="#payment{{$user->user->user_id}}" >Receive</button>
																	@else
																		<button class="btn btn-flat btn-success btn-ripple">
																			Received
																		</button>
																	@endif
																</td>
																<td>
																	@if($user->user->user_status == '1')
																		<button class="btn btn-flat btn-red btn-ripple" data-toggle="modal" data-target="#{{$user->user->user_id}}" >Block</button>

																	@else
																		<button class="btn btn-flat btn-green btn-ripple" data-toggle="modal" data-target="#{{$user->user->user_id}}" >Un Block</button>
																	@endif
																</td>
															</tr>
														
														@endforeach

													
												</tbody>
											</table>
											</div><!--.overflow-table-->

										</div><!--.panel-body-->
									</div><!--.panel-->
									<script type="text/javascript">
										$(document).ready(function(){

											$('.filter').on('click', function(){

												var value = $(this).attr('data-value');

												if(value == 'All'){

													$('.overflow-table').find('.input-sm').val("");
													$('.input-sm').keyup();

												}else{

													$('.overflow-table').find('.input-sm').val(value);
													$('.input-sm').keyup();

												}

											});

										});
									</script>
								@else
									<h4>Record Not Found</h4>
								@endif
							</div>

						</div><!--.row-->
					</div><!--#about.tab-pane-->

					<div id="performers" class="tab-pane">
						<div class="row">
							<div class="col-md-3">
								<ul class="nav nav-tabs borderless vertical">
									<li class="active"><a href="#design" data-toggle="tab">By Designs</a></li>
									<li><a href="#designer" data-toggle="tab">By Designers</a></li>
								</ul>
							</div><!--.col-md-3-->
							<div class="col-md-9">
								<div class="tab-content">

									<div class="tab-pane active" id="design">

										<div class="col-md-12">
										@if(count($most_likes) > 0)
											@foreach($most_likes as $pro)
												<div class="col-md-6">
													<div class="card card-meal card-meal-green card-square card-shadow" style="margin-bottom:0px !important;">
														<div class="card-heading">
															<h3 class="card-title">{{$pro->project->project_title}} <small class="pull-right">
																@if($pro->project->project_status == "1")
																	{{'Active'}}
																@else
																	{{'Disabeld'}}
																@endif
															</small></h3>
															<div class="card-subhead">
																By <a href="{{url('user/profile/'.$pro->project->user_idFk)}}">{{$pro->project->user->user_name}}</a>
																<small class="pull-right">{{$pro->project->category->cat_name}}</small>
															</div><!--.card-subhead-->
														</div><!--.card-heading-->
													</div><!--.card-->
													<style type="text/css">
														.img{{$pro->project->project_id}}::before{
															background-image: url({{url('assets/upload/images/'.$pro->project->img[0]->project_img)}});
														}
													</style>
													
													<div class="card card-news-more" style=" border-radius: 0px; margin-bottom:0px; ">
														<div class="card-heading bg-image bg-opaque5 img{{$pro->project->project_id}}">
															<div class="heading-content">
																<button class="btn btn-floating btn-pink toggle-card-news-more"><i class="ion-more"></i></button>
															</div>
														</div><!--.card-heading-->
														<div class="card-body">
															<p>{{$pro->project->project_desc}}</p>
														</div><!--.card-body-->

													</div><!--.card-->

													<div class="card card-meal card-meal-green card-square card-shadow">
														<div class="card-footer">
															<button class="btn btn-floating btn-green vote_count" data-vote="{{$pro->count}}">{{$pro->count}}</button>
																
																
																<span class="headline" style="margin: 4px 0px;"></span>
																<?php $items = count($pro->project->size); ?>
																@if($items != 0)

																	@for($i = 0; $i < $items; $i++)
																		@if($pro->project->size[$i]->size->s_cat_name == 'Small')
																			<button class="btn btn-floating btn-green">S</button>
																		@elseif($pro->project->size[$i]->size->s_cat_name == 'Medium')
																			<button class="btn btn-floating btn-green">M</button>
																		@elseif($pro->project->size[$i]->size->s_cat_name == 'Large')
																			<button class="btn btn-floating btn-green">L</button>
																		@endif
																	@endfor

																@endif
																<button class="btn btn-green" style="float:right;">{{$pro->project->project_price}} Rs</button>
														</div><!--.card-footer-->
													</div><!--.card-->

												</div>

											@endforeach
										@else
											<h4>Record Not Found</h4>
										@endif
									</div>

									</div><!--#about_overview.tab-pane-->

									<div class="tab-pane" id="designer">

										<div class="col-md-12">
										@if(count($history) > 0)
											<div class="panel">
												<div class="panel-heading">
													<div class="panel-title"><h4>Desinger's</h4></div>
												</div><!--.panel-heading-->
												<div class="panel-body">

											<div class="overflow-table" style=" overflow-x: hidden !important; ">
												<table class="display datatables-basic">
													<thead>
														<tr >
															<th style=" text-align: center !important; ">Name</th>
															<th style=" text-align: center !important; ">Rating</th>
															<th style=" text-align: center !important; ">Projects</th>
															<th style=" text-align: center !important; ">Status</th>
														</tr>
													</thead>
													<tbody>
														

															@foreach($history as $user)

															
																<tr style=" text-align: center; ">
																	<td>{{$user->user->user_name}}</td>
																	<td>{{count($user->user->projects)}}</td>
																	<td>{{count($user->user->projects)}}</td>
																	<td>
																		@if($user->allow_status == 0)
																			<button class="btn btn-flat btn-info btn-ripple" data-toggle="modal" data-target="#payment{{$user->user->user_id}}" >Receive</button>
																		@else
																			<button class="btn btn-flat btn-success btn-ripple">
																				Received
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

									</div>

								</div><!--.tab-content-->

							</div><!--.col-md-9-->
						</div><!--.row-->
					</div><!--#about.tab-pane-->
					
					
				</div><!--.tab-content-->
			</div><!--.col-->
		</div><!--.row-->

		@if(count($users) > 0)

			@foreach($users as $user)

				<div class="modal scale fade" id="{{$user->user_id}}" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" style=" text-align: center; ">Confirmation</h4>
							</div>
							<div class="modal-body">
								@if($user->user_status == '1')

									<form action="{{url('user/delete')}}" method="post">
										<input id="token" name="_token" type="text" value="{{csrf_token()}}" hidden>
										<input id="token" name="user_id" type="text" value="{{$user->user_id}}" hidden>
										
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

								@else

									<div class="row">
										<div class="col-md-6">
											<button type="button" class=" col-md-12 btn btn-primary" data-dismiss="modal">Close</button>
										</div>
										<div class="col-md-6">
											<a href="{{url('user/active/'.$user->user_id)}}" class="col-md-12 btn btn-info">
												Confirm
											</a>
										</div>
									</div>

								@endif
								
							</div>
						</div><!--.modal-content-->
					</div><!--.modal-dialog-->
				</div><!--.modal-->

				<div class="modal scale fade" id="payment{{$user->user_id}}" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" style=" text-align: center; ">Confirmation</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-md-6">
										<button type="button" class=" col-md-12 btn btn-primary" data-dismiss="modal">Close</button>
									</div>
									<div class="col-md-6">
										
										<a href="{{url('user/payment_confirm/'.$user->user_id)}}" class="col-md-12 btn btn-info">
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

		<script type="text/javascript">
			$(document).ready(function(){

				$('#old_password').on('blur', function(){

					var password = $(this).val();

					if(password != ""){

						$.ajax({
			            type: "get",
			              url: '{{ url("check_password")}}/'+password,
			              dataType: ''
			            }).success(function(res) {

			              if(res == 'false'){

			              	$('#old_password').closest('.inputer').addClass('inputer-red');
			                $('#old_password').closest('.input-wrapper').addClass('active');
			                $('#old_password').val("");
			                $('#old_password').attr('placeholder', 'Wrong Password');

			              }else{

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

				var _URL = window.URL || window.webkitURL;
				$("#profile_banner").change(function (e) {
				    var file, img;
				    if ((file = this.files[0])) {
				        img = new Image();
				        img.onload = function () {
				            
				            if(this.width < 1599 && this.height < 749){
				            	alert("To small banner please upload 1600 * 750 or big");

				            	$('#profile_banner').closest('#banner_parent').find('a.fileinput-exists').click();

				            }

				        };
				        img.src = _URL.createObjectURL(file);
				    }
				});

				$('#email').on('blur', function(){

		          var email = $('#email').val();

		          if(email != ""){

		            $.ajax({
		            type: "get",
		              url: '{{ url("check_email")}}/'+email,
		              dataType: ''
		            }).success(function(res) {

		              if(res == '0'){

		                $('#email').closest('.inputer').addClass('inputer-green');
		                $('#email').closest('.input-wrapper').addClass('active');

		                $('#register').submit();

		              }else{

		                $('#email').closest('.inputer').addClass('inputer-red');
		                $('#email').closest('.input-wrapper').addClass('active');
		                $('#email').val("");
		                $('#email').attr('placeholder', 'Email Already Register');

		              }

		            });

		          }


		        });

				$('#submit_admin').on('click', function(){

					$('#add_admin').submit();

				});

			});


		</script>
                    
@stop

@section('foot')
    
	@parent
    

@stop