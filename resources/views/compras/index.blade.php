<h2>Historial de Compras</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Evento</th>
        <th>Localidad</th>
        <th>Cantidad</th>
        <th>Valor Total</th>
        <th>Estado</th>
        <th>Fecha</th>
    </tr>
    @foreach($compras as $compra)
    <tr>
        <td>{{ $compra->id }}</td>
        <td>{{ $compra->boleta->evento->nombre }}</td>
        <td>{{ $compra->boleta->localidad->nombre }}</td>
        <td>{{ $compra->cantidad }}</td>
        <td>{{ $compra->valor_total }}</td>
        <td>{{ $compra->estado }}</td>
        <td>{{ $compra->created_at }}</td>
    </tr>
    @endforeach
</table>
