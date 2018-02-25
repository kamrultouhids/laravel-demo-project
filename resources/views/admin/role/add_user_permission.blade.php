@extends('admin.master')
@section('content')
@section('title','Add Role Permission')
	<div class="container-fluid">
		<div class="row bg-title">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<ol class="breadcrumb">
					<li class="active breadcrumbColor"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
					<li>@yield('title')</li>
				  
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading"><i class="mdi mdi-clipboard-text fa-fw"></i> Role Permission</div>
					<div class="panel-wrapper collapse in" aria-expanded="true">
						<div class="panel-body">
							{{ Form::open(array('route' => 'rolePermission.store','enctype'=>'multipart/form-data','id'=>'userInfo')) }}
							<div class="form-body">
								<div class="row">
									<div class="col-md-8 col-sm-12">
										@if($errors->any())
											<div class="alert alert-danger alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
															aria-hidden="true">×</span></button>
												@foreach($errors->all() as $error)
													<strong>{!! $error !!}</strong><br>
												@endforeach
											</div>
										@endif
										<div class="form-group">
											<label for="role">User Role<span class="validateRq">*</span></label>
                                            <select class="form-control role_id select2 required" name="role_id" onchange="getMenu(this)" id="role_id">
                                                <option value="">--- Select Role ---</option>
                                                @foreach($data as $value)
                                                    <option value="{{$value->role_id}}">{{$value->role_name}}</option>
                                                @endforeach
                                            </select>
										</div>
									</div>
									<div class="col-md-4"></div>

								</div>
								<div class="row">
									<div class="form-group">
										<div class="ShowMember">

										</div>
									</div>
								</div>


							</div>
							<div class="form-actions">
								<div class="row">
									<div class="col-md-6">
										<button type="submit" id="formSubmit" disabled="disabled" class="btn btn-info btn_style"><i class="fa fa-check"></i> Update</button>
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
	<script>

        $(document).on("click", '.checkAll', function (event) {
            if (this.checked) {
                $('.inputCheckbox').each(function () {
                    this.checked = true;
                });
            } else {
                $('.inputCheckbox').each(function () {
                    this.checked = false;
                });
            }
        });


        function getMenu(select) {
            var role_id = $('.role_id ').val();
            if (role_id != '') {
                $('body').find('#formSubmit').attr('disabled', false);
            } else {
                $('.inputCheckbox').each(function(){
                    this.checked = false;
                });
                $('body').find('#formSubmit').attr('disabled', true);
                $(".se-pre-con").fadeOut("slow");
                return false;
            }

            var action = "{{ URL::to('rolePermission/get_all_menu') }}";
            $.ajax({
                type: 'POST',
                url: action,
                data: {role_id: role_id, '_token': $('input[name=_token]').val()},

                success: function (result) {
                    console.log(result.arrayFormat);
                    var dataFormat = '<label class="col-md-2 col-sm-12 control-label" style="padding: 17px;">Pages permission </label>';

                    dataFormat += '<div id="area_select" class="col-md-6 col-sm-12" style="margin-top: 20px">';
                    dataFormat += '<div class="checkbox checkbox-info">';
                    dataFormat += '<input class="inputCheckbox checkAll"  type="checkbox" id="inlineCheckbox" >';
                    dataFormat += '<label for="inlineCheckbox"><strong>Select All</strong></label>';
                    dataFormat += '	</div>';

                    dataFormat += '<div class="well" style="margin-bottom:15px; padding:20px">';
                    var sl=1;
                    $.each(result.arrayFormat, function (key, value) {
                        sl++;
                        checkedValue = '';
                        if (value['hasPermission'] == 'yes') {
                            checkedValue = 'checked';
                        }
                        dataFormat += '<div class="checkbox checkbox-info">';
                        dataFormat += '<input class="inputCheckbox" data-menu="' + value['id'] + '" type="checkbox" id="inlineCheckbox1'+sl+'" ' + checkedValue + ' name="menu_id[]" value="' + value['id'] + '">';
                        dataFormat += '<label for="inlineCheckbox1'+sl+'">'+ value['name'] + '</label>';
                        dataFormat += '</div>';

                    });
                    dataFormat += '</div>';
                    $('.ShowMember').html(dataFormat);
                }
            });
        }
	</script>
@endsection