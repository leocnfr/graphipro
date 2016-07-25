<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/pdf.css"  type="text/css">

</head>
<body>
<header>
    <div id="left">
        <h2>Graphipro</h2>
        <span>3 rue Baudin <br> 94000 Ivry sur Seine</span>
    </div>
    <div id="right">
        <p>Impression Numérique & Traditionnelle</p>
        <span>Création Graphique,Prépresse & Pao</span>
        <p>Impression Numérique,Offset et Grands Format</p>
        <span>Façonnage & Finition</span>
    </div>

</header>
<div style="width: 100%;clear:both;">
    <div id="client-info" >
        {{Auth::user()->nom}} {{Auth::user()->prenom}} <br>
        {{Auth::user()->address}} <br>
        {{Auth::user()->post}} {{Auth::user()->ville}} <br>
    </div>
</div>
<div id="content" >
    <h2>Facteur : </h2> &nbsp;&nbsp;&nbsp; du {{date('d/m/Y')}}
    <p>Date d'échéance : à la commande</p>
    <table cellspacing="0" cellpadding="10">
        <tr id="table-header">
            <td>Designation</td>
            <td>Quantite</td>
            <td>HT</td>
        </tr>
        <?php $total=0; ?>
        @foreach($orders as $order)
            <?php $total=$total+$order->price?>
            <tr class="table-content">
                <td>
                    <strong>{{$order->product_name}}</strong>
                    <br>
                    {!! $order->content !!}
                </td>
                <td>{{$order->ex}}</td>
                <td>{{number_format($order->price,2)}}</td>
            </tr>
        @endforeach
    </table>

</div>
<div id="footer" >

    <table>
        <tr>
            <td>BASE HT</td>
            <td>TVA</td>
            <td>Montant TTC</td>
            <td>Net a payer</td>
        </tr>
        <tr>
            <td>{{number_format($total,2)}}</td>
            <td>{{number_format($total,2)}}</td>
            <td>{{number_format($total,2)}}</td>
            <td>{{number_format($total,2)}}</td>

        </tr>
    </table>
    <div id="graphipro-info">
        <div id="left">
            Imprimer Graphipro <br>
            1 - 3 rue Baudin 94000 Ivry Sur Seine <br>
            Tel:01 46 70 00 63 - Fax:09 56 09 76 18 <br>
            Email:contact@graphipro.com Site:www.graphiprofr
        </div>

    </div>
</div>
</body>
</html>