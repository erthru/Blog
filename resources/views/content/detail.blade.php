@extends("content.app")
@section("title", "Content title")
@section("content")
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title content-detail-title">Post Title</h3>

                <div class="content-detail-subtitle">
                    <i class="fas fa-grip-lines text-danger fa-sm"></i>
                    <i class="fas fa-grip-lines text-danger fa-sm"></i>
                    <i class="fas fa-grip-lines text-danger fa-sm mr-2"></i>
                    <strong>WRITER NAME &#9679; 12 JAN 19</strong>
                    <i class="fas fa-grip-lines text-danger fa-sm ml-2"></i>
                    <i class="fas fa-grip-lines text-danger fa-sm"></i>
                    <i class="fas fa-grip-lines text-danger fa-sm"></i>
                </div>
            </div>

            <img src="https://rinjanitheme.themesawesome.com/wp-content/uploads/sites/3/2015/10/welcome.jpg" class="card-img-top mt-3"/>

            <div class="card-body">
                <div class="content-entry">
                    <p>Lorem ipsum dolor sit amet,  adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo, eu volutpat enim diam eget metus. Maecenas ornare tortor. Donec sed tellus eget sapien fringilla nonummy. Mauris a ante. Suspendisse quam sem, consequat at, commodo vitae, feugiat in, nunc. Morbi imperdiet augue quis tellus.</p>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                </div>

                <div class="content-tags">
                    <a href="/">travel</a>
                    <a href="/">life</a>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-9">
                        <i class="fas fa-grip-lines text-danger fa-lg pb-1"></i>
                        <span class="content-author-name">WRITER NAME</span>
                        <br />
                        <p class="content-author-desc">Lorem ipsum dolor sit amet,  adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="content-author-avatar">
                            <img src="https://rinjanitheme.themesawesome.com/wp-content/uploads/sites/3/2014/01/73effd5db7d50bf5b2f22b9355011cc0.png" class="rounded-circle" width="90px" height="90px"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <i class="fas fa-grip-lines text-danger fa-lg pb-1"></i>
                <span class="content-related-title">RELATED CONTENT</span>

                <div class="content-related-list">
                    <div class="row">
                        <div class="col-12 col-md-4 pb-3">
                            <img src="https://rinjanitheme.themesawesome.com/wp-content/uploads/sites/3/2014/01/38H.jpg" width="100%" height="300px" />
                            <h5 class="mt-2">Post Title</h5>
                        </div>

                        <div class="col-12 col-md-4 pb-3">
                            <img src="https://rinjanitheme.themesawesome.com/wp-content/uploads/sites/3/2014/01/38H.jpg" width="100%" height="300px" />
                            <h5 class="mt-2">Post Title</h5>
                        </div>

                        <div class="col-12 col-md-4 pb-3">
                            <img src="https://rinjanitheme.themesawesome.com/wp-content/uploads/sites/3/2014/01/38H.jpg" width="100%" height="300px" />
                            <h5 class="mt-2">Post Title</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection