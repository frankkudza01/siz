<div class="col-lg-4 col-md-4 order-1 order-sm-1 order-md-0 order-lg-0">
    <div class="sidebar-left pr-4">

        <!-- Search widget-->
        <aside class="widget widget-search">
            <form>
                <input class="form-control" type="search" placeholder="Search Courses">
                <button class="search-button" type="submit"><span class="ti-search"></span></button>
            </form>
        </aside>

        <!-- Categories widget-->
        <aside class="widget widget-categories">
            <div class="widget-title">
                <h6>Course Categories</h6>
            </div>
            <ul class="list-unstyled">
                <li><a href="#">Geospatial Analysis <span class="float-right">{{ $courseCounts['Geospatial Analysis'] ?? 0 }}</span></a></li>
                <li><a href="#">Hydrographic Surveying <span class="float-right">{{ $courseCounts['Hydrographic Surveying'] ?? 0 }}</span></a></li>
                <li><a href="#">GIS and Remote Sensing <span class="float-right">{{ $courseCounts['Remote Sensing Insights'] ?? 0 }}</span></a></li>
                <li><a href="#">Cartography <span class="float-right">{{ $courseCounts['Cartography'] ?? 0 }}</span></a></li>
                <li><a href="#">Land Surveying <span class="float-right">{{ $courseCounts['Land Surveying'] ?? 0 }}</span></a></li>
            </ul>
        </aside>

        <!-- Subscribe widget-->
        <aside class="widget widget-newsletter">
            <div class="widget-title">
                <h6>Course Updates</h6>
            </div>
            <p>Enter your email address below to subscribe to our course updates and newsletters.</p>
            <form action="#" method="post" class="d-none d-md-block d-lg-block">
                <input type="email" class="form-control input" id="email-footer" name="email" placeholder="info@yourdomain.com">
                <button type="submit" class="btn btn-secondary btn-block mt-3">Subscribe</button>
            </form>
        </aside>

        <!-- Tags widget-->
        <aside class="widget widget-tag-cloud">
            <div class="widget-title">
                <h6>Course Tags</h6>
            </div>
            <div class="tag-cloud">
                <a href="#">surveying</a><a href="#">GIS</a><a href="#">remote sensing</a>
                <a href="#">geospatial</a><a href="#">hydrography</a><a href="#">cartography</a>
                <a href="#">training</a><a href="#">land surveying</a><a href="#">workshop</a>
            </div>
        </aside>
    </div>
</div>
