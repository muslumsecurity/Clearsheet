# İş Ortamında OPSEC — Veri Saklama  

## ✅ 1. Şifreli Depolama Çözümleri  
- **VeraCrypt:** Açık kaynaklı bir disk şifreleme yazılımı. Hem harici diskleri hem de sistem disklerini şifreleyebilirsin.  
  - [VeraCrypt İndir](https://www.veracrypt.fr/en/Downloads.html)  
- **BitLocker:** Windows’un yerleşik tam disk şifreleme özelliği.  
  - [BitLocker Kullanımı](https://support.microsoft.com/tr-tr/windows/bitlocker-s%C3%BCr%C3%BCc%C3%BC-%C5%9Fifrelemesi-nedir-4d101e48-4d99-4a0b-aba1-87c8e1df7456)  
- **LUKS:** Linux tabanlı sistemlerde tam disk şifreleme için yaygın olarak kullanılır.  
  - [LUKS ile Şifreleme Kılavuzu](https://wiki.archlinux.org/title/Dm-crypt)  

## ✅ 2. Bulut Tabanlı Şifreli Depolama  
- **NextCloud:** Kendi sunucunda barındırabileceğin güvenli bir bulut çözümü.  
  - [NextCloud Kurulum](https://nextcloud.com/install/)  
- **Tresorit:** Güvenlik odaklı, şifreli bir bulut depolama hizmeti.  
  - [Tresorit Ana Sayfa](https://tresorit.com/)  
- **ProtonDrive:** ProtonMail’in sunduğu uçtan uca şifreli bulut depolama hizmeti.  
  - [ProtonDrive Hakkında](https://proton.me/drive)  

## ✅ 3. Şifre Yönetimi  
- **Bitwarden:** Açık kaynaklı ve güvenli bir şifre yöneticisi. Hem bireysel hem kurumsal kullanım için uygun.  
  - [Bitwarden İndir](https://bitwarden.com/)  
- **KeePass:** Yerel olarak şifreleri saklamak için popüler bir seçenek.  
  - [KeePass İndir](https://keepass.info/download.html)  
- **1Password:** Özellikle takım çalışmaları ve işletmeler için güçlü bir şifre yöneticisi.  
  - [1Password Ana Sayfa](https://1password.com/)  

## ✅ 4. Veri Yedekleme ve Güvenlik  
- **Acronis True Image:** Güvenli yedekleme ve disk klonlama yazılımı.  
  - [Acronis True Image](https://www.acronis.com/en-us/personal/computer-backup/)  
- **Duplicati:** Açık kaynaklı ve ücretsiz bir yedekleme çözümü. Verileri şifreleyerek yedekleme yapar.  
  - [Duplicati İndir](https://www.duplicati.com/)  
- **Verilerin Güvenli Şekilde Silinmesi:**  
  - `shred` (Linux): Disk üzerindeki verileri kalıcı olarak siler.  
    - Kullanım: `shred -v -n 3 [dosya_adı]`  
  - `sdelete` (Windows): Microsoft tarafından sunulan güvenli dosya silme aracı.  
    - [sdelete İndir](https://docs.microsoft.com/en-us/sysinternals/downloads/sdelete)  

## ✅ 5. Güvenli DNS ve Ağ Çözümleri  
- **NextDNS:** DNS sorgularını şifreleyerek gizlilik sağlar, aynı zamanda reklam ve izleyicileri engeller.  
  - [NextDNS Kurulum](https://nextdns.io/)  
- **Cloudflare DNS (1.1.1.1):** Hızlı ve güvenli DNS hizmeti. DoH (DNS over HTTPS) ve DoT (DNS over TLS) destekler.  
  - [Cloudflare 1.1.1.1 Hakkında](https://1.1.1.1/)
