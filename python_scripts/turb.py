import requests
import json
from bs4 import BeautifulSoup

with open("airportlatlong.json") as json_file:
    data = json.load(json_file)

codes = data.keys()

def calc_turbulence(src, dst):
    src_airport_code = src
    dst_airport_code = dst

    request_str = "https://www.aviationweather.gov/adds/dataserver_current/httpparam?dataSource=gairmets&requestType=retrieve&format=xml&flightPath=10;" + str(data[src_airport_code]['lng']) + "," + str(data[src_airport_code]['lat'])+ ";" + str(data[dst_airport_code]['lng']) + "," + str(data[dst_airport_code]['lat']) + "&hoursBeforeNow=3"
    r = requests.get(request_str)

    def myfilter(tag):
        return tag.name == "GAIRMET" and (tag.contents[15].attrs['type'] == 'TURB-HI' or tag.contents[15].attrs['type'] == 'TURB-LO') 

    soup = BeautifulSoup(r.text, "xml")
    gairmet = soup.find_all(myfilter)

    low_turb = 0
    high_turb = 0
    totgs = 0

    for child in gairmet:
        totgs += 1
        if child.contents[15].attrs['type'] == 'TURB-HI':
        	high_turb += 1
        elif child.contents[15].attrs['type'] == 'TURB-LO':
        	low_turb += 1

    return (float(totgs)/298)*100