import solar
import requests
import json
import time
from datetime import datetime
import MySQLdb
i = 1
database = MySQLdb.connect(
    host="192.168.195.139",
    port=3306,
    user="root",
    passwd="password",
    db="zonnepanelen"
    )
cursor = database.cursor()
query= "SELECT id FROM zonnepanelen.users where users.set = 1"
plaatsenvrij = cursor.execute(query)
rows = cursor.fetchall()
users = cursor.rowcount
for row in rows:
 solar.getData(int(row[0]))

