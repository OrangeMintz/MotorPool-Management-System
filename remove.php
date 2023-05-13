<?php include "css/customcss.php"?>

<div class="modal fade " id="delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete <i class="fas fa-exclamation-triangle delete" aria-hidden="true"></i></h4>
                
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Confirm Delete Existing Data?</h6>
            </div>
            <div class="modal-footer">
            <button type="button" id="cancel-delete-btn" class="btn btn-info" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="delete-btn" class="btn btn-danger" name ="submit">Confirm</button>
            </div>
        </div>
    </div>
</div>