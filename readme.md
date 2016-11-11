# Vectography: Vector graphics repository
## Dynamic Web Applications: Harvard Fall 2016

Kevin Burek <kev[...]@g[...].com>

To be submitted as DWA (CSCI-E15) [Project 4](http://dwa15.com/Projects.../P4) 2016-12-15.

This site is published at [http://p4.dwa-e15.kb0.org/](http://p4.dwa-e15.kb0.org/)

This site is demonstrated at [https://youtu.be/TODO](https://youtu.be/TODO)

## Site content
The site is an open, social repository for vectorized graphics.

The site consists of:
* A gallery of existing, featured graphics.
* Detail and download pages for graphics.
* User account and profile creation.
* Anonymous or user-owned upload of new graphics.
* Metadata editing for user-owned graphics.

Some possible extensions for this site:
* Rendering of graphics into raster formats
* Inline modification, validation, and preview of svg code
* Upvote/Downvote ratings
* Viewership statistics
* Iterations and history
  * GitHub integration

Backend (php/laravel) package dependencies:
  * ~~[badcow/loremipsum](https://packagist.org/packages/badcow/lorem-ipsum) For lorem ipsum text.~~
  * ~~[fzaninotto/faker](https://packagist.org/packages/fzaninotto/faker) For randomized user profile content.~~
  * ~~[yzalis/identicon](https://packagist.org/packages/yzalis/identicon) For generated user profile images.~~
  
Others of interest, but not used:
  * ~~[redeyeventures/geopattern](https://packagist.org/packages/redeyeventures/geopattern) Seems promising for generated imagery.~~

In the frontend, this site uses [bootstrap](http://getbootstrap.com/) and [jquery](http://jquery.com/).  ~~The CSS is
all new, no templates were used.~~
