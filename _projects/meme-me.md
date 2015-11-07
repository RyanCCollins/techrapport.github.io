---
layout: project
key: 4
category: [iOS Apps]
title: "Meme Me"
description: "Udacity iOS Nanodegree - Meme Me v.2.0 - iOS Meme Maker"
project-page: 'https://github.com/techrapport/meme-me/'
downloads: 
  zip: 'https://github.com/TechRapport/Meme-Me/zipball/master'
  tarball: 'https://github.com/TechRapport/Meme-Me/tarball/master'
url: /projects/meme-me/'
feature: 
  image: /assets/images/portfolio/Meme-Me-portfolio-image.jpg
  alt: "Meme Me Udacity Portfolio Image"
  video: 'https://vimeo.com/144952948'
carousel:
  image:
    url: https://placehold.it/1920x540
    caption: "Caption"
    text: "Text description here"
  image:
    url: https://placehold.it/1920x540
    caption: "Caption"
    text: "Text description here"
  image:
    url: https://placehold.it/1920x540
    caption: "Caption"
    text: "Text description here"
build-info: ['Version: 2.0', 'iPhone: 4S or later', 'iPad: N/A', 'XCode: Version 7.1', 'iOS: 9.0', 'Swift: 2.0']
---

<figure class="center video-responsive">
  <iframe src="https://player.vimeo.com/video/144977322" width="750" height="421" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
  <figcaption>Meme Me Walkthrough - Download and Run my App</figcaption>
</figure>
<br>

##__Summary__
---
This app was created as a project for the Udacity iOS Nanodegree. Before creating this app, I took a month-long course on `UIKit Fundamentals` through Udacity. This course firmed up my working knowledge of Apple's `UIKit framework`, which is used extensively for UI design, control and navigation on the iOS platform. 

The app offers the following features:

+  Create a Meme by taking or selecting a photo
+  Add text to the top and bottom
+  Change the color, font and size of the text
+  Share and Save your Meme
+  View saved Memes in a `UITableView` and a `UICollectionView`
+  View a saved Meme
+  Edit a saved Meme
+  Delete saved Memes


##__Test the App__
---

To run this app, please do the following:

 1.  Download it to your computer using one of the download links above, from the [GitHub project page]({{page.project-page}}) or from my [portfolio page]({{site.url}}{{page.url}}) on the right-hand side.  
 2.  Once downloaded, open the project folder and then open the Pitch Perfect.xcodeproj file.
    - Make sure that you are testing the application on a device that it will run efficiently on (see build information on the right.)  
    - I recommend running it on an iPhone 6 or newer, but it will run fine on anything newer than an iPhone 4S.
 3.  If you are using the iPhone Simulator, please run it on a newer device such as the iPhone 6 or 6S Plus.  It should be compiled with XCode 7.0 or 7.1 in Swift 2.0.  I will update it over time when new versions of XCode are released.

Below is a short video guide to illustrate how you could build and run the app on a Mac running OSX El Capitan.

If you don't want to run it or can't for some reason, take a look at the video at the top of the page or screenshots below.  You can follow along with the video, or read the instructions below.

###__Technologies and best practices used__
---
Some of the more notable technologies and best practices I used in this app are listed below. I also wrote about some of these subjects in [my blog](http://TechRapport.com/blog/) in the Swift development section. 

__UIKit__:

__`UINavigationControllers`  `UITableViews`  `UICollectionViews` `UICollectionViewFlowLayout`  `UICollectionViewCell`__

__Other:__

__`MotionKit`  `Delegation`  `MVC (Model View Controller)`  `NSNotifications`  `Class Extensions`__

As I stated above, I developed this application using several important design paradigms and best practices. Most notably, I used __`Model View Controller`__ (MVC) extensively. I created a __`Meme Struct`__ model object, a `FontAttributes Struct` model and a `MemeCollection Struct` model for storing and processing Memes.  At this point, the app does not use `Core Data` to persist the data, but it will in the next version.

All `Model`, `View` and `Controller` components are completely separate of one another and Model and View objects only talk to one another through the view controller.  I used delegation & data source methods and `key-value observation` to insure this.  It will be very easy to utilize `Core Data` and networked data within this app since the Model is abstracted away from the `view` and `view controllers`.

I used Swift optionals and unwrapped them when necessary.  To avoid bugs, I only used implicitly unwrapped optionals on values that I knew would never be null, otherwise I was safe and unwrapped optionals.

I created several View Controllers for controlling navigation, writing to the model and updating the display. I also utilized `class extensions`, [`NSNotifications`](http://techrapport.com/blog/), the delegate design pattern and more. I really enjoyed using Swift 2.0 and found that I was able to add a lot of functionality very easily using extensions. 

I used storyboard on many occasions, but also built a some of the user interface in code.  I found that doing both helped to cement the ideas and to understand what is going on behind the scenes.  I used segues throughout my project, most of the time configured in storyboard, but also in code.  I used unwind segues to unwind to the main view after editing a saved meme.

###__Git & GitHub__

Although I have been using Git and other version control systems for many years, I have never used Github professionally because my professional work has been private. I used best practices when using Git and Github. I used separate branches for the two versions, wrote commit messages that were clear and concise, used Git to debug and I chose logical points to commit.

##__Extra Credit__
---
In order to receive extra credit and to receive Exceeds Specifications, I added additional functionality to v2.0 of Meme-Me. Some of the functionality that I added are shown below:

###__Color and Font Picker - UIPopoverViews__ 

The color picker is really great and allows the user to select a color by gliding their finger over a group of colors, each of which shows up inside of a magnifying glass, showing the user which color they selected. As the color is picked, the font is updated in the view and the color/font attributes are stored with that instance of the Meme, so the user can edit the meme at a later time. 

###__Shake to reset__

I added a shake to reset feature, which greatly improved the experience by allowing the user to shake the phone to reset the font back to default. I did this using a single extension, which extends `UIViewController`. 

###__Class extensions__

As I was developing this app, I realized that my code was getting a bit complex, especially after I added delegate functions for the text fields, `UITableViews`, `UICollectionViews`, and other `UIKit` components. In order to make the code more readable and manageable, I once again used `UIViewController` extensions in order to add the delegate functions for various `UIKit` components. I find that this is good practice as long as you contain the extensions in one file, preferably in the same file of the view controller that utilizes them. I would recommend utilizing extensions for basic delegate functionality that will be shared throughout your app. 

##__Other__
___
To make this project more professional, I added a launch screen with a small loading indicator, following [Apple's iOS Human Interface Guidelines](https://developer.apple.com/library/ios/documentation/UserExperience/Conceptual/MobileHIG/LaunchImages.html).  I also made the interface look good while still following their guidelines.  

I added helpful text to show the user what each view does and I used icons (see below for credit) to show what each button does.  Each icon used has all size classes in the XCode Assets file, so they will show nicely on any iPhone.

##__Wrap Up__
---
All in all, this project helped me to learn a tremendous amount about developing for the iOS platform.  I feel that I have mastered `UIKit`, that I can do just about anything on the iOS platform now that I know how to navigate the user documentation, and I feel that I am building on my programming knowledge by utilizing best practices.  I am also taking the Stanford iOS development courses, which complements this course tremendously.  I am extremely confident that I will be developing professionally for the iOS platform in no time. 

###__More Features__

Well, you'd think that I would be done with this app, but I am not. In the next iteration, I will be including Core Data to persist data, Flickr images and randomly generated Memes. Keep a watch out for the next revision as I plan to release it to the App Store.

A special thanks goes to: "Christian Zimmermann" who wrote the code for the SwiftColorPicker. You can view his GitHub page here: [https://github.com/Christian1313/iOS_Swift_ColorPicker](https://github.com/Christian1313/iOS_Swift_ColorPicker).

Please take a look at my blog to learn about how Udacity has helped me succeed: [Tech Rapport's Blog](http://TechRapport.com/blog/)

<figure class="center video-responsive">
  <a href="https://vimeo.com/user45412862"><iframe src="https://player.vimeo.com/video/144303012" width="250" height="444" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></a>
</figure>

Credit for the app icon goes to Udacity.

<div>Icons made by <a href="http://www.flaticon.com/authors/zurb" title="Zurb">Zurb</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a>             is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a></div>
<div>Icons made by <a href="http://www.flaticon.com/authors/picol" title="Picol">Picol</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a>             is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a></div>
<div>Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a>             is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a></div>
<div>Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a>             is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a></div>

