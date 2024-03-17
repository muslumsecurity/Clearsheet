import scapy.all as scapy
from scapy.layers import http

# dir_list'i burada tanımlayın


def sniff(interface):
    scapy.sniff(iface=interface, prn=process_sniffed_packet, store=False)
    
def process_sniffed_packet(packet):
    if packet.haslayer(http.HTTPRequest):
        http_host = packet[http.HTTPRequest].Host.decode()
        http_path = packet[http.HTTPRequest].Path.decode()
        if packet.haslayer(scapy.Raw):
            load = packet[scapy.Raw].load.decode()
            print("[+] HTTP host:", http_host, "HTTP path:", http_path + " [+] ", sep=" ")
            print("------------- DATA -------------------")
            print(load)
            print("--------------------------------------")
    
                
sniff('eth0')
