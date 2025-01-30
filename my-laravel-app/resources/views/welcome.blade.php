<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Platform</title>
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
        <h1>Welcome to Our Platform</h1>
        @if (session('success'))
        <div class="success-message" style="color: green; margin-bottom: 20px; font-weight: bold;">
            {{ session('success') }}
        </div>
        @endif


        <!-- Form Başlangıcı -->
        <form action="{{ route('send.email') }}" method="POST">
            @csrf  <!-- CSRF token for security -->

            <!-- Name Field -->
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
            </div>

            <!-- Email Field -->
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email address" required>
            </div>

            <!-- Message Field -->
            <div class="form-group">
                <label for="message">Your Message</label>
                <textarea id="message" name="message" placeholder="Write your message" required></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn">Send us message</button>
        </form>
    </div>
</body>
</html>
