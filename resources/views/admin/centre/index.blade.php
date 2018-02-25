@extends('admin.master')
@section('content')
@section('title','Centre List')
<div class="container-fluid">
	<div class="row bg-title">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		   <ol class="breadcrumb">
				<li class="active breadcrumbColor"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
				<li>@yield('title')</li>
			</ol>
		</div>	
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<a href="{{ route('centre.create') }}"  class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Centre</a>
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
                                        <th>Title</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Details</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
								</thead>
								<tbody>
									{!! $sl=null !!}
									@foreach($data AS $value)
										<tr class="{!! $value->centre_id !!}">
											<td style="width: 100px;">{!! ++$sl !!}</td>
											<td>{!! $value->title !!}</td>
											<td>{!! $value->email !!}</td>
											<td>@if($value->phone !='') +880{!! $value->phone !!} @endif</td>
											<td>{!! $value->address !!}</td>
											<td>{!! $value->details !!}</td>
											<td style="width: 100px;">
												<a href="{!! route('centre.edit',$value->centre_id) !!}"  class="btn btn-success btn-sm btnColor">
													<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
												</a>
												<a href="{!!route('centre.destroy',$value->centre_id  )!!}" data-token="{!! csrf_token() !!}" data-id="{!! $value->centre_id !!}" class="delete btn btn-danger btn-sm deleteBtn btnColor"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
