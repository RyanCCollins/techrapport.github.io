---
layout: post
title: "Extensions Demystified"
tags: "ios, ios development, software, iphone, ipad, swift, code, tech rapport, techrapport, swift, extensions, xcode, swift 2.0"
---

##Swift Extensions Demystified

Often times when one is learning a new concept, it is easy to get hung up on the subject by overthinking it outside of the context of the intended use. That has been the case throughout my Swift learning experience and most recently I had a lightbulb moment about just how powerful Swift Extensions are when I was developing the Meme-Me app for the Udacity iOS nanodegree. 

I had read and studied Apple's [Swift documentation](https://developer.apple.com/library/ios/documentation/Swift/Conceptual/Swift_Programming_Language/) and taken the [iOS Swift Syntax Course](https://www.udacity.com/course/learn-swift-programming-syntax--ud902), both of which are excellent resources I might add, but it wasn't until I dug my teeth in that I really understood the power of the language.  After I had worked through the project, I decided to add some [extra credit features](https://discussions.udacity.com/t/added-a-some-extra-features-to-meme-me-color-picker-font-picker-font-size-would-like-some-feedback-check-out-the-video/34620) to change the font color, size and type.  You can see my code on [GitHub](https://github.com/TechRapport/Meme-Me).

When I had finished this, I realized that a shake-to-reset feature would be a great for so that the user could reset to the default font. I started writing the code for this and I realized that I would have to write the same code in each of my view controllers. At that moment, a light bulb went off in my head and I went about creating an extension to UIViewController. It was brilliantly simple to add the functionality that I needed to the extension and then call a method or two from each view controller to customize the shake gesture. 

Here is the Extension, in all of its glory:

,,,extension UIViewController {
        //#--MARK: Subsribe to shake   notifications:
        func subscribeToShakeNotifications() {
                NSNotificationCenter.defaultCenter().addObserver(self, selector: "alertForReset", name: "shake", object: nil)
>>>>>>> origin/master
    }
    
    func unsubsribeToShakeNotification() {
        NSNotificationCenter.defaultCenter().removeObserver(self, name: "shake", object: nil)
    }
    
    override public func canBecomeFirstResponder() -> Bool {
        return true
    }
    
    //Handle motion events:
    override public func motionEnded(motion: UIEventSubtype, withEvent event: UIEvent?) {
            if motion == UIEventSubtype.MotionShake {
            NSNotificationCenter.defaultCenter().postNotificationName("shake", object: self)
              }
      }
    },,,

Seriously.. that's all I had to do in order to get the shake to reset functionality working in all of my views.  Of course, a small amount of code still needs to be written to customize the action of the shake to reset functionality.

Not yet convinced?  I'll show you another example of how I was able to implement three functions in a UIViewController extension in order to make fancy fade in/out animations for nearly any UIKit control.  I used this in my [Pitch Perfect](https://review.udacity.com/#!/reviews/56812) app:

'''extension UIView {
    func fadeIn(duration: NSTimeInterval = 1.0, delay: NSTimeInterval = 0.0, completion: ((Bool) -> Void) = {(finished: Bool) -> Void in}) {
        UIView.animateWithDuration(duration, delay: delay, options: .CurveEaseIn, animations: {
                self.alpha = 1.0
            }, completion: completion)
    }
    
    func fadeOut(duration: NSTimeInterval = 1.0, delay: NSTimeInterval = 0.0, completion: ((Bool) -> Void) = {(finished: Bool) -> Void in}) {
        UIView.animateWithDuration(duration, delay: delay, options: .CurveEaseIn, animations: {
            self.alpha = 0.2
            }, completion: completion)
    }

    func fadeOutAndIn(duration: NSTimeInterval = 1.0, delay: NSTimeInterval = 0.0, completion: ((Bool) -> Void) = {(finished: Bool) -> Void in}) {
        UIView.animateWithDuration(duration, delay: delay, options: [.Repeat, .Autoreverse], animations: {
                self.alpha = 0.3
            },
            completion: ({finished in
                if finished {
                    UIView.animateWithDuration(duration, delay: delay, options: [.Repeat, .Autoreverse], animations: {
                            self.alpha = 1.0
                        }, completion: nil)
                }
            }))
    },,,

Pretty cool, eh?

I strongly recommend that you start using extensions in your code. It will save you a whole lot of time and I guarantee you will thank me later. 

By the way, check out this post to read about how [I utilized popover views]({{site.baseurl}}/_posts/popover-views-on-iphone/) in my Meme Maker app. 

Thanks so much for visiting my site; please send me an [email](mailto:info@techrapport.com) and leave a comment below if you have any questions or would like to give me some feedback.
