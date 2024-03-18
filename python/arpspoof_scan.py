import re
import scapy.all as scapy
import argparse
import subprocess
import time
import schedule

def get_arguments():
    parser = argparse.ArgumentParser()
    parser.add_argument("-i", "--interface", dest="interface", help="Kontrol edilecek arayüzü gir.")
    parser.add_argument("-s", "--scan", dest="scan_ip", help="Kontrol range aralığı. ex:192.168.1.1/24")
    
    options = parser.parse_args()
    if not options.interface:
        parser.error('Please check interface')
    return options



def get_arp_table(scan_ip):
    arp_request = scapy.ARP(pdst=scan_ip)
    broadcast = scapy.Ether(dst="ff:ff:ff:ff:ff:ff")
    arp_request_broadcast = broadcast / arp_request
    answered_list = scapy.srp(arp_request_broadcast, timeout=1, verbose=False)[0]
    lists = []
    for element in answered_list:
        client_list = {"ip": element[1].psrc}
        lists.append(client_list)
    return lists



def get_route_ip():
    route_result = subprocess.check_output(["route","-n"])
    output_regex = re.search( r"0\.0\.0\.0\s+(\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})", str(route_result))
    
    if output_regex:
        gateway = output_regex.group(0).split()[1]
        if gateway:
            return gateway
        else:
            print("Maalesef gateway alınamadı..")
            
def check_arp_spoofing(scan_ip, gateway_ip):
    arp_scan = get_arp_table(scan_ip)
    gateway_count = 0
    for i in arp_scan:
        if i['ip'] == gateway_ip:
            gateway_count += 1  

    if gateway_count > 2:
        print('ARP spoofing gerçekleşmiş...')
    else:
        print("Bir sorun görünmüyor...")              

options = get_arguments()
gateway_ip = get_route_ip()
arp_scan = get_arp_table(options.scan_ip)

schedule.every(5).seconds.do(check_arp_spoofing, scan_ip=options.scan_ip,gateway_ip=gateway_ip)


while True:
    schedule.run_pending()
    time.sleep(2)
    

