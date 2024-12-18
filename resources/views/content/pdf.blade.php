
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teklif Detayları</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
        }
        .offer-details, .stock-details {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .offer-details th, .offer-details td, .stock-details th, .stock-details td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .offer-details th, .stock-details th {
            background-color: #f2f2f2;
        }
        .stock-images img {
            max-width: 300px;
            max-height: 300px;
            margin-bottom: 15px;
        }
        .stock-section {
            margin-bottom: 30px;
        }
        .stock-section h3 {
            margin-top: 0;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>Teklif Numarası: {{ $offer->receiptNo }}</h2>
        <p>Tarih: {{ $offer->date }}</p>
        <p>Belge Numarası: {{ $offer->documentNo }}</p>
        <p>Müşteri: {{ $offer->authorizedCustomer }}</p>
        <p>Açıklama: {{ $offer->description1 }}</p>
    </div>

    <!-- Stok Resimleri ve Açıklamaları -->
    @foreach ($offer->details as $detail)
        <div class="stock-section">
            <h3>{{ $detail->stock->name }}</h3>

            <!-- Stok Özelliklerini Göster -->
            <table class="stock-details">
                <tr>
                    <th>Stok Kodu</th>
                    <td>{{ $detail->stock->stockCode }}</td>
                </tr>
                <tr>
                    <th>Stok Açıklaması</th>
                    <td>{{ $detail->stock->description }}</td>
                </tr>
                <tr>
                    <th>Miktar</th>
                    <td>{{ $detail->quantity }}</td>
                </tr>
                <tr>
                    <th>Fiyat</th>
                    <td>{{ $detail->price }}</td>
                </tr>
                <tr>
                    <th>Toplam</th>
                    <td>{{ $detail->quantity * $detail->price }}</td>
                </tr>
            </table>

            <!-- Resimler -->
            <h4>Stok Resimleri</h4>
            <div class="stock-images">
                @foreach ($detail->stock->images as $image)
                    <img src="{{ public_path($image->path) }}" alt="Stok Resmi">
                @endforeach
            </div>
        </div>
    @endforeach

</body>
</html>

