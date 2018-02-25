@extends('admin.master')
@section('content')
@if(isset($editModeData))
	@section('title','Edit Centre ')
@else
	@section('title','Add Centre ')
@endif

	<div class="container-fluid">
		<div class="row bg-title">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<ol class="breadcrumb">
					<li class="active breadcrumbColor"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
					<li>@yield('title')</li>
				</ol>
			</div>
			<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
				<a href="{{route('centre.index')}}"  class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-list-ul" aria-hidden="true"></i>  View Centre </a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading"><i class="mdi mdi-clipboard-text fa-fw"></i>@yield('title')</div>
					<div class="panel-wrapper collapse in" aria-expanded="true">
						<div class="panel-body">
								@if(isset($editModeData))
									{{ Form::model($editModeData, array('route' => array('centre.update', $editModeData->centre_id), 'method' => 'PUT','files' => 'true','class' => 'form-horizontal')) }}
								@else
									{{ Form::open(array('route' => 'centre.store','enctype'=>'multipart/form-data','class'=>'form-horizontal')) }}
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
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label col-md-4">Title<span class="validateRq">*</span></label>
												<div class="col-md-8">
													{!! Form::text('title',Input::old('title'), $attributes = array('class'=>'form-control required role_name','id'=>'title','placeholder'=>'Enter Title')) !!}
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label col-md-4">Email</label>
												<div class="col-md-8">
													{!! Form::text('email',Input::old('email'), $attributes = array('class'=>'form-control email','id'=>'title','placeholder'=>'Enter Email')) !!}
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label col-md-4">Phone</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">+880</div>
														{!! Form::number('phone',Input::old('phone'), $attributes = array('class'=>'form-control phone','id'=>'title','placeholder'=>'Enter Phone')) !!}
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label col-md-4">Address<span class="validateRq">*</span></label>
												<div class="col-md-8">
													{!! Form::textarea('address',Input::old('address'), $attributes = array('class'=>'form-control address','rows'=>'4','id'=>'address','placeholder'=>'Address..')) !!}
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label col-md-4">Details</label>
												<div class="col-md-8">
													{!! Form::textarea('details',Input::old('details'), $attributes = array('class'=>'form-control details','rows'=>'4','id'=>'details','placeholder'=>'Details..')) !!}
												</div>
											</div>
										</div>
									</div>
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


