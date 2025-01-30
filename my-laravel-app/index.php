<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Gönder</title>
    <style>
        /* Genel stil */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #3a8d99, #5c80bc); /* Gradient arka plan */
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Konteyner stili */
        .container {
            width: 100%;
            max-width: 900px;
            margin: 40px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Başlık stili */
        h1 {
            font-size: 32px;
            color: #333;
            margin-bottom: 20px;
        }

        /* Form grubu stili */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 8px;
            text-align: left;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            margin-top: 8px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
        }

        /* Textarea stilini özelleştir */
        .form-group textarea {
            height: 180px;
            resize: none;
        }

        /* Buton stilini özelleştir */
        .btn {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 12px 25px;
            border-radius: 30px;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .btn:active {
            background-color: #3e8e41;
        }

        /* Responsive tasarım */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
                margin: 20px;
            }

            h1 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Mesajınızı Gönderin</h1>

        <!-- Form Başlangıcı -->
        <form action="send_mail.php" method="POST">

            <!-- Name Field -->
            <div class="form-group">
                <label for="name">Adınız</label>
                <input type="text" id="name" name="name" placeholder="Adınızı girin" required>
            </div>

            <!-- Email Field -->
            <div class="form-group">
                <label for="email">E-posta Adresi</label>
                <input type="email" id="email" name="email" placeholder="E-posta adresinizi girin" required>
            </div>

            <!-- Message Field -->
            <div class="form-group">
                <label for="message">Mesajınız</label>
                <textarea id="message" name="message" placeholder="Mesajınızı yazın" required></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn">Mesaj Gönder</button>
        </form>
    </div>
</body>
</html>
