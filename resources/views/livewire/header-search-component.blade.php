{{-- <div class="search-style-1">
    <form action="{{ route('product.search') }}">
        <input type="text" name="q" placeholder="Rechercher un produict..." value="{{ $q }}">
    </form>
</div> --}}

<div class="search-style-2">
    <form action="{{ route('product.search') }}">
        {{-- <select class="select-active">
            <option>All Categories</option>
            <option>Milks and Dairies</option>
            <option>Wines & Alcohol</option>
            <option>Clothing & Beauty</option>
            <option>Pet Foods & Toy</option>
            <option>Fast food</option>
            <option>Baking material</option>
            <option>Vegetables</option>
            <option>Fresh Seafood</option>
            <option>Noodles & Rice</option>
            <option>Ice cream</option>
        </select> --}}
        <input type="text" name="q" placeholder="Rechercher ..." value="{{ $q }}">
    </form>
</div>
