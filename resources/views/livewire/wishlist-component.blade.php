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
                   background-color: #f15412 !important;
                   border: 1px solid transparent !important;

               }
               .wishlisted i{
                   color: #fff !important;

               }
               .product-cart-wrap .product-action-1 button:after, .product-cart-wrap .product-action-1 a.action-btn:after {

                 left: -32%;

        }
    </style>
           <main class="main">
               <div class="page-header breadcrumb-wrap">
                   <div class="container">
                       <div class="breadcrumb">
                           <a href="/" rel="nofollow">Accueil</a>
                           <span></span> Boutique
                           <span></span> Liste des préférences
                       </div>
                   </div>
               </div>
               <section class="mt-50 mb-50">
                   <div class="container">
                       <div class="row product-grid-4">
                            @foreach (Cart::instance('wishlist')->content() as $item)
                                <div class="col-lg-3 col-md-3 col-6 col-sm-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ route('product.details', ['slug' => $item->model->slug]) }}">
                                                    <img class="default-img"
                                                        src="{{ asset('assets/imgs/products')}}/{{ $item->model->image}}"
                                                        alt="{{ $item->model->name }}">
                                                    <img class="hover-img"
                                                        src="{{ asset('assets/imgs/shop/product-') }}{{ $item->model->id }}-2.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn hover-up"
                                                    data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                    <i class="fi-rs-search"></i></a>
                                                {{-- <a aria-label="Ajouter à la liste de souhaits" class="action-btn hover-up"
                                                    href="#"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn hover-up"
                                                    href="compare.php"><i class="fi-rs-shuffle"></i></a> --}}
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">Hot</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="{{ route('product.category',['slug'=> $item->model->category->slug]) }}">{{  $item->model->category->name }}</a>
                                            </div>
                                            <h2><a
                                                    href="{{ route('product.details', ['slug' => $item->model->slug]) }}">{{ $item->model->name }}</a>
                                            </h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                    <span>90%</span>
                                                </span>
                                            </div>
                                            <div class="product-price">

                                                @if ($item->model->prix_promo == null)
                                                    <span>{{ $item->model->prix_normale }}€</span>
                                                @else
                                                    <span>{{ $item->model->prix_promo }}€</span>
                                                    <span class="old-price">{{ $item->model->prix_normale }}€</span>
                                                @endif
                                            </div>
                                            <div class="product-action-1 show">
                                                {{-- @if ($witems->contains($item->model->id)) --}}
                                                    <a aria-label="Ajouter à la liste de souhaits" class="action-btn hover-up wishlisted"
                                                    href="#" wire:click.prevent="removeFromWishlist({{ $item->model->id }})"><i class="fi-rs-heart"></i></a>

                                                {{-- @else

                                                    @if ($item->model->prix_promo == null)
                                                        <a aria-label="Retirer la liste de souhaits" class="action-btn hover-up" href="w#" wire:click.prevent="addToWishlist({{ $item->model->id }},'{{ $item->model->name }}', {{ $item->model->prix_normale }})"><i class="fi-rs-heart"></i></a>
                                                    @else
                                                        <a aria-label="Ajouter à la liste de souhaits" class="action-btn hover-up" href="#" wire:click.prevent="addToWishlist({{ $item->model->id }},'{{ $item->model->name }}', {{ $item->model->prix_promo }})"><i class="fi-rs-heart"></i></a>
                                                    @endif


                                                @endif --}}

                                                @if ($item->model->prix_promo == null)
                                                    <a aria-label="Ajouter au panier" class="action-btn hover-up"
                                                        href="#"
                                                        wire:click.prevent="store({{ $item->model->id }},'{{ $item->model->name }}',{{ $item->model->prix_normale }})"><i
                                                            class="fi-rs-shopping-bag-add"></i></a>
                                                @else
                                                    <a aria-label="Ajouter au panier" class="action-btn hover-up"
                                                        href="#"
                                                        wire:click.prevent="store({{ $item->model->id }},'{{ $item->model->name }}',{{ $item->model->prix_promo }})"><i
                                                            class="fi-rs-shopping-bag-add"></i></a>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                       </div>
                   </div>
               </section>
           </main>
</div>
