# **RAM İçin OPSEC Adımları**  

## ✅ 1. RAM’de Geçici Verileri Minimize Etme  
- [ ] **Hassas işlemleri sanal makine (VM) veya canlı işletim sistemi (Live OS) üzerinde çalıştır.**  
  - **Önerilen:** [Tails OS](https://tails.net/), [Qubes OS](https://www.qubes-os.org/)  
- [ ] Swap dosyasını devre dışı bırak veya şifrele:  
  - **Linux:** `sudo swapoff -a && sudo rm -f /swapfile`  
  - **Windows:** "Virtual Memory" ayarlarından **pagefile.sys** kullanımını kapat.  
- [ ] **RAM’e yazılan dosyaları minimumda tut**, tarayıcı önbelleklerini devre dışı bırak.  
- [ ] **Sadece RAM üzerinde çalışan şifreli sistemler kullan** (örn: `tmpfs`, `ramdisk`).  

## ✅ 2. RAM’deki Hassas Verileri Şifreleme  
- [ ] RAM üzerindeki verileri **zorlukla erişilebilir hale getirmek için donanım seviyesinde şifreleme kullan**:  
  - **Intel SGX (Software Guard Extensions)**  
  - **AMD SME (Secure Memory Encryption)**  
- [ ] Hassas uygulamaları **RAM tabanlı şifreli disklerde** çalıştır:  
  - **Linux:** `sudo mount -t tmpfs -o size=512M tmpfs /mnt/ramdisk`  
  - **Windows:** [ImDisk Virtual Disk Driver](http://www.ltr-data.se/opencode.html/#ImDisk) ile RAM disk oluştur.  

## ✅ 3. RAM İzlerini Temizleme  
- [ ] **Sistemi kapatırken RAM temizliği yap:**  
  - **Linux:** `sudo sync && echo 3 | sudo tee /proc/sys/vm/drop_caches`  
  - **Windows:** `shutdown /s /t 0` yerine **hibernation modunu kapatarak** tam kapanış yap.  
- [ ] Bellek analiz araçlarını kullanarak açıkta hassas veri olup olmadığını kontrol et:  
  - **Linux:** [Volatility Framework](https://www.volatilityfoundation.org/)  
  - **Windows:** [RAMMap](https://docs.microsoft.com/en-us/sysinternals/downloads/rammap)  
- [ ] **Soğuk önyükleme saldırılarına (Cold Boot Attack) karşı BIOS ve donanım korumalarını aktif et.**  

## ✅ 4. RAM Üzerinde Hassas İşlemler  
- [ ] **Şifreleme anahtarlarını ve hassas bilgileri RAM üzerinde uzun süre tutma.**  
- [ ] Kriptografik işlemler için **PureBoot**, **measured boot** veya **TPM destekli çözümler** kullan.  
- [ ] **Özel amaçlı RAM temizleme araçlarıyla işlem yap:**  
  - **Linux:** `wipe`, `shred`, `secure-delete (sfill, smem)`  
  - **Windows:** [SDelete](https://docs.microsoft.com/en-us/sysinternals/downloads/sdelete)  

Bu adımlarla RAM’deki hassas verileri daha güvenli bir şekilde yönetebilirsin.
