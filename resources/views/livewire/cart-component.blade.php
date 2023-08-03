<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Accueil</a>
                    <span></span> Boutique
                    <span></span> Votre panier
                </div>
            </div>
        </div>
        {{-- <x:notify-messages /> --}}

        <section class="mt-50 mb-50">
            <div class="container">

                <div class="row">
                    <div class="col-12">
                        @if (Cart::instance('cart')->count() > 0)
                            <div class="table-responsive">



                                @if (Cart::instance('cart')->count() > 0)
                                    <table class="table shopping-summery text-center clean">
                                        <thead>
                                            <tr class="main-heading">
                                                <th scope="col">Image</th>
                                                <th scope="col">Désignation</th>
                                                <th scope="col">Prix</th>

                                                <th scope="col">Quantité</th>
                                                <th scope="col">Particularité</th>
                                                <th scope="col">Sous-total</th>
                                                <th scope="col">Retirer</th>
                                            </tr>
                                        </thead>
                                        <tbody>



                                            @foreach (Cart::instance('cart')->content() as $item)
                                                <tr>
                                                    <td class="image product-thumbnail"><img
                                                            src="{{ asset('assets/imgs/products') }}/{{ $item->model->image }}"
                                                            alt="#"></td>
                                                    <td class="product-des product-name">
                                                        <h5 class="product-name"><a
                                                                href="product-details.html">{{ $item->model->name }}</a>
                                                        </h5>
                                                        {{-- <p class="font-xs">Maboriosam in a tonto nesciung eget<br> distingy
                                                        magndapibus.
                                                    </p> --}}
                                                    </td>
                                                    @if ($item->model->prix_promo == null)
                                                        <td class="price" data-title="Price">
                                                            <span>{{ $item->model->prix_normale }}€</span>
                                                        </td>
                                                    @else
                                                        <td class="price" data-title="Price">
                                                            <span>{{ $item->model->prix_promo }}€</span>
                                                        </td>
                                                    @endif

                                                    <td class="text-center" data-title="Stock">
                                                        <div class="detail-qty border radius  m-auto">
                                                            <a href="#" class="qty-down"
                                                                wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')"><i
                                                                    class="fi-rs-angle-small-down"></i></a>
                                                            <span class="qty-val">{{ $item->qty }}</span>
                                                            <a href="#" class="qty-up"
                                                                wire:click.prevent="increaseQuantity('{{ $item->rowId }}')"><i
                                                                    class="fi-rs-angle-small-up"></i></a>
                                                        </div>
                                                    </td>
                                                    <td class="product-des product-name" >
                                                        @foreach ($item->options as $key=>$value)
                                                        <div style="vertical-align:middle;width:120px;">
                                                            <p>{{ $key }}: {{ $value }}</p>

                                                        </div>
                                                        @endforeach
                                                    </td>
                                                    <td class="text-right" data-title="Cart">
                                                        <span>{{ $item->subtotal }}€</span>
                                                    </td>
                                                    <td class="action" data-title="Remove"><a href="#"
                                                            class="text-muted"
                                                            wire:click.prevent="destroy('{{ $item->rowId }}')"><i
                                                                class="fi-rs-trash"></i></a></td>


                                                </tr>
                                            @endforeach



                                            {{-- <tr>
                                            <td colspan="6" class="text-end">
                                                <a href="#" class="text-muted" wire:click.prevent="supprimerTout()"> <i class="fi-rs-cross-small"></i>
                                                    Vider le panier</a>
                                            </td>
                                        </tr> --}}
                                        </tbody>
                                    </table>
                                @else
                                    <p>Aucun article dans le panier</p>
                                @endif
                            </div>
                            <div class="cart-action text-end">
                                <a class="btn  mr-10 mb-sm-15" wire:click.prevent="supprimerTout()"><i
                                        class="fi-rs-shuffle mr-10"></i>Vider le panier</a>
                                {{-- <a class="btn  mr-10 mb-sm-15" wire:click.prevent="supprimerTout()"><i class="fi-rs-shuffle mr-10"></i>Mise à jour du panier</a> --}}
                                <a href="{{ route('boutique') }}" class="btn"><i
                                        class="fi-rs-shopping-bag mr-10"></i>Continuer Shopping</a>
                            </div>
                            <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                            <div class="row mb-50">

                                <div class="col-lg-12 col-md-12">
                                    <div class="border p-md-4 p-30 border-radius cart-totals">
                                        <div class="heading_s1 mb-3">
                                            <h4>Résumer du panier</h4>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td class="cart_total_label">Sous-total du panier</td>
                                                        <td class="cart_total_amount"><span
                                                                class="font-lg fw-900 text-brand">{{ Cart::subtotal() }}€</span>
                                                        </td>
                                                    </tr>
                                                    @if (Session::has('coupon'))
                                                        <tr>
                                                            <td class="cart_total_label">Réduction
                                                                ({{ Session::get('coupon')['code'] }}) <a
                                                                    href="#" wire:click.prevent="suppriCoupon"><i
                                                                        class="fa fa-times text-danger"></i></a></td>
                                                            <td class="cart_total_amount"><span
                                                                    class="font-lg fw-900 text-brand">
                                                                    -{{ number_format($discount, 2) }}€</span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="cart_total_label">Sous-total avec remise</td>
                                                            <td class="cart_total_amount"><span
                                                                    class="font-lg fw-900 text-brand">{{ number_format($subtotalAfterDiscount, 2) }}€</span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="cart_total_label">Tax
                                                                ({{ config('cart.tax') }}%)
                                                            </td>
                                                            <td class="cart_total_amount"><span
                                                                    class="font-lg fw-900 text-brand">{{ number_format($taxAfterDiscount, 2) }}€</span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="cart_total_label">Total</td>
                                                            <td class="cart_total_amount"><span
                                                                    class="font-lg fw-900 text-brand">{{ number_format($totalAfterDiscount, 2) }}€</span>
                                                            </td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td class="cart_total_label">Tax</td>
                                                            <td class="cart_total_amount"><span
                                                                    class="font-lg fw-900 text-brand">{{ Cart::tax() }}€</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cart_total_label">Livraison</td>
                                                            <td class="cart_total_amount"> <i class="ti-gift mr-5"></i>
                                                                Livraison gratuite</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cart_total_label">Total</td>
                                                            <td class="cart_total_amount"><strong><span
                                                                        class="font-xl fw-900 text-brand">{{ Cart::total() }}€</span></strong>
                                                            </td>
                                                        </tr>
                                                    @endif

                                                </tbody>
                                            </table>
                                        </div>
                                        <a wire:click.prevent="checkout" class="btn "> <i
                                                class="fi-rs-box-alt mr-10"></i>
                                            Passer à la caisse</a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-center" style="padding:30px 0;">
                                <h1 class="animated fw-900 text-brand">Votre panier est vide!</h1><br>
                                <p>Ajouter des Articles maintenant</p><br>
                                <a class="btn bg-dark text-white" href="{{ route('boutique') }}">Commander</a>

                            </div>

                        @endif


                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
