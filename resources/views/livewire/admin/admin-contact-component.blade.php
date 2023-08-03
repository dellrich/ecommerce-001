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
                    <span></span> Messages des contactes

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
                                        Liste des messages
                                    </div>
                                    <div class="col-md-6">
                                        {{-- <a href="{{ route('admin.addcontacts') }}" class="btn btn-success float-end" >Ajouter un contacts</a> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>sujet</th>
                                            <th>Message</th>
                                            <th>Date de reception</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i= 1;
                                        @endphp

                                        @foreach ($contactnous as $contacts)
                                            <tr>
                                                <td>{{ $i++}}</td>

                                                <td>{{ $contacts->name }}</td>
                                                <td>{{ $contacts->email }}</td>
                                                <td>{{ $contacts->phone }}</td>
                                                <td>{{ $contacts->subject }}</td>
                                                <td>{{ $contacts->comment }}</td>


                                                <td>{{ $contacts->created_at }}</td>

                                            </tr>

                                        @endforeach
                                    </tbody>

                                </table>
                                {{ $contactnous->links() }}

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
    </main>
</div>
