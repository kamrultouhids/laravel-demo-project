@extends('admin.master')
@section('content')
@section('title','Physiotherapist List')
<style>
	ul.list-icons li i {
		font-size: 16px;
		margin-right: 5px;
		font-weight: 700;
	}
</style>
<div class="container-fluid">
	<div class="row bg-title">
		<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
		   <ol class="breadcrumb">
				<li class="active breadcrumbColor"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
				<li>@yield('title')</li>
			</ol>
		</div>	
		<div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
			<a href="{{ route('physiotherapist.create') }}"  class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Physiotherapist</a>
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
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Email</th>
										<th>Phone</th>
										<th>Address</th>
										<th>Profile</th>
										<th>Centre</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
								</thead>
								<tbody>
									{!! $sl=null !!}
									@php
										$centreList = $centre;
									@endphp
									@foreach($data AS $value)
										<tr class="{!! $value->user_id !!}">
											<td style="width: 20px;">{!! ++$sl !!}</td>
											<td>
												@if($value->avatar_file!='' && file_exists(\App\Lib\Enumerations\ImagePaths::$PHYSIOTHERAPIST_PROFILE.'/'.$value->avatar_file))
													<img style=" width: 70px; " src="{!! asset(\App\Lib\Enumerations\ImagePaths::$PHYSIOTHERAPIST_PROFILE.'/'.$value->avatar_file) !!}" alt="user-img" class="img-circle">
												@else
													 <img style=" width: 70px; " src="{!! asset('admin_assets/img/default.png') !!}" alt="user-img" class="img-circle">
												@endif
											</td>
											<td>{!! $value->name !!}</td>
											<td>{!! $value->email !!}</td>
											<td> @if($value->phone !='') +880{!! $value->phone !!}@endif </td>
											<td>{!! $value->address !!}</td>
											<td>{!! $value->profile !!}</td>
											<td>
												<ul class="list-icons">
													@php
														if($value->centre_id !=''){
															$center_id = unserialize($value->centre_id);
															foreach ($center_id as $v){
																$searchById = array_search($v, array_column($centreList, 'centre_id'));
																if(gettype($searchById) == 'integer'){
																echo '<li><i class="fa fa-caret-right text-info"></i>';
																	echo $centreList[$searchById]['title']."<li>";
																}else{
																	echo " ";
																}
															}
														}
													@endphp
												</ul>
											</td>
											<td style="width: 100px;">
												<a href="{!! route('physiotherapist.edit',$value->user_id) !!}"  class="btn btn-success btn-sm btnColor">
													<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
												</a>
												<a href="{!!route('physiotherapist.destroy',$value->user_id  )!!}" data-token="{!! csrf_token() !!}" data-id="{!! $value->user_id !!}" class="delete btn btn-danger btn-sm deleteBtn btnColor"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
