---
title: "How would I add Audio Controls to an iOS App in Swift"
description: "Tech Rapport - Answer to the Udacity iOS Nanodegree question: How would I do ____ in Swift?"
category: [iOS Dev]
tags: [ios, ios development, software, iphone, ipad, swift, code]
published: false
comments: true
image_square: blog-image-1.jpg
image: blog-place_rect.png
---

### How would you let the Pitch Perfect app manipulate the playback volume, you ask?

Okay, here we go!

Once you have completed your pitch perfect application, you might want to add some other features to it.  I am going to guide you through my process for adding extra controls to the Pitch Perfect App.  This assumes that you have gone through all of the steps in the Intro to iOS development course and have built the Pitch Perfect application to your liking.

So to start off with, let's add a simple UISlider volume control to our audio playback view.  After we have done that, let's look into how we could've implemented one of Apple's built in functionality to allow the user to control the playback volume AND control the output of the audio, including using Airplay!  Cool!

### Research:
First, we are going to do a bit of research on how to change the volume. You might want to do some preliminary research first about the AVFoundation framework.  [Apple's own documentation](https://developer.apple.com/library/ios/documentation/AVFoundation/Reference/AVFoundationFramework/index.html) is a great place to start.  Also, to learn more about the AVAudioEngine, you should [watch this video](https://developer.apple.com/videos/wwdc/2014/?id=502) from the 2014 World Wide Developer Conference held by Apple. Check out the rest of the documentation that I found below:
[How do I set the volume of audio media for playback with 
[Volume View Tutorial](http://www.ioscreator.com/tutorials/volume-view-tutorial-ios8-swift)
[App Coda's AVFoundation Tutorials](http://www.appcoda.com/ios-avfoundation-framework-tutorial/)

 Also, we may want to research the UISlider class a bit to figure out how it works.  I found that Apple's UISlider Class documentation is very informative.

Ok, let's jump right in and add a slider to control the playback volume in our app!

### Step 1:
Let's begin by adding the volume slider and label to our storyboard.

Go to the Objects Library and search for "Slider" as shown below:

![how-to-add-audio-controls.png]({{ site.blog_image_path }}how-to-add-audio-controls.png)

Open the Main.Storyboard file and double click AVPlayer on iOS?](https://developer.apple.com/library/ios/qa/qa1716/_index.html)on the PlaySoundsViewController to select it and zoom in on it.
 Select the UISlider object and drag it onto the storyboard above the Stop Button.  Apple's handy dashed blue lines will help you to position the slider at an appropriate position.  While dragging the slider, position it to be centered Horizontally and drop it when you see the blue guide lines as shown below:

![how-to-add-audio-controls-1.png]({{ site.blog_image_path }}how-to-add-audio-controls-1.png)

 Next, resize the slider so that it is aligned to the leading edge of our buttons on the left-hand side, and to the trailing edge of the buttons on the right-hand side:

![how-to-add-audio-controls-2.png]({{ site.blog_image_path }}how-to-add-audio-controls-2.png)

I won't go through all of the steps of adding constraints, but here is a great link if you are interested: 
