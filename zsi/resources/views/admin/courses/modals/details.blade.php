<!-- Details Modal -->
<div class="modal fade" id="detailsModal{{ $course->id }}" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModalLabel">Course Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('storage/' . $course->theme) }}" alt="" class="img-fluid rounded" />
                    </div>
                </div>
                <div class="pt-3 border-top border-top-dashed mt-4">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-medium">Create Date</td>
                                <td>{{ $course->created_at->format('d M, Y') }}</td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Category</td>
                                <td><span class="badge bg-danger fs-12">{{ $course->category }}</span></td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Status</td>
                                <td><span class="badge bg-warning fs-12">{{ $course->status }}</span></td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Enrolled Students</td>
                                <td>245</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <h6 class="mb-3 fw-semibold">Description</h6>
                    <p class="justified-text">
                        {!! $course->description !!}
                    </p>
                    <ul class="ps-4 vstack gap-2">
                        <li>Surveying & Technology</li>
                        <li>Geo Informatics</li>
                    </ul>
                </div>

                <hr>
                <!-- Table for Attached Files -->
                <div class="mt-4">
                    <h6 class="mb-3 fw-semibold">Attached Files</h6>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Caption</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($course->attachments as $attachment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $attachment->caption }}</td>
                                <td>
                                    <a href="#"
                                       class="btn btn-sm btn-danger"
                                       onclick="event.preventDefault(); document.getElementById('delete-attachment-form-{{ $attachment->id }}').submit();">
                                       <i class="ri-delete-bin-5-line"></i> Delete
                                    </a>
                                    <form id="delete-attachment-form-{{ $attachment->id }}"
                                          action="{{ route('/admin/courses/attachments/delete/', $attachment->id) }}"
                                          method="POST"
                                          style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .justified-text {
        text-align: justify;
        line-height: 1.5;
    }
</style>
