---
published: false
---

## Popover Views on the iPhone -UIPopoverView

With the expansion of screen and resolution on the iOS platform, we as developers have to adapt our applications to make use of the amazing screens that we carry in our pockets.  It is generally bad style to present a modal view on an iPad, because it is such a big screen and doing so would be rather bothersome to the user.  Instead, UIPopover views are used.  If you have an iPad, you have more than likely used UIPopoverViews without even realizing it.  They are presented within the context of a full-screen view and allow the user to see related data/controls, then easily dismiss the view, without obscuring the entire screen.  On iPhones smaller than the iPhone 6, it makes sense to present views modally in a lot of cases where you need the users attention.  The iPhone 6 and later fall somewhere in the middle.  

Although Apple doesn't recommend the use of popover views on iPhones, I think that it makes perfect sense as long as you use a bit of caution.  It requires a little extra work to configure the views, but I think it is worth it from a design point-of-view.  What you have to be careful of is what happens to your view if the user is seeing it on a smaller phone.  There are several ways to handle smaller screens, which I will go into at a later time.  For now, let's look at how we can get UIPopoverViews to show on our favorit phablets.

###Setup:
For this project, I will demonstrate how I went about incorporating a color picker and a font picker in Popover views in my Meme-Maker app.  If you are following along, feel free to start a new project and design a View Controller similiar to the MemeEditorViewController as shown below.  Make sure that you have a button or two to call the popover views.

Here you can see the main view controller that will be presenting the popover views:

![Screen Shot 2015-10-14 at 4.27.59 PM.png]({{site.baseurl}}/_posts/Screen Shot 2015-10-14 at 4.27.59 PM.png)

To start, create a bar button item, or button, on your main view controller.  Next, create a view and set it up so that it will use a preferred explicit size.  To do this, go to the Attributes Inspector, set the Size to Freeform, the Status Bar to none, and check off the Use Prefered Explicit Size check box.  For this example, I set the content size to be 300x300. 
![Screen Shot 2015-10-14 at 4.31.51 PM.png]({{site.baseurl}}/_posts/Screen Shot 2015-10-14 at 4.31.51 PM.png)
 

