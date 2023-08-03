
<div class="header-action-icon-2">
    <a class="mini-cart-icon" href="{{ route('boutique.cart') }}">
        <img alt="Nest" src="{{ asset('assets/imgs/theme/icons/icon-cart.svg')}}" />
        @if (Cart::instance('cart')->count() > 0)
            <span class="pro-count blue">{{ Cart::instance('cart')->count() }}</span>
        @endif

    </a>
    <a href="{{ route('boutique.cart') }}"><span class="lable">Panier</span></a>
    <div class="cart-dropdown-wrap cart-dropdown-hm2">
        <ul>
            @foreach (Cart::instance('cart')->content() as $item)
            <li>
                <div class="shopping-cart-img">
                    <a href="{{ route('product.details', ['slug' => $item->model->slug]) }}"><img alt="{{ $item->model->name }}"
                        src="{{ asset('assets/imgs/products')}}/{{ $item->model->image}}"></a>
                </div>
                <div class="shopping-cart-title">
                    <h4><a href="{{ route('product.details', ['slug' => $item->model->slug]) }}">{{ substr($item->model->name,0,20) }}...</a></h4>

                    @if ($item->model->prix_promo == null)
                    <h4><span>{{$item->qty}} × </span>{{ $item->model->prix_normale }}€</h4>
                    @else
                    <h4><span>{{$item->qty}} × </span>{{ $item->model->prix_promo }}€</h4>
                    @endif
                </div>
                <div class="shopping-cart-delete">

                    <a href="#"  wire:click.prevent="destroy('{{ $item->rowId }}')"><i class="fi-rs-cross-small"></i></a>
                </div>
            </li>
            @endforeach

        </ul>
        <div class="shopping-cart-footer">
            <div class="shopping-cart-total">
                <h4>Total <span>{{ Cart::instance('cart')->total( )}}</span></h4>
            </div>

            <div class="shopping-cart-button">
                <a href="{{ route('boutique.cart') }}" class="outline">Voir le panier</a>
                <a href="{{ route('boutique.paiement') }}">commande</a>
            </div>
        </div>
    </div>
</div>
