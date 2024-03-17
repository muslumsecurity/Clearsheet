import scapy.all as scapy
from scapy.layers import http

# Define dir_list here if needed


def sniff(interface):
    scapy.sniff(iface=interface, prn=process_sniffed_packet, store=False)


def get_url(packet):
    url = packet[http.HTTPRequest].Host.decode() + packet[http.HTTPRequest].Path.decode()
    return url


def ext_data(packet):
    if packet.haslayer(scapy.Raw):
        load = packet[scapy.Raw].load.decode()
        return load
   


def process_sniffed_packet(packet):
    if packet.haslayer(http.HTTPRequest):
        url = get_url(packet)
        print("[+] HTTP host:" + url)
        print("------------- DATA -------------------")
        data = ext_data(packet)
        if data:
            print('[+] Data ->' + str(data))
        print("-----------------------------------")
	    



sniff('eth0')
