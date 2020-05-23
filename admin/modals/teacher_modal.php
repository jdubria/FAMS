<div class="modal fade" id="addTeacher" tabindex="-1" role="dialog" aria-labelledby="addTeacher" aria-hidden="true">
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
            	<!-- <form method="POST"> -->
            	<div class="container-fluid">
            		<div class="form-group">
            			<label>Last Name:</label>
            			<input type="text" name="last_name" id="last_name" class="form-control" placeholder="e.i. Dela Cruz" required>
            		</div>
            		<div class="form-group">
            			<label>First Name:</label>
            			<input type="text" name="first_name" id="first_name" class="form-control" placeholder="e.i. Juan" required>
            		</div>
            		<div class="form-group">
            			<label>Middle Name:</label>
            			<input type="text" name="middle_name" id="middle_name" class="form-control" placeholder="e.i. Filipe" required>
            		</div>
            		<div class="form-group">
            			<label>Date of Birth</label>
            			<input type="date" name="date_of_birth" id="date_of_birth" class="form-control" required>
            		</div>
            		<div class="form-group">
            			<label>Contact</label>
            			<input type="number" name="contact" id="contact" class="form-control" value="+639" maxlength="14" required>
            		</div>
            		<div class="form-group">
            			<label>Email</label>
            			<input type="email" name="email" id="email" class="form-control" placeholder="name@email.com" required>
            		</div>             		             		 		
            	</div>
            </div>
            <div class="modal-footer">
            	<button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
                <button type="submit" id="save_teacher" class="btn btn-sm btn-dark"><span class="fa fa-save"></span> Save</button>
				<!-- </form>                 -->
            </div>
        </div>
    </div>    
</div>

<!-- View Teacher Information -->

<div class="modal fade" id="view_modal" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true" style="display: none;">
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
                <div id="dynamic_content"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
                <button type="submit" id="edit_teacher" class="btn btn-sm btn-dark"><span class="fa fa-edit"></span> Update</button>                
            </div>
        </div>
    </div>
</div>

<!-- archive modal -->
<div class="modal fade" id="archive_teacher" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true" style="display: none;">
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
                <div id="dynamics_content"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
                <button type="submit" id="archive_teachers" class="btn btn-sm btn-dark"><span class="fa fa-archive"></span> Archive</button>                
            </div>
        </div>
    </div>
</div>