@extends('admin.master')
@section('content')
@if(isset($editModeData))
	@section('title','Edit Data Operator ')
@else
	@section('title','Add Data Operator  ')
@endif

	<div class="container-fluid">
		<div class="row bg-title">
			<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
				<ol class="breadcrumb">
					<li class="active breadcrumbColor"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
					<li>@yield('title')</li>
				</ol>
			</div>
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
				<a href="{{route('dataOperator.index')}}"  class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-list-ul" aria-hidden="true"></i>  View Data Operator </a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading"><i class="mdi mdi-clipboard-text fa-fw"></i>@yield('title')</div>
					<div class="panel-wrapper collapse in" aria-expanded="true">
						<div class="panel-body">
								@if(isset($editModeData))
									{{ Form::model($editModeData, array('route' => array('dataOperator.update', $editModeData->user_id), 'method' => 'PUT','files' => 'true','class' => 'form-horizontal')) }}
								@else
									{{ Form::open(array('route' => 'dataOperator.store','enctype'=>'multipart/form-data','class'=>'form-horizontal')) }}
								@endif
								<div class="form-body">
									<div class="row">
										<div class="col-md-offset-2 col-md-6">
											@if($errors->any())
												<div class="alert alert-danger alert-dismissible" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
													@foreach($errors->all() as $error)
														<strong>{!! $error !!}</strong><br>
													@endforeach
												</div>
											@endif
										</div>
									</div>

									<div class="row">
										<div class="col-md-2"></div>
											<div class="col-md-6">
												<div class="col-md-12 text-center">
													<label for="files" class="btn btn-success" style="width: 169px;">Select Image</label>
												</div>
												<div class="image-editor">
													<input id="files" class="cropit-image-input" style="visibility:hidden;" type="file">
													<div class="cropit-preview"></div>
													<div class="image-size-label">
														<b>Resize image</b>
													</div>
													<input type="range" class="cropit-image-zoom-input" id="image-size">
													<input type="hidden" name="avatar_file" class="hidden-image-data" />
												</div>
											</div>
									</div>
									</br>
									@if(!isset($editModeData))
										<div class="row">
											<div class="col-md-8">
												<div class="form-group">
													<label class="control-label col-md-4">Center<span class="validateRq">*</span></label>
													<div class="col-md-8">
														<select class="select2 m-b-20 select2-multiple" multiple="multiple" name="centre_id[]" data-placeholder="Select Center ">
															@foreach($centreList as $value)
																<option value="{{$value->centre_id}}">{{$value->title}}</option>
															@endforeach
														</select>
													</div>
												</div>
											</div>
										</div>
									@else
										<div class="row">
											<div class="col-md-8">
												<div class="form-group">
													<label class="control-label col-md-4">Center<span class="validateRq">*</span></label>
													<div class="col-md-8">
														<select class="select2 m-b-20 select2-multiple" multiple="multiple" name="centre_id[]" data-placeholder="Select Center ">
															@foreach($centreList as $value)
																<option value="{{$value->centre_id}}"
																	@php
																	if (!empty($editModeData->centre_id)) {
																		if (in_array($value->centre_id, unserialize($editModeData->centre_id))) {
																			echo "selected";
																		}
																	}
																	@endphp
																>{{$value->title}}</option>
															@endforeach
														</select>
													</div>
												</div>
											</div>
										</div>
									@endif


									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label col-md-4">Name<span class="validateRq">*</span></label>
												<div class="col-md-8">
													{!! Form::text('name',Input::old('name'), $attributes = array('class'=>'form-control','id'=>'name','placeholder'=>'Enter Name')) !!}
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label col-md-4">Email<span class="validateRq">*</span></label>
												<div class="col-md-8">
													{!! Form::email('email',Input::old('email'), $attributes = array('class'=>'form-control email','id'=>'email','placeholder'=>'Enter Email')) !!}
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label col-md-4">Phone <span class="validateRq">*</span></label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">+880</div>
														{!! Form::number('phone',Input::old('phone'), $attributes = array('class'=>'form-control phone','id'=>'Phone','placeholder'=>'Enter Phone')) !!}
													</div>
												</div>
											</div>
										</div>
									</div>
									@if(!isset($editModeData))
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label col-md-4">Password <span class="validateRq">*</span></label>
												<div class="col-md-8">
													{!! Form::password('password', $attributes = array('class'=>'form-control required password','id'=>'password','placeholder'=>'Enter Password')) !!}
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label col-md-4">Password Confirmation <span class="validateRq">*</span></label>
												<div class="col-md-8">
													{!! Form::password('password_confirmation', $attributes = array('class'=>'form-control required password_confirmation','id'=>'password_confirmation','placeholder'=>'Enter confirmation password')) !!}
												</div>
											</div>
										</div>
									</div>
									@endif
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label col-md-4">Address</label>
												<div class="col-md-8">
													{!! Form::textarea('address',Input::old('address'), $attributes = array('class'=>'form-control address','rows'=>'4','id'=>'address','placeholder'=>'Address..')) !!}
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label col-md-4">Profile</label>
												<div class="col-md-8">
													{!! Form::textarea('profile',Input::old('profile'), $attributes = array('class'=>'form-control profile','rows'=>'4','id'=>'profile','placeholder'=>'Data Operator profile..')) !!}
												</div>
											</div>
										</div>
									</div>
									@if(isset($editModeData))
										<div class="row">
											<div class="col-md-8">
												<div class="form-group">
													<label class="control-label col-md-4">Status <span class="validateRq">*</span></label>
													<div class="col-md-8">
														{{ Form::select('status', array('1' => 'Active', '2' => 'Inactive'), Input::old('status'), array('class' => 'form-control status')) }}
													</div>
												</div>
											</div>
										</div>
									@endif
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-8">
											<div class="row">
												<div class="col-md-offset-4 col-md-8">
													@if(isset($editModeData))
														<button type="submit" class="btn btn-info btn_style"><i class="fa fa-pencil"></i> Update</button>
													@else
														<button type="submit" class="btn btn-info btn_style"><i class="fa fa-check"></i> Save</button>
													@endif
												</div>
											</div>
										</div>
									</div>
								</div>
							{{ Form::close() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('page_scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropit/0.5.1/jquery.cropit.min.js"></script>
<script>
    var _URL = window.URL || window.webkitURL;
    $(".cropit-image-input").change(function(e) {
        var file, img;
        if ((file = this.files[0])) {
            img = new Image();
            img.onload = function() {
                if(this.width < 250 || this.height < 250){
                    alert("Mimimum file size required 250 * 250 ")
                    $('.hidden-image-data').val('');
                    $('.cropit-preview-image').attr('src','');
                }
            };
            img.src = _URL.createObjectURL(file);
        }
    });

    $(document).ready(function(){

		@php
			$profilePic = "admin_assets/img/default.png";
			if(isset($editModeData->avatar_file) && $editModeData->avatar_file !=''){
				 $profilePic ="uploads/data_operator_profile/".$editModeData->avatar_file;
			}
		@endphp

        var profile_image = "{{ asset($profilePic)}}";
        $('.image-editor').cropit({
            imageState: {
                src: profile_image,
            }
        });

        $('#image-size').change(function() {
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            // $('#result-data').html(imageData);
        });
        $('.cropit-preview-image').mouseout(function() {
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            // $('#result-data').html(imageData);
        });

        $('img.cropit-preview-image').on('load', function () {
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
        });

        // Image Crop functionality
        $('#image-cropper').cropit({
            imageState: {
                src: profile_image,
            }
        });

        // When user clicks select image button,
        // open select file dialog programmatically
        $('.select-image-btn').click(function() {
            $('.cropit-image-input').click();
        });


    });
</script>
	<style>
		.cropit-preview {
			background-color: #f8f8f8;
			background-size: cover;
			border: 1px solid #ccc;
			border-radius: 3px;
			margin-top: 7px;
			width: 250px;
			height: 250px;
		}

		.cropit-preview-image-container {
			cursor: move;
		}

		.image-size-label {
			margin-top: 10px;
		}
		.image-editor:nth-child(1n+1) {
			width: 250px;
			margin: 0 auto;
		}

		input[type=range] {
			-webkit-appearance: none;
			margin: 15px 0;
			width: 100%;
		}
		input[type=range]:focus {
			outline: none;
		}
		input[type=range]::-webkit-slider-runnable-track {
			width: 100%;
			height: 10px;
			cursor: pointer;
			animate: 0.2s;
			box-shadow: 2px 2px 2px #222, 0px 0px 2px #2f2f2f;
			background: #424242;
			border-radius: 5px;
			border: 1px solid black;
		}
		input[type=range]::-webkit-slider-thumb {
			box-shadow: 1px 1px 1px #111, 0px 0px 1px #1e1e1e;
			border: 1px solid white;
			height: 30px;
			width: 30px;
			border-radius: 8px;
			background: #555bc8;
			cursor: pointer;
			-webkit-appearance: none;
			margin-top: -11px;
		}
		input[type=range]:focus::-webkit-slider-runnable-track {
			background: #4f4f4f;
		}
		input[type=range]::-moz-range-track {
			width: 100%;
			height: 10px;
			cursor: pointer;
			animate: 0.2s;
			box-shadow: 2px 2px 2px #222, 0px 0px 2px #2f2f2f;
			background: #424242;
			border-radius: 5px;
			border: 1px solid black;
		}
		input[type=range]::-moz-range-thumb {
			box-shadow: 1px 1px 1px #111, 0px 0px 1px #1e1e1e;
			border: 1px solid white;
			height: 30px;
			width: 30px;
			border-radius: 8px;
			background: #555bc8;
			cursor: pointer;
		}
		input[type=range]::-ms-track {
			width: 100%;
			height: 10px;
			cursor: pointer;
			animate: 0.2s;
			background: transparent;
			border-color: transparent;
			border-width: 30px 0;
			color: transparent;
		}
		input[type=range]::-ms-fill-lower {
			background: #353535;
			border: 1px solid black;
			border-radius: 10px;
			box-shadow: 2px 2px 2px #222, 0px 0px 2px #2f2f2f;
		}
		input[type=range]::-ms-fill-upper {
			background: #424242;
			border: 1px solid black;
			border-radius: 10px;
			box-shadow: 2px 2px 2px #222, 0px 0px 2px #2f2f2f;
		}
		input[type=range]::-ms-thumb {
			box-shadow: 1px 1px 1px #111, 0px 0px 1px #1e1e1e;
			border: 1px solid white;
			height: 30px;
			width: 30px;
			border-radius: 8px;
			background: #555bc8;
			cursor: pointer;
		}
		input[type=range]:focus::-ms-fill-lower {
			background: #424242;
		}
		input[type=range]:focus::-ms-fill-upper {
			background: #4f4f4f;
		}
		.select2  {
			width: 100%;
		}
	</style>
@endsection