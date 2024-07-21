<div class="col-lg-4 col-md-4 order-1 order-sm-1 order-md-0 order-lg-0">
    <div class="sidebar-left pr-4">
        <!-- Search widget-->
        <aside class="widget widget-search">
            <form>
                <input class="form-control" type="search" placeholder="Search Event Topics">
                <button class="search-button" type="submit"><span class="ti-search"></span></button>
            </form>
        </aside>

        <!-- Categories widget-->
        <aside class="widget widget-categories">
            <div class="widget-title">
                <h6>Event Categories</h6>
            </div>
            <ul class="list-unstyled">
                <li><a href="#">Workshops <span class="float-right">{{ $eventCounts['Workshops'] ?? 0 }}</span></a></li>
                <li><a href="#">Conferences <span class="float-right">{{ $eventCounts['Conferences'] ?? 0 }}</span></a></li>
                <li><a href="#">Webinars <span class="float-right">{{ $eventCounts['Webinars'] ?? 0 }}</span></a></li>
                <li><a href="#">Training Sessions <span class="float-right">{{ $eventCounts['Training Sessions'] ?? 0 }}</span></a></li>
                <li><a href="#">Networking Events <span class="float-right">{{ $eventCounts['Networking Events'] ?? 0 }}</span></a></li>
            </ul>
        </aside>

        <!-- Subscribe widget-->
        <aside class="widget widget-newsletter">
            <div class="widget-title">
                <h6>Event Updates</h6>
            </div>
            <p>Enter your email address below to subscribe to our event updates and newsletters.</p>
            <form action="#" method="post" class="d-none d-md-block d-lg-block">
                <input type="email" class="form-control input" id="email-footer" name="email" placeholder="info@yourdomain.com">
                <button type="submit" class="btn btn-secondary btn-block mt-3">Subscribe</button>
            </form>
        </aside>

        <!-- Tags widget-->
        <aside class="widget widget-tag-cloud">
            <div class="widget-title">
                <h6>Event Tags</h6>
            </div>
            <div class="tag-cloud">
                <a href="#">surveying</a><a href="#">GIS</a><a href="#">remote sensing</a>
                <a href="#">geospatial</a><a href="#">workshop</a><a href="#">conference</a>
                <a href="#">webinar</a><a href="#">training</a><a href="#">networking</a>
            </div>
        </aside>
    </div>
</div>
