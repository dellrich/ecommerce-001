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
                    <span></span> Tout les coupons

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
                                        Liste des coupons
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.addcoupon') }}" class="btn btn-success float-end" >Ajouter un coupon</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Code coupon</th>
                                            <th>Type coupon</th>
                                            <th>Valeur coupon</th>
                                            <th>Valeur du panier</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($coupons as $coupon)
                                            <tr>
                                                <td>{{ $coupon->id}}</td>

                                                <td>{{ $coupon->code }}</td>
                                                <td>{{ $coupon->type }}</td>
                                                @if ($coupon->type =='taux')
                                                <td>{{ $coupon->value }} €</td>
                                                @else
                                                <td>{{ $coupon->value }} %</td>
                                                @endif

                                                <td>{{ $coupon->cart_value }}</td>

                                                <td>
                                                    <a href="{{ route('admin.editcoupon',['coupon_id'=>$coupon->id]) }}" class="text-info">Edit</a>
                                                    <a href="#" class="text-danger" onclick="deleteConfirmation({{ $coupon->id }})" style="margin-left:20px;">Supprimer</a>

                                                </td>
                                            </tr>

                                        @endforeach
                                    </tbody>

                                </table>
                             
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
                        <h4 class="pb-3">Voulez vous vraiment supprimé le Coupon ?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Annuler</button>
                        <button type="button" class="btn btn-danger" onclick="deletecoupon()">Supprimer</button>

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
            @this.set('coupon_id',id);
            $('#deleteConfirmation').modal('show');
        }

        function deletecoupon()
        {
            @this.call('deletecoupon');
            $('#deleteConfirmation').modal('hide');

        }
    </script>



@endpush
