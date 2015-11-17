---
layout: project
key: 6
category: iOS Apps
title: "On The Map"
description: "On the Map iOS Application.  A networing application for the iPhone for sharing locations and links with Udacity Students - Udacity iOS Nanodegree"
project-page: 'https://github.com/TechRapport/On-the-Map'
downloads: 
  zip: 'https://github.com/TechRapport/On-the-Map/archive/master.zip'
  tarball: 'http://techrapport.com/projects/on-the-map/index.html'
document: 'projects/on-the-map-description.html'
url: '/projects/on-the-map/'
feature:
  image: /assets/images/portfolio/On-The-Map.jpeg
  alt: "On the Map Udacity Portfolio Image"
carousel:
  image:
    url: http://placehold.it/1920x540
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
build-info: ['Version: 1.0', 'iPhone: 6 or later', 'iPad: N/A', 'xCode: Version 7.1', 'iOS: 9.0', 'Swift: 2.0']
---

<iframe src="https://appetize.io/embed/n0g9x3gjudb73c5paje7r3x7rw?device=iphone5s&scale=100&autoplay=false&orientation=portrait&deviceColor=black" width="378px" height="800px" align="center" frameborder="0" scrolling="no"></iframe>




##__On the Map__

This application was created as the third project in the Udacity iOS Nanodegree.  It is called On the Map and showcases my ability to create a production ready iOS Application that utilizes networking to get and post data. 

Technologies used
´Parse´ ´Networking´ ´MapKit´ ´Onepassword´ ´TouchID´ ´OAuth´ ´CoreLocation´ ´RESTful API´ ´Facebook SDK´ ´Push Notifications´ ´Cocoa Pods´ ´Grand Central Dispatch´ ´Multithreading´ ´Model View Controller (MVC)´ ´Asynchronous & Concurrent Multithreading´ ´1Password´ ´Chameleon´ ´Objective C´
##__Features__

-  Login using Udacity's authenication API
-  POST GET and DELETE Data from Udacity and Parse
-  View pins in a map showing where students are studying
-  View locations where students have studied in a table view
-  Post a geocoded location with a link to share with other students
-  Authorize your account through Facebook.

##__Technologies and Best Practices__
During the development of this application, I experimented with many different technologies and I utilized best practices.  I used CocoaPods to extend the capabilities of the app.  I used the 1Password extension to allow for easy login with a 1password account.  The main feature of this application is showing the usage of networking in Swift.  Read the description below to find out more.


##__Running the App__
---
To run this app, please download the [project file]({{page.downloads.zip}}), open the on-the-map.xcworkspace workspace file, select a device to run it on and press the run button.  You will need to authorize the application using a Udacity account and you can login with Facebook if your Udacity account is tied into your Facebook account.  Please get in touch with me if you have any issues.  Make sure to play around with all of the functionality and see all of the great features I added.

Here is the flow of the applications
1.  Log in to the application through Udacity or Facebook.  You can use the 1Password extension if it is available on your device.
2.  View pins on the map and click them to see students locations and submitted URLs
3.  Post a location and URL by pressing the Pin button in the right hand side of the navigation bar.
4.  Press the Udacity button to zoom into the Udacity headquarters on the map.
5.  Press refresh to fetch new submissions.
6.  Look at the submissions in the table view by selecting the table view button.
7.  Refresh by pulling down on the table.
8.  When you post a location, a Push Notification is sent showing that it was successful.

##__Description & Specifications__
---
This app shows my ability to build software that incorporates networking and many modern Cocoa technologies.  I build a custom API client that connects to the Udacity API and also the Parse API.  It connects to the APIs and makes POST, GET, PUT, DELETE and Query requests.  It does this while utilizing MVC to the full extent in the sense that all API calls are done in the background while the view remains responsive.

I abstracted away a lot of the functionality into the Model classes to keep my View Controller lightweight.  All of the API functionality happens in the API Model classes and the data gets returned via callback handlers to the client. 

To keep the UI responsive, I used Grand Central Dispatch to run UI Events on the one of three of the Global Queues.  Some of the network API calls also happen in a Utility GCD Queue.

I certainly went above and beyond in the creation of this application, which I will go into below.

###__User Interface__
I used some great features when building the UI of this application.  I utilized several Cocoa Pods while creating this application, including Chameleon, Swift Spinner, MDProgressHUD and more.  I used these Pods, along with my own code, to make a very interesting and fun user interface.  You will notice that the control that comes up when logging in is a very nice looking spinning interface with a message.  Also, when making any network requests, an HUD progress indicator is shown and the alpha of the view is dimmed.

I used custom map annotations in the ´MapViewController´ which really makes the user interface look nice.  The standard map pin annotations are replaced by little pins with the Udacity logo on them.  I set a global color theme that really looks nice and changes the color of the navigation bars to a nice flat blue color.  I used color appropriately to highlight different areas.  I also integrated nice animations into the user interface for text fields on the login screen and the ´PostLocationView´

###__Error Checking__
This application uses error checking extensively to ensure a great experience for the user.  In the ´OnTheMapConstants´ file, I defined an ´ErrorType´ data model, which helps to create errors with messages that can be passed on to the user.  If authentication or any other network request fails, the user is alerted with a nice message.

Also, the API Clients extensively use Guard statements to safeguard against any bad network requests.  This application is extremely solid and should not produce any fatal errors.  The user interface remains responsive and when the network gets hung up, it will show progress indicators and error messages to the user.  I tested this extensively using Apple's Network Conditioner.

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

###__PUT Requests__
To update data, you can run it through a query, using the taskForGetMethod.  If a result is returned, you can replace it by using the taskForPutMethod.

###__Query Requests__
You can easily query the Parse data store by passing parameters in the taskForGETMethod.  Simply create a dictionary containing a key value pair and pass them into the taskForGETMethod like so:
{% highlight raw %}
let parameters = [String : AnyObject]
taskForGETMethod(parameters)
{% endhighlight %}

NOTE: This is currently only available using the "where" method for the StudentLocations when searching for an Object ID.  More functionality will be added at a later time.

###__More Features__
---
I will be adding more features to this app in the future that will provide the user with more interactivity.  Also, I will be implementing data persistence using the `Parse Framework`.  Stay tuned for more!

Credit for icons and fonts:
<a href='http://www.freepik.com/free-vector/world-paper-map-free-template_718589.htm'>Designed by Freepik</a>
<div>Icons made by <a href="http://www.flaticon.com/authors/catalin-fertu" title="Catalin Fertu">Catalin Fertu</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a>             is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a></div>

<a href="http://www.freepik.<div>Icons made by <a href="http://www.flaticon.com/authors/pavel-kozlov" title="Pavel Kozlov">Pavel Kozlov</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a>             is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a></div>/free-vector/world-map-with-pointers_780564.htm">Designed by Freepik</a>

<div>Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a>             is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a></div>
<div>Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a>             is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a></div>
<div>Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a>             is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a></div>
<div>Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a>             is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a></div>
<a href='http://www.freepik.com/free-vector/mobile-phone-with-pointer-on-screen_766416.htm'>Designed by Freepik</a>
Prime Font from: http://fontfabric.com/prime-free-font  by Max Pirsky

Modeka Font From: http://freshhh.ritcreative.com/modeka.html

Udacity Logo Copyright Udacity
