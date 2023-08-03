<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    {{-- <title>Facture #{{ $order->id }}</title> --}}
    <title>Merci pour votre commande</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #90bfb5;
            color: #000000;
        }
    </style>
</head>
<body>


    <p>Bonjour  {{ $order->firstname }} {{ $order->firstname }}</p>
    <p>Merci pour votre commande. Elle est en attente jusqu’à ce que nous confirmions que le paiement ait bien été reçu. En attendant, voici un rappel de votre commande :

        Utilisez le numéro de commande comme motif de paiement ou référence de transfert.
        Motif de paiement: Uniquement votre numéro de commande (Ex: 15423)
        Après paiement veuillez envoyer par mail le reçu de paiement au mail et l’article sera expédier à l’adresse indiquée.</p>
    <h3>Retrouver ci-dessous le récapitulatif de la commande</h3>
    <table style="text-align:right">
        <thead>

            <tr class="bg-blue">

                <th>Produit</th>
                <th>Désignation</th>

                <th>Quantité</th>
                <th>Prix</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalPrice = 0;
            @endphp
            @foreach ($order->orderItems as $item)
                <tr>
                    <td class="image product-thumbnail"><img src="{{ asset('assets/imgs/products')}}/{{ $item->product->image}}" alt="" width="65px" height="65px"></td>
                    <td width="15%" height="10%" class="product-name">{{ $item->product->name }}</td>
                    <td width="15%" height="10%" class="product-quantity">{{ $item->quantity }}</td>
                    <td width="15%" height="10%" class="product-price"><span class="amount">{{ $item->price }}</span></td>

                    <td width="15%" height="10%" class="product-subtotal"><span style="font-weight: bold" class="amount">{{ $item->quantity * $item->price }}€</span></td>
                    @php
                        $totalPrice += $item->quantity * $item->price;
                    @endphp
                </tr>
                @endforeach

                <tr>
                    <td colspan="4" style="border-top:1px solid #ccc;">Sous-total :</td>
                    <td style="font-size:15px;font-weight:blod;border-top:1px solid #ccc;"> €{{ $order->subtotal }}</td>
                </tr>
                <tr>
                    <td colspan="4">Tax :</td>
                    <td style="font-size:15px;font-weight:blod;"> €{{ $order->tax }}</td>
                </tr>
                <tr>
                    <td colspan="4">Expédition</td>
                    <td style="font-size:15px;font-weight:blod;">: Livraison gratuite</td>
                </tr>
                <tr>
                    <td colspan="4">Total :</td>
                    <td style="font-size:15px;font-weight:blod;"> €{{ $order->total }}</td>
                </tr>


        </tbody>
    </table>

    <br>
    <p class="text-center">
        Nous comptons exécuter votre commande sous peu.
    </p>

</body>
</html>
