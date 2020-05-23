<div class="modal fade" id="addroom" tabindex="-1" role="dialog" aria-labelledby="addTeacher" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            	<div class="row">
            		<div class="col-sm-6">
            			<h6 class="modal-title text-light">Add Room</h6>
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
                        <label>Room Name</label>
                        <input type="text" name="room_name" id="room_name" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>Room Type</label>
                        <select name="room_type" id="room_type" class="form-control" placeholder="" required>
                            <option disabled selected>Please Select</option>
                            <option value="Lecture Room">Lecture Room</option>
                            <option value="Laboratory Room">Laboratory Room</option>
                        </select>
                    </div>        		 		
            	</div>
            </div>
            <div class="modal-footer">
            	<button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
                <button type="submit" id="save_room" class="btn btn-sm btn-dark"><span class="fa fa-save"></span> Save</button>
            </div>
        </div>
    </div>    
</div>


<!-- View Room Modal -->

<div class="modal fade" id="view_modal_room" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="modal-title text-light">Edit</h6>
                    </div>
                    <div class="col-sm-6">
                        <div class="pull-right">    
                           <button type="button" class="close text-light" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                    </div>
                </div>              
            </div>
            <div class="modal-body">
                <div id="dynamic_content_room"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
                <button type="submit" id="edit_room" class="btn btn-sm btn-dark"><span class="fa fa-edit"></span> Update</button>               
            </div>
        </div>
    </div>
</div>

<!-- Archive Room -->

<div class="modal fade" id="archive_room" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="modal-title text-light">Archive A Room</h6>
                    </div>
                    <div class="col-sm-6">
                        <div class="pull-right">    
                           <button type="button" class="close text-light" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                    </div>
                </div>              
            </div>
            <div class="modal-body">
                <div id="dynamics_content_archive_room"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
                <button type="submit" id="confirm_archive_room" class="btn btn-sm btn-dark"><span class="fa fa-archive"></span> Archive</button>                
            </div>
        </div>
    </div>
</div>