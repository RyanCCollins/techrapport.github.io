---
layout: post
title: "Extensions Demystified"
tags: "ios, ios development, software, iphone, ipad, swift, code, tech rapport, techrapport, swift, extensions, xcode, swift 2.0"
---

##Swift Extensions Demystified

Often times when one is learning a new concept, it is easy to get hung up on a new topic by overthinking it outside of the context of the intended use. That has been the case throughout my Swift learning experience and most recently I had an ah-ha moment about just how powerful Swift Extensions are when I was developing the Meme-Me app for the Udacity iOS nanodegree. 

I had read and studied Apple's [Swift documentation](https://developer.apple.com/library/ios/documentation/Swift/Conceptual/Swift_Programming_Language/) and taken the [iOS Swift Syntax Course](https://www.udacity.com/course/learn-swift-programming-syntax--ud902), both of which are excellent resources I might add, but it wasn't until I dug my teeth in that i really understood the power of the language.  After I had worked through the project, I decided to add some [extra credit features](LINK) to change the font color, size and type.  When I had finished this, I realized that a shake-to-reset feature would be great for you to undo any changes to the font you had made. I started writing the code for this and I realized that I would have to do this for three seperate view controllers. At that moment, a light bulb went off in my head and I went about creating an extension to UIViewController. It was brilliantly simple to add the functionality that I needed to the extension and then call a method or two from each view controller to customize the shake gesture. 

I strongly recommend that you start using extensions in your code. It will save you a whole lot of time and I guarantee you will thank me later. 

By the way, check out this post about my extra credit features to see extensions in practice. 

Adios! 
