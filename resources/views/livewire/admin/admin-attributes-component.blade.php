<div>
    <style>
        /* pagination formatage du bas de page pour les numero et le suivante et precedent */

               nav svg {
                   height: 20px;
               }

               nav .hidden {
                   display: block;
               }
               .sclist{
                list-style: none;
               }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Accueil</a>
                    <span></span> Tout les attribues

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
                                        Liste des attributs
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.add_attributes') }}" class="btn btn-success float-end" >Ajouter un attribue </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nom</th>
                                            <th>Date</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i =0;
                                        @endphp
                                        @foreach ($pattributes as $pattribute)
                                            <tr>
                                                <td>{{ ++$i}}</td>

                                                <td>{{ $pattribute->name }}</td>
                                                <td>{{ $pattribute->created_at }}</td>

                                                <td>
                                                    <a href="{{ route('admin.edit_attributes',['attribute_id'=>$pattribute->id]) }}" class="text-info"> Edit</a>
                                                    <a href="#" class="text-danger" onclick="deleteConfirmation({{ $pattribute->id }})" style="margin-left:20px;">Supprimer</a>

                                                </td>
                                            </tr>

                                        @endforeach
                                    </tbody>

                                </table>
                                {{ $pattributes->links() }}
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
                        <h4 class="pb-3">Voulez vous vraiment supprimé ?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Annuler</button>
                        <button type="button" class="btn btn-danger" onclick="deleteAttribu()">Supprimer</button>

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
            @this.set('attribute_id',id);
            $('#deleteConfirmation').modal('show');
        }

        function deleteAttribu()
        {
            @this.call('deleteAttribu');
            $('#deleteConfirmation').modal('hide');

        }
    </script>

@endpush
