<!-- Add Resource Modal -->
<div class="modal fade" id="addResourceModal" tabindex="-1" aria-labelledby="addResourceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addResourceModalLabel">Add New Resource</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr>
            <div class="modal-body">
                <form id="add-resource-form" action="{{ route('admin/content-resource/store/') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Resource Title -->
                    <div class="mb-3">
                        <label class="form-label" for="resource-title-input">Resource Title</label>
                        <input type="text" class="form-control" id="resource-title-input" name="title" placeholder="Enter resource title">
                    </div>

                    <!-- Caption -->
                    <div class="mb-3">
                        <label class="form-label" for="resource-caption-input">Caption</label>
                        <input type="text" class="form-control" id="resource-caption-input" name="caption" placeholder="Enter resource caption">
                    </div>

                    <!-- Resource File -->
                    <div class="mb-3">
                        <label class="form-label" for="resource-file-input">Resource File</label>
                        <input type="file" class="form-control" id="resource-file-input" name="file" onchange="previewFile()">
                        <div id="file-preview-container" style="display: none;">
                            <hr>
                            <h6>File Preview:</h6>
                            <embed id="file-preview" type="application/pdf" width="100%" height="600px">
                        </div>
                    </div>

                    <!-- Category -->
                    <div class="mb-3">
                        <label class="form-label" for="resource-category-input">Category</label>
                        <select class="form-select" id="resource-category-input" name="category">
                            <option value="ebook">eBook</option>
                            <option value="pdf">PDF Article</option>
                            <option value="magazine">Magazine</option>
                            <option value="brochure">Brochure</option>
                        </select>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label class="form-label" for="resource-description-input">Description</label>
                        <textarea id="resource-description-input" class="form-control ckeditor-classic" name="description" rows="5" placeholder="Enter resource description"></textarea>
                    </div>
                    <hr>

                    <!-- Save Button -->
                    <div class="text-end mb-4">
                        <button type="submit" class="btn btn-success w-sm">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewFile() {
        const file = document.getElementById('resource-file-input').files[0];
        const previewContainer = document.getElementById('file-preview-container');
        const filePreview = document.getElementById('file-preview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                filePreview.src = e.target.result;
            }
            reader.readAsDataURL(file);
            previewContainer.style.display = 'block';
        } else {
            previewContainer.style.display = 'none';
        }
    }
</script>
