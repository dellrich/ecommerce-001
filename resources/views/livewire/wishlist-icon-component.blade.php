 <div class="header-action-icon-2">
    <a href="{{ route('boutique.favorie_liste') }}">
        <img class="svgInject" alt="Nest"
            src="{{ asset('assets/imgs/theme/icons/icon-heart.svg') }}" />
            @if (Cart::instance('wishlist')->count() > 0)
            <span class="pro-count blue">{{ Cart::instance('wishlist')->count()}}</span>
            @endif

    </a>
    <a href="{{ route('boutique.favorie_liste') }}"><span class="lable">Favoris</span></a>
</div>
