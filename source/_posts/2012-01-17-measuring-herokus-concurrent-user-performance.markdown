---
layout: post
title: "Measuring Heroku's concurrent user performance"
date: 2012-01-17 00:32
comments: true
tags: heroku performance nodejs lift scala django python 
---

I've been meaning to write some posts here for a while, and I'm glad I'm finally getting around to it. The first thing I wanted to write about is some testing we did a couple months back with the number of concurrent user requests that could be handled by [Heroku](http://www.heroku.com) using a variety of backend technologies. But first off, in case you've managed to miss it -- what is Heroku, why are we using it, and how does it work?

+ It is a cloud-based application platform with built-in scalability and management tools.
+ It makes things dead simple from deployment to scaling up.
+ It's free as long as you stay under a monthly traffic limit, which is perfect if you're just starting up your idea.
+ Essentially _dynos_ handle web requests within the Heroku architecture, and scaling up your application is just a matter of increasing the number of dynos you are using. Piece of cake.

One of the other nice things about Heroku is it provides developers with a good amount of freedom in terms of what languages and frameworks can be used. Heroku will support JVM-based languages (Java, Scala, etc.), Ruby, Node.js, and Python. We were considering a number of options for the language and framework to use for our latest project, [udunit](http://demo.udunit.com), and we had narrowed our list down to [Scala](http://scala-lang.org) and the [Lift framework](http://liftweb.net/), [Python](http://www.python.org) and the [Django framework](https://www.djangoproject.com/), or [Node.js](http://nodejs.org) and the [Express framework](http://expressjs.com).

The Tests
----------
