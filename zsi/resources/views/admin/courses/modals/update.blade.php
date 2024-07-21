<!-- Update Course Modal -->
<div class="modal fade" id="updateCourseModal{{ $course->id }}" tabindex="-1" aria-labelledby="updateCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateCourseModalLabel">Update Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('/admin/courses/update/', $course->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label class="form-label" for="course-title-input-{{ $course->id }}">Course Title</label>
                        <input type="text" class="form-control" id="course-title-input-{{ $course->id }}" name="title" value="{{ $course->title }}" placeholder="Enter course title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="article-theme-input-{{ $course->id }}">Course Theme</label>
                        <input type="file" class="form-control" id="article-theme-input-{{ $course->id }}" name="theme" placeholder="Upload article theme" onchange="previewTheme({{ $course->id }})">
                        <img id="theme-preview-{{ $course->id }}" src="{{ $course->theme ? asset('storage/' . $course->theme) : '#' }}" alt="Theme Preview" class="img-fluid mt-3" style="display: {{ $course->theme ? 'block' : 'none' }};">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="course-category-input-{{ $course->id }}">Category</label>
                        <select class="form-select" id="course-category-input-{{ $course->id }}" name="category">
                            <option value="Surveying Techniques" {{ $course->category == 'Surveying Techniques' ? 'selected' : '' }}>Surveying Techniques</option>
                            <option value="GIS Applications" {{ $course->category == 'GIS Applications' ? 'selected' : '' }}>GIS Applications</option>
                            <option value="Remote Sensing Insights" {{ $course->category == 'Remote Sensing Insights' ? 'selected' : '' }}>Remote Sensing Insights</option>
                            <option value="Geospatial Technology" {{ $course->category == 'Geospatial Technology' ? 'selected' : '' }}>Geospatial Technology</option>
                            <option value="Engineering Practice" {{ $course->category == 'Engineering Practice' ? 'selected' : '' }}>Engineering Practice</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="course-description-input-{{ $course->id }}">Description</label>
                        <textarea class="form-control ckeditor-classics" name="description" rows="5" placeholder="Enter course description">{{ $course->description }}</textarea>
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
    function previewTheme(articleId) {
        const fileInput = document.getElementById('article-theme-input-' + articleId);
        const preview = document.getElementById('theme-preview-' + articleId);

        const file = fileInput.files[0];
        const reader = new FileReader();
        reader.onloadend = function () {
            preview.src = reader.result;
            preview.style.display = 'block';
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }

</script>
<script>
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
