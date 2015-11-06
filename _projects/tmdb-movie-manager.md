---
layout: project
key: 7
category: iOS Apps
title: "The Movie Database - Movie Manager"
description: "Interface with your Movie Database Account, browse top movies, favorite and rate.  Made for iOS created with Swift 2.0, xCode 7 for iOS 9"
project-page: 'https://github.com/TechRapport/tmdb-movie-manager/'
downloads: 
  zip: 'https://github.com/TechRapport/tmdb-movie-manager/zipball/master'
  tarball: 'https://github.com/TechRapport/tmdb-movie-manager/tarball/master'
url: '/projects/tmdb-movie-manager/'
feature:
  image: /assets/images/portfolio/auth-flow-tmdb.jpeg
  alt: "The Movie Database iOS App Udacity Portfolio Image"
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
build-info: ['Version: 1.0', 'iPhone: 4S or later', 'iPad: N/A', 'XCode: Version 7.1', 'iOS: 9.0', 'Swift: 2.1']
---

I created this app as part of the Udacity iOS Nanodegree Swift Networking course.  This app uses networking, Auth flow user authentication and the tmdb API to query user's favorite movies, browse new movies in multiple categories, create a watchlist, search movies, rate movies and more!  

This app was built to showcase my working knowledge of networking in Swift 2.0.  The app connects to a database of movies, hosted by themoviedb.org, and shows a list of recent movies.  It allows the user to view their favorite movies, find new movies and interact with the movie ratings and favorite movies.  Changes get pushed to the tmdb server and stored in the user's account.

This app is a proof of concept showing my ability to create an app that utilizes network, parses JSON data returned from a RESTful API, utilize HTTP Get and Post requests, Auth flow for user authentication and more.

In creating this app, we were given a starter project that was not completely implemented.  Following along with the course, I abstracted the repetive code and removed redundancy for all of the different GET and POST requests from the tmdb my favorite movies app.  I utilized completion handlers for callback methods to make the user interface responsive.  I utilized error catching and proper guard statements to prevent the app from crashing if the network requests failed.  I abstracted away a lot of the View Controler code into the Model to make my View Controllers much more manageable and easy to read.

###Using the TMDBClient Engine
Using the coding practices implemented in this project, I was able to create reusable code for connecting to a variety of networked APIs.  Others could utilize this code in their application.  To do so, implement the `TMDBClient` class and use the `TMDBConvenience` methods.  Within any view controllers, you can use GET and POST requests for any of the methods listed in the TMDBConstants extension.  To add more, you could subclass the TMDBClient class and add more methods and constants.

Make sure to utilize the `TMDBClient.sharedSession NSURLSession` in any class that will be accessing the data.  

###GET Requests
For any GET requests, use the `taskForGETMethod` function, passing in the method call, parameters (excluding the api_key), and a completion handler for the callback method. The method returns an NSURLSessionTask object.
```
func taskForGETImage(size: String, filePath: String, completionHandler: (imageData: NSData?, error: NSError?) ->  Void) -> NSURLSessionTask
```

###POST Requests
For POST requests, use the taskForPOSTMethod, passing in the method, parameters, jsonBody, which includes the data you wish to pass in the request and also pass in a completion handler.  This method returns an NSURLSessionDataTask object.
```
func taskForPOSTMethod(method: String, parameters: [String : AnyObject], jsonBody: [String:AnyObject], completionHandler: (result: AnyObject!, error: NSError?) -> Void) -> NSURLSessionDataTask {
```

More features:

I will be adding more features to this app in the future that will provide the user with more interactivity.  Also, I will be implementing Core Data to persist the data.  For now, this example returns   Stay tuned for more!