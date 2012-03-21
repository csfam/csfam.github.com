---
layout: post
title: "Measuring Heroku's concurrent request performance for long-running requests"
date: 2012-01-17 00:32
comments: true
tags: heroku performance nodejs lift scala django python 
---

I've been meaning to write some posts here for a while, and I'm glad I'm finally getting around to it. The first thing I wanted to write about is some testing we did a couple months back with the number of concurrent user requests that could be handled by [Heroku](http://www.heroku.com) using a variety of backend technologies. But first off, in case you've managed to miss it -- what is Heroku, why are we using it, and how does it work?

+ It is a cloud-based application platform with built-in scalability and management tools.
+ It makes things dead simple from deployment to scaling up.
+ It's free as long as you stay under a monthly traffic limit, which is perfect if you're just starting up your idea.
+ Essentially dynos handle web requests within the Heroku architecture, and scaling up your application is just a matter of increasing the number of dynos you are using. Piece of cake.

One of the other nice things about Heroku is it provides developers with a good amount of freedom in terms of what languages and frameworks can be used. Heroku will support JVM-based languages (Java, Scala, etc.), Ruby, Node.js, and Python. We were considering a number of options for the language and framework to use for our latest project, [udunit](http://demo.udunit.com), and we had narrowed our list down to [Scala](http://scala-lang.org) and the [Lift framework](http://liftweb.net/), [Python](http://www.python.org) and the [Django framework](https://www.djangoproject.com/), or [Node.js](http://nodejs.org) and the [Express framework](http://expressjs.com).

The Tests
----------
We set up very simple Heroku projects -- one for each of the three frameworks mentioned above -- that would result in a long-running request (i.e. the server was "busy" generating the response for ~2 seconds). Using the [Apache Bench](http://httpd.apache.org/docs/2.4/programs/ab.html) tool, we were able to do some load testing of the various frameworks running on Heroku. What we really wanted to test was how well a single Heroku dyno would handle concurrent requests. So we ran tests via Apache Bench with increasingly more concurrent requests: 1, 2, 3, 4,5, 10, 20.


The Results
------------
<script type="text/javascript" src="//ajax.googleapis.com/ajax/static/modules/gviz/1.0/chart.js"> {"dataSourceUrl":"//docs.google.com/spreadsheet/tq?key=0AlrawxK1noHLdExqRUhLWFp6YXkwaFVyOENseE1TZkE&transpose=0&headers=1&merge=COLS&range=B2%3AB9%2CH2%3AI9&gid=0&pub=1","options":{"vAxes":[{"title":"requests per second handled","minValue":null,"viewWindowMode":"pretty","viewWindow":{"min":null,"max":null},"maxValue":null},{"viewWindowMode":"pretty","viewWindow":{}}],"title":"Node.js -- Express framework","booleanRole":"certainty","animation":{"duration":500},"vAxis":{"format":""},"useFirstColumnAsDomain":true,"hAxis":{"title":"concurrent requests","format":""},"isStacked":false,"width":600,"height":371},"state":{},"view":{"columns":[{"calc":"stringify","type":"string","sourceColumn":0},1,2]},"chartType":"ColumnChart","chartName":"Chart 1"} </script>


<script type="text/javascript" src="//ajax.googleapis.com/ajax/static/modules/gviz/1.0/chart.js"> {"dataSourceUrl":"//docs.google.com/spreadsheet/tq?key=0AlrawxK1noHLdExqRUhLWFp6YXkwaFVyOENseE1TZkE&transpose=0&headers=1&merge=COLS&range=B14%3AB21%2CH14%3AI21&gid=0&pub=1","options":{"vAxes":[{"title":"requests per second handled","minValue":null,"viewWindowMode":"pretty","viewWindow":{"min":null,"max":null},"maxValue":null},{"viewWindowMode":"pretty","viewWindow":{}}],"booleanRole":"certainty","title":"Python -- Django framework","animation":{"duration":500},"vAxis":{"format":""},"useFirstColumnAsDomain":true,"hAxis":{"title":"concurrent requests","format":""},"isStacked":false,"width":600,"height":371},"state":{},"view":{"columns":[{"calc":"stringify","type":"string","sourceColumn":0},1,2]},"chartType":"ColumnChart","chartName":"Chart 2"} </script>


<script type="text/javascript" src="//ajax.googleapis.com/ajax/static/modules/gviz/1.0/chart.js"> {"dataSourceUrl":"//docs.google.com/spreadsheet/tq?key=0AlrawxK1noHLdExqRUhLWFp6YXkwaFVyOENseE1TZkE&transpose=0&headers=1&merge=COLS&range=B26%3AB33%2CH26%3AI33&gid=0&pub=1","options":{"vAxes":[{"title":"requests per second handled","minValue":null,"viewWindowMode":"pretty","viewWindow":{"min":null,"max":null},"maxValue":null},{"viewWindowMode":"pretty","viewWindow":{}}],"booleanRole":"certainty","title":"Scala -- Lift framework","animation":{"duration":500},"vAxis":{"format":""},"useFirstColumnAsDomain":true,"hAxis":{"title":"concurrent requests","format":""},"isStacked":false,"width":600,"height":371},"state":{},"view":{"columns":[{"calc":"stringify","type":"string","sourceColumn":0},1,2]},"chartType":"ColumnChart","chartName":"Chart 3"} </script>

