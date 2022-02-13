from datetime import datetime
import requests
import json
import time
from datetime import datetime
import MySQLdb
plekken = []
current_time = datetime.now().strftime('%H')
print('----------')
def getData(user):
    database = MySQLdb.connect(
    host="192.168.195.139",
    port=3306,
    user="root",
    passwd="password",
    db="zonnepanelen"
    )
    cursor = database.cursor()
    query= "select DISTINCT zonnepanelen_extras.user_id,zonnepanelen,location,piekuur from users inner join zonnepanelen_extras on users.id = zonnepanelen_extras.user_id inner join locations on users.id = locations.user_id where users.id = " + str(user)
    plaatsenvrij = cursor.execute(query)
    rows = cursor.fetchall()
    for row in rows:
      plekken.append(row[0])
      plekken.append(row[1])
      plekken.append(row[2])
      plekken.append(row[3])
      print('Berekenen data voor user' + str(plekken[0]))
    api_key = "3549103ef3613a207b01cf22509d8d84"
    FMT = '%H'
    url = "http://api.openweathermap.org/data/2.5/weather?q=" + plekken[2] + ",be&APPID="+api_key
    response = requests.get(url)
    data = json.loads(response.text)
    sunrise = datetime.utcfromtimestamp(int(data['sys']['sunrise'])).strftime('%H')
    sunset = datetime.utcfromtimestamp(int(data['sys']['sunset'])).strftime('%H')
    suntime = datetime.strptime(sunset,FMT) - datetime.strptime(sunrise,FMT)
    sun = (100 - data['clouds']['all'])/100
    print('Aantal procent helder weer: ' + str(sun* 100) +'%')
    hours = int(str(suntime).split(':')[0])
    print('Aantal uur licht: ' + str(hours))
    print("De zon komt op om: " + str(sunrise))
    print("De zon gaat onder om: " + str(sunset))
    calc = plekken[3]*hours*sun
    output = ((calc/1000)*plekken[1])/24
    if current_time >= sunset or  current_time <= sunrise:
      print("Nacht")
      y = 0
      print('Verwachte Kwh: ' + str(y)) 
    else:
      print("Dag")
      calc = plekken[3]*hours*sun
      output = ((calc/1000)*plekken[1])/24
      y = output/60
      print('Verwachte Kwh: ' + str(y))
    cursor = database.cursor()
    sql ="INSERT INTO `zonnepanelen_data`(user_id,time,kwh) VALUES (%s,%s,%s)"
    val =(plekken[0],datetime.now().strftime('%Y-%m-%d, %H:%M:%S'),y)
    cursor.execute(sql, val)
    database.commit()
    print('UPDATED')
    print('----------')
    plekken.clear()


