<!-- Resource Details Modal -->
<div class="modal fade" id="detailsModal{{ $content_resource->id }}" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModalLabel">Resource Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr>
            <div class="modal-body">

                <div class="pt-3 border-top border-top-dashed mt-4">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-medium">Create Date</td>
                                <td>{{ $content_resource->created_at->format('d M, Y') }}</td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Category</td>
                                <td><span class="badge bg-danger fs-12">{{ $content_resource->category }}</span></td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Status</td>
                                <td><span class="badge bg-warning fs-12">{{ $content_resource->status }}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div>
                    <h6 class="mb-3 fw-semibold">Description</h6>
                    <hr>
                    <p class="justified-text">
                        {!! $content_resource->description !!}
                    </p>
                    <hr>

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
