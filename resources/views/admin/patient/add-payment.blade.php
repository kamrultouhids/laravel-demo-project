
<div class="modal fade bs-example-modal-payment" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myLargeModalLabel">Add Payment</h4> </div>
				{{ Form::open(array('route' => 'payment.store','enctype'=>'multipart/form-data')) }}
					<input type="hidden" name="patient_id" value="{{$patientPersonalInfo->patient_id}}">
						<div class="modal-body">
							<div class="form-group">
								<label for="recipient-name" class="control-label">Treatment Given<span class="validateRq">*</span></label>
								<select class="form-control" name="treatment_given" id="treatment_given" required>
									<option value="">--- Please select ---</option>
									@foreach(treatment_given() as $key => $value)
										<optgroup label="{{$key}}">
											@foreach($value as $v)
												<option value="{{$v}}">{{$v}}</option>
											@endforeach
										</optgroup>
									@endforeach
								</select>
							</div>

							<div class="form-group">
								<label for="message-text" class="control-label">Payment Status<span class="validateRq">*</span></label>
								<select class="form-control" name="payment_status" id="payment_status" required>
									<option value="">--- Please select ---</option>
									<option value="On Payment">On Payment</option>
									<option value="Zakat">Zakat</option>
									<option value="Free of cost">Free of cost</option>
								</select>
							</div>
							<div class="form-group">
								<label for="message-text" class="control-label">Treatment Cost<span class="validateRq">*</span></label>
								<input type="number" name="treatment_cost" class="form-control" placeholder="Enter Treatment Cost" required>
							</div>
							<div class="form-group">
								<label for="message-text" class="control-label">Orthosis Cost<span class="validateRq">*</span></label>
								<input type="number" name="orthosis_cost" class="form-control" placeholder="Enter Orthosis Cost" required>
							</div>
							<div class="form-group">
								<label for="message-text" class="control-label">Payment Date<span class="validateRq">*</span></label>
								<input type="text" name="payment_date" class="form-control dateField" placeholder="Enter Payment Date" required>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default waves-effect text-left" style="width: 100px" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-info" style="width: 100px">Save</button>
						</div>
					</div>
				{{ Form::close() }}
		</div>
	</div>
</div>

