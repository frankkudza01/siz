
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-heading text-center mb-5">
                    <h2>Upcoming Events in Surveying and Surveying Technologies</h2>
                    <p class="lead">Explore our upcoming events and stay updated with the latest in surveying innovations.</p>
                    <hr class="divider">
                </div>
            </div>
        </div>
        <div class="row">
            @include('client.events.filterSection')
            <div class="col-lg-8 col-md-8 order-0 order-sm-0 order-md-1 order-lg-1 mb-4 mb-md-0 mb-lg-0">
                <div class="row">
                    @foreach($events as $event)
                    <div class="col-12 col-md-6 col-lg-6 mb-4 mb-md-4 mb-lg-0 mb-4">
                        <div class="card bg-white border-variant-soft shadow-soft">
                            <div class="blog-img position-relative">
                                <img src="{{ asset('storage/' . $event->theme) }}" class="card-img-top rounded-top" alt="{{ $event->title }}" style="height: 250px;">
                                <a href="#" class="position-absolute category-text small badge badge-secondary">{{ $event->category }}</a>
                            </div>
                            <div class="card-body">
                                <div class="media d-flex align-items-center justify-content-between">
                                    <div class="post-group">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Hosted by Admin">
                                            <img class="avatar avatar-xs mr-2 img-fluid rounded-circle border border-variant-primary p-1" src="https://via.placeholder.com/50x50.png?text=Admin" alt="Admin">
                                            <span class="small">Admin</span>
                                        </a>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="small"><span class="far fa-calendar-alt mr-2"></span>{{ \Carbon\Carbon::parse($event->end_date)->format('d F Y') }}</span>
                                        <span class="small ml-2"><span class="far fa-clock mr-2"></span>{{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }}</span>
                                    </div>
                                </div>
                                <h3 class="h5 card-title mt-3"><a href="#">{{ $event->title }}</a></h3>
                                <p class="card-text">{!! \Illuminate\Support\Str::limit($event->description, 300) !!}</p>
                                <div class="mt-3">
                                    <a href="#" class="btn btn-primary btn-sm book-seat" data-toggle="modal" data-target="#bookModal">Book a Seat</a>
                                    <a href="#" class="btn btn-outline-primary btn-sm ml-2 attend-online" data-toggle="modal" data-target="#attendModal">Attend Online</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Book a Seat Modal -->
    <div class="modal fade" id="bookModal" tabindex="-1" aria-labelledby="bookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookModalLabel">Book a Seat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="bookForm">
                        <!-- Form fields for booking -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Attend Online Modal -->
    <div class="modal fade" id="attendModal" tabindex="-1" aria-labelledby="attendModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="attendModalLabel">Attend Online</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="attendForm">
                        <!-- Form fields for attending online -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('.book-seat').on('click', function () {
            $('#bookModal').modal('show');
        });

        $('.attend-online').on('click', function () {
            $('#attendModal').modal('show');
        });
    });
</script>
