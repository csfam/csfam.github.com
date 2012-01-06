---
layout: post
title: "Greenlite Dartmouth"
date: 2009-07-20 22:10
comments: true
categories: portfolio 
tags: [energy, animation, games, 3D, polarbear]
---


<iframe id="greenlite" width="640" height="480" src="http://www.youtube.com/embed/RGeYHYpLQa8?rel=0" frameborder="0" allowfullscreen></iframe>

The Greenlite Project: An animated polar bear which aims to educate students about the impact of electricity and other resource use.

This was a Siggraph 2009 information aesthetics video submission we made. Although we didn't get into the information aesthetics category we did end up with a Siggraph Poster and were invited to a Panel. This video provides a good summary of what the project was about. 


<!--more-->


#Greenlite Dartmouth (aka TellEmotion)#

Together with one of my favorite professors and two other students we founded a startup called TellEmotion (from Tim/Evan/Lorie/Luke).  The idea was to present electrical usage in an intuitive emotionally appealing way.  We designed and implemented a system for reading electrical meters on campus which would then feed into an animation of a polar bear.   The state of the bear would change based on the how efficiently the resources were being used.  If electrical usage was up (either compared to historical data or to some target goals) then the bear would be unhappy and its environment would be melting, if electrical usage was down, then it would play and be happy.  This was based on some research that showed that behavior change is sometimes better driven by emotional rewards rather than strictly financial considerations.  The system was a success and is now installed in many dorms and buildings on the campus as well as in other schools nationwide.   Although the most benefit comes from the educational aspect of the system, it has been shown to decrease energy usage over time.

##Semi-Publications##
Here is a paper we submitted to Siggraph (not accepted): [Greenlite Dartmouth](https://s3.amazonaws.com/timofei7portfolio/greenlite/siggraph_paper.pdf)

Here is our Poster (was accepted): [Greenlite Poster](https://s3.amazonaws.com/timofei7portfolio/greenlite/GreenLitePosterSiggraph.pdf)


##Original Flash Version##

My contributions ranged from system design and implementation to administration.  I worked on a number of pieces, including the communication with the electrical meters, brainstorming design and system architecture, poller (Java), server configuration and fronted display configuration and setup.  Additionally in the video you can see some parts of a 3D environment that I designed (with help from Craig Slagel and others), as well as a brief glance at a 3D Dartmouth campus for which I wrote the Unity3d code to do a navigation map.
 
**Brief Technical Details:** The fronted was flash and GWT with the Java backed and mysql database fed with minute by minute electrical data by a Java poller. More details in the [paper](https://s3.amazonaws.com/timofei7portfolio/greenlite/siggraph_paper.pdf).


##3D Version##

Toward the end of my time with the project I worked on a more game-like realtime interactive 3D variant in which everything responds to the energy use. This was designed as a web demo so the energy use is controllable by clicking on the light bulbs. Other parts of the environment also react to various things, the bear can look at the monitoring station (update: the image source for the realtime graph is no longer available), and pretty much everything in the world responds one way or another to the energy use.

**Brief Technical Details:**
I implemented this in Unity3D in C# using models I created in Maya. All the polar bear animation is motion capture of… me…  The system does have the capability to connect to the metering backend and get realtime energy data (same as the 2D version), however for the web demo that is turned off. 

**Try it out, click around!   [Polar Bear 3D demo](/pages/pBear.html)**


##Lessons Learned##

I learned a lot on this project, from electrical metering to architecting a larger scale software project to working with motioncapture and a 3D game engine.  Another important lesson was that 3D is not necessarily better. Although people responded positively to the 3D animations (more so the quadruped version in the video than the biped in the web demo), the 3D version would have required many more man hours and at that stage in the project was simply too work intensive. 

You can see it all live at Dartmouth right now here: [Greenlite Dartmouth](http://greenlite.dartmouth.edu)



