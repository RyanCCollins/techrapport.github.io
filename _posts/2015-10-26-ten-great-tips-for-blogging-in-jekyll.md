---
title: "Ten Tips for Blogging in Jekyll - Blog like a Hacker"
description: "Ten great tips for learning how to blog with Jekyll"
category: [Jekyll]
published: true
comments: true
tags: [Jekyll, web development]
image_square: blog-image-1.jpg
image: 
  feature: jekyll.jpeg
---

Ten Tips for Blogging in Jekyll

###1. Search Engine Optimization
Read about how to implement SEO and what are the best practices for [search engine optimization in Jekyll](jekyll.tips/tutorials/seo/).  You can do some pretty amazing things and easily generate meta data for your site using Liquid.  The site linked above has some great information, but I also recommend adding the following along with your other Meta Tags:
* Google & Bing verify 
* [Google Tag Manager](https://www.google.com/tagmanager/) 
* [Twitter cards](https://dev.twitter.com/cards/overview)

Here is an excerpt from this site, showing you how you can add a twitter card meta data using Liquid variables.  I put this code into a file called meta.html that I include in every template.  As you can see, I've included a twitter card that includes the site owner's twitter name (defined as a sitewide variable in config.yml) and I also include the feature image of a page if there is one.  

{% highlight html %}
{% if site.owner.twitter %}<!-- Twitter Cards -->
{% if page.image.feature %}
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:image" content="{{ site.url }}images/{{ page.image.feature }}">
{% else %}<meta name="twitter:card" content="summary">
	<meta name="twitter:image" content="{% if page.image.thumb %}{{ site.url }}images/{{ page.image.thumb }}{% else %}{{ site.url }}{{ site.logo }}{% endif %}">{% endif %}
	<meta name="twitter:title" content="{% if page.title %}{{ page.title }}{% else %}{{ site.title }}{% endif %}">
	<meta name="twitter:description" content="{% if page.description %}{{ page.description }}{% else %}{{ site.description }}{% endif %}">
	<meta name="twitter:creator" content="@{{ site.owner.twitter }}">
{% endif %}
{% endhightlight %}

Also, here are some settings you can add, such as locale, type, title, et. al.

{% highlight html %}
<!-- Open Graph -->
<meta property="og:locale" content="en_US">
<meta property="og:type" content="article">
<meta property="og:title" content="{% if page.title %}{{ page.title }}{% else %}{{ site.title }}{% endif %}">
<meta property="og:description" content="{% if page.description %}{{ page.description }}{% else if page.excerpt %}{{page.excerpt| strip_html }}{%else%}{{ site.description }}{% endif %}">
<meta property="og:url" content="{{ site.url }}{{ page.url }}">
<meta property="og:site_name" content="{{ site.title }}">
{% endhighlight %}

###2. Think before you link
Think long and hard about what you would like your links to look like before you ever post your site online.  You probably will want to [set up permalinks in Jekyll](http://jekyllrb.com/docs/permalinks/).  Permalinks define how Jekyll will create your links when you add an item to your blog or add a page to your collection.  If you mess this up, everything could be working fine while testing and when you build your site, all of your links might break.

You can use post.url, but I recommend using this plugin to make link generation easier: [Better post links with Jekyll](http://brm.io/jekyll-post-links/).  

###3. Site.url vs Site.baseurl

This is a common sticking point for a lot of people. I'll admit that it got me.  It really is pretty simple and easy to understand, but you really should understand it before you create all of your links using .baseurl when you don't need it.

If you are creating a site that will sit in a directory that is above the root directory, set baseurl in your config.yml to be your root directory.

For example, if your site was going to sit at http://techrapport.com/blog/ you would want your baseurl to be blog and all of your links should look something like:
{% highlight liquid %}
{{ site.baseurl }}{{ post.url }}
{% endhighlight %}

If you're going to be hosting in your root directory, leave baseurl alone.  Simple, right?  If not, read this post: [Clearing up Confusion Around baseurl -- Again -- By Parker](https://byparker.com/blog/2014/clearing-up-confusion-around-baseurl/).

##4. Model View Controller (MVC)

As a developer, I am always thinking in MVC, even in languages / frameworks where it isn't built into the design necesarily.

###5. Lint, lint, lint!

This is more of a tip for any type of development, but I think it earns a place in this article because liquid can get a bit unsightly and you want to make sure that you aren't inadvertantly adding any bugs or messing up your html.  I recommend using Sublime Text with [Sublime Linter](http://www.sublimelinter.com/).  You can add packages for all of the languages you write in and SublimeLinter will yell at you when you are leaving out something, or messed up your syntax.

Also, I found that I am used to using tabs so I would often inadvertantly mess up my yaml.  I found a neat utility that will validate and lint your yaml and then spit it out in a nice format.  [Checkout the online YAMLint YAML Validator](http://www.yamllint.com/).

###6. Use Octopress

If you are familiar with using the command line, try setting up Octopress.  In fact, I recommend starting out with one of their templates to begin with so that you have all of the dependicies right.  Their template will also include a rakefile and a gemfile, as well as provide you with good organization.  Whether you use one of their templates, or you set up Octopress yourself, you will be able to breeze through the process of writing and posting your content.

Head on over to [the Octopress website](octopress.org/) if you are interested.

###7. CMS for your Jekyll site with [Cloud Cannon](http://cloudcannon.com/)

Although, I have already written a lot about Cloud Cannon, I will say that it is a pretty great service for developers who want to create a site in Jekyll and then pass it off to a client who doesn't want to update their site from a command line or text editor.

Using Cloud Cannon, you can set any html element's class to be 'editable' and then that element can be edited on Cloud Cannon.

Cloud Cannon also makes it easy for you to create new collections and is especially great for testing your sites before going live.  With one of their plans, you can host a test site straight from github-pages.  I really like the fact that I can create sites from separate git branches to test out new features.  Setting up a new site is as easy as validating your github credentials.  Alternatively you can use dropbox, bitbucket or ftp.




