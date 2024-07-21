<!-- Add Member Modal -->
<div class="modal fade" id="addMemberModal" tabindex="-1" aria-labelledby="addMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMemberModalLabel">Add New Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('/admin/members/store/') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="member-name-input">Name</label>
                        <input type="text" class="form-control" id="member-name-input" name="name" placeholder="Enter member's name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="member-surname-input">Surname</label>
                        <input type="text" class="form-control" id="member-surname-input" name="surname" placeholder="Enter member's surname" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="member-location-input">Location</label>
                        <input type="text" class="form-control" id="member-location-input" name="location" placeholder="Enter member's location" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="member-contact-input">Contact</label>
                        <input type="text" class="form-control" id="member-contact-input" name="contact" placeholder="(+263)" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="member-email-input">Email Address</label>
                        <input type="email" class="form-control" id="member-email-input" name="email" placeholder="info@siz.co.zw" required>
                    </div>
                    <div class="mb-3" id="profile-section">
                        <label class="form-label" for="member-profile-input">Profile</label>
                        <input type="file" class="form-control" id="member-profile-input" name="profile" onchange="previewFile()">
                        <div id="file-preview-container" style="display: none;">
                            <hr>
                            <h6>File Preview:</h6>
                            <embed id="file-preview" type="application/pdf" width="100%" height="600px">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="member-registration-date-input">Registration Date</label>
                        <input type="date" class="form-control" id="member-registration-date-input" name="registration_date" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="member-type-input">Membership Type</label>
                        <select class="form-select" id="member-type-input" name="membership_type" required>
                            <option value="Principal">Principal</option>
                            <option value="Normal">Normal</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="member-status-input">Status</label>
                        <select class="form-select" id="member-status-input" name="status" required>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="member-bio-input">Bio</label>
                        <textarea class="form-control ckeditor-classic" id="member-bio-input" name="bio" rows="5" placeholder="Enter member's bio"></textarea>
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
    function previewFile() {
        const file = document.getElementById('member-profile-input').files[0];
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
