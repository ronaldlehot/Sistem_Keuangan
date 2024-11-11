Cara Mengkloning Proyek
Untuk mengkloning proyek ini, ikuti langkah-langkah di bawah ini:

Buka terminal atau command prompt.

Arahkan ke direktori tempat Anda ingin menyimpan proyek.

Jalankan perintah berikut untuk mengkloning repositori:

git clone https://github.com/RanoLangari/SPK-SMART.git
Setelah proses kloning selesai, masuk ke direktori proyek:

cd spk-smart
Cara Menjalankan Proyek
Ikuti langkah-langkah di bawah ini untuk menjalankan proyek:

Salin file .env.example ke .env dan sesuaikan konfigurasi database dan aplikasi sesuai kebutuhan Anda:

cp .env.example .env
Instal semua dependensi yang diperlukan menggunakan npm:

npm install
Instal semua dependensi yang diperlukan menggunakan composer:

composer install
Hasilkan kunci aplikasi:

php artisan key:generate
Jalankan migrasi untuk membuat struktur database:

php artisan migrate
(Opsional) Jalankan seeder untuk mengisi database dengan data awal:

php artisan db:seed
Jalankan Vite menggunakan perintah:

npm run dev
Jalankan server pengembangan Laravel menggunakan perintah:

php artisan serve
Buka browser Anda dan akses aplikasi melalui URL yang disediakan oleh server pengembangan (biasanya http://localhost:8000).

Jika Anda menggunakan Laragon sebagai lingkungan pengembangan Anda, Anda dapat mengikuti langkah-langkah ini:
Pastikan Laragon sudah terpasang dan semua layanan (Apache/Nginx, MySQL, PHP) berjalan.

Clone repositori proyek Anda ke dalam direktori www di Laragon dengan perintah:

git clone https://github.com/RanoLangari/SPK-SMART.git
Buka Laragon, klik kanan, pilih Terminal, dan jalankan perintah berikut untuk menginstal semua dependensi PHP dan JavaScript yang diperlukan:
composer install
npm install
Salin file .env.example ke .env dan sesuaikan konfigurasi database dan aplikasi sesuai kebutuhan Anda. Pastikan untuk mengatur DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, dan DB_PASSWORD sesuai dengan pengaturan MySQL di Laragon.

Buka Laragon, klik kanan, dan pilih Start All untuk memulai layanan MySQL.

Jalankan perintah berikut untuk menghasilkan kunci aplikasi:

php artisan key:generate
Jalankan perintah berikut untuk menjalankan migrasi dan membuat struktur database:
php artisan migrate
(Opsional) Jalankan perintah berikut untuk mengisi database dengan data awal:
php artisan db:seed
Jalankan perintah berikut untuk mengompilasi aset JavaScript dan CSS:
npm run dev
Akses proyek melalui browser dengan URL yang disediakan oleh Laragon (biasanya http://spk-smart-topsis.test).
