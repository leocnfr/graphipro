<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="/css/pdf.css" media="print">
    <style>

        #left,#right{
            height: 80px;
        }
        #left h2{
            color: #29ABE2;
            line-height: 1px;
        }
        #left {
                width: 145px;
                float: left;
                border-right: 2px solid black;

            }
            #right{
                position: relative;
                float: left;
                font-size: 14px;
                margin-left: 8px;
                line-height: 3px;
            }
        #client-info{
            position: relative;
            float: right;
            width: 270px;
            font-size: 16px;
            margin-top: 30px;
        }
        #content{
            clear: both;
            padding-top: 20px;
        }
        #content h2{
            display: inline;
        }
        table{
            width: 100%;
        }
        #table-header > td{
            border-top: 1px solid;
            border-bottom: 1px solid;
        }
        .table-content > td {
            vertical-align: text-top;
            font-size: 14px;
        }
        #footer{
            bottom: 10px;
            position: absolute;
        }
        #graphipro-info{
            font-size: 12px;
        }
        #footer table tr td{
            border: 1px solid black;
            text-align: center;
        }
    </style>
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
    <h2>Bon de Commande : </h2> &nbsp;&nbsp;&nbsp; du {{date('d/m/Y')}}
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
                <td>{{$order->price}}</td>
            </tr>
        @endforeach
    </table>

</div>
<div id="footer">
    <table >
        <tr>
            <td>BASE HT</td>
            <td>TVA</td>
            <td>Montant TTC</td>
            <td>Net a payer</td>
        </tr>
        <tr>
            <td>{{$total}}</td>
            <td>{{$total}}</td>
            <td>{{$total}}</td>
            <td>{{$total}}</td>

        </tr>
    </table>
    <div id="graphipro-info">
        <div>
            Imprimer Graphipro <br>
            1 - 3 rue Baudin 94000 Ivry Sur Seine <br>
            Tel:01 46 70 00 63 - Fax:09 56 09 76 18 <br>
            Email:contact@graphipro.com Site:www.graphiprofr
        </div>
       <div>

       </div>

    </div>
</div>
</body>
</html>