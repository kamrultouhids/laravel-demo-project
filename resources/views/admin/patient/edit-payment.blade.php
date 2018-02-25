
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myLargeModalLabel">Edit Payment</h4> </div>
        {{ Form::open( array('route' => array('payment.update', $editModeData->payment_id), 'method' => 'PUT','files' => 'true')) }}
        <div class="modal-body">
            <div class="form-group">
                <label for="recipient-name" class="control-label">Treatment Given<span class="validateRq">*</span></label>
                <select class="form-control" name="treatment_given" id="treatment_given" required>
                    <option value="">--- Please select ---</option>
                    @foreach(treatment_given() as $key => $value)
                        <optgroup label="{{$key}}">
                            @foreach($value as $v)
                                <option value="{{$v}}" @if($editModeData->treatment_given == $v) {{"selected"}} @endif>{{$v}}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="message-text" class="control-label">Payment Status<span class="validateRq">*</span></label>
                <select class="form-control" name="payment_status" id="payment_status" required>
                    <option value="">--- Please select ---</option>
                    <option value="On Payment" @if($editModeData->payment_status == "On Payment") {{"selected"}} @endif>On Payment</option>
                    <option value="Zakat" @if($editModeData->payment_status == "Zakat") {{"selected"}} @endif>Zakat</option>
                    <option value="Free of cost" @if($editModeData->payment_status == "Free of cost") {{"selected"}} @endif>Free of cost</option>
                </select>
            </div>
            <div class="form-group">
                <label for="message-text" class="control-label">Treatment Cost<span class="validateRq">*</span></label>
                <input type="number" name="treatment_cost" class="form-control" placeholder="Enter Treatment Cost" required value="{{$editModeData->treatment_cost}}">
            </div>
            <div class="form-group">
                <label for="message-text" class="control-label">Orthosis Cost<span class="validateRq">*</span></label>
                <input type="number" name="orthosis_cost" class="form-control" placeholder="Enter Orthosis Cost" required value="{{$editModeData->orthosis_cost}}">
            </div>
            <div class="form-group">
                <label for="message-text" class="control-label">Payment Date<span class="validateRq">*</span></label>
                <input type="text" name="payment_date" class="form-control dateField" placeholder="Enter Payment Date" required value="{{dateConvertDBtoForm($editModeData->payment_date)}}">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default waves-effect text-left" style="width: 100px" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info" style="width: 100px">Save</button>
        </div>
        {{ Form::close() }}
    </div>


