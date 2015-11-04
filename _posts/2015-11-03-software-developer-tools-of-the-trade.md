---
title: "Software Developer Tools of the Trade"
description: "An article about some great tools that I use for Software Development"
category: [Software]
published: true
comments: true
tags: [Software, Web Development]
image: 
  feature: toolbelt.png
---

As developers, the tools of our trade are written in 1s and 0s.  We rely heavily on the amazing creativity and hard work of other developers.  Of course there are some developers who code in Vim and can't be bothered with GUIs.  I am not one of those people.  Although I do a lot of my work in a simple text editor and terminal window, I love to utilize software when I can to streamline my workflow.  

This post is going to talk about some of the new tools that I've added to my tool belt recently and how they fit into my software design workflow.  From idea to implementation, these tools help me make awesome software and I strongly recommend that you start using them, too.  

### 1.  Wireframing / Sketching
#### Sketch
Sketch is a fantastic tool that has a very broad featureset.  What interests me most is the features that apply to the earlier stages of software design.  When I come up with an idea for a piece of software, I generally begin by parsing out the specifications and features, then move on to sketching out my thoughts for the design.  

Whether it's an iOS App, a website or any other piece of software, I use Sketch to get my ideas onto paper.  Sketch comes with built in templates and UI components for the iOS platform.  

### 2. Prototyping
#### Origami

Designed by Facebook as a Quartz Composer overlay, (Origami)[https://facebook.github.io/origami/] is an incredibly powerful prototyping tool for iOS, OSX, Android and web development.

Origami allows you to rapidly prototype a user interface, test it on your device, including mobile devices, then export the design into code.  You can use the full power of Quartz 2D to create animations and graphical effects, test them and pop them into your code.  I was sold after going through a few of their tutorials.  Check it out!

I also like to use Bootstrap for my web mockups. I find that the column system helps me lay everything out into grids and that the [Bootstrap starter template](http://getbootstrap.com) is a good place to start with any web project.

### 3. Project Planning / Collaboration

#### Slack

I won't go into too much about project planning, it was a main part of my last job after all, but I will say that I find [Slack](https://slack.com/) to be very good for collaboration and team management.  I am part of a team of iOS developers who I speak with every day.  We throw ideas at one another and talk about resources that we find.  It's IRC meets project management, which is great.  

### 4. Coding

####Sublime Text, Brackets and Xcode
I am constantly evolving my workflow and I am especially fickle when it comes to the text editors that I use.  Lately I have been using [Sublime Text](www.sublimetext.com/) and XCode the most, but [Brackets (made by by Adobe)](http://brackets.io) has earned a space on my Dock.  I find XCode 7.0 to be good, but a bit clunky, so sometimes I like to code outside of XCode in Sublime Text.  

What I like about Sublime is how lightweight it is and how customizable it is.  Brackets is a bit more interactive than Sublime Text and handles a few of the annoyances that I have with Sublime Text, like how I have to use a finder window for file management a lot of the time.  All three allow for third-party plugins, which is nice.  In the end, I think that the text editor that you choose to use is really up to your personal tastes.  

### 5. Monitoring, Verification and Testing
I utilize several tools for monitoring my code, dependencies, etc.  It really depends what I am working on, but I've really started to love [node.js](http://nodejs.org) and [Grunt](http://gruntjs.com) for handling some of the grunt work, such as code verification, minificafion, and image compression for web development.  I have been using node and grunt in combination with Jekyll for the last few months and am really in love with the tools they provide for web design.  

For iOS development, of course I use instruments for testing.  I have also been integrating the fantastic language features for debugging that Swift has into my code, including using guard statements, error catching, multi-threading with GCD and more.  

### 6. Integration
I find that integration is one area that has really blown up over the last 5 years and that it is easier and cheaper, now more than ever, to find integration solutions for your software.  

For web development, I have been using [Cloud Cannon](http://cloudcannon.com) for CMS like features for my Jekyll development, Heroku for rails & ruby, and have begun to use Parse for an iOS app that I making.  

### 7. Productivity

#### Wakatime

I'd like to chat about a new discovery that I made recently, and that is [Wakatime](http://wakatime.com).  It's funny because in the process of designing my website resume, I wanted to incorporate stats about the type of work that I do, how much time I spend on it, and what [languages/frameworks I use the most](http://techrapport.com/resume/).  To do this, I made a plugin that pulled info from github stats.  Still, I wasn't able to get a good level of granularity.  In comes Wakatime.  

With Wakatime, you can set up an account and [follow their instructions for installing plugins](https://wakatime.com/editors) to your favorite code editors / IDEs.  I use Xcode, Sublime Text and Brackets the most, so I installed a plugin for each.  What the plugin does is really cool; it keeps track of how much time you spend writing code, what languages you use, and also analyzes your github commits to show you stats.  There is also an [interactive leaderboard](https://wakatime.com/leaders), which shows you the the top coders as far as time spent each week.  

Another interesting piece of software for productivity is codeeval.  I won't go into it too much, but I will say that it offers a pretty unique set of features for keeping you on your toes as a developer and helps you to hone your skills.  

###Wrapup

Well, that's a quick look at some of my favorite software that I use for web and software design.  I hope that it helped you to find new resources and utilize new tools.  

Please [get in touch with me](mailto:info@techrapport.com) with any questions and leave a comment below if you'd like.  