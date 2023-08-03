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
                    <span></span> Modification  des information du site

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
                                        Modifier la banque
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.transfert_bank') }}" class="btn btn-success float-end" >Voir Infos</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                               <form wire:submit.prevent="updatetransfertbnk">
                                <div class="mb-3 mt-3">
                                    <label for="nombanque" class="form-label">Intituler</label>
                                    <input type="text" name="nombanque" class="form-control"
                                        placeholder="saisir le titulaire" wire:model="nombanque">
                                    @error('nombanque')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="RIB" class="form-label">RIB</label>
                                    <input type="text" name="flash_info1" class="form-control"
                                        placeholder="saisir RIB" wire:model="RIB">
                                    @error('RIB')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="IBAN" class="form-label">IBAN</label>
                                    <input type="text" name="IBAN" class="form-control"
                                        placeholder="saisir IBAN" wire:model="IBAN">
                                    @error('IBAN')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="swift" class="form-label">swift</label>
                                    <input type="text" name="swift" class="form-control"
                                        placeholder="saisir swift" wire:model="swift">
                                    @error('swift')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>





                                <div class="mb-3 mt-3">
                                    <label for="link" class="form-label">Adresse</label>
                                    <input type="text" name="Adresse" class="form-control"
                                        placeholder="saisir la localisation" wire:model="Adresse">
                                    @error('Adresse')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                    <button type="submit" class="btn btn-primary float-end">Modifier</button>
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
