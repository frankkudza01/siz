<section class="section section-lg bg-soft">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-heading text-center mb-5">
                    <h2>Latest in Surveying and Surveying Technologies</h2>
                    <p class="lead">Explore our latest insights and updates in the field of surveying and surveying technologies.</p>
                    <hr class="divider">
                </div>
            </div>
        </div>
        @php
            use Illuminate\Support\Str;
        @endphp
        <div class="row">
            @foreach($articles as $article)
            <div class="col-12 col-md-12 col-lg-4 mb-4 mb-md-4 mb-lg-0 mb-4">
                <div class="card bg-white border-variant-soft shadow-soft">
                    <div class="blog-img position-relative">
                        <img src="{{ asset('storage/' . $article->theme) }}" class="card-img-top rounded-top" style="height: 300px;" alt="{{ $article->title }}">
                        <a href="#" class="position-absolute category-text small badge badge-secondary">{{ $article->category }}</a>
                    </div>
                    <div class="card-body">
                        <div class="media d-flex align-items-center justify-content-between">
                            <div class="post-group">
                                <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ $article->author }}">
                                    <img class="avatar avatar-xs mr-2 img-fluid rounded-circle border border-variant-primary p-1" src="https://via.placeholder.com/50x50.png" alt=""> <span class="small">Media</span>
                                </a>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="small"><span class="far fa-calendar-alt mr-2"></span>{{ $article->created_at->format('d M Y') }}</span>
                            </div>
                        </div>
                        <h3 class="h5 card-title mt-3"><a href="#">{{ $article->title }}</a></h3>
                        <p class="card-text">{!! Str::limit($article->description, 200) !!}</p>
                        <a href="#" class="link-with-icon text-default font-small font-weight-bold" target="_blank">Read more <span><i class="fas fa-angle-right"></i></span></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
