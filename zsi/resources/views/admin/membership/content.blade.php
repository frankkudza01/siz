<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <hr>
            <!-- Add Course and Member Buttons -->
            <div class="row mb-3">
                <div class="col-lg-12 d-flex justify-content-end">
                    <a href="#addMemberModal" class="btn btn-success ms-2" data-bs-toggle="modal">Add Member</a>
                    @include('admin.membership.modals.create')
                </div>
            </div>
            <hr>
            @foreach($members as $member)
            <div class="modal fade" id="confirmDeleteModal{{ $member->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $member->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel{{ $member->id }}">Confirm Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this article?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form action="{{ route('/admin/members/delete/', $member->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- Filter Section for Courses and Members -->
            <div class="row mb-5">
                <div class="col-lg-12">
                    <form class="d-flex flex-wrap justify-content-between">
                        <!-- Course Filters -->
                        <div class="form-group me-3">
                            <label for="date" class="form-label">Course Date</label>
                            <input type="date" id="date" class="form-control" />
                        </div>

                        <!-- Member Filters -->
                        <div class="form-group me-3">
                            <label for="member-date" class="form-label">Member Registration Date</label>
                            <input type="date" id="member-date" class="form-control" />
                        </div>
                        <div class="form-group me-3">
                            <label for="member-name" class="form-label">Member Name</label>
                            <input type="text" id="member-name" class="form-control" placeholder="Enter member name" />
                        </div>
                        <div class="form-group me-3">
                            <label for="member-status" class="form-label">Member Status</label>
                            <select id="member-status" class="form-select">
                                <option value="">Select Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <!-- Filter Buttons -->
                        <div class="form-group align-self-end">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <!-- Course and Member Cards -->
            <div class="row">
                @foreach($members as $member)
                    <div class="col-lg-6 col-md-6">
                        <!-- Member Card -->
                        <div class="card mb-4">
                            <div class="card-body d-flex justify-content-center">
                                <img src="{{ $member->profile ? asset('storage/' . $member->profile) : asset('admin/assets/images/small/img-9.jpg') }}" alt="Profile Image" class="img-fluid rounded-circle" style="width: 100px; height: 100px;">
                            </div>
                            <div class="card-body">
                                <ul class="list-inline fs-14 text-muted">
                                    <li class="list-inline-item">
                                        <i class="ri-calendar-line align-bottom me-1"></i> {{ $member->registration_date }}
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="ri-user-line align-bottom me-1"></i> {{ $member->status }}
                                    </li>
                                </ul>
                                <a href="javascript:void(0);">
                                    <h5>{{ $member->name }} {{ $member->surname }}</h5>
                                </a>
                                <p class="text-muted fs-14">Location: {{ $member->location }}</p>
                                <hr>
                                <div>
                                    <a href="#memberDetailsModal" data-bs-target="#memberDetailsModal{{ $member->id }}" data-bs-toggle="modal" class="btn btn-sm btn-secondary"><i class="ri-eye-line align-bottom ms-1"></i>View</a>
                                    @include('admin.membership.modals.details', ['member' => $member])
                                    <a href="#updateMemberModal" data-bs-target="#updateMemberModal{{ $member->id }}" data-bs-toggle="modal" class="btn btn-sm btn-success"><i class="ri-ball-pen-fill align-bottom ms-1"></i>Update</a>
                                    @include('admin.membership.modals.update', ['member' => $member])

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

