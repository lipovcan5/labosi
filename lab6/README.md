Welcome to Slim-Jade-Twitter Bootstrap
===

What?
---

This is a boilerplate made from Slim-Jade, upgrading it, and putting Twitter bootstrap in it. Ready to start in no time.

[Slim Framework](http://www.slimframework.com/) combined with upgraded [jade.php](https://github.com/lukegb/jade.php) 

On top of that, routes are rendering jade converted [Twitter Bootstrap](https://github.com/twitter/bootstrap) pages:
* Fluid layout


Why?
---

I need a small and fast framework, and I like Jade. I found Slim-Jade by Joe Fleming on https://github.com/w33ble/slim-jade , 
but it used old jade.php, and others updated it to support Slim 2.0.

Originally jade.php was made by Konstantin Kudryashov on https://github.com/everzet/jade.php 
but as it wasn't updated in long time, this project uses a complete jade.php rewrite made by 
hackaugusto, sisoftrg and lukegb. 
Rewrited jade.php is avaliable at https://github.com/lukegb/jade.php


This is not a fork of old Slim-Jade as it's updated in several ways, with added Twitter bootstrap pages.
I work as a teacher at a polytechnic and I need a tool like this for demonstrations to students on MVC and templating.

This combination wasn't used in any (small or big) production. Yet.



How?
---

1. git clone git://github.com/stajp/Slim-Jade-TwitterBootstrap.git
2. cd Slim-Jade-TwitterBootstrap/vendor
3. git clone https://github.com/lukegb/jade.php.git
4. git clone https://github.com/codeguy/Slim.git

Note: any [Twitter Bootstrap] (https://github.com/twitter/bootstrap) updates you should make by hand :(

Important files:

- bootstrap.php : All the app configuration happens here
- index.php : All your routes live here


All respective licences are left with vendors files (Bootstrap's is in CSS folder)
