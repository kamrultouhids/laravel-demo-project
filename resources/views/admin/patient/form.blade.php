@extends('admin.master')
@section('content')
@if(isset($editModeData))
	@section('title','Edit Patient')
@else
	@section('title','Add Patient')
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
				<a href="{{route('patient.index')}}"  class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-list-ul" aria-hidden="true"></i>  View Patient </a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading"><i class="mdi mdi-clipboard-text fa-fw"></i>@yield('title')</div>
					<div class="panel-wrapper collapse in" aria-expanded="true">
						<div class="panel-body">
								@if(isset($editModeData))
									{{ Form::model($editModeData, array('route' => array('patient.update', $editModeData->patient_id), 'method' => 'PUT','files' => 'true','enctype'=>'multipart/form-data')) }}
								@else
									{{ Form::open(array('route' => 'patient.store','enctype'=>'multipart/form-data')) }}
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
									<h3 class="box-title">Patient Information</h3>
									<hr>
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

									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Patient Code<span class="validateRq">*</span></label>
												{!! Form::text('patient_code',Input::old('patient_code'), $attributes = array('class'=>'form-control','placeholder'=>'Enter Patient Code')) !!}
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Center<span class="validateRq">*</span></label>
												{{ Form::select('centre_id',$centreList, Input::old('centre_id'), array('class' => 'form-control centre_id select2')) }}
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Patient Name<span class="validateRq">*</span></label>
												{!! Form::text('patient_name',Input::old('patient_name'), $attributes = array('class'=>'form-control','id'=>'patient_name','placeholder'=>'Enter Patient Name')) !!}
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Guardian Name</label>
												{!! Form::text('guardian_name',Input::old('guardian_name'), $attributes = array('class'=>'form-control','placeholder'=>'Enter Guardian Name')) !!}
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Patient Type</label>
												{{ Form::select('patient_type', array('Follow-up' => 'Follow-up', 'On treatment' => 'On treatment','New'=>'New'), Input::old('patient_type'), array('class' => 'form-control patient_type')) }}
											</div>
										</div>
										<div class="col-md-4">
											<label class="control-label">Visit Date<span class="validateRq">*</span></label>
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
												{!! Form::text('visit_date',(isset($editModeData))  ? dateConvertDBtoForm($editModeData->visit_date) : Input::old('visit_date'), $attributes = array('class'=>'form-control dateField','placeholder'=>'Enter Visit Date','readonly'=>'readonly')) !!}
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label for="exampleInput">Phone<span class="validateRq">*</span></label>
											<div class="input-group">
												<span class="input-group-addon">+880</span>
												{!! Form::number('phone_no',Input::old('phone_no'), $attributes = array('class'=>'form-control phone_no','placeholder'=>'Enter Phone No')) !!}
											</div>
										</div>
										<div class="col-md-4">
											<label for="exampleInput">Alternative Phone Numbe</label>
											<div class="input-group">
												<span class="input-group-addon">+880</span>
												{!! Form::number('alternative_phone_no',Input::old('alternative_phone_no'), $attributes = array('class'=>'form-control alternative_phone_no','placeholder'=>'Enter Alternative Phone No')) !!}
											</div>
										</div>
										<div class="col-md-4">
											<label  for="exampleInput">Date of Birth<span class="validateRq">*</span></label>
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
												{!! Form::text('birth_date',(isset($editModeData))  ? dateConvertDBtoForm($editModeData->birth_date) : Input::old('birth_date'), $attributes = array('class'=>'form-control dateField','placeholder'=>'Enter Birth Date','readonly'=>'readonly')) !!}
											</div>
										</div>
									</div>
									<br>

									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Sex<span class="validateRq">*</span></label>
												{{ Form::select('sex', array('Male' => 'Male', 'Female' => 'Female','Other'=>'Other'), Input::old('sex'), array('class' => 'form-control sex')) }}
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Blood Group</label>
												{{ Form::select('blood_group', bloodGroup(), Input::old('blood_group'), array('class' => 'form-control blood_group select2')) }}
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Profession</label>
												@php
													 $professionList[''] = '--- Please select ---';
												@endphp
												{{ Form::select('profession_id', $professionList, Input::old('profession_id'), array('class' => 'form-control profession_id select2')) }}
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Referral Type</label>
												@php
													 $referralList[''] = '--- Please select ---';
												@endphp
												{{ Form::select('referral_id', $referralList, Input::old('referral_id'), array('class' => 'form-control referral_id select2')) }}
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Reference Name</label>
												{!! Form::text('reference_name',Input::old('reference_name'), $attributes = array('class'=>'form-control','id'=>'reference_name','placeholder'=>'Enter Reference Name')) !!}
											</div>
										</div>
										<div class="col-md-4">
											<label for="exampleInput">Reference Phone</label>
											<div class="input-group">
												<span class="input-group-addon">+880</span>
												{!! Form::number('reference_phone',Input::old('reference_phone'), $attributes = array('class'=>'form-control reference_phone','placeholder'=>'Enter Reference Phone')) !!}
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-4">
											<label for="exampleInput">Patient Email</label>
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
												{!! Form::email('patient_email',Input::old('patient_email'), $attributes = array('class'=>'form-control patient_email','placeholder'=>'Enter Patient Email')) !!}
											</div>
										</div>
										<div class="col-md-4">
											<label for="exampleInput">Reference Email</label>
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
												{!! Form::email('reference_email',Input::old('reference_email'), $attributes = array('class'=>'form-control reference_email','placeholder'=>'Enter Reference Email')) !!}
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Marketing Person<span class="validateRq">*</span></label>
												{!! Form::text('marketing_person',Input::old('marketing_person'), $attributes = array('class'=>'form-control','placeholder'=>'Enter Marketing Person')) !!}
											</div>
										</div>
									</div>

									<h3 class="box-title">Address</h3>
									<hr>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">District</label>
												@php
													$districtList[''] = '--- Please select ---';
												@endphp
												{{ Form::select('district_id', $districtList, Input::old('district_id'), array('class' => 'form-control district_id select2')) }}
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Thana</label>
												<select class="form-control thana_id " name="thana_id" >
													<option>--- Please select ---</option>
												</select>

											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Location</label>
												{!! Form::text('location',Input::old('location'), $attributes = array('class'=>'form-control','placeholder'=>'Enter Location')) !!}
											</div>
										</div>
									</div>
								</div>
								<div class="form-actions">
									<div class="row text-center">
										<div class="col-md-12">
										@if(isset($editModeData))
											<button type="submit" class="btn btn-info btn_style"><i class="fa fa-pencil"></i> Update</button>
										@else
											<button type="submit" class="btn btn-info btn_style"><i class="fa fa-check"></i> Save</button>
										@endif
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

        $(document).on("change",".district_id ",function(){
            var district_id = $('.district_id').val();
            if(district_id !='') {
                var action = "{{ route('patient.getThana') }}";
                $.ajax({
                    type: 'POST',
                    url: action,
                    data: {'district_id': district_id, '_token': $('input[name=_token]').val()},
                    dataType: 'json',
                    success: function (data) {
                        $('.thana_id').html('<option value="">--- Please select ---</option>')
                        $.each(data.result, function(key, value) {
                            selectedText = '';
                            <?php if(isset($editModeData)){ ?>
                                selectedId = '<?=$editModeData->thana_id;?>';
                            if (value['thana_id'] == selectedId) {
                                selectedText = "selected";

                            }

                            <?php } ?>


                            $('.thana_id').append('<option value="'+ value['thana_id'] +'" '+selectedText+'>'+ value['thana_name'] +'</option>');
                        });
                    }
                });
            }else{
                $('.thana_id').html('<option value="">--- Please select ---</option>');
            }
        });

		@if(isset($editModeData))
		{!! "  $('.district_id').trigger('change');" !!}
		@endif

		@php
			$profilePic = "admin_assets/img/default.png";
			if(isset($editModeData->avatar_file) && $editModeData->avatar_file !=''){
				 $profilePic ="uploads/patient_profile/".$editModeData->avatar_file;
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