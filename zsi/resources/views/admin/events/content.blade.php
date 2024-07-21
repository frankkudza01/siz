<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <hr>
            <!-- Add Event Button -->
            <div class="row mb-3">
                <div class="col-lg-12 d-flex justify-content-end">
                    <a href="#addEventModal" class="btn btn-success" data-bs-toggle="modal">Add Event</a>
                    @include('admin.events.modals.create')
                </div>
            </div>
            <hr>
            @foreach($events as $event)
            <div class="modal fade" id="confirmDeleteModal{{ $event->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $event->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel{{ $event->id }}">Confirm Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this event?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form action="{{ route('/admin/events/delete/', $event->id) }}" method="POST" style="display: inline;">
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
                            <label for="title" class="form-label">Title</label>
                            <input type="text" id="title" class="form-control" placeholder="Enter title" />
                        </div>
                        <!-- Category Filter -->
                        <div class="form-group me-3">
                            <label for="category" class="form-label">Category</label>
                            <select id="category" class="form-select">
                                <option value="">Select Category</option>
                                <option value="free">Free</option>
                                <option value="paid">Paid</option>
                            </select>
                        </div>
                        <!-- Filter Button -->
                        <div class="form-group align-self-end">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end filter row -->
            <hr>
            <div class="row">
                @foreach ($events as $event)
                    <div class="col-lg-6 col-md-6">
                        <div class="card">

                            <div class="card-body">
                                <ul class="list-inline fs-14 text-muted">
                                    <li class="list-inline-item">
                                        <i class="ri-calendar-line align-bottom me-1"></i> {{ $event->start_date }}
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="ri-map-pin-line align-bottom me-1"></i> {{ $event->type === 'physical' ? $event->venue : 'Virtual Event' }}
                                    </li>
                                </ul>
                                <a href="javascript:void(0);">
                                    <h5>{{ $event->title }}</h5>
                                </a>
                                <p class="text-muted fs-14">{!! Str::limit($event->description, 100) !!}</p>
                                <hr>
                                <div>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#detailsModal" data-event="{{ $event }}"><i class="ri-eye-line align-bottom ms-1"></i> View</a>
                                    @include('admin.events.modals.details', ['event' => $event])
                                    <a href="javascript:void(0);" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#updateEventModal{{ $event->id }}"><i class="ri-ball-pen-fill align-bottom ms-1"></i> Update</a>
                                    @include('admin.events.modals.update')
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $event->id }}">
                                        <i class="ri-delete-bin-5-fill align-bottom ms-1"></i>Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- end container -->
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
    const detailsModal = document.getElementById('detailsModal');

    detailsModal.addEventListener('show.bs.modal', (event) => {
        const button = event.relatedTarget;
        const eventData = button.getAttribute('data-event');
        const eventObj = JSON.parse(eventData);

        document.getElementById('eventTheme').src = eventObj.theme ? `/storage/${eventObj.theme}` : '/admin/assets/images/small/default-event.jpg';
        document.getElementById('eventDate').textContent = new Date(eventObj.start_date).toLocaleDateString();
        document.getElementById('eventCategory').textContent = eventObj.category.charAt(0).toUpperCase() + eventObj.category.slice(1);
        document.getElementById('eventCategory').classList.add(eventObj.category === 'free' ? 'bg-success' : 'bg-danger');
        document.getElementById('eventVenue').textContent = eventObj.type === 'physical' ? eventObj.venue : 'Virtual Event';
        document.getElementById('eventType').textContent = eventObj.type.charAt(0).toUpperCase() + eventObj.type.slice(1);
        document.getElementById('eventDescription').textContent = eventObj.description;

        if (eventObj.type === 'virtual') {
            document.getElementById('meetingLinkRow').style.display = '';
            document.getElementById('eventMeetingLink').textContent = eventObj.virtual_link;
            document.getElementById('meetingIdRow').style.display = '';
            document.getElementById('eventMeetingId').textContent = eventObj.meeting_id;
            document.getElementById('passcodeRow').style.display = '';
            document.getElementById('eventPasscode').textContent = eventObj.passcode;
        } else {
            document.getElementById('meetingLinkRow').style.display = 'none';
            document.getElementById('meetingIdRow').style.display = 'none';
            document.getElementById('passcodeRow').style.display = 'none';
        }

    });
});

</script>
