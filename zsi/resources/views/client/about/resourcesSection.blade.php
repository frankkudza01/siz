<div class="row align-items-center justify-content-between">
    <div class="col-lg-5">
       <div class="hero-content-left" style="margin-left: 3%; ">
          <h1 class="display-2">Explore Our Surveying Resources</h1>
          <p class="lead">Discover and download our collection of resources to enhance your surveying knowledge and skills.</p>
       </div>
    </div>
    <div class="col-lg-7">
       <div class="card bg-soft-alt shadow-lg rounded p-5">
          <div class="card-body">
             <div class="table-responsive">
                <table class="table table-bordered">
                   <thead>
                      <tr>
                         <th>Resource</th>
                         <th>Type</th>
                         <th>Action</th>
                      </tr>
                   </thead>
                   <tbody>
                       @foreach($resources as $resource)
                      <tr>
                         <td>{{ $resource->title }}</td>
                         <td>{{ strtoupper(pathinfo($resource->file, PATHINFO_EXTENSION)) }}</td>
                         <td>
                            <a href="{{ asset('storage/' . $resource->file) }}" class="btn btn-primary btn-sm">Download</a>
                            <a href="{{ asset('storage/' . $resource->file) }}" class="btn btn-outline-primary btn-sm ml-2">View</a>
                         </td>
                      </tr>
                       @endforeach
                   </tbody>
                </table>
             </div>
             <div class="mt-4">
                <p class="text-center text-muted mb-0">Can't find what you're looking for? <a href="#">Contact us</a> for more information.</p>
             </div>
          </div>
       </div>
    </div>
</div>
