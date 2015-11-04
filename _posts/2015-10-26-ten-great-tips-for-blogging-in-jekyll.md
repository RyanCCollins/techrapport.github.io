---
title: "Ten Tips for Blogging in Jekyll - Blog like a Hacker"
description: "Ten great tips for learning how to blog with Jekyll"
category: [Jekyll]
published: true
comments: true
tags: [Jekyll, web development]
image: 
  feature: jekyll-logo.jpeg
---

This website was designed using Jekyll, a fantastic static-site generator that utilizes some great technologies to get you up on the web. 

This post is part of a series of posts about my experience developing a website using Jekyll. 

Checkout my other posts in my series of [Jekyll blog posts](/blog/categories#jekyll). Also, feel free to visit my [GitHub site](http://github.com/{{ site.owner.github }}) to get started making a blog or website with Jekyll. 

## Ten Tips for Blogging in Jekyll

### 1. Search Engine Optimization
Read about how to implement SEO and what are the best practices for [search engine optimization in Jekyll](jekyll.tips/tutorials/seo/).  You can do some pretty amazing things and easily generate meta data for your site using Liquid.  The site linked above has some great information, but I also recommend adding the following along with your other Meta Tags:

+  Google & Bing verify 
+  [Google Tag Manager](https://www.google.com/tagmanager/) 
+  [Twitter cards](https://dev.twitter.com/cards/overview)

Here is an excerpt from this site, showing you how you can add a twitter card meta data using Liquid variables.  I put this code into a file called meta.html that I include in every template.  As you can see, I've included a twitter card that includes the site owner's twitter name (defined as a site-wide variable in config.yml) and I also include the feature image of a page if there is one.  

{% highlight html %}
{% raw %}
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
{% endraw %}
{% endhighlight %}

Also, here are some settings you can add, such as locale, type, title, et. al.

{% highlight html %}
{% raw %}
<!-- Open Graph -->
<meta property="og:locale" content="en_US">
<meta property="og:type" content="article">
<meta property="og:title" content="{% if page.title %}{{ page.title }}
{% else %}{{ site.title }}{% endif %}">
<meta property="og:description" content="{% if page.description %} {{ page.description }}
{% else if page.excerpt %}
{{page.excerpt| strip_html }}
{%else%}{{ site.description }}
{% endif %}">
<meta property="og:url" content="{{ site.url }}{{ page.url }}">
<meta property="og:site_name" content="{{ site.title }}">
{% endraw %}
{% endhighlight %}

###2. Think before you link, or it'll stink
Think long and hard about what you would like your links to look like before you ever post your site online.  Remember that Jekyll doesn't make any assumptions about anything, so it's up to you to set up your link format and to stick with it.  If you do make a mistake and accidentally break your internal links, you can use a plugin called jekyll-redirect-from to set up redirects. 

You probably will want to [set up permalinks in Jekyll](http://jekyllrb.com/docs/permalinks/).  Permalinks define how Jekyll will create your links when you add an item to your blog or add a page to your collection.  If you mess this up, everything could be working fine while testing and when you build your site, all of your links might break.

You can use post.url, but I recommend using this plugin to make link generation easier: [Better post links with Jekyll](http://brm.io/jekyll-post-links/).  

###3. Site.url vs Site.baseurl

This is a common sticking point for a lot of people. I'll admit that it got me.  It really is pretty simple and easy to understand, but you really should understand it before you create all of your links using .baseurl when you don't need it.

If you are creating a site that will sit in a directory that is above the root directory, set baseurl in your config.yml to be your root directory.

For example, if your site was going to sit at http://techrapport.com/blog/ you would want your baseurl to be blog and all of your links should look something like:
{% highlight html %}
{% raw %}
{{ site.baseurl }}{{ post.url }}
{% endraw %}
{% endhighlight %}

If you're going to be hosting in your root directory, leave baseurl alone.  Simple, right?  If not, read this post: [Clearing up Confusion Around baseurl -- Again -- By Parker](https://byparker.com/blog/2014/clearing-up-confusion-around-baseurl/).

### 4. Model View Controller (MVC)

As a developer, I am always thinking in MVC, even in languages / frameworks where it isn't built into the design necessarily.

Because you don't have to use a relational database with Jekyll, what I would do for a simple site is use YAML data files for each of the section of a page. I do this to separate the data from the view and I consider the liquid markup that I write in my HTML files to be the view controller. 

Designing your site with MVC in mind is extremely important if you expect your site to grow. If I were to port this site to Rails, I could easily install a SQL or other database using the same schema as my YAML data files without too much of a headache. 

I think this flexibility is what makes Jekyll so awesome.  You can quickly and easily scale your site, upgrade the UI and change storage & hosting if you use good practice when initially creating your site. 

### 5. Lint, lint, lint!

This is more of a tip for any type of development, but I think it earns a place in this article because liquid can get a bit unsightly and you want to make sure that you aren't inadvertently adding any bugs or messing up your html.  I recommend using Sublime Text with [Sublime Linter](http://www.sublimelinter.com/).  You can add packages for all of the languages you write in and SublimeLinter will yell at you when you are leaving out something, or messed up your syntax.

Also, I found that I am used to using tabs so I would often inadvertently mess up my YAML.  I found a neat utility that will validate and lint your yaml and then spit it out in a nice format.  [Checkout the online YAMLint YAML Validator](http://www.yamllint.com/).

### 6. Use Octopress

If you are familiar with using the command line, try setting up Octopress.  In fact, I recommend starting out with one of their templates to begin with so that you have all of the dependencies right.  Their template will also include a rakefile and a gemfile, as well as provide you with good organization.  Whether you use one of their templates, or you set up Octopress yourself, you will be able to breeze through the process of writing and posting your content.

Head on over to [the Octopress website](octopress.org/) if you are interested.

### 7. CMS for your Jekyll site with [Cloud Cannon](http://cloudcannon.com/)

Although, I have already written a lot about Cloud Cannon, I will say that it is a pretty great service for developers who want to create a site in Jekyll and then pass it off to a client who doesn't want to update their site from a command line or text editor.

Using Cloud Cannon, you can set any html element's class to be 'editable' and then that element can be edited on Cloud Cannon.

<figure class="one center">
	<a href="{{site.blog_image_path}}cloud-cannon-editable.png"><img src="{{site.blog_image_path}}cloud-cannon-editable.png" alt="cloud cannon new-site edit"></a>
	<a href="{{site.blog_image_path}}cloud-cannon-editing.png"><img src="{{site.blog_image_path}}cloud-cannon-editing.png" alt="cloud cannon new-site editing"></a>
	<figcaption>Adding editable and editing with <a href="http://cloudcannon">Cloud Cannon</a>.</figcaption>
</figure>

Cloud Cannon also makes it easy for you to create new collections and is especially great for testing your sites before going live.  With one of their plans, you can host a test site straight from github-pages.  I really like the fact that I can create sites from separate git branches to test out new features.  Setting up a new site is as easy as validating your github credentials.  Alternatively you can use dropbox, bitbucket or ftp.

<figure class="one center">
	<a href="{{site.blog_image_path}}cloud-cannon-new-site.png"><img src="{{site.blog_image_path}}cloud-cannon-new-site.png" alt="cloud cannon new-site"></a>
	<a href="{{site.blog_image_path}}cloud-cannon-new-site.png"><img src="{{site.blog_image_path}}cloud-cannon-new-site-storage.png" alt="cloud cannon new-site storage"></a>
	<figcaption>Adding a new site with <a href="http://cloudcannon">Cloud Cannon</a>.</figcaption>
</figure>

### 8. Add an RSS Feed

Everyone nowadays uses RSS feed readers, so your site should be able to be read by an RSS Reader.  This is actually easier than you might think.  Simply, create a file in your root directory called feed.xml.  In it, create an xml file that pulls in variables from your blog.  Check out the guide [how to set up an RSS Feed in Jekyll](http://jekyll.tips/tutorials/rss-feed/) at Jekyll.tips or see the format I used to create an Atom feed below.

{% highlight xml %}
{% raw %}
---
layout: null
---
<?xml version="1.0" encoding="UTF-8"?>
<feed xmlns="http://www.w3.org/2005/Atom" xml:lang="en">
<title type="text">{{ site.title }}</title>
<generator uri="https://github.com/mojombo/jekyll">Jekyll</generator>
<link rel="self" type="application/atom+xml" href="/feed.xml" />
<link rel="alternate" type="text/html" href="{{ site.url }}" />
<updated>{{ site.time | date_to_xmlschema }}</updated>
<id>{{ site.url }}/</id>
<author>
  <name>{{ site.owner.name }}</name>
  <uri>{{ site.url }}/</uri>
  {% if site.owner.email %}<email>{{ site.owner.email }}</email>{% endif %}
</author>
{% for post in site.posts limit:20 %}

<entry>
  <title type="html"><![CDATA[{{ post.title | cdata_escape }}]]></title>
 <link rel="alternate" type="text/html" href="{% if post.link %}{{ post.link }}{% else %}{{ site.url }}{{ post.url }}{% endif %}" />
  <id>{{ site.url }}{{ post.id }}</id>
  {% if post.modified %}<updated>{{ post.modified | to_xmlschema }}T00:00:00-00:00</updated>
  <published>{{ post.date | date_to_xmlschema }}</published>
  {% else %}<published>{{ post.date | date_to_xmlschema }}</published>
  <updated>{{ post.date | date_to_xmlschema }}</updated>{% endif %}
  <author>
    <name>{{ site.owner.name }}</name>
    <uri>{{ site.url }}</uri>
    <email>{{ site.owner.email }}</email>
  </author>
  <content type="html">
    {{ post.content | xml_escape }}
    {% include blog/feed-footer.html %}
  </content>
</entry>
{% endfor %}
</feed>
{% endraw %}
{% endhighlight %}

### 9. Categories
There are many plugins for categories, but you don't need to use them.  If you would rather use one, Octopress has categories built in.

To create a category listing, you can use a layout similar to your blog post-index layout.  In fact, I used the same layout on my site.  Since my site's blog is a located in a subdirectory called blog, I created a directory within blog called categories and included an index.html file within that included the HTML and liquid to create my categories page.

{% highlight bash %}
{% raw %}
|-- root
     |-- blog
          |-- categories
               |-- index.html
{% endraw %}
{% endhighlight %}

In the [YAML front matter](http://jekyllrb.com/docs/frontmatter/) of your blog post Markdown files, set an array containing one or more categories.  Make sure you use an array, because if you don't then any categories that are more than one word will get split into multiple categories.

{% highlight YAML %}
category: [category 1, category 2]
{% endhighlight %}

Using a little bit of code, you can create a list of your categories 
{% highlight YAML %}
{% raw %}
---
layout: post-index
title: Blog Categories
description: "An archive of posts sorted by category."
comments: false
---
{% capture site_cats %}{% for cat in site.categories %}{{ cat | first }}{% unless forloop.last %},{% endunless %}{% endfor %}{% endcapture %}
{% assign cats_list = site_cats | split:',' | sort %}

<ul class="entry-meta inline-list">
  {% for item in (0..site.categories.size) %}
  {% unless forloop.last %}
    {% capture this_word %}
    	{{ cats_list[item] | strip_newlines }}
    {% endcapture %}
  	<li>
  		<a href="#{{ this_word }}" class="tag">
  			<span class="term">{{ this_word }}</span> 
  			<span class="count">{{ site.categories[this_word].size }}</span>
  		</a>
  	</li>
  {% endunless %}{% endfor %}
</ul>
{% for item in (0..site.categories.size) %}
{% unless forloop.last %}
  {% capture this_word %}
  	{{ cats_list[item] | strip_newlines }}
  {% endcapture %}
<article>
	<h2 id="{{ this_word }}" class="tag-heading">{{ this_word }}</h2>
	<ul>
    {% for post in site.categories[this_word] %}
    {% if post.title != null %}
      <li class="entry-title">
      	<a href="{{ post.url }}" title="{{ post.title }}">{{ post.title }}</a>
     </li>
    {% endif %}{% endfor %}
	</ul>
</article>
<!-- /.hentry -->
{% endunless %}{% endfor %}
{% endraw %}
{% endhighlight %}

###10. Use Filters

You can use a bunch of the built in Liquid filters in your code to make tasks much easier.  For example, you can output the contents on your page in JSON or XML in order to have a search field on your website. 

Outputting the content of a YAML front matter array or hash in JSON is as easy as adding | jsonify after the array.  
{% highlight YAML %}
{% raw %}
---
list:
   - item1
   - item2
   - item3
---
{{ page.list | jsonify }}
{% endraw %}
{% endhighlight %}

You can also use slugify, strip_html, xml_escape and many others.  Take a look at the article on [Liquid in Jekyll at Jekyll Tips](http://jekyll.tips/tutorials/liquid/).

###Wrapup

Well, I hope you found this post useful and are well on your way to using Jekyll as your blogging / website platform.  It's a great platform and I think it makes the experience of creating a website or a blog so much better.  It takes a time investment up front, but after you are set up, maintenance and posting new content can be done without ever leaving your terminal / text editor.

Have fun and get in touch with me at [info@techrapport.com](mailto:info@techrapport) with any questions or comments