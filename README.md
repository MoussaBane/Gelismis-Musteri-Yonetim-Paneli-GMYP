<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Laravel İle Gelişmiş Müşteri Yönetim Paneli Geliştirme

Bu proje, kullanıcı yönetimi ve müşteri yönetimi üzerine odaklanan bir geliştirme projesidir.

Proje, Laravel ve Bootstrap kullanılarak oluşturulmuştur ve aşağıda belirtilen özellikleri içermektedir:

## Ön Kurulum

İlk önce bilgisayarnızda aşağıdakileri kurulu olduğundan emin olun:

-   Node.js 'npm kullanılabilmesi için'
-   Xampp 'Apache ve Mysql start edilmiş halinde'
-   Laravel

## Kurulum

1. Projenin kaynak kodunu bilgisayarınıza indirin veya kopyalayın.

2. Terminali açın ve proje dizinine gidin.

3. Gerekli bağımlılıkları yüklemek için aşağıdaki komutu çalıştırın:

    ![image](https://github.com/MoussaBane/Gelismis-Musteri-Yonetim-Paneli-GMYP/assets/75726215/3006e84d-8e9c-4653-a554-bf18cb2eb2e7)

4. Proje dosyasında .env.example dosyasını .env olarak kopyalayın ve dosyada gerekli veritabanı bağlantı bilgilerini ayarlayın.

5. Veritabanını oluşturmak için aşağıdaki komutu çalıştırın:

    ![image](https://github.com/MoussaBane/Gelismis-Musteri-Yonetim-Paneli-GMYP/assets/75726215/671a6eed-c10a-4393-a9f4-1763b08bc9cd)

6. Uygulama anahtarını oluşturmak için aşağıdaki komutu çalıştırın:

    ![image](https://github.com/MoussaBane/Gelismis-Musteri-Yonetim-Paneli-GMYP/assets/75726215/158fc62e-5d32-4c11-9365-d2984de67ff9)

7. Uygulamayı başlatmak için uygulamanın dizisinde sırasıyla aşağıdaki komutuları farklı termallerde çalıştırın:

    ![image](https://github.com/MoussaBane/Gelismis-Musteri-Yonetim-Paneli-GMYP/assets/75726215/809e0f1f-6a67-4b74-a888-ecc12bbbb106)

    ![image](https://github.com/MoussaBane/Gelismis-Musteri-Yonetim-Paneli-GMYP/assets/75726215/57e548df-26f7-4b7c-9a5c-e8d8fb8655e8)

   Not: Build dosyası oluşturulduğu için direkt olarak "php artisan serve" çalıştırılarak uygulamayı başlatabilirsiniz.

9. Tarayıcınızda http://localhost:8000 adresine giderek uygulamaya erişebilirsiniz.

## Kullanım

Uygulama şimdi yerel sunucunuzda çalışmaya başlamalıdır. Tarayıcınızda `http://localhost:8000` adresine giderek uygulamayı görüntüleyebilirsiniz.

## Kullanıcı Yönetimi

### - Kullanıcı Girişi ve Çıkışı:

"Login" Sayfasında kullanıcı adınızı ve şifrenizi girerek sisteme giriş yapabilirsiniz. Oturumu kapatmak için "Logout" seçeneğini tıklayarak çıkış
yapabilirsiniz.

### - Sosyal Oturum Açma:

Google veya Facebook hesaplarınızı kullanarak da sisteme giriş yapabilirsiniz. "Login" sayfasında sosyal medya hesaplarıyla giriş yapma seçeneklerini bulabilirsiniz.

### - Kullanıcı Yönetim Paneli:

Admin sayfasında kullanıcılarınızı ekleyebilir, düzenleyebilir ve silebilirsiniz. Kullanıcı yönetim panelinde kullanıcıların e-posta adresi, rolü, kayıt tarihi, son giriş tarihi ve diğer önemli bilgilerini görüntüleyebilirsiniz.

Onun dışında da kullanıcıya ait müsterileri bilgilerine erişim sağlanmaktadır. Dilediği kullanıcıya müşteri ekleyebilir düzenleyebilir silebilir ve görüntüleyebilirsiniz.

### - Rol Bazlı Erişim Kontrolü:

Kullanıcılara belirli roller('Admin || Kullanici') atanmıştır. Örneğin, "Admin" rolüne sahip kullanıcılar diğer kullanıcıları düzenleme yetkisine sahip olmaktadır.

### - Kullanıcı Profili:

Her kullanıcının profil bilgilerini görüntüleyebilir ve düzenleyebilir. Kullanıcı "profile" sayfasında kullanıcının adı, e-posta adresi, profil resmi ve şifresi gibi bilgileri bulunmaktadır.

## Müşteri Yönetim Paneli

### - Müşteri Ekleme:

Müsteri Panelinde "Ekle" butonu tıklayarak çıkan formuna müşteri bilgilerini girerek veritabanına kaydedebilirsiniz. Müşteri bilgileri müşterinin adı, soyadı, e-posta adresi ve telefon numarasını içermektedir.

### - Müşteri Düzenleme:

Her müşteriye ait ayrı bir düzenleme sayfası bulunmaktadır. Bu sayfada müşteri bilgilerini güncelleyebilir ve kaydedebilirsiniz.

### - Müşteri Silme:

Müşteri listesinde "Action" sütunda her müşteri için bir "Sil" düğmesi bulunmaktadır. Bu düğmeye tıklandığında, ilgili müşteri kalıcı olarak silinir. Bu işlem gerçekleşmeden önce bir onay mesajı görüntülenmektedir.

### - Yetkilendirme/Erişim Kontrolü:

Yetkilendirme sistemi sayesinde, yönetici dışındaki kullanıcılar yalnızca kendi ekledikleri müşterileri görüntüleyebilir, düzenleyebilir ve silebilir.

### - Müşteri Arama:

Müşteri listesinde müşterileri adlarına, soyadlarına veya e-posta adreslerine göre arayabilirsiniz. Bu özellik, büyük müşteri listelerinde belirli müşterileri hızlıca bulmanıza yardımcı olmaktadır.

### - Müşteri Ayrıntıları:

Her müşterinin detaylarını gösteren ayrı bir sayfa bulunmaktadır. Bu sayfada müşterinin adı, e-posta adresi, telefon numarası ve diğer bilgileri bulunmaktadır. Ayrıca, bu sayfada müşteriye özel notlar eklemek için bir özellik bulunmaktadır.

## Müşteri İstatistikleri ve Grafikler

-   Bu kısmında iki tane grafik mevcuttur.
-   İlki, bütün zaman aralığı için her kullanıcı eklediği toplam müşteri sayısı görüntülenmektedir.
-   İkincisi ise, belirlenen bir zaman aralığında her kullanıcı eklediği toplam müşteri sayısı görüntülenmektedir.

Bu grafikler ve sayaçlar, Laravel'in özelleştirilmiş Controller'ları ve View'ları kullanılarak oluşturulmuştur. Grafikler için Chart.js kütüphanesinden faydalandım.

## Ek Özellikler

### - Eylem Geçmişi:

Müşterilere yapılan her eylem (ekleme, düzenleme, silme vb.) kaydedilir ve bu eylemler "Archive" sayfasında eylem geçmişi görüntülenmektedir.

### - Müşteri Verilerini İndirme:

Müşteri verilerini CSV veya Excel formatında indirebilirsiniz. Bu özellik sayesinde müşteri verilerini kolayca dışa aktarabilirsiniz. "Geliştirilmektedir"

## Demo

Şu linke tıklayarak demo videosuna erişebilirsiniz: https://www.youtube.com/watch?v=fkmYv_pqsmg

## Deneme

Kendiniz denemek isterseniz, bu linke 🔗 tıklayınız : http://hobibank.com
