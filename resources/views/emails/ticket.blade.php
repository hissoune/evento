<!DOCTYPE html>
<html>
<head>
    <title>ticket for {{ $item->Events->title }}</title>
</head>
<body>
    <p>Hello {{ $user->name }},</p>

    <p>We are writing to inform you that your ticket is created successfully:</p>

    <ul>
        <li><strong>description:</strong> {{ $item->Events->description }}</li>
        <li><strong>reservated at :</strong> {{ $item->created_at }}</li>
        <li><strong>start date:</strong> {{ $item->Events->start_date }}</li>
        <li><strong>end date:</strong> {{ $item->Events->end_date }}</li>
    </ul>

    <p>If you have any questions or concerns, please don't hesitate to contact us.</p>

    <p>Thank you!</p>
</body>
</html>
