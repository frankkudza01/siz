<!-- Details Modal for Members -->
<div class="modal fade" id="memberDetailsModal{{ $member->id }}" tabindex="-1" aria-labelledby="detailsModalLabel{{ $member->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModalLabel{{ $member->id }}">Member Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="">
                    <div class="text-center">
                        <!-- Member Image (if available) -->
                        <img src="{{ $member->profile ? asset('storage/' . $member->profile) : asset('admin/assets/images/small/img-9.jpg') }}" alt="Profile Image" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                    </div>
                </div>
                <div class="pt-3 border-top border-top-dashed mt-4">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-medium">Registration Date</td>
                                <td>{{ $member->registration_date }}</td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Status</td>
                                <td><span class="badge {{ $member->status == 'Active' ? 'bg-success' : 'bg-warning' }} fs-12">{{ $member->status }}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <h6 class="mb-3 fw-semibold">Bio</h6>
                    <p class="justified-text">{!! $member->bio !!}</p>
                </div>


            </div>
        </div>
    </div>
</div>
