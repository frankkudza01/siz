<div class="col-lg-4 col-md-4 order-1 order-sm-1 order-md-0 order-lg-0">
    <div class="sidebar-left pr-4">

        <!-- Search widget -->
        <aside class="widget widget-search">
            <form>
                <input class="form-control" type="search" placeholder="Search Articles">
                <button class="search-button" type="submit"><span class="ti-search"></span></button>
            </form>
        </aside>

        <!-- Categories widget -->
        <aside class="widget widget-categories">
            <div class="widget-title">
                <h6>Article Categories</h6>
            </div>
            <ul class="list-unstyled">
                @foreach($categories as $category => $count)
                <li><a href="#">{{ $category }} <span class="float-right">{{ $count }}</span></a></li>
                @endforeach
            </ul>
        </aside>

        <!-- Subscribe widget -->
        <aside class="widget widget-newsletter">
            <div class="widget-title">
                <h6>Newsletter</h6>
            </div>
            <p>Stay updated with our latest articles and research.</p>
            <form action="#" method="post" class="d-none d-md-block d-lg-block">
                <input type="email" class="form-control input" id="email-footer" name="email" placeholder="info@yourdomain.com">
                <button type="submit" class="btn btn-secondary btn-block mt-3">Subscribe</button>
            </form>
        </aside>

        <!-- Tags widget -->
        <aside class="widget widget-tag-cloud">
            <div class="widget-title">
                <h6>Article Tags</h6>
            </div>
            <div class="tag-cloud">
                <a href="#">Surveying</a><a href="#">GIS</a><a href="#">Remote Sensing</a>
                <a href="#">Geospatial</a><a href="#">Technology</a><a href="#">Engineering</a>
                <a href="#">Workshop</a><a href="#">Conference</a><a href="#">Webinar</a>
            </div>
        </aside>
    </div>
</div>
