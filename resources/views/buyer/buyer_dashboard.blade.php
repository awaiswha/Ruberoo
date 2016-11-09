@extends('admin.layout')

@section('title', 'Buyer Dashboard')


@section('content')
	
	<style type="text/css">
		.bg-image.bg-opaque5::before{
			opacity: 1 !important;
		}
	</style>

	<div class="page-header full-content parallax" style="height: 70px; overflow: hidden">

			<div class="header-tabs sticky">
				<ul class="nav nav-tabs tabs-active-text-white tabs-active-border-yellow" style="width: none !important;">
					<li class="active"><a href="{{url('buyer/dashboard')}}" class="btn-ripple">Timeline</a></li>
					<li><a href="#profile" data-toggle="tab" class="btn-ripple">Profile</a></li>
					<li><a href="#orders" data-toggle="tab" class="btn-ripple">Orders</a></li>
					<li><a href="{{url('logout')}}" class="btn-ripple ">Logout</a></li>
				</ul>
			</div>

		</div><!--.page-header-->

		<div class="row user-profile">
			<div class="col-md-12">
				<div class="tab-content without-border">
					<div id="timeline" class="tab-pane @if($front_card == false) active @endif ">
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
										<h4><b>Orders</b></h4>
										<button class="btn btn-floating btn-orange">45</button>
									</div><!--.card-body-->

								</div><!--.card-->
							</div><!--.col-md-3-->

							<div class="col-md-4">
								<div class="card card-iconic card-yellow">
									<div class="card-full-icon ion-arrow-graph-up-right"></div>

									<div class="card-body">
										<i class="card-icon ion-card"></i>
										<h4><b>Purchase Projects</b></h4>
										<button class="btn btn-floating btn-blue">45</button>
									</div><!--.card-body-->

								</div><!--.card-->
							</div><!--.col-md-3-->

						
						</div><!--.row-->


					</div><!--#timeline.tab-pane-->

					@if($front_card == true)

						<div id="add_card" class="tab-pane active">
							<div class="row">
								<div class="col-md-12">
									
									<div class="panel bs-wizard bs-wizard-progress">
										<div class="panel-heading" style=" background-color: #337ab7; ">
											<div class="panel-title">
												<h4 style="color:white !important;">Place Order
												
												</h4>
												<div class="progress progress-striped active">
														<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
													</div><!--.progress-->
											</div><!--.panel-title-->
										</div><!--.panel-heading-->
										<div class="panel-body">

											<form id="submit_deal" class="form-horizontal" action="{{url('buyer/add_deal')}}" method="post">
												<input type="hidden" name="project_id" value="{{$add_card->project_id}}">
												<input type="hidden" name="price" value="{{$add_card->project_price}}">
												<input type="hidden" name="user_id" value="{{$add_card->user_idFk}}">
												<input id="token" name="_token" type="text" value="{{csrf_token()}}" hidden>
												<ul class="hide">
													<li><a href="#tab1" data-toggle="tab">First</a></li>
													<li><a href="#tab2" data-toggle="tab">Second</a></li>
												</ul>

												<div class="tab-content">
													<div class="tab-pane" id="tab1">
														<div class="form-group">
															<label class="control-label col-md-4">Address</label>
															<div class="col-md-5">
																<input id="address" type="text" name="address" class="form-control" placeholder="Drop Of Address" required>
															</div>
														</div><!--.form-group-->
														<div class="form-group">
															<label class="control-label col-md-4">Contact No</label>
															<div class="col-md-5">
																<div class="inputer">
																	<div class="input-wrapper">
																		<input id="phone_no" type="text" name="phone_no" class="form-control" placeholder="Contact Number" required>
																	</div>
																</div>
															</div>
														</div><!--.form-group-->
													</div><!--.tab-pane-->

													<div class="tab-pane size_parent" id="tab2">
														<div class="form-group">
												        	<label class="control-label col-md-4">Total Numbers Of Items</label>
															<div class="col-md-5">
																<div class="inputer">
																	<div class="input-wrapper">
																		<input id="items" type="number" min="0" name="items" class="form-control" required>
																	</div>
																</div>
															</div>
														</div><!--.form-group-->
														<div class="form-group">
												        	<label class="control-label col-md-4">Total Price</label>
															<div class="col-md-5">
																<div class="inputer">
																	<div class="input-wrapper">
																		<input id="total_price" type="text" name="total_price" class="form-control" readonly="" required>
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
												<li class="bs-wizard-submit pull-right" id="deal_submit"><button class="btn btn-blue">confirm Order</button></li>
											</ul>
										</div><!--.panel-foter-->
									</div><!--.panel-->

								</div>
							</div><!--.row-->
						</div><!--#about.tab-pane-->


					@endif


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

													<!-- <div class="col-xs-6">
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
														<th style=" text-align: center !important; ">Prodect title</th>
														<th style=" text-align: center !important; ">Total Items</th>
														<th style=" text-align: center !important; ">Total Price</th>
														<th style=" text-align: center !important; ">Order Status</th>
														<th style=" text-align: center !important; ">Action</th>
													</tr>
												</thead>
												<tbody>
													

														@foreach($deals as $deal)

														
															<tr style=" text-align: center; ">
																<td>{{$deal->project->project_title}}</td>
																<td>{{$deal->total_items}}</td>
																<td>{{$deal->total_price}}</td>
																<td>{{$deal->deal_status}}</td>
																<td>
																	@if($deal->deal_status == 'Pending')
																		<button class="btn btn-flat btn-red btn-ripple" data-toggle="modal" data-target="#modal{{$deal->deal_id}}" >Cancel</button>
																	@elseif($deal->deal_status == 'Canceled')
																		<button class="btn btn-flat btn-red btn-ripple">
																			Rejected
																		</button>
																	@elseif($deal->deal_status == 'Active')
																		<button class="btn btn-flat btn-green btn-ripple">
																			Confirm
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

		@if(count($deals) > 0)

			@foreach($deals as $deal)

				<div class="modal scale fade" id="modal{{$deal->deal_id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
										<a href="{{url('buyer/delete_deal/'.$deal->deal_id)}}" class="col-md-12 btn btn-danger">
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

			$('#deal_submit').on('click', function(){
					
				$('#submit_deal').submit();

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

			// project id add into form

			$('.add_card').on('click', function(){

				var id = $(this).attr('data-project');
				var price = $(this).attr('data-price');
				var user = $(this).attr('data-user');
				
				var check_input = $('#submit_deal').find('input[name=project_id]');
				var check_price = $('#submit_deal').find('input[name=price]');
				var check_user = $('#submit_deal').find('input[name=user_id]');

				if(check_input){
					check_input.remove();
					check_price.remove();
					check_user.remove();

					var input = '<input name="project_id" value="'+id+'" type="hidden">';
					var price_input = '<input name="price" value="'+price+'" type="hidden">';
					var user_input = '<input name="user_id" value="'+user+'" type="hidden">';

					$('#submit_deal').append(input);
					$('#submit_deal').append(price_input);
					$('#submit_deal').append(user_input);

				}else{

					var input = '<input name="project_id" value="'+id+'" type="hidden">';
					var price_input = '<input name="price" value="'+price+'" type="hidden">';
					var user_input = '<input name="user_id" value="'+user+'" type="hidden">';

					$('#submit_deal').append(input);
					$('#submit_deal').append(price_input);
					$('#submit_deal').append(user_input);
				}

			});

			// price calculate
			$('#items').on('keyup', function(){

				var items = $(this).val();
				var price = $(this).closest('#submit_deal').find('input[name=price]').val();
				if(items != ""){

					$('#total_price').val("");

					// var result = parseInt(small)+parseInt(medium)+parseInt(large);
					var total_price = parseInt(items)*parseInt(price);
					// $('#items').val(result);
					$('#total_price').val(""+total_price+" Rs");

				}

			});


		});

		</script>
                    
@stop

@section('foot')
    
	@parent
    

@stop


