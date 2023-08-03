<div>
    <style>
        /* pagination formatage du bas de page pour les numero et le suivante et precedent */

               nav svg {
                   height: 20px;
               }

               nav .hidden {
                   display: block;
               }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Accueil</a>
                    <span></span> Tout les Produits

                </div>
            </div>
        </div>
        <x:notify-messages />

        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-4">
                                        Liste les Produits
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.products.add') }}" class="btn btn-success float-end" >Ajouter un produit</a>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-controm" placeholder="Recherche..." wire:model="recherTermprod">

                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Nom</th>
                                            <th>Stock</th>
                                            <th>Prix normale</th>
                                            <th>Prix promo</th>
                                            <th>Quantité</th>
                                            <th>Catégorie</th>
                                            {{-- <th>sous-categorie</th> --}}
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i =($products->currentPage()-1)*$products->perPage();
                                        @endphp
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ ++$i}}</td>
                                                <td><img src="{{ asset('assets/imgs/products')}}/{{ $product->image}}" alt="{{ $product->name }}" width="60"></td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->status_stock }}</td>
                                                <td>{{ $product->prix_normale }}</td>
                                                @if ( $product->prix_promo==null)
                                                    <td>Pas en promotion</td>
                                                @else
                                                    <td>{{ $product->prix_promo }}</td>
                                                @endif
                                                <td>{{ $product->quantite }}</td>
                                                <td>{{ $product->category->name }}</td>

                                                {{-- <td>{{ $product->souscategory->name }}</td> --}}
                                                <td>{{ $product->created_at }}</td>


                                                <td>
                                                    <a href="{{ route('admin.product.edit',['product_id'=>$product->id]) }}" class="text-info">Edit</a>
                                                    <a href="#" class="text-danger" onclick="deleteConfirmation({{ $product->id }})" style="margin-left:20px;">Supprimer</a>

                                                </td>
                                            </tr>

                                        @endforeach
                                    </tbody>

                                </table>
                                {{ $products->links() }}
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
    </main>
</div>




<div class="modal" id="deleteConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="pb-3">Voulez vous vraiment supprimé ce produit?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Annuler</button>
                        <button type="button" class="btn btn-danger" onclick="deleteProduct()">Supprimer</button>

                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

@push('scripts')
    <script>
        function deleteConfirmation(id)
        {
            @this.set('product_id',id);
            $('#deleteConfirmation').modal('show');
        }

        function deleteCategory()
        {
            @this.call('deleteProduct');
            $('#deleteConfirmation').modal('hide');

        }
    </script>



@endpush

