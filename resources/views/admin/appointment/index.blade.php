@extends('admin.master')
@section('content')
@section('title','Appointment List')

<div class="container-fluid">
	<div class="row bg-title">
		<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
			<ol class="breadcrumb">
				<li class="active breadcrumbColor"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
				<li>@yield('title')</li>
			</ol>
		</div>
		<div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
			<a href="{{ route('appointment.create') }}"  class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Appointment</a>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-info">
				<div class="panel-heading"><i class="mdi mdi-table fa-fw"></i> @yield('title')</div>
				<div class="panel-wrapper collapse in" aria-expanded="true">
					<div class="panel-body">
						<div class="table-responsive">
							<table id="myTable" class="table table-bordered">
								<thead>
								<tr class="tr_header">
									<th>S/L</th>
									<th>Patient Name</th>
									<th>Patient Code</th>
									<th>Appointment Date</th>
									<th>Appointment Time</th>
									<th style="text-align: center;">Action</th>
								</tr>
								</thead>
								<tbody>
								{!! $sl=null !!}
								@foreach($data AS $value)
									<tr class="{!! $value->appointment_id !!}">
										<td style="width: 20px;">{!! ++$sl !!}</td>
										<td>
											@if(isset($value->patient) && $value->patient->patient_name !='') {{$value->patient->patient_name}} @endif
										</td>
										<td>
											@if(isset($value->patient) && $value->patient->patient_code !='') {{$value->patient->patient_code}} @endif
										</td>
										<td>{{$value->appointment_date}}</td>
										<td>
											{{$value->appointment_time}}
										</td>
										<td style="width: 100px;">
											<a href="{!! route('appointment.edit',$value->appointment_id) !!}"  class="btn btn-success btn-sm btnColor">
												<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
											</a>
											<a href="{!! route('appointment.destroy',$value->appointment_id  )!!}" data-token="{!! csrf_token() !!}" data-id="{!! $value->appointment_id !!}" class="delete btn btn-danger btn-sm deleteBtn btnColor"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
@endsection
