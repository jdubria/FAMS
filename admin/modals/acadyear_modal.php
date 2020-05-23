<div class="modal fade" id="addacadyear" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
            	<div class="row">
            		<div class="col-sm-6">
            			<h6 class="modal-title text-light">Add Academic Year</h6>
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
                        <label>Academic Year</label>
                        <input type="text" name="ay_name" id="ay_name" class="form-control" placeholder="0000-0000" required>
                    </div>        		 		
            	</div>
            </div>
			<div class="modal-footer">
            	<button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
                <button type="submit" id="add_acadyear" class="btn btn-sm btn-dark"><span class="fa fa-check"></span> Save</button>				
			</div>
		</div>
	</div>
</div>


<!-- View Acad Modal -->

<div class="modal fade" id="view_modal_ay" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true" style="display: none;">
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
                <div id="dynamic_content_acad_year"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
                <button type="submit" id="edit_acad" class="btn btn-sm btn-dark"><span class="fa fa-edit"></span> Update</button>               
            </div>
        </div>
    </div>
</div>


<!-- archives -->

<div class="modal fade" id="archive_ay" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true" style="display: none;">
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
                <div id="dynamics_content_archive_ay"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
                <button type="submit" id="confirm_archive_ay" class="btn btn-sm btn-dark"><span class="fa fa-archive"></span> Archive</button>                
            </div>
        </div>
    </div>
</div>
<!-- Change Acad Modal -->

<div class="modal fade" id="change_acadyear" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true" style="display: none;">
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
                    <label>Select Academic Year</label>
                    <select id="set_acad" name="set_acad" class="form-control">
                        <option disabled selected>Select Academic Year</option>
                    </select>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
                <button type="submit" id="set_acads" class="btn btn-sm btn-dark"><span class="fa fa-check"></span> Set Academic Year</button>               
            </div>
        </div>
    </div>
</div>
