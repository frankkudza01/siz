<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <hr>
            <!-- Add Resource Button -->
            <div class="row mb-3">
                <div class="col-lg-12 d-flex justify-content-end">
                    <a href="#addResourceModal" data-bs-target="#addResourceModal" class="btn btn-success" data-bs-toggle="modal">Add Resource</a>
                    @include('admin.resources.modals.create')
                </div>
            </div>
            <hr>
            @foreach($content_resources as $content_resource)
            <div class="modal fade" id="confirmDeleteModal{{ $content_resource->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $content_resource->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel{{ $content_resource->id }}">Confirm Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this content_resource?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form action="{{ route('admin/content-resource/destroy/', $content_resource->id) }}" method="POST" style="display: inline;">
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
                                <option value="ebook">eBook</option>
                                <option value="pdf">PDF Article</option>
                                <option value="magazine">Magazine</option>
                                <option value="brochure">Brochure</option>
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
                @foreach($content_resources as $content_resource)
                <div class="col-lg-6 col-md-6">
                    <div class="card">

                        <div class="card-body">
                            <ul class="list-inline fs-14 text-muted">
                                <li class="list-inline-item">
                                    <i class="ri-calendar-line align-bottom me-1"></i> {{ $content_resource->created_at->format('d M, Y') }}
                                </li>
                                <li class="list-inline-item">
                                    <i class="ri-download-fill align-bottom me-1"></i> 364 Downloads
                                </li>
                            </ul>
                            <a href="javascript:void(0);">
                                <h5>{{ $content_resource->title }}</h5>
                            </a>
                            <p class="text-muted fs-14">{!! $content_resource->description !!}</p>
                            <hr>
                            <div>
                                <a href="#detailsModal{{ $content_resource->id }}" data-bs-target="#detailsModal{{ $content_resource->id }}" data-bs-toggle="modal" class="btn btn-sm btn-secondary"><i class="ri-eye-line align-bottom ms-1"></i>View</a>
                                @include('admin.resources.modals.details')
                                <a href="#updateResourceModal{{ $content_resource->id }}" data-bs-target="#updateResourceModal{{ $content_resource->id }}" data-bs-toggle="modal" class="btn btn-sm btn-success"><i class="ri-ball-pen-fill align-bottom ms-1"></i>Update</a>
                                @include('admin.resources.modals.update')
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $content_resource->id }}">
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
