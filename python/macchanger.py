import subprocess
import argparse
import re

def get_arguments():
    parser = argparse.ArgumentParser()
    parser.add_argument("-i", "--interface", dest="interface", help="MAC adresini değiştirmek için arayüz")
    parser.add_argument("-m", "--mac", dest="new_mac", help="Yeni MAC adresi")
    options = parser.parse_args()
    if not options.interface:
    	parser.error('- Please check interface')
    elif not options.new_mac:
    	parser.error('- Please check mac address')
    return options

def macchanger(interface, new_mac):
    print("[+] " + interface + " arayüzü için MAC adresi " + new_mac + " olarak değiştiriliyor")
    subprocess.call(["ifconfig", interface, "down"])
    subprocess.call(["ifconfig", interface, "hw", "ether", new_mac])
    subprocess.call(["ifconfig", interface, "up"])

def get_new_mac_address(interface):
    ifconfig_result = subprocess.check_output(["ifconfig",interface])
    output_regex = re.search(rb"\s([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})",ifconfig_result)
    
    if output_regex:
        output_regex = output_regex.group(0).decode('utf-8')
        return "[+] New MAC Address ->" + output_regex
    else:
        return "Not found mac address" 
def get_past_mac_address(interface):
    ifconfig_result = subprocess.check_output(["ifconfig",interface])
    output_regex = re.search(rb"\s([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})",ifconfig_result)
    
    if output_regex:
        output_regex = output_regex.group(0).decode('utf-8')
        return "[+] Past MAC Address ->" + output_regex
    else:
        return "Not found mac address" 
options = get_arguments()
print(get_past_mac_address(options.interface))
macchanger(options.interface, options.new_mac)
print(get_new_mac_address(options.interface))

