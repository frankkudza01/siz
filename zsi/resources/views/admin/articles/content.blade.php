<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <hr>
            <!-- Add Article Button -->
            <div class="row mb-3">
                <div class="col-lg-12 d-flex justify-content-end">
                    <a href="#addArticleModal" class="btn btn-success" data-bs-toggle="modal">Add Article</a>
                    @include('admin.articles.modals.create')
                </div>
            </div>
            <hr>
            <!-- Confirm Delete Modal -->
            @foreach($articles as $article)
            <div class="modal fade" id="confirmDeleteModal{{ $article->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $article->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel{{ $article->id }}">Confirm Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this article?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form action="{{ route('admin/articles/destroy', $article->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- Filter Section -->
            <div class="row mb-5">
                <div class="col-lg-12">
                    <form class="d-flex flex-wrap justify-content-between">
                        <!-- Date Filter -->
                        <div class="form-group me-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" id="date" class="form-control" />
                        </div>
                        <!-- Title Filter -->
                        <div class="form-group me-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" id="title" class="form-control" placeholder="Enter title" />
                        </div>
                        <!-- Category Filter -->
                        <div class="form-group me-3">
                            <label for="category" class="form-label">Category</label>
                            <select id="category" class="form-select">
                                <option value="">Select Category</option>
                                <option value="technology">Technology</option>
                                <option value="business">Business</option>
                                <option value="design">Design</option>
                            </select>
                        </div>
                        <!-- Filter Button -->
                        <div class="form-group align-self-end">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end filter row -->
            <hr>
            <div class="row">
                @foreach($articles as $article)
                <div class="col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('storage/' . $article->theme) }}" alt="" class="img-fluid rounded" style="height: 300px;" />
                        </div>
                        <div class="card-body">
                            <ul class="list-inline fs-14 text-muted">
                                <li class="list-inline-item">
                                    <i class="ri-calendar-line align-bottom me-1"></i> {{ $article->created_at->format('d M, Y') }}
                                </li>
                                <li class="list-inline-item">
                                    <i class="ri-message-2-line align-bottom me-1"></i> 364 Comment
                                </li>
                            </ul>
                            <a href="javascript:void(0);">
                                <h5>{{ $article->title }}</h5>
                            </a>
                            <p class="text-muted fs-14">{!! $article->description !!}</p>
                            <hr>
                            <div>
                                <a href="#detailsModal{{ $article->id }}" data-bs-target="#detailsModal{{ $article->id }}" data-bs-toggle="modal" class="btn btn-sm btn-secondary"><i class="ri-eye-line align-bottom ms-1"></i>View</a>
                                @include('admin.articles.modals.details', ['article' => $article])
                                <a href="#updateArticleModal{{ $article->id }}" data-bs-target="#updateArticleModal{{ $article->id }}" data-bs-toggle="modal" class="btn btn-sm btn-success"><i class="ri-ball-pen-fill align-bottom ms-1"></i>Update</a>
                                @include('admin.articles.modals.update')
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $article->id }}">
                                    <i class="ri-delete-bin-5-fill align-bottom ms-1"></i>Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- end container -->
    </div>
</div>
