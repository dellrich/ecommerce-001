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
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Accueil</a>
                    <span></span> {{ $product->category->name }}


                    {{-- <span></span> {{ $product->name }} --}}
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="product-detail accordion-detail">
                            @php
                                $witems = Cart::instance('wishlist')
                                    ->content()
                                    ->pluck('id');
                            @endphp
                            <div class="row mb-50">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-gallery">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>

                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
                                            <figure class="border-radius-10">
                                                <img src="{{ asset('assets/imgs/products') }}/{{ $product->image }}"
                                                    alt="product image">
                                            </figure>
                                        </div>
                                        @php
                                            $images = explode(',', $product->images);

                                        @endphp
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails pl-15 pr-15">
                                            @foreach ($images as $image)
                                                @if ($image)
                                                    <div>
                                                        <img src="{{ asset('assets/imgs/products') }}/{{$image}}"
                                                            alt="product image">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>


                                    </div>
                                    <!-- End Gallery -->
                                    <div class="social-icons single-share">
                                        <ul class="text-grey-5 d-inline-block">
                                            <li><strong class="mr-10">Share this:</strong></li>
                                            <li class="social-facebook"><a href="#"><img
                                                        src="{{ asset('assets/imgs/theme/icons/icon-facebook.svg') }}"
                                                        alt=""></a></li>
                                            <li class="social-twitter"> <a href="#"><img
                                                        src="{{ asset('assets/imgs/theme/icons/icon-twitter.svg') }}"
                                                        alt=""></a></li>
                                            <li class="social-instagram"><a href="#"><img
                                                        src="{{ asset('assets/imgs/theme/icons/icon-instagram.svg') }}"
                                                        alt=""></a></li>
                                            <li class="social-linkedin"><a href="#"><img
                                                        src="{{ asset('assets/imgs/theme/icons/icon-pinterest.svg') }}"
                                                        alt=""></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info">
                                        <h2 class="title-detail">{{ $product->name }}</h2>
                                        <div class="product-detail-rating">
                                            {{-- <div class="pro-details-brand">
                                                <span> Brands: <a href="{{ route('boutique')}}">Bootstrap</a></span>
                                            </div> --}}
                                            <div class="product-rate-cover text-end">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width:90%">
                                                    </div>
                                                </div>
                                                {{-- <span class="font-small ml-5 text-muted"> (25 reviews)</span> --}}
                                            </div>
                                        </div>
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">

                                                @if ($product->prix_promo == null)
                                                    <ins><span
                                                            class="text-brand">{{ $product->prix_normale }}€</span></ins>
                                                @else
                                                    <ins><span
                                                            class="text-brand">{{ $product->prix_promo }}€</span></ins>
                                                    <ins><span
                                                            class="old-price font-md ml-15">{{ $product->prix_normale }}€</span></ins>
                                                @endif

                                                {{-- <span class="save-price  font-md color3 ml-15">25% Off</span> --}}
                                            </div>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                        <div class="short-desc mb-30">
                                            {{-- <p>{!! $product->court_description !!}</p> --}}
                                            @php
                                                echo $product->court_description;
                                            @endphp
                                        </div>
                                        {{-- <div class="product_sort_info font-xs mb-30">
                                            <ul>
                                                <li class="mb-10"><i class="fi-rs-crown mr-5"></i> 1 Year AL Jazeera Brand Warranty</li>
                                                <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> 30 Day Return Policy</li>
                                                <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery available</li>
                                            </ul>
                                        </div> --}}
                                        <div class="attr-detail attr-color mb-15" style="width:20px">
                                            @foreach ($product ->attributeValues->unique('product_attribute_id') as $av )
                                            <strong class="mr-10">{{ $av->productAttribute->name }}</strong>

                                            <select class="list-filter color-filter" style="width:90px" wire:model="satt.{{ $av->productAttribute->name }}">
                                                {{-- <li><a href="#" data-color="Red"><span
                                                    class="product-color-red"></span></a></li> --}}
                                                    @foreach ($av->productAttribute->attributeValues->where('product_id',$product->id) as $pav)
                                                        <option value="{{ $pav->value }}">{{ $pav->value }}</option>
                                                    @endforeach
                                            </select>


                                            @endforeach

                                        </div>

                                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                        <div class="detail-extralink">


                                            <div class="detail-qty border radius">
                                                <a href="#" class="qty-down"  wire:click.prevent="decreaseQuantity"><i
                                                        class="fi-rs-angle-small-down" ></i></a>

                                                <input type="text" class="qty-val" value="1" pattern="[0-9]*" wire:model="qty">
                                                <a href="#" class="qty-up" wire:click.prevent="increaseQuantity"><i
                                                        class="fi-rs-angle-small-up"></i></a>
                                            </div>


                                            <div class="product-extra-link2">






                                                @if ($product->prix_promo == null)
                                                    {{-- <a aria-label="Ajouter au panier" class="action-btn hover-up"
                                                            href="#"
                                                            wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->prix_normale }})"><i
                                                                class="fi-rs-shopping-bag-add"></i></a> --}}
                                                    <button type="submit" class="button button-add-to-cart"
                                                        wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->prix_normale }})">Ajouter
                                                        au panier</button>
                                                @else
                                                    <button type="submit" class="button button-add-to-cart"
                                                        wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->prix_promo }})">Ajouter
                                                        au panier</button>
                                                @endif



                                                @if ($witems->contains($product->id))
                                                    <a aria-label="Ajouter à la liste de souhaits"
                                                        class="action-btn hover-up wishlisted" href="#"
                                                        wire:click.prevent="removeFromWishlist({{ $product->id }})"><i
                                                            class="fi-rs-heart"></i></a>
                                                @else
                                                    @if ($product->prix_promo == null)
                                                        <a aria-label="Retirer la liste de souhaits"
                                                            class="action-btn hover-up" href="w#"
                                                            wire:click.prevent="addToWishlist({{ $product->id }},'{{ $product->name }}', {{ $product->prix_normale }})"><i
                                                                class="fi-rs-heart"></i></a>
                                                    @else
                                                        <a aria-label="Ajouter à la liste de souhaits"
                                                            class="action-btn hover-up" href="#"
                                                            wire:click.prevent="addToWishlist({{ $product->id }},'{{ $product->name }}', {{ $product->prix_promo }})"><i
                                                                class="fi-rs-heart"></i></a>
                                                    @endif


                                                @endif

                                            </div>
                                        </div>
                                        {{-- <ul class="product-meta font-xs color-grey mt-50">
                                            <li class="mb-5">QR code: <a href="#">{{ $product->QR_code }}</a></li>
                                            <li class="mb-5">Tags: <a href="#" rel="tag">Cloth</a>, <a
                                                    href="#" rel="tag">Women</a>, <a href="#"
                                                    rel="tag">Dress</a> </li>
                                            <li>Availability:<span class="in-stock text-success ml-5">8 Items In
                                                    Stock</span></li>
                                        </ul> --}}
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                            <div class="tab-style3">
                                <ul class="nav nav-tabs text-uppercase">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                            href="#Description">Description</a>
                                    </li>

                                </ul>
                                <div class="tab-content shop_info_tab entry-main-content">
                                    <div class="tab-pane fade show active" id="Description">
                                        <div class="">
                                            {{-- {!! $product->description !!} --}}
                                            @php
                                                echo $product->description;
                                            @endphp
                                            {{-- <p>Uninhibited carnally hired played in whimpered dear gorilla koala depending and much yikes off far quetzal goodness and from for grimaced goodness unaccountably and meadowlark near unblushingly crucial scallop
                                                tightly neurotic hungrily some and dear furiously this apart.</p>
                                            <p>Spluttered narrowly yikes left moth in yikes bowed this that grizzly much hello on spoon-fed that alas rethought much decently richly and wow against the frequent fluidly at formidable acceptably flapped
                                                besides and much circa far over the bucolically hey precarious goldfinch mastodon goodness gnashed a jellyfish and one however because.
                                            </p>
                                            <ul class="product-more-infor mt-30">
                                                <li><span>Type Of Packing</span> Bottle</li>
                                                <li><span>Color</span> Green, Pink, Powder Blue, Purple</li>
                                                <li><span>Quantity Per Case</span> 100ml</li>
                                                <li><span>Ethyl Alcohol</span> 70%</li>
                                                <li><span>Piece In One</span> Carton</li>
                                            </ul>
                                            <hr class="wp-block-separator is-style-dots">
                                            <p>Laconic overheard dear woodchuck wow this outrageously taut beaver hey hello far meadowlark imitatively egregiously hugged that yikes minimally unanimous pouted flirtatiously as beaver beheld above forward
                                                energetic across this jeepers beneficently cockily less a the raucously that magic upheld far so the this where crud then below after jeez enchanting drunkenly more much wow callously irrespective limpet.</p>
                                            <h4 class="mt-30">Packaging & Delivery</h4>
                                            <hr class="wp-block-separator is-style-wide">
                                            <p>Less lion goodness that euphemistically robin expeditiously bluebird smugly scratched far while thus cackled sheepishly rigid after due one assenting regarding censorious while occasional or this more crane
                                                went more as this less much amid overhung anathematic because much held one exuberantly sheep goodness so where rat wry well concomitantly.
                                            </p>
                                            <p>Scallop or far crud plain remarkably far by thus far iguana lewd precociously and and less rattlesnake contrary caustic wow this near alas and next and pled the yikes articulate about as less cackled dalmatian
                                                in much less well jeering for the thanks blindly sentimental whimpered less across objectively fanciful grimaced wildly some wow and rose jeepers outgrew lugubrious luridly irrationally attractively
                                                dachshund.
                                            </p> --}}
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="row mt-60">
                                <div class="col-12">
                                    <h3 class="section-title style-1 mb-30">Nos Produit Similaires</h3>
                                </div>
                                <div class="col-12">
                                    <div class="row related-products">
                                        @foreach ($rproducts as $rproduct)
                                            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                                <div class="product-cart-wrap small hover-up">
                                                    <div class="product-img-action-wrap">
                                                        <div class="product-img product-img-zoom">
                                                            <a href="{{ route('product.details', ['slug' => $rproduct->slug]) }}"
                                                                tabindex="0">
                                                                <img class="default-img"
                                                                    src="{{ asset('assets/imgs/products') }}/{{ $rproduct->image }}"
                                                                    alt="{{ $rproduct->name }}">
                                                                <img class="hover-img"
                                                                    src="{{ asset('assets/imgs/products') }}/{{ $rproduct->images }}">
                                                            </a>
                                                        </div>
                                                        <div class="product-action-1">
                                                            <a aria-label="Quick view"
                                                                class="action-btn small hover-up"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quickViewModal"><i
                                                                    class="fi-rs-search"></i></a>

                                                        </div>
                                                        <div
                                                            class="product-badges product-badges-position product-badges-mrg">
                                                            <span class="hot">Hot</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-content-wrap">
                                                        <h2><a href="{{ route('product.details', ['slug' => $rproduct->slug]) }}"
                                                                tabindex="0">{{ $rproduct->name }}</a></h2>
                                                        <div class="rating-result" title="90%">
                                                            <span>
                                                            </span>
                                                        </div>
                                                        <div class="product-price">

                                                            @if ($rproduct->prix_promo == null)
                                                                <span>{{ $rproduct->prix_normale }}€</span>
                                                            @else
                                                                <span>{{ $rproduct->prix_promo }}€</span>
                                                                <span
                                                                    class="old-price">{{ $rproduct->prix_normale }}€</span>
                                                            @endif


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Categories</h5>
                            <ul class="categories">
                                {{-- liste des categories --}}
                                @foreach ($categories as $category)
                                 <li class="categories {{ count($category->subCategories)>0 }}">
                                    <a href="{{ route('product.category',['slug'=>$category->slug]) }}">{{ $category->name }}</a>
                                    @if (count($category->subCategories) > 0)
                                        <span class="toggle-control">+</span>
                                        <ul class="sub-cate">
                                            @foreach ($category->subCategories as $scategory)
                                            <li class="categories">
                                                <a href="{{ route('product.category',['slug'=>$category->slug,'sslug'=>$scategory->slug]) }}">{{ $scategory->name }}</a>
                                            </li>
                                            @endforeach

                                        </ul>

                                    @endif
                                </li>
                                @endforeach


                            </ul>
                        </div>
                        <!-- Fillter By Price -->

                        <!-- Product sidebar Widget -->
                        <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">Nouveaux produits</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            @foreach ($nproducts as $nproduct)
                                <div class="single-post clearfix">
                                    <div class="image">
                                        <img src="{{ asset('assets/imgs/products') }}/{{ $nproduct->image }}"
                                            alt="{{ $nproduct->name }}">
                                    </div>
                                    <div class="content pt-10">
                                        <h5><a
                                                href="{{ route('product.details', ['slug' => $nproduct->slug]) }}">{{ $nproduct->name }}</a>
                                        </h5>
                                        @if ($nproduct->prix_promo == null)
                                            <p class="price mb-0 mt-5">{{ $nproduct->prix_normale }}€</p>
                                        @else
                                            <p class="price mb-0 mt-5">{{ $nproduct->prix_promo }}€</p>
                                            <p class="price mb-0 mt-5 old-price">{{ $nproduct->prix_normale }}€</p>
                                        @endif

                                        <div class="product-rate">
                                            <div class="product-rating" style="width:90%"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

@push('scripts')
    <script>
        var sliderrange = $('#slider-range');
        var amountprice = $('#amount');
        $(function() {
            sliderrange.slider({
                range: true,
                min: 0,
                max: 1000,
                values: [0, 1000],
                slide: function(event, ui) {
                    //amountprice.val("$" + ui.values[0] + " - $" + ui.values[1]);
                    @this.set('min_value', ui.values[0]);
                    @this.set('max_value', ui.values[1]);
                }
            });

        });
    </script>


@endpush
