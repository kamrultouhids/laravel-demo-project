@extends('admin.master')
@section('content')
@section('title','Patient Details ')
<div class="container-fluid">
	<div class="row bg-title">
		<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
		   <ol class="breadcrumb">
				<li class="active breadcrumbColor"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
				<li>@yield('title')</li>
			</ol>
		</div>	
		<div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
			<a href="{{ route('patient.index') }}"  class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"> <i class="fa fa-list-ul" aria-hidden="true"></i> View Patient </a>
		</div>	
	</div>

	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-info">
				<div class="panel-heading"><i class="mdi mdi-table fa-fw"></i> @yield('title')</div>
				<div class="panel-wrapper collapse in" aria-expanded="true">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-4 col-xs-12">
								<div class="white-box">
									<div class="user-bg">
										@if($patientPersonalInfo->avatar_file!='' && file_exists(\App\Lib\Enumerations\ImagePaths::$PATIENT_PROFILE.'/'.$patientPersonalInfo->avatar_file))
											<img width="100%" alt="user" src="{!! asset(\App\Lib\Enumerations\ImagePaths::$PATIENT_PROFILE.'/'.$patientPersonalInfo->avatar_file) !!}">
										@else
											<img width="100%" alt="user" src="{!! asset("admin_assets/img/default.png") !!}">
										@endif
										<div class="overlay-box">
											<div class="user-content">
												<a href="javascript:void(0)">
													@if($patientPersonalInfo->avatar_file!='' && file_exists(\App\Lib\Enumerations\ImagePaths::$PATIENT_PROFILE.'/'.$patientPersonalInfo->avatar_file))
													<img src="{!! asset(\App\Lib\Enumerations\ImagePaths::$PATIENT_PROFILE.'/'.$patientPersonalInfo->avatar_file) !!}" class="thumb-lg img-circle" alt="img">
													@else
														<img  alt="user" src="{!! asset("admin_assets/img/default.png") !!}" class="thumb-lg img-circle" alt="img">
													@endif
												</a>
												<h4 class="text-white"><b>{{$patientPersonalInfo->patient_name}}</b></h4>
												<h5 class="text-white"><b>@if($patientPersonalInfo->patient_email !=''){{$patientPersonalInfo->patient_email}}@endif</b></h5> </div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-8 col-xs-12">
								<div class="white-box">
									<ul class="nav nav-tabs tabs customtab">
										<li class="@if(!isset($_GET['active']) || $_GET['active'] =='about') {{"active"}} @endif tab">
											<a href="#home" class="tabHref" data-toggle="tab" data-title="about"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs"><b>Patient Information</b></span> </a>
										</li>
										<li class="@if(isset($_GET['active']) && $_GET['active'] =='treatment') {{"active"}} @endif tab">
											<a href="#profile" class="tabHref" data-toggle="tab" data-title="treatment"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs"><b>Treatment Information</b></span> </a>
										</li>
										<li class="@if(isset($_GET['active']) && $_GET['active'] =='payments') {{"active"}} @endif tab">
											<a href="#messages" class="tabHref"  data-toggle="tab" aria-expanded="true" data-title="payments"> <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> <span class="hidden-xs"><b>Payments</b></span> </a>
										</li>
										<li class="@if(isset($_GET['active']) && $_GET['active'] =='prescription') {{"active"}} @endif tab">
											<a href="#settings" data-toggle="tab" class="tabHref"  aria-expanded="false" data-title="prescription"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs"><b>Prescription</b></span> </a>
										</li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane @if(!isset($_GET['active']) || $_GET['active'] =='about') {{"active"}} @endif" id="home">
											<div class="row">
												<div class="col-md-4 col-xs-6 b-r"> <strong>Phone</strong>
													<br>
													<p class="text-muted">@if($patientPersonalInfo->phone_no !='') +88{{$patientPersonalInfo->phone_no}} @else {{"--"}} @endif</p>
												</div>
												<div class="col-md-4 col-xs-6 b-r"> <strong>Location</strong>
													<br>
													<p class="text-muted">@if($patientPersonalInfo->location !='') {{$patientPersonalInfo->location}} @else {{"--"}} @endif</p>
												</div>
												<div class="col-md-4 col-xs-6 b-r"> <strong>Age</strong>
													<br>
													<p class="text-muted">@if($patientPersonalInfo->birth_date !='')  {{findAge($patientPersonalInfo->birth_date)}} @else {{"--"}} @endif</p>
												</div>
											</div>
											<hr>
											<table class="table table-bordered dataTable no-footer">
												<tbody >
													<tr>
														<td>Name</td>
														<td>{{$patientPersonalInfo->patient_name}}</td>
													</tr>
													<tr>
														<td>Patient Code</td>
														<td>{{$patientPersonalInfo->patient_code}}</td>
													</tr>
													<tr>
														<td>Patient Type</td>
														<td>{{$patientPersonalInfo->patient_type}}</td>
													</tr>
													<tr>
														<td>Visit Date</td>
														<td>{{$patientPersonalInfo->visit_date}}</td>
													</tr>
													<tr>
														<td>Birth Date</td>
														<td>{{$patientPersonalInfo->birth_date}}</td>
													</tr>
													<tr>
														<td>Blood Group</td>
														<td>{{$patientPersonalInfo->blood_group}}</td>
													</tr>
													<tr>
														<td>Sex</td>
														<td>{{$patientPersonalInfo->sex}}</td>
													</tr>
													<tr>
														<td>Profession</td>
														<td>@if(isset($patientPersonalInfo->profession) && $patientPersonalInfo->profession->profession_name !='') {{$patientPersonalInfo->profession->profession_name}} @endif </td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="tab-pane @if(isset($_GET['active']) && $_GET['active'] =='treatment') {{"active"}} @endif" id="profile">
											<div class="pull-right">
												<button class="btn btn-info model_img img-responsive"  data-toggle="modal" data-target=".bs-example-modal-treatment" >
													<i class="fa fa-plus-circle" aria-hidden="true"></i> <b>Add Treatment</b>
												</button>
											</div>
											<br>
											<table class="table table-hover manage-u-table">
												<thead>
												<tr>
													<th style="width: 70px;" class="text-center">#</th>
													<th>CONSULTANT NAME</th>
													<th>LIMB INVOLVED</th>
													<th>DEFORMITY TYPE</th>
													<th>PREVIOUS TREATMENT</th>
													<th>MANAGE</th>
												</tr>
												</thead>
												<tbody>
													{{$sl = null}}
													@foreach($treatment as $value)
														<tr>
															<td class="text-center">{{++$sl}}</td>
															<td>
																@if(isset($value->consultant) && $value->consultant->name !='') {{$value->consultant->name}} @endif
																<br/><span class="text-muted">Service: {{$value->service}}</span>
																<br/><span class="text-muted">Date: {{$value->date}}</span>
															</td>
															<td>
																{{$value->limb_involved}}
																<br/><span class="text-muted">Diagonsis : {{$value->diagonsis}}</span>
															</td>
															<td>
																{{$value->deformity_type}}
																<br/><span class="text-muted">Treatment Given : {{$value->treatment_given}}</span>
															</td>
															<td>
																{{$value->previous_treatment}}
																<br/><span class="text-muted">Session Complete : {{$value->session_complete}}</span>
															</td>
															<td>
																<a href=""
																   data-url="{{route('treatment.edit',$value->treatment_id)}}"
																   data-toggle="modal" data-keyboard="false"
																   data-target="#modelLg">
																	<button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5 "><i class="ti-pencil-alt"></i></button>
																</a>
															</td>
														</tr>
													@endforeach
												</tbody>
											</table>
										</div>
										<div class="tab-pane @if(isset($_GET['active']) && $_GET['active'] =='payments') {{"active"}} @endif" id="messages">
											<div class="pull-right">
												<button class="btn btn-info model_img img-responsive"  data-toggle="modal" data-target=".bs-example-modal-payment" >
													<i class="fa fa-plus-circle" aria-hidden="true"></i> <b>Add Payment</b>
												</button>
											</div>
											<br>
											<table class="table table-hover manage-u-table">
												<thead>
												<tr>
													<th style="width: 70px;" class="text-center">#</th>
													<th>PAYMENT DATE</th>
													<th>PAYMENT STATUS</th>
													<th>TREATMENT COST</th>
													<th>ORTHOSIS COST</th>
													<th>TREATMENT GIVEN</th>
													<th>MANAGE</th>
												</tr>
												</thead>
												<tbody>
												{{$sl = null}}
												@foreach($payments as $payment)
													<tr>
														<td class="text-center">{{++$sl}}</td>
														<td>{{$payment->payment_date}}</td>
														<td>{{$payment->payment_status}}</td>
														<td>{{$payment->treatment_cost}}</td>
														<td>{{$payment->orthosis_cost}}</td>
														<td>{{$payment->treatment_given}}</td>
														<td>
															<a href=""
															   data-url="{{route('payment.edit',$payment->payment_id)}}"
															   data-toggle="modal" data-keyboard="false"
															   data-target="#ajax">
																<button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5 "><i class="ti-pencil-alt"></i></button>
															</a>
														</td>
													</tr>
												@endforeach
												</tbody>
											</table>
										</div>
										<div class="tab-pane @if(isset($_GET['active']) && $_GET['active'] =='prescription') {{"active"}} @endif " id="settings">
											<div class="pull-right">
												<button class="btn btn-info model_img img-responsive"  data-toggle="modal" data-target=".bs-example-modal-prescription" >
													<i class="fa fa-plus-circle" aria-hidden="true"></i> <b>Add Prescription</b>
												</button>
											</div>
											<br>
											<table class="table table-hover manage-u-table">
												<thead>
												<tr>
													<th style="width: 70px;" class="text-center">#</th>
													<th>DATE</th>
													<th>INSTRUCTION</th>
													<th>MANAGE</th>
												</tr>
												</thead>
												<tbody>
												{{$sl = null}}
													@foreach($prescriptions as $prescription)
														<tr>
															<td class="text-center">{{++$sl}}</td>
															<td>{{$prescription->date}}</td>
															<td>@if(isset($prescription->instruction) && $prescription->instruction->title !='') {{ $prescription->instruction->title }}@endif</td>
															<td>
																<a href=""
																   data-url="{{route('prescription.edit',$prescription->prescription_id)}}"
																   data-toggle="modal" data-keyboard="false"
																   data-target="#ajax">
																	<button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5 "><i class="ti-pencil-alt"></i></button>
																</a>
															</td>
														</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@include('admin.patient.add-treatment')
@include('admin.patient.add-payment')
@include('admin.patient.add-prescription')

@endsection
@section('page_scripts')
	<script>
		$(document).on("click", ".tabHref", function (e) {
			e.preventDefault();
			var title = $(this).attr("data-title");
			var stateObj = {foo: "PatientDetails"};
			history.pushState(stateObj, "PatientDetails", "?active=" + title);
		});

        $(document).on("change", ".instruction_id", function () {
            var instruction_id = $(this).val();
            var action = "{{route('prescription.getInstruction')}}";
            if(instruction_id !=''){
                $.ajax({
                    type: 'POST',
                    url: action,
                    data: {instruction_id: instruction_id, '_token': $('input[name=_token]').val()},

                    success: function (result) {
                        $('.instruction_description').html(result.description);
                    }
                });
            }else{
                $('.instruction_description').html(" ");
			}
        });

	</script>
@endsection
