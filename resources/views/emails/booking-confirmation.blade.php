<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подтверждение бронирования</title>
</head>
<body>
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px;">
        <h1>Подтверждение бронирования</h1>
        <p>Здравствуйте, {{ $booking->client_first_name }}!</p>
        <p>Ваше бронирование было успешно оформлено.</p>
        <p>Детали бронирования:</p>
        <ul>
            <li>Дата заезда: {{ $booking->check_in_date }}</li>
            <li>Дата выезда: {{ $booking->check_out_date }}</li>
            <li>Имя: {{ $booking->client_first_name }}</li>
            <li>Фамилия: {{ $booking->client_last_name }}</li>
            <li>Количество гостей: {{ $booking->client_guests_count }}</li>
            <li>Статус: {{ $booking->status }}</li>
        </ul>
        <p>Спасибо за выбор нашего отеля!</p>
    </div>
</body>
</html>
