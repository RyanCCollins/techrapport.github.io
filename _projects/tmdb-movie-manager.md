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

##__Introduction__
---
I created this app as part of the Udacity iOS Nanodegree Swift Networking course.  This app uses a custom built networking client that connects to a `RESTful API` to get and post `JSON Data` from [The Movie Database](http://themoviedb.org) (TMDB)

##__Features__

-  Search for Movies through the Movie Database API
-  Browse through and movies to your TMDB watchlist
-  View your favorite movies
-  Swift Networking
-  Rate movies and view top rated movies from TMDB
-  Authorize your account on TMDB using `Auth Flow`

##__Technologies Used__

`Swift Networking` `RESTful API` `Auth Flow` `Objective C` `Custom Cocoa Controls` `Cocoa Pods` `Parse`

##__Running the App__
---
To run this app, please download the [project file]({{page.downloads.zip}}), open the tmdb-movie-manager.xcodeproj project file, select a device to run it on and press the run button.  You will need to authorize the application using a TMDB account.  Please get in touch with me if you have any issues.

##__Description & Specifications__
---
This app is a proof of concept showing my ability to create an app that utilizes networking in Swift, parses JSON data returned from a RESTful API into native `Foundation` objects, utilizes HTTP GET and POST requests, Auth flow for user authentication and more.

In creating this app, we were given a starter project that was not completely implemented.  Following along with the course, I abstracted the repetitive code and removed redundancy for all of the different GET and POST requests from the TMDB my favorite movies app.  I utilized completion handlers for callback methods to make the user interface responsive.  I utilized error catching and proper guard statements to prevent the app from crashing if the network requests failed.  I abstracted away a lot of the view controller code into the data model to make my view controllers much more manageable and easy to read.

I also added more functionality to the app, which I will go into below.

###__Movie Rating Custom Control__
One feature that I wanted to add was the ability to rate movies and view top rated movies.  To do this, I had to think outside the box and create a control that could be used to rate movies.  I created a control that is a subclass of `UIView` in order to create a custom star rating control.  

I implemented a system of 5 star icons that, when tapped, triggers a POST request with the `TMDBClient` to set the rating of the movie.  I altered the TMDBMovie object to store a rating so that ratings could be pulled using a `GET request` from the TMDB server and the ratings for movies would be stored.  

The control that I made used 5 star icons placed within `UIImageViews`, which would show empty or full depending on the rating.  Tapping one of the stars would fill the star and update the rating.  Ultimately, I decided to implement a control for collecting and showing ratings from [Cocoa Controls](https://www.cocoacontrols.com/controls/hcsstarratingview).  Although the control was written in Objective C, I was able to implement it in my Swift project by using an `Objective-C Bridging File`.

Also, I added a new `UITableViewController` subclass called `RatingViewController` and a `UITableViewCell` subclass called `RatingViewCell` in order to load a list of top rated movies in a `UITableView`.  Each cell displays a 1-10 rating in the custom star rating control.  Tapping the star rating control sends a POST request to rate the movie.

##__Using the TMDBClient Engine in Your Project__
---
Using the coding practices implemented in this project, I was able to create reusable code for connecting to a variety of networked APIs.  

You can use this code in your application.  The first thing you should do is go to [the TMDB website](http://themoviedb.org) and sign up for an API Key.  __Make sure__ to put your API key into the `TMDBConstants.swift` file under the struct labeled Constant, like so:
{% highlight raw %}
    // MARK: Constants
    struct Constants {
        
        // MARK: API Key
        static let ApiKey : String = "YOUR_API_KEY_HERE!"
{% endhighlight %}

To use the built in functionality, implement the `TMDBClient` class and use the `TMDBConvenience` methods.  To add new methods, go to [themoviedb.org's API reference page](http://docs.themoviedb.apiary.io/#reference) and make sure to sign up for an account.  Within any view controllers, you can use GET and POST requests for any of the methods listed in the `TMDBConstants` extension.  To add more, you could subclass the `TMDBClient` class and add more methods and constants.

Make sure to utilize the `TMDBClient.sharedSession NSURLSession` in any class that will be accessing the data.  

###GET Requests
For any GET requests, use the `taskForGETMethod:`, passing in the method call, parameters (excluding the api_key), and a completion handler for the callback method. The method returns an `NSURLSessionTask` object.

{% highlight raw %}
func taskForGETImage(size: String, filePath: String, completionHandler: (imageData: NSData?, error: NSError?) ->  Void) -> NSURLSessionTask
{% endhighlight %}

###__POST Requests__
For POST requests, use the `taskForPOSTMethod`, passing in the method, parameters, a `JSONBody` dictionary, which includes the data you wish to pass in the request and also pass in a completion handler.  This method returns an `NSURLSessionDataTask` object.
{% highlight raw %}
func taskForPOSTMethod(method: String, parameters: [String : AnyObject], jsonBody: [String:AnyObject], completionHandler: (result: AnyObject!, error: NSError?) -> Void) -> NSURLSessionDataTask {
{% endhighlight %}

###__More Features__
---
I will be adding more features to this app in the future that will provide the user with more interactivity.  Also, I will be implementing data persistence using the `Parse Framework`.  Stay tuned for more!