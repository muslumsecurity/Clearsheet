import scapy.all as scapy


def scan(ip): #ip aralığının alınarak broadcast yayınının gerçekleştirileceği fonksiyon
    arp_request = scapy.ARP(pdst=ip) #hedef ip aralığı veya ip
    broadcast = scapy.Ether(dst="ff:ff:ff:ff:ff:ff") #hedef mac adresi.
    arp_request_broadcast = broadcast/arp_request #yayın yapıyoruz.
    answered_list = scapy.srp(arp_request_broadcast,timeout=1,verbose=False)[0] # 
    clients_list = [] 
    
    for element in answered_list:
        client_list = {"ip" : element[1].psrc, "mac" : element[1].hwsrc}
        clients_list.append(client_list)
    return clients_list

def print_result(result_list):
    print("IP\t\t\tMAC Address\n------------------------------------")
    for client in result_list:
        print(client["ip"]+"\t\t"+client["mac"])





scan_result = scan("1.1.1.1/24")
print_result(scan_result)
