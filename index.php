<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhatsApp Chat</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }
        .content-container {
            width: 100%;
            height: 100%;
            border: none;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: auto;
        }
    </style>
</head>
<body>
    <div class="content-container">
        <?php include('/home/truftech/whatsapp-chat/index.html'); ?>
    </div>
</body>
</html>
