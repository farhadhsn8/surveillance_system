import cv2 

def cat(cat_classifier,gray,img):
    # Detects faces of different sizes in the input image 
    cat = cat_classifier.detectMultiScale(gray, 1.3, 5) 

    for (x,y,w,h) in cat: 
        # To draw a rectangle in a face 
        cv2.rectangle(img,(x,y),(x+w,y+h),(255,255,0),2) 
    # Display an image in a window 
    cv2.imshow('img',img) 






def fullBody(body_classifier,gray,img):
    # Detects faces of different sizes in the input image 
    bodies = body_classifier.detectMultiScale(gray)
    
    # Extract bounding boxes for any bodies identified
    for (x,y,w,h) in bodies:
        cv2.rectangle(img, (x, y), (x+w, y+h), (255, 90, 120), 2)
    cv2.imshow('img', img)


def upperBody(ubody_classifier,gray,img):
    # Detects faces of different sizes in the input image 
    ubodies = ubody_classifier.detectMultiScale(gray)
    
    # Extract bounding boxes for any bodies identified
    for (x,y,w,h) in ubodies:
        cv2.rectangle(img, (x, y), (x+w, y+h), (0, 0, 255), 2)
    cv2.imshow('img', img)
  


def face(face_classifier,gray,img):
    # Detects faces of different sizes in the input image 
    faces = face_classifier.detectMultiScale(gray, 1.0485258, 6)
    
    # Extract bounding boxes for any bodies identified
    for (x,y,w,h) in faces:
        cv2.rectangle(img, (x, y), (x+w, y+h), (40, 255, 20), 2)
    cv2.imshow('img', img) 



def body(img):
    hog = cv2.HOGDescriptor() 
    hog.setSVMDetector(cv2.HOGDescriptor_getDefaultPeopleDetector()) 
# Detecting all humans 
    (humans, _) = hog.detectMultiScale(img,  
                                        winStride=(5, 5), 
                                        padding=(0, 0), 
                                        scale=1.21)
    # getting no. of human detected
    # print('Human Detected : ', len(humans))
    
    # Drawing the rectangle regions
    for (x, y, w, h) in humans: 
        cv2.rectangle(img, (x, y),  
                    (x + w, y + h),  
                    (0, 0, 255), 2) 
    
    # Displaying the output Image 
    cv2.imshow("img", img) 