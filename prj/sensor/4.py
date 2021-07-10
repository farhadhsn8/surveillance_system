import cv2 
import func 

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
  
    # convert to gray scale of each frames 
    gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY) 
  
    func.fullBody(body_classifier,gray,img)
    func.cat(cat_classifier,gray,img)
    func.face(face_classifier,gray,img)
    func.upperBody(ubody_classifier,gray,img)
    # func.body(img)
    # Wait for Esc key to stop 
    if cv2.waitKey(1) & 0xFF == ord('q'):
        break
  
# Close the window 
cap.release() 
  
# De-allocate any associated memory usage 
cv2.destroyAllWindows() 




