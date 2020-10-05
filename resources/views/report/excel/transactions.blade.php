<table>
    <tr>
        <td>ID</td>
        <td>Nomor</td>
        <td>Payment ID</td>
        <td>Customer</td>
        <td>Jenis Order</td>
        <td>Bayar</td>
        <td>Kembali</td>
        <td>Paid Status</td>
    </tr>
    @foreach ($transactions as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nomor_id }}</td>
            <td>{{ $item->payment_id }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->jenis }}</td>
            <td>{{ $item->bayar }}</td>
            <td>{{ $item->kembali }}</td>
            <td>{!! $item->paid_status !!}</td>
        </tr>
    @endforeach
</table>
