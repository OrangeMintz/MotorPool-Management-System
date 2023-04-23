<?php include "css/customcss.php"?>

<div class="modal fade " id="delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Confirm Delete?</p>
            </div>
            <div class="modal-footer">
            <button type="button" id="cancel-btn" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="add-btn" class="btn btn-success" name ="submit">Confirm</button>
            </div>
        </div>
    </div>
</div>