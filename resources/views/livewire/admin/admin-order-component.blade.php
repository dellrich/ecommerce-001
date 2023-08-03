<div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }
    </style>

    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Toutes les Commandes

                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>N° Commande</th>
                                    <th>subtotal</th>
                                    <th>Discount</th>
                                    <th>Tax</th>
                                    <th>Total</th>
                                    <th>First name</th>
                                    <th>last name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Code Zip</th>
                                    <th>Status</th>
                                    <th>Date commande</th>
                                    <th colspan="2" class="text-center">Action</th>

                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->subtotal }} €</td>
                                        <td>{{ $order->discount }} €</td>
                                        <td>{{ $order->tax }} €</td>
                                        <td>{{ $order->total }} €</td>
                                        <td>{{ $order->firstname }}</td>
                                        <td>{{ $order->lastname }}</td>
                                        <td>{{ $order->mobile }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->zipcode }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td><a href="{{ route('admin.detailscommandes', ['order_id' => $order->id]) }}"
                                                class="btn btn-info btn-sm">Détails</a></td>
                                        <td>


                                            <style>
                                                /* .dropdown .dropbtn {
                                                    font-size: 16px;
                                                    border: none;
                                                    outline: none;
                                                    color: rgb(255, 255, 255);
                                                    padding: 14px 16px;
                                                    background-color: inherit;
                                                    font-family: inherit;
                                                    margin: 0;
                                                } */

                                                /* .navbar a:hover,
                                                .dropdown:hover .dropbtn {
                                                    background-color: red;
                                                } */

                                                .dropdown-content {
                                                    display: none;
                                                    position: absolute;
                                                    background-color: #f9f9f9;
                                                    min-width: 160px;
                                                    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                                                    z-index: 1;
                                                }

                                                .dropdown-content a {
                                                    float: none;
                                                    color: black;
                                                    padding: 12px 16px;
                                                    text-decoration: none;
                                                    display: block;
                                                    text-align: left;
                                                }

                                                .dropdown-content a:hover {
                                                    background-color: #ddd;
                                                }

                                                .dropdown:hover .dropdown-content {
                                                    display: block;
                                                }
                                            </style>

                                            <div class="dropdown">

                                                <button class="btn btn-success btn-sm dropdown-toggle dropbtn">statut
                                                </button>
                                                <div class="dropdown-content">
                                                    <a href="#" wire:click.prevent="updateOrderStatus({{ $order->id }},'delivered' )">Délivrer</a>
                                                    <a href="#"wire:click.prevent="updateOrderStatus({{ $order->id }},'canceled' )">Annuler</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        {{ $orders->links() }}

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
