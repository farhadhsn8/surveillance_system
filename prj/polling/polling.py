import mysql.connector
import datetime
import smtplib
import time

DELTA_TIME= 3 # days

def last_event(): 

    mydb = mysql.connector.connect(
     host="localhost",
     user="root",
     password="",
     port = 3308 ,
     database="surveillance_system"
    )

   
    mycursor = mydb.cursor()
    sql = "SELECT MAX(created_at) AS last_event FROM events"
    mycursor.execute(sql)
    a = mycursor.fetchall()

    return a[0][0]
    



def send_email():

    sender = "Private Person <from@example.com>"
    receiver = "A Test User <to@example.com>"

    message = f"""\
    Subject: Hi Mailtrap
    To: {receiver}
    From: {sender}

    This is a test e-mail message."""

    with smtplib.SMTP("smtp.mailtrap.io", 2525) as server:
        server.login("ce70479941bcd8", "3099e12e94aa65")
        server.sendmail(sender, receiver, message)
    return 1






lock = 0 # send email once a day
while 1:
    now = datetime.datetime.now()
    if(now - last_event() > datetime.timedelta(days=DELTA_TIME) and lock == 0):
        print('email')
        send_email()
        print('email')
        lock = 1

    if(now - last_event() > datetime.timedelta(days=DELTA_TIME + 1) and lock == 1):
         lock = 0
    time.sleep(5)

    
        