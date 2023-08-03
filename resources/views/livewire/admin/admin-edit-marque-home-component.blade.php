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
                    <span></span> Ajout  de nouveau marque

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
                                       Modifier une nouvelle marque
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.marque') }}" class="btn btn-success float-end" >Toute les marques</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                               <form wire:submit.prevent="updateMarque">
                                    <div class="mb-3 mt-3">
                                        <label for="nom" class="form-label">Nom</label>
                                        <input type="text" name="nom" class="form-control" placeholder="saisir le nom" wire:model="nom" >
                                        @error('nom')
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
                                        <input type="file" name="image" class="form-control" placeholder="saisir la quantité" wire:model="newimage">
                                        @if ($newimage)
                                            <img src="{{ $newimage->temporaryUrl()}}" width="120" alt="image du produit">
                                        @else
                                            <img src="{{ asset('assets/imgs/marque')}}/{{ $image}}" width="120" alt="image du produit">
                                        @endif
                                        @error('newimage')
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
        <x:notify-messages />
    </main>
</div>
