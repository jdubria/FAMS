<div class="modal fade" id="addsubject" tabindex="-1" role="dialog" aria-labelledby="addTeacher" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            	<div class="row">
            		<div class="col-sm-6">
            			<h6 class="modal-title text-light">Add Faculty</h6>
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
                        <label>Subject Code</label>
                        <input type="text" name="sub_code" id="sub_code" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>Subject Description</label>
                        <input type="text" name="sub_desc" id="sub_desc" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>Number Unit</label>
                        <input type="number" name="num_unit" id="num_unit" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>Number Hours</label>
                        <input type="number" name="num_hours" id="num_hours" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>Semester</label>
                        <select id="sem_id" name="sem_id" class="form-control">
                            <option disabled selected>Please Select Semester</option>
                        </select>
                    </div>           		             		 		
            	</div>
            </div>
            <div class="modal-footer">
            	<button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
                <button type="submit" id="save_subject" class="btn btn-sm btn-dark"><span class="fa fa-save"></span> Save</button>
            </div>
        </div>
    </div>    
</div>

<!-- Subject Details Modal -->

<div class="modal fade" id="view_modal_subject" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true" style="display: none;">
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
                <div id="dynamic_content_subject"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
                <button type="submit" id="edit_subject" class="btn btn-sm btn-dark"><span class="fa fa-edit"></span> Update</button>                
            </div>
        </div>
    </div>
</div>

<!-- Archive Modal -->

<div class="modal fade" id="archive_subject" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="modal-title text-light">Archive Subject Record</h6>
                    </div>
                    <div class="col-sm-6">
                        <div class="pull-right">    
                           <button type="button" class="close text-light" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                    </div>
                </div>              
            </div>
            <div class="modal-body">
                <div id="dynamics_content_archive_subject"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
                <button type="submit" id="confirm_archive_subject" class="btn btn-sm btn-dark"><span class="fa fa-archive"></span> Archive</button>             
            </div>
        </div>
    </div>
</div>