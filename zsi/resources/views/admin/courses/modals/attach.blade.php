<!-- Add Attachment Modal -->
<div class="modal fade" id="addAttachmentModal{{ $course->id }}" tabindex="-1" aria-labelledby="addAttachmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAttachmentModalLabel">Attach File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('/admin/courses/attachments/store/', $course->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="attachment-caption-input">Caption</label>
                        <input type="text" class="form-control" id="attachment-caption-input" name="caption" placeholder="Enter caption" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="attachment-file-input">File</label>
                        <input type="file" class="form-control" id="attachment-file-input" name="file" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="attachment-description-input">Description</label>
                        <textarea id="attachment-description-input" class="form-control" name="description" rows="5" placeholder="Enter description"></textarea>
                    </div>
                    <div class="text-end mb-4">
                        <button type="submit" class="btn btn-success w-sm">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
