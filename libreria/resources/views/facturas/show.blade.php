<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous"> -->
<img src="{{asset('images/site-logo.png') }}" style="width:130px;">

<div style="background: #c18f59; margin-left: 550px;">
    <div style=" margin-top: 10px; width: 220px;">
        <strong>Factura Nº</strong>
        <strong>00000{{$facturas->fac_numero}} </strong>
        <strong >Fecha:</strong>
        <strong >{{$facturas->fac_fecha}} </strong>
    </div>
    <!-- <div style="margin-top: 10px; width: 200px;">
    </div> -->
    
</div>
<strong>{{$facturas->li_nombre_libreria}} </strong><br>
<strong>Direccion: {{$facturas->li_ubicacion}} </strong><br>
<strong>Telefono: {{$facturas->li_telefono}} </strong><br>
<strong>Correo: {{$facturas->li_correo}} </strong><br>
<strong>Sitio Web: {{$facturas->li_sitio_web}} </strong><br>

<div>
    <div style="background: #c18f59;margin-top: 10px; width: 300px;text-align: center;">
        <strong>Facturar A</strong>
    </div>
    <div style="margin-top: 10px; width: 300px;">
        <strong>Cliente:</strong>
        <strong>{{$facturas->name}} </strong>
    </div>
    <div style="margin-top: 10px; width: 300px;">
        <strong>Cedula:</strong>
        <strong>{{$facturas->clie_cedula}} </strong>
    </div>
    <div style="margin-top: 10px; width: 300px;">
        <strong>Direccion:</strong>
        <strong>{{$facturas->clie_direccion}} </strong>
    </div>
    <div style="margin-top: 10px; width: 300px;">
        <strong>Telefono:</strong>
        <strong>{{$facturas->clie_telefono}} </strong>
    </div>
</div>








<table  style="margin-top: 20px;width: 100%; border-style: solid; border-color:  #c18f59:   ">
    <tr style="background: #c18f59;" >
        <th>Nº</th>
        <th>Cantidad</th>
        <th>Descripcion</th>
        <th>Valor Inicial</th>
        <th>Total</th>
    </tr>
    <?php $subt=0; $total=0 ?>
    @foreach($detalle as $dt)
        <tr>
            <?php $subt=$subt+($dt->fade_cant*$dt->fade_vu)?>
            <td>{{$loop->iteration}} </td>
            <td>{{$dt->fade_cant}} </td>
            <td>{{$dt->lib_nombres_libros}} </td>
            <td style="text-align: right;">{{number_format($dt->fade_vu,2)}}$ </td>
            <td style="text-align: right;">{{number_format($dt->fade_vu*$dt->fade_cant,2)}}$ </td>
        </tr>
    @endforeach
    <?php
$fac_descuento=$facturas->fac_descuento;
$iva=($subt-$fac_descuento)*0.12;
$total=($subt-$fac_descuento+$iva);
?>

<tfoot>
  <tr>
    <th colspan="3"></th>
    <th style="text-align:right;">Subtotal</th>
    <th style="text-align:right;">{{number_format($dt->fade_vu*$dt->fade_cant,2)}}</th>
  </tr>
  
<tr>  
    <th colspan="3"></th>
    <th style="text-align:right;">Descuento 
         <th style="text-align:right;">{{($facturas->fac_descuento)}}</th>
    </th>
</tr>
  <tr>  
    <th colspan="3"></th>
    <th style="text-align:right;">Iva  
         <th style="text-align:right;">{{($facturas->fac_iva)}}</th>
    </th>
</tr>
  <tr>
    <th colspan="3"></th>
    <th style="text-align:right;">Total</th>
    <th style="text-align:right;">{{number_format($total,2) }}</th>
  </tr>
</tfoot>

</table>