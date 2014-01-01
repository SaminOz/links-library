links-library
=============

Targeted loading of javascript and css for CodeIgniter - inspired by "Developing Large Web Applications" by Kyle Loudon

In reading the above mentioned book a few years ago, I started to ruminate on how much I disliked including all the javascript and css for a site (esp. large sites) with every page load. 

It's not horrendously inefficient, as obviously the brower cache handles much of the repeated heavy lifting, but it is not at all modular and although we all follow the separation of concerns philosophy, with large sites thousands of lines of code can be in the .js and .css files that our sites use. 

I was using CodeIgniter for a very large site at the time and wanted to be able to include the necessary js and css with each controller or each controller method, modularizing my code and keeping everything in one place so that when I revisited some particular piece of functionality later on I would get back up to speed much more quickly and if the module was reused, I would be fixing/improving in all places the modular code was used with whatever localized changes I was introducing. 

I found CSS and Javascript Combinator 0.5 by Niels Leenheer somewhere out there and then wrote a library for CodeIgniter that allowed js and css to be loaded on demand at the method level. I've been using this library for about 5 years now and although I don't do so much with CodeIgniter anymore, whenever I do create a new application using it I always set up this modular loading system to help me keep my code clean and manageable. 

Implementation
==============

To set up the links library you will need to add or make changes to the following files: 

 - .htaccess
 - /application/config/config.php
 - /application/views/header.php (or wherever you load your page specific <head/> element
 - /application/views/footer.php (or wherever you load your closing </body> element
 - /application/libraries/links.php
 - /combinator.php (same directory as your index.php and .htaccess files)
 - /application/controllers/welcome.php
 
.htaccess
-------------
The .htaccess file that I typically use is available from the repository. Essentially you are just passing through requests for /www/css/ and /www/js/ to Niels Leenheer's Combinator script. Note that I typically put my css and js directories in a /www/ subdirectory - you should change this path to suit your setup. 

config.php
-------------
I have included an example of a CodeIgniter config file that allows you to preload js and css into either the header or the footer (depending where you want it) as standard. In other words these files will always be present - so for instance you might load the relevant version of jQuery here or your base css files that all pages use. 

header.php and footer.php
-------------------------
Example files in repository. You can see from the code in the files the technique used for php to serve up the appropriate js and css based on the request. 

links.php
------------
This is the library that co-ordinates the config directives to enable modular loading. 

combinator.php
--------------
Niels Leenheer's Combinator Script. Edit the following lines to provide the correct path and DONT FORGET TO SET THE CORRECT PERMISSIONS
ON YOUR application/cache/ directory! (how many times have I made this error?).

welcome.php
-----------
You will be familiar with the CodeIgniter welcome page and welcome.php controller - I've add a call to links in the constructor for a js and css file that will be used in every page served by methods in this controller and I have added a method specific call to links which loads js and css only for the index method. 


===============
Whilst different manners of acheiving the same goal are no doubt plentiful out there, I hope my solution is useful for some and helps keep your site clean and modular. 

A tarball of the latest codeigniter at the time of committing these files with Links Library and all dependencies installed is here in the repository. 

Sam :)


