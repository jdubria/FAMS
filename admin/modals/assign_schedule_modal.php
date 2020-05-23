<div class="modal fade" id="add_assignschedule" tabindex="-1" role="dialog" aria-labelledby="assign_schedule" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            	<div class="row">
            		<div class="col-sm-6">
            			<h6 class="modal-title text-light">Assign Subject</h6>
            		</div>
            		<div class="col-sm-6">
            			<div class="pull-right">	
			               <button type="button" class="close text-light" data-dismiss="modal" aria-hidden="true">&times;</button>
            			</div>
            		</div>
            	</div>
            </div>
            <div class="modal-body">
            	<div class="container-fluid">
            		<div class="form-group">
            			<label>Faculty and Subject:</label>
                        <div id="assigned_subject"></div>
            		</div>
            		<div class="form-group">
                        <label>Course Year and Section</label>
                        <select class="form-control" id="cy_id" name="cy_id" required="">
                            <option selected disabled>Select Course Year and Section</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Room:</label>
                        <select class="form-control" id="room_id" name="room_id" required="">
                            <option selected disabled>Select Room</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Choose Day</label>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="monday" name="day" value="Monday">
                            <label class="form-check-label" for="monday">Monday</label>
                               
                            <input type="checkbox" class="form-check-input" id="tuesday" name="day" value="Tuesday">
                            <label class="form-check-label" for="tuesday">Tuesday</label>
                        
                            <input type="checkbox" class="form-check-input" id="wednesday" name="day" value="Wednesday">
                            <label class="form-check-label" for="wednesday">Wednesday</label>
                        
                            <input type="checkbox" class="form-check-input" id="thursday" name="day" value="Thursday">
                            <label class="form-check-label" for="thursday">Thursday</label>
                        
                            <input type="checkbox" class="form-check-input" id="Friday" name="day" value="Friday">
                            <label class="form-check-label" for="friday">Friday</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Start Time</label>
                        <input type="time" name="start_time" id="start_time" class="form-control" required="">
                    </div>              		             		 		
                    <div class="form-group">
                        <label>End Time</label>
                        <input type="time" name="end_time" id="end_time" class="form-control" required="">
                    </div>
            	</div>
            </div>
            <div class="modal-footer">
            	<button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
                <button type="submit" id="save_assignedschedule" class="btn btn-sm btn-dark"><span class="fa fa-save"></span> Save</button>
            </div>
        </div>
    </div>    
</div>


<!-- View Schedule Modal -->

<div class="modal fade" id="view_modal_assigned_schedule" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="modal-title text-light">Indivual Schedule</h6>
                    </div>
                    <div class="col-sm-6">
                        <div class="pull-right">    
                           <button type="button" class="close text-light" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                    </div>
                </div>              
            </div>
            <div class="modal-body">
                <div id="dynamic_content_schedule_view"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><span class="fa fa-remove"></span> Close</button>               
            </div>
        </div>
    </div>
</div>