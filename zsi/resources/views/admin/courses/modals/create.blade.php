<!-- Add Course Modal -->
<div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCourseModalLabel">Add New Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('/admin/courses/store/') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="course-title-input">Course Title</label>
                        <input type="text" class="form-control" id="course-title-input" placeholder="Enter course title" name="title">
                    </div>
                    <div class="mb-3" id="event-theme-section">
                        <label class="form-label" for="resource-file-input">Course Theme</label>
                        <input type="file" class="form-control" id="resource-file-input" name="theme" onchange="previewFile()">
                        <div id="file-preview-container" style="display: none;">
                            <hr>
                            <h6>File Preview:</h6>
                            <embed id="file-preview" type="application/pdf" width="100%" height="600px">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="course-title-input">Sector</label>
                        <select type="text" class="form-control" id="course-title-input" name="sector">
                            <option value="Course">Course</option>
                            <option value="Training">Training</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="course-category-input">Category</label>
                        <select class="form-select" id="course-category-input" name="category">
                            <option value="Surveying Techniques">Surveying Techniques</option>
                            <option value="GIS Applications">GIS Applications</option>
                            <option value="Remote Sensing Insights">Remote Sensing Insights</option>
                            <option value="Geospatial Technology">Geospatial Technology</option>
                            <option value="Engineering Practice">Engineering Practice</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="course-description-input">Description</label>
                        <textarea id="ckeditor-classic" class="form-control ckeditor-classic" id="course-description-input" rows="5" name="description" placeholder="Enter course description"></textarea>
                    </div>
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
