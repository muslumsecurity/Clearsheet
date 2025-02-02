# **Tor Ağı İçin OPSEC Adımları**  

## ✅ 1. Tor Kullanımı İçin Temel Güvenlik  
- [ ] Tor’u **sadece resmi kaynaklardan** indir ([Tor Project](https://www.torproject.org/)).  
- [ ] Tarayıcıyı her oturumdan sonra **sıfırla**, çerezleri ve önbelleği temizle.  
- [ ] **Tam ekran kullanma**, çünkü ekran boyutu tarayıcı parmak izi oluşturabilir.  
- [ ] **JavaScript’i devre dışı bırak**, varsayılan "Safer" veya "Safest" modunu kullan.  
- [ ] **WebRTC’yi kapat**, aksi halde IP sızıntısı olabilir.  
  - **Firefox:** `about:config` → `media.peerconnection.enabled` → `false`  

## ✅ 2. Bağlantı Güvenliği  
- [ ] Tor kullanırken **VPN veya Proxy** üzerinden bağlanarak ISP’yi gizle.  
  - **Önerilen yapı:** **VPN → Tor (Tor over VPN)**  
- [ ] Tor çıkış düğümlerini analiz eden servisleri kullanarak güvensiz olanları belirle:  
  - [Check Tor Exit Nodes](https://exonerator.torproject.org/)  
- [ ] DNS sızıntısını önlemek için sistem genelinde **DNSCrypt veya NextDNS DoH** kullan.  

## ✅ 3. Tor Üzerinden Dosya ve İçerik İndirme  
- [ ] **.doc, .pdf, .exe gibi dosyaları doğrudan açma**, önce sanal makinede kontrol et.  
  - **Qubes OS + Whonix** kullanarak güvenli inceleme yap.  
- [ ] Tor tarayıcısında **torrent kullanma**, gerçek IP’ni sızdırabilir.  
- [ ] Onion linklerini **şifrelenmiş metin dosyasında** sakla, tarayıcı geçmişinde bırakma.  
- [ ] Şüpheli dosyaları açmadan önce **detonasyon ortamında (sandbox)** test et:  
  - [Cuckoo Sandbox](https://cuckoosandbox.org/)  

## ✅ 4. Anonimlik ve Kimlik Koruma  
- [ ] Aynı Tor kimliğiyle uzun süre aynı platformu kullanma, izlenebilir olabilirsin.  
- [ ] Tor ağı üzerinden giriş yaptığın hesapları **sadece Tor ile kullan**, diğer IP’lerden giriş yapma.  
- [ ] Kişisel bilgilerini paylaşmaktan kaçın, takma ad ve şifreli iletişim tercih et:  
  - **E-posta:** [ProtonMail](https://proton.me/) veya [Tutanota](https://tutanota.com/)  
  - **Mesajlaşma:** [Session](https://getsession.org/) veya [Ricochet](https://ricochet.im/)  
- [ ] Tor üzerinde **çok fazla kişisel ayar değiştirme**, varsayılan ayarlar anonimliği korur.  

## ✅ 5. Gelişmiş Güvenlik Önlemleri  
- [ ] Tor trafiğini gizlemek için **meek veya obfs4 köprüleri** kullan.  
  - [Tor Bridge Kullanımı](https://bridges.torproject.org/)  
- [ ] Tor giriş düğümlerine olan bağlantını şifrelemek için **Pluggable Transports** kullan.  
- [ ] Tor kullanırken sistemdeki diğer uygulamaların **internete çıkışını engelle** (örneğin: `iptables` veya **Whonix Gateway**).  
- [ ] Donanım seviyesinde gizlilik için **Tails OS** veya **Qubes OS** kullan.  

## ✅ 6. Çıkış ve İz Temizleme  
- [ ] Tor oturumunu kapatırken **cache ve çerezleri temizle**.  
- [ ] Kullanılan IP adresini kontrol etmek için güvenilir bir servis kullan:  
  - [Check Tor IP](https://check.torproject.org/)  
- [ ] **RAM disk kullanarak** geçici dosyaları tamamen sil (örn: `tmpfs`).  
- [ ] Tor dışında sistemde herhangi bir veri izi bırakmadığından emin ol (örn: `BleachBit`).  

Bu adımları uygulayarak Tor ağında maksimum anonimlik sağlayabilirsin.
