<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-heading text-center mb-5">
                    <h2>Latest Articles on Surveying, GIS, and Engineering</h2>
                    <p class="lead">Explore our latest articles and stay updated with advancements in surveying technologies.</p>
                    <hr class="divider">
                </div>
            </div>
        </div>
        <div class="row">
            @include('client.articles.filterSection')
            <div class="col-lg-8 col-md-8 order-0 order-sm-0 order-md-1 order-lg-1 mb-4 mb-md-0 mb-lg-0">
                <div class="row">
                    @foreach($articles as $article)
                    <div class="col-12 mb-4">
                        <div class="card bg-white border-variant-soft shadow-soft">
                            <div class="blog-img position-relative">
                                <img src="{{ asset('storage/' . $article->theme) }}" class="card-img-top rounded-top" alt="Article Image">
                                <a href="#" class="position-absolute category-text small badge badge-secondary">{{ $article->category }}</a>
                            </div>
                            <div class="card-body">
                                <div class="media d-flex align-items-center justify-content-between">
                                    <div class="post-group">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Written by Admin">
                                            <img class="avatar avatar-xs mr-2 img-fluid rounded-circle border border-variant-primary p-1" src="https://via.placeholder.com/50x50.png?text=Admin" alt="Admin"> <span class="small">Admin</span>
                                        </a>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="small"><span class="far fa-calendar-alt mr-2"></span>{{ $article->created_at->format('F d, Y') }}</span>
                                    </div>
                                </div>
                                <h3 class="h5 card-title mt-3"><a href="#">{{ $article->title }}</a></h3>
                                <p class="card-text">{!! $article->description !!}</p>
                                <div class="mt-3">
                                    <a href="#" class="btn btn-primary btn-sm">Read Article</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
