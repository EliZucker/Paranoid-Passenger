import requests
import json

def GetTSAWaitTimes(airportCode):
    """
    Returns data from the TSA Wait Times API for a particular airport shortcode.
    :param airportCode: 3-letter shortcode of airport
    :return: Returns the full parsed json data from TSA Wait Times API
    """
    base_url = "http://apps.tsa.dhs.gov/MyTSAWebService/GetTSOWaitTimes.ashx"
    params_tsa_d = {}
    params_tsa_d['ap'] = airportCode
    params_tsa_d['output'] = 'json'
    try:
        ## Uncomment this line if you want to get with caching for testing purposes
        #tsa_result_diction = json.loads(get_with_caching(base_url, params_tsa_d, saved_cache, cache_fname))

        ## Comment out these two lines if you want to enable caching
        results_tsa = requests.get(base_url, params=params_tsa_d)
        tsa_result_diction = json.loads(results_tsa.text)
        return tsa_result_diction

    except Exception:
        print("Error: Unable to load TSA wait times. Please try again.")
        print("Exception: ")
        # sys.exit(1)
        quit()

def ParseData(AirportCode):
	#4am-11am is Morning, 11:01 - 4pm afternoon, 4:01 - 8:00 pm evening, 8:01-3:59 is night
	DataList = GetTSAWaitTimes(AirportCode)['WaitTimes']
	Morning = 0
	Mcount = 0
	Afternoon = 0
	Acount = 0
	Evening = 0
	Ecount = 0
	Night = 0
	Ncount = 0
	for x in DataList:
		time1 = x['Created_Datetime'][10:13]
		translation_table = dict.fromkeys(map(ord, ':'), None)
		time1 = time1.translate(translation_table).strip()[0]
		time2 =	x['Created_Datetime'][-8:-6]
		time = int(float(time1 + time2))
		period = x['Created_Datetime'][-2:]
		if (400 <= time) and (time <= 1100) and (period == 'AM'):
			Morning += int(x['WaitTime'])
			Mcount += 1
		elif ((1100 < time) and (period == 'AM')) or ((time <= 400) and (period == 'PM')):
			Afternoon += int(x['WaitTime'])
			Acount += 1
		elif (400 < time) and (time <= 800) and (period == 'PM'):
			Evening += int(x['WaitTime'])
			Ecount += 1
		else:
		#(800 < x) and (((x < 1200) and (period == 'PM')) or ((1200 <= x) and (period == 'AM'))):
			Night += int(x['WaitTime'])
			Ncount += 1
	if Mcount == 0:
		Mout = 0
	else:
		Mout = float(Morning) / Mcount
	if Acount == 0:
		Aout = 0
	else:
		Aout = float(Afternoon) / Acount
	if Ecount == 0:
		Eout = 0
	else:
		Eout = float(Evening) / Ecount
	if Ncount == 0:
		Nout = 0
	else:
		Nout = float(Night) / Ncount
	return {'Morning': Mout, 'Afternoon': Aout, 
			'Evening': Eout, 'Night': Nout}
