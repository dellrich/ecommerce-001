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
                    <span></span> Ajout  des information du site

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
                                        Information de site siteweb
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.info_home') }}" class="btn btn-success float-end" >Voir Infos</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                               <form wire:submit.prevent="updateInfo">
                                    <div class="mb-3 mt-3">
                                        <label for="flash_info1" class="form-label">flash_info1</label>
                                        <input type="text" name="flash_info1" class="form-control" placeholder="saisir info promo 1" wire:model="flash_info1" >
                                        @error('flash_info1')
                                        <p class="text-danger">{{ $message }}</p>

                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="flash_info2" class="form-label">flash_info2</label>
                                        <input type="text" name="flash_info1" class="form-control" placeholder="saisir info promo 2" wire:model="flash_info2" >
                                        @error('flash_info2')
                                        <p class="text-danger">{{ $message }}</p>

                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="flash_info3" class="form-label">flash_info3</label>
                                        <input type="text" name="flash_info3" class="form-control" placeholder="saisir info promo 3" wire:model="flash_info3" >
                                        @error('flash_info3')
                                        <p class="text-danger">{{ $message }}</p>

                                        @enderror
                                    </div>




                                    <div class="mb-3 mt-3">
                                        <label for="link" class="form-label">Email</label>
                                        <input type="text" name="link" class="form-control" placeholder="saisir le mail pro" wire:model="link" >
                                        @error('link')
                                        <p class="text-danger">{{ $message }}</p>

                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="link" class="form-label">adresse</label>
                                        <input type="text" name="address" class="form-control" placeholder="saisir la localisation" wire:model="address" >
                                        @error('address')
                                        <p class="text-danger">{{ $message }}</p>

                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="link_facebook" class="form-label">liens facebook</label>
                                        <input type="text" name="link_facebook" class="form-control" placeholder="saisir liens facebook" wire:model="link_facebook" >
                                        @error('link_facebook')
                                        <p class="text-danger">{{ $message }}</p>

                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="link_facebook" class="form-label">liens twitter</label>
                                        <input type="twitter" name="twitter" class="form-control" placeholder="saisir liens twitter" wire:model="twitter" >
                                        @error('twitter')
                                        <p class="text-danger">{{ $message }}</p>

                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="link_instagram" class="form-label">liens instagram</label>
                                        <input type="text" name="link_instagram" class="form-control" placeholder="saisir liens facebook" wire:model="link_instagram" >
                                        @error('link_instagram')
                                        <p class="text-danger">{{ $message }}</p>

                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="telephone" class="form-label">telephone</label>
                                        <input type="number" name="telephone" class="form-control" placeholder="saisir liens facebook" wire:model="telephone" >
                                        @error('telephone')
                                        <p class="text-danger">{{ $message }}</p>

                                        @enderror
                                    </div>


                                    <div class="mb-3 mt-3">
                                        <label for="logo_image" class="form-label">Logo</label>
                                        <input type="file" name="logo_image" class="form-control" placeholder="saisir la quantité" wire:model="newimage">
                                        @if ($newimage)
                                        <img src="{{ $newimage->temporaryUrl()}}" width="120" alt="image du produit">
                                            @else
                                                <img src="{{ asset('assets/imgs/logo')}}/{{ $logo_image}}" width="120" alt="image du produit">
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
