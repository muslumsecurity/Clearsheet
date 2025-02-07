# 🚀 Swap Alanını Kapanışta Otomatik Sıfırlama

Bu rehber, **Linux ve Windows** sistemlerde swap (takas) alanını **bilgisayar kapanırken otomatik olarak sıfırlamak** için gerekli adımları içerir. **Cold Boot saldırılarına karşı ek güvenlik sağlar.**

---

## 📌 Linux: Kapanışta Swap Temizleme

### **1️⃣ Swap Temizleme Script'ini Kaydet**

1. **Script dosyasını oluştur:**
   ```bash
   sudo nano /usr/local/bin/clear_swap.sh
   ```
2. **Aşağıdaki kodu ekleyin:**
   ```bash
   #!/bin/bash
   echo "Swap devre dışı bırakılıyor..."
   swapoff -a
   
   echo "Swap alanı sıfırlanıyor..."
   dd if=/dev/zero of=/swapfile bs=1M status=progress
   
   echo "Swap alanı yeniden oluşturuluyor..."
   mkswap /swapfile
   
   echo "Swap yeniden etkinleştiriliyor..."
   swapon -a
   ```
3. **Dosyayı çalıştırılabilir yap:**
   ```bash
   sudo chmod +x /usr/local/bin/clear_swap.sh
   ```

---

### **2️⃣ Systemd Servisi ile Otomatik Çalıştırma**

1. **Servis dosyasını oluştur:**
   ```bash
   sudo nano /etc/systemd/system/clear_swap.service
   ```
2. **Şu içeriği ekleyin:**
   ```ini
   [Unit]
   Description=Clear Swap at Shutdown
   DefaultDependencies=no
   Before=shutdown.target reboot.target halt.target

   [Service]
   Type=oneshot
   ExecStart=/usr/local/bin/clear_swap.sh

   [Install]
   WantedBy=halt.target reboot.target shutdown.target
   ```
3. **Servisi etkinleştir:**
   ```bash
   sudo systemctl daemon-reload
   sudo systemctl enable clear_swap.service
   ```
4. **Test etmek için sistemi kapatıp aç:**
   ```bash
   sudo reboot
   ```

✅ **Linux kapanırken swap otomatik sıfırlanacak!** 🚀

---

## 📌 Windows: Kapanışta Swap Temizleme

### **1️⃣ PowerShell Script'ini Kaydet**

1. **Not Defteri aç ve şu kodları yapıştır:**
   ```powershell
   Write-Output "Windows Swap (Pagefile) sıfırlanıyor..."

   # Pagefile.sys'yi kapat
   wmic computersystem where name="%computername%" set AutomaticManagedPagefile=False
   wmic pagefileset delete

   # Pagefile dosyasını temizle
   Remove-Item C:\pagefile.sys -Force -ErrorAction SilentlyContinue

   # Swap alanını tekrar etkinleştir
   wmic pagefileset create name="C:\pagefile.sys"

   Write-Output "Swap sıfırlama tamamlandı. Yeniden başlatmanız gerekebilir."
   ```
2. **Dosyayı `C:\Scripts\clear_swap.ps1` olarak kaydet.**  

---

### **2️⃣ Kapanırken Çalıştırmak İçin Grup İlkesi (GPO) Kullanımı**

1. **`Win + R` → `gpedit.msc`** yaz ve çalıştır.  
2. **Bilgisayar Yapılandırması → Windows Ayarları → Komut Dosyaları (Shutdown)** kısmına git.  
3. **Kapanışta çalıştırılacak komut ekleyin:**
   ```powershell
   powershell.exe -ExecutionPolicy Bypass -File C:\Scripts\clear_swap.ps1
   ```
4. **Tamam'a bas ve çık.**  

---

### **3️⃣ Kayıt Defteri ile Otomatik Çalıştırma (Alternatif Yöntem)**

1. **`Win + R` → `regedit` yaz ve çalıştır.**  
2. **Şu konuma git:**  
   ```
   HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows\CurrentVersion\RunOnce
   ```
3. Sağ tıklayın → **Yeni > Dize Değeri** ekleyin ve adını **ClearSwap** yapın.  
4. **Değer olarak şu komutu girin:**  
   ```
   powershell.exe -ExecutionPolicy Bypass -File C:\Scripts\clear_swap.ps1
   ```
5. **Kaydedin ve çıkın.**  

✅ **Windows kapanırken swap otomatik sıfırlanacak!** 🚀  

---

## **🎯 Özet: Swap Kapanışta Otomatik Temizlenecek**

| **İşlem** | **Linux** | **Windows** |
|-----------|----------|------------|
| Swap Script | ✅ `/usr/local/bin/clear_swap.sh` | ✅ `C:\Scripts\clear_swap.ps1` |
| Servis ile Otomatik Çalıştırma | ✅ Systemd ile (`/etc/systemd/system/clear_swap.service`) | ✅ GPO veya Registry ile (`RunOnce`) |

**💡 Bu adımları takip ederek Cold Boot saldırılarına karşı ek güvenlik sağlayabilirsiniz!** 🔐
