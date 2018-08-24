locations = {
	'CDC Roybal': "1",
	'DFAS Columbus': "2",
	'DSCC Columbus': "3",
	'Facilities Perf. Svcs.': "4",
	'Ft. Pierce, FL': "5",
	'Ft. Pierce, FL - Shop': "6",
	'HQ Monroe': "7",
	'IRS Covington': "8",
	'IRS Georgia': "9",
	'KCDC': "10",
	'Kettering': "11",
	'NIOSH': "12",
	'NOAA': "13",
	'USDA Athens': "14",
	'USDA Ft. Pierce': "15",
}

departments = {
	'Bldg 1': "1",
	'Bldg 14': "2",
	'Bldg 15': "3",
	'Bldg 16': "4",
	'Bldg 17': "5",
	'Bldg 18': "6",
	'Bldg 19': "7",
	'Bldg 21': "8",
	'Bldg 23': "9",
	'Bldg 23 Shop': "10",
	'Bldg 24': "11",
	'Null': "12",
	'Bldg. 21A': "13",
	'Bldg. 11 Section 1': "14",
	'Bldg.21': "15",
	'Bldg. 20A': "16",
	'Bob Stokes': "17",
	'Chris Rice': "18",
	'Cx room': "19",
	'Dom Dufourcq': "20",
	'Gary Robinson': "21",
	'Nick McDonald': "22",
	'John Pasqualetti': "23",
	'Ken Yockey': "24",
	'Mark Newcomb': "25",
	'Marty Wyatt': "26",
	'Mike S office cabinet': "27",
	'Mike Spaulding': "28",
	'Mike Spaulding office': "29",
	'MPA storage room': "30",
	'broken-not used': "31",
	'Rory Cousino': "32",
	'unknown': "33",
	'unknown was mark h': "34",
	'Storage / Shop Area': "35",
	'Maintenance Shop Area': "36",
	'Site': "37",
	'Garage': "38",
	'Central Plant': "39",
	'Loading Dock': "40",
	'Boiler Room': "41",
	'Storage/Shop': "42",
	'Storage/Shop/ Kevin Harris': "43",
	'Kevin Harris / Rick Miley': "44",
	'Kevin Harris': "45",
	'Rick Miley': "46",
	'Tool Crib': "47",
	'Penthouse': "48",
	'W. Huff': "49",
	'T. Rauch': "50",
	'S. Ubrey': "51",
	'R. Baker': "52",
	'R.Moon': "53",
	'R.Kaake': "54",
	'M.Clyburn': "55",
	'K.Bonapfel': "56",
	'Taft - Br': "57",
	'Taft Metal Shed': "58",
	'Taft': "59",
	'M.Oliver': "60",
	'L.Branscum': "61",
	'B.Williams': "62",
	'Hamilton Site': "63",
	'Hamilton Site - Steve Waldbillig': "64",
	'Hamilton Site - Steve Bonapfel': "65",
	'Hamilton Site - Bernard Capal': "66",
	'Hanilton Site - Bernard Capap': "67",
	'Hamilton Site - Kevin Kuhl': "68",
	'Hamilton Site - Roger Gainer': "69",
	'RRC': "70",
	'SEP': "71",
	'Sheetmetal Shop': "72",
	'Janitorial': "73",
	'Guardhouse': "74",
	'Admin Office': "75"
}

conditions = {
	'A': "1",
	'B': "2",
	'C': "3",
	'D': "4",
	'E': "5"
}



with open('tools.txt', 'r') as tools:
	with open('toolsfixed.txt', 'w') as toolsfixed:
		for line in tools:
			fixed_line = ''
			for department, number in departments.items():
				line = line.replace("'{}'".format(department), number)
			for location, number in locations.items():
				line = line.replace("'{}'".format(location), number)
			for condition, number in conditions.items():
				line = line.replace("'{}'".format(condition), number)
			toolsfixed.write(line)
