<div class="modal fade" id="addsemester" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
            	<div class="row">
            		<div class="col-sm-6">
            			<h6 class="modal-title text-light">Add Semester</h6>
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
                        <label>Semester</label>
                        <input type="text" name="sem_name" id="sem_name" class="form-control" placeholder="Semester name (e.i. 1st Semester)" required>
                    </div>        		 		
            	</div>
            </div>
			<div class="modal-footer">
            	<button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
                <button type="submit" id="add_semester" class="btn btn-sm btn-dark"><span class="fa fa-check"></span> Save</button>				
			</div>
		</div>
	</div>
</div>

<!-- View Acad Modal -->

<div class="modal fade" id="view_modal_semester" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true" style="display: none;">
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
                <div id="dynamic_content_semester"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
                <button type="submit" id="edit_sem" class="btn btn-sm btn-dark"><span class="fa fa-edit"></span> Update</button>               
            </div>
        </div>
    </div>
</div>

<!-- Archives -->

<div class="modal fade" id="archive_sem" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true" style="display: none;">
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
                <div id="dynamics_content_semesters"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
                <button type="submit" id="confirm_archive_sem" class="btn btn-sm btn-dark"><span class="fa fa-archive"></span> Archive</button>                
            </div>
        </div>
    </div>
</div>

<!-- Change semester Modal -->

<div class="modal fade" id="change_semester" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="modal-title text-light">Change Academic Year</h6>
                    </div>
                    <div class="col-sm-6">
                        <div class="pull-right">    
                           <button type="button" class="close text-light" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                    </div>
                </div>              
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Select Semester to Set</label>
                    <select id="set_sem" name="set_sem" class="form-control">
                        <option disabled selected>Select Semester</option>
                    </select>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
                <button type="submit" id="set_sems" class="btn btn-sm btn-dark"><span class="fa fa-check"></span> Set Academic Year</button>               
            </div>
        </div>
    </div>
</div>
