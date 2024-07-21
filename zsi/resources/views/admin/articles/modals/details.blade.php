<div class="modal fade" id="detailsModal{{ $article->id }}" tabindex="-1" aria-labelledby="addArticleModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addArticleModalLabel">{{ $article->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('storage/' . $article->theme) }}" alt="" class="img-fluid rounded" />
                    </div>
                </div>
                <div class="pt-3 border-top border-top-dashed mt-4">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-medium">Create Date</td>
                                <td>{{ $article->created_at->format('d M, Y') }}</td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Category</td>
                                <td><span class="badge bg-danger fs-12">{{ $article->category }}</span></td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Status</td>
                                <td><span class="badge bg-warning fs-12">{{ $article->status }}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div>
                    <h6 class="mb-3 fw-semibold">Description</h6>
                    <hr>
                    <p class="justified-text">
                        {!! $article->description !!}
                    </p>
                    <hr>
                    <ul class="ps-4 vstack gap-2">
                        @foreach($article->tags as $tag)
                        <li>{{ $tag->title }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
    .justified-text {
        text-align: justify;
        line-height: 1.5;
    }
</style>
