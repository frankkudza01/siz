<!-- Update Article Modal -->
<div class="modal fade" id="updateArticleModal{{ $article->id }}" tabindex="-1" aria-labelledby="updateArticleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateArticleModalLabel">Update Article</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr>
            <div class="modal-body">
                <form id="update-article-form-{{ $article->id }}" action="{{ route('/admin/articles/update/', $article->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label class="form-label" for="article-title-input">Article Title</label>
                        <input type="text" class="form-control" id="article-title-input" name="title" placeholder="Enter article title" value="{{ $article->title }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="article-theme-input-{{ $article->id }}">Article Theme</label>
                        <input type="file" class="form-control" id="article-theme-input-{{ $article->id }}" name="theme" placeholder="Upload article theme" onchange="previewTheme({{ $article->id }})">
                        <img id="theme-preview-{{ $article->id }}" src="{{ $article->theme ? asset('storage/' . $article->theme) : '#' }}" alt="Theme Preview" class="img-fluid mt-3" style="display: {{ $article->theme ? 'block' : 'none' }};">
                    </div>


                    <div class="mb-3">
                        <label class="form-label" for="article-category-input">Category</label>
                        <select class="form-select" id="article-category-input" name="category">
                            <option value="Surveying Techniques" {{ $article->category == 'Surveying Techniques' ? 'selected' : '' }}>Surveying Techniques</option>
                            <option value="GIS Applications" {{ $article->category == 'GIS Applications' ? 'selected' : '' }}>GIS Applications</option>
                            <option value="Remote Sensing Insights" {{ $article->category == 'Remote Sensing Insights' ? 'selected' : '' }}>Remote Sensing Insights</option>
                            <option value="Geospatial Technology" {{ $article->category == 'Geospatial Technology' ? 'selected' : '' }}>Geospatial Technology</option>
                            <option value="Engineering Practice" {{ $article->category == 'Engineering Practice' ? 'selected' : '' }}>Engineering Practice</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="article-description-input">Description</label>
                        <textarea class="form-control ckeditor-classics" id="article-description-input" name="description" rows="5">{{ $article->description }}</textarea>
                    </div>
                    <hr>

                    <div class="text-end mb-4">
                        <button type="submit" class="btn btn-success w-sm">Update</button>
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

