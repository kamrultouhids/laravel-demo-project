
<div class="modal fade bs-example-modal-treatment" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myLargeModalLabel">Add Treatment Information</h4> </div>
			{{ Form::open(array('route' => 'treatment.store','enctype'=>'multipart/form-data')) }}
				<input type="hidden" name="patient_id" value="{{$patientPersonalInfo->patient_id}}">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="recipient-name" class="control-label">Service<span class="validateRq">*</span></label>
								<select class="form-control" name="service" id="service" required>
									<option value="">--- Please select ---</option>
									<option value="ZCF">ZCF</option>
									<option value="Physiotheraphy">Physiotheraphy</option>
									<option value="Disability Care">Disability Care</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="message-text" class="control-label">Consultant Name<span class="validateRq">*</span></label>
								<select class="form-control" name="consultant_id" id="consultant_id" required>
									<option value="">--- Please select ---</option>
									@foreach($consultantList as $value)
										<option value="{{$value['user_id']}}">{{$value['name']}}</option>
									@endforeach

								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="message-text" class="control-label">Limb Involved</label>
								<select class="form-control" name="limb_involved" id="limb_involved">
									<option value="">--- Please select ---</option>
									<option value="Right">Right</option>
									<option value="Left">Left</option>
									<option value="Bilateral">Bilateral</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="message-text" class="control-label">Diagonsis</label>
								<input type="text" class="form-control" name="diagonsis" id="diagonsis" placeholder="Enter Diagonsis">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="message-text" class="control-label">Deformity Type</label>
								<select class="form-control" name="deformity_type" id="deformity_type">
									<option value="">--- Please select ---</option>
									@foreach(deformity_type() as $value)
										<option value="{{$value}}">{{$value}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="message-text" class="control-label">Treatment Given</label>
								<input type="text" class="form-control" name="treatment_given" id="treatment_given" placeholder="Enter Treatment Given">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="previous_treatment">Treatment Date</label>
								<input type="text" class="form-control dateField" name="date" id="date" placeholder="Enter Treatment Date">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="previous_treatment">Previous Treatment</label>
								<div>
									<label>
										<input type="radio" value="Yes" name="previous_treatment" id="previous_treatment" class="flat-red">Yes
									</label>
									<label>
										<input type="radio" value="No" name="previous_treatment" id="previous_treatment" class="flat-red">No
									</label>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="previous_treatment">Session Complete</label>
								<div>
									<label>
										<input type="radio" value="Yes" name="session_complete" id="session_complete" class="flat-red">Yes
									</label>
									<label>
										<input type="radio" value="No" name="session_complete" id="session_complete" class="flat-red">No
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default waves-effect text-left" style="width: 100px" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-info" style="width: 100px">Save</button>
				</div>
			{{ Form::close() }}
		</div>
	</div>
</div>

