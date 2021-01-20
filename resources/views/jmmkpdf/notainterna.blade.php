<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>NOTIC-PDF</title>
        <style type="text/css">

            body{
                font-size: 14px;
                margin-left: 30px;
                margin-right: 65px;
                margin-top: 90px;
            }
        </style>
    </head>
    <body>
        <table border="0" align="center">
            <tr>
                <td colspan="2">La Paz, {{$resume['fecha']}}</td>
            </tr>
            <tr>
                <td colspan="2"><br></td>
            </tr>
            <tr>
                <td colspan="2">UMSA.FHCE.{{$datos->unidad}} N° 0{{$doc->correlativo}}/{{$resume['year']}}</td>
            </tr>
            <tr>
                <td colspan="2" align="right"><?php $qr='qr/'.$resume['qr'];?><img src="{{asset($qr)}}" width="100px" height="100px"></td>
            </tr>

            <tr>
                <td width="5">A: </td><td width="390px">{{$doc->A}}</td>
            </tr>
            <tr>
                <td width="5"></td><td td width="390px"><strong>{{$doc->cargo}}</strong></td>
            </tr>
            <tr>
                <td colspan="2"><br></td>
            </tr>
            
            <tr>
                <td >De: </td><td>{{$de->abreviado}} {{$de->nombre}} {{$de->ap_paterno}} {{$de->ap_materno}}</td>
            </tr>
            <tr>
                <td ></td><td><strong>{{strtoupper($de->cargo)}}</strong></td>
            </tr>
            <tr>
                <td colspan="2"><br></td>
            </tr>

            <tr>
                <td >Ref.: </td><td><strong><u>{{strtoupper($doc->ref)}}</u></strong></td>
            </tr>
            <tr>
                <td colspan="2"><br><u>Presente.-</u><br></td>
            </tr>
            <tr>
                <td colspan="2"><br>De mi mayor consideración:<br></td>
            </tr>

            <tr>
                <td colspan="2"><br><font style="text-align: justify;">
                <?php echo($doc->cuerpo);?></font><br><br></td>
            </tr>
        </table>
        @if($doc->cad!=2)
        <table border="0" align="center">

            <tr>
                <td colspan="2">Con este particular motivo saludo a usted con las consideraciones más distinguidas.<br></td>
            </tr>
            <tr>
                <td colspan="2"><br><br><br><br></td>
            </tr>

            <tr>
                @if($doc->cad==0)
                <td colspan="2" style="text-align: center;">{{$de->abreviado}} {{$de->nombre}} {{$de->ap_paterno}} {{$de->ap_materno}}</td>
                @endif

                @if($doc->cad==1)
                    <td style="text-align: center;">{{$de->abreviado}} {{$de->nombre}} {{$de->ap_paterno}} {{$de->ap_materno}}</td>
                    <td style="text-align: center;">{{$vobo->abreviado}} {{$vobo->nombre}} {{$vobo->ap_paterno}} {{$vobo->ap_materno}}</td>
                @endif
            </tr>
            <tr>
                @if($doc->cad==0)
                    <td colspan="2" style="text-align: center;">{{$de->cargo}} <br>Facultad de Humanidades y Ciencias de la Educación UMSA
                    <br> En: {{$doc->enotic}}</td>
                @endif

                @if($doc->cad==1)
                    <td style="text-align: center;">{{$de->cargo}} <br>Facultad de Humanidades y Ciencias de la Educación UMSA
                    <br> En: {{$doc->enotic}}
                    </td>
                    <td style="text-align: center;">{{$vobo->tipo}} <br>Facultad de Humanidades y Ciencias de la Educación UMSA
                    <br> Vo.Bo.
                    </td>
                @endif
            </tr>
        </table>
        @endif
    </body>
</html>