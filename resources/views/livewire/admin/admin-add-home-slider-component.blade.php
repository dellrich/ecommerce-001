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
                    <span></span> Ajout  de nouveau slide

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
                                        Ajouter un nouveau slide
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.home.slider') }}" class="btn btn-success float-end" >Tous les slides</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                               <form wire:submit.prevent="addSilde">
                                    <div class="mb-3 mt-3">
                                        <label for="top_titre" class="form-label">top titre</label>
                                        <input type="text" name="top_titre" class="form-control" placeholder="saisir le top titre" wire:model="top_titre" >
                                        @error('top_titre')
                                        <p class="text-danger">{{ $message }}</p>

                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="titre" class="form-label">titre</label>
                                        <input type="text" name="titre" class="form-control" placeholder="saisir le titre" wire:model="titre" >
                                        @error('titre')
                                        <p class="text-danger">{{ $message }}</p>

                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="sous_titre" class="form-label">sous titre</label>
                                        <input type="text" name="sous_titre" class="form-control" placeholder="saisir le sous titre" wire:model="sous_titre" >
                                        @error('sous_titre')
                                        <p class="text-danger">{{ $message }}</p>

                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="offre" class="form-label">offre</label>
                                        <input type="text" name="offre" class="form-control" placeholder="saisir l'offre" wire:model="offre" >
                                        @error('offre')
                                        <p class="text-danger">{{ $message }}</p>

                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="link" class="form-label">liens site / web</label>
                                        <input type="text" name="link" class="form-control" placeholder="saisir liens du site ou la page web" wire:model="link" >
                                        @error('link')
                                        <p class="text-danger">{{ $message }}</p>

                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="status" class="form-label">status</label>
                                        <select class="form-select" wire:model="status">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        @error('status')
                                        <p class="text-danger">{{ $message }}</p>

                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label">image</label>
                                        <input type="file" name="image" class="form-control" placeholder="saisir la quantité" wire:model="image">
                                        @if ($image)
                                            <img src="{{ $image->temporaryUrl()}}" width="120" alt="image du produit">

                                        @endif
                                        @error('image')
                                        <p class="text-danger">{{ $message }}</p>

                                        @enderror
                                    </div>





                                    <button type="submit" class="btn btn-primary float-end">Enregistrer</button>
                               </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
        <x:notify-messages />
    </main>
</div>
