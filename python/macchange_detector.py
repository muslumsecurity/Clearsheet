import schedule
import time
import argparse
import re
import subprocess


def get_arguments():
    parser = argparse.ArgumentParser()
    parser.add_argument("-i", "--interface", dest="interface", help="MAC adresini değiştirmek için arayüzü giriniz.")
    parser.add_argument("-m","--mac",dest="mac",help="Lütfen denetlenmesi gereken mac adresini gir.")
    
    options = parser.parse_args()
    if not options.interface:
        parser.error('Please check interface')
    return options

def scan_mac(interface,mac):
    ifconfig_result = subprocess.check_output(["ifconfig",interface])
    output_regex = re.search(r"ether\s([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})", str(ifconfig_result))
    
    if output_regex:
        current_mac = output_regex.group(0).split()[1]
        if current_mac == mac:
            print("Mac adresi değiştirilmemiş.")
        else:
            print("Mac adresi değişmiş.")
    else:
        print("Mac adresi bulunamadı.")

options = get_arguments()
schedule.every(5).seconds.do(scan_mac, interface=options.interface,mac=options.mac)

while True:
    schedule.run_pending()
    time.sleep(1)
