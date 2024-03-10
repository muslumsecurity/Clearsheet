import subprocess
import argparse

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

options = get_arguments()
macchanger(options.interface, options.new_mac)
