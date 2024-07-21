<!-- Update Member Modal -->
<div class="modal fade" id="updateMemberModal{{ $member->id }}" tabindex="-1" aria-labelledby="updateMemberModalLabel{{ $member->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateMemberModalLabel{{ $member->id }}">Update Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('/admin/members/update/', $member->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label class="form-label" for="member-name-input{{ $member->id }}">Name</label>
                        <input type="text" class="form-control" id="member-name-input{{ $member->id }}" name="name" value="{{ $member->name }}" placeholder="Enter member's name">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="member-surname-input{{ $member->id }}">Surname</label>
                        <input type="text" class="form-control" id="member-surname-input{{ $member->id }}" name="surname" value="{{ $member->surname }}" placeholder="Enter member's surname">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="member-location-input{{ $member->id }}">Location</label>
                        <input type="text" class="form-control" id="member-location-input{{ $member->id }}" name="location" value="{{ $member->location }}" placeholder="Enter member's location">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="member-contact-input{{ $member->id }}">Contact</label>
                        <input type="text" class="form-control" id="member-contact-input{{ $member->id }}" name="contact" value="{{ $member->contact }}" placeholder="(+263)">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="member-email-input{{ $member->id }}">Email Address</label>
                        <input type="email" class="form-control" id="member-email-input{{ $member->id }}" name="email" value="{{ $member->email }}" placeholder="info@siz.co.zw">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="member-registration-date-input{{ $member->id }}">Registration Date</label>
                        <input type="date" class="form-control" id="member-registration-date-input{{ $member->id }}" name="registration_date" value="{{ $member->registration_date }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="member-status-input{{ $member->id }}">Status</label>
                        <select class="form-select" id="member-status-input{{ $member->id }}" name="status">
                            <option value="active" {{ $member->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $member->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="article-theme-input-{{ $member->id }}">Profile</label>
                        <input type="file" class="form-control" id="article-theme-input-{{ $member->id }}" name="profile" placeholder="Upload article theme" onchange="previewTheme({{ $member->id }})">
                        <img id="theme-preview-{{ $member->id }}" src="{{ $member->profile ? asset('storage/' . $member->profile) : '#' }}" alt="Theme Preview" class="img-fluid mt-3" style="display: {{ $member->profile ? 'block' : 'none' }};">
                    </div>

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

</script>
