<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  
    @routes
    @vite(['resources/js/app.js','resources/css/app.css', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
  </head>
  <body style="background: rgb(239 242 245);">
    
    @inertia
  </body>
</html>
<!--  -->