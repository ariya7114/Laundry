<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Struk Transaksi</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        h2 { text-align: center; }
        .section { margin: 20px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 6px 10px; border: 1px solid #999; text-align: left; }
    </style>
</head>
<body>

    <h2>Struk Transaksi Laundry</h2>

    <div class="section">
        <strong>Tanggal:</strong> {{ $transaksi->created_at->format('d-m-Y H:i') }}<br>
        <strong>ID Transaksi:</strong> #{{ $transaksi->id }}<br>
        <strong>Kasir:</strong> {{ $transaksi->kasir->name }}
    </div>

    <table>
        <tr>
            <th>Jenis Jasa</th>
            <td>{{ ucfirst($transaksi->jenis_jasa) }}</td>
        </tr>
        <tr>
            <th>Berat (Kg)</th>
            <td>{{ $transaksi->berat }}</td>
        </tr>
        <tr>
            <th>Total Harga</th>
            <td>Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Metode Pembayaran</th>
            <td>{{ ucfirst($transaksi->metode_pembayaran) }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ ucfirst($transaksi->status) }}</td>
        </tr>
    </table>

    <p style="margin-top: 30px; text-align: center;">Terima kasih telah menggunakan layanan kami!</p>

</body>
</html>
