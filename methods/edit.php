<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                    <form method="post" action="methods/driveradd.php">
                        <div class="row g-3 w-80">
                            <div class="col-sm-12 form-item">
                                <label for="inputdrid" class="form-label">Driver ID</label>
                                <input type="text" class="contactus form-control" id="inputdrid" placeholder="Driver ID"  name="drid">
                            </div>
                            <div class="col-sm-12 form-item">
                                <label for="inputdrname" class="form-label">Driver Name</label>
                                <input type="text" class="textarea form-control" id= "inputdrname" placeholder="Driver Name" name="drname">
                            </div>
                            <div class="col-sm-12 form-item">
                                <label for="inputdrcontact" class="form-label">Driver Contact</label>
                                <input type="text" class="contactus form-control" id="inputdrcontact" placeholder="Driver Contactr" name="drcontact">
                            </div>    
                            <div class="col-sm-12">
                                <button class="send" name="addbtn">Add</button><br>
                                <a href="updatebuses.php"><button class="send">Update</a></button><br>
                                <a href="displaybuses.php"><button class="send">See List</a></button>   
                            </div>
                        </div>
                    </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>