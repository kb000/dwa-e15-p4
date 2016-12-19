# Vectography: Vector graphics repository
## Dynamic Web Applications: Harvard Fall 2016

Kevin Burek <kev[...]@g[...].com>

To be submitted as DWA (CSCI-E15) [Project 4](http://dwa15.com/Projects.../P4) 2016-12-15.

This site is published at [http://p4.dwa-e15.kb0.org/](http://p4.dwa-e15.kb0.org/)

This site is demonstrated at [https://youtu.be/ZxU8_WaYxGA](https://youtu.be/ZxU8_WaYxGA)

## Site content
The site is an open, social repository for vectorized graphics.  It uses a novel mechanism to allow 
users to upload graphics but still maintain control over them, and obtain an 'edit' link to carry
that control to other browsers or share it with others.

The site consists of:
* A gallery of existing, featured graphics.
* Detail and download pages for graphics.
* Anonymous upload and persistent ownership of new graphics.
* Metadata editing for user-owned graphics.
* Deletion of user-owned graphics.
* Moderator account control over all graphics.

Some possible extensions for this site:
* Tagging of graphics.
* Rendering of graphics into raster formats.
* Inline modification, validation, and preview of svg code.
* Upvote/Downvote ratings
* Viewership statistics
* Iterations and history
  * GitHub integration

Backend (php/laravel) package dependencies:
  * [enshrined/svg-sanitize](https://packagist.org/packages/enshrined/svg-sanitize) for sanitization of SVG.
  * [jangobrick/php-svg](https://packagist.org/packages/jangobrick/php-svg) for rasterization of SVG.

In the frontend, this site uses [bootstrap](http://getbootstrap.com/) and [jquery](http://jquery.com/).
I made use of a card layout by Mattia Astorino from [codepen](http://codepen.io/MattiaAstorino/pen/VYWxXy).
