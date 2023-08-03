<div>
    <style>
        /* pagination formatage du bas de page pour les numero et le suivante et precedent */

               nav svg {
                   height: 20px;
               }

               nav .hidden {
                   display: block;
               }
               .sclist{
                list-style: none;
               }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Accueil</a>
                    <span></span> Tout les catégories

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
                                    <div class="col-md-6">
                                        Liste les catégories
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.category.add') }}" class="btn btn-success float-end" >Ajouter une catégorie</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>nom</th>
                                            <th>slug</th>
                                            <th>sous categorie</th>
                                            <th>Populaire</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i =($categories->currentPage()-1)*$categories->perPage();
                                        @endphp
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ ++$i}}</td>
                                                <td><img src="{{ asset('assets/imgs/categories')}}/{{ $category->image}}" width="60" alt=""></td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->slug }}</td>
                                                <td>
                                                    <ul class="sclist">
                                                        @foreach ($category->subCategories as $scategory)
                                                            <li><i class="fi-rs-caret-right"></i>{{ $scategory->name }} *
                                                                <a href="{{ route('admin.category.edit',['category_id'=>$category->id,'subcategory_id'=>$scategory->id]) }}">Modifier</a>
                                                                <a href="#" class="text-danger" onclick="deleteConfirmationsousca({{ $scategory->id }})" style="margin-left:20px;">Supprimer</a>
                                                            </li>

                                                        @endforeach

                                                    </ul>
                                                </td>
                                                <td>{{ $category->est_populaire ==1 ? 'Oui':'Non' }}</td>
                                                <td>
                                                    <a href="{{ route('admin.category.edit',['category_id'=>$category->id]) }}" class="text-info"> Edit</a>
                                                    <a href="#" class="text-danger" onclick="deleteConfirmation({{ $category->id }})" style="margin-left:20px;">Supprimer</a>

                                                </td>
                                            </tr>

                                        @endforeach
                                    </tbody>

                                </table>
                                {{ $categories->links() }}
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
                        <h4 class="pb-3">Voulez vous vraiment supprimé cette catégorie?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Annuler</button>
                        <button type="button" class="btn btn-danger" onclick="deleteCategory()">Supprimer</button>

                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

<div class="modal" id="deleteConfirmationsousca">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="pb-3">Voulez vous vraiment supprimé cette sous-catégorie?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmationsousca">Annuler</button>
                        <button type="button" class="btn btn-danger" onclick="deleteSubcategory()">Supprimer</button>

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
            @this.set('category_id',id);
            $('#deleteConfirmation').modal('show');
        }

        function deleteCategory()
        {
            @this.call('deleteCategory');
            $('#deleteConfirmation').modal('hide');

        }
    </script>



<script>
    function deleteConfirmationsousca(id)
    {
        @this.set('souscategory_id',id);
        $('#deleteConfirmationsousca').modal('show');
    }

    function deleteSubcategory()
    {
        @this.call('deleteSubcategory');
        $('#deleteConfirmationsousca').modal('hide');

    }
</script>



@endpush
