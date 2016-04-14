---
layout: project
key: 4
category: [Mobile]
title: "iOS Mock Interview"
description: "A mock interview and white-board excercises to demonstrate my knowledge and skill in the area of iOS software development."
project-page: 'https://github.com/RyanCCollins/ios-interview'
url: '/projects/hacksmiths-fe/index.html'
permalink: '/projects/ios-mock-interview/index.html'
document:
feature:
  image: '/assets/images/portfolio/whiteboard.jpg'
  alt: "iOS Interview Dry Run"
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
---

A mock interview demonstration my knowledge and skill in the area of iOS software development.

### __Question 1__
I have recently mastered the use of many of the more advanced features of the Swift programming language.

I find that having an understanding of the more advanced language features of Swift is extremely powerful.  As a Swift developer, you can essentially tailor the programming language to suit your needs by using such design patterns as class extensions, delegation, protocols, typealises, et. al.  This lets you focus on building your own reusable code that can be used for all of your work.

I use a great dependency manager called Cocoapods that lets me package up my components into reusable modules that I can load into any project, making me a more efficient developer.  Mastering the intricacies of the Swift programming language has changed for the better the way that I build software.

Another thing that I have learned within the past year is how to apply best practices to my work.  This has taught me to be a better developer and has prepared me to apply my knowledge to solve complex issues in a team environment.  One such example is how I document my work and how I use Git for my iOS and web development.  I now use Git to its full advantage by writing incredibly detailed commit messages, committing often and early, rebasing / squashing my commits, etc. All of this not only helps me to create better software, but it also benefits the people I work with.

### __Question 2__
Most recently, I used the CoreData and Realm data persistence frameworks.  I learned to use them the same way that I learn to use anything, by reading the documentation and by practicing using the API in sample applications.

What I do like about CoreData is how powerful it is.  I like it because it has an incredibly powerful API for large-scale desktop and mobile applications. That said, I dislike the fact that the power comes at a large cost.  The learning curve is high and even a full understanding of the CoreData Stack and the thread safety precautions that must be taken is not always enough to build perfect software.  I realize the power of CoreData, but I think that there are better solutions for many mobile applications.

I really like the Realm persistence framework because it was built specifically for the mobile platform.  You can run your persistence logic on multiple threads without fear of bad access or data corruption (and the obscure CoreData bugs that only NSZombies will help you to track down.)  I plan to use both frameworks when appropriate, but am very interested in using Realm for smaller applications.

### __Question 3__
I believe that the first step to writing good software is to break down the requirements and specifications in a highly detailed manner.  Once the specifications are mapped out, I would structure the application's data structs and classes following the *Model View Controller* paradigm. An example architecture is shown below.

### Model
The Model classes are responsible for downloading data from the Twitter API, storing tweets, account and organization data, and persisting the data using CoreData.  There is a `CoreDataStackManager` class for all CoreData operations and also an `ImageCache` class for caching any images downloaded.

| Class                 |  Inherits From |
|-----------------------|----------------|
| Tweet                 | NSManagedObject|
| Account               | NSMangedObject |
| TwitterAPI            | NSObject       |
| Organization          | NSManageObject |
| ImageCache            | NSObject       |
| CoreDataStackManager  | N/A            |

### View
For custom views, there is a custom tableview cell for showing the detail of each tweet in the feed.  To customize the UI, there is a *Like* button for liking a tweet, a Twitter login button and custom views for the settings and login views. There are also other various custom UI elements, such as the action buttons within each tweet cell in the feed.

|  Class       | Inherits From  |
|--------------|----------------|
| LikeButton   | UIButton       |
| TweetTableViewCell | UITableViewCell |
| LoginButton  | UIButton       |
| SettingsView | UIView         |
| LoginView    | UIView         |

### Controller
The controller classes are responsible for controlling the UI for the various components of the app. There is a tab view for navigating between scenes from the main view, a navigation controller for drilling down to the detail of a tweet, a detail view for showing a single tweet, and a view controller for the account and organization views.

| Class                      | Inherits From         |
|----------------------------|-----------------------|
| AccountViewController      | UIViewController      |
| TweetViewController        | UIViewController      |
| AccountViewController      | UIViewController      |
| TweetViewController        | UIViewController      |
| FeedViewController         | UITableViewController |
| OrganizationViewController | UIViewController      |
| NavigationController       | UINavigationController|
| TabBarViewController       | UITabBarController    |
| LoginViewController        | UIViewController      |
| ComposeTweetViewController | UIViewController      |
| SettingsViewController     | UIViewController      |

### Other
There are also other custom classes, such as the `TransitionDelegate`, `PhotoAnimator`, and others, which will help to build a cohesive custom UI with beautiful transition animations.


|    Class                 | Inherits From                         |
|--------------------------|---------------------------------------|
|TransitionDelegate        | UIViewControllerTransitioningDelegate |
|PhotoPresentationAnimator | UIViewControllerAnimatedTransitioning |

Although the above list is not completely exhaustive, it outlines a great start to building a fantastic Twitter app.

### __Questions 4__
This is a great question.  Developers often forget to think about one of the most crucial aspects of building great software: performance.  I am absolutely a performance oriented developer, so I will tell you a bit about how I would go about designing and testing my UITableView to display at least 60 FPS.

First of all, Apple Engineers have put a lot of time and effort into creating a user interface library with fantastic performance.  Their method for dequeuing reusable cells is a fantastic approach.  The basic idea here is that instead of performing complex operations to create a new cell every time we need one, we simply recycle cells and other table components when they are no longer in view, update the state of the view elements with new data and reuse it.

Apple's delegate pattern comes into focus here.  By utilizing the `UITableViewDelegate/Datasource` methods in an intelligent manner, we can harness the power and optimization that thousands of Apple employees have spent countless hours perfecting.  For example, instead of binding data to the entire tableview and all of the cells, we use the `tableView:willDisplayCell:forRowAtIndexPath` method to compute only the changes to the data in each cell when that cell is about to display.

We have to be smart when using these delegate and datasource methods, because the performance of the tableview depends on them.  Although the reuse pattern is fantastic, it can be costly if you perform heavy calculations from within the delegate and datasource methods.  Complex data operations need to happen on background dispatch queues.  It is also best to keep the tableview simple as far as the dimensions are concerned because the calculations for `heightForRowAtIndexPath:` and other related methods are done on each pass when new tableview cells are created.

I would also want to use the least computationally expensive graphics operations when considering the view drawing lifecycle for any custom views rendered within the tableview cell.  This would mean avoiding heavy animations using Apple's CoreAnimation framework.  Instead, we can perform our view rendering with the CoreGraphics `drawRect` method.  The `drawRect` method is responsible for rendering custom static content via the CPU.  As I understand it, this frees up the GPU to handle the more complex graphical computations that UIKit is performing.

To test that my theories are sound, I would use the Apple Instruments application to measure the speed at which our tableview cells were being rendered and I would tweak it until I got it above 60 FPS.

### __Question 5__
The approach suggested in Question #5 does not make sense to me and I will explain why.

NSUserDefaults is not a smart solution for persisting any data other than user settings and there are far better solutions for persisting data on the iOS mobile platform.

The alternative that I would suggest would be to refactor the code to use CoreData and also to follow the *Model View Controller* paradigm.  I would recommend creating a separate NSManagedObject model class for the *Actor*.  The class could be accessed through the `fetchedResultsController` from within any ViewController and we could save data using one or more `managedObjectContexts` created in a  `CoreDataStackManager` class.

Below is a bit of pseudo-code showing how the model class would be structured.

```
// Our NSManagedObject Actor Class
import CoreData
import Foundation

class Actor: NSObject {
    @NSManaged var bio: NSString
    @NSManaged var name: NSString
    @NSManaged var imageFile: NSString

    override init(entity: NSEntityDescription, insertIntoManagedObjectContext context: NSManagedObjectContext?) {
        super.init(entity: entity, insertIntoManagedObjectContext: context)
    }

    struct Keys {
        static let bio = "bio"
        static let name = "name"
        static let imageFile = "imageFile"
    }

    /* Custom initializer for CoreData */
    init(dictionary: [String: AnyObject?], context: NSManagedObjectContext) {

        /* Get associated entity from our context */
        let entity = NSEntityDescription.entityForName("Settings", inManagedObjectContext: context)!

        /* Super initializer */
        super.init(entity: entity, insertIntoManagedObjectContext: context)

        /* Assign our properties */
        bio = dictionary[Keys.bio] as! NSString
        name = dictionary[Keys.name] as! NSString
        imageFile = dictionary[Keys.imageFile] as! NSString

    }

}

class CoreDataStackManager {
    //Our standard core data stack manager methods.
}

import UIKit

class ActorViewController {

    @IBOutlet weak var actorNameLabel: UILabel!
    @IBOutlet weak var actorImageView: UIImageView!
    @IBOutlet weak var actorBio: UITextView!

    var selectedActor: Actor

    override func viewWillAppear(animated: Bool) {
        super.viewWillAppear(animated)

        actorNameLabel.text = selectedActor.name

        actorImageView.image = UIImage(named: selectedActor.imageName)

        actorBio.text = selectedActor.bio
    }
    /* We can access our data with the managedObjectContext singleton */
    var sharedContext: NSManagedObjectContext {
        return CoreDataStackManager.sharedInstance().managedObjectContext
    }

    /* We should use the fetchedResultsController to get our data in each ViewController */
    lazy var fetchedResultsController: NSFetchedResultsController = {

        let fetchRequest = NSFetchRequest(entityName: "Actor")
        fetchRequest.sortDescriptors = []
        fetchRequest.predicate = NSPredicate(format: "name == %@", self.selectedActor)

        let fetchedResultsController = NSFetchedResultsController(fetchRequest: fetchRequest, managedObjectContext: self.sharedContext, sectionNameKeyPath: nil, cacheName: nil)

        fetchedResultsController.delegate = self

        return fetchedResultsController
    }()

    /* Perform our fetch with the fetched results controller */
    func performFetch() {

        do {

            try self.fetchedResultsController.performFetch()

        } catch let error as NSError {
            // Handle the error
        }
    }
}
```

### __Question 6__:
If someone I was working with gave me a file for a ViewController that contained code for fetching and storing data from a network to the local device, I would recommend that they take the Udacity iOS Developer Nanodegree and I would help them to understand what they could do to improve their code.

For starters, I would refactor the code into separate classes.  I would create a model class for storing the data to a persistent store.  I would also create a separate `GithubAPI` model class that handled the network requests and data parsing.  By the time I was done, the code would be very well abstracted to abide by the *Model View Controller* paradigm, making the code much more reusable, decoupled and easier to test and debug.

I created a bit of pseudo-code that I saved in the `GitHubProjectViewController.swift` file to demonstrate this.

### __Question 7__:
One year from now, I will have finished another two Nanodegrees, which will lead me to being a stronger software developer with a better understanding of the entire development process. I would like to be in a leadership role that puts me in the position to be a mentor to other people aspiring to take part in the software development process. I will use all of the new skills that I have learned and best practices to create exceptional products and drive business decisions for the company that I work for.

I will be continuing the extracurricular activities that I partake in now, including organizing a team of software developers to build software for non-profit organizations and participating in competitive hackathon events. I will also be contributing to building a codebase/framework for the company that I work for and for my own use. I will be working on being as organized and efficient as possible with all of my work.  I will know that I have reached this goal when I successfully have three professional certificates from Udacity and am using those skills to help other people to learn.

It is apparent that the job I am applying for will help me to reach my goals.  The company exemplifies all of the things that I am most passionate about and their mission is exactly along the lines of my own.  After a year of working at Udacity, I will still be learning from my colleagues and applying all of the skills I gain to helping others to learn.  Education is so incredibly important to me and I would really love to help other people to grow their skillsets, as Udacity has helped me to grow mine. I feel that working for Udacity would give me the tremendous opportunity to be a leader and a mentor to others.  I look forward to having the opportunity to create tools that will help Udacity in their mission of democratizing world-class education.

In summary, I will be continuing my professional and personal growth, using my newfound skills and applying the incredible passion that I have for all of the work that I do in order to help other people to learn and grow.

#### Job Posting
My goal is not specifically to work as an iOS Developer.  I consider myself to be a Fullstack engineer, who happens to know how to program for the iOS platform.  For that reason, I am including job postings for jobs in the Fullstack category.

As I stated, Udacity is one place that I would love to work.  I think that their vision is incredible and I am so excited and passionate about their work.
[Here is a link to a job posting](https://jobs.lever.co/udacity/df7fbc8c-c7c9-4cb3-b1de-7d169521da15) that I may consider.

Here are the responsibilities laid out in the posting.

RESPONSIBILITIES

Building out a classroom framework that lets our students switch between hundreds of videos, quizzes, and programming environments without ever reloading the page
Rolling out a new style framework for our whole site
Versatile ways to grade student submissions, including everything from simple answers to large, multi-file projects and exams that adjust their difficulty to students’ performance
Find ways to incorporate the best new technologies into our stack, and the bulk of the work we do revolves around building new features (rather than iterating on old ones)
WHAT WE’RE LOOKING FOR

Experience with object-oriented design
Knowledge, or willingness and ability to become fluent in Python, Functional JavaScript, and client-side MVC
Opinions about the right way to do things that you aren’t afraid to defend
User-centric mentality/passionate about building products with great user experience
### Questions Asked
Question 1 - What have you learned recently about iOS development? How did you learn it? Has it changed your approach to building apps?

Question 2 - Can you talk about a framework that you've used recently (Apple or third-party)? What did you like/dislike about the framework?

Question 3 - Describe how you would construct a Twitter feed application (here is an example of Udacity's Twitter feed) that at minimum can display a company's Twitter page. Please include information about any classes/structs that you would use in the app. Which classes/structs would be the model(s), the controller(s), and the view(s)?

Question 4 - Describe some techniques that can be used to ensure that a UITableView containing many UITableViewCell is displayed at 60 frames per second.

Question 5 - Imagine that you have been given a project that has this ActorViewController. The ActorViewController should be used to display information about an actor. However, to send information to other ViewControllers, it uses NSUserDefaults. Does this make sense to you? How would you send information from one ViewController to another one?

Question 6 - Imagine that you have been given a project that has this GithubProjectViewController. The GithubProjectViewController should be used to display high-level information about a GitHub project. However, it’s also responsible for finding out if there’s network connectivity, connecting to GitHub, parsing the responses and persisting information to disk. It is also one of the biggest classes in the project.

How might you improve the design of this view controller?

Before answering the final question, insert a job description for an iOS developer position of your choice!

Your answer for Question 7 should be targeted to the company/job-description you chose.

Question 7 - If you were to start your iOS developer position today, what would be your goals a year from now?

GithubProjectViewController
```
import UIKit

class GitHubProjectViewController: UIViewController, UITableViewDelegate, UITableViewDataSource, UICollectionViewDelegate, UICollectionViewDataSource {

    // project UI

    @IBOutlet weak var nameLabel: UILabel!
    @IBOutlet weak var completionPercentage: UILabel!
    @IBOutlet weak var openIssues: UILabel!
    @IBOutlet weak var closedIssues: UILabel!
    @IBOutlet weak var allIssuesTable: UITableView!
    @IBOutlet weak var contributorsCollection: UICollectionView!

    // new issue UI

    @IBOutlet weak var newIssueName: UITextField!
    @IBOutlet weak var newIssueDescription: UITextView!
    @IBOutlet weak var postNewIssueButton: UIButton!

    // data model
    // We will be using our Model classes, so we don't need seperate variables anymore :)


    override func viewDidLoad() {
        super.viewDidLoad()

        makeCallsToGithubAPI()

        allIssuesTable.delegate = self
        allIssuesTable.dataSource = self

        contributorsCollection.delegate = self
        contributorsCollection.dataSource = self

        newIssueName.hidden = true
        newIssueDescription.hidden = true
        postNewIssueButton.hidden = true
    }

    func makeCallsToGithubAPI() {
        // All of the network calls happen in the github API and we can access them through the API Singleton
    }


    @IBAction func newIssueButtonPressed(sender: AnyObject) {
        newIssueName.hidden = false
        newIssueDescription.hidden = false
        postNewIssueButton.hidden = false
    }

    @IBAction func postNewIssueButtonPressed(sender: AnyObject) {
        postNewIssue()
        //Update the UI here
    }

    func postNewIssue() {
        GitHubAPI.postNewIssue(success, error in {
            if error != nil {
                // Handle the error
            } else {
                //update the UI
            }
        })
    }

    func tableView(tableView: UITableView, numberOfRowsInSection section: Int) -> Int {
        return issues.count
    }

    func tableView(tableView: UITableView, cellForRowAtIndexPath indexPath: NSIndexPath) -> UITableViewCell {
        let cell = tableView.dequeueReusableCellWithIdentifier("IssueCell") as! IssueCell
        // [code that stylizes the cell]
        return cell
    }

    func tableView(tableView: UITableView, didSelectRowAtIndexPath indexPath: NSIndexPath) {
        // The comments and other data are being loaded by the GitHubAPI class, so we can access them via the Singleton
        // [code that pushes a new view controller with comment data]
    }

    func collectionView(collectionView: UICollectionView, numberOfItemsInSection section: Int) -> Int {
        return contributors.count
    }

    func collectionView(collectionView: UICollectionView, cellForItemAtIndexPath indexPath: NSIndexPath) -> UICollectionViewCell {
        let cell = contributorsCollection.dequeueReusableCellWithReuseIdentifier("ContributorCell", forIndexPath: indexPath) as! ContributorCell
        // [code that stylizes the cell]
        return cell
    }

    func collectionView(collectionView: UICollectionView, didSelectItemAtIndexPath indexPath:NSIndexPath) {
        // The code for the network Query happens in the GitHubAPI and we can access the model objects when needed.
        // [code that pushes a new view controller with contributor data]
    }
}

import CoreData

@objc(Project)

class Project {
    @NSManaged var name: NSString
    @NSManaged var completionPercentage: NSNumber
    @NSManaged var issues: [Issue]?
    @NSManaged var contributors: [Contributor]?

    /* Mandatory override of init for inserting into ManageObjectContext */
    override init(entity: NSEntityDescription, insertIntoManagedObjectContext context: NSManagedObjectContext?) {
        super.init(entity: entity, insertIntoManagedObjectContext: context)
    }

    /* Our keys will let us get the stored data.  Issues and contributors stored seperately and accessed with NSPredicate 1 -> M */
    struct Keys {
        static let name = "name"
        static let completionPercentage = "completionPercentage"
        static let issues = "issues"
        static let contributors = "contributors"
    }

    /* Custom init */
    init(dictionary: [String: AnyObject?], context: NSManagedObjectContext) {

        /* Get associated entity from our context */
        let entity = NSEntityDescription.entityForName("Project", inManagedObjectContext: context)!

        /* Super, get to work! */
        super.init(entity: entity, insertIntoManagedObjectContext: context)

        /* Assign our properties */
        name = dictionary[Keys.name] as! NSString
        completionPercentage = dictionary[Keys.completionPercentage] as! NSNumber

    }

    /* Other various model methods here for storing the data fetched */

}

class Issue {
    /* Standard CoreData ManageObject methods and properties */
}

class Contributor {
     /* Standard CoreData ManageObject methods and properties */
}

class GitHubAPI {

    typealias CompletionHandler = (result: AnyObject!, error: NSError?) -> Void

    /* This class is responsible for making the API network calls to Github and returns callbacks with the results.  */
    func taskForGETMethod(var urlString: String, parameters: [String : AnyObject]?, completionHandler: CompletionHandler) -> NSURLSessionDataTask {
        /* Make parameters for the network call
         * Create a session and task.
         * Check our status code
         * Proceed with Parsing the JSON
         * Return the task
        */
        /* GUARD: For a successful status respose*/

    }

    func taskForPostMethod(var urlString: String, parameters: [String : AnyObject]?, completionHandler: CompletionHandler) -> NSURLSessionDataTask {
        /* Make parameters for the network call
        * Create a session and task.
        * Check our status code
        * Proceed with Parsing the JSON
        * Return the task
        */
        /* GUARD: For a successful status respose*/
    }

    class func parseJSONDataWithCompletionHandler(data: NSData, completionHandler: (result: AnyObject!, error: NSError?) -> Void) {
        //Parse JSON and return it via the completion handler
    }

}

class GitHubAPI {
    //Convenience methods for getting data from the GithubAPI
}

```
