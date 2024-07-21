<!-- Event Details Modal -->
<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModalLabel">Event Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <img id="eventTheme" src="" alt="" class="img-fluid rounded" />
                    </div>
                </div>
                <div class="pt-3 border-top border-top-dashed mt-4">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-medium">Event Date</td>
                                <td id="eventDate"></td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Category</td>
                                <td><span id="eventCategory" class="badge fs-12"></span></td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Status</td>
                                <td><span class="badge bg-warning fs-12">Active</span></td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Venue</td>
                                <td id="eventVenue"></td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Type</td>
                                <td id="eventType"></td>
                            </tr>
                            <!-- For virtual events -->
                            <tr id="meetingLinkRow" style="display: none;">
                                <td class="fw-medium">Meeting Link</td>
                                <td id="eventMeetingLink"></td>
                            </tr>
                            <tr id="meetingIdRow" style="display: none;">
                                <td class="fw-medium">Meeting ID</td>
                                <td id="eventMeetingId"></td>
                            </tr>
                            <tr id="passcodeRow" style="display: none;">
                                <td class="fw-medium">Passcode</td>
                                <td id="eventPasscode"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div>
                    <h6 class="mb-3 fw-semibold">Description</h6>
                    <hr>
                    <p class="justified-text">{!! $event->description !!}</p>
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
