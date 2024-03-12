import schedule
import time
import argparse
import re
import subprocess


def get_arguments():
    parser = argparse.ArgumentParser()
    parser.add_argument("-i", "--interface", dest="interface", help="MAC adresini değiştirmek için arayüz")
    
    options = parser.parse_args()
    if not options.interface:
        parser.error('Please check interface')
    return options

def scan_mac(interface):
    mac_address = "00:11:22:33:44:56"
    ifconfig_result = subprocess.check_output(["ifconfig",interface])
    output_regex = re.search(r"ether\s([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})", str(ifconfig_result))
    
    if output_regex:
        current_mac = output_regex.group(0).split()[1]
        if current_mac == mac_address:
            print("Mac adresi değiştirilmemiş.")
        else:
            print("Mac adresi değişmiş.")
    else:
        print("Mac adresi bulunamadı.")

options = get_arguments()

schedule.every(5).seconds.do(scan_mac, interface=options.interface)

while True:
    schedule.run_pending()
    time.sleep(1)
