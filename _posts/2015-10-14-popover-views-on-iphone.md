---
published: true
layout: post
title: Popover Views on the iPhone
tags: "ios, ios development, software, iphone, ipad, swift, code, tech rapport, techrapport, swift, extensions, xcode, swift 2.0, Popover, UIPopover, UIPopoverController, Popover Views, UIPopoverPresentationControllerDelegate"
---


##UIPopoverController in Action

With the expansion of screen size and resolution on the iOS platform, we as developers have to adapt our applications to make use of the amazing screens that we carry in our pockets.  

It is generally bad style to present a modal view on an iPad, because it has such a big screen and doing so would be rather bothersome to the user.  Instead, UIPopoverViews are used.  If you have an iPad, you have more than likely used UIPopoverViews without even realizing it.  They are presented within the context of a full-screen view and allow the user to see related data and controls, then easily dismiss the view once a task has been completed, without obscuring the entire screen.  

On iPhones smaller than the iPhone 6, it makes sense to present views modally in cases where you need the user's attention immediately.  The newer generations of iPhones, starting with the iPhone 6, fall somewhere in the middle.  

Although Apple doesn't recommend the use of popover views on iPhones, I think that it makes perfect sense as long as you use a bit of caution.  It requires a little extra work to configure the views, but I think it is worth it from a design point-of-view.  Check out [Apple's documentation on UIPopoverController](https://developer.apple.com/library/prerelease/ios/documentation/UIKit/Reference/UIPopoverController_class/index.html)

What you have to be careful of is what happens to your view if the user is seeing it on a smaller phone.  There are several ways to handle smaller screens, which I will go into at a later time.  For now, let's look at how we can get UIPopoverViews to show on our favorite phablets.

###Setup:
For this project, I will demonstrate how I went about incorporating a color picker and a font picker in UIPopover views in my Meme-Maker app.  If you are following along, feel free to start a new project and design a View Controller similiar to the MemeEditorViewController as shown below.  Make sure that you have a button or two to call the popover views.

Here you can see the main view controller that will be presenting the popover views:

![Screen Shot 2015-10-14 at 4.27.59 PM.png]({{site.baseurl}}/images/Screen Shot 2015-10-14 at 4.27.59 PM.png)

###Setting up the Storyboard
To start, create a bar button item, or button, on your main view controller.  Next, create a view and set it up so that it will use a preferred explicit size.  To do this, go to the _Attributes Inspector_, set the Size to _Freeform_, the _Status Bar_ to _None_, and check off the _Use Prefered Explicit Size_ check box.  For this example, I set the content size to be 300x300. 

![Screen Shot 2015-10-14 at 4.31.51 PM.png]({{site.baseurl}}/images/Screen Shot 2015-10-14 at 4.31.51 PM.png)
 
 Next, in the _Size Inspector_, once again select _Freeform_ and set the size to 300 x300.
 
![Screen Shot 2015-10-14 at 4.34.09 PM.png]({{site.baseurl}}/images/Screen Shot 2015-10-14 at 4.34.09 PM.png)

For my example, I am going to show you how I added a UISlider to the view to set the font size.  I won't go into exactly how the views communicate with one another, but the basic idea is that there is a FontAttributes struct that stores the font data for each Meme.  Abstracting it this way helps us to stick to MVC and it makes the implementation of the view and controls much more flexible.  Each view gets passed a copy of the FontAttributes Model object.

Okay, now that we have that out of the way and we've added our UISlider, let's take a look at how we hook everything up and then let's dive into the code.

First of all, in the Storyboard, control-click your button and drag it to the view that you would like to present modally. From the _Active Segue_ menu, select "Popover Presentation".

![Screen Shot 2015-10-14 at 4.40.27 PM.png]({{site.baseurl}}/images/Screen Shot 2015-10-14 at 4.40.27 PM.png)

Next, select your newly created Segue by clicking the arrow that just appeared between the Main View and the Font Popover View and set the _StoryBoard Identifier_ field in the _Attributes Inspector_ to: "fontPopoverSegue".  You don't need to change anything else here, but I suggest you play around with the various settings.

![Screen Shot 2015-10-14 at 4.43.52 PM.png]({{site.baseurl}}/images/Screen Shot 2015-10-14 at 4.43.52 PM.png)

###Setting up the Presenting View Controller
Within your main view controller class file, you will need to do the following:
1. Make the main view controller folow the UIPopoverPresentationControllerDelegate protocol
2. Implement the Popover Delegate function(s)
3. Override the prepareForSegue method of the presenting view controller.

Let's take a look at how I've done this.

First, after the class definition's parent class name insert a comma followed by: [UIPopoverPresentationViewControllerDelegate](https://developer.apple.com/library/prerelease/ios/documentation/UIKit/Reference/UIPopoverPresentationControllerDelegate_protocol/index.html) as shown below (note: for brevity, I have removed all of the other delegates/protocols from the class definition.)

    class MemeEditorViewController: UIViewController,     UIPopoverPresentationControllerDelegate {


Next, add the function below somewhere within your presenting view controller's class:


    Mark: Popover delegate func
    func adaptivePresentationStyleForPresentationController(controller: UIPresentationController) - UIModalPresentationStyle {
        return UIModalPresentationStyle.None
    }

The reason we implement this function is because we implemented the [UIPopoverPresentationControllerDelegate](https://developer.apple.com/library/prerelease/ios/documentation/UIKit/Reference/UIPopoverPresentationControllerDelegate_protocol/index.html) and this function must return UIModalPresentationStyle.None in order for our view to be presented in a popover view.  There are other optional protocol methods, which you should read about in [Apple's Documention](https://developer.apple.com/library/prerelease/ios/documentation/UIKit/Reference/UIPopoverPresentationControllerDelegate_protocol/index.html).

This would be the place where we could set up checks to see what size screen the view is being presented on and we could choose to show a done button when the screen is small, or we could have it present modally on certain phones.  This is important, because our view could cover the entire screen and the user might not be able to dismiss it, which would be a hassle.

Finally, we must override the prepareForSegue method in order to check for when the segue is called.  Within this method, we can set the presentation style, set the delegate and pass any data that needs to be passed.

    override func prepareForSegue(segue: UIStoryboardSegue, sender: AnyObject?) {
        //Check for the fontPopoverSegue
        if segue.identifier == "fontPopoverSegue" {
            
            //-Set the Type of the Destination View Controller
            let popoverVC = segue.destinationViewController as! 	TextSizePopoverViewController 
            
            //Set the presentation of the popover view controller to .Popover:
            popoverVC.modalPresentationStyle = UIModalPresentationStyle.Popover
            
            //-Set the delegate of the popover vc to self and pass model data:
            popoverVC.popoverPresentationController!.delegate = self
            popoverVC.fontAttributes = fontAttributes
        }


This will get you up and running.  I'll leave it up to you to figure out how you implement this.  

###Implementation and a few afterthoughts
Just for the sake of clarity, I'll quickly show you what I did to have the popover view controller update the main view.

In my case, I wanted the view to update the size and type of the font of the text in the main view.  To do this, I implemented a few methods in both the popover view controller and main view controller.  To increase the font size, I created an @IBAction that updated the TextSizePopoverViewController's fontAttributes object, passed the object back to the MemeEditor and then call a function to update the view in the MemeEditorViewController.  Check out this code below:

    //In the TextPopoverViewController file:
    func updateMemeFont(){
        //update the MemeEditor font and reconfigure the view:
        let parent = presentingViewController as! MemeEditorViewController
        parent.fontAttributes.fontSize = fontAttributes.fontSize
        parent.fontAttributes.fontName = fontAttributes.fontName
        parent.configureTextFields([parent.topText, parent.bottomText])
    }
    
    @IBAction func didChangeSlider(sender: UISlider) {
        //Cast value of font slider to CGFloat:
        let fontSize = CGFloat(fontSizeSlider.value)
        fontAttributes.fontSize = fontSize
        //Update the Meme's Font on the presenting view
        updateMemeFont()
    }

Please take a look at my app in action in the following video: [Meme Maker Beta Test Flight](https://www.youtube.com/watch?v=2aUd8Y6TG0E)  You can also take a look at the images below and checkout my Meme Maker code here: [github.com/TechRapport/Meme-Me](https://github.com/TechRapport/Meme-Me)
![bd721c87281c1eb293577962544ab57d1f4c8ca3.png]({{site.baseurl}}/images/bd721c87281c1eb293577962544ab57d1f4c8ca3.png) [9957fac4b23ef18266ca48437116a1c390b1b41a.png]({{site.baseurl}}/images/9957fac4b23ef18266ca48437116a1c390b1b41a.png)

Please feel free to leave me some comments if you got tripped up, or if you liked this guide and thanks for visiting