<div class="modal fade" id="assign_subject" tabindex="-1" role="dialog" aria-labelledby="assign_schedule" aria-hidden="true">
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
            			<label>Faculty:</label>
                        <select class="form-control" id="fac_num" name="fac_num">
                            <option selected disabled>Select Faculty</option>
                        </select>
            		</div>
            		<div class="form-group">
                        <label>Subject:</label>
                        <select class="form-control" id="sub_id" name="sub_id">
                            <option selected disabled>Choose Subject</option>
                        </select>
                    </div>          		             		 		
            	</div>
            </div>
            <div class="modal-footer">
            	<button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
                <button type="submit" id="save_schedule" class="btn btn-sm btn-dark"><span class="fa fa-save"></span> Save</button>
            </div>
        </div>
    </div>    
</div>

<!-- View and Update Modal -->

<div class="modal fade" id="view_modal_asign_schedule" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true" style="display: none;">
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
                <div id="dynamic_content_as"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
                <button type="submit" id="edit_assigned_schedule" class="btn btn-sm btn-dark"><span class="fa fa-edit"></span> Update</button>                
            </div>
        </div>
    </div>
</div>

<!-- Archive Modal -->

<div class="modal fade" id="archive_asign_schedule_modal" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="modal-title text-light">Archive Faculty Record</h6>
                    </div>
                    <div class="col-sm-6">
                        <div class="pull-right">    
                           <button type="button" class="close text-light" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                    </div>
                </div>              
            </div>
            <div class="modal-body">
                <div id="dynamics_content_archive"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
                <button type="submit" id="confirm_archive_as" class="btn btn-sm btn-dark"><span class="fa fa-archive"></span> Archive</button>                
            </div>
        </div>
    </div>
</div>