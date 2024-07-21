<!-- Add Attachment Modal for Members -->
<div class="modal fade" id="addMemberAttachmentModal" tabindex="-1" aria-labelledby="addAttachmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAttachmentModalLabel">Attach File to Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label" for="attachment-caption-input">Caption</label>
                        <input type="text" class="form-control" id="attachment-caption-input" placeholder="Enter caption">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="attachment-file-input">Attachment File</label>
                        <input type="file" class="form-control" id="attachment-file-input">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="attachment-notes-input">Notes</label>
                        <textarea class="form-control ckeditor-classic" id="attachment-notes-input" rows="5" placeholder="Enter notes"></textarea>
                    </div>
                    <div class="text-end mb-4">
                        <button type="submit" class="btn btn-success w-sm">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
