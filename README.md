Email Service - Laravel
Bu proje, Laravel framework'ü kullanarak geliştirdiğim bir e-posta gönderme servisidir. Kullanıcıların bir iletişim formu aracılığıyla mesaj göndermesine ve e-postaların Gmail veya Mailtrap kullanılarak iletilmesine olanak tanır.
Proje Yapısı
1. Backend (Laravel)
1.1. Controller
•	ContactController.php içerisinde sendEmail metodu, formdan gelen verileri alır ve doğruladıktan sonra e-posta gönderme işlemini başlatır.
•	Öncelikle Gmail SMTP ile göndermeyi dener, başarısız olursa Mailtrap'e yönlendirir.
1.2. Mail Class
•	ContactMail.php, Laravel'in Mailable sınıfını genişleterek e-postanın şablonunu ve içeriğini belirler.
•	emails/contact.blade.php dosyasını kullanarak e-posta içeriğini oluşturur.
1.3. Routes (Yönlendirmeler)
•	web.php dosyasında aşağıdaki yönlendirme tanımlıdır:
Route::post('/send-email', [ContactController::class, 'sendEmail'])->name('send.email');
Bu route, iletişim formundan gelen POST isteğini sendEmail metoduna yönlendirir.
2. Frontend (Blade Template)
•	welcome.blade.php içerisinde iletişim formu bulunur.
•	Kullanıcılar adını, e-posta adresini ve mesajını girerek formu gönderebilir.
•	Başarı veya hata mesajları gösterilir.
3. E-posta Şablonu
E-posta içeriği resources/views/emails/contact.blade.php dosyasında tanımlıdır:
<h2>New Contact Message</h2>
<p><strong>Name:</strong> {{ $details['name'] }}</p>
<p><strong>Email:</strong> {{ $details['email'] }}</p>
<p><strong>Message:</strong></p>
<p>{{ $details['message'] }}</p>
Kurulum ve Çalıştırma
1.	Laravel Bağımlılıklarını Kurun:
composer install
2.	.env Dosyasını Güncelleyin:
MAIL ayarlarını aşağıdaki gibi yapılandırın:
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="Your Name"
Mailtrap Alternatifi:
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your-mailtrap-username
MAIL_PASSWORD=your-mailtrap-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@example.com"
MAIL_FROM_NAME="Your App Name"
3.	Gerekli Anahtarları Oluşturun:
php artisan key:generate
4.	Geliştirme Sunucusunu Başlatın:
php artisan serve
5.	Formu Kullanarak Test Edin:
•	Tarayıcınızı açın ve http://127.0.0.1:8000/ adresine gidin.
•	Formu doldurun ve mesajınızı gönderin.
•	Başarı mesajı alırsanız, e-posta kutunuzu kontrol edin.

Katkıda Bulunma
Bu projeye katkıda bulunmak isterseniz, fork edip pull request gönderebilirsiniz.
