| `ufw` Komutu                                   | Eşdeğer `iptables` Komutu                                                                                           |
|-----------------------------------------------|--------------------------------------------------------------------------------------------------------------------|
| `ufw enable`                                   | `iptables -P INPUT ACCEPT`<br>`iptables -P FORWARD ACCEPT`<br>`iptables -P OUTPUT ACCEPT`<br>`iptables-save`      |
| `ufw disable`                                  | `iptables -P INPUT DROP`<br>`iptables -P FORWARD DROP`<br>`iptables -P OUTPUT DROP`<br>`iptables-save`            |
| `ufw verbose status`                          | `iptables -L -n -v`                                                                                                |
| `ufw status numbered`                         | `iptables -L INPUT --line-numbers`<br>`iptables -L FORWARD --line-numbers`<br>`iptables -L OUTPUT --line-numbers` |
| `ufw delete <rule_number>`                    | `iptables -D INPUT <rule_number>`<br>`iptables -D FORWARD <rule_number>`<br>`iptables -D OUTPUT <rule_number>`     |
| `ufw allow <port_number>`                      | `iptables -A INPUT -p tcp --dport <port_number> -j ACCEPT`<br>`iptables -A INPUT -p udp --dport <port_number> -j ACCEPT`   |
| `ufw allow <port_number>/<protocol>`           | `iptables -A INPUT -p <protocol> --dport <port_number> -j ACCEPT`                                                  |
| `ufw allow from <ip_address>`                  | `iptables -A INPUT -s <ip_address> -j ACCEPT`                                                                      |
| `ufw allow from <ip_subnet>`                   | `iptables -A INPUT -s <ip_subnet> -j ACCEPT`                                                                       |
| `ufw allow from <ip_address> to any port <port_number> proto <protocol>` | `iptables -A INPUT -s <ip_address> -p <protocol> --dport <port_number> -j ACCEPT`                          |
| `ufw deny <port_number>`                       | `iptables -A INPUT -p tcp --dport <port_number> -j DROP`<br>`iptables -A INPUT -p udp --dport <port_number> -j DROP`       |
| `ufw deny <port_number>/<protocol>`            | `iptables -A INPUT -p <protocol> --dport <port_number> -j DROP`                                                  |
| `ufw deny from <ip_address>`                   | `iptables -A INPUT -s <ip_address> -j DROP`                                                                       |
| `ufw deny from <ip_subnet>`                    | `iptables -A INPUT -s <ip_subnet> -j DROP`                                                                        |
