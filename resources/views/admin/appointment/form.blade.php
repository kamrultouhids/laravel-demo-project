@extends('admin.master')
@section('content')
	@if(isset($editModeData))
@section('title','Edit Appointment')
@else
	@section('title','Add Appointment')
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
			<a href="{{route('appointment.index')}}"  class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-list-ul" aria-hidden="true"></i>  View appointment </a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading"><i class="mdi mdi-clipboard-text fa-fw"></i>@yield('title')</div>
				<div class="panel-wrapper collapse in" aria-expanded="true">
					<div class="panel-body">
						@if(isset($editModeData))
							{{ Form::model($editModeData, array('route' => array('appointment.update', $editModeData->appointment_id), 'method' => 'PUT','files' => 'true','enctype'=>'multipart/form-data')) }}
						@else
							{{ Form::open(array('route' => 'appointment.store','enctype'=>'multipart/form-data')) }}
						@endif
						<div class="form-body">
							<div class="row">
								<div class="col-md-12">
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
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Center<span class="validateRq">*</span></label>
										@php
										$centreList[''] = '--- Please select ---';
										@endphp
										{{ Form::select('centre_id',$centreList, Input::old('centre_id'), array('class' => 'form-control centre_id select2')) }}
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Physiotherapist<span class="validateRq">*</span></label>
										@php
										$physiotherapist[''] = '--- Please select ---';
										@endphp
										{{ Form::select('physiotherapist_id',$physiotherapist, Input::old('physiotherapist_id'), array('class' => 'form-control physiotherapist_id select2')) }}
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Patient<span class="validateRq">*</span></label>
										<select class="form-control select2" name="patient_id">
											<option value="">--- Please select ---</option>
											@foreach($patientList as $value)
												<option value="{{$value->patient_id}}"

												@if(isset($editModeData))
													@if($value->patient_code == $editModeData->patient_id) {{"selected"}} @endif
														@else
													@if(old('patient_id') == $value->patient_code ) {{ 'selected' }} @endif
														@endif

												> {{$value->patient_name}}</option>
											@endforeach
										</select>
									</div>
								</div>

							</div>

							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Treatment Status</label>
										{!! Form::text('treatment_status',Input::old('treatment_status'), $attributes = array('class'=>'form-control','placeholder'=>'Enter Treatment Status')) !!}
									</div>
								</div>
								<div class="col-md-4">
									<label class="control-label">Appointment Date<span class="validateRq">*</span></label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										{!! Form::text('appointment_date',(isset($editModeData))  ? dateConvertDBtoForm($editModeData->appointment_date) : Input::old('appointment_date'), $attributes = array('class'=>'form-control dateField','placeholder'=>'Enter Appointment Date','readonly'=>'readonly')) !!}
									</div>
								</div>
								<div class="col-md-4">
									<label class="control-label">Appointment Time<span class="validateRq">*</span></label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
										<div class="bootstrap-timepicker">
											{!! Form::text('appointment_time', Input::old('appointment_time'), $attributes = array('class'=>'form-control timePicker','placeholder'=>'Enter Appointment Time','readonly'=>'readonly')) !!}
										</div>
									</div>
								</div>
							</div>
						</div>


						<div class="form-actions">
							<div class="row ">
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
