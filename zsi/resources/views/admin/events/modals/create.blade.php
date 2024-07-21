<!-- Add Event Modal -->
<div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEventModalLabel">Add New Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr>
            <div class="modal-body">
                <form id="add-resource-form" action="{{ route('/admin/events/store/') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="event-title-input">Event Title</label>
                        <input type="text" class="form-control" id="event-title-input" name="title" placeholder="Enter event title">
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="event-theme-checkbox">
                        <label class="form-check-label" for="event-theme-checkbox">Add Event Theme</label>
                    </div>


                    <div class="mb-3" id="event-theme-section" style="display: none;">
                        <label class="form-label" for="resource-file-input">Event Theme</label>
                        <input type="file" class="form-control" id="resource-file-input" name="theme" onchange="previewFile()">
                        <div id="file-preview-container" style="display: none;">
                            <hr>
                            <h6>File Preview:</h6>
                            <embed id="file-preview" type="application/pdf" width="100%" height="600px">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="event-title-input">Event Start Date</label>
                        <input type="date" class="form-control" id="event-title-input" name="start_date" placeholder="Enter event title">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="event-title-input">Event End Date</label>
                        <input type="date" class="form-control" id="event-title-input" name="end_date" placeholder="Enter event title">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="event-title-input">Event Start Time</label>
                        <input type="time" class="form-control" id="event-title-input" name="start_time" placeholder="Enter event title">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="event-type-input">Event Type</label>
                        <select class="form-select" id="event-type-input" name="type">
                            <option value="physical">Physical</option>
                            <option value="virtual">Virtual</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="event-type-input">Event Option</label>
                        <select class="form-select" id="event-type-input" name="event_type">
                            <option value="Workshops">Workshops</option>
                            <option value="Conferences">Conferences</option>
                            <option value="Webinars">Webinars</option>
                            <option value="Training Sessions">Training Sessions</option>
                            <option value="Networking Events">Networking Events</option>
                        </select>
                    </div>

                    <div class="mb-3" id="event-venue-section">
                        <label class="form-label" for="event-venue-input">Event Venue</label>
                        <input type="text" class="form-control" name="venue" id="event-venue-input" placeholder="Enter event venue">
                    </div>

                    <div class="mb-3" id="event-virtual-details" style="display: none;">
                        <div class="mb-3">
                            <label class="form-label" for="event-link-input">Event Link</label>
                            <input type="url" class="form-control" name="virtual_link" id="event-link-input" placeholder="Enter event link">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="event-meeting-id-input">Meeting ID</label>
                            <input type="text" class="form-control" name="meeting_id" id="event-meeting-id-input" placeholder="Enter meeting ID">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="event-passcode-input">Passcode</label>
                            <input type="text" class="form-control" name="passcode" id="event-passcode-input" placeholder="Enter passcode">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="event-category-input">Category</label>
                        <select class="form-select" id="event-category-input" name="category">
                            <option value="free">Free</option>
                            <option value="paid">Paid</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="event-description-input">Description</label>
                        <textarea class="form-control ckeditor-classic" id="event-description-input" name="description" rows="5" placeholder="Enter event description"></textarea>
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

<script>
    document.getElementById('event-theme-checkbox').addEventListener('change', function() {
        var themeSection = document.getElementById('event-theme-section');
        if (this.checked) {
            themeSection.style.display = 'block';
        } else {
            themeSection.style.display = 'none';
        }
    });

    document.getElementById('event-type-input').addEventListener('change', function() {
        var venueSection = document.getElementById('event-venue-section');
        var virtualDetails = document.getElementById('event-virtual-details');
        if (this.value === 'virtual') {
            venueSection.style.display = 'none';
            virtualDetails.style.display = 'block';
        } else {
            venueSection.style.display = 'block';
            virtualDetails.style.display = 'none';
        }
    });
</script>

<script>
    function previewFile() {
        const file = document.getElementById('resource-file-input').files[0];
        const previewContainer = document.getElementById('file-preview-container');
        const filePreview = document.getElementById('file-preview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                filePreview.src = e.target.result;
            }
            reader.readAsDataURL(file);
            previewContainer.style.display = 'block';
        } else {
            previewContainer.style.display = 'none';
        }
    }
</script>
