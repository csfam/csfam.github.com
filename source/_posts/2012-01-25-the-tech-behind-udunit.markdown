---
layout: post
title: "The Tech Behind Udunit"
date: 2012-01-25 18:10
comments: true
tags: technology hosting database api framework 
---

One of the first problems we encountered in building Udunit was choosing the technologies we wanted to use.  Given three people with relatively strong opinions, agreeing on technologies to use was no easy task.  Luckily, after discussing at length our various options, we were able to persuade one another to a more or less unanimous conclusion.

### Hosting
We were all leaning towards [Heroku](http://www.heroku.com) but spent some time discussing the benefits of [Amazon EC2](http://aws.amazon.com/ec2).  We liked the idea of having the freedom and control over our servers, but ultimately wanted something that was easy to deploy to and required little maintenance.  Heroku gave us the most value for the least amount of work so that was that.

### Database
After watching one of [Foursquare's tech talks](http://www.10gen.com/presentations/mongonyc-2011/foursquare), Ray became enamored with [Mongodb](http://www.mongodb.org) and was a big proponent for using it in Udunit.  The parts that particularly appealed to us were the JSON style storage, auto-scaling/sharding and full index support.  We were a little wary about using NoSQL, considering all of us were more used to relational databases like MySQL, but we were excited about the possibilities.  Plus, despite our familiarity with MySQL, we were also frustrated with the hassle in scaling, the restriction in schema design and the performance.

### API Framework
Ray also pushed for using [Lift/Scala](http://liftweb.net/) for our API framework (hint: Foursquare [uses](https://docs.google.com/present/view?id=dcbpz3ck_25czcns2c2&revision=_latest&start=0&theme=blank&cwj=true) it).  Honestly, the biggest selling point here for us was the novelty of using a new language that reduces the verbosity of Java and encourages functional programming.

### Web Framework
We had a variety of options here.  A couple of us have used Django, GWT and Struts before so we had some stronger opinions.  However, considering we were using Lift for our API framework, we ultimately decided that Lift on the frontend would accelerate our learning curve and also simplify the number of technologies we had to learn.  We were also intrigued by the idea behind Snippets which seemed like a completely new way of thinking about frontend design.

### Conclusions thus far..
We've been using these technologies for a couple weeks now.  Scala has proven to be an extraodinary language with a bit of a painful learning curve.  But, so far, no complaints.  We're excited to be learning these technologies and having fun while doing it!
