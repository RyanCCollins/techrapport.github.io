---
title: "Meme-Me App v2.0 Finished"
description: "Tech Rapport's Blog - How the Udacity iOS Nanodegree Changed my Life"
categories: "iOS Dev"
published: true
comments: true
tags: [ios development, Udacity, Nanodegree]
image_square: blog-image-1.jpg
image: meme-me.jpg
---

Today, I finished version 2.0 of the iOS Meme-Me meme maker app.  It has been submitted and I expect it to exceed specifications.

Check out the [ GitHub project page](http://techrapport.github.io/Meme-Me), or visit our [portolio site](http://techrapport.com/projects/).  Also, take a look at the [project specifications](https://docs.google.com/document/d/1G2onkzN_weWmiYErhQJw1lB9-zxM-2TQ0N5bNMAaI7I/pub?embedded=true) and [project rubric](https://docs.google.com/document/d/1ni0X5sjS0NreQqBHJpg8Z0foAYwegfGTPPdBKTPskPI/pub?embedded=true).  Once it has been evaluated, you will be able to see it on my Udacity profile.  Contact me if you have any questions, or would like to discuss this project.

Please note that I will be releasing this app to the [iOS App Store](http://www.apple.com/itunes/charts/free-apps/) once I have completed version 3.  I will be adding many new features, including a random meme generator, Flickr integration and more.  See the ReadMe file below for details on the project and get in touch with me if you like it!  Also, [subscribe to my blog](http://techrapport.com/feed.xml) to get alerted about when this app will be published to the app store.

# Meme-Me - Read Me
Meme v2.0 - Udacity iOS nanodegree
by TechRapport -[http://TechRapport.com](http://TechRapport.com)

This app was created as a project for the Udacity iOS Nanodegree. Before taking the course, I took a month long course on UIKit Fundamentals through Udacity. This course firmed up my working knowledge of Apple's UIKit framework, which is used extensively for UI design, control and navigation. 

The app offers the following features:
- Create a Meme by taking or selecting a photo
- Add text to the top and bottom
- Change the color, font and size of the text
- Share and Save your Meme
- View saved Memes in a UITableView and a UICollectionView
- View a saved Meme
- Edit a saved Meme

See the extra credit features and what I intend to add next below.

<!-- more -->

####Technologies and best practices used
Some of the more notable technologies and best practices I used in this app are shown below. I also wrote about some of these subjects in [my blog](http://TechRapport.com/blog/) in the Swift development section.
- UIKit
  - UINavigationControllers
  - UITableViews
  - UICollectionViews
- MotionKit
- Delegation
- MVC
- NSNotifications
- Extensions

As I stated above, I developed this application using several important design paradigms and best practices. Most notably, I used Model View Controller (MVC) extensively. I created a Model object for storing and processing Memes, several View Controllers for controlling navigation, writing to the model and updating the display. I also utilized [class extensions](http://techrapport.com/blog/2015/10/13/extensions-demystified), [NSNotifications](http://techrapport.com/blog/2015/10/08/ns-notifications/), the delegate design pattern and more. I really enjoyed using Swift 2.0 and found that I was able to add a lot of functionality very easily using extensions. 

###Git & GitHub
although, I have been using Git and other version control systems for many years, I have never used github professionally because my professional work has been private. I used best practices when using Git and github. I used separate branches for the two versions, wrote commit messages that were clear and concise, used Git to debug and I commit at logical points. 

###Extra Credit
In order to receive extra credit and to receive Exceeds Specifications, I added additional functionality to v2.0 of Meme-Me. Some of the functionality that I added are shown below:

####Color and font picker, which both show as UIPopoverViews. 

The color picker is really great and allows the user to select a color by gliding their finger over a group of colors, each of which shows up inside of a magnifying glass, showing the user which color they selected. As the color is picked, the font is updated in the view and the color/font attributes are stored with that instance of the Meme, so the user can edit the meme at a later time. 

####Shake to reset

I added a shake to reset feature, which greatly improved the experience by allowing the user to shake the phone to reset the font back to default. I did this using a single extension, which extends UIViewController. 

####Extensions for delegates

As I was developing this app, I realized that my code was getting a bit complex, especially after I added delegate functions for the text fields, UITableViews, UICollectionViews, and other UIKit compononents. In order to make the code more readable and manageable, I once again used UIViewController extensions in order to add the delegate functions. I find that this is good practice as long as you contain the extensions in one file, preferably in the same file of the view controller that utilizes them. I would recommend utilizing extensions for basic delegate functionality that will be shared throughout your app. 

####More features

Well, you'd think that I would be done with this app, but I am not. In the next iteration, I will be including Flickr images and randomly generated Memes. Keep a watch out for the next revision. 

A special thanks goes to: "Christian Zimmermann" who wrote the code for the SwiftColorPicker. You can view his GitHub page here: [https://github.com/Christian1313/iOS_Swift_ColorPicker](https://github.com/Christian1313/iOS_Swift_ColorPicker).

Please take a look at my blog to learn about how Udacity has helped me succeed: [Tech Rapport's Blog](http://TechRapport.com/blog/)

&copy Tech Rapport 2015 - http://TechRapport.com
