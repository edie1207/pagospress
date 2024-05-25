<!-- resources/views/payment.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago Seguro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Pagar online de forma segura</h2>
    <form action="{{ route('processPayment') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="amount" class="form-label">Monto</label>
            <input type="number" class="form-control" id="amount" name="amount" required>
        </div>
        <div class="mb-3">
            <label for="cardholder_name" class="form-label">Titular de la tarjeta</label>
            <input type="text" class="form-control" id="cardholder_name" name="cardholder_name" required>
        </div>
        <div class="mb-3">
            <label for="card_number" class="form-label">Número de tarjeta</label>
            <input type="text" class="form-control" id="card_number" name="card_number" required>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="expiry_date" class="form-label">Fecha de vencimiento</label>
                <input type="text" class="form-control" id="expiry_date" name="expiry_date" placeholder="MM/AA" required>
            </div>
            <div class="col">
                <label for="cvv" class="form-label">Código de seguridad CVV</label>
                <input type="text" class="form-control" id="cvv" name="cvv" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Pagar</button>
    </form>
</div>
</body>
</html>
