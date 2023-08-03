<div>
    <style>
        /* pagination formatage du bas de page pour les numero et le suivante et precedent */

        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block;
        }

        /* pour le boutons wishliste a coté de ajouter article */
        .wishlisted {
            /* background-color: #fff !important; */
            border: 1px solid transparent !important;

        }

        .wishlisted i {
            /* color: #fff !important; */
            color: #f15412 !important;
            border: 1px solid transparent !important;

        }

        .product-cart-wrap .product-action-1 button:after,
        .product-cart-wrap .product-action-1 a.action-btn:after {

            left: -32%;

        }
    </style>

    <main class="main">
        <section class="home-slider position-relative mb-30">
            <div class="home-slide-cover">
                <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                    @foreach ($slides as $slide)
                        <div class="single-hero-slider rectangle single-animation-wrap"
                            style="background-image: url({{ asset('assets/imgs/slider') }}/{{ $slide->image }})">
                            <div class="slider-content">
                                <h1 class="display-2 mb-40">
                                    {{ $slide->top_titre }}<br />
                                    {{-- {{ $slide->titre }} --}}
                                </h1>
                                <h2 class="mb-32">{{ $slide->titre }}</h2>
                                <h3 class="mb-20">{{ $slide->sous_titre }}</h3>
                                <p class="mb-65">{{ $slide->offre }}</p>

                                <a class="btn" href="/boutique"> Commander</a>

                            </div>
                        </div>
                    @endforeach


                </div>
                <div class="slider-arrow hero-slider-1-arrow"></div>
            </div>
        </section>
        <!--End hero-->
        <div class="container mb-30">
            <div class="row">
                <div class="col-lg-4-5">
                    <section class="product-tabs section-padding position-relative">
                        <div class="section-title style-2">
                            <h3>Produits populaires</h3>

                        </div>
                        <!--End nav-tabs-->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab-one" role="tabpanel"
                                aria-labelledby="tab-one">
                                @php
                                    $witems = Cart::instance('wishlist')
                                        ->content()
                                        ->pluck('id');
                                @endphp
                                <div class="row product-grid-4">
                                    @foreach ($fproducts as $fproduct)
                                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                            <div class="product-cart-wrap mb-30">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">

                                                        <a
                                                            href="{{ route('product.details', ['slug' => $fproduct->slug]) }}">
                                                            <img class="default-img"
                                                                src="{{ asset('assets/imgs/products') }}/{{ $fproduct->image }}"
                                                                alt="">
                                                            <img class="hover-img"
                                                                src="{{ asset('assets/imgs/products') }}/{{ $fproduct->images }}"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Add To Wishlist" class="action-btn"
                                                            href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn"
                                                            href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                        <a aria-label="Quick view" class="action-btn"
                                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                                class="fi-rs-eye"></i></a>
                                                    </div>
                                                    <div
                                                        class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">Populaire</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <div class="product-category">
                                                        <a
                                                            href="{{ route('product.category', ['slug' => $fproduct->category->slug]) }}">{{ $fproduct->category->name }}</a>
                                                    </div>
                                                    <h2><a
                                                            href="{{ route('product.details', ['slug' => $fproduct->slug]) }}">{{ substr($fproduct->name, 0, 29) }}...</a>
                                                    </h2>
                                                    <div class="product-rate-cover">
                                                        <div class="product-rate d-inline-block">
                                                            <div class="product-rating" style="width: 90%"></div>
                                                        </div>
                                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                                    </div>

                                                    <div class="product-card-bottom">
                                                        <div class="product-price">
                                                            @if ($fproduct->prix_promo == null)
                                                                <span>{{ $fproduct->prix_normale }}€</span>
                                                            @else
                                                                <span>{{ $fproduct->prix_promo }}€</span>
                                                                <span
                                                                    class="old-price">{{ $fproduct->prix_normale }}€</span>
                                                            @endif
                                                        </div>
                                                        <div class="product-action-1 show">
                                                            @if ($witems->contains($fproduct->id))
                                                                <a aria-label="Retirer de la liste des Favoris"
                                                                    class="action-btn hover-up wishlisted"
                                                                    href="#"
                                                                    wire:click.prevent="removeFromWishlist({{ $fproduct->id }})"><i
                                                                        class="fi-rs-heart"></i></a>
                                                            @else
                                                                <a aria-label="Ajouter la liste des Favoris"
                                                                    class="action-btn hover-up" href="w#"
                                                                    wire:click.prevent="addToWishlist({{ $fproduct->id }},'{{ $fproduct->name }}', {{ $fproduct->prix_normale }})"><i
                                                                        class="fi-rs-heart"></i></a>
                                                            @endif

                                                            @if ($fproduct->prix_promo == null)
                                                                <a aria-label="Ajouter au panier"
                                                                    class="action-btn hover-up" href="#"
                                                                    wire:click.prevent="store({{ $fproduct->id }},'{{ $fproduct->name }}',{{ $fproduct->prix_normale }})"><i
                                                                        class="fi-rs-shopping-bag-add"></i></a>
                                                            @else
                                                                <a aria-label="Ajouter au panier"
                                                                    class="action-btn hover-up" href="#"
                                                                    wire:click.prevent="store({{ $fproduct->id }},'{{ $fproduct->name }}',{{ $fproduct->prix_promo }})"><i
                                                                        class="fi-rs-shopping-bag-add"></i></a>
                                                            @endif

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>


                        </div>

                        


                    </section>

                </div>
                <div class="col-lg-1-5 primary-sidebar sticky-sidebar pt-30">
                    <div class="widget-category mb-30">
                        <h5 class="section-title style-1 mb-30 wow fadeIn animated">Categories</h5>
                        <ul class="categories">
                            {{-- liste des categories --}}
                            @foreach ($categories as $category)
                                <li class="categories {{ count($category->subCategories) > 0 }}">
                                    <a
                                        href="{{ route('product.category', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                                    @if (count($category->subCategories) > 0)
                                        <span class="toggle-control">+</span>
                                        <ul class="sub-cate">
                                            @foreach ($category->subCategories as $scategory)
                                                <li class="categories">
                                                    <a
                                                        href="{{ route('product.category', ['slug' => $category->slug, 'sslug' => $scategory->slug]) }}">{{ $scategory->name }}</a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    @endif
                                </li>
                            @endforeach


                        </ul>
                    </div>

                    <!-- Product sidebar Widget -->
                    <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">Nouveaux produits</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        @foreach ($lproducts as $lproduct)
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="{{ asset('assets/imgs/products') }}/{{ $lproduct->image }}"
                                        alt="#">
                                </div>
                                <div class="content pt-10">
                                    <h5><a
                                            href="{{ route('product.details', ['slug' => $lproduct->slug]) }}">{{ $lproduct->name }}</a>
                                    </h5>
                                    @if ($lproduct->prix_promo == null)
                                        <p class="price mb-0 mt-5">{{ $lproduct->prix_normale }}€</p>
                                    @else
                                        <p class="price mb-0 mt-5">{{ $lproduct->prix_promo }}€</p>
                                    @endif

                                    <div class="product-rate">
                                        <div class="product-rating" style="width:90%"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">Nouveaux produits</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        @foreach ($new3products as $new3prod)
                        <div class="single-post clearfix">
                            <div class="image">
                                <img src="{{ asset('assets/imgs/products')}}/{{ $new3prod->image}}" alt="#">
                            </div>
                            <div class="content pt-10">
                                <h5><a href="{{ route('product.details', ['slug' => $new3prod->slug]) }}">{{ $new3prod->name }}</a></h5>
                                @if ($new3prod->prix_promo == null)

                                <p class="price mb-0 mt-5">{{ $new3prod->prix_normale }}€</p>
                                @else
                                <p class="price mb-0 mt-5">{{ $new3prod->prix_promo }}€</p>
                                @endif

                                <div class="product-rate">
                                    <div class="product-rating" style="width:90%"></div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div> --}}

                </div>
            </div>
        </div>

        <section class="popular-categories section-padding">
            <div class="container">
                <div class="section-title">
                    <div class="title">
                        <h3>Catégories <span>Populaires</span></h3>

                    </div>
                    <div class="slider-arrow slider-arrow-2 flex-right carausel-8-columns-arrow"
                        id="carausel-8-columns-arrows"></div>
                </div>
                <div class="carausel-8-columns-cover position-relative">
                    <div class="carausel-8-columns" id="carausel-8-columns">
                        @foreach ($pcategories as $pcategory)
                            <div class="card-1">
                                <figure class="img-hover-scale overflow-hidden">
                                    <a href="{{ route('product.category', ['slug' => $pcategory->slug]) }}"><img
                                            src="{{ asset('assets/imgs/categories') }}/{{ $pcategory->image }}"
                                            alt="{{ $pcategory->name }}"></a>
                                </figure>
                                <h6>
                                    <a
                                        href="{{ route('product.category', ['slug' => $pcategory->slug]) }}">{{ $pcategory->name }}</a>
                                </h6>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>


        <!--End category slider-->
        <section class="section-padding mb-30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0">
                        <h4 class="section-title style-1 mb-30 animated animated">Top Selling</h4>
                        <div class="product-list-small animated animated">
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="shop-product-right.html"><img src="assets/imgs/shop/thumbnail-1.jpg"
                                            alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">Nestle Original Coffee-Mate Coffee
                                            Creamer</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="shop-product-right.html"><img src="assets/imgs/shop/thumbnail-2.jpg"
                                            alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">Nestle Original Coffee-Mate Coffee
                                            Creamer</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="shop-product-right.html"><img src="assets/imgs/shop/thumbnail-3.jpg"
                                            alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">Nestle Original Coffee-Mate Coffee
                                            Creamer</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0">
                        <h4 class="section-title style-1 mb-30 animated animated">Trending Products</h4>
                        <div class="product-list-small animated animated">
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="shop-product-right.html"><img src="assets/imgs/shop/thumbnail-4.jpg"
                                            alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">Organic Cage-Free Grade A Large Brown
                                            Eggs</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="shop-product-right.html"><img src="assets/imgs/shop/thumbnail-5.jpg"
                                            alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown, & Red
                                            Rice</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="shop-product-right.html"><img src="assets/imgs/shop/thumbnail-6.jpg"
                                            alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">Naturally Flavored Cinnamon Vanilla Light
                                            Roast Coffee</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block">
                        <h4 class="section-title style-1 mb-30 animated animated">Recently added</h4>
                        <div class="product-list-small animated animated">
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="shop-product-right.html"><img src="assets/imgs/shop/thumbnail-7.jpg"
                                            alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">Pepperidge Farm Farmhouse Hearty White
                                            Bread</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="shop-product-right.html"><img src="assets/imgs/shop/thumbnail-8.jpg"
                                            alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">Organic Frozen Triple Berry Blend</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="shop-product-right.html"><img src="assets/imgs/shop/thumbnail-9.jpg"
                                            alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">Oroweat Country Buttermilk Bread</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block">
                        <h4 class="section-title style-1 mb-30 animated animated">Top Rated</h4>
                        <div class="product-list-small animated animated">
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="shop-product-right.html"><img src="assets/imgs/shop/thumbnail-10.jpg"
                                            alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">Foster Farms Takeout Crispy Classic Buffalo
                                            Wings</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="shop-product-right.html"><img src="assets/imgs/shop/thumbnail-11.jpg"
                                            alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">Angie’s Boomchickapop Sweet & Salty Kettle
                                            Corn</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="shop-product-right.html"><img src="assets/imgs/shop/thumbnail-12.jpg"
                                            alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">All Natural Italian-Style Chicken
                                            Meatballs</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End 4 columns-->
    </main>
</div>
