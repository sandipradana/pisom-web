<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Admin;
use App\Models\Staff;
use App\Models\Patient;
use App\Models\Hospital;
use App\Models\Medicine;
use App\Models\Symptom;
use App\Models\Cormobid;
use App\Models\TestType;
use App\Models\TodoCategory;
use App\Models\TodoType;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin();
        $admin->name = "Admin";
        $admin->email = "admin@pisom.xyz";
        $admin->password = Hash::make('password');
        $admin->phone = "01234577345";
        $admin->save();

        $hospital = new Hospital();
        $hospital->name = "Pertamedika";
        $hospital->email = "admin@pertamedika.com";
        $hospital->address = "Jakarta Selatan";
        $hospital->phone = "021234567890";
        $hospital->save();

        $staff = new Staff();
        $staff->name = "Staff";
        $staff->email = "staff@pisom.xyz";
        $staff->phone = "08123456543";
        $staff->hospital_id = "1";
        $staff->password = Hash::make('password');
        $staff->save();

        $patient = new Patient();
        $patient->name = "Tri Ahmad Sandi Pradana";
        $patient->password = Hash::make('password');
        $patient->email = "sandi@pisom.xyz";
        $patient->phone = "01234577345";
        $patient->date_of_birth = "1994-01-01";
        $patient->hospital_id = "1";
        $patient->staff_id = "1";
        $patient->gender = "1";
        $patient->address = "Jakarta";
        $patient->save();

        $patient = new Patient();
        $patient->name = "Margaret Amanda";
        $patient->password = Hash::make('password');
        $patient->email = "manda@pisom.xyz";
        $patient->phone = "01234577345";
        $patient->date_of_birth = "1994-01-01";
        $patient->hospital_id = "1";
        $patient->staff_id = "1";
        $patient->address = "Jakarta";
        $patient->gender = "2";
        $patient->save();

        $patient = new Patient();
        $patient->name = "Mutiara Anggun";
        $patient->password = Hash::make('password');
        $patient->email = "mutia@pisom.xyz";
        $patient->phone = "01234577345";
        $patient->address = "Jakarta";
        $patient->date_of_birth = "1994-01-01";
        $patient->hospital_id = "1";
        $patient->staff_id = "1";
        $patient->gender = "2";
        $patient->save();

        $newsCategory = new NewsCategory();
        $newsCategory->name = "Corona Virus";
        $newsCategory->save();

        $newsCategory = new NewsCategory();
        $newsCategory->name = "Corona Virus";
        $newsCategory->save();

        $newsCategory = new NewsCategory();
        $newsCategory->name = "Pencegahan";
        $newsCategory->save();

        /* News::factory(100)->create(); */
        $news = new News();
        $news->title        = "Ini Rincian Harga Vaksin Covid-19 di Indonesia";
        $news->content      = "TRIBUNNEWS.COM, JAKARTA - Vaksin corona Sinovac gelombang pertama sebanyak 1,2 juta dosis vaksin Covid-19 sudah tiba di Indonesia pada 6 Desember 2020 lalu. Vaksin Sinovac merupakan salah satu dari 6 vaksin Covid-19 yang akan digunakan untuk proses vaksinasi di Indonesia. \"Saya ingin menyampaikan suatu kabar baik, bahwa hari ini pemerintah sudah menerima 1,2 juta dosis vaksin Covid-19. Vaksin ini buatan Sinovac yang kita uji secara klinis di Bandung sejak Agustus 2020,\" kata Presiden Joko Widodo melalui kanal YouTube Sekretariat Presiden.";
        $news->content      .= "TRIBUNNEWS.COM, JAKARTA - Vaksin corona Sinovac gelombang pertama sebanyak 1,2 juta dosis vaksin Covid-19 sudah tiba di Indonesia pada 6 Desember 2020 lalu. Vaksin Sinovac merupakan salah satu dari 6 vaksin Covid-19 yang akan digunakan untuk proses vaksinasi di Indonesia. \"Saya ingin menyampaikan suatu kabar baik, bahwa hari ini pemerintah sudah menerima 1,2 juta dosis vaksin Covid-19. Vaksin ini buatan Sinovac yang kita uji secara klinis di Bandung sejak Agustus 2020,\" kata Presiden Joko Widodo melalui kanal YouTube Sekretariat Presiden.";
        $news->category_id  = 1;
        $news->featured     = 1;
        $news->thumbnail    = 'news/1.jpg';
        $news->date         = date("Y-m-d");
        $news->save();

        $news = new News();
        $news->title        = "Kasus Corona Indonesia 611.631, Ini 5 Provinsi dengan Kasus Tertinggi.";
        $news->content      = "KOMPAS.com - Penyebaran virus corona masih menunjukkan tren yang terus meningkat di Indonesia. Berdasarkan data covid19.go.id, Sabtu (12/12/2020), total kasus saat ini berjumlah 611.631.  Sebanyak 18.653 orang meninggal dunia, 501.376 orang sembuh dan kasus aktif berjumlah 91.602 orang.  Pemerintah Indonesia sudah mendatangkan 1,2 juta dosis vaksin Sinovac asal China dan rencananya akan datang kembali 1,8 juta dosis berikutnya.  Namun dari sekitar 100 juta target vaksinasi, hanya sekitar 30 juta yang akan mendapatkan program vaksinasi gratis. Sementara sisanya sekitar 75 juta harus berbayar dalam progran vaksinasi mandiri.";
        $news->content      .= "TRIBUNNEWS.COM, JAKARTA - Vaksin corona Sinovac gelombang pertama sebanyak 1,2 juta dosis vaksin Covid-19 sudah tiba di Indonesia pada 6 Desember 2020 lalu. Vaksin Sinovac merupakan salah satu dari 6 vaksin Covid-19 yang akan digunakan untuk proses vaksinasi di Indonesia. \"Saya ingin menyampaikan suatu kabar baik, bahwa hari ini pemerintah sudah menerima 1,2 juta dosis vaksin Covid-19. Vaksin ini buatan Sinovac yang kita uji secara klinis di Bandung sejak Agustus 2020,\" kata Presiden Joko Widodo melalui kanal YouTube Sekretariat Presiden.";
        $news->category_id  = 1;
        $news->featured     = 1;
        $news->thumbnail    = 'news/2.png';
        $news->date         = date("Y-m-d");
        $news->save();

        $news = new News();
        $news->title        = "Update Kasus Corona Kabupaten Bandung Sabtu 12 Desember 2020";
        $news->content      = "PRFMNEWS - Kasus penularan virus corona (Covid-19) di Kabupaten Bandung, Jawa Barat, masih menunjukan tren penambahan. Hingga hari ini Sabtu 12 Desember 2020, total kasus konfirmasi atau positif virus corona di Kabupaten Bandung mencapai 2.642 kasus. Dengan demikian, terjadi penambahan sebanyak 49 kasus konfirmasi positif virus corona dalam 24 jam terakhir, atau dari Jumat 11 Desember hingga Sabtu 12 Desember 2020.";
        $news->content      .= "TRIBUNNEWS.COM, JAKARTA - Vaksin corona Sinovac gelombang pertama sebanyak 1,2 juta dosis vaksin Covid-19 sudah tiba di Indonesia pada 6 Desember 2020 lalu. Vaksin Sinovac merupakan salah satu dari 6 vaksin Covid-19 yang akan digunakan untuk proses vaksinasi di Indonesia. \"Saya ingin menyampaikan suatu kabar baik, bahwa hari ini pemerintah sudah menerima 1,2 juta dosis vaksin Covid-19. Vaksin ini buatan Sinovac yang kita uji secara klinis di Bandung sejak Agustus 2020,\" kata Presiden Joko Widodo melalui kanal YouTube Sekretariat Presiden.";
        $news->category_id  = 1;
        $news->featured     = 1;
        $news->thumbnail    = 'news/3.jpg';
        $news->date         = date("Y-m-d");
        $news->save();

        $news = new News();
        $news->title        = "Meledak lagi, Korea Selatan berjuang melawan gelombang ketiga wabah corona";
        $news->content      = "KONTAN.CO.ID - SEOUL. Wabah virus corona kembali meledak di Korea Selatan. Minggu (13/12), Korea Selatan melaporkan 1.030 infeksi virus corona baru, rekor harian kedua berturut-turut. Padahal Korea Selatan sempat dipuji karena berhasil mengendalikan wabah corona, namun sekarang mereka berjuang melawan gelombang ketiga corona. Channel News Asia melaporkan, dari kasus baru, 1.002 ditularkan secara lokal, sekitar 786 di antaranya ditemukan di wilayah Seoul yang memiliki populasi separuh dari 52 juta orang di negara itu.";
        $news->content      .= "TRIBUNNEWS.COM, JAKARTA - Vaksin corona Sinovac gelombang pertama sebanyak 1,2 juta dosis vaksin Covid-19 sudah tiba di Indonesia pada 6 Desember 2020 lalu. Vaksin Sinovac merupakan salah satu dari 6 vaksin Covid-19 yang akan digunakan untuk proses vaksinasi di Indonesia. \"Saya ingin menyampaikan suatu kabar baik, bahwa hari ini pemerintah sudah menerima 1,2 juta dosis vaksin Covid-19. Vaksin ini buatan Sinovac yang kita uji secara klinis di Bandung sejak Agustus 2020,\" kata Presiden Joko Widodo melalui kanal YouTube Sekretariat Presiden.";
        $news->category_id  = 1;
        $news->featured     = 1;
        $news->thumbnail    = 'news/4.jpg';
        $news->date         = date("Y-m-d");
        $news->save();

        $news = new News();
        $news->title        = "Ada 17 Penyintas Covid-19 Dipulangkan, RLC Kota Tangsel Sebut Tren Penerimaan Pasien Masih Tinggi";
        $news->content      = "WARTAKOTALIVE.COM, SERPONG - Rumah Lawan Covid-19 Kota Tangerang Selatan (RLC Kota Tangsel) kembali memulangkan orang yang telah dinyatakan sembuh dari infeksi virus corona. Pihak Koordinator RLC Kota Tangsel Suhara Manullang mengatakan pihaknya memulangkan belasan penyintas covid-19 pada hari Sabtu, 12 Desember 2020 itu. \"Hari ini kita memulangkan 17 orang yang dinyatakan sembuh,\" kata Suhara saat dikonfirmasi, Tangsel, Sabtu (12/12/2020).";
        $news->content      .= "TRIBUNNEWS.COM, JAKARTA - Vaksin corona Sinovac gelombang pertama sebanyak 1,2 juta dosis vaksin Covid-19 sudah tiba di Indonesia pada 6 Desember 2020 lalu. Vaksin Sinovac merupakan salah satu dari 6 vaksin Covid-19 yang akan digunakan untuk proses vaksinasi di Indonesia. \"Saya ingin menyampaikan suatu kabar baik, bahwa hari ini pemerintah sudah menerima 1,2 juta dosis vaksin Covid-19. Vaksin ini buatan Sinovac yang kita uji secara klinis di Bandung sejak Agustus 2020,\" kata Presiden Joko Widodo melalui kanal YouTube Sekretariat Presiden.";
        $news->category_id  = 1;
        $news->featured     = 1;
        $news->thumbnail    = 'news/5.jpg';
        $news->date         = date("Y-m-d");
        $news->save();

        Patient::factory(100)->create();

        $medicine = new Medicine();
        $medicine->name = "Tablet Vit. C non acidic 500mg";
        $medicine->save();

        $medicine = new Medicine();
        $medicine->name = "Tablet isap Vit. C 500mg";
        $medicine->save();

        $medicine = new Medicine();
        $medicine->name = "Multivitamin C, B, E, Zink";
        $medicine->save();

        $medicine = new Medicine();
        $medicine->name = "Azitromisin 500mg";
        $medicine->save();

        $medicine = new Medicine();
        $medicine->name = "Oseltamivir (Tamiflu) 75mg";
        $medicine->save();

        $medicine = new Medicine();
        $medicine->name = "Lopinavir+Ritonavir 400mg";
        $medicine->save();

        $medicine = new Medicine();
        $medicine->name = "Favipiravir 600mg";
        $medicine->save();
        
        $medicine = new Medicine();
        $medicine->name = "Klorokuin Fosfat 500mg";
        $medicine->save();

        $medicine = new Medicine();
        $medicine->name = "Hidroksiklorokuin 200mg";
        $medicine->save();

        /* Symptom */
        $symptom = new Symptom();
        $symptom->name = "Batuk";
        $symptom->save();

        $symptom = new Symptom();
        $symptom->name = "Bersin";
        $symptom->save();

        $symptom = new Symptom();
        $symptom->name = "Demam > 37";
        $symptom->save();

        $symptom = new Symptom();
        $symptom->name = "Demam > 39";
        $symptom->save();

        $symptom = new Symptom();
        $symptom->name = "Nafas Pendek";
        $symptom->save();

        $symptom = new Symptom();
        $symptom->name = "Lemas/Lelah";
        $symptom->save();

        $symptom = new Symptom();
        $symptom->name = "Pilek";
        $symptom->save();

        $symptom = new Symptom();
        $symptom->name = "Nyeri Tenggorokan";
        $symptom->save();

        $symptom = new Symptom();
        $symptom->name = "Sakit Kepala";
        $symptom->save();

        $symptom = new Symptom();
        $symptom->name = "Mual";
        $symptom->save();

        $symptom = new Symptom();
        $symptom->name = "Nyeri Otot";
        $symptom->save();

        $symptom = new Symptom();
        $symptom->name = "Menggigil";
        $symptom->save();

        $symptom = new Symptom();
        $symptom->name = "Nyeri Perut";
        $symptom->save();

        $symptom = new Symptom();
        $symptom->name = "Diare";
        $symptom->save();

        $symptom = new Symptom();
        $symptom->name = "Muntah";
        $symptom->save();

        $symptom = new Symptom();
        $symptom->name = "Hilang Indra Penciuman";
        $symptom->save();

        $symptom = new Symptom();
        $symptom->name = "Hilang Nafsu Makan";
        $symptom->save();

        $symptom = new Symptom();
        $symptom->name = "Penurunan Kesadaran";
        $symptom->save();

        $symptom = new Symptom();
        $symptom->name = "Hidung Tersumbat";
        $symptom->save();

        $symptom = new Symptom();
        $symptom->name = "Penurunan Mobilitas/Pergerakan";
        $symptom->save();

        $symptom = new Symptom();
        $symptom->name = "Kurang Fokus";
        $symptom->save();
        /* End Symptom */

        $cormobid = new Cormobid();
        $cormobid->name = "Asma";
        $cormobid->save();

        $cormobid = new Cormobid();
        $cormobid->name = "Diabetes";
        $cormobid->save();

        $cormobid = new Cormobid();
        $cormobid->name = "Diabetes Mellitus";
        $cormobid->save();

        $cormobid = new Cormobid();
        $cormobid->name = "Geriatri";
        $cormobid->save();

        $cormobid = new Cormobid();
        $cormobid->name = "Autoimun";
        $cormobid->save();

        $cormobid = new Cormobid();
        $cormobid->name = "Penyakit Ginjal";
        $cormobid->save();

        $cormobid = new Cormobid();
        $cormobid->name = "Gastrointestinal";
        $cormobid->save();

        $cormobid = new Cormobid();
        $cormobid->name = "Trombosis dan Gangguan Koagulasi";
        $cormobid->save();

        $cormobid = new Cormobid();
        $cormobid->name = "Hipertensi";
        $cormobid->save();

        $cormobid = new Cormobid();
        $cormobid->name = "Penyakit Paru Obstruktif Kronik (PPKOK)";
        $cormobid->save();

        $cormobid = new Cormobid();
        $cormobid->name = "Tuberkulosis";
        $cormobid->save();

        $cormobid = new Cormobid();
        $cormobid->name = "HIV/AIDS";
        $cormobid->save();

        $test = new TestType();
        $test->name = "Rapid";
        $test->save();

        $test = new TestType();
        $test->name = "Swab";
        $test->save();

        $todo_category = new TodoCategory();
        $todo_category->name = "Wajib";
        $todo_category->save();

        $todo_category = new TodoCategory();
        $todo_category->name = "Makanan";
        $todo_category->save();

        $todo_category = new TodoCategory();
        $todo_category->name = "Minuman";
        $todo_category->save();

        $todo_category = new TodoCategory();
        $todo_category->name = "Olahraga";
        $todo_category->save();

        $todo_category = new TodoCategory();
        $todo_category->name = "Obat";
        $todo_category->save();

        $test = new TodoType();
        $test->name          = "Berjemur Pagi";
        $test->todo_category_id = 1;
        $test->mandatory     = 1;
        $test->description   = "Berjemur Jam 8 Pagi";
        $test->save();
        
        $test = new TodoType();
        $test->name          = "Berjemur Sore";
        $test->todo_category_id = 1;
        $test->mandatory     = 1;
        $test->description   = "Berjemur Jam 4 Sore";
        $test->save();

        $test = new TodoType();
        $test->name          = "Cek Suhu Pagi";
        $test->todo_category_id = 1;
        $test->mandatory     = 1;
        $test->description   = "Berjemur Jam 8 Pagi";
        $test->save();

        $test = new TodoType();
        $test->name          = "Cek Suhu Malam";
        $test->todo_category_id = 1;
        $test->mandatory     = 1;
        $test->description   = "Berjemur Jam 8 Malam";
        $test->save();

        $test = new TodoType();
        $test->name         = "Tidak Merokok";
        $test->todo_category_id = 1;
        $test->description  = "Tidak Merokok Sepanjang Hari";
        $test->mandatory    = 1;
        $test->save();

        $test = new TodoType();
        $test->name         = "Minum Vitamin C";
        $test->todo_category_id = 1;
        $test->description  = "Minum vitamin Jam 8 Pagi";
        $test->mandatory    = 1;
        $test->save();

        /* Makanan */
        $test = new TodoType();
        $test->name         = "Daging sapi";
        $test->todo_category_id = 2;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Daging Ayam";
        $test->todo_category_id = 2;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Daging kambing";
        $test->todo_category_id = 2;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Daging domba";
        $test->todo_category_id = 2;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Ikan air laut";
        $test->todo_category_id = 2;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Ikan air tawar";
        $test->todo_category_id = 2;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Sayuran hijau";
        $test->todo_category_id = 2;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Sayuran buah";
        $test->todo_category_id = 2;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Nasi/bubur";
        $test->todo_category_id = 2;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Buah-buahan";
        $test->todo_category_id = 2;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();

        /* Minuman */
        $test = new TodoType();
        $test->name         = "Minuman bersoda";
        $test->todo_category_id = 3;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Minuman fermentasi";
        $test->todo_category_id = 3;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Minuman beralkohol";
        $test->todo_category_id = 3;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Susu";
        $test->todo_category_id = 3;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Wedang jahe";
        $test->todo_category_id = 3;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Jamu";
        $test->todo_category_id = 3;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Lemon";
        $test->todo_category_id = 3;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Es/jus buah";
        $test->todo_category_id = 3;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Teh daun sirih";
        $test->todo_category_id = 3;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Teh hijau";
        $test->todo_category_id = 3;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Air kelapa";
        $test->todo_category_id = 3;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Air putih";
        $test->todo_category_id = 3;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Kopi";
        $test->todo_category_id = 3;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Minuman cokelat";
        $test->todo_category_id = 3;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();

        /* Olahraga */
        $test = new TodoType();
        $test->name         = "Aerobik";
        $test->todo_category_id = 4;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Jogging";
        $test->todo_category_id = 4;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Fitness";
        $test->todo_category_id = 4;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Berenang";
        $test->todo_category_id = 4;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Bulutangkis";
        $test->todo_category_id = 4;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Sepak bola";
        $test->todo_category_id = 4;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Futsal";
        $test->todo_category_id = 4;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Yoga";
        $test->todo_category_id = 4;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();
        
        $test = new TodoType();
        $test->name         = "Lari";
        $test->todo_category_id = 4;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();

        /* Obat */
        $test = new TodoType();
        $test->name         = "Paracetamol";
        $test->todo_category_id = 5;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();

        $test = new TodoType();
        $test->name         = "Antibiotik";
        $test->todo_category_id = 5;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();

        $test = new TodoType();
        $test->name         = "Vitamin";
        $test->todo_category_id = 5;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();

        $test = new TodoType();
        $test->name         = "Herbal";
        $test->todo_category_id = 5;
        $test->description  = "-";
        $test->mandatory    = 0;
        $test->save();

    }
}
