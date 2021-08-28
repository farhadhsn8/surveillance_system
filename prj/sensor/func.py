import cv2 
import datetime
import mysql.connector
from numpy import random
import requests




def cat(cat_classifier,gray,img,catCounter ,catTime):
    # Detects faces of different sizes in the input image 
    cat = cat_classifier.detectMultiScale(gray, 1.3, 5) 
    for (x,y,w,h) in cat: 
        # To draw a rectangle in a face 
        cv2.rectangle(img,(x,y),(x+w,y+h),(255,255,0),2)

    if(len(cat) != 0):
        catCounter += 1
    if(catCounter >= 3):
        print(cat)
        catCounter=0
        catTime = datetime.datetime.now()
        sendEvent(img ,catTime ,"cat" )

    # Display an image in a window 
    cv2.imshow('img',img) 
    return catTime , catCounter





def fullBody(body_classifier,gray,img,bodyCounter ,bodyTime):
    # Detects faces of different sizes in the input image 
    bodies = body_classifier.detectMultiScale(gray)
    
    # Extract bounding boxes for any bodies identified
    for (x,y,w,h) in bodies:
        cv2.rectangle(img, (x, y), (x+w, y+h), (255, 90, 120), 2)

    if(len(bodies) != 0):
        bodyCounter += 1
    if(bodyCounter >= 3):
        print(bodies)
        bodyCounter=0
        bodyTime = datetime.datetime.now()
        sendEvent(img ,bodyTime ,"body" )

    cv2.imshow('img', img)
    return bodyTime , bodyCounter 






def upperBody(ubody_classifier,gray,img,bodyCounter ,bodyTime):
    # Detects faces of different sizes in the input image 
    ubodies = ubody_classifier.detectMultiScale(gray)


    # Extract bounding boxes for any bodies identified
    for (x,y,w,h) in ubodies:
        cv2.rectangle(img, (x, y), (x+w, y+h), (0, 0, 255), 2)

    if(len(ubodies) != 0):
        bodyCounter += 1
    if(bodyCounter >= 3):
        print(ubodies)
        bodyCounter=0
        bodyTime = datetime.datetime.now()
        sendEvent(img ,bodyTime , "body")

    cv2.imshow('img', img )
    return bodyTime , bodyCounter



def face(face_classifier,gray,img,faceCounter , faceTime):
    # Detects faces of different sizes in the input image 
    faces = face_classifier.detectMultiScale(gray, 1.0485258, 6)

    # Extract bounding boxes for any bodies identified
    for (x,y,w,h) in faces:
        cv2.rectangle(img, (x, y), (x+w, y+h), (40, 255, 20), 2)

    if(len(faces) != 0):
        faceCounter += 1
    if(faceCounter >= 3):
        print(faces)
        faceTime = datetime.datetime.now()
        faceCounter=0
        sendEvent(img ,faceTime , "face")

    cv2.imshow('img', img) 
    return faceTime , faceCounter






def saveEvent(img , time ,type): #depreciate

    mydb = mysql.connector.connect(
     host="localhost",
     user="root",
     password="",
     port = 3308 ,
     database="surveillance_system"
    )

    time = time.strftime('%Y-%m-%d')
    
    address = 'images/' + type + '_' + str(time) + '_' + str(random.randint(100000)) + '.png'    
    status = cv2.imwrite(address , img)
    print(status)
    mycursor = mydb.cursor()

    sql = "INSERT INTO events ( image , created_at ,type ) VALUES (%s, %s , %s)"
    val = ( address , time , type)
    mycursor.execute(sql, val)




def sendEvent(img , time ,type):

    URL = "http://localhost:8000/api/event/create"
    
    time = time.strftime('%Y-%m-%d')
    
    address =  type + '_' + str(time) + '_' + str(random.randint(100000)) + '.png'
    status = cv2.imwrite('images/'+
    address , img)
    cv2.imwrite('../controller/public/images/'+address , img)
    print(status)

    data = {'type': type ,
            'image' : address }
  
    r = requests.post(url = URL, data = data)

    # extracting response text 
    pastebin_url = r.text
    print("The pastebin URL is:%s"%pastebin_url)
    











# def body(img):
#     hog = cv2.HOGDescriptor() 
#     hog.setSVMDetector(cv2.HOGDescriptor_getDefaultPeopleDetector()) 
# # Detecting all humans 
#     (humans, _) = hog.detectMultiScale(img,  
#                                         winStride=(5, 5), 
#                                         padding=(0, 0), 
#                                         scale=1.21)
#     # getting no. of human detected
#     # print('Human Detected : ', len(humans))
    
#     # Drawing the rectangle regions
#     for (x, y, w, h) in humans: 
#         cv2.rectangle(img, (x, y),  
#                     (x + w, y + h),  
#                     (0, 0, 255), 2) 
    
#     # Displaying the output Image 
#     cv2.imshow("img", img) 






