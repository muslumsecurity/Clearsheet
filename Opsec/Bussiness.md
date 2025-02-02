# İş Ortamında OPSEC Adımları  

## ✅ 1. Fiziksel Güvenlik  
- [ ] Ofise giriş-çıkışları güvenlik kameraları ve kartlı geçiş sistemleri ile kontrol et.  
- [ ] Ofis içindeki ekranların dışarıdan veya ortak alanlardan görünmediğinden emin ol.  
- [ ] Özel odalarda görüşmeler yap, hassas konuşmalar için ses izolasyonu sağla.  
- [ ] Masada fiziksel doküman bırakma, iş bitince kilitli dolapta sakla.  
- [ ] Misafirlerin veya temizlik görevlilerinin yetkisiz bölgelere girmesini engelle.  
- [ ] Çalışma ortamını izinsiz fotoğraf veya video çekimlerine karşı koru.  

## ✅ 2. Ağ Güvenliği  
- [ ] Çalışanların sadece yetkilendirilmiş cihazlarla ağa bağlanmasını sağla.  
- [ ] VLAN ile ağ segmentasyonu yaparak kritik sistemleri ayrı tut.  
- [ ] WPA3/WPA2-Enterprise protokollerini kullanarak Wi-Fi güvenliğini artır.  
- [ ] Router ve ağ cihazlarında **UPnP, WPS, uzaktan erişim** gibi riskli ayarları kapat.  
- [ ] **IDS/IPS (Intrusion Detection/Prevention System)** ile ağ trafiğini analiz et.  
- [ ] VPN ile uzaktan çalışanların bağlantılarını şifrele ve yetkilendirilmiş cihazları zorunlu kıl.  

## ✅ 3. Cihaz Güvenliği  
- [ ] Çalışan cihazlarda **tam disk şifreleme (BitLocker, LUKS, VeraCrypt)** etkinleştir.  
- [ ] Kullanıcı yetkilendirmelerini minimum yetki prensibine göre ayarla (Least Privilege).  
- [ ] USB belleklerin ve harici cihazların takılmasını kısıtla veya şifreli kullanımı zorunlu kıl.  
- [ ] İş için kullanılan bilgisayarları düzenli olarak güvenlik güncellemelerine tabi tut.  
- [ ] Çalışanların cihazlarına izinsiz yazılım yüklemesini engelle.  

## ✅ 4. Dijital İzleri Azaltma  
- [ ] Kritik verileri saklamak için **şifreli depolama (NextCloud, Tresorit, ProtonDrive)** kullan.  
- [ ] Hassas projelerde iki faktörlü kimlik doğrulama (2FA) zorunlu hale getir.  
- [ ] Kurumsal hesaplar için **password manager (Bitwarden, 1Password, KeePass)** kullan.  
- [ ] Tüm verilerin belirli aralıklarla şifrelenmiş yedeklerini oluştur ve offline sakla.  
- [ ] Tüm bağlantılarda DNS sızıntısını önlemek için güvenli DNS servisleri kullan (Cloudflare DoH, NextDNS).  

## ✅ 5. Sosyal Mühendislik ve İç Tehditler  
- [ ] Çalışanlara **sosyal mühendislik farkındalık eğitimi** ver.  
- [ ] E-posta, sahte aramalar ve phishing saldırılarına karşı güvenlik testleri yap.  
- [ ] Hassas belgeleri fiziksel olarak yok etmek için **kağıt öğütücü (shredder)** kullan.  
- [ ] Çalışan ayrıldığında erişim izinlerini **hemen** iptal et ve hesaplarını kapat.  

## ✅ 6. Çıkış Prosedürü ve Kriz Yönetimi  
- [ ] İşten ayrılan çalışanların cihazlarını fabrika ayarlarına döndür ve verileri güvenli şekilde temizle.  
- [ ] Şüpheli bir güvenlik ihlali durumunda hızlı yanıt için olay müdahale planı oluştur.  
- [ ] Kritik sistemler için güvenli kapatma ve silme prosedürlerini hazır bulundur (`shred`, `sdelete`).  
- [ ] İş seyahatlerinde kurumsal cihazların izinsiz erişime karşı korunduğundan emin ol.  
- [ ] Kriz durumunda alternatif iletişim yöntemleri oluştur (şifreli mesajlaşma, özel VPN erişimi).
