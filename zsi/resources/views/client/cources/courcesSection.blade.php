<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-heading text-center mb-5">
                    <h2>Upcoming Courses at Survey Institute of Zimbabwe</h2>
                    <p class="lead">Stay ahead with our comprehensive courses designed to enhance your skills in surveying and geospatial technologies.</p>
                    <hr class="divider">
                </div>
            </div>
        </div>
        <div class="row">
            @include('client.cources.filterSection')
            <div class="col-lg-8 col-md-8 order-0 order-sm-0 order-md-1 order-lg-1 mb-4 mb-md-0 mb-lg-0">
                <div class="row">
                    @foreach($courses as $course)
                    <div class="col-12 col-md-6 col-lg-6 mb-4 mb-md-4 mb-lg-0 mb-4">
                        <div class="card bg-white border-variant-soft shadow-soft">
                            <div class="card-body">
                                <div class="media d-flex align-items-center justify-content-between">
                                    <div class="post-group">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Hosted by Admin">
                                            <img class="avatar avatar-xs mr-2 img-fluid rounded-circle border border-variant-primary p-1" src="https://via.placeholder.com/50x50.png?text=Admin" alt="Admin">
                                            <span class="small">Admin</span>
                                        </a>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="small"><span class="far fa-tasks-alt mr-2"></span> {{ $course->sector }}</span>
                                    </div>
                                </div>
                                <h3 class="h5 card-title mt-3"><a href="#">{{ $course->title }}</a></h3>
                                {!! \Illuminate\Support\Str::limit($course->description, 300) !!}
                                <ul class="list-unstyled text-muted">
                                    <li><span class="far fa-folder-open mr-2"></span>Category: {{ $course->category }}</li>
                                    <hr>
                                    <li><span class="far fa-file-alt mr-2"></span>Lessons: {{ $course->lessons_count }}</li>
                                    <hr>

                                </ul>
                                <div class="mt-3">
                                    <a href="#" class="btn btn-primary btn-sm enroll-now" data-toggle="modal" data-target="#enrollModal">Enroll Now</a>
                                    <a href="#" class="btn btn-outline-primary btn-sm ml-2 more-info" data-toggle="modal" data-target="#infoModal">More Info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Enroll Now Modal -->
    <div class="modal fade" id="enrollModal" tabindex="-1" aria-labelledby="enrollModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="enrollModalLabel">Enroll Now</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="enrollForm">
                        <div class="form-group">
                            <label for="enrollName">Name</label>
                            <input type="text" class="form-control" id="enrollName" required>
                        </div>
                        <div class="form-group">
                            <label for="enrollEmail">Email</label>
                            <input type="email" class="form-control" id="enrollEmail" required>
                        </div>
                        <div class="form-group">
                            <label for="enrollDiscipline">Discipline</label>
                            <input type="text" class="form-control" id="enrollDiscipline" required>
                        </div>
                        <div class="form-group">
                            <label for="enrollPhone">Phone Number</label>
                            <input type="tel" class="form-control" id="enrollPhone" required>
                        </div>
                        <div class="form-group">
                            <label for="enrollLocation">Location</label>
                            <input type="text" class="form-control" id="enrollLocation" required>
                        </div>
                        <div class="form-group">
                            <label for="enrollProvince">Province</label>
                            <select class="form-control" id="enrollProvince" required>
                                <option value="" disabled selected>Select your province</option>
                                <option value="Bulawayo">Bulawayo</option>
                                <option value="Harare">Harare</option>
                                <option value="Manicaland">Manicaland</option>
                                <option value="Mashonaland Central">Mashonaland Central</option>
                                <option value="Mashonaland East">Mashonaland East</option>
                                <option value="Mashonaland West">Mashonaland West</option>
                                <option value="Masvingo">Masvingo</option>
                                <option value="Matabeleland North">Matabeleland North</option>
                                <option value="Matabeleland South">Matabeleland South</option>
                                <option value="Midlands">Midlands</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- More Info Modal -->
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalLabel">More Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>For more information about the courses, please contact us at <a href="mailto:info@surveyinstitute.com">info@surveyinstitute.com</a> or call us at +263 4 123 456.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Include Bootstrap JS (Make sure this is in your layout file) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('.enroll-now').on('click', function () {
            $('#enrollModal').modal('show');
        });

        $('.more-info').on('click', function () {
            $('#infoModal').modal('show');
        });

        // Optionally, handle form submissions here or let backend handle them
    });
</script>
