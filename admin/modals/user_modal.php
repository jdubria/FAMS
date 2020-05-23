<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
            	<div class="row">
            		<div class="col-sm-6">
            			<h6 class="modal-title text-light">Add User</h6>
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
                        <label>User Name</label>
                        <input type="text" name="user_names" id="user_names" class="form-control">
                        <small id="label"></small>
                    </div>        		 		

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>User Level</label>
                        <select name="user_level" id="user_level" class="form-control">
                            <option disabled selected>Select User Level</option>
                            <option value="1">Admin</option>
                            <option value="2">Student Assistant</option>
                            <option value="3">Faculty</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div id="teacher"></div>
                    </div>                    

                </div>                
            </div>
			<div class="modal-footer">
            	<button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
                <button type="submit" id="add_user" class="btn btn-sm btn-dark"><span class="fa fa-check"></span> Save</button>				
			</div>
		</div>
	</div>
</div>