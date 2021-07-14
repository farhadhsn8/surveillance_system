import cv2 
import func 
import datetime

PICTURE_TIME = 1
catCounter = 0
bodyCounter = 0
faceCounter = 0


catTime = datetime.datetime.now() - datetime.timedelta(minutes = PICTURE_TIME)
bodyTime = datetime.datetime.now() - datetime.timedelta(minutes = PICTURE_TIME)
faceTime = datetime.datetime.now() - datetime.timedelta(minutes = PICTURE_TIME)

cat_classifier = cv2.CascadeClassifier('data/haarcascade_frontalcatface.xml') 
body_classifier = cv2.CascadeClassifier('data/haarcascade_fullbody.xml') 
ubody_classifier = cv2.CascadeClassifier('data/haarcascade_upperbody.xml') 
face_classifier = cv2.CascadeClassifier('data/haarcascade_frontalface_default.xml') 


# capture frames from a camera 
cap = cv2.VideoCapture(0) 

# loop runs if capturing has been initialized. 
while 1: 
  
    # reads frames from a camera 
    ret, img = cap.read() 
    cv2.imshow('img',img)


    # convert to gray scale of each frames 
    gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY) 
    
    t_15mins_ago = datetime.datetime.now() - datetime.timedelta(minutes = PICTURE_TIME)
    if(catTime < t_15mins_ago):
        catTime , catCounter = func.cat(cat_classifier,gray,img,catCounter,catTime)
    if(bodyTime < t_15mins_ago):
        bodyTime , bodyCounter = func.fullBody(body_classifier,gray,img , bodyCounter,bodyTime)
        bodyTime , bodyCounter = func.upperBody(ubody_classifier,gray,img , bodyCounter,bodyTime)
    if(faceTime < t_15mins_ago):
        faceTime , faceCounter = func.face(face_classifier,gray,img , faceCounter,faceTime)
    # func.body(img)
    # Wait for Esc key to stop 
    if cv2.waitKey(1) & 0xFF == ord('q'):
        break
  
# Close the window 
cap.release() 
  
# De-allocate any associated memory usage 
cv2.destroyAllWindows() 




