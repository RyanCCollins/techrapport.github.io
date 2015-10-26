---
title: "Jekyll workflow tips and tricks"
description: "Tips and Tricks for your Jekyll Workflow and a look at how I do things"
category: [Jekyll]
published: true
comments: true
tags: [Jekyll, web development]
image: 
  feature: jekyll.jpeg
---

This website was designed using Jekyll, a fantastic static-site generator that utilizes some great technologies to get you up on the web. 

This post is part of a series of posts about my experience developing a website using Jekyll. 

Checkout my other posts in my series of [Jekyll blog posts](/blog/categories/#Jekyll). Also, feel free to visit my [GitHub site](http://github.com/{{ site.owner.github}}) to get started making a blog or website with Jekyll. 

###My Jekyll Workflow

After getting used to Jekyll, which took about a week, I started developing a workflow to improve my efficiency. I know that everyone is different, but I think that this guide is a good place for you to start if you are just learning how to use Jekyll. 

I'm going to assume that you have Jekyll installed. If not, check out the [Jekyll website](http://jekyllrb.com) and also check out the other blog posts in my [series on developing a site or blog in Jekyll]({{site.url}}/blog/categories/Jekyll). 

I recommend starting with a template or designing your own either with bootstrap or liquid. Starting with a template will make your design process much smoother. If you don't know, [bootstrap](bootstrap todo: finish

###Break up the HTML into sections
1. header
2. footer
3. nav
4. meta, etc. 

Then, create a default layout that includes any common elements. You can then create a cascade of layouts for your blog home, blog posts, etc. While you're doing this, I recommend thinking ahead about a few things:
 * permalinks
 * collections
 * site wide variables, like name, author, company
* other data

Thinking ahead will help you save time and energy in the future and allow you to "encapsulate" your includes and data files.

This brings me to my next point...

###Organization

It took me a little while to get my workflow together, but once I did, I started to realize the power of building with Jekyll.  Although I have a few IDEs, I found that I did not need to use one.  I do most of my development in Jekyll with only Sublime Text, a web-browser and a terminal. Building and testing is as easy as typing "Jekyll serve" into your terminal. The default behavior of Jekyll is to rebuild the site and then serve it when you make a change and save in your text editor. 

During my initial development, I used [cloud cannon](http://cloudcannon.com) in order to host my test site.  Cloud Cannon is pretty great, as its functionality is built on top of Jekyll and allows you to create test environments for all of your sites, including a site that you have hosted on gh-pages. The github integration is fantastic, as it watches for commits at updates automatically, giving you an instantaneous way of testing your project on a server.  Also, you can create a different test site for a each branch in case you need to make a hotfix or want to try out a new feature. 

Cloud Cannon hosts the site at a less zen Heroku-like url (like maraschino-mongoose.cloudvent.net)  It has features that a developer could integrate into their site that gives Jekyll a CMS for non-developers. Essentially, you can assign "editable" as the class of any html tag and and then anyone can edit the contents in a friendly editor. Also, it allows you to create collections with ease, doing most of the work in setting a collection up for you. 

Although Cloud Cannon is great, I found that I did most of my development without it. I would likely not use it going forward during the development process, but I would recommend it for ongoing CMS for a client. I also think that [travis-ci](http://travis-ci.org) is great for continuous integration, but it does not have the same CMS-type features that cloud cannon does, as far as I'm aware. 

###Development workflow 

My development workflow went something like this: design (using bootstrap or another UI framework), split into reusable chunks, code those chunks with the html, liquid & js, test. I'll go into each of these below. 

####Design

Do what you do and design elements that you will use for a website. You can use a framework, such as Twitter's Bootstrap, or you can use whatever tool you like.  

I actually recommend starting on paper and using a wireframing or prototyping tool. While designing, make a note of what elements are commonly used throughout your site.  Keep in mind that you will soon be writing code to duplicate elements in Liquid, so don't waste time creating an entire site in HTML. It also might be a good idea to start thinking about what kind of functionality you will use and what scripts you will want/use. I recommend putting scripts that you will use into a seperate file called scripts and include it in every layout you use.  You can do the same for your CSS. 

Once I have my prototype down, I like to split up common elements that will be used site-wide, such as nav bar, meta, header, footer, etc. into separate files stored in the _includes directory. I personally like to organize my files into several directories within the _includes file, especially if I know that my site is going to expand.  With that said, I find that it's easy to go overboard. Try to split up your _includes files so that you know what each one encompasses. Check out the directory structure of my site below.

When I say split up the elements, what I mean is that I actually take the html, scripts, etc and chop it to bits. I make logical _include files that essentially encapsulate those elements. I also add logic to these components using Liquid. Say, for example, I am splitting up my footer file into a footer.html _includes file. I'd want to think about how the footer will differ from page to page. A good example is with comments. you probably want to include [disqus] comments into your site, but likely only on blog pages. To do this, you would use Liquid, a rapid templating language made by [shopify](http://shopify.com).

Here's a quick example of how I would add the logic to show the disqus comments:
{% highlight raw %}
	{% if post.comments %}{% include disqus.html %} {% endif %}
}
{% endhighlight %}

This is a good time to start thinking about site & section-wide variables, which I will touch on next. There are some built-in variables for site, collections, pages and posts. You can also define your own variables, just like you would in any language. 

Starting to think about what variables you will use site-wide, within each post and within your collections at an early stage is critical. If you don't think about the variables you will use early, you will find yourself digging through your files often to find where you could utilize a variable. Take a look at the [config.yml file for this site](https://github.com/TechRapport/techrapport.github.io/blob/new_blog_theme/_config.yml)

I also like to define templates for all of my collections, pages and posts, so that adding a new item is easy and all of the collection/post-wide variables are all ready to be instantiated for your new content. 

A pro tip would be to also creat templates for pieces of code that you would use within a page. An example of this would be for image galleries. In my case, I use the same code over and over for images and I think it takes away the fluidity of posting to your blog if you have to write HTML when inserting an image. 

A smart way to go about it would be to create an _includes file for each image class that you use. For example, you could have a class for posting images in a grid of one, two, three or more images side by side, which is responsive.  

For each image template, you could make an _include file named gallery and you could create an array of images in your post's front matter and set a variable with the number of images you want per row. Using Liquid, you could inteligently create the gallery with only a few lines in your post. 

The _include file could look something like this:
{% highlight raw %}
{% if page.gallery %}
<figure class="two center">
{% for image in page.gallery %}
	<a href="{{site.blog_image_path}}{{site.blog_image_path}}{{image.img}}"><img src="{{site.blog_image_path}}{{image.img}}" alt="{{image.title}}"></a>
</figure>
{% endfor %}
{% endif %}
{% endhighlight %}

Then, in a post you could assign the YAML front matter like so:

{% highlight raw %}
---
gallery:
  - image: test.jpg
    title: 'My amazing image'
  - image: test2.jpg
    title: 'My other amazing image'
---
{% endhighlight %}

###Final Thoughts
One last thing I'd like to talk briefly about is git. Whenever I'm developing anything, I always have a terminal tab open with git. If you're a developer, I am sure you do to, or maybe you use another versioning system. If you don't then get on it now. Seriously, git is the secret to solid development.  I recommend that you commit during every logical change to a file, branch when you want to try something new and write descriptive commit messages. In my early development days, I remember kicking myself whenever I would forget to make a new branch and hadn't commit in a while. 

If you made it this far, I assume you are a Jekyll genius. Have fun and get in touch with me at [info@techrapport.com](mailto:info@techrapport.com).