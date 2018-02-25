@extends('admin.master')
@section('content')
@section('title','Patient List')
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
			<a href="{{ route('patient.create') }}"  class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Patient</a>
		</div>	
	</div>
                
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-info">
				<div class="panel-heading"><i class="mdi mdi-table fa-fw"></i> @yield('title')</div>
				<div class="panel-wrapper collapse in" aria-expanded="true">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-2">
								<label>Center</label>
								<select class="centre_id form-control">
									<option value="">--- Please select ---</option>
									@foreach($centerList as $v)
										<option value="{{$v->centre_id}}">{{$v->title}}</option>
									@endforeach
								</select>
							</div>
							<div class="col-md-8"></div>
							<div class="col-md-2">
								<label>Search</label>
								<input type="text" class="form-control search" placeholder="Search ">
							</div>
						</div>
						</br>
						<div class="data">
							@include('admin.patient.paginate')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('page_scripts')
	<script>
		$(function() {
			$('.data').on('click', '.pagination a', function (e) {
				getData($(this).attr('href').split('page=')[1]);
				e.preventDefault();
			});

            $(".centre_id ").change(function(){
                getData(1);
            });

            $(".search").bind("keyup change", function(e) {
                getData(1);
            })

		});

		function getData(page) {
			var centre_id  	= $('.centre_id ').val();
			var search  	= $('.search ').val();

			$.ajax({
				url : '?page=' + page+"&centre_id="+centre_id+"&search="+search,
				datatype: "html",
			}).done(function (data) {
				$('.data').html(data);
				$("html, body").animate({ scrollTop: 0 }, 800);
			}).fail(function () {
				alert('No response from server');
			});
		}
	</script>
@endsection