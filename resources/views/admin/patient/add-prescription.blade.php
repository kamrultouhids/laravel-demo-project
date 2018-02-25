
<div class="modal fade bs-example-modal-prescription" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Add Prescription</h4> </div>
            {{ Form::open(array('route' => 'prescription.store','enctype'=>'multipart/form-data')) }}
            <input type="hidden" name="patient_id" value="{{$patientPersonalInfo->patient_id}}">
            <div class="modal-body">
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Medicine Name<span class="validateRq">*</span></label>
                    <select class="form-control  instruction_id" name="instruction_id" id="instruction_id" required>
                        <option value="">--- Please select ---</option>
                            @foreach($instruction as $v)
                                <option value="{{$v->instruction_id}}">{{$v->title}}</option>
                            @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="message-text" class="control-label">Instruction Description</label>
                    <textarea class="instruction_description form-control" rows="10" readonly placeholder="Instruction description..."></textarea>
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

