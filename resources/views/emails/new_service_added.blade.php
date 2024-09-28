<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Product Added</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-color: #007BFF;
            /* Blue color for header */
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .content {
            padding: 20px;
        }

        .content h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .content p {
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .product-info {
            background-color: #e9ecef;
            /* Light gray background for product info */
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .footer {
            background-color: #f4f4f4;
            text-align: center;
            padding: 15px;
            font-size: 12px;
            color: #666;
        }

        @media (max-width: 600px) {
            .container {
                width: 100%;
                border-radius: 0;
            }

            .header,
            .footer {
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>New Service Alert!</h1>
        </div>
        <div class="content">
            <h1>Dear {{ $user->name }},</h1>
            <p>We are excited to announce that a new service has been added to our collection:</p>
            <div class="product-info">
                <h2>{{ $product->name }}</h2>
                <p><strong>Description:</strong> {{ $product->description }}</p>
            </div>
            <p>Visit our website to learn more </p>
            <p>Thank you for being a valued member of our community.</p>
            <p>Best Regards,<br>Your Team</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
        </div>
    </div>
</body>

</html>