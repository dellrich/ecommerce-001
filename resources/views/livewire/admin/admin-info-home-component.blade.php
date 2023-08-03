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
                                    {{-- <div class="col-md-6">
                                        <a href="{{ route('admin.info_home.add')}}" class="btn btn-success float-end" >Ajouter un infos</a>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>logo</th>

                                            <th>flash info1 promo</th>
                                            <th>flash info2 promo</th>
                                            <th>flash info3 promo</th>
                                            <th>link</th>
                                            <th>Telephone</th>
                                            <th>localisation</th>
                                            <th>link_facebook</th>
                                            <th>link_twitter</th>
                                            <th>link_instagram</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($infos as $info)


                                            <tr>
                                                <td>#</td>
                                                <td><img src="{{ asset('assets/imgs/logo')}}/{{ $info->logo_image}}" width="80" alt=""></td>
                                                <td>{{ $info->flash_info1 }}</td>
                                                <td>{{ $info->flash_info2 }}</td>
                                                <td>{{ $info->flash_info3 }}</td>

                                                <td>{{ $info->link }}</td>
                                                <td>{{ $info->telephone }}</td>
                                                <td>{{ $info->address }}</td>
                                                <td>{{ $info->link_facebook }}</td>
                                                <td>{{ $info->twitter }}</td>
                                                <td>{{ $info->link_instagram }}</td>
                                                {{-- <td>{{ $info->status == 1 ? 'Active' : 'Inactif' }}</td> --}}

                                                <td>
                                                    <a href="{{ route('admin.info_home.edit',['info_id'=>$info->id]) }}" class="text-info">Edit</a>
                                                    {{-- <a href="#" class="text-danger" onclick="deleteConfirmation({{ $info->id }})" style="margin-left:20px;">Supprimer</a> --}}

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
                        <button type="button" class="btn btn-danger" onclick="deleteInfo()">Supprimer</button>

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
            @this.set('info_id',id);
            $('#deleteConfirmation').modal('show');
        }

        function deleteInfo()
        {
            @this.call('deleteInfo');
            $('#deleteConfirmation').modal('hide');

        }
    </script>



@endpush
