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
                    <span></span> Tout les marques

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
                                        Liste des marques
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.marque.add')}}" class="btn btn-success float-end" >Ajouter un marques</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>image</th>
                                            <th>nom</th>

                                            <th>link</th>
                                            <th>status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i =0;
                                        @endphp
                                        @foreach ($marques as $marque)
                                            <tr>
                                                <td>{{ ++$i}}</td>
                                                <td><img src="{{ asset('assets/imgs/marque')}}/{{ $marque->image}}" width="80" alt=""></td>
                                                <td>{{ $marque->nom }}</td>
                                             
                                                <td>{{ $marque->link }}</td>
                                                <td>{{ $marque->status == 1 ? 'Active' : 'Inactif' }}</td>

                                                <td>
                                                    <a href="{{ route('admin.marque.edit',['marque_id'=>$marque->id]) }}" class="text-info">Edit</a>
                                                    <a href="#" class="text-danger" onclick="deleteConfirmation({{ $marque->id }})" style="margin-left:20px;">Supprimer</a>

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
                        <h4 class="pb-3">Voulez vous vraiment supprimé ce Marque?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Annuler</button>
                        <button type="button" class="btn btn-danger" onclick="deleteMarque()">Supprimer</button>

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
            @this.set('marque_id',id);
            $('#deleteConfirmation').modal('show');
        }

        function deleteMarque()
        {
            @this.call('deleteMarque');
            $('#deleteConfirmation').modal('hide');

        }
    </script>



@endpush
