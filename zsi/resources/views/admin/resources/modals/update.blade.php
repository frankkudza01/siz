<!-- Add Resource Modal -->
<div class="modal fade" id="updateResourceModal{{ $content_resource->id }}" tabindex="-1" aria-labelledby="addResourceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addResourceModalLabel">Update Resource</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin/content-resource/update/', $content_resource->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <!-- Resource Title -->
                    <div class="mb-3">
                        <label class="form-label" for="resource-title-input">Resource Title</label>
                        <input type="text" class="form-control" id="resource-title-input" name="title" value="{{ $content_resource->title }}">
                    </div>

                    <!-- Resource Caption -->
                    <div class="mb-3">
                        <label class="form-label" for="resource-caption-input">Caption</label>
                        <input type="text" class="form-control" id="resource-caption-input" name="caption" value="{{ $content_resource->caption }}">
                    </div>

                    <!-- Resource File -->
                    <div class="mb-3">
                        <label class="form-label" for="resource-file-input">Resource File</label>
                        <input type="file" class="form-control" id="resource-file-input-update" name="file" onchange="previewFile()">
                        @if($content_resource->file)
                        <div id="file-preview-container-update">
                            <hr>
                            <h6>File Preview:</h6>
                            <embed id="file-preview-update" src="{{ asset('storage/' . $content_resource->file) }}" type="application/pdf" width="100%" height="600px">
                        </div>
                        @else
                        <div id="file-preview-container-update" style="display: none;">
                            <hr>
                            <h6>File Preview:</h6>
                            <embed id="file-preview-update" type="application/pdf" width="100%" height="600px">
                        </div>
                        @endif
                    </div>

                    <!-- Category -->
                    <div class="mb-3">
                        <label class="form-label" for="resource-category-input">Category</label>
                        <select class="form-select resource-category-input" id="resource-category-input" name="category">
                            <option value="ebook" {{ $content_resource->category == 'eBook' ? 'selected' : '' }}>eBook</option>
                            <option value="pdf" {{ $content_resource->category == 'PDF Article' ? 'selected' : '' }}>PDF Article</option>
                            <option value="magazine" {{ $content_resource->category == 'Magazine' ? 'selected' : '' }}>Magazine</option>
                            <option value="brochure" {{ $content_resource->category == 'Brochure' ? 'selected' : '' }}>Brochure</option>
                        </select>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label class="form-label" for="resource-description-input">Description</label>
                        <textarea class="form-control ckeditor-classics" name="description" id="resource-description-input" rows="5">{!! $content_resource->description !!}</textarea>
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
        const file = document.getElementById('resource-file-input-update').files[0];
        const previewContainer = document.getElementById('file-preview-container-update');
        const filePreview = document.getElementById('file-preview-update');

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

    document.addEventListener('DOMContentLoaded', (event) => {
        document.querySelectorAll('.ckeditor-classics').forEach((textarea) => {
            ClassicEditor.create(textarea).then(editor => {
                editor.ui.view.editable.element.style.height = '200px';
            }).catch(error => {
                console.error(error);
            });
        });
    });

</script>
