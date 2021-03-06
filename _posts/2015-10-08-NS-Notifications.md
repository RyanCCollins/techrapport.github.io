---
title: "NSNotifications; what are they good for?"
tags: [ios development, software, swift]
category: [iOS Development]
published: true
comments: true
image_square: blog-image-1.jpg
redirect_from: ns-notifications/
image: 
  feature: NS-notifications-900x300.jpg
---

Today, I decided to dive a little bit deeper into some of the design patterns, particularly NSNotifactions and delegation/protocols to a lesser extent, used in Apple's code libraries. 

###First of all, what problem(s) do NSNotifications attempt to solve?  

In Object Oriented programming using MVC, it is very common to abstract your code into separate units. This helps you to keep your code clean and readable, and it helps promote the DRY (don't repeat yourself) style of programming. Separating your code, most often into actually separate files, can make it confusing to understand how you can connect the code and apply it to all sorts of situations. 

Let's first talk about how NSNotifications work and how they can be used to help you. First of all, NSNotifications have nothing to do with Notification Center (come on, I know that's what you were thinking.) They are used to alert different components of the application when an invent, often a UI event, occurs. If you think about this through the lense of the MVC paradigm, you can think of notifications as a way that one part of your software, say the view, can notify another part, say the controller, when an event happens on screen that should trigger an event, or events, elsewhere in your application. 

Notifications are used extensively behind the scenes in cocoa. Let's look at an example after the break.
