@extends('graphipro.template')
@section('content')
    <div style=" width:1000px; margin:20px auto; min-height:350px;  ">
        <div style="font-size:25px; color:#29ABE2; float:left; width:1000px; ">ESPACE CLIENT<br/>

            <div style="width:270px; float:left;">
                <div style="font-size:14px; color:#666;  margin-top:20px;  position:relative; padding:10px; border:thin ridge #29ABE2; border-radius:3px; width:250px; float:left">

                    <span style="font-size:18px; color:#29ABE2;">
                        {{Auth::guard('web')->user()->prenom}}
                        {{Auth::guard('web')->user()->nom}}
                    </span><br/>
                    <span style="color:#999; font-size:14px;">
                        Date de l'inscription:{{Auth::guard('web')->user()->created_at}}
                    </span><br/>
                    @if(Auth::guard('web')->user()->societe)
                        Société: {{Auth::guard('web')->user()->societe}}<br/>
                    @endif
                    Mail:{{Auth::guard('web')->user()->email}} <br/>
                    Tél:{{Auth::guard('web')->user()->tel}} <br/>
                    Adresse: {{Auth::guard('web')->user()->address}}<br/><br/>
                    {{--<a href="editUser.php?id="><div style=" padding:8px; border-radius:3px; background-color:#29ABE2; color:#FFF; float:left; font-size:18px; ">Modifier</div></a>--}}
                    <a href="{{url('logout')}}"
                       style="cursor: pointer ;padding:8px; border-radius:3px; background-color:#29ABE2; color:#FFF; float:left; margin-left:15px; font-size:18px; ">log
                        out</a>
                </div>
                <div style="font-size:14px; color:#666;  margin-top:20px;  position:relative; padding:10px; border:thin ridge #29ABE2; border-radius:3px; width:250px; float:left">
                    <span style="font-size:18px; color:#29ABE2;">Télécharger votre facture</span><br/><br/>
                    @foreach($bon_commands as $bon)
                        <a href="/pdf/{{$bon}}" style="color:#666; text-decoration:underline;">Facture {{$bon}}</a><br/>
                    @endforeach
                </div>

            </div>

            <div style="float:left; margin-left:20px; width:700px;">
                <div style="font-size:25px; color:#FFF; padding:5px; background-color:#29ABE2; width:690px; margin-top:20px; position:relative; ">
                    TRAVAIL EN COURS
                </div>

                <style type="text/css">
                    td {
                        border: thin ridge #29ABE2;
                    }
                </style>
                <table width="700" style="font-size:14px; color:#666; ">
                    <tr>
                        <td>N° de commande</td>
                        <td>Produits</td>
                        <td>Quantités</td>
                        <td>Etats</td>
                    </tr>
                    @foreach($orders as $order)
                        <tr>
                            <td width="50">{{$order->bon_command_id}}</td>
                            <td width="450"><span style="font-size:18px; color:#29ABE2;">{{$order->product_name}}</span><br/><span
                                        style="color:#29ABE2;">Lancé à {{$order->created_at}}</span><br/>
                                {!! $order->content !!}
                            </td>
                            <td width="100">{{$order->ex}}</td>
                            <td width="100">Lancé</td>
                        </tr>
                    @endforeach

                </table>
                {{$orders->render()}}
            </div>


        </div>
    </div>

@endsection