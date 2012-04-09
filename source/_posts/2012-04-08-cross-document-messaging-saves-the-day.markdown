---
layout: post
title: "Cross-document messaging saves the day"
date: 2012-04-08 07:51
comments: true
tags: cross-document cross-domain xdr ajax fileupload 
---

We've all been working pretty hard on Udunit in our free time and weekends, so we haven't posted here in a while, but I wanted to share something I struggled with for a while: cross-domain ajax uploads. So what's the problem?

Well, we've divided the system into two separate parts: a frontend and a RESTful API (maybe a subject for a future post but in the meantime [check this out](https://plus.google.com/112678702228711889851/posts/eVeouesvaVX)). These two parts sit on different domains. This caused me endless headaches when trying to get an image upload mechanism working.

{% img center /images/posts/arch.png udunit general architecture %}

The first problem I had was getting an ajax file upload to work. The gist is that file uploads via XMLHttpRequests aren't allowed (for security reasons). One workaround involves using an iframe as the upload target, so the response from the POST request is loaded asynchronously into the iframe, giving the impression of an ajax-y upload. (See [this post](http://www.alfajango.com/blog/ajax-file-uploads-with-the-iframe-method/) for a much more in-depth discussion of this method.) That wasn't terribly painful actually. 

But at this point there are two domains involved: the frontend domain of the main page where we uploaded from and the API domain of the iframe that we uploaded to. I needed to access the response data within the iframe in order to determine whether the upload was successful and to obtain the uploaded image's URL. However trying to access the data within the iframe resulted in a browser security exception (cross-domain). The problem is that browsers will not trust XMLHttpRequests' response data coming from a domain different than the page from which the request is made (hence cross-domain). Trying to access the data throws an error and returns no data.

How do we fix this? It took several days of banging my head against the wall and a great little website called [caniuse.com](http://caniuse.com), where you can discover all the cool features that web browsers implement, are implementing and should be implementing. Enter cross-document messaging.

Cross-document messaging (documented quite well on the [Mozilla Developer Network](https://developer.mozilla.org/en/DOM/window.postMessage)) allows you to post a message from one DOM window to another DOM window. The message that is sent can be any arbitrary data. Thus we can send the response data from the iframe (which has its own DOM window) to the parent or container window. The only question I ran into was how to trigger the iframe to fire off the `window.postMessage` function after the response from the upload was returned. The solution I came up with was to actually return an HTML page as the upload response; the page contains a section of javascript that executes as soon as the page is loaded (in the invisible iframe). The javascript calls the `window.postMessage` function with the target window being the parent window and the data being the metadata from the upload response. Definitely a hack but it gets the job done -- the returned HTML looks something like this:

    <html>
      <body>
        <script type='text/javascript'>
          window.parent.postMessage({ 'data': 'response data' },'targetWindow');
        </script>
      </body>
    </html>

where the `{ 'data': 'response data' }` represents the actual data we wanted to return in the response and `targetWindow` is the parent window. Then you just need to register an event listener for the "message" event on the parent window (since `window.postMessage` triggers this event), and the data will be passed to the event handler, therefore allowing you to pass the upload response data from the iframe to the parent window. This allows the upload to be performed asynchronously (ajax-y) and to the upload service sitting on another domain. And ta-da, thanks to cross-document messaging we have image upload working just as we wanted it. 
