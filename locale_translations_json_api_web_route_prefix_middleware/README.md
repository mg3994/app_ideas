
create lang folder in resources
add some en.json and other file or simply by locale code but by default en is needed
add some dummy
```json
{
"@@locale": "en",
"@@version":"0.1",
"@@language":"English",
"@@flag":"uk",
"@@datetime":"dd MM ,YYYY",
"@@appname":"Laravel", //get this from env file  variable of laravel application
"":"", //add more

}
```

create these in web and api route
```php 

use Illuminate\Support\Facades\Session; // only for web one  Middleware not for api
Route::redirect('/', '/' . (Session::get('locale', 'en'))); //if nothing in session get default as 'en'


Route::group(['prefix'=>'{locale}'],function (){
    //move here what ever is there starting with Route:
});

```
# create a Middleware seprate for API and Web by adding API or Web at the end of Middleware Class/File Name or use --api

* Name Of MiddleWare is : *LocaleMiddleware*
cmd is 
```bash
php artisan make:middleware LocaleMiddleware

```

path is
* C:\learning\laravel\chiku\app\Http\Middleware\


```php
<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session; // only for web one  Middleware
use Illuminate\Support\Facades\File;

 /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

 public function handle($request, Closure $next)
     {
         $availableLocales = array_map(
             fn($file) => pathinfo($file, PATHINFO_FILENAME),
             File::files(resource_path('lang'))
         );
 
         $defaultLocale = config('app.locale');
         $locale = Session::get('locale', $defaultLocale);
 
         $segments = explode('/', $request->getRequestUri());
         if (in_array($segments[1], $availableLocales)) {
             if (Session::get("locale") === $segments[1]) {
             \App::setLocale($segments[1]);
                 return $next($request);
             } else {
                 Session::put('locale', $segments[1]);
                 \App::setLocale($segments[1]);
                 return $next($request);
             }
         } else {
             $segments[0] = $locale;
             \App::setLocale($locale);
             return redirect(implode('/', $segments));
         }
     }



?>




```
# changement in Kernel file 

path is 
* C:\learning\laravel\chiku\app\Http\Kernel.php


scroll to web $middlewareGroups array

* add seperately for 'web' and 'api'
```php 
\App\Http\Middleware\LocaleMiddlewareWeb::class, //at bottom of array
```

for api add 
```php
\App\Http\Middleware\LocaleMiddlewareApi::class, //at bottom of array

```


# for Web now for Every route('',app()->getLocale())
please do add these in blade temp.. // only for web // or set logic for session
app()->getLocale()


# add flag svg files and set dropdown to change locale , 
* //TODO

#
