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
                    <span></span> Modification  d'attribut

                </div>
            </div>
        </div>
        {{-- <x:notify-messages /> --}}

        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        Modifier un attribut
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.attributes') }}" class="btn btn-success float-end">Tout
                                            les attributs</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form wire:submit.prevent="updateAttribute">
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Nom</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Nom de l'attribue" wire:model="name">
                                        @error('name')
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
    </main>
</div>
