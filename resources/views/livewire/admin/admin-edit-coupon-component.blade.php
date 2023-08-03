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
                    <span></span> Modification  d'un coupon

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
                                        Modifier un coupon
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.coupons') }}" class="btn btn-success float-end" >Tous les coupon</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                               <form wire:submit.prevent="updateCoupon">
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Code coupon</label>
                                        <input type="text" name="code" class="form-control" placeholder="code coupon" wire:model="code">
                                        @error('code')
                                        <p class="text-danger">{{ $message }}</p>

                                        @enderror
                                    </div>


                                    <div class="mb-3 mt-3">
                                        <label for="type" class="form-label">Tpe de coupon</label>
                                        <select  name="type" class="form-control" wire:model="type">
                                            <option value="fixe">Selectionnez</option>
                                            <option value="fixe">Fixé</option>
                                            <option value="pourcentage">pourcentage</option>

                                        </select>

                                        @error('type')
                                        <p class="text-danger">{{ $message }}</p>

                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="value" class="form-label">Valeur coupon</label>
                                        <input type="text" name="value" class="form-control" placeholder="Valeur coupon" wire:model="value">
                                        @error('value')
                                        <p class="text-danger">{{ $message }}</p>

                                        @enderror
                                    </div>


                                    <div class="mb-3 mt-3">
                                        <label for="cart_value" class="form-label">Valeur panier</label>
                                        <input type="text" name="cart_value" class="form-control" placeholder="Valeur panier" wire:model="cart_value">
                                        @error('cart_value')
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
