@extends('admin.master')
@section('content')
@if(isset($editModeData))
	@section('title','Edit Instruction ')
@else
	@section('title','Add Instruction')
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
				<a href="{{route('instruction.index')}}"  class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-list-ul" aria-hidden="true"></i>  View Instruction </a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading"><i class="mdi mdi-clipboard-text fa-fw"></i>@yield('title')</div>
					<div class="panel-wrapper collapse in" aria-expanded="true">
						<div class="panel-body">
								@if(isset($editModeData))
									{{ Form::model($editModeData, array('route' => array('instruction.update', $editModeData->instruction_id), 'method' => 'PUT','files' => 'true','class' => 'form-horizontal')) }}
								@else
									{{ Form::open(array('route' => 'instruction.store','enctype'=>'multipart/form-data','class'=>'form-horizontal')) }}
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
													{!! Form::text('title',Input::old('title'), $attributes = array('class'=>'form-control required','id'=>'title','placeholder'=>'Enter Title')) !!}
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label col-md-4">Description<span class="validateRq">*</span></label>
												<div class="col-md-8">
													{!! Form::textarea('description',Input::old('description'), $attributes = array('class'=>'form-control description textarea_editor','rows'=>'12','id'=>'description','placeholder'=>'Description..')) !!}
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

@section('page_scripts')
	<link rel="stylesheet" href="{!! asset('admin_assets/plugins/bower_components/html5-editor/bootstrap-wysihtml5.css')!!}" />
	<script src="{!! asset('admin_assets/js/cbpFWTabs.js')!!}"></script>
	<script src="{!! asset('admin_assets/plugins/bower_components/html5-editor/wysihtml5-0.3.0.js')!!}"></script>
	<script src="{!! asset('admin_assets/plugins/bower_components/html5-editor/bootstrap-wysihtml5.js')!!}"></script>

	<script type="text/javascript">
		(function() {
			$('.textarea_editor').wysihtml5();

			[].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
				new CBPFWTabs(el);
			});
		})();
	</script>
@endsection