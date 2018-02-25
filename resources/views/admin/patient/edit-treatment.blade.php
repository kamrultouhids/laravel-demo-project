
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myLargeModalLabel">Edit Treatment Information</h4> </div>
        {{ Form::open( array('route' => array('treatment.update', $editModeData->treatment_id), 'method' => 'PUT','files' => 'true')) }}
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Service<span class="validateRq">*</span></label>
                            <select class="form-control" name="service" id="service" required>
                                <option value="">--- Please select ---</option>
                                <option value="ZCF" @if($editModeData->service == 'ZCF') {{"selected"}} @endif>ZCF</option>
                                <option value="Physiotheraphy" @if($editModeData->service == 'Physiotheraphy') {{"selected"}} @endif>Physiotheraphy</option>
                                <option value="Disability Care" @if($editModeData->service == 'Disability Care') {{"selected"}} @endif>Disability Care</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="message-text" class="control-label">Consultant Name<span class="validateRq">*</span></label>
                            <select class="form-control" name="consultant_id" id="consultant_id" required>
                                <option value="">--- Please select ---</option>
                                    @foreach($consultantList as $value)
                                        <option value="{{$value['user_id']}}" @if($editModeData->consultant_id == $value['user_id']) {{"selected"}} @endif>{{$value['name']}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="message-text" class="control-label">Limb Involved</label>
                            <select class="form-control" name="limb_involved" id="limb_involved">
                                <option value="">--- Please select ---</option>
                                <option value="Right" @if($editModeData->limb_involved == 'Right') {{"selected"}} @endif>Right</option>
                                <option value="Left" @if($editModeData->limb_involved == 'Left') {{"selected"}} @endif>Left</option>
                                <option value="Bilateral" @if($editModeData->limb_involved == 'Bilateral') {{"selected"}} @endif>Bilateral</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="message-text" class="control-label">Diagonsis</label>
                            <input type="text" class="form-control" name="diagonsis" id="diagonsis" placeholder="Enter Diagonsis" value="{{$editModeData->diagonsis}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="message-text" class="control-label">Deformity Type</label>
                            <select class="form-control" name="deformity_type" id="deformity_type">
                                <option value="">--- Please select ---</option>
                                @foreach(deformity_type() as $value)
                                    <option value="{{$value}}" {{$editModeData->deformity_type}}  @if($editModeData->deformity_type == $value) {{"selected"}} @endif>{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="message-text" class="control-label">Treatment Given</label>
                            <input type="text" class="form-control" name="treatment_given" id="treatment_given" placeholder="Enter Treatment Given" value="{{$editModeData->treatment_given}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="previous_treatment">Treatment Date</label>
                            <input type="text" class="form-control dateField" name="date" id="date" placeholder="Enter Treatment Date" value="{{dateConvertDBtoForm($editModeData->date)}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="previous_treatment">Previous Treatment</label>
                            <div>
                                <label>
                                    <input type="radio" value="Yes" name="previous_treatment" id="previous_treatment" class="flat-red" @if($editModeData->previous_treatment == 'Yes') {{"checked"}} @endif>Yes
                                </label>
                                <label>
                                    <input type="radio" value="No" name="previous_treatment" id="previous_treatment" class="flat-red" @if($editModeData->previous_treatment == 'No') {{"checked"}} @endif>No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="previous_treatment">Session Complete</label>
                            <div>
                                <label>
                                    <input type="radio" value="Yes" name="session_complete" id="session_complete" class="flat-red" @if($editModeData->session_complete == 'Yes') {{"checked"}} @endif>Yes
                                </label>
                                <label>
                                    <input type="radio" value="No" name="session_complete" id="session_complete" class="flat-red" @if($editModeData->session_complete == 'No') {{"checked"}} @endif>No
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect text-left" style="width: 100px" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info" style="width: 100px">Update</button>
            </div>
        {{ Form::close() }}
     </div>

