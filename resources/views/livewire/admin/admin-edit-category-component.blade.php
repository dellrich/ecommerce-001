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
                    <span></span>Modification la catégorie

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
                                        Modifier une catégorie
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.categories') }}" class="btn btn-success float-end" >Tous les catégories</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                               <form wire:submit.prevent="updateCategory">
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Nom</label>
                                        <input type="text" name="name" class="form-control" placeholder="Nom de la catégorie" wire:model="name" wire:keyup="generateSlug">
                                        @error('name')
                                        <p class="text-danger">{{ $message }}</p>

                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">slug</label>
                                        <input type="text" name="slug" readonly class="form-control" placeholder="Nom de la catégorie" wire:model="slug">
                                        @error('slug')
                                        <p class="text-danger">{{ $message }}</p>

                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="slug" class="form-label">Categorie parent</label>

                                        <select class="form-control" wire:model="category_id">
                                            <option value="">Aucun</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id}}">{{ $category->name}}</option>
                                                
                                            @endforeach
                                        </select> 
                                        @error('category_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>


                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label">image</label>
                                        <input type="file" name="image" class="form-control"  wire:model="newimage">
                                        @if ($newimage)
                                            <img src="{{ $newimage->temporaryUrl()}}" width="120" alt="image du produit">
                                        @else
                                            <img src="{{ asset('assets/imgs/marque')}}/{{ $image}}" width="120" alt="image du produit">
                                        @endif
                                        @error('newimage')
                                        <p class="text-danger">{{ $message }}</p>

                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="est_populaire" class="form-label">Poulaire</label>
                                        <select  name="est_populaire" class="form-control" wire:model="est_populaire">
                                            <option value="0">Non</option>
                                            <option value="1">Oui</option>

                                        </select>

                                        @error('est_populaire')
                                        <p class="text-danger">{{ $message }}</p>

                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary float-end">Sauvegarder</button>
                               </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
    </main>
</div>
