<table width="1000" border="0">

    <tr>
        <td valign="top" width="450">
            <div style="font-size:20px; color:#29ABE2; margin-top:20px;">1. Choisir les options d'impression</div>
            <br/>
            <div style="padding:10px; width:400px; border-radius:3px; background-color:#F2F2F2; line-height:20px;color:#29ABE2">
                Format: <br>
                <input id="name" value="" type="hidden"/>
                <select id="formate" style="width:220px;" name="formate">

                </select>
                <br/>
                <span>Papier:</span>
                <br/>
                <select id="papier" style="width:220px;" name="papier">
                </select>
                <br/>


                <span>Imprimer:</span><br>

                <select id="imprimer" style="width:220px;" name="imprimer">
                    <option value="">test</option>
                </select>
                <div id="pel" style="display: none">
                    <span>Pelliculage:</span>
                    <br/>
                    <select id="pelliculage" style="width:220px;" name="pelliculage">
                        <option value="">test</option>
                    </select>
                    <br/>
                </div>
                <br>
                <span>Création:</span> <br>
                <select name="jumpMenu" id="jumpMenu" style="width:220px;">
                    <option>Fournir par client</option>
                    <option>Recto seule +30€</option>
                    <option>Recto verso +50€</option>

                </select>
                <br/>
                <span>Autre option:</span>

                <table width="200">
                    <tr>
                        <td><label>
                                <input type="checkbox" name="CheckboxGroup1" value="Vernis selective"
                                       id="CheckboxGroup1_0"/>
                                Vernis selectif</label></td>

                        <td><label>
                                <input type="checkbox" name="CheckboxGroup1" value="Coins rond" id="CheckboxGroup1_1"/>
                                Coins rond</label></td>
                    </tr>
                </table>
                <input type="hidden" value="" name="price" id="price"/>
                <input type="hidden" value="" name="id"/>
                <input type="hidden" value="" name="pname"/>
            </div>

            <div style="font-size:20px; color:#29ABE2; margin-top:20px;">2. Option de livraison</div>
            <br/>
            <div style="padding:10px; width:400px; border-radius:3px; background-color:#F2F2F2;">
                Choix le moyen de livraison:
                <select name="jumpMenu" id="jumpMenu" style="width:220px;">
                    <option>Récupérer au bureau Graphipro</option>
                    <option>Livraison chez vous J+3</option>
                    <option>Livraison chez vous par UPS J+2</option>
                </select>

            </div>


        </td>
        <td valign="top" style="padding-left:30px">
            <div style="width:600px; margin-top:15px; float:left; ">

                <div style="font-size:20px; color:#29ABE2; ">3. Choisir un délais</div>
                <br/>

                <table width="460" border="0" style="margin-top:10px; margin-left:42px; ">
                    <tr>

                        <td align="right">
                            <div
                                    style="border:thin ridge #29ABE2; border-radius:3px; padding:10px; font-size:13px; width:125px; height:20px; position:relative; color:#666">
                                <div
                                        style="position:absolute; width:147px; height:20px; background-color:#29ABE2; top:-18px; left:-1px;"></div>
                                <center><span id="day1">Délai Rush 24h</span><br/>
                            </div>
                        </td>
                        <td align="right">
                            <div
                                    style="border:thin ridge #29ABE2; border-radius:3px; padding:10px; font-size:13px; width:125px; height:20px; position:relative;  color:#666">
                                <div
                                        style="position:absolute; width:147px; height:20px; background-color:#29ABE2; top:-18px; left:-1px;"></div>
                                <center><span id="day2">Délai Express 48h à 72h</span><br/>
                            </div>
                        </td>
                        <td align="right">
                            <div
                                    style="border:thin ridge #29ABE2; border-radius:3px; padding:10px; font-size:13px; width:125px; height:20px; position:relative;   color:#666">
                                <div
                                        style="position:absolute; width:147px; height:20px; background-color:#29ABE2; top:-18px; left:-1px;"></div>
                                <center><span id="day3">Délai Normal 5J</span><br/>
                            </div>
                        </td>
                    </tr>
                </table>
                <table id="table" width="500" border="0" style=" color:#666 ">
                    <tbody id="result">

                    </tbody>
                </table>
            </div>
        </td>
    </tr>
</table>
<script src="/js/pro1.js"></script>
