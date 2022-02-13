import RPi.GPIO as GPIO
import time
import MySQLdb
from datetime import datetime

database = MySQLdb.connect(
    host="192.168.195.139",
    port=3306,
    user="root",
    passwd="password",
    db="zonnepanelen"
)

cursor = database.cursor()

tijdstip = 0
switch = False

GPIO.setwarnings(False)
GPIO.cleanup()

GPIO.setmode(GPIO.BCM)

GPIO.setup(17, GPIO.IN) #gpio 17 als input LDR
GPIO.setup(23, GPIO.IN, pull_up_down=GPIO.PUD_UP)#Button to GPIO23
GPIO.add_event_detect(23, GPIO.RISING, bouncetime=900)

GPIO.setup(18, GPIO.OUT) #gpio 18 als output
GPIO.setup(27, GPIO.OUT) #gpio 27 als output LED


try:
    while True:

        switch == switch

        if (GPIO.input(17) == 0): # input 17 = low
            tijdstip=datetime.now()
            print ("nacht")
            time.sleep(0.5)
            print("vuur uit")
            print(tijdstip)
            time.sleep(1)

            GPIO.output(18, GPIO.HIGH)
            GPIO.output(27, GPIO.LOW)

            cursor.execute("UPDATE zonnepanelen.lamp SET value = False WHERE value = True;")
            database.commit()

        else:    
            if (GPIO.input(23) == 1 & switch == False):

                tijdstip=datetime.now()

                GPIO.output(27, GPIO.LOW)

                print("vuur uit")
                print(tijdstip)

                cursor.execute("UPDATE zonnepanelen.lamp SET value = False WHERE value = True;")
                database.commit()

                switch = True

                time.sleep(0.2)

            elif(GPIO.input(23) == 0 & switch == False):

                tijdstip=datetime.now()

                GPIO.output(27, GPIO.HIGH)

                print ("vuur aan")
                print(tijdstip)

                cursor.execute("UPDATE zonnepanelen.lamp SET value = True WHERE value = False;")
                database.commit()

                switch = False

                time.sleep(0.2)



except KeyboardInterrupt:
	GPIO.output(27, GPIO.LOW)
	GPIO.cleanup()