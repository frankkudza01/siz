<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <hr>
            <!-- Add Course Button -->
            <div class="row mb-3">
                <div class="col-lg-12 d-flex justify-content-end">
                    <a href="#addCourseModal" class="btn btn-success" data-bs-toggle="modal">Add Course</a>
                    @include('admin.courses.modals.create')
                </div>
            </div>
            <hr>
            @foreach($courses as $course)
            <div class="modal fade" id="confirmDeleteModal{{ $course->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $course->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel{{ $course->id }}">Confirm Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this courses?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form action="{{ route('/admin/courses/delete/', $course->id) }}" method="POST" style="display: inline;">
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
                            <label for="title" class="form-label">Course Title</label>
                            <input type="text" id="title" class="form-control" placeholder="Enter title" />
                        </div>
                        <!-- Category Filter -->
                        <div class="form-group me-3">
                            <label for="category" class="form-label">Sector</label>
                            <select id="category" class="form-select">
                                <option value="">Select Sector</option>
                                <option value="technology">Course</option>
                                <option value="business">Training</option>
                            </select>
                        </div>
                        <!-- Filter Button -->
                        <div class="form-group align-self-end">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <!-- Course Cards -->
            <div class="row">
                @foreach ($courses as $course)
                <div class="col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('storage/' . $course->theme) }}" alt="" class="img-fluid rounded" />
                        </div>
                        <div class="card-body">
                            <ul class="list-inline fs-14 text-muted">
                                <li class="list-inline-item">
                                    <i class="ri-calendar-line align-bottom me-1"></i> {{ $course->created_at->format('d M, Y') }}
                                </li>
                                <li class="list-inline-item">
                                    <i class="ri-user-line align-bottom me-1"></i> 364 Enrolled
                                </li>
                            </ul>
                            <a href="javascript:void(0);">
                                <h5>{{ $course->title }}</h5>
                            </a>
                            <p class="text-muted fs-14">{!! Str::limit($course->description, 100) !!}</p>
                            <hr>
                            <div>
                                <a href="#detailsModal" data-bs-target="#detailsModal{{ $course->id }}" data-bs-toggle="modal" class="btn btn-sm btn-secondary"><i class="ri-eye-line align-bottom ms-1"></i>View</a>
                                @include('admin.courses.modals.details', ['course' => $course])
                                <a href="#updateCourseModal" data-bs-target="#updateCourseModal{{ $course->id }}" data-bs-toggle="modal" class="btn btn-sm btn-success"><i class="ri-ball-pen-fill align-bottom ms-1"></i>Update</a>
                                @include('admin.courses.modals.update', [['course' => $course]])
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $course->id }}">
                                    <i class="ri-delete-bin-5-fill align-bottom ms-1"></i>Delete
                                </button>
                                |
                                <!-- Update Button with Tooltip for Attaching File -->
                                <button href="#addAttachmentModal" data-bs-target="#addAttachmentModal{{ $course->id }}" data-bs-toggle="modal" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Attach File">
                                    <i class="ri-attachment-2 align-bottom ms-1"></i>
                                </button>
                                @include('admin.courses.modals.attach', ['course' => $course])

                                <!-- Close Button with Tooltip for Closing Course -->
                                <form id="toggle-status-form-{{ $course->id }}" action="{{ route('/admin/courses/update/status/', $course->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('PATCH')
                                </form>

                                @if($course->status === 'Active')
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Deactivate Course"
                                        onclick="event.preventDefault(); document.getElementById('toggle-status-form-{{ $course->id }}').submit();">
                                        <i class="ri-arrow-turn-back-line align-bottom ms-1"></i> Deactivate
                                    </button>
                                @else
                                    <button class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Activate Course"
                                        onclick="event.preventDefault(); document.getElementById('toggle-status-form-{{ $course->id }}').submit();">
                                        <i class="ri-arrow-turn-back-line align-bottom ms-1"></i> Activate
                                    </button>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
                <!-- Repeat for more courses -->
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });

</script>
