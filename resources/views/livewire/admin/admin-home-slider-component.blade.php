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
                    <span></span> Tout les slides

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
                                        Liste des slides
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.home.slide.add')}}" class="btn btn-success float-end" >Ajouter un slides</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>image</th>
                                            <th>top_titre</th>
                                            <th>titre</th>
                                            <th>sous_titre</th>
                                            <th>offre</th>
                                            <th>link</th>
                                            <th>status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i =0;
                                        @endphp
                                        @foreach ($slides as $slide)
                                            <tr>
                                                <td>{{ ++$i}}</td>
                                                <td><img src="{{ asset('assets/imgs/slider')}}/{{ $slide->image}}" width="80" alt=""></td>
                                                <td>{{ $slide->top_titre }}</td>
                                                <td>{{ $slide->titre }}</td>
                                                <td>{{ $slide->sous_titre }}</td>
                                                <td>{{ $slide->offre }}</td>
                                                <td>{{ $slide->link }}</td>
                                                <td>{{ $slide->status == 1 ? 'Active' : 'Inactif' }}</td>

                                                <td>
                                                    <a href="{{ route('admin.home.slide.edit',['slide_id'=>$slide->id]) }}" class="text-info">Edit</a>
                                                    <a href="#" class="text-danger" onclick="deleteConfirmation({{ $slide->id }})" style="margin-left:20px;">Supprimer</a>

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
                        <h4 class="pb-3">Voulez vous vraiment supprimé ce Slide?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Annuler</button>
                        <button type="button" class="btn btn-danger" onclick="deleteSlide()">Supprimer</button>

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
            @this.set('slide_id',id);
            $('#deleteConfirmation').modal('show');
        }

        function deleteSlide()
        {
            @this.call('deleteSlide');
            $('#deleteConfirmation').modal('hide');

        }
    </script>



@endpush
