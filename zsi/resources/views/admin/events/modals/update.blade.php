<!-- Update Event Modal -->
<div class="modal fade" id="updateEventModal{{ $event->id }}" tabindex="-1" aria-labelledby="updateEventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateEventModalLabel">Update Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr>
            <div class="modal-body">
                <form method="POST" action="{{ route('/admin/events/update/', $event->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label class="form-label" for="update-event-title-input">Event Title</label>
                        <input type="text" class="form-control" id="update-event-title-input" name="title" value="{{ $event->title }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="update-event-start-date-input">Event Start Date</label>
                        <input type="date" class="form-control" id="update-event-start-date-input" name="start_date" value="{{ $event->start_date }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="update-event-end-date-input">Event End Date</label>
                        <input type="date" class="form-control" id="update-event-end-date-input" name="end_date" value="{{ $event->end_date }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="update-event-start-time-input">Event Start Time</label>
                        <input type="time" class="form-control" id="update-event-start-time-input" name="start_time" value="{{ $event->start_time }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="update-event-type-input">Event Type</label>
                        <select class="form-select" id="update-event-type-input" name="type">
                            <option value="physical" {{ $event->type == 'physical' ? 'selected' : '' }}>Physical</option>
                            <option value="virtual" {{ $event->type == 'virtual' ? 'selected' : '' }}>Virtual</option>
                        </select>
                    </div>

                    <div class="mb-3" id="update-event-venue-section" style="{{ $event->type == 'virtual' ? 'display: none;' : '' }}">
                        <label class="form-label" for="update-event-venue-input">Event Venue</label>
                        <input type="text" class="form-control" id="update-event-venue-input" name="venue" value="{{ $event->venue }}">
                    </div>

                    <div class="mb-3" id="update-event-virtual-details" style="{{ $event->type == 'physical' ? 'display: none;' : '' }}">
                        <div class="mb-3">
                            <label class="form-label" for="update-event-link-input">Event Link</label>
                            <input type="url" class="form-control" id="update-event-link-input" name="virtual_link" value="{{ $event->virtual_link }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="update-event-meeting-id-input">Meeting ID</label>
                            <input type="text" class="form-control" id="update-event-meeting-id-input" name="meeting_id" value="{{ $event->meeting_id }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="update-event-passcode-input">Passcode</label>
                            <input type="text" class="form-control" id="update-event-passcode-input" name="passcode" value="{{ $event->passcode }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="update-event-category-input">Category</label>
                        <select class="form-select" id="update-event-category-input" name="category">
                            <option value="free" {{ $event->category == 'free' ? 'selected' : '' }}>Free</option>
                            <option value="paid" {{ $event->category == 'paid' ? 'selected' : '' }}>Paid</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="article-theme-input-{{ $event->id }}">Article Theme</label>
                        <input type="file" class="form-control" id="article-theme-input-{{ $event->id }}" name="theme" placeholder="Upload article theme" onchange="previewTheme({{ $event->id }})">
                        <img id="theme-preview-{{ $event->id }}" src="{{ $event->theme ? asset('storage/' . $event->theme) : '#' }}" alt="Theme Preview" class="img-fluid mt-3" style="display: {{ $event->theme ? 'block' : 'none' }};">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="update-event-description-input-{{ $event->id }}">Description</label>
                        <textarea id="update-event-description-input-{{ $event->id }}" class="form-control ckeditor-classics" name="description" rows="5">{!! $event->description !!}</textarea>
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
    function previewTheme(eventId) {
        const fileInput = document.getElementById('article-theme-input-' + eventId);
        const preview = document.getElementById('theme-preview-' + eventId);

        const file = fileInput.files[0];
        const reader = new FileReader();
        reader.onloadend = function () {
            preview.src = reader.result;
            preview.style.display = 'block';
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }

    document.addEventListener('DOMContentLoaded', (event) => {
        document.querySelectorAll('.ckeditor-classics').forEach((textarea) => {
            ClassicEditor.create(textarea).then(editor => {
                editor.ui.view.editable.element.style.height = '200px';
            }).catch(error => {
                console.error(error);
            });
        });
    });
</script>
