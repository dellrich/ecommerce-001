<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            Details commandes
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('user.commandes') }}" class="btn btn-success float-end">Mes commandes</a>
                            @if ($order->status == "ordered")
                            <a href="#" wire:click.prevent="annulerCommande" class="btn btn-warning float-end" style="margin-right:20px">Annuler commande</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card">
                    <table class="table">
                        <tr>
                            <th> <b>Id commande</b> </th>
                            <td>{{ $order->id }}</td>
                            <th><b>Date commande</b> </th>
                            <td>{{ $order->created_at }}</td>
                            <th><b>statut</b></th>
                            <td>{{ $order->status }}</td>
                            @if ($order->status == "delivered")
                            <th><b>Date de livraison</b></th>
                            <td>{{ $order->delivrer_date }}</td>

                            @elseif ($order->status == "canceled")
                            <th><b>Date annullation</b></th>
                            <td>{{ $order->annuler_date }}</td>

                            @endif


                        </tr>

                    </table>

                </div>



            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                Articles commandés
                            </div>

                        </div>
                    </div>


                    <div class="page-header breadcrumb-wrap">


                        <div class="panel-body">


                            <div class="table-responsive">




                                <table class="table shopping-summery text-center clean">
                                    <thead>
                                        <tr class="main-heading">
                                            <th scope="col">Image</th>
                                            <th scope="col">Désignation</th>
                                            <th scope="col">Prix</th>
                                            <th scope="col">Quantité</th>
                                            <th>Détails</th>
                                            <th scope="col">Total</th>


                                        </tr>
                                    </thead>
                                    <tbody>



                                        @foreach ($order->orderItems as $item)
                                            <tr>
                                                <td class="image product-thumbnail"><img
                                                        src="{{ asset('assets/imgs/products') }}/{{ $item->product->image }}"
                                                        alt="#"></td>
                                                <td class="product-des product-name">
                                                    <h5 class="product-name"><a
                                                            href="product-details.html">{{ $item->product->name }}</a>
                                                    </h5>
                                                    {{-- <p class="font-xs">Maboriosam in a tonto nesciung eget<br> distingy
                                                        magndapibus.
                                                    </p> --}}
                                                </td>
                                                @if ($item->product->prix_promo == null)
                                                    <td class="price" data-title="Price">
                                                        <span>{{ $item->product->prix_normale }}€</span>
                                                    </td>
                                                @else
                                                    <td class="price" data-title="Price">
                                                        <span>{{ $item->product->prix_promo }}€</span>
                                                    </td>
                                                @endif

                                                <td class="text-center" data-title="Stock">

                                                    <span class="qty-val">{{ $item->quantity }}</span>
                                                </td>
                                                <td class="text-center">

                                                    @foreach (unserialize($item->options) as $key => $value)
                                                    <p>{{ $key }}:{{ $value }}</p>

                                                    @endforeach
                                                </td>
                                                @if ($item->product->prix_promo == null)
                                                    <td class="text-right" data-title="Cart">
                                                        <span>{{ $item->product->prix_normale * $item->quantity }}€</span>
                                                    </td>
                                                @else
                                                    <td class="text-right" data-title="Cart">
                                                        <span>{{ $item->product->prix_promo * $item->quantity }}€</span>
                                                    </td>
                                                @endif

                                            </tr>
                                        @endforeach

                                        {{-- <tr>
                                                <td class="cart_total_amount"><span
                                                    class="font-lg fw-900 text-brand">{{ Cart::tax() }}€</span>
                                                </td>
                                            </tr> --}}



                                        {{-- <tr>
                                            <td colspan="6" class="text-end">
                                                <a href="#" class="text-muted" wire:click.prevent="supprimerTout()"> <i class="fi-rs-cross-small"></i>
                                                    Vider le panier</a>
                                            </td>
                                        </tr> --}}
                                    </tbody>
                                </table>

                            </div>


                            <div class="heading_s1">
                                <h4 class="title-box">Résumé de la commande</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>

                                        <table>
                                            <tr>
                                                <td class="cart_total_label">Sous-total</td>
                                                <td class="cart_total_amount"><span
                                                        class="font-lg fw-900 text-brand">{{ $order->subtotal }}€</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">Tax</td>
                                                <td class="cart_total_amount"><span
                                                        class="font-lg fw-900 text-brand">{{ $order->tax }}€</span>
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
                                                            class="font-xl fw-900 text-brand">{{ $order->total }}€</span></strong>
                                                </td>
                                            </tr>

                                    </tbody>
                                </table>

                            </div>


                        </div>

                    </div>


                    <div class="page-header breadcrumb">
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header breadcrumb-wrap">
                                <div class="heading_s1">
                                    <h4 class="title-box"> Détail de la Facture</h4>
                                </div>

                                <div class="panel-body">
                                    <div class="table table-responsive">
                                        <table class="table table-striped ">
                                            <tr>
                                                <th scope="col">Nom </th>
                                                <td>{{ $order->lastname }}</td>
                                                <th scope="col">Prénom</th>
                                                <td>{{ $order->firstname }}</td>
                                            </tr>

                                            <tr>
                                                <th scope="col">Téléphone</th>
                                                <td>{{ $order->mobile }}</td>
                                                <th scope="col">Email</th>
                                                <td>{{ $order->email }}</td>
                                            </tr>

                                            <tr>
                                                <th scope="col">Adresse 1</th>
                                                <td>{{ $order->line1 }}</td>
                                                <th>Adresse 2</th>
                                                <td>{{ $order->line2 }}</td>
                                            </tr>

                                            <tr>
                                                <th>Ville</th>
                                                <td>{{ $order->city }}</td>
                                                <th>Province</th>
                                                <td>{{ $order->province }}</td>
                                            </tr>

                                            <tr>
                                                <th>Pays</th>
                                                <td>{{ $order->country }}</td>
                                                <th>Code Zipe </th>
                                                <td>{{ $order->zipcode }}</td>
                                            </tr>
                                        </table>
                                    </div>



                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="page-header breadcrumb">
                    </div>
                    @if ($order->is_shipping_different)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-header breadcrumb-wrap">
                                    <div class="heading_s1">
                                        <h4 class="title-box"> Détail de la Livraison
                                        </h4>
                                    </div>

                                    <div class="panel-body">
                                        <div class="table table-responsive">
                                            <table class="table table-striped ">
                                                <tr>
                                                    <th scope="col">Nom </th>
                                                    <td>{{ $order->shipping->lastname }}</td>
                                                    <th scope="col">Prénom</th>
                                                    <td>{{ $order->shipping->firstname }}</td>
                                                </tr>

                                                <tr>
                                                    <th scope="col">Téléphone</th>
                                                    <td>{{ $order->shipping->mobile }}</td>
                                                    <th scope="col">Email</th>
                                                    <td>{{ $order->shipping->email }}</td>
                                                </tr>

                                                <tr>
                                                    <th scope="col">Adresse 1</th>
                                                    <td>{{ $order->shipping->line1 }}</td>
                                                    <th>Adresse 2</th>
                                                    <td>{{ $order->shipping->line2 }}</td>
                                                </tr>

                                                <tr>
                                                    <th>Ville</th>
                                                    <td>{{ $order->shipping->city }}</td>
                                                    <th>Province</th>
                                                    <td>{{ $order->shipping->province }}</td>
                                                </tr>

                                                <tr>
                                                    <th>Pays</th>
                                                    <td>{{ $order->shipping->country }}</td>
                                                    <th>Code Zipe </th>
                                                    <td>{{ $order->shipping->zipcode }}</td>
                                                </tr>
                                            </table>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="page-header breadcrumb">
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header breadcrumb-wrap">
                                <div class="heading_s1">
                                    <h4 class="title-box"> Transaction
                                    </h4>
                                </div>
                                <div class="panel-body">
                                    <div class="table table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                                <th>Mode de Transaction</th>
                                                <td>{{ $order->transaction->mode }}</td>
                                            </tr>
                                            <tr>
                                                <th>Statut</th>
                                                <td>{{ $order->transaction->status }}</td>
                                            </tr>
                                            <tr>
                                                <th>Date de Transaction</th>
                                                <td>{{ $order->transaction->created_at }}</td>
                                            </tr>

                                        </table>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

