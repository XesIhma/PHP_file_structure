# PHP_file_structure
Base for future php projects  It contains public and src directories, and has htaccess configured.

### HTACCESS ###
For project to work in your htdocs folder you need to change in both .htaccess files "RewriteBase /php_app/" to "RewriteBase / ". 
If your project isn't directly in htdocs folder but in subfolder i.e. "htdocs/php_app" then you have to change path in RewriteBase to match name of your project root. 

It's important to change both .htaccess files. In root as well as in public directory. 

### VIEW RENDERING ###
View Class provides very basic rendering logic. 

If file contains @content then it may be taken to wrap content of another file which has '@extends( file )' statement in it. 
I.e. 
```
 app.html
 <html>
  <head> ... </head>
  <body>
    @content
  </body>
 </html> 
 
 file.html
 @extends( app )
 <p>Helo World</p>
 ```
 
It will render ```<p>Helo World</p>``` in place of '@content'. 

Also any data passed as associative array to render() method will replace variables in {{ $var }} found in html file.
I.e.
```
  index.php
  // ... 
  $data = array(
   "name" => "Horld"
  );
  $view->render($data)
  
  file.html
  <p>Hello {{ $name }}</p>
  ```
  
### CREATING CUSTOM RENDERING METHODS ###
It wasn't my intention to create new php framework, rather just configured directory for quict start. If you want to have elements as @foreach or @yield('text') you can copy
line with ```$offset = mb_stripos``` and add your own logic.

### DATABASE ###
to be done
