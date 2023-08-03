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
                    <span></span>  INFORMATION DU SITE

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
                                       INFORMATION DU SITE
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.add_transfert_bank')}}" class="btn btn-success float-end" >Ajouter</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            
                                           
                                           
                                            
                                            <th>Titulaire</th>
                                            <th>IBAN</th>
                                            <th>Rib</th>
                                            <th>Swift</th>
                                            <th>Adresse</th>
                                            
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($transfertbnks as $transfertbnk)


                                            <tr>
                                                <td>#</td>
                                                
                                                

                                                <td>{{ $transfertbnk->nombanque }}</td>
                                                <td>{{ $transfertbnk->IBAN }}</td>
                                                <td>{{ $transfertbnk->RIB }}</td>
                                                <td>{{ $transfertbnk->swift }}</td>
                                              
                                                
                                                <td>{{ $transfertbnk->Adresse }}</td>
                                                
                                                {{-- <td>{{ $transfertbnk->status == 1 ? 'Active' : 'Inactif' }}</td> --}}

                                                <td>
                                                    <a href="{{ route('admin.edit_transfert_bank',['transfert_id'=>$transfertbnk->id]) }}" class="text-info">Edit</a>
                                                    {{-- <a href="#" class="text-danger" onclick="deleteConfirmation({{ $transfertbnk->id }})" style="margin-left:20px;">Supprimer</a> --}}

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
                        <h4 class="pb-3">Voulez vous vraiment supprimé ce infos?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Annuler</button>
                        <button type="button" class="btn btn-danger" onclick="deleteInfoTransfert()">Supprimer</button>

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
            @this.set('transfert_id',id);
            $('#deleteConfirmation').modal('show');
        }

        function deleteInfoTransfert()
        {
            @this.call('deleteInfoTransfert');
            $('#deleteConfirmation').modal('hide');

        }
    </script>



@endpush
