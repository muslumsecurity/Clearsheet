import scapy.all as scapy
import re
import argparse
import subprocess

def get_argparse():
    parser = argparse.ArgumentParser()

    parser.add_argument("-i", "--interface", dest="interface", help="Write interface")
    parser.add_argument("-r", "--range", dest="iprange", help="Write range and subnet ex: 1/24")
    parser.add_argument("-s", "--subnets", dest="subnets", help="subnet ex: 24")
    options = parser.parse_args()
    if not options.interface or not options.iprange or not options.subnets:
        parser.error('Please provide both interface,range and subnet')
    return options

def scan(ip):
    arp_request = scapy.ARP(pdst=ip)
    broadcast = scapy.Ether(dst="ff:ff:ff:ff:ff:ff")
    arp_request_broadcast = broadcast / arp_request
    answered_list = scapy.srp(arp_request_broadcast, timeout=1, verbose=False)[0]
    lists = []
    for element in answered_list:
        client_list = {"ip": element[1].psrc, "mac": element[1].hwsrc}
        lists.append(client_list)
    return lists

def print_result(result):
    print("------------------------------")
    for i in result:
        print(i['ip'] + " at ->>\t"  + i['mac'])

def get_ip_address(interface, iprange, subnets):
    ifconfig_result = subprocess.check_output(["ifconfig", interface]).decode() # Decode bytes to string
    output_regex = re.search(r"(\d{1,3}\.){2}\d{1,3}\.", ifconfig_result)
  
    if output_regex:
        return output_regex.group(0) + iprange + "/" + subnets
    else:
        return "Not found ip"

get_ip = get_argparse()      
get_range = get_ip_address(get_ip.interface, get_ip.iprange, get_ip.subnets)
result = scan(get_range) 
print_result(result)
