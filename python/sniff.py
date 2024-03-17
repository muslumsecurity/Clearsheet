import scapy.all as scapy
from scapy.layers import http

# dir_list'i burada tanımlayın


def sniff(interface):
    scapy.sniff(iface=interface, prn=process_sniffed_packet, store=False)

def get_url(packet):
    url = packet[http.HTTPRequest].Host.decode() +  packet[http.HTTPRequest].Path.decode()
    return url   
    
    
def process_sniffed_packet(packet):
    if packet.haslayer(http.HTTPRequest):
       url = get_url(packet)
        if packet.haslayer(scapy.Raw):
            load = packet[scapy.Raw].load.decode()
            print("[+] HTTP host:" + url)
            print("------------- DATA -------------------")
            print(load)
            print("--------------------------------------")
    
                
sniff('eth0')
