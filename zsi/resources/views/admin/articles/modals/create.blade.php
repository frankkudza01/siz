<!-- Add Article Modal -->
<div class="modal fade" id="addArticleModal" tabindex="-1" aria-labelledby="addArticleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addArticleModalLabel">Add New Article</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr>
            <div class="modal-body">
                <form action="{{ route('/admin/articles/store/') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="article-title-input">Article Title</label>
                        <input type="text" class="form-control" id="article-title-input" name="title" placeholder="Enter article title">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="article-theme-input">Article Theme</label>
                        <input type="file" class="form-control" id="article-theme-input" name="theme" placeholder="Upload article theme">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="article-tags-input">Tags</label>
                        <select class="form-select article-tags-input" id="article-category-input" name="tags[]" multiple style="height: 300px;">
                            <hr>
                            <option value="Surveying Techniques">Surveying Techniques</option>
                            <hr>
                            <option value="GIS Applications">GIS Applications</option>
                            <hr>
                            <option value="Remote Sensing Insights">Remote Sensing Insights</option>
                            <hr>
                            <option value="Geospatial Technology">Geospatial Technology</option>
                            <hr>
                            <option value="Engineering Practice">Engineering Practice</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="article-category-input">Category</label>
                        <select class="form-select article-category-input" id="article-category-input" name="category">
                            <option value="Surveying Techniques">Surveying Techniques</option>
                            <option value="GIS Applications">GIS Applications</option>
                            <option value="Remote Sensing Insights">Remote Sensing Insights</option>
                            <option value="Geospatial Technology">Geospatial Technology</option>
                            <option value="Engineering Practice">Engineering Practice</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="article-description-input">Description</label>
                        <textarea class="form-control ckeditor-classic" id="article-description-input" name="description" rows="5" placeholder="Enter article description"></textarea>
                    </div>
                    <hr>

                    <div class="text-end mb-4">
                        <button type="submit" class="btn btn-success w-sm">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
