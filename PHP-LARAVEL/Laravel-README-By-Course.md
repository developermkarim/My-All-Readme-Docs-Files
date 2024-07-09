# LARAVEL DOCUMENTATION BASED ON OFFICIAL
---


## Install, Configure, Directory Structure, Frontend, Starter Kits & Deployment
---
Certainly! I'll provide you with a comprehensive explanation of each of these topics in Laravel, along with code examples where relevant. This will serve as a thorough guide for Laravel developers.

### Getting Started with Laravel
---
Laravel is a PHP web application framework that simplifies and accelerates the development of web applications. Here are the key steps to get started with Laravel:

1. **Prerequisites:** Ensure you have PHP, Composer, and a web server (e.g., Apache or Nginx) installed on your system.

2. **Installation:** Use Composer to create a new Laravel project:
   
   ```bash
   composer create-project --prefer-dist laravel/laravel projectName
   ```

3. **Configuration:** Laravel's configuration files are located in the `config` directory. You can customize various settings like database connections, caching, and more.

### Directory Structure

Laravel follows a well-organized directory structure:

Laravel follows a structured directory layout:
- `app`: folder is one of the core folders in a Laravel project.
It contains various subfolders and files that together make up the application's logic and functionality
- `bootstrap`:  folder provides the necessary startup and configuration scripts to initialize the Laravel framework
- `config`: Configuration files.
- `database`: Database migrations and seeders.
- `public`: Publicly accessible assets.
- `resources`: Views and frontend assets.
- `routes`: Application routes.
- `storage`: Temporary files and logs.
- `tests`: PHPUnit tests.
- `vendor`: Composer dependencies.
- `.env`: Environment configuration file.
- `webpack.mix.js` and `package.json`: Frontend build configuration.

#### **config/auth.php**
In Laravel's `auth.php` configuration file, these settings are used to define how authentication works in your application. Let's break down each part for beginners:

```php
 'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ], 
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ], 
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
     'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],
```
1. `'defaults'`:
   - `'guard'`: This specifies the default authentication guard for your application. In a web application, the default guard is set to `'web'`, which uses sessions for authentication.

   - `'passwords'`: This defines the default password reset broker. It's set to `'users'`, which means it will use the "users" provider for password resets.

2. `'guards'`:
   - `'web'`: This is a guard configuration named `'web'`, which is used for typical web-based user authentication. It's set to use sessions, which is the default method for web applications, and it specifies the provider (`'users'`) for user retrieval.

3. `'providers'`:
   - `'users'`: This defines a provider named `'users'`, which is set to use Eloquent for user retrieval. It also specifies the User model (`App\Models\User::class`) to be used.

4. `'passwords'`:
   - `'users'`: This sets up a password reset configuration named `'users'` and specifies:
     - `'provider'`: It uses the `'users'` provider, which was defined earlier in `'providers'`.
     - `'table'`: It specifies the database table (`'password_resets'`) where password reset tokens are stored.
     - `'expire'`: It sets the expiration time for password reset tokens to 60 minutes.
     - `'throttle'`: It limits the number of password reset emails that can be sent within 60 minutes.

Now, let's explain this in simple terms for beginners:

- `'defaults'` tells Laravel what the default way of authentication is (sessions) and the default method for password resets (using the "users" provider).

- `'guards'` define how authentication should work. `'web'` is used for regular web applications and relies on session-based authentication.

- `'providers'` specify where user information is stored and how to retrieve it. `'users'` uses the Eloquent model to interact with the users' data.

- `'passwords'` is about handling password resets. `'users'` configuration defines how password reset tokens are generated, how long they are valid, and how many can be sent within a certain time.

In essence, these settings configure how users are authenticated and how password resets are handled in a Laravel web application. Beginners can think of them as the rules and tools that make user login and password reset features work smoothly.

#### **More & Custom Guard**
---
Sure, let's create a custom guard step by step using a guard table and a provider in a Laravel application. For simplicity, we'll create a basic guard called `custom` that uses a database table named `guard_users` for authentication.

1. **Database Setup**:

   First, create a migration to define the structure of the `guard_users` table. Open a terminal and run:

   ```bash
   php artisan make:migration create_guard_users_table
   ```

   Edit the generated migration file to define the table structure:

   ```php
   // database/migrations/[timestamp]_create_guard_users_table.php

   use Illuminate\Database\Migrations\Migration;
   use Illuminate\Database\Schema\Blueprint;
   use Illuminate\Support\Facades\Schema;

   class CreateGuardUsersTable extends Migration
   {
       public function up()
       {
           Schema::create('guard_users', function (Blueprint $table) {
               $table->id();
               $table->string('name');
               $table->string('email')->unique();
               $table->string('password');
               $table->timestamps();
           });
       }

       public function down()
       {
           Schema::dropIfExists('guard_users');
       }
   }
   ```

   Run the migration:

   ```bash
   php artisan migrate
   ```

2. **Model Setup**:

   Create a model for the `guard_users` table:

   ```bash
   php artisan make:model GuardUser
   ```

   Edit the generated model to specify the table:

   ```php
   // app/Models/GuardUser.php

   namespace App\Models;

   use Illuminate\Database\Eloquent\Factories\HasFactory;
   use Illuminate\Database\Eloquent\Model;

   class GuardUser extends Model
   {
       use HasFactory;

       protected $table = 'guard_users';
   }
   ```

3. **Custom Guard Configuration**:

   Open the `config/auth.php` file and add a new guard configuration:

   ```php
   'guards' => [
       'custom' => [
           'driver' => 'session',  // 'session' or 'token'
           'provider' => 'custom_users', // The name of the provider
       ],
   ],
   ```

   Add a new provider configuration under the `'providers'` section:

   ```php
   'providers' => [
       'custom_users' => [
           'driver' => 'eloquent',
           'model' => \App\Models\GuardUser::class,
       ],
   ],
   ```

   This configuration tells Laravel that the `custom` guard uses the `session` driver and the `custom_users` provider, which is an Eloquent model for our `guard_users` table.

4. **Auth Middleware**:

   Use the `auth` middleware to protect routes. Open your routes file (`web.php` for web routes) and use the `auth:custom` middleware:

   ```php
   Route::middleware('auth:custom')->group(function () {
       // Your protected routes go here
   });
   ```

5. **Authentication in Controller**:

   Now, you can use the `auth()` helper or the `Auth` facade in your controllers to check authentication and get the authenticated user:

   ```php
   // Example in a controller method
   public function index()
   {
       if (auth('custom')->check()) {
           // User is authenticated
           $user = auth('custom')->user();
           // Do something with the authenticated user
       } else {
           // User is not authenticated
           // Redirect or handle as needed
       }
   }
   ```

Certainly! Let's continue with more details about the custom guard, provider, and session in Laravel.

6. **Session Configuration**:

   The `session` driver in the guard configuration (`'driver' => 'session'`) indicates that the guard will use Laravel's session mechanism for authentication. Sessions are a way to persist user data across requests.

   Make sure that your `config/session.php` file has the following configuration:

   ```php
   'driver' => env('SESSION_DRIVER', 'file'),
   ```

   Laravel supports various session drivers (`file`, `database`, `redis`, etc.). In this case, it defaults to the `file` driver.

7. **Middleware Groups**:

   In your `Kernel.php` file (located in the `app/Http` directory), you can find the `$middlewareGroups` property. Ensure that the `web` middleware group includes the `\Illuminate\Session\Middleware\StartSession::class` middleware:

   ```php
   protected $middlewareGroups = [
       'web' => [
           // ... other middleware
           \Illuminate\Session\Middleware\StartSession::class,
           // ... other middleware
       ],
   ];
   ```

   This middleware is crucial for handling sessions, which are necessary for the `session` guard driver.

8. **Routes and Redirects**:

   When using the custom guard, make sure to specify the guard name in your routes and redirects:

   ```php
   // For routes
   Route::middleware('auth:custom')->group(function () {
       // Your protected routes go here
   });

   // For redirects
   return redirect()->route('your.route.name')->with('guard', 'custom');
   ```

   This ensures that Laravel knows which guard to use when checking authentication.

9. **Example of Logging In a User**:

   To log in a user, use the `attempt` method on the `Auth` facade. This is typically done in your login controller:

   ```php
   public function login(Request $request)
   {
       // Validate user credentials

       if (Auth::guard('custom')->attempt(['email' => $request->email, 'password' => $request->password])) {
           // Authentication successful
           return redirect('/dashboard');
       } else {
           // Authentication failed
           return back()->withErrors(['email' => 'Invalid credentials']);
       }
   }
   ```

   In this example, `Auth::guard('custom')->attempt(...)` attempts to log in a user using the custom guard.

Remember that this example assumes a basic web application setup. Adjustments may be needed based on your specific application requirements, such as API authentication, token-based guards, or additional middleware configurations.

#### *The 'provider' key and the 'driver' key are built in the words of Laravel*

Yes, you can customize the names of the 'provider' and 'driver' keys in your Laravel configuration. These keys are not reserved words, and you have the flexibility to choose different names that make sense for your application.

Here's an example of how you might customize these keys in the 'guards' configuration:

```php
'guards' => [
    'custom' => [
        'authentication_method' => 'session',  // You can use a different name here
        'data_provider' => 'custom_users',      // You can use a different name here
    ],
],
```

Similarly, you can customize the names in the 'providers' configuration:

```php
'providers' => [
    'custom_users' => [
        'data_source' => 'eloquent',               // You can use a different name here
        'user_model' => \App\Models\GuardUser::class,
    ],
],
```

These names are just keys used in the configuration array, and you can choose names that align with your application's terminology or your personal preference. Just make sure that you use the same names consistently in both the 'guards' and 'providers' configurations, so Laravel can properly associate them.

In summary, feel free to rename these keys to better suit your application, as long as you maintain consistency across your configuration files.

#### **Middleware of RedirectIfAuthenticated**
---
It Handles an incoming request. by the method.
```bash
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                if (Auth::check() && Auth::user()->role == 'user' ) {
                    return redirect('/dashboard');

                } if (Auth::check() && Auth::user()->role == 'agent' ) {
                    return redirect('/agent/dashboard');

                }if (Auth::check() && Auth::user()->role == 'admin' ) {
                    return redirect('/admin/dashboard');
                }
 
                
            }
        }

        return $next($request);
    }
```
**Notes:**
The `...$guards` syntax allows the function to accept an arbitrary number of arguments ( variadic/বৈচিত্র্যময় parameter). In the case of the RedirectIfAuthenticated middleware, it's designed to work with multiple guards. Guards in Laravel are mechanisms for authenticating users, and a single application might have multiple guards, each responsible for a different authentication system (e.g., web, api).

For Example :
```bsh
Route::middleware('auth:web')->get('/dashboard', 'DashboardController@index');
// or
Route::middleware('auth:api')->get('/api/dashboard', 'ApiController@index');
// or even both
Route::middleware('auth:web,api')->get('/combined/dashboard', 'CombinedController@index');

```
To Redirect directly , Use the Class in with login Route Like Following.

The Routes :
```bash
Route::get('/agent/login', [AgentController::class, 'AgentLogin'])->name('agent.login')->middleware(RedirectIfAuthenticated::class); 

 Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class); 
```

**Why Not Used in register or email verify or others**
to summarize, `'defaults'`,`'guards'`, `'providers'`, and `'passwords'` in `auth.php` primarily deal with user login and password reset, while user registration and email verification are typically implemented using separate routes, controllers, views, and email functionality in your Laravel application.

When a user is not logged in and visits a website as a guest, Laravel's auth.php configuration doesn't have a direct impact on their experience. The settings in `auth.php` are primarily concerned with how user authentication and sessions are handled for logged-in users.

For `guests` (users who are not logged in), Laravel provides a mechanism for handling public access to your application without requiring authentication. This typically involves setting up routes, controllers, and views to display content to guests.

### **Frontend**

Laravel provides tools for frontend development:

- **Blade Templates:** Laravel uses Blade as its templating engine. You can create dynamic views with Blade's expressive syntax.

   ```php
   <!-- Blade template example -->
   <h1>Hello, {{ $name }}</h1>
   ```

- **Asset Compilation:** Laravel Mix simplifies asset compilation, including CSS and JavaScript.
 **Laravel Mix**

 `mix.js('resources/js/app.js', 'public/js').sass('resources/sass/app.scss', 'public/css');` is typically found in your Laravel project's `webpack.mix.js` file. This file is located at the root of your Laravel project.
   ```javascript
   // webpack.mix.js
   mix.js('resources/js/app.js', 'public/js')
      .sass('resources/sass/app.scss', 'public/css');
   ```
   **Means:**
1. **`mix.js('resources/js/app.js', 'public/js')`:**
   - This is using Laravel Mix to compile JavaScript.
   - It takes the JavaScript file located at `resources/js/app.js`.
   - It compiles and bundles it.
   - The result is saved in the `public/js` directory.

2. **`.sass('resources/sass/app.scss', 'public/css')`:**
   - This part is for compiling Sass (Syntactically Awesome Stylesheets) into CSS.
   - It takes the Sass file located at `resources/sass/app.scss`.
   - It compiles it into CSS.
   - The result is saved in the `public/css` directory.

In summary, this line of code is configuring Laravel Mix to process your JavaScript and Sass files, compile them, and store the output in the specified directories (`public/js` for JavaScript and `public/css` for Sass/CSS). It's a convenient way to manage and build your frontend assets in a Laravel project.


### **Vite and Mix**
---
#### **Vite:**

##### Simple Explanation:
Think of Vite as a tool that helps you develop your frontend applications super fast. It does this by taking advantage of modern browser features to build your project quickly during development. It's like a wizard that makes your code run smoothly while you're working on it.

##### How to Use Vite with Vue.js (a basic example):
Assuming you've already set up a Vue project and have Node.js installed:

1. **Install Vue CLI globally (if not done already):**
   ```bash
   npm install -g @vue/cli
   ```

2. **Create a new Vue project using Vite:**
   ```bash
   vue create my-vite-project
   ```

3. **Start the development server:**
   ```bash
   cd my-vite-project
   npm run dev
   ```
   This command will start the development server.

#### **Laravel Mix:**

##### Simple Explanation:
Imagine Laravel Mix as your assistant that helps you compile, combine, and manage your frontend assets (like CSS, JavaScript) without you needing to understand all the complex inner workings. It's like having a handy toolkit for managing your project's frontend tasks easily.

##### How to Use Laravel Mix (a basic example):
Assuming you have a Laravel project set up:

1. **Install Laravel Mix (if not included already):**
   It's typically included by default in a fresh Laravel installation.

2. **Define your asset compilation tasks in your `webpack.mix.js` file:**
   For example, you can compile your SCSS into CSS and merge multiple JavaScript files into one.
   ```javascript
   // Example webpack.mix.js file
   mix.js('resources/js/app.js', 'public/js')
      .sass('resources/sass/app.scss', 'public/css');
   ```
3. **Run the compilation:**
   ```bash
   npm run dev
   ```
   This command will run the predefined asset compilation tasks defined in your `webpack.mix.js` file.


#### **Configuring Laravel Mix:**

1. **Installation:**
   Install Laravel Mix in your Laravel project:
   ```bash
   npm install laravel-mix --save-dev
   ```

2. **Using Laravel Mix:**

   In your `webpack.mix.js` file, import and compile the AdminLTE CSS and JavaScript:

   ```javascript
   const mix = require('laravel-mix');

   mix.sass('resources/sass/app.scss', 'public/css')
      .js('resources/js/app.js', 'public/js')
      .styles([
         'node_modules/admin-lte/dist/css/adminlte.min.css',
      ], 'public/css/admin-lte.css')
      .scripts([
         'node_modules/admin-lte/dist/js/adminlte.min.js',
      ], 'public/js/admin-lte.js');
   ```

3. **Run Mix Commands:**
   Compile the assets using Mix commands:
   ```bash
   npx mix
   ```

#### Configuring Vite:

1. **Installation:**
   Install Vite in your project:
   ```bash
   npm init vite@latest my-vite-project
   cd my-vite-project
   npm install
   ```

2. **Using Vite:**

   Inside the `vite.config.js` file in your project root, specify the build setup:

   ```javascript
   import { defineConfig } from 'vite';

   export default defineConfig({
     build: {
       rollupOptions: {
         input: {
           app: 'resources/js/app.js',
         },
       },
       css: {
         preprocessorOptions: {
           scss: {
             additionalData: `@import 'admin-lte/dist/css/adminlte.min.css';`,
           },
         },
       },
     },
   });
   ```

3. **Running Vite:**
   Start the Vite development server:
   ```bash
   npm run dev
   ```

#### Comparison:

- **Laravel Mix**:
  - Manages compilation tasks in a single configuration file (`webpack.mix.js`).
  - Offers clear syntax and an easier setup for users familiar with Laravel.

- **Vite**:
  - Configuration is more modular and flexible, using separate config files and leveraging ES modules.
  - Provides faster build times due to its modern, optimized approach.


### Starter Kits

Laravel offers starter kits for common use cases:

- **Jetstream:** A customizable authentication system with user registration, login, and two-factor authentication.

- **Fortify:** A minimal authentication scaffolding that you can customize according to your needs.

- **Breeze:** A lightweight and minimalistic starter kit for authentication.

```PHP
php artisan ui bootstrap --auth
```

### **Deployment**

When deploying a Laravel application:

- Set up a production server with PHP and a web server.
- Configure your web server to point to the `public` directory as the document root.
- Secure your environment by setting appropriate permissions and environment variables.
- Use a tool like Laravel Envoyer or deploy scripts to automate the deployment process.



## Architecture Concepts
---
 architecture concepts in Laravel, including "Request Lifecycle," "Service Container," "Service Providers," and "Facades," along with code examples for Laravel developers.

### **REQUEST LIFESTYLE**
 ---
 Certainly! Understanding the request lifecycle in Laravel is crucial for developers to comprehend how an HTTP request is processed and how different components of the framework work together. Here's a detailed explanation of the request lifecycle in Laravel, along with code examples:


#### Overview:
The request lifecycle in Laravel describes the sequence of events that occur when an HTTP request is received and processed by the framework. It involves several key components and stages.

#### Key Stages in the Request Lifecycle:

1. **Entry Point:**
   - The request enters Laravel through the `public/index.php` file.
   - Laravel's application instance is created.

2. **HTTP Kernel:**
   - The request is then passed to the HTTP Kernel, which serves as the central part of the request handling process.
   - The kernel loads middleware and routes.

3. **Middleware:**
   - Middleware are classes that can perform actions before or after the request reaches the application's core logic.
   - Middleware is defined in the `app/Http/Kernel.php` file.

   Example Middleware:

   ```php
   public function handle($request, Closure $next)
   {
       // Perform actions before the request is handled.
       // ...

       $response = $next($request);

       // Perform actions after the request is handled.
       // ...

       return $response;
   }
   ```

4. **Routing:**
   - Laravel's router matches the incoming request to a route defined in the `routes/web.php` or `routes/api.php` file.
   - Controllers or closures handle the matched route.

   Example Route:

   ```php
   Route::get('/home', 'HomeController@index');
   ```

5. **Controller Action:**
   - If a controller handles the route, it executes a specific method (action) within the controller.
   - The controller processes the request and returns a response.

   Example Controller:

   ```php
   class HomeController extends Controller
   {
       public function index()
       {
           // Your controller logic here.
           return view('home');
       }
   }
   ```

6. **Response:**
   - The response goes back through the middleware and kernel.
   - Middleware can modify the response before it's sent to the client.

   Example Response:

   ```php
   return view('home');
   # for response to client side
   return response()->json(['message' => 'Hello, world!'], 200);
   ```

7. **Sending to Browser:**
   - Finally, the response is sent to the client's browser, which displays the result.

#### Conclusion:

The request lifecycle in Laravel is a fundamental aspect of understanding how the framework handles incoming HTTP requests. Each stage, from the entry point to the response, is a part of the sequence that developers can leverage to build robust(বলিষ্ঠ) web applications. By customizing middleware, routes, controllers, and responses, Laravel provides a powerful foundation for building web applications. Developers can dive deeper into each stage to implement custom logic and achieve specific functionality in their Laravel applications.

### **Service Container**
---

#### Overview:
The Service Container is a powerful tool in Laravel for managing class dependencies and achieving a high degree of flexibility in your application. It follows the concept of Inversion of Control (IoC) and allows you to perform Dependency Injection easily.

#### Binding a Class:
You can register a binding in Laravel's Service Container using the `bind` method. For example, let's bind an interface `PaymentGateway` to a concrete implementation `StripePaymentGateway`:

```php
php artisan make:provider PaymentGatewayServiceProvider
use App\PaymentGateway;
use App\StripePaymentGateway;
// ...

public function register()
{
    $this->app->bind(PaymentGateway::class, StripePaymentGateway::class);
}

```

#### Resolving Dependencies:
When you need an instance of a class or interface, Laravel can automatically resolve it from the container. This is commonly used in controller constructors or method injections. For example:

```php
use App\Contracts\PaymentGateway;

class OrderController extends Controller
{
    protected $paymentGateway;

    public function __construct(PaymentGateway $custom_paymentGateway)
    {
        $this->paymentGateway = $custom_paymentGateway;
    }

    // ...
}
```

Here, Laravel will automatically inject an instance of `StripePaymentGateway` when creating an `OrderController`.

#### Singleton Binding:
You can bind a class as a singleton, which means only one instance will be created and shared across the application. This is useful for maintaining a single instance of a class throughout the application's lifecycle:

```php
app()->singleton('example', function () {
    return new ExampleService();
});
```

#### Resolving from the Container:
You can resolve a class or interface from the container using the `app()` helper function:

```php
$paymentGateway = app(PaymentGateway::class);
```

#### Real-life Example:

Suppose you are building an e-commerce application and you want to implement different payment gateways. Here's how you can use the Service Container:

1. **Binding Payment Gateways:**
   In your service provider (e.g., `AppServiceProvider`), bind different payment gateways:

   ```php
   app()->bind(PaymentGateway::class, StripePaymentGateway::class);
   app()->bind(PaymentGateway::class, PayPalPaymentGateway::class);
   ```

2. **Controller:**
   In your controller, you can inject the `PaymentGateway` interface and use it for processing payments:

   ```php
   use App\Contracts\PaymentGateway;

   class OrderController extends Controller
   {
       protected $paymentGateway;

       public function __construct(PaymentGateway $paymentGateway)
       {
           $this->paymentGateway = $paymentGateway;
       }

       public function processPayment()
       {
           // Process payment using the injected PaymentGateway
           $this->paymentGateway->charge(100);
           // ...
       }
   }
   ```

3. **Blade View:**
   In your Blade view, you can use the resolved instance to display the payment option:

```html
$paymentGateway = app(PaymentGateway::class);
   <p>Payment Method: {{ $paymentGateway->getName() }}</p>
```


### **SERVICE CONTAINER : REAL-LIFE EXAMPLES**
---
**Definition**:
The service container in Laravel is a powerful tool for managing and organizing objects, services, and dependencies within your application. It acts as a central registry for all the tools your application needs, making it easy to access and use them throughout your code.

**Code Example**:

Let's say you have a web application, and you need different services and objects to make it work. The service container in Laravel helps you manage these services efficiently.

```php
// In a Laravel service provider, you can bind services to the container.

public function register()
{
    // Bind a mailer service to the container.
    $this->app->singleton('mailer', function ($app) {
        return new MailerService();
    });
}
```

In this code example:

    - We're using a service provider to register services in the service container.
    - Now, any part of your application can access these services by requesting them from the container.

And to send an email using the mailer service:

```php
$mailer = app('mailer'); // insead of using  app(MailService::class)
$mailer->sendEmail('recipient@example.com', 'Hello, this is an email!');
```

### **Service Provider**:
---

   - **Definition**: A service provider in Laravel is a way to register services (classes) into the service container. It defines what the container should do when an application needs an instance of a particular class.

Let's say you have a Laravel e-commerce website. You want to create a service that calculates shipping costs.

1. Create a service class, e.g., `ShippingCalculator`, which calculates shipping costs based on parameters.

```php
class ShippingCalculator
{
    public function calculateShippingCost($weight, $destination)
    {
        // Define shipping rates based on weight and destination
        $shippingRates = [
            'Local' => [
                'upTo1kg' => 5.00,
                'upTo5kg' => 8.00,
                'upTo10kg' => 12.00,
            ],
            'National' => [
                'upTo1kg' => 10.00,
                'upTo5kg' => 15.00,
                'upTo10kg' => 20.00,
            ],
            'International' => [
                'upTo1kg' => 20.00,
                'upTo5kg' => 30.00,
                'upTo10kg' => 40.00,
            ],
        ];

        // Check if the destination is valid
        if (!isset($shippingRates[$destination])) {
            throw new \InvalidArgumentException('Invalid destination');
        }

        // Determine the shipping rate based on weight
        if ($weight <= 1) {
            $rate = $shippingRates[$destination]['upTo1kg'];
        } elseif ($weight <= 5) {
            $rate = $shippingRates[$destination]['upTo5kg'];
        } elseif ($weight <= 10) {
            $rate = $shippingRates[$destination]['upTo10kg'];
        } else {
            // Handle weights over 10kg if needed
            throw new \InvalidArgumentException('Weight exceeds the supported range');
        }

        return $rate;
    }
}

```

2. Create a service provider, e.g., `ShippingServiceProvider`, and register the `ShippingCalculator` class in it.
php artisan make:provider ShippingServiceProvider
```php
use Illuminate\Support\ServiceProvider;

class ShippingServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('shipping', function ($app) {  
             return new ShippingCalculator();
        });
    }
}
// use  like this $test = app('shipping');  $test->calculateShippingCost($weight, $destination)
```

3. Now, in your controller or wherever you need to calculate shipping costs, you can use the service container to get an instance of the `ShippingCalculator` class.

```php
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ShippingCalculator; // Import the ShippingCalculator class

class ShippingController extends Controller
{
    public function calculateShipping(Request $request)
    {
        // Get weight and destination from the form or request
        $weight = $request->input('weight');
        $destination = $request->input('destination');

        // Validate input (you can add more validation if needed)
        $this->validate($request, [
            'weight' => 'required|numeric|min:0.1', // Adjust validation rules as needed
            'destination' => 'required|in:Local,National,International',
        ]);

        // Create an instance of the ShippingCalculator
        $shippingCalculator = new ShippingCalculator();

        // Calculate shipping cost
        $shippingCost = $shippingCalculator->calculateShippingCost($weight, $destination);

        // Pass the calculated cost to a Blade view
        return view('shipping.calculate', ['shippingCost' => $shippingCost]);
    }
}
```

4. Using in blade file
```php
    <h1>Shipping Calculator</h1>

    <form method="POST" action="{{ route('shipping.calculate') }}">
        @csrf
        <label for="weight">Weight (kg):</label>
        <input type="number" name="weight" id="weight" step="0.1" required>
        <br>

        <label for="destination">Destination:</label>
        <select name="destination" id="destination" required>
            <option value="Local">Local</option>
            <option value="National">National</option>
            <option value="International">International</option>
        </select>
        <br>

        <button type="submit">Calculate Shipping Cost</button>
    </form>

    @if(isset($shippingCost))
        <p>Shipping Cost: ${{ $shippingCost }}</p>
    @endif
```
**Service Container in Simple Terms**:

1. **What is a Service Container?**
   
   Think of the service container as a central place where Laravel keeps a list of all the tools (classes) it might need to use in your application.

2. **How Does It Work in the Code You Provided?**

   - In the code you provided, we have a `ShippingCalculator` class that calculates shipping costs. We created an instance of it in the controller like this:

     ```php
     $shippingCalculator = new ShippingCalculator();
     ```

     Instead of directly creating it using `new`, we could have asked the service container to give it to us. It would look like this:

     ```php
     $shippingCalculator = app(ShippingCalculator::class);
     ```

**Using the Service Container in Controller and Blade**:

1. **Controller**:

   In the controller, you can use the service container to get instances of classes or services that your application needs. You do this using the `app()` function, like this:

   ```php
   $shippingCalculator = app(ShippingCalculator::class);
   ```

2. **Blade View**:

   In Blade views, you don't directly interact with the service container. Instead, you use data passed from the controller. For example, in the Blade view, we displayed the shipping cost like this:

   ```blade.php
   @if(isset($shippingCost))
       <p>Shipping Cost: ${{ $shippingCost }}</p>
   @endif
   ```
#### **Custom Service Provider Creating**

**Step 1: Create a Class**

Suppose you want to create a class called `TaxCalculator`, which calculates taxes based on a given amount. 

```php
php artisan make:class TaxCalculator

// TaxCalculator.php
class TaxCalculator
{
    public function calculateTax($amount)
    {
        // Your tax calculation logic here
        return $amount * 0.1; // For simplicity, we'll use a fixed tax rate of 10%
    }
}
```

**Step 2: Create a Service Provider**

Now, let's create a service provider called `TaxCalculatorServiceProvider`. This service provider will register the `TaxCalculator` class in the service container.

```php
// TaxCalculatorServiceProvider.php
use Illuminate\Support\ServiceProvider;

class TaxCalculatorServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register the TaxCalculator class in the service container
        $this->app->bind('taxCalculator', function ($app) {
            return new TaxCalculator();
        });
    }
}
```

In this code, we're binding the `'taxCalculator'` identifier to an instance of the `TaxCalculator` class in the service container.

**Step 3: Register the Service Provider**

Don't forget to register the `TaxCalculatorServiceProvider` in the `config/app.php` file under the `providers` array:

```php
// config/app.php

'providers' => [
    // ...
    App\Providers\TaxCalculatorServiceProvider::class,
],
```

**Notes:** Now, you can open the newly created `TaxCalculator.php` file in the `app` directory and define your `TaxCalculator` class within it.

Here's an example of the directory structure:

```
- app
  - Http
    - Controllers
      - TaxController.php   <-- Controllers are stored here
  - Providers
    - TaxCalculatorServiceProvider.php  <-- Service Providers are stored here
  - TaxCalculator.php       <-- Your custom classes, like TaxCalculator, can be stored here
  - Services
    - YourService.php       <-- Your custom service can be stored here
```

**Step 4: Use the TaxCalculator in a Controller**

Now, let's create a controller that uses the `TaxCalculator` class via the service container.

```php
// TaxController.php
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    public function calculateTax(Request $request)
    {
        // Use the service container to get an instance of TaxCalculator
        $taxCalculator = app('taxCalculator'); // instead of new TexCalculator();
        
        // Calculate tax based on the amount
        $amount = $request->input('amount');
        $tax = $taxCalculator->calculateTax($amount);
        
        return "Tax calculated: $tax";
    }
}

```
**Step 5: Create a Route**

Finally, define a route for your controller's method in `routes/web.php`:

```php
Route::post('/calculate-tax', 'TaxController@calculateTax');
```

#### Register() and boot() methods:
---

**2. `boot()` Method:**
**In Summary of boot:**
The `boot()` method in a Laravel service provider is used to perform actions after all services have been registered. It's a good place to set up event listeners, configure services, or perform any other tasks that depend on registered services. Let's explain it with a simple code example for beginners:

```php
class ExampleServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Define how a service is created and provided in the register method.
        $this->app->bind('exampleService', function () {
            return new ExampleClass();
        });
    }

    public function boot()
    {
        // Perform actions that depend on registered services in the boot method.
        $exampleService = app('exampleService'); // Resolve the 'exampleService' from the container.

        // Register an event listener
        Event::listen('some.event', function () {
            $exampleService->doSomething();
        });
    }
}
```

Here's what's happening:

1. In the `register()` method, we defined how the `exampleService` is created and provided, just like in the previous explanation.

2. In the `boot()` method, we can do things that require the `exampleService` or other services that were registered in the `register()` method. In this example, we resolve `exampleService` from the container using `app('exampleService')`.

3. We also registered an event listener using `Event::listen()`. This event listener depends on the `exampleService`, and the `boot()` method is a suitable place to set up such listeners.


**In Summary of register:**
- **`register()`:** Used for defining how to create and provide instances of classes or services in the service container.

Here's a step-by-step explanation:

1. **Defining Services**: When you build a Laravel application, you often have classes or components that you need to use throughout your code. These could be database connections, third-party services, or custom classes you've created.

2. **Binding Services**: To make these services available throughout your application, you "bind" them to the service container. You do this by using the `register()` method, which specifies how the service should be created.

   For example, you might register a database connection like this:

   ```php
   app()->register('database', function () {
       return new DatabaseConnection();
   });
   ```

   Here, you're telling the service container that when someone requests the 'database' service, it should create a new instance of the `DatabaseConnection` class.

3. **Resolution**: Now, whenever you need the 'database' service in your code, you can simply ask the service container to provide it:

   ```php
   $db = app('database');
   ```

In summary, the `register()` method is a way to define how services or classes should be created and provided by Laravel's service container. It's a key part of Laravel's dependency injection system, making it easy to manage and use various components in your application.

- **`boot()`:** Used for performing operations or tasks that rely on registered services and are executed after the application is fully booted.

### **Facades**
---
Laravel facades are like shortcuts that allow you to access different parts of the Laravel framework in a straightforward way. Instead of creating objects or writing lengthy code, you can use facades to perform common tasks quickly. They provide a more organized and user-friendly approach to working with Laravel's features.

Laravel provides a set of facades, which are static proxies to underlying classes. These facades provide a convenient and expressive way to interact with Laravel's services and features. Below, I'll list some of the most important Laravel facades along with code examples of how to use them:

**Notes :**
In Laravel Facades ,  both `Session::put('user_id', 1)` and `session()->put('user_id', 1)` are used to store a value in the session. They achieve the same result, but they use different syntax.
but some can't use like `DB::table()` , but not `db()->table()`;

Facades are found from **use Illuminate\Support\Facades\FacadeName**

1. **Route Facade (`Route`):**
   - The `Route` facade allows you to define routes and generate URLs.
   - Example: Defining a named route and generating a URL.
   
     ```php
     Route::get('/profile', 'UserController@profile')->name('profile');
     
     // Generating URL
     $url = route('profile'); 
     ```

2. **View Facade (`View`):**
   - The `View` facade is used to render Blade templates.
   - Example: Rendering a view with data.

     ```php
     return View::make('welcome', ['name' => 'John']);
     return view('products.all_products',['products'=>$products]);
     ```

3. **DB Facade (`DB`):**
   - The `DB` facade provides access to the database using Eloquent or the query builder.
   - Example: Querying the database with the query builder.

     ```php
     $users = DB::table('users')->where('status', 'active')->get();
     ```

4. **Session Facade (`Session`):**
   - The `Session` facade allows you to work with the session data.
   - Example: Storing and retrieving data from the session.

     ```php
     // Storing data in the session
     Session::put('user_id', 1); // $_SESSION['user_id'] = 1;
     session()->put('user_id',auth()->id()); // alternative way Auth::id()
     
     // Retrieving data from the session
     $userId = Session::get('user_id');
     ```

5. **Request Facade (`Request`):**
   - The `Request` facade provides access to the current HTTP request.
   - Example: Getting request parameters and headers.

     ```php
     $input = Request::input('username'); // request()->input('');
     $header = Request::header('User-Agent');
     ```

6. **Config Facade (`Config`):**
   - The `Config` facade allows you to access configuration values from `config` files.
   - Example: Getting a configuration value.

     ```php
     $timezone = Config::get('app.timezone');
     ```

7. **Log Facade (`Log`):**
   - The `Log` facade allows you to log messages.
   - Example: Logging a message with different log levels.

     ```php
     Log::info('This is an info message.');
     Log::error('An error occurred: ' . $exception->getMessage());
     ```

8. **Auth Facade (`Auth`):**
   - The `Auth` facade provides authentication and authorization features.
   - Example: Checking if a user is authenticated.

     ```php
     if (Auth::check()) {  // auth()->user()->id; Auth::user()->id;
         // User is authenticated
     }
     ```

9. **Mail Facade (`Mail`):**
   - The `Mail` facade is used to send emails.
   - Example: Sending an email.

     ```php
     Mail::to('example@example.com')->send(new MyMailClass($data));
     ```

10. **Cache Facade (`Cache`):**
    - The `Cache` facade allows you to work with Laravel's caching system.
    - Example: Caching data.

      ```php
      // Store data in cache for 60 minutes
      Cache::put('key', 'value', 60);
      
      // Retrieve data from cache
      $data = Cache::get('key');
      ```

Certainly! Here are more important Laravel facades, extending the list beyond the initial 10 facades:

11. **Redirect Facade (`Redirect`):**
    - The `Redirect` facade simplifies the process of creating HTTP redirects.
    - Example: Redirecting to a specific URL or route.

      ```php
      return Redirect::to('new-page'); // redirect()->to()
      ```

12. **File Facade (`File`):**
    - The `File` facade provides methods for working with files and directories.
    - Example: Checking if a file exists and reading its contents.

      ```php
      if (File::exists('path/to/file.txt')) {
          $content = File::get('path/to/file.txt');
      }
      ```

13. **Hash Facade (`Hash`):**
    - The `Hash` facade is used for hashing and verifying passwords.
    - Example: Hashing a password and checking it against a stored hash.

      ```php
      $hashedPassword = Hash::make('password123');
      if (Hash::check('password123', $hashedPassword)) {
          // Password is correct
      }
      ```

14. **Notification Facade (`Notification`):**
    - The `Notification` facade allows you to send notifications via various channels (email, SMS, etc.).
    - Example: Sending a notification to a user.

      ```php
      Notification::send($user, new InvoicePaid($invoice));
      ```


23. **Cookie Facade (`Cookie`):**
   - The `Cookie` facade allows you to work with HTTP cookies.
   - Example: Setting and getting cookies.

     ```php
     Cookie::queue('name', 'John', 60); // Set a cookie
     $value = Cookie::get('name'); // Get a cookie
     ```

24. **Artisan Facade (`Artisan`):**
   - The `Artisan` facade provides access to the Artisan command-line tool from within your application.
   - Example: Running an Artisan command programmatically.

     ```php
     Artisan::call('migrate');
     ```


27. **Schema Facade (`Schema`):**
   - The `Schema` facade provides methods for working with database schemas and tables.
   - Example: Creating a new table using migrations.

     ```php
     Schema::create('users', function ($table) {
         $table->id();
         $table->string('name');
         $table->timestamps();
     });
     ```

28. **URL Facade (`URL`):**
   - The `URL` facade helps generate URLs for various parts of your application.
   - Example: Generating URLs for routes.

     ```php
     $url = URL::to('profile'); // url('products', $produf->id)
     ```

29. **Validator Facade (`Validator`):**
   - The `Validator` facade allows you to validate data easily.
   - Example: Validating form data.

     ```php
     $validator = Validator::make($request->all(), [ 
         'email' => 'required|email',
         'password' => 'required|min:6',
     ]);
     ```

30. **Str Facade (`Str`):**
   - The `Str` facade provides string manipulation methods.
   - Example: Truncating a string.

     ```php
     $shortened = Str::limit('This is a long string', 10);
     ```
## Custom Facade
---
Creating a real-life custom facade in Laravel involves several steps, including defining the facade class, creating a service provider, binding the facade to the underlying class, and using it in a controller and Blade file. We can create **CustomLoggingFacade**,**PaymentGatewayFacade**,**ImageProcessingFacade**

**Step 1: Create the Facade Class**

First, create a custom facade class that will act as a static proxy to an underlying service or functionality. For this example, let's create a simple facade for generating QR codes.

Create the facade class in the `app/Facades` directory. If the directory doesn't exist, you can create it:

```bash
mkdir app/Facades
touch app/Facades/QrCodeFacade.php
```

Now, define the `QrCodeFacade.php` class:

```php
// app/Facades/QrCodeFacade.php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class QrCodeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'qr-code'; // This should match the binding name in the service provider QrCode === qr-code
    }
}
```

**Step 2: Create the Service Provider**

Next, create a service provider to bind the underlying functionality (in this case, a QR code generator) to the Laravel service container.

Generate a service provider using Artisan:

```bash
php artisan make:provider QrCodeServiceProvider
```

Edit the `QrCodeServiceProvider.php` file to bind the QR code generator:

```php
// app/Providers/QrCodeServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('qr-code', function () {
            return QrCode::size(200);
        });
    }

    // ...
}
```
In this example, we're using the `SimpleSoftwareIO/QrCode` package for generating QR codes. Make sure to install the package using Composer:

```bash
composer require simplesoftwareio/simple-qrcode
```

**Step 3: Register the Service Provider**

Add the `QrCodeServiceProvider` to the `providers` array in your `config/app.php` configuration file:

```php
// config/app.php

'providers' => [
    // ...
    App\Providers\QrCodeServiceProvider::class,
],
```

**Step 4: Use the Facade in a Controller**

Now, you can use your custom facade in a controller. For example, create a new controller using Artisan:

```bash
php artisan make:controller QRCodeController
```

Edit the `QRCodeController.php` file and use the facade to generate a QR code:

```php
// app/Http/Controllers/QRCodeController.php

namespace App\Http\Controllers;

use App\Facades\QrCodeFacade;
use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    public function generateQRCode(Request $request)
    {
        $qrCode = QrCodeFacade::generate($request->input('data'));

        return view('qrcode', compact('qrCode'));
    }
}

```

**Step 5: Use the Facade in a Blade View**

Create a Blade view file to display the generated QR code. For example, create a `qrcode.blade.php` file in the `resources/views` directory:

```blade
<!-- resources/views/qrcode.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>QR Code Generator</title>
</head>
<body>
    <img src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code">
</body>
</html>
```

In this Blade view, we're using the `$qrCode` variable passed from the controller to display the generated QR code image.

**Step 6: Create a Route**

Define a route in your `routes/web.php` file to access the QR code generation feature:

```php
// routes/web.php

use App\Http\Controllers\QRCodeController;

Route::get('/generate-qrcode', [QRCodeController::class, 'generateQRCode']);
```

**Step 7: Access the QR Code Generator**

Now, you can access the QR code generator by visiting the `/generate-qrcode` route in your application. It will use the custom facade to generate a QR code and display it on the `qrcode.blade.php` view.

### More Custom Facades
---

1. **CustomLoggingFacade:** Create a custom facade for enhanced logging, allowing you to log specific types of messages or perform additional actions when logging.

2. **NotificationFacade:** Implement a custom facade to handle notifications, making it easier to send messages, alerts, and emails to users.

3. **GeolocationFacade:** Create a facade for geolocation services, enabling you to retrieve and manage location-related data easily.

4. **PaymentGatewayFacade:** Develop a custom facade for payment gateway integration, simplifying payment processing in your application.

5. **ImageProcessingFacade:** Implement a facade to handle image processing tasks, such as resizing, cropping, or watermarking images.

6. **SecurityFacade:** Create a security facade to encapsulate various security-related tasks, like authentication, authorization, and encryption.

7. **CacheManagementFacade:** Build a custom facade to manage caching, allowing you to cache and retrieve data efficiently.

8. **JobQueueFacade:** Develop a facade to manage background jobs and task queues, making it easy to dispatch and handle asynchronous tasks.

9. **FileStorageFacade:** Implement a facade for interacting with file storage services, such as cloud storage or local file systems.

10. **NotificationDispatcherFacade:** Create a facade to manage and dispatch notifications across multiple channels, such as email, SMS, and push notifications.

11. **SocialMediaIntegrationFacade:** Develop a facade for integrating with social media platforms, simplifying actions like posting to social media or fetching user data.

12. **SearchEngineIntegrationFacade:** Implement a facade for integrating with search engines like Elasticsearch or Algolia, enabling efficient search functionality in your application.

13. **EmailServiceFacade:** Build a custom email service facade for sending and managing emails with various providers or services.

14. **AnalyticsFacade:** Create a facade to handle analytics and tracking, allowing you to collect and analyze user data.

15. **DatabaseFacade:** Develop a custom database facade for interacting with databases efficiently, including custom query builders or data migration utilities.

16. **LocalizationFacade:** Implement a localization facade to manage translations and language-related tasks in multilingual applications.

17. **APIIntegrationFacade:** Build a facade for integrating with external APIs, making it easier to send requests, handle responses, and manage API keys.

18. **PDFGenerationFacade:** Create a facade for generating PDF documents from HTML templates or data, simplifying PDF generation tasks.

19. **WorkflowAutomationFacade:** Implement a facade for workflow automation, allowing you to define and manage complex business processes.

20. **CustomValidationFacade:** Develop a custom validation facade for handling specific validation rules or complex validation scenarios.


## **BASIC CONCEPTS OF LARAVEL** 

### **ROUTE**
---
 the HTTP Request by which any page is displayed or loaded based on appropriate controller is called routes.

**Route Definition:**
A route in Laravel is like a map that tells the application how to respond to different HTTP requests. It defines the URL (Uniform Resource Locator) and associates it with a specific controller or action to determine what should be displayed or loaded when that URL is accessed.

**Named Route:**
Named routes are like giving a nickname to a route. You can create a named route by chaining the `name()` method when defining the route. It makes it easier to refer to the route in your code.

For example:
```php
Route::get('/students', 'StudentController@index')->name('student.all');
```

Now, you can refer to this route as 'student.all' in your code.

**Route Parameters:**
Route parameters allow you to capture and use values from the URL within your application. There are two types:

1. **Required Parameter:** A required parameter must have a value in the URL's request. It's essential for the route to work correctly. For example, in a route like `/students/{id}`, `{id}` is a required parameter, and you need to provide a value for it in the URL.

2. **Optional Parameter:** An optional parameter does not need to have a value in the URL. You can use it if needed, but it's not mandatory for the route to function. To make a parameter optional, you can specify a default value for it in your route definition.

For example:
```php
Route::get('/students/{id?}', 'StudentController@show')->where('id', '[0-9]+')->default('id', 1);
```

#### 1. **Basic Route Definition:**
   - The most common way to define a route is using the `Route::get()` method, which maps an HTTP GET request to a callback or controller method.
   - Example: Defining a basic route and returning a view in a controller method.

     ```php
     // routes/web.php
     Route::get('/home', 'HomeController@index');

     // app/Http/Controllers/HomeController.php
     public function index()
     {
         return view('home');
     }
     ```

#### 2. **Route Parameters:**
   - You can define dynamic route parameters that capture values from the URL.
   - Example: Defining a route with a parameter and passing it to a controller method.

     ```php
     // routes/web.php
     Route::get('/user/{id}', 'UserController@show');

     // app/Http/Controllers/UserController.php
     public function show($id)
     {
         // Use $id to fetch and display user details
     }
     ```

#### 3. **Named Routes:**
   - Named routes allow you to give a unique name to a route, making it easier to generate URLs and redirects.
   - Example: Defining a named route and generating a URL.

     ```php
     // routes/web.php
     Route::get('/profile', 'ProfileController@index')->name('profile');

     // Generating URL
     $url = route('profile');
     ```

#### 4. **Route Groups:**
   - Route groups allow you to apply middleware, prefixes, and namespaces to a group of routes.
   - Example: Defining a route group with middleware.

     ```php
     // routes/web.php
     Route::middleware(['auth'])->prefix('user/')->name('user.')->group(function () {

         Route::get('/dashboard', 'DashboardController@index')->name('dashboard'); 
         
         // url = user/dashboard and name = user.dashboard

         // More routes for authenticated users
     });

    Route::middleware(['auth'])->prefix('user/')->name('user.')->controller(DashboardController::class)->group(function () {

         Route::get('/dashboard', 'index')->name('dashboard'); 
         // url = user/dashboard and name = user.dashboard

         // More routes for authenticated users
     });
     ```

#### 5. **Fallback Routes:**
   - Fallback routes are used to handle undefined routes or 404 errors.
   - Example: Defining a fallback route.

     ```php
     // routes/web.php
     Route::fallback(function () {
         return view('404');
     });
     ```

#### 6. **Resourceful Routes:**
   - Resourceful routes generate multiple routes for CRUD operations on a resource (e.g., a model).
   - Example: Defining resourceful routes for a `Post` model.

     ```php
     // routes/web.php
     Route::resource('posts', 'PostController');
     ```
**Controller Files**
```php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        // Validation rules can be added here
        $data = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        Post::create($data);

        return redirect()->route('posts.index');
    }


    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

   
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

   
    public function update(Request $request, $id)
    {
        // Validation rules can be added here
        $data = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->update($data);

        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index');
    }
}

Route::resource('posts', 'PostController'); // by default prefix url is 'posts'
```
| HTTP Method | URI                 | Action/methods       | Route Name         |
|-------------|---------------------|----------------------|--------------------|
| GET         | /posts              | index                | posts.index        |
| GET         | /posts/create       | create               | posts.create       |
| POST        | /posts              | store                | posts.store        |
| GET         | /posts/{post}       | show                 | posts.show         |
| GET         | /posts/{post}/edit  | edit                 | posts.edit         |
| PUT/PATCH   | /posts/{post}       | update               | posts.update       |
| DELETE      | /posts/{post}       | destroy              | posts.destroy      |


**Notes:** To Show the route List
```php
php artisan route:list
```

#### 7. **API Routes:**
   - API routes are typically used for building API endpoints and can be defined separately in `routes/api.php`.
   - Example: Defining an API route.

```bash
     // routes/api.php
     Route::get('/user/{id}', 'UserController@show'); 
```

in Client Side/savascript

```javascript

     import axios from 'axios';

const apiUrl = 'http://localhost:8000'; // Replace with your Laravel server URL

// Make an API request

http://localhost:8000/api/user/id

axios.get(`${apiUrl}/api/user/12`)
    .then(response => {
        // Handle the API response here
    })
    .catch(error => {
        // Handle any errors
    });
```

#### 8. **Route Prefixes:**
   - You can add a prefix to a group of routes to group them under a common URL segment.
   - Example: Defining route prefixes.

     ```php
     // routes/web.php
     Route::prefix('admin')->group(function () {
         Route::get('/dashboard', 'AdminController@index'); // 'http://localhost:8000/admin/dashboard
         // More admin routes
     });
     ```

     Certainly! Let's explore some advanced level routing concepts and techniques in Laravel:

#### 9. **Route Model Binding:**
   - Laravel provides a feature called "Route Model Binding" that allows you to automatically inject model instances into your routes.
   - Example: Using route model binding to fetch a `Post` model by its `id` and display it.

     ```php
     // routes/web.php
     Route::get('/post/{post}', 'PostController@show');

     // app/Http/Controllers/PostController.php
     public function show(Post $post) // Post is model. Route Model binding returns just single data base on primary key.
     {
         // $post is automatically injected based on the {post} parameter
         return view('posts.show', compact('post'));
     }
     ```

#### 10. **Route Prefixes with Parameters:**
   - You can use route parameters within route prefixes to create dynamic URL segments.
   - Example: Creating dynamic route prefixes based on user roles.

     ```php
     // routes/web.php
     Route::prefix('{role}/dashboard')->group(function () {
         Route::get('/', 'DashboardController@index');
     });
     ```

     In this example, `{role}` is a route parameter that can be used to create role-based dashboard URLs like `/admin/dashboard` and `/user/dashboard`.

#### 11. **Route Constraints:**
   - You can define constraints on route parameters to control the values they can accept.
   - Example: Using a route constraint to restrict a parameter to numeric values.

     ```php
     // routes/web.php
     Route::get('/user/{id}', 'UserController@show')->where('id', '[0-9]+');

     // Only matches URLs like /user/1, /user/2, etc.
     ```

#### 12. **Route Model Binding with Custom Columns:**
   - You can bind route parameters to model instances based on custom columns other than the primary key (`id`).
   - Example: Using route model binding with a custom column, such as `slug`.

     ```php
     // routes/web.php
     Route::get('/post/{post:slug}', 'PostController@show');

     // Binds the {post} parameter to a Post model where 'slug' matches.
     ```

#### 13. **Nested Resource Routes:**
   - When dealing with relationships between models, you can use nested resource routes to represent those relationships.
   - Example: Defining nested resource routes for `Post` and `Comment` models.

     ```php
     // routes/web.php
     Route::resource('posts.comments', 'CommentController');

     // Generates routes for creating, updating, and deleting comments related to posts.
     ```

#### 15. **Optional Parameters:**
   - You can make route parameters optional by providing default values.
   - Example: Using optional parameters to handle different search scenarios.

     ```php
     // routes/web.php
     Route::get('/search/{keyword?}', 'SearchController@index')->where('keyword', '.*');

     // The {keyword} parameter is optional, and the regular expression .* allows for any characters.
     ```
Certainly! Here are some more advanced routing concepts and techniques in Laravel:

#### 8. **Route Model Binding with Multiple Parameters:**
   - You can use multiple route parameters for route model binding when needed.
   - Example: Binding a `Post` model by both `id` and `slug` parameters.

     ```php
     // routes/web.php
     Route::get('/post/{id}/{slug}', 'PostController@show')->where('id', '[0-9]+');

     // app/Http/Controllers/PostController.php
     public function show($id, $slug)
     {
         $post = Post::where('id', $id)->where('slug', $slug)->firstOrFail();
         return view('posts.show', compact('post'));
     }
     ```

#### 11. **Nested Middleware Groups:**
    - You can nest middleware groups within other groups to create complex middleware arrangements.
    - Example: Nesting middleware groups for more granular control.

      ```php
      // app/Http/Kernel.php
      protected $middlewareGroups = [
          'web' => [
              // ...
          ],
          'admin' => [
              'auth',  // it is a middleware that is
              'admin.check',
          ],
      ];

      // routes/web.php
      Route::middleware(['web', 'admin'])->group(function () {
          Route::get('/admin/dashboard', 'AdminController@index');
          // More admin routes
      });
      ```

#### 12. **Route Caching:**
    - Laravel provides route caching to speed up route registration in production.
    - Example: Generate a cached routes file for better performance.

      ```bash
      php artisan route:cache
      ```

      This can significantly improve the performance of your application by reducing the time needed to register routes.

#### 14. **Route Resource Naming:**
   - You can customize the resource naming conventions when defining resource routes.
   - Example: Customizing the resource route names for a `Product` resource.

     ```php
     // routes/web.php
     Route::resource('products', 'ProductController')->names([
         'create' => 'products.build',
         'store' => 'products.save',
     ]);
     ```

#### 15. **Route Model Binding with Explicit Binding:**
   - You can use explicit binding to manually specify how a model should be bound to a route.
   - Example: Manually binding a `Category` model by its `slug` attribute.

     ```php
     // app/Providers/RouteServiceProvider.php
     public function boot()
     {
         parent::boot();

         Route::bind('category', function ($value) {
             return Category::where('slug', $value)->firstOrFail();
         });
     }

     // routes/web.php
     Route::get('/category/{category}', 'CategoryController@show');
     ```

#### 16. **API Resource Routes:**
   - When building RESTful APIs, you can define resource routes exclusively for APIs.
   - Example: Defining API resource routes for a `Product` resource.

     ```php
     // routes/api.php
     Route::apiResource('products', 'ProductApiController');
     ```

```plaintext
+-----------+-----------------------+-----------------------+-------------------+---------------------+--------------+
| Method    | URI                   | Name                  | Action            | Controller          |
+-----------+-----------------------+-----------------------+-------------------+---------------------+--------------+
| GET|HEAD  | api/products          | products.index       | index             | ProductApiController | index        |
| POST      | api/products          | products.store       | store             | ProductApiController | store        |
| GET|HEAD  | api/products/{product} | products.show        | show              | ProductApiController | show         |
| PUT|PATCH | api/products/{product} | products.update      | update            | ProductApiController | update       |
| DELETE    | api/products/{product} | products.destroy     | destroy           | ProductApiController | destroy      |
+-----------+-----------------------+-----------------------+-------------------+---------------------+--------------+
```

#### 19. **Subdomain Routing:**
   - Laravel supports subdomain routing, enabling you to define routes based on subdomains.
   - Example: Defining routes for a subdomain-based feature.

     ```php
     // routes/web.php
     Route::domain('admin.example.com')->group(function () {
         Route::get('/dashboard', 'AdminDashboardController@index');
     });
     ```

#### 20. **Route Model Binding with Optional Parameters:**
   - You can use optional route parameters combined with model binding for more flexible routing.
   - Example: Binding a `Product` model by both `id` and `optional` attribute.

     ```php
     // routes/web.php
     Route::get('/product/{product}/{optional?}', 'ProductController@show');
     ```
    
    #### 21. **Route Middleware with Parameters:**
   - You can pass parameters to route middleware, allowing for more dynamic middleware behavior.
   - Example: Using middleware with parameters to check user roles.

     ```php
     // app/Http/Middleware/CheckRole.php
     public function handle($request, Closure $next, $role)
     {
         if ($request->user()->role !== $role) {
             abort(403, 'Unauthorized');
         }

         return $next($request);
     }

     // routes/web.php
     Route::middleware('role:admin')->group(function () {
         Route::get('/admin/dashboard', 'AdminController@index');
     });
     ```

#### **Route controller, Prefix, name Prefix and Middleware together**
---
To assign controller, Prefix, name Prefix and Middleware to all routes within a group.We can assigned the methods by chaning operator(->) after the first static method(added with ::). you may use the middleware method before defining the group. Middleware are executed in the order they are listed in the array.['auth','admin'].

```bash
/* Poly Morphic Relation Route */ // If middleware is found
Route::middleware('auth')->prefix('polymorphic/')->name('polymorphic.')->controller(PolyMorphicController::class)->group(function(){
    Route::get('one-to-one','OneToOnePolyMorphic')->name('OneToOne'); 
     // This url is polymorphic/one-to-one and  name route is polymorphic.OneToOne
});
```

 Custom Error with Code
 ---
```bash
Route::get('/show-view', function(){
abort_if(!isset($address),404);
return view('student.data',['my_data'=>$address]);
});
```
Remember, if you add any new routes you will need to generate a fresh route cache. Because of this, you should only run the route:cache command during your project's deployment.

You may use the route:clear command to clear the route cache:

```bash
php artisan route:clear
```

## **Middleware**
---

Middleware acts as a bridge between a request and a response. It is a type of filtering mechanism.

Laravel includes a middleware that verifies whether the user of the application is authenticated or not. If the user is authenticated, it redirects to the home page otherwise, if not, it redirects to the login page.

#### Middleware & Responses
---
Of course, a middleware can perform tasks before or after passing the request deeper into the application. For example, the following middleware would perform some task before the request is handled by the application:
```bash
class BeforeMiddleware
{
    public function handle($request, Closure $next)
    {
      # Perform action
 
        return $next($request);
    }
}
```
Here are some key aspects of middleware in Laravel:

### **CREATE MIDDLEWARE**
---
#### 1. **Middleware Creation:**
   - You can create custom middleware using Artisan commands or manually in the `app/Http/Middleware` directory.
   - Example: Creating a custom middleware that checks if a user is an admin.

     ```bash
     php artisan make:middleware CheckAdmin
     ```

   - After generating the middleware, you can define its logic in the `handle` method.

     ```php
     // app/Http/Middleware/CheckAdmin.php
     public function handle($request, Closure $next)
     {
         if (auth()->check() && auth()->user()->isAdmin()) {
             return $next($request);
         }

         return redirect('/home');
     }
     ```

#### 2. **Middleware Registration:**
   - You must register custom middleware in the `app/Http/Kernel.php` file within the `$middleware` or `$routeMiddleware` property.
   - Example: Registering the custom `CheckAdmin` middleware.

     ```php
     // app/Http/Kernel.php
     protected $routeMiddleware = [
         'admin' => \App\Http\Middleware\CheckAdmin::class,
         'role' => \App\Http\Middleware\CheckRole::class,
         // ...
     ];
     ```

#### 3. **Global Middleware:**
   - Global middleware is executed for every HTTP request in your application.
   - Example: Using global middleware for HTTP logging.

     ```php
     // app/Http/Kernel.php
     protected $middleware = [
         \App\Http\Middleware\HttpLogger::class,
         // ...
     ];
     ```

#### 4. **Route Middleware:**
   - Route-specific middleware is applied to specific routes or route groups.
   - Example: Applying the `auth` middleware to a route.

     ```php
     // routes/web.php
     Route::get('/dashboard', 'DashboardController@index')->middleware('auth');
     ```

#### 5. **Middleware Groups:**
   - You can group middleware for easy application to multiple routes.
   - Example: Creating a middleware group for authentication.

     ```php
     // app/Http/Kernel.php
     protected $middlewareGroups = [
         'web' => [
             \App\Http\Middleware\EncryptCookies::class,
             \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
             \Illuminate\Session\Middleware\StartSession::class,
             // ...
         ],
         'api' => [
             'throttle:60,1',
             'auth:api',
         ],
     ];
     ```

#### 6. **Middleware Parameters:**
   - Middleware can accept parameters, allowing for dynamic behavior.
   - Example: Passing a role parameter to a custom `CheckRole` middleware.

     ```php
     // app/Http/Middleware/CheckRole.php
     public function handle($request, Closure $next, $role, $permission)
     {
         if (auth()->check() && auth()->user()->hasRole($role)) {
             return $next($request);
         }

         abort(403, 'Unauthorized');
     }
     ```

   - Usage in a route definition:

     ```php
     // routes/web.php
     Route::get('/admin', 'AdminController@index')->middleware('role:admin'); // role:admin,edit-post
     ```

#### 7. **Middleware Execution Order:**
   - Middleware is executed in the order it is listed in the `$middleware` and `$middlewareGroups` properties.
   - Example: Controlling the execution order of middleware.

     ```php
     // app/Http/Kernel.php
     protected $middleware = [
         \App\Http\Middleware\FirstMiddleware::class,
         \App\Http\Middleware\SecondMiddleware::class,
         // ...
     ];
     ```

#### 8. **Terminable Middleware:**
   - Some middleware may have a `terminate` method, allowing you to perform actions after the response is sent to the browser.
   - Example: Logging requests after they are handled.

     ```php
     // app/Http/Middleware/LogRequest.php
     public function terminate($request, $response)
     {
         // Log the request details to a log file or database
     }
     ```
     Certainly! Let's create a SubscriptionMiddleware as an example. This middleware will check if a user has an active subscription to access certain routes. Here are the steps:

### **CSRF Protection in Laravel:**
---
**CSRF (Cross-Site Request Forgery)** in Laravel is a security feature that helps protect your web application from malicious actions. It ensures that requests made to your application come from a legitimate source. Laravel generates unique tokens for each user session, and these tokens are added to forms. When a form is submitted, Laravel checks if the token matches the one generated for that session, preventing unauthorized or forged requests. This helps keep your application secure from cross-site request forgery attacks.

**Summery to Clarify**
1. **CSRF (Cross-Site Request Forgery)**:
   - CSRF is like a scam where one website tricks your browser into doing things on another website, even though you didn't want to.

2. **CSRF Token**:
   - A CSRF token is like a special secret handshake between your browser and a website. It ensures the website knows it's you and not some trickster.

3. **CSRF Protection**:
   - CSRF protection is when websites use these secret handshakes to make sure your browser only does what you really want it to, and not what tricksters tell it to do.

Here are the key aspects of CSRF protection in Laravel:
#### 1. **CSRF Tokens:**
   - Laravel generates unique CSRF tokens for each user session.
   - These tokens are included in forms as hidden fields or can be added to AJAX requests.
   - Tokens are used to verify that the incoming request was made from your application and not from a malicious source.

#### 2. **Middleware:**
   - The `VerifyCsrfToken` middleware is included by default in Laravel's middleware stack.
   - This middleware checks the CSRF token on every incoming POST, PUT, or DELETE request.

#### 3. **CSRF Token Blade Directive:**
   - You can use the `@csrf` Blade directive to generate a hidden input field containing the CSRF token.
   - Include this directive in your forms to ensure CSRF protection.

   ```php
     @csrf 
      # or
    <input type="hidden" name="csrf" value="crsf_token()"/> 
   ```

#### 4. **AJAX Requests:**
   - When making AJAX requests, you should include the CSRF token in the request headers or data.
   - Laravel provides a JavaScript variable, `csrf_token`, which you can use to fetch the token.

**Crsf View in Image How it Woks**
![alt text](https://i.ibb.co/34ccjhP/Anti-Cross-Site-Request-Forgery-Diagram.png)
![alt text](https://i.ibb.co/xCrhCWm/cross-site-request-forgery-example.png)

### Example Usage in Blade Views:

Let's go through a real-life example of adding CSRF protection to a form in a Blade view:

```html
    <form method="POST" action="/contact">
        @csrf <!-- Add the CSRF token -->
        <input type="text" id="name" name="name" required><br>
        <input type="email" id="email" name="email" required><br>
        <button type="submit">Submit</button>
    </form>
```

In this example:

- We include the `@csrf` Blade directive inside the `<form>` tag to generate a hidden input field containing the CSRF token.
- When the form is submitted, Laravel's `VerifyCsrfToken` middleware will check if the token in the request matches the one generated for the user's session.

### AJAX Request Example:

Here's how you can include the CSRF token in an AJAX request using JavaScript and jQuery:

```javascript
<script>
    // Fetch the CSRF token from the meta tag
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    // Or
    const csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Make an AJAX POST request
    $.ajax({
        url: '/api/some-endpoint',
        type: 'POST',
        data: {
            _token: csrfToken, // Include the CSRF token
            // Other request data
        },
        success: function (response) {
            // Handle the response
        },
        error: function (xhr, status, error) {
            // Handle errors
        }
    });
</script>
```

In this AJAX request example:

- We fetch the CSRF token from a meta tag using JavaScript.
- The `_token` parameter is included in the request data with the CSRF token.

This ensures that the AJAX request is protected against CSRF attacks.

### **Using CSRF & XSRF**
---
Certainly, let's dive deeper into CSRF (Cross-Site Request Forgery) and XSRF (Cross-Site Request Forgery) protection in Laravel, including more advanced aspects and use cases.

#### **1. CSRF Token Validation in AJAX Requests:**
   - When making AJAX requests, you can include the CSRF token in the headers instead of form fields.
   - Example using Axios in a Vue.js component:

     ```javascript
     // Include CSRF token in Axios headers
     axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

     // Make an AJAX POST request
     axios.post('/api/some-endpoint', {
         // Request data
     })
     .then(response => {
         // Handle the response
     })
     .catch(error => {
         // Handle errors
     });
     ```
   - By including the token in the headers, you ensure that AJAX requests are properly validated.

#### **2. Excluding Routes from CSRF Protection:**
   - In some cases, you may need to exclude specific routes from CSRF protection, such as API routes used by external services.
   - Example: Excluding an API route from CSRF protection by adding it to the `except` array in `VerifyCsrfToken` middleware.

     ```php
     // app/Http/Middleware/VerifyCsrfToken.php

     protected $except = [
         '/api/webhook',
     ];
     ```

   - Be cautious when excluding routes, and only do so when it's necessary and safe.

#### **3. CSRF Protection in Blade Components:**
   - Laravel Blade components can also make use of the `@csrf` directive when they include forms.
   - Example using a Blade component:

     ```html
     <!-- resources/views/components/contact-form.blade.php -->
     <form method="POST" action="{{ route('contact.submit') }}">
         @csrf <!-- Add the CSRF token -->
         <!-- Form fields -->
     </form>
     ```

#### **4. Customizing the CSRF Token Field Name:**
   - By default, Laravel expects the CSRF token to be named `_token`. You can customize this field name.
   - Example: Customizing the CSRF field name to `csrf_token` in a form.

     ```html
     <form method="POST" action="/some-route">
         @csrf_field('csrf_token') <!-- Customize the field name -->
         <!-- Form fields -->
          // Or
          <input type="hidden" name="csrf" value="crsf_token()"/>
     </form>
     ```

#### **5. Cross-Origin Request Forgery (XSRF) Tokens:**
   - Laravel allows you to use XSRF tokens for enhanced security in SPA (Single Page Applications) and API requests.
   - Example: Using XSRF tokens in a Vue.js SPA:

     ```javascript
     // Include XSRF token in Axios headers
     axios.defaults.headers.common['X-XSRF-TOKEN'] = Cookies.get('XSRF-TOKEN');

     // Make an AJAX POST request
     axios.post('/api/some-endpoint', {
         // Request data
     })
     .then(response => {
         // Handle the response
     })
     .catch(error => {
         // Handle errors
     });
     ```
   - XSRF tokens offer additional security for applications that separate the front-end and back-end.

#### **6. CSRF Token Verification in Custom Controllers:**
   - If you have custom controllers that handle form submissions, you can verify the CSRF token using the `csrf` middleware.
   - Example: Verifying the CSRF token in a custom controller method.

     ```php
     // app/Http/Controllers/CustomController.php

     public function store(Request $request)
     {
         $this->middleware('csrf');

         // Handle form submission
     }
     ```
   - This way, you can add CSRF protection to non-route-closure-based controllers.

### **Controllers in Laravel:**
---
Controllers in Laravel are PHP classes responsible for handling incoming HTTP requests and returning appropriate responses. They act as intermediaries between the routes and the application's logic, making it easier to separate concerns and maintain a clean codebase.

Here are the key aspects of controllers in Laravel:

#### **1. Creating Controllers:**
   - You can create controllers using Artisan commands. For example, to create a controller named `UserController`, run:

     ```bash
     php artisan make:controller UserController
     ```

   - This command generates a new controller file in the `app/Http/Controllers` directory.

#### **2. Controller Methods:**
   - Controllers contain methods that correspond to different actions or routes. For instance, a `UserController` might have methods like `index`, `show`, `store`, `update`, and `destroy` to handle various CRUD (Create, Read, Update, Delete) operations.

#### **3. Request Handling:**
   - Controllers receive incoming requests as method arguments, typically using type-hinted Request objects.
   - Example method in a controller:
     ```php
     public function store(Request $request)
     {
         // Handle the incoming request
         $data = $request->all();
         // Process and store data
     }
     ```
#### **4. Returning Responses:**
   - Controllers return responses to the client, which can be HTML views, JSON data, or other formats.
   - Example of returning a view in a controller method:

     ```php
     public function index()
     {
         return view('users.index');
     }
     ```

#### **5. Route Binding:**
   - Laravel provides route model binding, allowing you to automatically inject model instances into controller methods.
   - Example of route model binding in a controller:

     ```php
     public function show(User $user) // Route::get('data/show/{user}') // {user:slug}
     {
         return view('users.show', compact('user'));
     }
     ```

#### **6. Middleware:**
   - You can apply middleware to controller methods to perform tasks like authentication, authorization, and input validation.
   - Example of applying middleware to a controller:

     ```php
     public function __construct() 
     {
         $this->middleware('auth');
     }
     ```

#### **7. Dependency Injection:**
   - You can use dependency injection to inject services or other classes into your controllers, making them more testable and maintainable.
   - Example of dependency injection in a controller constructor:

     ```php
     class UserController {
        protected $userService;
     public function __construct(UserService $DependuserService) // UserService is a dependency that injects to controller.
     {
         $this->userService = $DependuserService;
     }

     public function index()
     {
         $users = $this->userService->getAllUsers();
         return view('users.index', compact('users'));
     }

     }

     ```

#### **8. Resource Controllers:**
   - Laravel provides resource controllers to quickly generate CRUD routes and methods for a resource (e.g., users, posts).
   - Example of creating a resource controller:

     ```bash
     php artisan make:controller PostController --resource
     ```

#### **9. API Controllers:**
   - Laravel offers API controllers for building RESTful APIs, which often return JSON responses.
   - Example of creating an API controller:

     ```bash
     php artisan make:controller ProductController

         public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $product = Product::create($request->all());

        return response()->json($product, 201);
    }

      # you need to define routes for your API in the `routes/api.php` file. Here's an example:

   Route::resource('products', ProductController::class);
     ```

#### **10. Controller Middleware Groups:**
   - You can group middleware at the controller level, applying it to multiple methods within the controller.
   - Example: Applying the `auth` middleware to all methods in a controller.

     ```php
     public function __construct()
     {
        $this->middleware('auth');
        $this->middleware('log')->only('index');
        $this->middleware('subscribed')->except('store');
        $this->middleware('auth')->except('publicMethod');
     }
     ```
  **Note:** - This allows you to specify middleware behavior for the entire controller while excluding specific methods.

#### **11. Resourceful Resource Controllers:**
   - Laravel provides resourceful controllers for common CRUD operations. These controllers include methods like `index`, `create`, `store`, `show`, `edit`, `update`, and `destroy`.
   - Example of using resourceful controller routes:

     ```php
     Route::resource('posts', 'PostController');
     ```

   - This single route definition generates all the necessary routes for CRUD operations on the `Post` model.

#### **12. Controller Resource Validation:**
   - You can validate request data within controller methods using validation rules.
   - Example of validating data in a controller method:

     ```php
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'title' => 'required|string|max:255',
             'content' => 'required|string',
         ]);

         // If validation fails, Laravel will automatically redirect back with errors
         // If validation passes, continue processing the request
     }
     ```

   - Laravel handles the validation process and can automatically return validation errors to the view.

#### **13. Controller Dependency Injection with Custom Classes:**
   - You can inject your own custom classes or services into controller methods.
   - Example of injecting a custom service into a controller method:

     ```php
     public function store(Request $request, MyService $service)
     {
         $result = $service->processData($request->input('data'));
         // Handle the result
     }
     ```

   - This allows you to keep your controllers lean by delegating complex logic to dedicated services.

#### **14. Invokable Controllers:**
   - Laravel supports invokable controllers, which are single-action controllers defined as classes with an `__invoke` method.
   - Example of an invokable controller:

     ```php
     class MyController
     {
         public function __invoke()
         {
             return 'This is an invokable controller action.';
         }

        public function custom_method(){} // this is not valid method.
         
     }
     ```
   - You can route to invokable controllers directly, simplifying routes for single-action endpoints.

#### **15. Controller Testing:**
   - Laravel's testing tools allow you to write tests for your controllers.
   - Example of a controller test using PHPUnit:

     ```php
     public function testIndex()
     {
         $response = $this->get('/posts');

         $response->assertStatus(200);
         $response->assertViewIs('posts.index');
     }
     ```
   - Controller testing helps ensure that your application's behavior is consistent and reliable.

#### **16. Controller Namespace:**
   - You can organize your controllers into namespaces to better structure your application.
   - Example of defining a controller within a namespace:

     ```php
     namespace App\Http\Controllers\Admin;

     class AdminController extends Controller
     {
         // Controller methods
     }
     ```

   - Namespaced controllers help keep your code organized, especially in larger applications.


#### **Controller Test/PHP Unit Testing of Laravel**
---
#### Introduction

Testing controllers in Laravel involves verifying the expected behavior of controller methods. Unit tests are written to ensure that the methods perform as intended.

#### Prerequisites

Before beginning controller testing, ensure PHPUnit is installed and set up in your Laravel application.

#### **Example Controller and Methods**

Consider a `UserController` with `show` and `store` methods:

#### UserController:

```php
class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        return view('user.show', ['user' => $user]);
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return redirect()->route('user.show', ['id' => $user->id]);
    }
}
```

#### **Writing Controller Tests**

#### 1. Create a Test Class

Use the Artisan command to generate a test class for the `UserController`:

```bash
php artisan make:test UserControllerTest
```

#### 2. Writing Test Methods

##### Test for `show` method:

```php
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase; // Resets the database after each test

    public function testShow()
    {
        $user = factory(User::class)->create(); // Create a user for testing

        $response = $this->get(route('user.show', ['id' => $user->id]));

        $response->assertStatus(200) // Check if the page loads successfully
            ->assertViewIs('user.show') // Ensure the correct view is loaded
            ->assertViewHas('user', $user); // Check if the user data is available in the view
    }
}
```

##### Test for `store` method:

```php
public function testStore()
{
    $userData = [
        'name' => 'Test User',
        'email' => 'test@example.com'
    ];

    $response = $this->post(route('user.store'), $userData);

    $response->assertRedirect(route('user.show', ['id' => 1])); // Adjust with the correct user ID

    $this->assertDatabaseHas('users', ['name' => 'Test User', 'email' => 'test@example.com']);
}
```

#### **Running Tests**

Execute tests using the following command:

```bash
php artisan test
```

#### **Example Output**

Upon running the tests, you should see output similar to the following:

```bash
PHPUnit x.y.z by Sebastian Bergmann and contributors.

..                                                                 2 / 2 (100%)

Time: 100 ms, Memory: 24.00 MB

OK (2 tests, 5 assertions)
```
**Output Can be displayed like this**
```bash
PHPUnit x.y.z by Sebastian Bergmann and contributors.

...FFF                                                              6 / 6 (100%)

Time: 123 ms, Memory: 24.00 MB

There were 3 failures:

1) ExampleTest::testBasicTest
Some assertion failed...

2) AnotherTest::testAnotherFeature
Another assertion failed...

3) YetAnotherTest::testSomethingElse
This assertion failed...

FAILURES!
Tests: 6, Assertions: 15, Failures: 3.
```
#### Summary

By following this approach, you can thoroughly test your Laravel controllers, ensuring the expected behavior of the methods. This documentation provides step-by-step instructions, code examples, and best practices for testing controllers in Laravel. Regular testing is crucial for maintaining the stability and functionality of your application.


### Real-Life Controller Methods:

#### 1. **Display Products with Filters:**

   - Purpose: Display a list of products with filtering options by price, review rating, color, and size.
   - Logic: Query the database to retrieve products based on user-selected filters.
   - Code Example:

     ```php
     public function filterProducts(Request $request)
     {
         $query = Product::query();

         // Filter by price range
         if ($request->has('price')) {
             $priceRange = explode('-', $request->input('price'));
             $query->whereBetween('price', $priceRange);
         }

         // Filter by review rating
         if ($request->has('rating')) {
             $rating = $request->input('rating');
             $query->where('rating', '>=', $rating);
         }

         // Filter by color
         if ($request->has('color')) {
             $color = $request->input('color');
             $query->where('color', $color);
         }

         // Filter by size
         if ($request->has('size')) {
             $size = $request->input('size');
             $query->where('size', $size);
         }

         $products = $query->get();

         return view('products.index', compact('products'));
     }
     ```

#### 2. **View Product Details with Route Model Binding:**

   - Purpose: Display detailed information about a specific product.
   - Logic: Use route model binding to fetch product details based on the product's slug or ID.
   - Code Example:

     ```php
     public function show(Product $product) // Product show/delete/update works with route model binding.
     {
         return view('products.show', compact('product'));
     }
     ```

#### 3. **store or Update Product attributes/objects in One Method:**

   - Purpose: Handle both adding and updating product information in a single method.
   - Logic: Check if the request contains a product ID; if it does, update the existing product; otherwise, create a new product.
   - Code Example:

##### *Beginner Level OF Add or Update Product Information in One Method*

```php

// Beginner Level

public function storeOrUpdate(Request $request, $id = null)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'color' => 'required|string',
        'size' => 'required|string',
    ]);

    if ($id) {
        $product = Product::findOrFail($id);
        $product->update($validatedData);
    } else {
        Product::create($validatedData);
    }

    return redirect('/products')->with('success', 'Product saved successfully');
}
```

##### *Advanced Level OF Add or Update Product Information in One Method*

```php
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

public function storeOrUpdate(Request $request, $id = null)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => [
            'required',
            'string',
            'max:255',
            Rule::unique('products')->ignore($id), // Ignore the current product if updating
        ],
        'description' => 'required|string',
        'price' => 'required|numeric',
        'color' => 'required|string',
        'size' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image upload
    ]);

    // Check if the currently authenticated user is authorized to update the product
    if (Auth::id() != $id) {
        return redirect('/products')->with('error', 'Unauthorized. You can only update your own products.');
    }

    // Retrieve the existing product or create a new one
    $product = $id ? Product::findOrFail($id) : new Product();

    // Fill the product model with the validated data
    $product->fill($validatedData);

    // Handle optional image upload
    if ($request->hasFile('image')) {
        // Delete the previous image if updating and a new image is uploaded
        if ($id && $product->image) {
            Storage::delete($product->image);
        }

        // Store the new image and update the product's image path
        $imagePath = $request->file('image')->store('product_images', 'public');
        $product->image = $imagePath;
    }

    // Save the product model to the database
    $product->save();

    return redirect('/products')->with('success', 'Product saved successfully');
}


// Try Catch Block with Commit and Rollback

    if (Auth::id() != $id) {
        return redirect('/products')->with('error', 'Unauthorized. You can only update your own products.');
    }

    try {
        // Begin a database transaction
        DB::beginTransaction();

        if ($id) {
            $product = Product::findOrFail($id);
        } else {
            $product = new Product();
        }

        // Fill the product model with validated data
        $product->fill($validatedData);

        // Handle optional image upload
        if ($request->hasFile('image')) {
            // Delete the previous image if updating and a new image is uploaded
            if ($id && $product->image) {
                Storage::delete($product->image);
            }

            $imagePath = $request->file('image')->store('product_images', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        // Commit the transaction
        DB::commit();

        return redirect('/products')->with('success', 'Product saved successfully');
    } catch (\Exception $e) {
        // If an error occurs, rollback the transaction and handle the error
        DB::rollback();
        return redirect('/products')->with('error', 'An error occurred while saving the product.');
    }
```

#### Resource Controller Images
![Alt text](https://i.ibb.co/3pWzcnB/29304922-Laravel-Resource-Controller-2x.png "Resource Controller")

**Actions Handled By Resource Controller**

![alt text](https://i.ibb.co/ZhTmDTw/resourse-contrller-http.png "Resource-controller-http-methods")


### **Request and Response**
---
Request(Dependency Injection) :
`Laravel's Illuminate\Http\Request` class provides an object-oriented way to interact with the current HTTP request being handled by your application as well as retrieve the input, cookies, and files that were submitted with the request.

### Handling Requests:
---
In Laravel, requests refer to the incoming HTTP requests made to your application. These requests can be of various types, such as GET, POST, PUT, DELETE, etc. Laravel provides a convenient way to handle and process these requests.

1. **Basic Request Handling:**
   Laravel provides a convenient way to access data from incoming HTTP requests. Here's an example of how to retrieve data from a GET request in a Laravel controller method:

   ```php
   public function index(Request $request)
   {
       $name = $request->input('name');
       return "Hello, $name!";
   }
   ```

2. **Validation of Requests:**
   You can validate incoming data using Laravel's validation rules. For instance, ensuring that an email field is present and valid:

   ```php
   $validatedData = $request->validate([
       'email' => 'required|email',
   ]);
   ```

3. **Uploading Files:**
   Handling file uploads is straightforward in Laravel. You can access and store uploaded files like this:

   ```php
   $file = $request->file('file');
   $file->store('uploads');
   ```

### **Response**
---
Response can be string, array or Object.
All routes and controllers should return a response to be sent back to the user's browser. Laravel provides several different ways to return responses. The most basic response is returning a string from a route or controller. The framework will automatically convert the string into a full HTTP response:

```bash
Route::get('/', function () {
    return 'Hello World'; // string
    return [12,34,55,65]; // array

         return response('Hello World', 200)
                  ->header('Content-Type', 'text/plain'); // object
                  or
                  $model = Product::all();
                return response(Json($model)); // this response for ajax call request

            # Redirect Route with carrying Data

                return redirect()->route('profile', [$user]);

                # Redirecting With Flashed Session Data
                 return redirect('dashboard')->with('status', 'Profile updated!');

                 # redirect with downlaod
                 return response()->download($pathToFile);
});
```

#### **Sending Responses:**

1. **Returning JSON Responses:**
   - Used when you want to return data in JSON format, often for AJAX requests or APIs.
   - Example: Returning a JSON response with user data.

   ```php
   public function getUserData($id)
   {
       $user = User::find($id);
       return response()->json(['user' => $user]);
   }
   ```

2. **Redirecting to URLs/Redirect Response:**
   - Used to redirect the user to a different URL.
   - Example: Redirecting after a successful form submission.

   ```php
   public function store(Request $request)
   {
       // Process form data
       return redirect('/thank-you');
   }
   ```

3. **View Responses/ HTML Response:**
   To return a view as a response, you can use the `view()` method:

   ```php
   return view('welcome'); // returns the response of view page which page's content is loaded from welcome.blade.php
   ```

4. **Customizing Responses:**
   You can set custom HTTP headers and status codes:

   ```php
   return response('Unauthorized', 401) // respones data is "Unauthorized" and status code is 401
       ->header('Content-Type', 'text/plain');
   ```

5. **Attachments (e.g., PDF):**
   To send a file as a response, like a PDF:

   ```php
   return response()->file($pathToFile);
   ```


### **VIEW In Laravel**
---
To create View File
```php
php artisan make:view frontend/welcome // will be created to be frontend/welcome.blade.php
```
Once you're inside the project directory, you can create a new view and folder in the frontend directory using the `mkdir` command (for creating a folder) and the `touch` command (for creating a view file). Replace `view_name` with the name of your view and `folder_name` with the name of the folder:

```bash
mkdir resources/views/frontend/folder_name
touch resources/views/frontend/folder_name/view_name.blade.php
```

#### **Sharing Data Views**
---
In Laravel, there are several ways to share data with views to pass information from the backend to the frontend. Here are some common methods:

1. **Using the `view` function:**
   The simplest way is to use the `view` function to create a view and pass data to it as an associative array.
   
   ```php
   $data = ['key' => 'value'];
   return view('viewName', $data);
   ```

2. **Using the `with` method:**
   You can use the `with` method to pass individual variables to the view.
   
   ```php
   return view('viewName')->with('variableName', $variableValue);
   ```

3. **Using the `compact` function:**
   The `compact` function allows you to pass variables to the view by specifying their names as arguments.
   
   ```php
   $variable = 'some value';
   return view('viewName', compact('variable','users'));
   ```

4. **Using the `@php` Blade directive:**
   In your Blade templates, you can use the `@php` directive to write PHP code and set variables.
   
   ```php
   @php
       $variable = 'some value';
   @endphp
   ```

5. **Using view composers:**
   View composers allow you to bind data to specific views or view templates using service providers. This is helpful when you want to share data with multiple views.
   
```php
   View::composer('viewName', function ($view) {
       $view->with('variableName', $variableValue);
   });

   View::composer(['products.index', 'categories.index'], function ($view) {
    $view->with('sharedVariable', $sharedData);
});

```

6. **Using view creators:**
   Similar to view composers, view creators let you share data with views, but they allow for more fine-grained control as they are tied to specific view classes.
   
```php
View::creator('products.index', function ($view) {
    $view->with('variableName', $variableValue);
});
   ```
**Notes**
- **Use `View::creator()`** when you need specific, targeted data sharing for individual views.
- **Use `View::composer()`** when you need to share data across multiple views or a group of views efficiently without duplicating code.

7. **Using the `@inject` Blade directive:**
   The `@inject` directive allows you to inject a service or value into your view directly from a service container.
   
   ```php
   @inject('serviceName', 'Namespace\ServiceClass')
   ```

8. **Using shared views:**
   You can create a shared view that includes data you want to share across multiple views. This can be included in other views using the `@include` directive.

    **Usage of `@include`:**

- **Basic Inclusion:**
  ```blade  
  @include('partials.header')
  ```

  This line includes the `header.blade.php` file from the `partials` directory. Whatever content is in `header.blade.php` will be rendered at this point in the view.

- **Passing Data to Included Views:**
  You can pass variables to the included view.
  ```blade
  @include('partials.header', ['title' => 'My Title'])
  ```

  This example passes a variable named `title` with a value of `'My Title'` to the included `header.blade.php` file.

- **Conditional Inclusion:**
  ```blade
  @if($condition)
      @include('partials.sidebar')
  @else
      @include('partials.default-sidebar')
  @endif
  ```

  ```blade
<!-- main.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>My Website</title>
    @include('partials.header')
</head>
<body>
    @include('partials.sidebar')
    <div class="content">
       @yield('main-content')  <!-- Main content of the page -->
    </div>
</body>
</html>
```

9. **Basic View:**
A basic view is a simple HTML template. Here's an example:

```php
<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Welcome Page</title>
</head>
<body>
    <h1>Welcome to My Laravel App</h1>
</body>
</html>
```

10. **Blade Template Inheritance:**

Blade allows you to create a master layout and extend it in child views. This promotes code reusability. Here's an example:

```php
<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
</head>
<body>
    @yield('content')
</body>
</html>
```

```php
<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <h1>Welcome to the Home Page</h1>
    // More Page Wise Content
@endsection
```
11. **Conditional Views:**

You can conditionally display content in your views using Blade directives. For example:

```php
<!-- resources/views/conditional.blade.php -->
@if($condition)
    <p>This content is displayed because the condition is true.</p>
@else
    <p>This content is displayed when the condition is false.</p>
@endif
```

12. **Looping in Views:**

Blade provides directives for looping through data. Here's an example of looping through an array:

```php
<!-- resources/views/loop.blade.php -->
<ul>
    @foreach($items as $item)
        <li>{{ $item->name }}</li>
        <li>{{ $item->email }}</li>
    @endforeach
</ul>
```

 ### **Blade Inheritance and Layout**
 ---
1. **Basic Blade Template:**
   A basic Blade template consists of standard HTML mixed with Blade directives enclosed in double curly braces `{{ }}`. Blade expressions are used to display variables, execute PHP code, and control the flow of your templates.

   ```php
   <html>
   <head>
       <title>{{ $title }}</title>
   </head>
   <body>
       <h1>Welcome, {{ $user->name }}</h1>
   </body>
   </html>
   ```

4. **Conditional Statements:**
   Blade allows you to use conditional statements like `@if`, `@else`, `@elseif`, and `@endif` to conditionally display content based on certain conditions.

   ```php
   @if($isAdmin)
       <p>Welcome, Admin!</p>
   @else
       <p>Welcome, Guest!</p>
   @endif
   ```

6. **Escaping Content:**
   Blade automatically escapes output by default to prevent XSS attacks. If you want to output unescaped content, you can use the `@html` directive.

   ```php
   <p>{!! $unescapedHtml !!}</p>
   ```
### **Advanced-Blade Template**
---
1. **Blade Layouts and Nesting:**
   You can nest layouts within layouts to create a hierarchy of templates. This is useful for building complex page structures.

   **`master.blade.php` (Master Layout):**
   ```php
   <html>
   <head>
       <title>@yield('title')</title>
   </head>
   <body>
       @yield('content')
   </body>
   </html>
   ```

   **`sublayout.blade.php` (Sub-layout):**
   ```php
   @extends('master')

   @section('title', 'Sublayout Page')

   @section('content')
       <div class="sub-content">
           @yield('sub-content')
       </div>
   @endsection
   ```

   **`child.blade.php` (Child View):**
   ```php
   @extends('sublayout')

   @section('sub-content')
       <h1>Hello from Child Page</h1>
   @endsection
   ```

2. **Blade Components and Slots:**
   Laravel introduced Blade components for creating reusable UI components. You can define a Blade component with slots to inject content.

   **`button.blade.php` (Component):**
   ```php
   <button {{ $attributes->merge(['class' => 'btn']) }}>
       {{ $slot }}
   </button>
   ```

   **Usage:**
   ```php
   <x-button class="bg-blue-500">
       Click me
   </x-button>
   ```

3. **Blade Directives for Authentication:**
   Laravel provides Blade directives for checking the authentication status of users.

   ```php
   @auth
       <!-- User is authenticated -->
   @else
       <!-- User is not authenticated -->
   @endauth
   ```

4. **Blade Includes with Data:**
   You can pass data to included views using Blade's `@include` directive.

   **`header.blade.php` (Partial View):**
   ```php
   <h1>{{ $pageTitle }}</h1>
   ```

   **Usage:**
   ```php
   @include('partials.header', ['pageTitle' => 'Welcome'])
   ```

5. **Blade Custom Directives:**
   You can create your custom Blade directives for more advanced functionality. Define these in the `AppServiceProvider`.

   ```php
   Blade::directive('myDirective', function ($expression) {
       return "<?php // Your custom code here ?>"; // @myDirective
   });
   ```

6. **Blade Comments:**
   You can add comments in Blade templates that won't be rendered in the HTML output.

   ```php
   {{-- This is a Blade comment --}}
   ```

   7. **Blade Templates for Email:**
   You can use Blade templates to create HTML and plain text email templates. These templates can be sent using Laravel's email functionality.

   **Example: Creating an Email Template**
   ```php
   @component('mail::message')
       # Hello, {{ $user->name }}
       Thank you for signing up!

       @component('mail::button', ['url' => $verificationUrl])
           Verify Email
       @endcomponent
   @endcomponent
   ```
### **ADVANCED-Custom Blade Directives:**
---
1. **Create a Service Provider:**
   First, create a custom service provider to register your Blade directive. Run the following Artisan command to generate a service provider:

   ```bash
   php artisan make:provider CustomBladeDirectiveServiceProvider
   ```

2. **Define the Directive in the Service Provider:**
   Open the `CustomBladeDirectiveServiceProvider.php` file in the `app/Providers` directory. In the `boot` method, use the `Blade` facade to define your custom directive. For example, let's create a directive to display the current date:

   ```php
   use Illuminate\Support\Facades\Blade;

   public function boot()
   {
       Blade::directive('currentDate', function () {
           return "<?php echo now()->format('Y-m-d'); ?>"; // @currentDate 
       });
   }
   ```

   In this example, we've defined a `@currentDate` directive that will output the current date in the 'Y-m-d' format when used in a Blade template.

3. **Register the Service Provider:**
   Add your custom service provider to the `providers` array in the `config/app.php` configuration file.

   ```php
   'providers' => [
       // Other service providers
       App\Providers\CustomBladeDirectiveServiceProvider::class,
   ],
   ```

4. **Use the Custom Directive in Blade Templates:**
   You can now use your custom Blade directive in your Blade templates. For instance, to display the current date, simply use `@currentDate` in your view:

   ```php
   <p>Today's Date: @currentDate</p>
   ```

5. **Compile Your Blade Templates:**
   If you've made changes to your Blade directives or service providers, run the following Artisan command to recompile your Blade templates:

   ```bash
   php artisan view:clear
   ```

6. **Test Your Custom Blade Directive:**
   Finally, load a page that uses the custom directive in your Laravel application, and you should see the output generated by your custom Blade directive.


7. **Stack**
You can use the `@push` and `@prepend` directives in a Blade template to add content to a stack. Here's how you can use them together within one section:

```php
@section('content')
    <!-- Your main content here -->
@endsection

@push('scripts')
    This will be second...
@endpush

@prepend('scripts')
    This will be first...
@endprepend
```
7. **@inject Directive:**
`@inject` directive to inject a service (`MetricsService`) into a Blade view. It then displays the result of a method call from the injected service in the view. Here's a brief explanation with code examples:

   The `@inject` directive allows you to inject an instance of a class or service into a Blade view. In your example, it injects an instance of the `MetricsService` class into the view and assigns it to a variable named `$metrics`.

   ```php
  @inject('metrics', 'App\Services\MetricsService')
 
<div>
    Monthly Revenue: {{ $metrics->monthlyRevenue() }}.
</div>

 ```
### **Asset Bundling (Vite)**
---
Asset bundling with Vite is a modern approach to managing and optimizing your frontend assets (JavaScript, CSS, and more) in Laravel applications. It improves the development workflow and boosts the performance of your web applications. Vite is a build tool that is especially popular in the Vue.js ecosystem, but it can also be used with other frontend frameworks like React or just for plain JavaScript and CSS.

Here's a step-by-step explanation of how to set up asset bundling with Vite in a Laravel application:

1. **Installation**:
   First, make sure you have a Laravel project set up. Then, you can add Vite to your project using npm or yarn:

   ```bash
   npm install -D create-vite
   ```

2. **Create a Vite Configuration**:
   Run the following command to create a Vite configuration file:

   ```bash
   npx create-vite
   ```

   This command will guide you through the setup process. Make sure to configure Vite to output assets in the Laravel public directory.

3. **Configure Laravel Mix**:
   Open your Laravel Mix configuration file (`webpack.mix.js`) and configure it to copy assets from the Vite output directory to the public directory. Here's an example configuration:

   ```javascript
   mix.copy('resources/assets/css', 'public/css')
      .copy('resources/assets/js', 'public/js');
   ```

4. **Usage in Blade Templates**:
   In your Blade templates, you can include the bundled assets like this:

   ```html
   <link rel="stylesheet" href="{{ mix('css/app.css') }}">
   <script src="{{ mix('js/app.js') }}"></script>
   ```

   Laravel Mix's `mix()` function will automatically version your assets, ensuring that browsers cache them properly.

5. **Building Assets**:
   To build your assets during development, you can run Vite in development mode with hot-reloading:

   ```bash
   npm run dev
   ```

   For production, you can build optimized assets:

   ```bash
   npm run build
   ```

Now, let's provide a real-life and professional code example using Blade templates:

Suppose you have a Blade file for your application layout (`resources/views/layouts/app.blade.php`). You want to include Vite-bundled assets in this layout. Here's how you can do it:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Laravel App</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div id="app">
        <!-- Your application content goes here -->
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
```

### Using Vite with Vue.js:

1. **Install Vue.js**:
   If you haven't already, install Vue.js in your Laravel project:

   ```bash
   npm install vue@next
   ```

2. **Create a Vue Component**:
   Create a Vue component, let's say `Example.vue`, in your resources directory. This component can be a simple example or a more complex one, depending on your needs.

   ```vue
   <template>
     <div>
       <h1>Hello Vue.js</h1>
     </div>
   </template>

   <script>
   export default {
     // Your Vue component logic goes here
   }
   </script>

   <style scoped>
   /* Your component-specific styles go here */
   </style>
   ```

3. **Include the Vue Component in Blade**:
   In your Blade file, include the Vue component using a `vue` directive:

   ```html
   <div id="app">
     <example></example>
   </div>
   ```

4. **Build Your Vite Configuration**:
   Configure Vite to handle Vue.js components. In your `vite.config.js`, you might need to use the `@vitejs/plugin-vue` plugin to handle `.vue` files:

   ```javascript
   import vue from '@vitejs/plugin-vue';

   export default {
     plugins: [vue()],
     // Other Vite configuration settings
   };
   ```

### Using Vite with React:

1. **Install React**:
   If you're using React, you'll need to install it:

   ```bash
   npm install react react-dom
   ```

2. **Create a React Component**:
   Create a React component, let's say `Example.js`, in your resources directory:

   ```jsx
   import React from 'react';

   function Example() {
     return (
       <div>
         <h1>Hello React</h1>
       </div>
     );
   }

   export default Example;
   ```

3. **Include the React Component in Blade**:
   In your Blade file, include the React component:

   ```html
   <div id="app">
     <div id="react-app"></div>
   </div>
   ```

4. **Build Your Vite Configuration**:
   Configure Vite to handle React components. Ensure you have the necessary plugins for React:

   ```javascript
   import react from '@vitejs/plugin-react';

   export default {
     plugins: [react()],
     // Other Vite configuration settings
   };
   ```

### **URL GENERATING**
---

**Definition:**
URL generation in Laravel refers to the process of generating URLs for routes defined in your Laravel application. It simplifies the task of creating links and redirects in your web application by abstracting the underlying URL structure.

**Basic URL Generation:**
In Laravel, you can use the `url()` function or the `route()` function to generate URLs. Here's a basic example using the `url()` function:

```php
<a href="{{ url('/about') }}">About Us</a>
```

This code generates a URL for the `/about` route and creates a link to the "About Us" page.

**Named Routes:**
Named routes provide a cleaner and more maintainable way to generate URLs. You define a name for your routes in the `web.php` routes file like this:

```php
Route::get('/about', 'AboutController@index')->name('about');
```

Then, in your Blade file, you can use the `route()` function with the route name:

```php
<a href="{{ route('about') }}">About Us</a>
```

**URL Parameters:**
You can also generate URLs with parameters. For example, if you have a route that accepts an ID:

```php
Route::get('/user/{id}', 'UserController@show');
```

You can generate a URL with the `route()` function like this:

```php
<a href="{{ route('user.show', ['id' => 1]) }}">User Profile</a>
```

**Generating URLs with Controllers:**
Laravel allows you to generate URLs to controller actions. If you have a controller method like this:

You can generate the URL using the `action()` function:

```php
Route::get('/user/profile', 'UserProfileController@show')->name('user.profile');

<a href="{{ action('UserController@show') }}">User Profile</a>

http://127.8000/user/profile

/* Another System */

$url = action('UserProfileController@show');
<a href="{{ $url }}">About Us</a>

http://127.8000/about

```

**Notes :** 
You can construct a URL with query string parameters by using the `route()` helper
 along with the `URL::to()` method as follows:

 ```php
 Route::get('/user/profile', 'UserProfileController@show')->name('user.profile');

 $userId = 1; // Replace this with the actual user ID
$url = URL::to(route('user.profile', ['id' => $userId]));

 http://yourappurl/user/profile?id=1

 ```

**URL Generation with Parameters:**
If your route has parameters, you can pass them as an array in the `action()` function:

```php
<a href="{{ action('UserController@show', ['id' => 1]) }}">User Profile</a>
```

**Real-life Example:**
Let's say you want to create a link to a user's profile page, and you have a named route 'user.profile'. You can do it like this in a Blade file:

```php
<a href="{{ route('user.profile', ['id' => $user->id]) }}">View Profile</a>
```

This generates a URL to the user's profile, where `$user->id` contains the user's ID.

### **SESSION**
---

**Definition:**
In web development, a session is a mechanism that allows you to store data on the server temporarily, tied to a specific user. Sessions are crucial for maintaining stateful interactions with users across multiple HTTP requests.

**Types of Sessions:**

1. **File-based Sessions:** In Laravel, by default, sessions are stored as files on the server. Laravel manages these files, and you can store session data using the `session()` helper.

2. **Database Sessions:** You can also configure Laravel to store sessions in a database. This is useful when you want to persist session data between server restarts.

3. **Cache-based Sessions:** Sessions can be stored in a cache store like Redis for faster access and better scalability.

**Using Sessions in Blade Files:**

1. **Storing Data in Sessions:**
   
   To store data in a session, you can use the `session()` helper. Here's an example of storing a user's name in a session:

   ```php
   // In a controller
   session(['user_name' => 'John']);
   ```

2. **Retrieving Data from Sessions:**

   You can retrieve session data in Blade files like this:

   ```php
   <!-- In a Blade file -->
   <p>Welcome, {{ session('user_name') }}</p>
   ```

   This code will display "Welcome, John" if 'user_name' is stored in the session.

3. **Checking for Session Data:**

   You can check if a session variable exists using Blade directives:

   ```php
   @if(session()->has('user_name'))
       <p>Welcome, {{ session('user_name') }}</p>
   @else
       <p>Welcome, Guest</p>
   @endif
   ```

4. **Removing Session Data:**

   To remove session data, use the `forget()` method or `pull()` method:

   ```php
   // Remove 'user_name' from the session
   session()->forget('user_name');

   // Retrieve and remove 'user_name' from the session
   $userName = session()->pull('user_name');
   ```

**Real-life Example:**

Imagine you want to store the user's login status in a session. When the user logs in, you set a session variable to indicate they are authenticated. In a Blade file, you can use this to display a personalized message:

```php
@if(session('is_authenticated'))
    <p>Welcome, {{ session('user_name') }}</p>
    <a href="{{ route('logout') }}">Logout</a>
@else
    <p>Welcome, Guest</p>
    <a href="{{ route('login') }}">Login</a>
@endif
```

In this example, `is_authenticated` is a session variable set when the user logs in, and `user_name` stores the user's name.

#### Retrieving Data:

You can retrieve data from sessions using the `session()` helper function or the `Request` object. Here's an example of how to retrieve data:

```php
// Using the session() helper
$value = session('key');

// Using the Request object
$value = request()->session()->get('key');

// Retrieve all session data
$data = $request->session()->all();

// Determine if an item is present and not null using has
if ($request->session()->has('users')) {
    // Do something if 'users' is present and not null
    $users = $request->session()->get('users');
    // ...
}

// Determine if an item is present, including null values, using exists
if ($request->session()->exists('users')) {
    // Do something if 'users' is present, even if its value is null
    $users = $request->session()->get('users');
    // ...
}

// Determine if an item is missing from the session using missing
if ($request->session()->missing('users')) {
    // Do something if 'users' is not present in the session
    // ...
}

```

#### Storing Data:

You can store data in sessions using the `put` method or the `session()` helper. Here's an example:

```php
// Using the put method
session()->put('key', 'value');

// Using the session() helper
session(['key' => 'value']);
```

#### Flash Data:

Flash data is a special type of session data that is available only for the next request. It's commonly used for displaying messages after a form submission. Here's how you can flash data:

```php
session()->flash('message', 'This is a flash message.');

// Redirect to another route or page
return redirect()->route('some.route');
```

In your Blade file, you can display the flashed message like this:

```php
@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

```
**Notes:**
In essence, while `session('message', 'data is saved')` sets a session value that persists across multiple requests until explicitly removed, `session()->flash('message', 'This is a flash message.')` flashes a message to be available for the next request cycle only.

#### Deleting Data:

To remove data from the session, you can use the `forget` method. Here's an example:

```php
session()->forget('key');

<!-- Your registration form HTML goes here -->
```
#### Incrementing and Decrementing Session Values:

Absolutely, you can use Laravel's `increment` and `decrement` methods to manipulate integer values stored in your session data. These methods are quite handy for implementing features like counting user interactions or limiting certain actions. Here's how you can use them:

#### Incrementing Session Values:

1. Increment by 1 (default):
```php
$request->session()->increment('count'); // Increase 'count' by 1

// Output the value after incrementing
$count = $request->session()->get('count');
echo $count; // This will output the incremented value of 'count'
```

2. Increment by a specific value (e.g., 2):

```php
$request->session()->increment('count', $incrementBy = 2); //  Increase 'count' by 2
```

#### Decrementing Session Values:

1. Decrement by 1 (default):
```php
$request->session()->decrement('count'); //  Decrementing 'count' by 1
```

2. Decrement by a specific value (e.g., 2):
```php
$request->session()->decrement('count', $decrementBy = 2); // //  Decrementing 'count' by 1
```

Here's a simple example of how you might use this in practice:

```php
public function incrementCount(Request $request)
{
    // Get the current count from the session or set it to 0 if it doesn't exist
    $count = $request->session()->get('count', 0);

    // Increment the count by 1
    $request->session()->increment('count');

    return "Count: $count";
}

public function decrementCount(Request $request)
{
    // Get the current count from the session or set it to 0 if it doesn't exist
    $count = $request->session()->get('count', 0);

    // Decrement the count by 1
    $request->session()->decrement('count');

    return "Count: $count";
}
```

### **Advanced-SESSION**
---
In Laravel, regenerating or invalidating the session ID is a useful security measure to prevent session fixation attacks. It changes the session ID, making it more challenging for malicious users to hijack a session. To do this, you can use the `invalidate()` method to regenerate the session ID. Here's how to do it:

```php
// Invalidate the current session ID and regenerate it
$request->session()->invalidate();

// Regenerate the session ID
$request->session()->regenerate();
```

You can typically use this within a controller method or route closure. Here's a breakdown of the steps:

1. `invalidate()`: This method invalidates the current session, which means that the existing session data remains, but it's associated with a new session ID. It's like locking the old session data and creating a fresh session with a new ID.

2. `regenerate()`: This method generates a new session ID for the refreshed session. It's essential to regenerate the session ID after invalidating it to ensure that the old session ID can't be reused.

```php
public function logout(Request $request)
{
       Auth::logout(); // Logs the user out

    // Invalidate and regenerate the session ID
    $request->session()->invalidate();
    $request->session()->regenerate();

    // Perform any other logout actions
    // ...

    return redirect('/login');
}

```
**regenerate()**
The method preserves the existing session data while changing the session ID. This means the user's session data, such as authenticated status, cart items, or any other stored data, remains intact, but with a new session ID.

3. The` flush()` method in Laravel's session handling allows you to clear all data stored in the session, effectively resetting it. When you call flush(), all session data, including variables and values, will be removed

```php
// Clear all data stored in the session
$request->session()->flush();
```

Typically, you might use `flush()` when you want to log a user out of your application completely or clear all temporary data stored in the session. For example, when a user logs out, you can clear their session data like this:

```php
public function logout(Request $request)
{
    // Clear all session data
    $request->session()->flush();

    // Perform any other logout actions
    // ...

    return redirect('/login');
}
```

### **VALIDATON**
---

Validation in Laravel is the process of ensuring that user input or data adheres to a set of rules and criteria defined by your application. It's crucial to validate user input to maintain data integrity and security in your application.

**Writing The Validation Logic:**

In Laravel, you can write validation logic in your controllers or dedicated form request classes. Here's an example of validating a form request in a controller method:

```php
public function store(Request $request)
{
   $validatedData = $request->validate([
    'name' => 'required|string|max:255',
    'email' => 'required|email|unique:users',
    'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // sometimes used if input value exist ,if not exit , nothing happened
    'password' => 'required|min:6',
    'description' => 'string|max:500',
    'age' => 'numeric',
    'quantity' => 'integer',
    'username' => 'unique:users',
    'category_id' => 'required|exists:categories,id',
    'sub_category_id' => 'nullable|exists:sub_categories,id',
     'status' => ['required', Rule::in(Product::getStatusOptions())], 
     /* In Product Model Method ->
      public static function getStatusOptions(){
     return ['active', 'inactive']; } */
    'featured' => 'required|boolean',
    'date' => 'required|date',
    'phone' => 'regex:/^[0-9]{10}$/', // /^ is a starting or initializing delimiter and $/ is ending delimiter,{10} minimum 10 value, {10,11} minimum 10 and maximum 11, 
    'gender' => 'in:Male,Female,Other', // In: used to indicate any type of option that is selected by user.
    'birthdate' => 'date_format:Y-m-d', // 2023-11-12
    'event_date' => 'after:2023-01-01', // 'after:' . $request->date,
    'expiry_date' => 'before:2023-12-31',
    // Or
    'event_date' => 'after:' . now()->toDateString(),
    'expiry_date' => 'before:' . now()->addDays(15)->toDateString(), // now()->addYear()->toDateString(),
    'password_confirmation' => 'required_with:password|same:password',
    # or
    'password_confirmation' => 'required|string|confirmed',

    'custom_field' => function ($attribute, $value, $fail) {
        if ($value != 'expected_value') {
            $fail($attribute.' is invalid.');
        }
    },
],
[
    'name.required' => "User name must be inserted",
    'name.string' => "Null or non string  can't be taken",
    'age.numeric' => " String User age value can not be accessible",
]
);

 $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);
 
        if ($validator->fails()) {
            return redirect('post/create')
                        ->withErrors($validator)
                        ->withInput();
        }
 
        // Retrieve the validated input...
        $validated = $validator->validated();
 
        // Retrieve a portion of the validated input...
        $validated = $validator->safe()->only(['name', 'email']);
        $validated = $validator->safe()->except(['name', 'email']);
 
        // Store the blog post...

// Alternatively, validation rules may be specified as arrays of rules instead of a single | delimited string:

$validatedData = $request->validate([
    'title' => ['required', 'unique:posts', 'max:255'], // alternative rule of 'required|unique:posts|max:255'
    'body' => ['required'],
]);
       // Process the validated data

       # Or
       Validator::make($request->all(), [
        'title' => 'required|unique:posts|max:255',
        'body' => 'required',
        ])->validate();
}
```
#### **Custom Validation**
To use a custom validation rule in a professional form in Laravel, you can create a Form Request class and define the custom rule in the `rules()` method. This way, your validation logic is separated from your controller, promoting a cleaner and more maintainable code structure.

Here's a step-by-step guide:

1. **Create a Form Request:**

   Create a new Form Request class using the artisan command:

   ```bash
   php artisan make:request CustomValidationRequest
   ```
 **Custom Request File stored in:**
    ```bash
    app
    └── Http
        └── Requests
            └── CustomValidationRequest.php
    ```
   This will generate a new file at `app/Http/Requests/CustomValidationRequest.php`.

2. **Define the Custom Rule in the Form Request:**

   Open the `CustomValidationRequest.php` file and define the custom rule in the `rules()` method:

```php
   <?php

   namespace App\Http\Requests;

   use Illuminate\Foundation\Http\FormRequest;

   class CustomValidationRequest extends FormRequest
   {
       public function rules()
       {
           return [
               'custom_field' => function ($attribute, $value, $fail) {
                   if ($value != 'expected_value') {
                       $fail($attribute.' is invalid.');
                   }
               },
               // Add other rules for your form fields
           ];
       }

     // Optionally, you can override the messages method to customize validation error messages
    public function messages()
    {
        return [
            'custom_field' => 'The :attribute is invalid.',
            // Define custom error messages for other fields if needed
        ];
    }

    # OR 
    public function messages()
    {
        return [
            'title.required' => 'The title field is required.',
            'content.required' => 'The content field is required.',
        ];
    }
}
 ```

   Make sure to add any other validation rules for your form fields within the `rules()` method.

3. **Use the Form Request in the Controller:**

   In your controller, type-hint the `CustomValidationRequest` in the method that handles the form submission:

 ```php
    use App\Http\Requests\CustomValidationRequest;

    public function processForm(CustomValidationRequest $request) // not Request but also CustomValidationRequest is depenedency injection
    {
        $validatedData = $request->validated();
        // If the request passes validation, this method is executed
        // ...

        return response()->json(['message' => 'Form submission successful'], 200);
    }
```

   Laravel will automatically validate the request using the rules defined in the `CustomValidationRequest` before executing the `processForm` method.

4. **Display Validation Errors in the View with repopulating of old value:**

   In your view, you can display validation errors using Laravel's `@error` directive. and Laravel's `old()` function helps with this to show the old value in the inputs. For example:

   *Generally The Validation rules* return these error
    ```blade
        @error('username')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    ```
    for this return 
    ```php
      return redirect()->route('your.route.name')->withErrors(['username' => 'Username is required'])->withInput();
    ```
using in blade file
   ```php
   <div>
   for withInput();
    <!-- Display old input value -->
    <input type="text" name="username" value="{{ old('username') }}">

    <!-- Display validation error message -->
    for withErrors();
    @error('username')
        <div class="text-danger">{{ $message }}</div>
    @enderror
   </div>
   ```

**Displaying The Validation Errors with error position:**

This code checks if there are errors for the "name" field and displays the first error message if any. The `withErrors` method flashes the errors to the session, and `->first('name')` retrieves the first error for the "name" field.

```php
redirect()->back()->withErrors($validator)->withInput();

@if ($errors->has('name'))
    <div class="alert alert-danger">
        {{ $errors->first('name') }}
    </div>
@endif
```

 **with()**
 `with` method to flash data to the session, and then access that data in your Blade file. This is commonly used for success messages or additional information that needs to be displayed after a redirect. Here's how you can use `with` to return success or error messages in your Blade file:

    ```php
        // Redirect with success message
        return redirect()->route('your.route.name')->with('success', 'Operation successful');

        // Or, redirect with error message
        return redirect()->route('your.route.name')->with('error', 'Operation failed');
    ```
    ```blade
    <!-- Check for success message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Check for error message -->
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    ```

**Form Request Validation:**

Form request validation is a recommended approach in Laravel for keeping your controller methods clean and organized.

**Creating Form Requests:**

You can create a form request class using the `artisan` command:

```bash
php artisan make:request StorePostRequest
```

In the generated form request class, define your validation rules in the `rules()` method:

```php
public function rules()
{
    return [
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ];
}
```

**Authorizing Form Requests:**

You can also authorize the request by defining an `authorize()` method in your form request class:

```php
public function authorize()
{
    return true; // By default, anyone is authorized; add your custom authorization logic here
}
```

**Customizing The Error Messages:**

You can customize validation error messages by overriding the `messages()` method in your form request class:

```php
public function messages()
{
    return [
        'title.required' => 'The title field is required.',
        'content.required' => 'The content field is required.',
    ];
}
```

**Performing Additional Validation:**

You can perform additional custom validation beyond the built-in rules. Use the `Validator` facade to create custom validation rules:

```php
use Illuminate\Support\Facades\Validator;

$data = [

    'name' =>  $request->name,
    'email' => $request->email,
    // Add other data fields here
    
];

$rules = [
    'name' => 'required|string|max:255',
    'email' => 'required|email|unique:users|max:255',
    // Define validation rules for other fields
];

$validator = Validator::make($data, $rules);

 # OR

 $validator = Validator::make($request->all() , [
    'name' => 'required|string|max:255',
    'email' => 'required|email|unique:users|max:255',
 ]);

if ($validator->fails()) {
    // Validation failed, you can handle errors here
    $errors = $validator->errors();
    // Handle the errors, return a response, etc.
} else {
    // Validation passed, you can proceed with your logic here
}

```

**Working With Validated Input:**

After validation, you can access the validated input using the `validated()` method:

```php
$validatedData = $request->validated();
```

This gives you access to the sanitized and validated input data.

**Working With Error Messages:**

You can display error messages in your Blade views using the `$errors` variable. For example:

```php
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
```

This code displays all validation error messages.

**Specifying Custom Messages In Language Files:**

You can define custom validation error messages in language files. For example, in `resources/lang/en/validation.php`, you can customize messages for specific rules:

```php
'custom' => [
    'custom_field' => [
        'required' => 'The :attribute field must be "custom_value".',
    ],
],
```

**Using Closures:**

You can use closures for custom validation logic. For example:

```php
'custom_field' => [
    'required',
    function ($attribute, $value, $fail) {
        if ($value != 'custom_value') {
            $fail('The custom field must be "custom_value".');
        }
    },
],
```
#### **Blade: Validation Errors**
---
Validation errors in Laravel are a crucial aspect of form handling. They allow you to display error messages to users when their input data doesn't meet the validation criteria you've defined. Let's explore how to handle validation errors in Laravel Blade templates with real-life examples:

1. **Controller Validation:**
   In your Laravel controller, you can define validation rules for incoming requests using the `validate` method. If validation fails, Laravel automatically redirects the user back to the previous page with the validation errors.

```php
   public function store(Request $request)
   {
$validatedData = $request->validate([
    'name' => 'required|string|max:255',
    'email' => 'required|email|unique:users',
    'password' => 'required|min:6',
    'description' => 'string|max:500',
    'age' => 'numeric',
    'quantity' => 'integer',
    'username' => 'unique:users',
    'publish_at' => 'nullable|date',
    'phone' => 'regex:/^[0-9]{10}$/',
    'gender' => 'in:Male,Female,Other',
    'birthdate' => 'date_format:Y-m-d',
    'event_date' => 'after:2023-01-01',
    'expiry_date' => 'before:2023-12-31',
    'password_confirmation' => 'required_with:password|same:password',
    'custom_field' => function ($attribute, $value, $fail) {
        if ($value != 'expected_value') {
            $fail($attribute.' is invalid.');
        }
    },
]);

       // Process the validated data
   }
```

2. **Blade Template for Displaying Errors:**
   In your Blade template where you render the form, you can use the `@if` directive to check if there are validation errors for a specific field. You can then use the `@error` directive to display the error message.

   ```php
   <form action="{{ route('user.store') }}" method="POST">
       @csrf
       <div>
           <label for="name">Name:</label>
           <input type="text" id="name" name="name">
           @error('name')
               <div class="alert alert-danger">{{ $message }}</div>
           @enderror
       </div>
       <!-- Repeat for other form fields -->
       <button type="submit">Submit</button>
   </form>
   ```

3. **Displaying All Errors:**
   To display all validation errors at once, you can use the `@if` directive to check if there are any errors and then loop through them.

   ```php
   @if ($errors->any())
       <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
           </ul>
       </div>
   @endif
   ```

4. **Styling Error Messages:**
   You can customize the styling of error messages to fit your application's design by adding appropriate CSS classes.

   ```php
   <div class="form-group">
       <label for="email">Email:</label>
       <input type="email" id="email" name="email" class="@error('email') is-invalid @enderror">
       @error('email')
           <div class="invalid-feedback">{{ $message }}</div>
       @enderror
   </div>
   ```

5. **Old Input Values:**
   When a validation error occurs, you can use the `old` helper function to repopulate the form fields with the user's previous input.

   ```php
   <input type="text" id="name" name="name" value="{{ old('name') }}">
   ```

6. **Customizing Error Messages:**

   You can customize error messages in the `resources/lang/en/validation.php` language file by defining custom error messages for specific rules or attributes.

   ```php
   'custom' => [
       'name' => [
           'required' => 'The name field is required.',
           'max' => 'The name field must not exceed :max characters.',
       ],
       // Define custom messages for other fields here
   ],
   ```

7. **Manually Creating Validators:**
If you do not want to use the validate method on the request, you may create a validator instance manually using the Validator facade. The make method on the facade generates a new validator instance:

```php
class PostController extends Controller
{
    /**
     * Store a new blog post.
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);
 
        if ($validator->fails()) {
            return redirect('post/create')
                        ->withErrors($validator)
                        ->withInput();
        }
 
        // Retrieve the validated input...
        $validated = $validator->validated();
 
        // Retrieve a portion of the validated input...
        $validated = $validator->safe()->only(['name', 'email']);
        $validated = $validator->safe()->except(['name', 'email']);
 
        // Store the blog post...
 
        return redirect('/posts');
    }
}

```
8. **Customizing The Error Messages**
If needed, you may provide custom error messages that a validator instance should use instead of the default error messages provided by Laravel. There are several ways to specify custom messages. First, you may pass the custom messages as the third argument to the Validator::make method:

```PHP
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
$validator = Validator::make($input, $rules, $messages = [
    'required' => 'The :attribute field is required.',
]);

  /* OR */

$validator = Validator::make($request->all(), [
    'password' => ['required', 'confirmed', Password::min(8)],
]);

Password::min(8)  // Require at least 8 characters...
    ->letters()  // Require at least one letter...
    ->mixedCase() // Require at least one uppercase and one lowercase letter...
    ->numbers() // Require at least one number...
    ->symbols()  // Require at least one symbol...
    ->uncompromised();
    /* uncompromised() : 
    If there's a match, it suggests that the user's chosen password has been previously exposed in a data breach. This is a strong indicator that the password is not secure, as hackers might already know it.

If there's no match, it means the password is not found in the known compromised password lists, which indicates it's less likely to have been exposed in a data breach.
    */
```

In this example, the :attribute placeholder will be replaced by the actual name of the field under validation. You may also utilize other placeholders in validation messages. For example:

```PHP
$messages = [
    'same' => 'The :attribute and :other must match.',
    'size' => 'The :attribute must be exactly :size.',
    'between' => 'The :attribute value :input is not between :min - :max.',
    'in' => 'The :attribute must be one of the following types: :values',
];
```

In the custom error messages, you can use placeholders like `:attribute`, `:other`, `:size`, `:min`, `:max`, and `:values` to include dynamic information about the validation rule. Here are some examples:


### **Error Handling**
---
Error handling in Laravel is a crucial aspect of building robust and reliable applications. Laravel provides a comprehensive set of tools and features to help developers manage errors effectively. Let's explore different types of error handling in Laravel along with real-life and professional code examples.

1. **Exceptions in Laravel**:
   
   In Laravel, exceptions are used to handle errors gracefully. They are instances of the `Exception` class or its subclasses. Laravel provides several built-in exception classes, and you can create custom ones as needed.

   Example:
   ```php
   try {
       // Code that may throw an exception
       $result = 1 / 0; // This will throw a DivisionByZeroError
   } catch (DivisionByZeroError $e) {
       // Handle the exception
       Log::error($e->getMessage());
       return view('error', ['message' => 'An error occurred.']);
   }
   ```

2. **HTTP Exceptions**:

   Laravel has a set of HTTP exception classes to handle HTTP-related errors like 404 (Not Found) and 500 (Internal Server Error).

   Example:
   ```php
   public function show($id)
   {
       $item = Item::find($id);
       if (!$item) {
           throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException('Item not found.');
       }

       return view('item.show', ['item' => $item]);
   }
   ```

3. **Custom Exception Handling**:

   You can create custom exception classes to handle specific application-related errors and provide meaningful error messages to users.

   Example:
   ```php
   class CustomException extends \Exception
   {
       public function render($request)
       {
           return response()->view('errors.custom', ['message' => $this->getMessage()], 500);
       }
   }
   ```

4. **Error Logging**:

   Laravel allows you to log errors and exceptions for debugging and monitoring purposes. You can configure different log channels, including files, databases, and external services like Loggly or Papertrail.

   Example (Logging to a file):

   ```php

   try {
       // Code that may throw an exception
   } catch (\Exception $e) {
       Log::error('Error occurred: ' . $e->getMessage());
   }

   ```

5. **Error Views**:

   Laravel provides default error views that can be customized to display user-friendly error pages. You can find these views in the `resources/views/errors` directory.

6. **Handling AJAX Errors**:

   When working with AJAX requests, it's essential to handle errors gracefully and return JSON responses. You can use Laravel's `Response` class to send appropriate HTTP status codes and error messages.

   Example:
   ```php
   public function ajaxRequest()
   {
       try {
           // Code that may throw an exception
       } catch (\Exception $e) {
           return response()->json(['error' => 'An error occurred.'], 500);
       }
   }
   ```

7. **Validation Errors**:

   Laravel offers robust validation handling using the Validator class. You can validate user inputs and handle validation errors easily.

   Example:
   ```php
   $validator = Validator::make($request->all(), [
       'email' => 'required|email',
       'password' => 'required|min:8',
   ]);

   if ($validator->fails()) {
       return redirect('login')
           ->withErrors($validator)
           ->withInput();
   }
   ```

8. **Database Transactions**:

   When working with database operations, you can use database transactions to ensure data consistency and handle errors gracefully.

   Example:

   ```php

   DB::beginTransaction();

   try {
       // Database operations
       DB::commit();
   } catch (\Exception $e) {
       DB::rollback();
       Log::error('Database error: ' . $e->getMessage()); // $$->getCode(), $e->getLine();
   };

   ```
Certainly! You can create a custom exception handler for both 404 (Not Found) and 500 (Internal Server Error) pages in Laravel. Here's how you can do it:

1. **Create Custom Exceptions**:

   First, create custom exception classes for handling these errors. You can place these classes in the `app/Exceptions` directory.

   For the 404 error, create a `NotFoundHttpException` handler:
   
   ```php
   // app/Exceptions/CustomNotFoundHttpException.php

   namespace App\Exceptions;

   use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

   class CustomNotFoundHttpException extends NotFoundHttpException
   {
       public function render($request)
       {
           return response()->view('errors.404', [], 404);  // views/errors/404.blade.php
       }
   }
   ```

   For the 500 error, create a `CustomInternalServerErrorException` handler:
   
   ```php
   // app/Exceptions/CustomInternalServerErrorException.php

   namespace App\Exceptions;

   use Exception;

   class CustomInternalServerErrorException extends Exception
   {
       public function render($request)
       {
           return response()->view('errors.500', [], 500); // views/errors/500.blade.php
       }
   }
   ```

2. **Custom Error Views**:

   Create custom error views for both 404 and 500 errors. These views should be placed in the `resources/views/errors` directory.

   - `resources/views/errors/404.blade.php` for the 404 error.
   - `resources/views/errors/500.blade.php` for the 500 error.

   Customize these views according to your application's design and requirements.

3. **Register Custom Exceptions**:

   Open the `app/Exceptions/Handler.php` file and register your custom exceptions in the `render` method:

   ```php
   public function render($request, Exception $exception)
   {
       if ($exception instanceof CustomNotFoundHttpException) {
           return $exception->render($request);
       }

       if ($exception instanceof CustomInternalServerErrorException) {
           return $exception->render($request);
       }

       return parent::render($request, $exception);
   }
   ```

4. **Test Your Custom Exceptions**:

   You can now test your custom exceptions by triggering them in your routes or controllers.

   For example, in a controller method:
   
   ```php
   public function customErrorExample()
   {
       // Trigger a 404 error
       throw new CustomNotFoundHttpException('Custom 404 Error');

       // Trigger a 500 error
       // throw new CustomInternalServerErrorException('Custom 500 Error');
   }
   ```

1. Create a Custom Exception Class:

   First, create a custom exception class that extends Laravel's `HttpException`. This class will allow you to handle both 404 and 500 errors.

   ```php
   // app/Exceptions/CustomException.php

   namespace App\Exceptions;

   use Symfony\Component\HttpKernel\Exception\HttpException;

   class CustomException extends HttpException
   {
       public function __construct($message = null, \Exception $previous = null, $code = 0)
       {
           parent::__construct(500, $message, $previous, [], $code);
       }
   }
   ```

2. Create Custom Error Views:

   Next, create custom error views for both 404 and 500 errors. You can place these views in the `resources/views/errors` directory.

   - For 404 error, create a view file named `404.blade.php`.
   - For 500 error, create a view file named `500.blade.php`.

   Example 404 View (`resources/views/errors/404.blade.php`):
   ```html
   <!DOCTYPE html>
   <html>
   <head>
       <title>404 Not Found</title>
   </head>
   <body>
       <h1>404 Not Found</h1>
       <p>The page you requested could not be found.</p>
   </body>
   </html>
   ```

   Example 500 View (`resources/views/errors/500.blade.php`):
   ```html
   <!DOCTYPE html>
   <html>
   <head>
       <title>500 Internal Server Error</title>
   </head>
   <body>
       <h1>500 Internal Server Error</h1>
       <p>Something went wrong on the server.</p>
   </body>
   </html>
   ```

3. Use the Custom Exception:

   In your controller or route handler, you can throw the custom exception when you encounter an error that should result in a 500 error or a 404 error.

   Example (Throwing a 404 Error):
   ```php
   use App\Exceptions\CustomException;

   public function show($id)
   {
       $item = Item::find($id);
       if (!$item) {
           throw new CustomException('Item not found.', null, 404);
       }
       return view('item.show', ['item' => $item]);
   }
   ```

   ```php
   use App\Exceptions\CustomException;

   public function someMethod()
   {
       try {
           // Code that may throw an exception
           if (/* Some error condition */) {
               throw new CustomException('An internal server error occurred.');
           }
       } catch (\Exception $e) {
           throw new CustomException('An internal server error occurred.', $e);
       }
   }
   ```
### **LOGGING**
---

#### 1. What is Logging?

Logging is the process of recording events and messages from your application to a designated location, typically a log file. These logs are essential for debugging and monitoring your application's behavior, especially in production environments.

#### 2. Laravel's Logging System

Laravel provides a powerful and flexible logging system through the use of the Monolog library. You can configure and use this system to capture and store log messages.

#### 3. Log Levels

Laravel supports various log levels, each indicating the severity of a message:

- `emergency`: System is unusable. // Log::emergency
- `alert`: Action must be taken immediately.
- `critical`: Critical conditions.
- `error`: Error conditions.
- `warning`: Warning conditions.
- `notice`: Normal but significant condition.
- `info`: Informational messages.
- `debug`: Debug-level messages.

#### 4. Configuration

Laravel's logging configuration can be found in the `config/logging.php` file. You can set the log channel (where logs are stored), the log level, and other options.

#### 5. Writing Log Messages

You can log messages in Laravel using the `Log` facade. Here's an example:

```php
use Illuminate\Support\Facades\Log;

Log::info('This is an informational message.');
Log::error('An error occurred: ' . $exception->getMessage());
```

#### 6. Real-Life Blade Example

Suppose you want to display a log message in your Blade template. You can pass the log message from your controller to the view and then display it. Here's an example:

In your controller:

```php
use Illuminate\Support\Facades\Log;

public function showLogMessage()
{
    Log::info('This is a log message from the controller.');
    return view('logMessage', ['message' => 'Log message from controller sent to view.']);
}
```

In your Blade view (e.g., `logMessage.blade.php`):

```html
<!DOCTYPE html>
<html>
<head>
    <title>Laravel Logging Example</title>
</head>
<body>
    <h1>Log Message Example</h1>
    <p>Message from controller: {{ $message }}</p>
</body>
</html>
```

When you visit the route associated with `showLogMessage`, you'll see the log message displayed in the browser.

#### 7. Viewing Logs / displaying all the logs

```php
php artisan log:read
```
By Default, In a Laravel project, the logs are typically stored in the `storage/logs` directory. The main log file is usually named `laravel.log`.
 You can access these log files to review and troubleshoot issues in your application.

### **Real Life Example of Log**
---
For an e-commerce website, it's important to log relevant information to monitor user activities, track errors, and analyze performance. Below is an example of how you might structure the logging in a Laravel-based e-commerce application:

1. **User Activity Logging:**
   Log when users perform significant actions, such as making a purchase or updating their profile.

   ```php
   use Illuminate\Support\Facades\Log;

   // Log when a user makes a purchase
   Log::info('User purchased item', ['user_id' => auth()->user()->id, 'item_id' => $item->id]);
   ```

2. **Error Logging:**
   Log errors and exceptions to quickly identify and resolve issues.

   ```php
   try {
       // Code that may throw an exception
   } catch (Exception $e) {
       Log::error('Exception occurred', ['message' => $e->getMessage(), 'trace' => $e->getTrace()]);
       // Handle the exception as needed
   }
   ```

3. **Performance Logging:**
   Log performance-related information to identify bottlenecks or slow-performing parts of your application.

   ```php
   $startTime = microtime(true);
   // Code to measure performance
   $executionTime = microtime(true) - $startTime;
   Log::debug('Page loaded', ['execution_time' => $executionTime]);
   ```

4. **Custom Logs for Orders:**
   For an e-commerce site, orders are crucial. Log order-related information.

   ```php
   // Log when an order is placed
   Log::info('Order placed', ['order_id' => $order->id, 'total_amount' => $order->total_amount]);
   ```

5. **Security Logging:**
   Log suspicious activities or security-related events.

   ```php
   // Log failed login attempts
   Log::warning('Failed login attempt', ['username' => $username, 'ip' => $request->ip()]);
   ```

6. **Custom Log Channels:**
   If needed, create custom log channels for specific components, like payment processing or user authentication.

   ```php
   // Config/logging.php
   'channels' => [
       'payment' => [
           'driver' => 'single',
           'path' => storage_path('logs/payment.log'),
           'level' => 'debug',
       ],
   ],
   ```

   ```php
   // Log payment-related information
   Log::channel('payment')->info('Payment processed', ['order_id' => $order->id, 'amount' => $order->total_amount]);
   ```

### **Log Using IN Controller**
---
Certainly! In addition to the basic logging methods, I'll include some additional logging methods and demonstrate how they can be used in a Laravel controller class. Here's an extended example:

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function create(Request $request)
    {
        try {
            // Log the incoming request data for debugging
            Log::info('Product Creation Request Data:', $request->all());

            // Validate the request data
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',
                // Add other validation rules as needed
            ]);

            // Perform product creation logic
            // ...

            // Log a success message
            Log::info('Product Created Successfully:', ['product_name' => $request->input('name')]);

            // Return a response indicating success
            return response()->json(['message' => 'Product created successfully'], 201);
        } catch (\Exception $e) {
            // Log the error message and details
            Log::error('Product Creation Error:', ['message' => $e->getMessage(), 'trace' => $e->getTrace()]);

            // Log an emergency alert for critical errors
            Log::emergency('Critical Error during Product Creation', ['exception' => $e]);

            // Return an error response
            return response()->json(['error' => 'Product creation failed'], 500);
        }
    }

    public function update(Request $request, $productId)
    {
        try {
            // Log the incoming request data for debugging
            Log::info('Product Update Request Data:', $request->all());

            // Validate the request data
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',
                // Add other validation rules as needed
            ]);

            // Perform product update logic
            // ...

            // Log a success message
            Log::info('Product Updated Successfully:', ['product_id' => $productId]);

            // Return a response indicating success
            return response()->json(['message' => 'Product updated successfully'], 200);
        } catch (\Exception $e) {
            // Log the error message and details
            Log::error('Product Update Error:', ['message' => $e->getMessage(), 'trace' => $e->getTrace()]);

            // Log a warning for non-critical errors
            Log::warning('Non-Critical Error during Product Update', ['exception' => $e]);

            // Return an error response
            return response()->json(['error' => 'Product update failed'], 500);
        }
    }

    public function delete($productId)
    {
        try {
            // Log a debug message for product deletion request
            Log::debug('Product Deletion Requested:', ['product_id' => $productId]);

            // Perform product deletion logic
            // ...

            // Log a success message
            Log::info('Product Deleted Successfully:', ['product_id' => $productId]);

            // Return a response indicating success
            return response()->json(['message' => 'Product deleted successfully'], 200);
        } catch (\Exception $e) {
            // Log the error message and details
            Log::error('Product Deletion Error:', ['message' => $e->getMessage(), 'trace' => $e->getTrace()]);

            // Log an alert for unexpected errors during deletion
            Log::alert('Unexpected Error during Product Deletion', ['exception' => $e]);

            // Return an error response
            return response()->json(['error' => 'Product deletion failed'], 500);
        }
    }
}
```

In this extended example:

- The `Log::emergency()` method is used for critical errors during product creation.
- The `Log::warning()` method is used for non-critical errors during product update.
- The `Log::debug()` method is used for debugging messages during product deletion.
- The `Log::alert()` method is used for unexpected errors during product deletion.

These additional methods provide more granularity in categorizing log messages based on their severity and importance. Customize the log messages and levels based on your specific needs and the nature of your application.

**Show The Logs**
In the Path `laravel-real-state-project\storage\logs\laravel.log`
or CLI Command 

```bash
cat storage/logs/laravel.log
```

Remember to adjust the log levels (`info`, `debug`, `error`, etc.) based on the severity of the information. Regularly review logs to identify and address issues proactively, ensuring a smooth and secure operation of your e-commerce website.

### Debugging Sql QUery by Log
Yes, the `\DB::listen` code snippet can be used with both raw SQL queries and Eloquent ORM queries in Laravel. The purpose of this snippet is to log queries executed by the database, regardless of whether they are raw SQL queries or queries generated by Eloquent.

Here's how you can use it with Eloquent ORM:

```php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\YourModel; // Replace with your actual model

public function someControllerMethod()
{
    // Your controller logic...

    // Log Eloquent queries specific to this controller method
    DB::listen(function ($query) {
        Log::info('Eloquent Query: ' . $query->sql);
        Log::info('Eloquent Bindings: ' . json_encode($query->bindings));
        Log::info('Eloquent Time: ' . $query->time);
    });

    // Example Eloquent query
    $result = YourModel::where('column', 'value')->get();

    // More controller logic...
}

/* OR */
        \DB::listen(function ($query) {
        \Log::info($query->sql);
        \Log::info($query->bindings);
        \Log::info($query->time);
    });
```
**Notes** Can We Set it in Middleware to show the result globally

```php
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        if ($this->app->isLocal()) {
            DB::listen(function ($query) {
                Log::info($query->sql);
                Log::info($query->bindings);
                Log::info($query->time);
            });
        }
    }
}

/* OR CREATING MIDDLEWARE */
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LogQueriesMiddleware
{
    public function handle($request, Closure $next)
    {
        if (config('app.debug')) {
            DB::listen(function ($query) {
                Log::info($query->sql);
                Log::info($query->bindings);
                Log::info($query->time);
            });
        }

        return $next($request);
    }
}

```

**Result of Log above in laravel.log**
```sql
[2023-11-26 07:03:18] local.INFO: select * from `properties` where `id` = ? or `id` = ? limit 1  
[2023-11-26 07:03:18] local.INFO: array (
  0 => '42',
  1 => '42',
)  
[2023-11-26 07:03:18] local.INFO: 0.51  
[2023-11-26 07:03:18] local.INFO: select * from `multi_images` where `property_id` = ? or `property_id` = ?  
[2023-11-26 07:03:18] local.INFO: array (
  0 => 42,
  1 => '42',
)  
[2023-11-26 07:03:18] local.INFO: 0.8  
[2023-11-26 07:03:18] local.INFO: Property ID: 42  
[2023-11-26 07:03:18] local.INFO: Multi Images Relationship: Illuminate\Support\Collection Object
(
    [items:protected] => Array
        (
            [0] => stdClass Object
                (
                    [id] => 56
                    [property_id] => 42
                    [photo_name] => upload/property/multi-image/-0119140.jpg
                    [created_at] => 2023-11-24 13:19:14
                    [updated_at] => 2023-11-26 06:40:58
                    [deleted_at] => 2023-11-26 06:40:58
                )

            [1] => stdClass Object
                (
                    [id] => 57
                    [property_id] => 42
                    [photo_name] => upload/property/multi-image/-0119380.jpg
                    [created_at] => 2023-11-24 13:19:38
                    [updated_at] => 2023-11-26 06:40:58
                    [deleted_at] => 2023-11-26 06:40:58
                )

            [2] => stdClass Object
                (
                    [id] => 58
                    [property_id] => 42
                    [photo_name] => upload/property/multi-image/-0119381.jpg
                    [created_at] => 2023-11-24 13:19:38
                    [updated_at] => 2023-11-26 06:40:58
                    [deleted_at] => 2023-11-26 06:40:58
                )

        )

    [escapeWhenCastingToString:protected] => 
)
  
[2023-11-26 07:03:18] local.INFO: Multi Images are: Illuminate\Support\Collection Object
(
    [items:protected] => Array
        (
            [0] => stdClass Object
                (
                    [id] => 56
                    [property_id] => 42
                    [photo_name] => upload/property/multi-image/-0119140.jpg
                    [created_at] => 2023-11-24 13:19:14
                    [updated_at] => 2023-11-26 06:40:58
                    [deleted_at] => 2023-11-26 06:40:58
                )

            [1] => stdClass Object
                (
                    [id] => 57
                    [property_id] => 42
                    [photo_name] => upload/property/multi-image/-0119380.jpg
                    [created_at] => 2023-11-24 13:19:38
                    [updated_at] => 2023-11-26 06:40:58
                    [deleted_at] => 2023-11-26 06:40:58
                )

            [2] => stdClass Object
                (
                    [id] => 58
                    [property_id] => 42
                    [photo_name] => upload/property/multi-image/-0119381.jpg
                    [created_at] => 2023-11-24 13:19:38
                    [updated_at] => 2023-11-26 06:40:58
                    [deleted_at] => 2023-11-26 06:40:58
                )

        )

    [escapeWhenCastingToString:protected] => 
)
  
[2023-11-26 07:03:18] local.INFO: delete from `multi_images` where `property_id` = ?  
[2023-11-26 07:03:18] local.INFO: array (
  0 => 42,
)  
[2023-11-26 07:03:18] local.INFO: 119.64  
[2023-11-26 07:03:18] local.INFO: delete from `properties` where `id` = ?  
[2023-11-26 07:03:18] local.INFO: array (
  0 => 42,
)  
[2023-11-26 07:03:18] local.INFO: 116.35  

```

## **DIGGING DEEPERS : ADVANCED LEVEL**
---
It is an advanced part of Laravel.

### **ARTISAN CONSOLE**
---
The Laravel Artisan Console is a command-line tool included with the Laravel PHP framework. It provides a wide range of commands for various tasks related to Laravel application development, management, and maintenance. Artisan simplifies common development tasks and automates many processes, making it easier for developers to work with Laravel.
Certainly, here are some of the Artisan commands in Laravel with their descriptions in PHP code view:

1. **Make a New Controller:**
   ```php
   php artisan make:controller MyController
   ```

2. **Create a New Model:**
   ```php
   php artisan make:model MyModel
   ```

3. **Create a Migration:**
   ```php
   php artisan make:migration create_table_name
   ```

4. **Run Migrations:**
   ```php
   php artisan migrate
   ```

5. **Create a Seeder:**
   ```php
   php artisan make:seeder MySeeder
   ```

6. **Run Seeders:**
   ```php
   php artisan db:seed
   ```

7. **Generate a Key for .env File:**
   ```php
   php artisan key:generate
   ```

8. **Clear Cache:**
   ```php
   php artisan cache:clear
   ```

9. **Create a New Middleware:**
   ```php
   php artisan make:middleware MyMiddleware
   ```

10. **Create a New Request:**
    ```php
    php artisan make:request MyRequest
    ```

11. **List All Available Routes:**
    ```php
    php artisan route:list
    ```

12. **Create a New Job:**
    ```php
    php artisan make:job MyJob
    ```

13. **Create a New Event:**
    ```php
    php artisan make:event MyEvent
    ```

14. **Create a New Listener:**
    ```php
    php artisan make:listener MyListener
    ```

15. **Create a New Policy:**
    ```php
    php artisan make:policy MyPolicy
    ```
Certainly! Here are some more important Laravel Artisan commands without repetition:

1. **Clear Configuration Cache:**
   ```php
   php artisan config:clear
   ```

2. **Optimize Class Loading:**
   ```php
   php artisan optimize
   ```

3. **Create a New Middleware with Handle Method:**
   ```php
   php artisan make:middleware MyMiddleware --invokable
   ```

4. **Create a New Factory:**
   ```php
   php artisan make:factory MyFactory
   ```

5. **Create a New Test:**
   ```php
   php artisan make:test MyTest
   ```

6. **Create a New Resource Controller:**
   ```php
   php artisan make:controller MyController --resource
   ```

7. **Create a New Notification:**
   ```php
   php artisan make:notification MyNotification
   ```

8. **Rollback the Last Database Migration:**
   ```php
   php artisan migrate:rollback
   ```

9. **Create a New Livewire Component:**
   ```php
   php artisan make:livewire MyComponent
   ```

10. **Generate Documentation for API Routes:**
    ```php
    php artisan api:generate
    ```

11. **Create a New Channel Class:**
    ```php
    php artisan make:channel MyChannel
    ```

12. **Create a New Artisan Command:**
    ```php
    php artisan make:command MyCommand
    ```
Certainly! Here are a few more Laravel Artisan commands that you might find useful:

1. **Generate Authentication Scaffolding:**
   ```php
   php artisan make:auth
   ```

2. **Create a New Job Listener:**
   ```php
   php artisan queue:listen
   ```

3. **Schedule Task Execution:**
   ```php
   php artisan schedule:run
   ```

4. **Create a New Factory for Model Factories:**
   ```php
   php artisan make:factory MyModelFactory --model=MyModel
   ```

5. **Create a New Channel for Broadcasting:**
   ```php
   php artisan make:channel MyBroadcastChannel
   ```

6. **Optimize the Application for Production:**
   ```php
   php artisan optimize --force
   ```

7. **Create a New Policy with a Model:**
   ```php
   php artisan make:policy MyPolicy --model=MyModel
   ```

8. **Generate IDE Helper Files for Better Code Completion:**
   ```php
   php artisan ide-helper:generate
   ```

9. **Rebuild All IDE Helper Files:**
   ```php
   php artisan ide-helper:meta
   ```

10. **Generate a Sitemap:**
    ```php
    php artisan sitemap:generate
    ```

11. **Generate Application Encryption Key:**
    ```php
    php artisan key:generate
    ```

12. **List All Commands and Options:**
    ```php
    php artisan list
    ```

### **CUSTOM ARTISAN COMMAND**
---
Creating a custom Artisan command is a great way to extend Laravel's functionality for your specific project needs. Let's walk through a simple example of creating a custom Artisan command for a real-life scenario. In this example, we'll create an Artisan command to send email reminders for upcoming appointments in a healthcare application.

**Step 1: Create the Custom Artisan Command**

1. Open your terminal and navigate to your Laravel project's root directory.

2. Use the Artisan command to create a new custom command. We'll call it `SendAppointmentReminders`:

   ```bash
   php artisan make:command SendAppointmentReminders
   ```

   This will generate a new file named `SendAppointmentReminders.php` in the `app/Console/Commands` directory.

**Step 2: Define the Command Logic**

Open the `SendAppointmentReminders.php` file in a code editor. You'll find a `handle()` method within the file. This is where you define the logic for your custom command. In our example, we want to send email reminders for upcoming appointments.

Here's a simplified code example:

```php
<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Appointment;
use Illuminate\Support\Facades\Mail;

class SendAppointmentReminders extends Command
{
    protected $signature = 'send:reminders';
    protected $description = 'Send email reminders for upcoming appointments';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $upcomingAppointments = Appointment::whereDate('date', now()->addDays(1))->get();

        foreach ($upcomingAppointments as $appointment) {
            $user = $appointment->user;
            $email = $user->email;
            $subject = 'Appointment Reminder';
            $message = 'Your appointment is scheduled for tomorrow.';

            Mail::raw($message, function ($message) use ($email, $subject) {
                $message->to($email)->subject($subject);
            });

            $this->info("Reminder email sent to: $email");
        }

        $this->info('Reminder emails sent successfully.');
    }
}
```

In this code:

- We define the signature and description for our command in the `protected $signature` and `protected $description` properties.

- In the `handle()` method, we retrieve upcoming appointments that are scheduled for the next day.

- We iterate through the appointments, retrieve the user's email, and send them a reminder email using Laravel's built-in `Mail` facade.

- Finally, we use `$this->info()` to display messages in the console.

**Step 3: Register the Custom Command**

To make your custom command accessible via Artisan, you need to register it. Open the `app/Console/Kernel.php` file and add your custom command to the `$commands` property:

```php
protected $commands = [
    // ...
    \App\Console\Commands\SendAppointmentReminders::class,
];
```

**Step 4: Run the Custom Command**

Now, you can run your custom Artisan command from the terminal:

```bash
php artisan send:reminders
```

This will execute the `handle()` method of your custom command, sending email reminders for upcoming appointments.


### **LARAVEL BROADCASTING: An In-Depth Explanation**
---

**What is Laravel Broadcasting?**

Laravel Broadcasting is a real-time messaging system that allows you to send data from your Laravel application to connected clients, such as web browsers, mobile apps, or other servers, in real-time. It enables you to build interactive, live-updating features like chat applications, notifications, and live feeds.

**Key Components:**

1. **Broadcasting Server:** Laravel uses broadcasting drivers like Pusher, Redis, or others as the broadcasting server to manage and broadcast events to connected clients.

2. **Events and Listeners Simplified:** In Laravel, events are like notifications that something important happened in your application, such as a new message being sent. Listeners are like instructions that tell your application what to do when it hears about that important event. So, when the event occurs (e.g., a new message), the listener knows what action to take.
(In essence, events are the triggers, and listeners are the responders. When an event happens, listeners jump into action to perform specific tasks.)

Here's a basic example to illustrate this:

**Example:** Imagine you have a chat application. When someone sends a new message, you want to notify all online users. In Laravel, you'd create an event called "NewMessageSent" and a listener that says, "When 'NewMessageSent' event happens, send a notification to online users."

3. **WebSockets:** WebSockets are the technology that works like a two-way conversation on the internet over a single TCP (Transmission Control Protocol) connection. They allow your computer to talk to a website, and the website to talk back, all in real-time. It's like having a phone call with a website, where both sides can chat at any time, making it great for live updates and interactive applications.Laravel Broadcasting often uses WebSockets to provide real-time communication.

**Notes** WebSockets = Real-time, two-way chat between your computer and a website.

**Setting Up Laravel Broadcasting:**

1. **Configuration:** To use broadcasting, you need to configure the broadcasting driver in your `config/broadcasting.php` file. Laravel supports various broadcasting drivers, including Pusher, Redis, and more. For example, with Pusher:

In `.env` file configure
```php
BROADCAST_DRIVER=pusher
PUSHER_APP_ID=your_app_id
PUSHER_APP_KEY=your_app_key
PUSHER_APP_SECRET=your_app_secret
PUSHER_APP_CLUSTER=your_app_cluster

```

   ```php
   'default' => env('BROADCAST_DRIVER', 'pusher'),
   'connections' => [
       'pusher' => [
           'driver' => 'pusher',
           'key' => env('PUSHER_APP_KEY'),
           'secret' => env('PUSHER_APP_SECRET'),
           'app_id' => env('PUSHER_APP_ID'),
           'options' => [
               'cluster' => env('PUSHER_APP_CLUSTER'),
               'encrypted' => true,
           ],
       ],
       // Other broadcasting drivers...
   ],
   ```

2. **Event Creation:** Define your events using Laravel's Artisan command, `php artisan make:event EventName`. An event class typically includes a `broadcastOn` method that specifies the channel to which the event should be broadcast.

3. **Event Broadcasting:** In your application logic, trigger the event using `event(new EventName($data))`. This broadcasts the event to the specified channel.

**Example: Real-Time Notifications**

Let's create an example of real-time notifications using Laravel Broadcasting.

**Step 1: Create an Event**

Generate a new event using Artisan:

```bash
php artisan make:event NewNotification
```

In the `NewNotification` event class, define the event data:

```php
public $message;

public function __construct($message)
{
    $this->message = $message;
}
# - The `__construct` method is used to initialize the event with data (in this case, a message).

public function broadcastOn()
{
    return new Channel('notifications');
}
# The `broadcastOn` method specifies the channel where the event will be broadcasted.
```
**new Channel('notifications')**
`new Channel('notifications')`:
   Here, a new instance of the `Channel` class is created with the name 'notifications'. This defines the channel to which the event message will be broadcast.

Now, let's discuss the purpose of using channels in Laravel broadcasting:

Channels are used to group related events together. In the context of broadcasting, channels are often associated with specific topics or areas of interest. In this case, 'notifications' is a channel name, and any client that subscribes to this channel will receive events related to notifications.

*For example*, you can have multiple events, like 'newMessage', 'userLoggedIn', or 'orderPlaced', and each of them can be broadcast on different channels. Clients, such as web browsers, can subscribe to specific channels and receive updates when events are broadcast to those channels.



**Step 2: Broadcast the Event**

In your application logic, you can trigger this event when a new notification needs to be sent:

```php
event(new NewNotification('You have a new message.'));
```

**Step 3: Receive the Event in JavaScript (Blade File)**

In your Blade file, include JavaScript code to listen for and handle the event:

```javascript
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    // Initialize Pusher
    var pusher = new Pusher('{{ config('broadcasting.connections.pusher.key') }}', {
        cluster: '{{ config('broadcasting.connections.pusher.options.cluster') }}',
        encrypted: true
    });

    // Subscribe to the 'notifications' channel
    var channel = pusher.subscribe('notifications');

    // Listen for the 'NewNotification' event
    channel.bind('App\\Events\\NewNotification', function(data) {
        // Handle the incoming data (e.g., show a notification)
        alert(data.message);
    });
</script>
```
or blade view file

#### Broadcasting in Blade Views:

To receive and display real-time updates in a Blade view, you can use the `@pusher` directive. Here's an example:

```blade.php
@extends('layouts.app')

@section('content')
    <!-- Chat room content -->

    @pusher('chat')
        <div id="chat-room">
            <!-- Chat messages will be displayed here -->
        </div>
    @endpusher

    <!-- Chat input form -->
@endsection
```

In this example:

- `@pusher('chat')` specifies that this section will be updated using Pusher when new messages arrive.
- The content inside the `@pusher` directive will automatically update in real-time as new messages are broadcasted.

This JavaScript code initializes Pusher, subscribes to the 'notifications' channel, and listens for the 'NewNotification' event. When the event is received, it displays an alert with the message.

**Step 4: Broadcast the Event**

Back in your Laravel code, when you trigger the `NewNotification` event using `event(new NewNotification('You have a new message.'));`, it will be broadcasted to connected clients and trigger the JavaScript code in your Blade file.


### **EVENTS LISTENER**
---
Certainly! Here's a more detailed and comprehensive example of setting up broadcasting in a Laravel application for a real-time chat feature.

**Step 1: Install Laravel Echo and Configure WebSocket Server**

1. **Install Laravel Echo and Pusher**

   Run the following command to install Laravel Echo and Pusher:

   ```bash
   npm install laravel-echo pusher-js
   ```

2. **Set Up Pusher**

   Sign up for a Pusher account (https://pusher.com/), create a new app, and get your app credentials.

   Update your `.env` file with your Pusher credentials:

   ```
   BROADCAST_DRIVER=pusher
   PUSHER_APP_ID=your-app-id
   PUSHER_APP_KEY=your-app-key
   PUSHER_APP_SECRET=your-app-secret
   PUSHER_APP_CLUSTER=your-app-cluster
   ```

**Step 2: Create a Chat Event**

1. **Generate the Event**

   Run the following command to generate a chat event:

   ```bash
   php artisan make:event NewMessage
   ```

2. **Edit the Event Class**

   In `app/Events/NewMessage.php`, define the event class like this:

   ```php
   use Illuminate\Broadcasting\InteractsWithSockets;
   use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
   use Illuminate\Foundation\Events\Dispatchable;
   use Illuminate\Queue\SerializesModels;

   class NewMessage implements ShouldBroadcast
   {
       use Dispatchable, InteractsWithSockets, SerializesModels;

       public $message;

       public function __construct($message)
       {
           $this->message = $message;
       }

       public function broadcastOn()
       {
           return new Channel('chat');
       }
   }
   ```

**Step 3: Create a Broadcasting Channel**

1. **Define the Channel**

   In `routes/channels.php`, define the broadcasting channel:

   ```php
   Broadcast::channel('chat', function () {
       return true; // For simplicity, allow everyone to join the 'chat' channel
   });
   ```

**Step 4: Broadcast the Event**

1. **Trigger the Event**

   In your controller where a new message is sent, dispatch the `NewMessage` event:

   ```php
   event(new NewMessage($message));
   ```

**Step 5: Listen to the Event in JavaScript**

1. **Set Up Laravel Echo**

   In your JavaScript file, set up Laravel Echo to listen for the event:

   ```javascript
   import Echo from 'laravel-echo'

   window.Echo = new Echo({
       broadcaster: 'pusher',
       key: 'your-app-key',
       cluster: 'your-app-cluster',
       encrypted: true,
   });
   ```

2. **Listen for the Event**

   Now, listen for the `NewMessage` event and handle incoming messages in your JavaScript code:

   ```javascript
   window.Echo.channel('chat')
       .listen('NewMessage', (e) => {
           // Handle the new message here
           console.log('New Message:', e.message);
           // Display the message in your chat interface
           // Example: append the message to the chat window
       });
   ```

**Step 6: Display Real-Time Messages**

1. **Display Messages in Your Chat Interface**

   Update your chat interface to display messages in real-time as they arrive, using the JavaScript code you set up in the previous step.

That's it! With these steps, you've created a real-time chat feature in your Laravel application using broadcasting. When a user sends a message, it's broadcasted to the 'chat' channel, and all connected clients receive the message in real-time, providing a real-time chat experience in your application.

This example should help you integrate broadcasting into your professional project for real-time features like chat, notifications, or live updates.

### **BRAODCASTING**
---
Certainly! Here's a more detailed and comprehensive example of setting up broadcasting in a Laravel application for a real-time chat feature.

**Step 1: Install Laravel Echo and Configure WebSocket Server**

1. **Install Laravel Echo and Pusher**

   Run the following command to install Laravel Echo and Pusher:

   ```bash
   npm install laravel-echo pusher-js
   ```

2. **Set Up Pusher**

   Sign up for a Pusher account (https://pusher.com/), create a new app, and get your app credentials.

   Update your `.env` file with your Pusher credentials:

   ```
   BROADCAST_DRIVER=pusher
   PUSHER_APP_ID=your-app-id
   PUSHER_APP_KEY=your-app-key
   PUSHER_APP_SECRET=your-app-secret
   PUSHER_APP_CLUSTER=your-app-cluster
   ```

**Step 2: Create a Chat Event**

1. **Generate the Event**

   Run the following command to generate a chat event:

   ```bash
   php artisan make:event NewMessage
   ```

2. **Edit the Event Class**

   In `app/Events/NewMessage.php`, define the event class like this:

   ```php
   use Illuminate\Broadcasting\InteractsWithSockets;
   use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
   use Illuminate\Foundation\Events\Dispatchable;
   use Illuminate\Queue\SerializesModels;

   class NewMessage implements ShouldBroadcast
   {
       use Dispatchable, InteractsWithSockets, SerializesModels;

       public $message;

       public function __construct($message)
       {
           $this->message = $message;
       }

       public function broadcastOn()
       {
           return new Channel('chat');
       }
   }
   ```

**Step 3: Create a Broadcasting Channel**

1. **Define the Channel**

   In `routes/channels.php`, define the broadcasting channel:

   ```php
   Broadcast::channel('chat', function () {
       return true; // For simplicity, allow everyone to join the 'chat' channel
   });
   ```

**Step 4: Broadcast the Event**

1. **Trigger the Event**

   In your controller where a new message is sent, dispatch the `NewMessage` event:

   ```php
   event(new NewMessage($message));
   ```

**Step 5: Listen to the Event in JavaScript**

1. **Set Up Laravel Echo**

   In your JavaScript file, set up Laravel Echo to listen for the event:

   ```javascript
   import Echo from 'laravel-echo'

   window.Echo = new Echo({
       broadcaster: 'pusher',
       key: 'your-app-key',
       cluster: 'your-app-cluster',
       encrypted: true,
   });
   ```

2. **Listen for the Event**

   Now, listen for the `NewMessage` event and handle incoming messages in your JavaScript code:

   ```javascript
   window.Echo.channel('chat')
       .listen('NewMessage', (e) => {
           // Handle the new message here
           console.log('New Message:', e.message);
           // Display the message in your chat interface
           // Example: append the message to the chat window
       });
   ```

**Step 6: Display Real-Time Messages**

1. **Display Messages in Your Chat Interface**

   Update your chat interface to display messages in real-time as they arrive, using the JavaScript code you set up in the previous step.

That's it! With these steps, you've created a real-time chat feature in your Laravel application using broadcasting. When a user sends a message, it's broadcasted to the 'chat' channel, and all connected clients receive the message in real-time, providing a real-time chat experience in your application.

This example should help you integrate broadcasting into your professional project for real-time features like chat, notifications, or live updates.

## **CACHING IN LARAVEL APP**
---
Certainly! Let's explore Laravel Caching with a simple example and easy-to-understand explanations for beginners.

**Laravel Caching in Simple Terms:**

- **What is Caching?**

  Caching in Laravel is a technique used to store and retrieve frequently accessed data from a fast, temporary storage space (the cache) to improve application performance. It helps reduce the load on your database and speeds up responses.

- **Why Use Caching?**

  Caching is beneficial when you have data that doesn't change frequently but is frequently requested by users. It saves time and resources by serving the data quickly from the cache instead of recalculating or fetching it from the database every time.

**Scenario: Caching Frequently Accessed Blog Posts**

Let's create a simplified example where we cache frequently accessed blog posts to improve the performance of a blog website.

**Step 1: Set Up Caching Configuration**

1. **Configure Cache Driver**

   Open your `.env` file and set the `CACHE_DRIVER` to your desired caching driver (e.g., `file`, `redis`, `memcached`, etc.):

   ```
   CACHE_DRIVER=file
   ```

   For simplicity, we'll use the `file` driver, which stores cached data in the file system.

**Step 2: Cache Frequently Accessed Data**

1. **What is it?**

   In our case, we want to cache frequently accessed blog posts.

2. **How to Do It?**

   In your controller method where you retrieve blog posts, you can use Laravel's caching functionality:

   ```php
   public function getBlogPosts()
   {
       $key = 'blog_posts';
       $minutes = 30; // Cache for 30 minutes

       // Attempt to retrieve blog posts from the cache
       $posts = Cache::remember($key, $minutes, function () {
           return BlogPost::all(); // Fetch from the database if not in cache
       });

       return view('blog.posts', ['posts' => $posts]);
   }
   ```

   Here, we're using the `Cache::remember` method to check if the 'blog_posts' data is in the cache. If it's not found or has expired, it will fetch the data from the database, cache it for 30 minutes, and then return it.

**Step 3: Clear the Cache**

1. **What is it?**

   Occasionally, you may need to clear the cache when data is updated.

2. **How to Do It?**

   To clear the cache for the 'blog_posts' key, you can use:

   ```php
   Cache::forget('blog_posts'); // Remove the 'blog_posts' cache
   ```

**Summary:**

In this example, we've demonstrated how to use caching in Laravel to improve the performance of a blog website. We cache frequently accessed blog posts, and if the data is not in the cache or has expired, we fetch it from the database and store it in the cache for 30 minutes. This reduces database queries and speeds up the website's response time, making it more efficient for users.

Caching is a valuable tool for optimizing your Laravel application's performance by storing and retrieving data efficiently. It's particularly useful for frequently accessed or slow-to-fetch data.

## **COLLECTIONS IN LARAVEL**
---
Certainly! Let's explore Laravel Collections with a simple example and easy-to-understand explanations for beginners.

**Laravel Collections in Simple Terms:**

- **What are Collections?**

  Collections in Laravel are a powerful way to work with arrays or sets of data. They provide a wide range of methods for filtering, transforming, and manipulating data in a clean and concise way.

  In summary:

- Eloquent and the Query Builder are used for database operations like updating, storing, deleting, and retrieving data from the database. These operations directly interact with the database.

- Laravel Collections are used for  in-memory data manipulation, such as filtering, transforming, and working with arrays or collections of data that are already in your application's memory. They are not directly involved in the interaction with the database.Collections are used for making it easier to work with arrays and collections of data after you have retrieved the data from the database using Eloquent or the Query Builder.

So, when you want to work with data from a database table, you start with database models and database query methods, and you can then use Collections to further manipulate the retrieved data in memory.

```php
// Retrieve all products using Eloquent
$products = Product::all();

// Now, you can convert the Eloquent collection to a Laravel Collection
$productCollection = $products->toBase();

// Use Collection methods for data manipulation
$filteredProducts = $productCollection->filter(function ($product) {
    return $product->price > 50; // Filter products with a price greater than 50
});

// Transform the data, for example, by extracting the product names
$productNames = $filteredProducts->pluck('name');

// $productNames now contains the names of filtered products as a collection
```

- **Why Use Collections?**

  Collections make it easier to perform common data operations, like filtering items, mapping values, and reducing arrays, without the need for complex loops or custom functions. They can help simplify code and improve readability.

**Scenario: Processing Orders in an E-commerce Application**

1. **`map`**: Transforms each item in the collection using a callback function and returns a new collection with the modified items.

   ```php
   $doubledPrices = $prices->map(function ($price) {
       return $price * 2;
   });
   ```

2. **`filter`**: Filters the collection based on a callback function and returns a new collection containing only the items that pass the filter.

   ```php
   $expensiveItems = $items->filter(function ($item) {
       return $item['price'] > 100;
   });
   ```

3. **`reduce`**: Reduces the collection to a single value using a callback function.

   ```php
   $total = $numbers->reduce(function ($carry, $number) {
       return $carry + $number;
   }, 0); // 0 is the initial value
   ```

4. **`take`**: Returns a new collection with a specified number of items from the beginning of the original collection.

   ```php
   $firstThree = $collection->take(3);
   ```

5. **`skip`**: Returns a new collection with a specified number of items skipped from the beginning of the original collection.

   ```php
   $skippedItems = $collection->skip(2);
   ```

6. **`first` and `last`**: Retrieve the first or last item from the collection.

   ```php
   $firstItem = $collection->first();
   $lastItem = $collection->last();
   ```

7. **`count`**: Get the count of items in the collection.

   ```php
   $count = $collection->count();
   ```

8. **`isEmpty` and `isNotEmpty`**: Check if the collection is empty or not.

   ```php
   if ($collection->isEmpty()) {
       // Collection is empty
   }

   if ($collection->isNotEmpty()) {
       // Collection is not empty
   }
   ```

9. **`all`**: Convert the collection to a plain array.

   ```php
   $array = $collection->all();
   ```

10. **`implode`**: Concatenate the values of a given key as a string.

    ```php
    $names = $collection->pluck('name')->implode(', ');
    ```

These are some of the commonly used methods in Laravel Collections. They allow you to perform various operations on your data with ease and efficiency.

### **Collection Methods (Important)**
---
Certainly! Here are some of the important Laravel Collection methods along with examples and short definitions:

1. **`all`**: Get all the items from the collection.

   ```php
   $allItems = $collection->all();
   ```

2. **`avg`**: Calculate the average value of a given key in the collection.

   ```php
   $average = $collection->avg('score');
   ```

3. **`chunk`**: Split the collection into smaller chunks.

   ```php
   $chunks = $collection->chunk(3); // Split into chunks of 3 items each
   ```

4. **`collapse`**: Collapse a multi-dimensional collection into a single level.

   ```php
   $collapsed = $multiDimensional->collapse();
   ```

5. **`contains`**: Check if the collection contains a specific item.

   ```php
   $contains = $collection->contains('name', 'John');
   ```

6. **`count`**: Get the count of items in the collection.

   ```php
   $count = $collection->count();
   ```

7. **`each`**: Iterate over the collection and apply a callback function to each item.

   ```php
   $collection->each(function ($item) {
       // Do something with each item
   });
   ```

8. **`filter`**: Filter the collection based on a callback function.

   ```php
   $filtered = $collection->filter(function ($item) {
       return $item['age'] > 18;
   });
   ```

9. **`first`**: Get the first item from the collection.

   ```php
   $firstItem = $collection->first();
   ```

10. **`implode`**: Concatenate the values of a given key as a string.

    ```php
    $names = $collection->pluck('name')->implode(', ');
    ```

11. **`intersect`**: Get the items that are present in both the collection and another collection or array.

    ```php
    $intersection = $collection->intersect($otherCollection);
    ```

12. **`isEmpty`**: Check if the collection is empty.

    ```php
    if ($collection->isEmpty()) {
        // Collection is empty
    }
    ```

13. **`join`**: Join the items in the collection using a delimiter.

    ```php
    $csv = $collection->pluck('name')->join(', ');
    ```

14. **`map`**: Transform each item in the collection using a callback function.

    ```php
    $doubled = $collection->map(function ($item) {
        return $item * 2;
    });
    ```

15. **`max`**: Get the maximum value of a given key in the collection.

    ```php
    $maxValue = $collection->max('price');
    ```

16. **`merge`**: Merge the collection with another collection or array.

    ```php
    $merged = $collection->merge($otherCollection);
    ```

17. **`pluck`**: Extract a single column's value from the collection.

    ```php
    $names = $collection->pluck('name');
    ```

18. **`random`**: Get a random item(s) from the collection.

    ```php
    $randomItem = $collection->random();
    ```

19. **`reduce`**: Reduce the collection to a single value using a callback function.

    ```php
    $total = $collection->reduce(function ($carry, $item) {
        return $carry + $item['price'];
    }, 0);
    ```

20. **`reverse`**: Reverse the order of items in the collection.

    ```php
    $reversed = $collection->reverse();
    ```


21. **`chunkWhile`**: Split the collection into chunks using a custom callback function.

    ```php
    $chunks = $collection->chunkWhile(function ($item, $key) {
        return $item['status'] === 'active';
    });
    ```

22. **`collect`**: Create a new collection instance from an array or other iterable.

    ```php
    $newCollection = collect([1, 2, 3, 4]);
    ```

23. **`concat`**: Concatenate another collection or array onto the end of the current collection.

    ```php
    $combined = $collection->concat($otherCollection);
    ```

24. **`containsStrict`**: Check if the collection contains an item with a specific key and value, using strict comparison.

    ```php
    $contains = $collection->containsStrict('name', 'John');
    ```

25. **`countBy`**: Count the occurrences of values in the collection and return a new collection.

    ```php
    $counted = $collection->countBy('status');
    ```

26. **`crossJoin`**: Get the cross join of two or more arrays or collections.

    ```php
    $crossJoined = $collection->crossJoin($otherCollection);
    ```

27. **`duplicates`**: Get the items in the collection that have duplicates.

    ```php
    $duplicateItems = $collection->duplicates();
    ```

28. **`duplicatesStrict`**: Get the items in the collection that have duplicates using strict comparison.

    ```php
    $duplicateItems = $collection->duplicatesStrict();
    ```

29. **`every`**: Check if all items in the collection pass a given truth test.

    ```php
    $allPass = $collection->every(function ($item) {
        return $item['age'] >= 18;
    });
    ```

30. **`except`**: Get all items in the collection except for those with the specified keys.

    ```php
    $filtered = $collection->except(['key1', 'key2']);
    ```

31. **`firstOrFail`**: Get the first item in the collection or throw an exception if it's empty.

    ```php
    $firstItem = $collection->firstOrFail();
    ```

32. **`groupBy`**: Group the collection's items by a given key.

    ```php
    $grouped = $collection->groupBy('category');
    ```

33. **`has`**: Check if the collection has an item with a specific key.

    ```php
    $hasKey = $collection->has('name');
    ```

34. **`intersectAssoc`**: Get the items that are present in both the collection and another collection using a strict comparison.

    ```php
    $intersection = $collection->intersectAssoc($otherCollection);
    ```

35. **`intersectByKeys`**: Get the items that have matching keys in both the collection and another collection.

    ```php
    $intersection = $collection->intersectByKeys($otherCollection);
    ```

36. **`isNotEmpty`**: Check if the collection is not empty.

   ```php
   if ($collection->isNotEmpty()) {
       // Collection is not empty
   }
   ```

37. **`join`**: Join the items in the collection using a delimiter.

   ```php
   $csv = $collection->join(', ');
   ```

38. **`keys`**: Get all the keys from the collection.

   ```php
   $keys = $collection->keys();
   ```

39. **`last`**: Get the last item from the collection.

   ```php
   $lastItem = $collection->last();
   ```

40. **`map`**: Transform each item in the collection using a callback function.

   ```php
   $doubled = $collection->map(function ($item) {
       return $item * 2;
   });
   ```

41. **`merge`**: Merge the collection with another collection or array.

   ```php
   $merged = $collection->merge($otherCollection);
   ```

42. **`pluck`**: Extract a single column's value from the collection.

   ```php
   $names = $collection->pluck('name');
   ```

43. **`random`**: Get a random item(s) from the collection.

   ```php
   $randomItem = $collection->random();
   ```

44. **`reduce`**: Reduce the collection to a single value using a callback function.

   ```php
   $total = $collection->reduce(function ($carry, $item) {
       return $carry + $item['price'];
   }, 0);
   ```

45. **`reject`**: Remove items from the collection that do not pass a given truth test.

   ```php
   $rejected = $collection->reject(function ($item) {
       return $item['status'] === 'inactive';
   });
   ```

46. **`replace`**: Replace items in the collection with another array or collection based on a key.

   ```php
   $replaced = $collection->replace(['key1' => 'value1', 'key2' => 'value2']);
   ```

47. **`reverse`**: Reverse the order of items in the collection.

   ```php
   $reversed = $collection->reverse();
   ```

48. **`shuffle`**: Shuffle the items in the collection randomly.

   ```php
   $shuffled = $collection->shuffle();
   ```

49. **`skip`**: Skip a specified number of items from the beginning of the collection.

   ```php
   $skipped = $collection->skip(2);
   ```

50. **`slice`**: Get a portion of the collection starting from a given index.

   ```php
   $sliced = $collection->slice(2);
   ```

    #### **collection and DB Query Builders / Model Objects**
    ---
    1. **Collections**:
   - When used with collections, these methods operate on in-memory data structures, such as arrays or Laravel collections. They are used for manipulating data that has already been retrieved from a database or generated in your application.

2. **DB Query Builders / Model Objects**:
   - When used with database query builders or model objects, these methods are used to interact with the database and retrieve or manipulate data from database tables.

Here's a brief overview of some methods are used in both contexts:

**Collections**:

- `all()`: Returns all items in the collection as an array.
- `get()`: Returns all items in the collection as a new collection instance.
- `pluck($column)`: Retrieves a specific column's value from each item in the collection and returns it as a new collection.
- `max()`: Finds the maximum value in the collection.
- `min()`: Finds the minimum value in the collection.
- `sum()`: Calculates the sum of values in the collection.
- `avg()`: Calculates the average of values in the collection.
- `isEmpty()`: Checks if the collection is empty.
- `isNotEmpty()`: Checks if the collection is not empty.
- `count()`: Counts the number of items in the collection.
- `skip()`: Skips a specified number of items in the collection.
- `take()`: Retrieves a specified number of items from the collection, starting from the current position.
- `first()`: Retrieves the first item in the collection.

**Database Query Builders / Model Objects**:
- `all()`: Retrieves all records from a database table that match the query criteria.
- `get()`: Retrieves query results from the database. Typically used to retrieve multiple records.
- `pluck($column)`: Retrieves a specific column's value from the database table for each matching record.
- `max()`: Finds the maximum value in a specific column of the database table based on the query.
- `min()`: Finds the minimum value in a specific column of the database table based on the query.
- `sum()`: Calculates the sum of values in a specific column of the database table based on the query.
- `avg()`: Calculates the average of values in a specific column of the database table based on the query.
- `isEmpty()`: Checks if the query results are empty (no records match the query).
- `isNotEmpty()`: Checks if the query results are not empty (at least one record matches the query).
- `count()`: Retrieves the count of rows in the database table that match the query criteria.
- `skip()`: Skips a specified number of rows in the query results. Useful for implementing pagination in database queries.
- `take()`: Limits the number of rows to retrieve from the database table.
- `first()`: Retrieves the first row from the query results.

**Note** When these methods are used with database query builders or model objects, they perform database operations and return results based on the database data. In contrast, when used with collections, they manipulate data that has already been loaded into memory.

### **CONTACTS IN LARAVEL**
---
Sure, let's start with some easy-to-understand definitions and code examples of Laravel contracts for beginner students. Laravel contracts are a set of interfaces that define the methods you should implement when working with various services provided by Laravel. These contracts help ensure consistency and make it easier to switch out different implementations.

1. **File Storage Contract**

   Laravel provides a contract for interacting with file storage systems. The most common implementation is with the local file system.

   **Definition:**

   The `Storage` contract defines methods for interacting with file storage:

   ```php
   interface Storage
   {
       public function put($path, $contents);
       public function get($path);
       public function delete($path);
   }
   ```

   **Example:**

   ```php
   use Illuminate\Support\Facades\Storage;

   // Storing a file
   Storage::put('file.txt', 'Hello, world!');

   // Retrieving a file
   $contents = Storage::get('file.txt');

   // Deleting a file
   Storage::delete('file.txt');
   ```

2. **Mail Driver Contract**

   Laravel's mail system allows you to send email through different drivers, such as SMTP or SendMail. The contract ensures consistency in sending mail.

   **Definition:**

   The `Mailer` contract defines methods for sending emails:

   ```php
   interface Mailer
   {
       public function to($address, $name = null);
       public function subject($subject);
       public function send($view, array $data, $callback);
   }
   ```

   **Example:**

   ```php
   use Illuminate\Support\Facades\Mail;

   Mail::to('recipient@example.com')->subject('Hello')->send('emails.welcome', ['user' => $user], function ($message) {
       $message->from('sender@example.com', 'Sender Name');
   });
   ```

3. **Cache Store Contract**

   Laravel's caching system allows you to store and retrieve data efficiently. The contract defines methods for caching data.

   **Definition:**

   The `Cache` contract defines methods for caching and retrieving data:

   ```php
   interface Cache
   {
       public function put($key, $value, $minutes);
       public function get($key, $default = null);
       public function forget($key);
   }
   ```

   **Example:**

   ```php
   use Illuminate\Support\Facades\Cache;

   // Storing data in cache
   Cache::put('user:1', $userData, 60);

   // Retrieving data from cache
   $userData = Cache::get('user:1');

   // Removing data from cache
   Cache::forget('user:1');
   ```

These are some basic Laravel contracts with simple explanations and code examples for beginner students. Contracts help maintain a structured approach to working with various services in Laravel, making it easier to understand and implement functionality consistently.

#### **Custom Laravel Contract**
---
Creating custom contracts in Laravel is a useful practice when you need to define your own interfaces for services that are specific to your application. This can help you maintain a consistent API for your custom services. Here's a step-by-step guide on how to create a custom contract for professionals:

1. **Create a Contract Interface:**

   Start by creating a new contract interface. Contracts are typically placed in the `app/Contracts` directory of your Laravel project.

   ```php
   // app/Contracts/ProfessionalContract.php

   namespace App\Contracts;

   interface ProfessionalContract
   {
       public function getSkills();
       public function getExperience();
       public function doWork();
   }
   ```

   In this example, we've defined a `ProfessionalContract` with three methods: `getSkills()`, `getExperience()`, and `doWork()`. You can customize these methods to suit the needs of your professional-related functionality.

2. **Implement the Contract:**

   Next, create a class that implements the contract. This class will provide concrete implementations for the methods defined in the contract.

   ```php
   // app/Professionals/Developer.php

   namespace App\Professionals;

   use App\Contracts\ProfessionalContract;

   class Developer implements ProfessionalContract
   {
       public function getSkills()
       {
           return ['PHP', 'JavaScript', 'React'];
       }

       public function getExperience()
       {
           return '5 years';
       }

       public function doWork()
       {
           return 'Develop web applications.';
       }
   }
   ```

   In this example, we've created a `Developer` class that implements the `ProfessionalContract` interface. It provides specific implementations for the methods.

3. **Bind the Implementation in the Service Provider:**

   To use this custom contract and implementation, you need to bind it in a service provider. Open `app/Providers/AppServiceProvider.php` and add the binding to the `register` method:

   ```php
   // app/Providers/AppServiceProvider.php

   use App\Contracts\ProfessionalContract;
   use App\Professionals\Developer;

   public function register()
   {
       $this->app->bind(ProfessionalContract::class, Developer::class);
   }
   ```

   This tells Laravel to use the `Developer` class whenever an instance of `ProfessionalContract` is requested.

4. **Using the Custom Contract:**

   Now you can use your custom contract and implementation throughout your application:

   ```php
   use App\Contracts\ProfessionalContract;

   public function showProfessionalInfo(ProfessionalContract $professional)
   {
       $skills = $professional->getSkills();
       $experience = $professional->getExperience();
       $workDescription = $professional->doWork();

       // Use the professional's information as needed
   }
   ```

   You can inject the `ProfessionalContract` into your controllers, services, or other classes to access the professional's methods.

By following these steps, you've created a custom contract for professionals and provided an implementation. This approach allows you to define a consistent API for various types of professionals in your application and switch implementations if needed.

### Laravel **File Storage** and all functionalities of file storage
---

**Laravel File Storage in Simple Terms:**

Laravel's file storage system provides a way to manage and store files in your web application. It abstracts the underlying file system, making it easy to interact with files and directories. You can use it to store user-uploaded images, documents, and other files.

**Scenario: User Profile Images for a Social Media App**

Imagine you're building a social media application, and users can upload profile pictures. We'll use Laravel's file storage to handle these user profile images.

**Step 1: Configure File System Disk**

1. **What is it?**

   Laravel allows you to configure multiple "disk" connections, which represent different storage locations. In this example, we'll use the "public" disk, which typically maps to the `public` directory.

2. **How to Configure It?**

   Open `config/filesystems.php` and configure the "public" disk:

   ```php
   'public' => [
       'driver' => 'local',
       'root' => public_path('uploads'), // Store files in the "public/uploads" directory
       'url' => env('APP_URL').'/uploads',
   ],
   ```

   This configures the "public" disk to store files in the `public/uploads` directory and provides a URL to access them.

**Step 2: Create a Form for Uploading Profile Pictures**

1. **What is it?**

   You need a way for users to upload their profile pictures.

2. **How to Create It?**

   In your Blade view or HTML form, create an input field for file uploads:

   ```html
   <form action="/upload-profile" method="POST" enctype="multipart/form-data">
       @csrf
       <input type="file" name="profile_picture">
       <button type="submit">Upload Profile Picture</button>
   </form>
   ```

   Make sure to include the `enctype="multipart/form-data"` attribute for file uploads.

**Step 3: Handle File Upload in a Controller**

1. **What is it?**

   You need to handle the uploaded file and store it using Laravel's file storage.

2. **How to Do It?**

   In your controller, handle the file upload and store it:

   ```php
   public function uploadProfile(Request $request)
   {
       $uploadedFile = $request->file('profile_picture');

       if ($uploadedFile) {
           $path = $uploadedFile->store('profile_pictures', 'public'); // Store the file in the "public/profile_pictures" directory
           // Update the user's profile picture path in the database
           auth()->user()->update(['profile_picture' => $path]);
       }

       return redirect()->back()->with('success', 'Profile picture uploaded successfully');
   }
   ```

   This code checks if a file was uploaded, stores it in the `public/profile_pictures` directory, and updates the user's profile picture path in the database.

**Step 4: Display the User's Profile Picture**

1. **What is it?**

   You need to display the user's profile picture on their profile page.

2. **How to Do It?**

   In your view, display the user's profile picture:

   ```html
   <img src="{{ asset(auth()->user()->profile_picture) }}" alt="Profile Picture">
   ```

   This code uses Laravel's `asset` function to generate the correct URL to the user's profile picture.

**Step 5: Delete Profile Pictures**

1. **What is it?**

   You should allow users to delete their profile pictures if needed.

2. **How to Do It?**

   In your controller, handle profile picture deletion:

   ```php
   public function deleteProfilePicture()
   {
       $user = auth()->user();

       if ($user->profile_picture) {
           Storage::disk('public')->delete($user->profile_picture);
           $user->update(['profile_picture' => null]);
       }

       return redirect()->back()->with('success', 'Profile picture deleted successfully');
   }
   ```

   This code deletes the user's profile picture from storage and updates the database to remove the path.

The previous example provides a solid foundation for understanding Laravel's file storage system and covers the most common use case of handling file uploads and storage. However, there are more advanced features and techniques related to file storage in Laravel that can be useful for developers. Here are some additional topics with code examples:

**1. File Validation:**

It's important to validate uploaded files to ensure they meet your application's requirements. Laravel provides built-in validation rules for file uploads. Here's an example of how to validate file uploads:

```php
$validatedData = $request->validate([
    'profile_picture' => 'required|image|max:2048', // Ensure it's an image and not larger than 2MB
]);
```

**2. File Downloads and copy and move:**

You may need to allow users to download files from your application. Here's how you can return a file download response in a controller:

```php
class DownloadController extends Controller
{
    public function downloadFile($filename)
    {
        // Get the file path based on the provided filename
        $filePath = storage_path('app/public/' . $filename);

        // Check if the file exists
        if (!Storage::disk('public')->exists($filename)) {
            return abort(404); // File not found
        }

        // Determine the MIME type of the file
        $mimeType = mime_content_type($filePath);

  // Download the file with a custom name
        return Storage::disk('public')->download($filePath, $filename, ['Content-Type' => $mimeType]);

        // Copy the file to the destination
        Storage::disk('public')->copy($sourcePath, $destinationPath);

        // Set custom file names for download (optional)
        $customFilename = 'downloaded_file.' . pathinfo($filePath, PATHINFO_EXTENSION);

        // Prepare the response with appropriate headers
        $response = new Response(file_get_contents($filePath), 200);

        // Set the appropriate headers for file download
        $response->header('Content-Type', $mimeType);
        $response->header('Content-Disposition', 'attachment; filename="' . $customFilename . '"');

        return $response;
    }

    public function showDownloadPage()
    {
        return view('download');
    }


}

# Blade File
 <a href="{{ route('download.file', ['filename' => 'example.pdf']) }}" class="btn btn-primary">Download File</a>

# Route Files
Route::get('/download', [DownloadController::class, 'showDownloadPage'])->name('download.page');
Route::get('/download/{filename}', [DownloadController::class, 'downloadFile'])->name('download.file');
```

**3. Custom File Storage Disks:**

You can create custom file storage disks for different use cases. For example, if you want to store files on an Amazon S3 bucket, you can configure a custom disk like this:

```php
AWS_ACCESS_KEY_ID=your-access-key-id
AWS_SECRET_ACCESS_KEY=your-secret-access-key
AWS_DEFAULT_REGION=your-aws-region
AWS_BUCKET=your-s3-bucket-name

's3' => [
    'driver' => 's3',
    'key' => env('AWS_ACCESS_KEY_ID'),
    'secret' => env('AWS_SECRET_ACCESS_KEY'),
    'region' => env('AWS_DEFAULT_REGION'),
    'bucket' => env('AWS_BUCKET'),
],
```
So, to clarify:

1. The S3 disk configuration is defined in `config/filesystems.php`.

2. The S3 bucket and the files within it are stored remotely on AWS S3 servers, not within your Laravel application's directory structure.

3. Laravel uses the S3 disk configuration to access and manage files in the specified S3 bucket via API calls to the AWS S3 service.
Then, you can use this custom disk in your code:

```php
Storage::disk('custom-s3')->put('file.txt', 'File contents');
```

**4. File Deletion and Cleanup:**

You might need to periodically delete or clean up files based on certain conditions. For example, you can delete old log files or temporary files. Here's an example of deleting files older than a specific date:

```php
$expirationDate = now()->subDays(7); // Delete files older than 7 days
$filesToDelete = Storage::disk('public')->files('temporary');

foreach ($filesToDelete as $file) {
    $fileModificationDate = Storage::disk('public')->lastModified($file);
    if ($fileModificationDate < $expirationDate) {
        Storage::disk('public')->delete($file);
    }
}
```

Certainly! Here are a few more advanced file storage scenarios in Laravel with code examples:

**5. File Uploads with Unique Filenames:**

Sometimes, you might want to ensure that uploaded files have unique filenames to avoid overwriting existing files. You can achieve this by generating a unique filename before storing the file. Here's an example:

```php
$uploadedFile = $request->file('file');
$originalFilename = $uploadedFile->getClientOriginalName();
$extension = $uploadedFile->getClientOriginalExtension();
$uniqueFilename = md5(uniqid()) . '.' . $extension;

$uploadedFile->storeAs('uploads', $uniqueFilename, 'public');
```

This code generates a unique filename based on the original filename and stores the file with the new name.

**6. File Permissions:**

You may need to set specific permissions for files or directories in storage. For example, you might want to make uploaded files readable by the public. Here's how to set file permissions:

```php
Storage::disk('public')->setVisibility('uploads/file.txt', 'public');
```

This code sets the visibility of the file to "public," making it readable by anyone.

**7. File Versioning:**

In some cases, you may want to implement file versioning to keep track of changes to files. Here's a simple example of how to create file versions:

```php
$originalFile = 'path/to/original.txt';
$versionedFile = 'path/to/versions/' . time() . '_version.txt';

Storage::copy($originalFile, $versionedFile);
```

This code copies the original file to a new location with a timestamp in the filename, creating a versioned copy.

**8. File Streaming:**

Laravel allows you to stream large files instead of loading them entirely into memory. This is useful for serving large downloads efficiently. Here's how to stream a file as a response:

```php
public function streamFile($filename)
{
    $path = storage_path('app/public/' . $filename); // Adjust the path as needed

    return response()->stream(function () use ($path) {
        $stream = fopen($path, 'rb');
        fpassthru($stream);
        fclose($stream);
    }, 200, [
        'Content-Type' => 'application/octet-stream',
        'Content-Disposition' => 'attachment; filename="' . basename($path) . '"',
    ]);
}
```

**9. Storing a File from a Resource:**

```php
use Illuminate\Support\Facades\Storage;

$contents = 'This is the content of the file.';
 // Or
$resource = fopen('path/to/your/local/file.jpg', 'r');

// Store the file from the resource in the 'public' disk
Storage::disk('public')->put('file.jpg', $resource Or $contents);

fclose($resource);

return 'File has been successfully stored.';
```

This code streams the file directly to the client's browser, which is more memory-efficient for large files.

### **HELPERS**
---

- **What are Laravel Helpers?**

  Laravel Helpers are a set of utility functions provided by Laravel that simplify common tasks in web development. These functions can be used throughout your Laravel application to perform various tasks quickly and efficiently.

Certainly! Here are the Laravel Helpers for arrays and objects with short definitions and code examples:

**Working with Arrays (Arr Helpers)**:

1. `Arr::get`:
   - Definition: Gets a value from an array or returns a default if not found.
   - Example:
     ```php
     $value = Arr::get($array, 'key', 'default');
     ```

2. `Arr::has`:
   - Definition: Checks if a key exists in an array.
   - Example:
     ```php
     $exists = Arr::has($array, 'key');
     ```

3. `Arr::only`:
   - Definition: Filters an array to only include specified keys.
   - Example:
     ```php
     $filteredArray = Arr::only($array, ['key1', 'key2']);
     ```

4. `Arr::except`:
   - Definition: Filters an array to exclude specified keys.
   - Example:
     ```php
     $filteredArray = Arr::except($array, ['key1', 'key2']);
     ```

5. `Arr::first`:
   - Definition: Gets the first item from an array.
   - Example:
     ```php
     $firstItem = Arr::first($array);
     ```

6. `Arr::last`:
   - Definition: Gets the last item from an array.
   - Example:
     ```php
     $lastItem = Arr::last($array);
     ```

7. `Arr::pluck`:
   - Definition: Extracts a list of values from an array of objects by key.
   - Example:
     ```php
     $values = Arr::pluck($array, 'key');
     ```

8. `Arr::shuffle`:
   - Definition: Shuffles the elements of an array randomly.
   - Example:
     ```php
     $shuffledArray = Arr::shuffle($array);
     ```

9. `Arr::sort`:
   - Definition: Sorts an array in ascending order.
   - Example:
     ```php
     $sortedArray = Arr::sort($array);
     ```

10. `Arr::sortDesc`:
    - Definition: Sorts an array in descending order.
    - Example:
      ```php
      $sortedArray = Arr::sortDesc($array);
      ```

1. `Arr::collapse`:
   - Definition: Collapses an array of arrays into a single array.
   - Example:
     ```php
     $collapsedArray = Arr::collapse($arrayOfArrays);
     ```

2. `Arr::dot`:
   - Definition: Flattens a multi-dimensional array into a single dot-notated array.
   - Example:
     ```php
     $flatArray = Arr::dot($multiDimensionalArray);
     ```

3. `Arr::exists`:
   - Definition: Checks if a key exists in a multi-dimensional array.
   - Example:
     ```php
     $exists = Arr::exists($multiDimensionalArray, 'key');
     ```

4. `Arr::isAssoc`:
   - Definition: Checks if an array is associative (has string keys) or not.
   - Example:
     ```php
     $isAssoc = Arr::isAssoc($array);
     ```

5. `Arr::join`:
   - Definition: Joins the values of an array into a single string.
   - Example:
     ```php
     $joinedString = Arr::join(', ', $array);
     ```

6. `Arr::set`:
   - Definition: Sets a value within a multi-dimensional array using dot notation.
   - Example:
     ```php
     Arr::set($array, 'key.subkey', 'value');
     ```

**Working with Objects (data Helpers)**:

11. `data_get`:
    - Definition: Gets a value from an object or returns a default if not found.
    - Example:
      ```php
      $value = data_get($object, 'property', 'default');
      ```

12. `data_set`:
    - Definition: Sets a value in an object.
    - Example:
      ```php
      data_set($object, 'property', $value);
      ```

13. `data_forget`:
    - Definition: Removes a property from an object.
    - Example:
      ```php
      data_forget($object, 'property');
      ```
7. `data_fill`:
   - Definition: Fills a property in an object with a value if it's empty.
   - Example:
     ```php
     data_fill($object, 'property', 'default');
     ```

**Paths Helpers**

1. `app_path()`:
   - Definition: Returns the path to the `app` directory.
   - Example:
     ```php
     $appPath = app_path();
     ```

2. `base_path()`:
   - Definition: Returns the base path of the Laravel application.
   - Example:
     ```php
     $basePath = base_path();
     ```

3. `config_path()`:
   - Definition: Returns the path to the `config` directory.
   - Example:
     ```php
     $configPath = config_path();
     ```

4. `database_path()`:
   - Definition: Returns the path to the `database` directory.
   - Example:
     ```php
     $databasePath = database_path();
     ```

5. `lang_path()`:
   - Definition: Returns the path to the `resources/lang` directory.
   - Example:
     ```php
     $langPath = lang_path();
     ```

6. `mix()`:
   - Definition: Generates a URL for a versioned Mix file.
   - Example:
     ```php
     $mixUrl = mix('css/app.css');
     ```

7. `public_path()`:
   - Definition: Returns the path to the `public` directory.
   - Example:
     ```php
     $publicPath = public_path();
     ```

8. `resource_path()`:
   - Definition: Returns the path to the `resources` directory.
   - Example:
     ```php
     $resourcePath = resource_path();
     ```

9. `storage_path()`:
   - Definition: Returns the path to the `storage` directory.
   - Example:
     ```php
     $storagePath = storage_path();
     ```

**URLs**

1. `url`:
   - **Definition:** Generates a fully qualified URL for a given path.
   - **Example:**
     ```php
     $fullUrl = url('/dashboard');
     // Result: http://example.com/dashboard
     ```

2. `route`:
   - **Definition:** Generates a URL for a named route.
   - **Example:**
     ```php
     $routeUrl = route('profile');
     // Result: http://example.com/profile
     ```

3. `to_route`:
   - **Definition:** Generates a URL for a named route.
   - **Example:**
     ```php
     $routeUrl = to_route('profile');
     // Result: http://example.com/profile
     ```

4. `asset`:
   - **Definition:** Generates a URL for an asset file (e.g., CSS, JavaScript).
   - **Example:**
     ```php
     $assetUrl = asset('css/styles.css');
     // Result: http://example.com/css/styles.css
     ```

5. `secure_url`:
   - **Definition:** Generates a fully qualified HTTPS URL for a given path.
   - **Example:**
     ```php
     $secureFullUrl = secure_url('/login');
     // Result: https://example.com/login
     ```

6. `secure_asset`:
   - **Definition:** Generates a HTTPS URL for an asset file.
   - **Example:**
     ```php
     $secureAssetUrl = secure_asset('js/app.js');
     // Result: https://example.com/js/app.js
     ```

7. `action`:
   - **Definition:** Generates a URL for a controller action.
   - **Example:**
     ```php
     $actionUrl = action('HomeController@index');
     // Result: http://example.com/home
     ```

### **MOST IMPORTANT HELPERS**
---
Certainly! Here are code view examples of some of the frequently used Laravel Helpers along with short explanations:

1. `app` Helper - Accessing the Application Container:
   ```php
   $mailer = app('mailer');
   ```

2. `auth` Helper - Checking Authentication:
   ```php
   if (auth()->check()) {
       // User is authenticated
   }
   ```

3. `config` Helper - Accessing Configuration Values:
   ```php
   $timezone = config('app.timezone');
   ```

4. `csrf_field` Helper - Generating CSRF Token Field in a Form:
   ```php
   <form method="POST" action="/submit">
       @csrf
       <!-- Rest of the form -->
   </form>
   ```

5. `env` Helper - Accessing Environment Variables:
   ```php
   $apiKey = env('API_KEY');
   ```

6. `event` Helper - Firing an Event:
   ```php
   event('user.registered', $user);
   ```

7. `redirect` Helper - Redirecting to a Different URL:
   ```php
   return redirect()->route('dashboard');
   ```

8. `request` Helper - Accessing Request Data:
   ```php
   $name = request('name');
   ```

9. `response` Helper - Creating an HTTP Response:
   ```php
   return response('Hello, World!', 200)
       ->header('Content-Type', 'text/plain');
   ```

10. `session` Helper - Storing Data in the Session:
    ```php
    session(['user_id' => 123]);
    ```

11. `view` Helper - Rendering a View Template:
    ```php
    return view('welcome', ['name' => 'John']);
    ```

1. `abort` Helper - Aborts the current request with an HTTP response.
   ```php
   abort(404, 'Page not found');
   ```

2. `back` Helper - Redirects the user to the previous URL.
   ```php
   return back();
   ```

3. `bcrypt` Helper - Hashes a password using the bcrypt algorithm.
   ```php
   $hashedPassword = bcrypt('password');
   ```

4. `blank` Helper - Checks if a variable is empty or considered "blank."
   ```php
   if (blank($value)) {
       // Variable is empty or blank
   }
   ```

5. `cache` Helper - Accesses the Laravel cache system.
   ```php
   $cachedData = cache('key');
   ```

6. `cookie` Helper - Gets or sets a cookie value.
   ```php
   $cookieValue = cookie('name', 'value', $minutes);
   ```

7. `dump` Helper - Dumps the contents of a variable or expression for debugging.
   ```php
   dump($variable);
   ```

8. `env` Helper - Retrieves values from the `.env` configuration file.
   ```php
   $apiKey = env('API_KEY');
   ```

9. `old` Helper - Retrieves old input data from a previous form submission.
   ```php
   $oldValue = old('input_name');
   ```

10. `redirect` Helper - Redirects the user to a different URL.
    ```php
    return redirect()->route('dashboard');
    ```

11. `session` Helper - Accesses or stores data in the session.
    ```php
    session(['user_id' => 123]);
    ```

12. `throw_if` Helper - Throws an exception if a condition is true.
    ```php
    throw_if($condition, Exception::class, 'Condition is true');
    ```

Certainly! Here are additional frequently used Laravel Helpers without any repeats:

1. `cookie` Helper - Gets or sets a cookie value.
   ```php
   $cookieValue = cookie('name', 'value', $minutes);
   ```

2. `csrf_token` Helper - Retrieves the CSRF token for use in forms.
   ```php
   $token = csrf_token();
   ```

3. `dd` Helper - Dumps the contents of a variable or expression and terminates the script for debugging.
   ```php
   dd($variable);
   ```

4. `dispatch` Helper - Dispatches a job to be processed by a queue worker.
   ```php
   dispatch(new ProcessTask($task));
   ```

5. `method_field` Helper - Generates an HTML hidden input field for specifying an HTTP method in a form.
   ```php
   @method('PUT')
   ```

6. `report` Helper - Reports an exception or error to the Laravel error handling system.
   ```php
   report($exception);
   ```

7. `response` Helper - Creates an HTTP response with a given content and status code.
   ```php
   return response('Hello, World!', 200);
   ```

8. `throw_unless` Helper - Throws an exception if a condition is false.
   ```php
   throw_unless($condition, Exception::class, 'Condition is false');
   ```

9. `today` Helper - Retrieves the current date as a Carbon instance.
   ```php
   $today = today();
   ```

10. `transform` Helper - Transforms an array or object using a callback.
    ```php
    $transformed = transform($data, function ($item) {
        return $item->toArray();
    });
    ```

11. `validator` Helper - Creates a new Validator instance for validating data.
    ```php
    $validator = validator($data, $rules);
    ```

12. `with` Helper - Passes data to a view.
    ```php
    return view('welcome')->with('name', 'John');
    ```
### **Custom Helpers:**
---

**Step 1: Create the Helper Function**

1. **What is it?**

   A helper function is a custom function that you can use throughout your Laravel application.

2. **How to Create It?**

   In your Laravel project, navigate to the `app` directory. Create a new PHP file in this directory and name it something like `CartHelper.php`. This file will contain your custom helper function.

3. **What's Inside?**

   In `CartHelper.php`, define your custom helper function:

   ```php
   <?php

   if (!function_exists('calculateTotalPrice')) {
       function calculateTotalPrice($items)
       {
           $total = 0;
           foreach ($items as $item) {
               $total += $item['price'] * $item['quantity'];
           }
           return $total;
       }
   }


function formatCurrency($amount, $currency = 'USD')
{
    return number_format($amount, 2) . ' ' . $currency;
}

function truncateString($string, $length = 100, $append = '...')
{
    if (strlen($string) > $length) {
        return substr($string, 0, $length) . $append;
    }
    return $string;
}


function generateRandomString($length = 10)
{
    return Str::random($length);
}


function formatDate($date, $format = 'Y-m-d H:i:s')
{
    return \Carbon\Carbon::parse($date)->format($format);
}

function generateSlug($string)
{
    // Convert the string to lowercase
    $slug = strtolower($string);

    // Replace spaces with hyphens
    $slug = str_replace(' ', '-', $slug);

    // Remove special characters
    $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);

    return $slug;
}

 ```

   This function, `calculateTotalPrice`, takes an array of items with prices and quantities and calculates the total price.

**Step 2: Autoload the Helper Function**

1. **What is it?**

   You need to tell Laravel to autoload your custom helper function.

2. **How to Do It?**

   In your `composer.json` file, find the `autoload` section and add an `"files"` section to autoload your helper file:

   ```json
   "autoload": {
       "files": [
         "app/CartHelper.php",
        "app/CustomHelper.php"
       ],
       // ...
   }
   ```
}

   After adding this, run the following command to update the autoloader:

   ```bash
   composer dump-autoload
   ```

**Step 3: Use the Helper Function**

1. **What is it?**

   You can now use your custom helper function in your Laravel application.

2. **How to Do It?**

   In a controller or view, you can call `calculateTotalPrice` like this:

   ```php
   $items = [
       ['name' => 'Product 1', 'price' => 10, 'quantity' => 2],
       ['name' => 'Product 2', 'price' => 15, 'quantity' => 1],
   ];

   $totalPrice = calculateTotalPrice($items);

   return view('cart', ['totalPrice' => $totalPrice]);

$title = "This is a Sample Title";
$slug = generateSlug($title);
// $slug now contains "this-is-a-sample-title"
```

   In this example, we calculate the total price of items in the shopping cart and pass it to the view.

**Summary:**

Creating a custom helper function in Laravel is a way to encapsulate commonly used code into reusable functions. In this example, we created a `CartHelper.php` file with a `calculateTotalPrice` function that calculates the total price of items in a shopping cart. We autoloaded the helper file in the `composer.json` file and then used the helper function in a controller to calculate and display the total price. This is a basic example to help beginner learners understand how to create and use custom helper functions in Laravel.




### **Laravel HTTP Clients & all types of Http**
---
Certainly! Let's explore Laravel HTTP Clients and the different HTTP methods with a beginner-friendly example.

**Laravel HTTP Clients in Simple Terms**:

- **What are HTTP Clients?**

  In Laravel, HTTP clients are a way to send HTTP requests to external APIs or web services. Think of them as messengers that allow your Laravel application to communicate with other websites or services on the internet.

- **Why Use Them?**

  You use HTTP clients to fetch data from other services, send data to them, or perform various operations over the internet. For example, you might use them to retrieve weather data, post user comments to a social media platform, or interact with payment gateways.

Now, let's look at a beginner-friendly example of using Laravel HTTP clients in a real-life scenario.

**Scenario: Fetching Weather Data from an API**

Imagine you're building a weather application, and you want to retrieve weather data from a weather API using Laravel's HTTP client.

**Step 1: Install Laravel HTTP Client**

1. **What is it?**

   Laravel's HTTP client is built-in and doesn't require a separate installation.

**Step 2: Create a Controller**

1. **What is it?**

   A controller handles web requests and responses.

2. **How to Create It?**

   In your terminal, run:

   ```bash
   php artisan make:controller WeatherController
   ```

   This generates a `WeatherController.php` file in the `app/Http/Controllers` directory.

3. **What's Inside?**

   In `WeatherController.php`, define a method to fetch weather data from the API:

   ```php
   use Illuminate\Http\Request;
   use Illuminate\Support\Facades\Http;

   class WeatherController extends Controller
   {
       public function getWeather(Request $request)
       {
           // Define the API endpoint and query parameters
           $endpoint = 'https://api.example.com/weather';
           $params = [
               'city' => $request->input('city'),
               'apikey' => 'your-api-key',
           ];

           // Make an HTTP GET request to the API
           $response = Http::get($endpoint, $params);

           // Check if the request was successful
           if ($response->successful()) {
               // Parse the JSON response
               $weatherData = $response->json();
               return view('weather', ['weatherData' => $weatherData]);
           } else {
               return view('error', ['message' => 'Unable to fetch weather data']);
           }
       }
   }
   ```

   In this code, we use Laravel's HTTP client (`Http::get`) to send a GET request to a weather API and handle the response.

**Step 3: Create Views**

1. **What is it?**

   Views are templates that display data to the user.

2. **How to Create Them?**

   Create two Blade views, `weather.blade.php` and `error.blade.php`, to display weather data or an error message.

   `weather.blade.php`:

   ```blade.php
   <!DOCTYPE html>
   <html>
   <head>
       <title>Weather Report</title>
   </head>
   <body>
       <h1>Weather Report</h1>
       <p>City: {{ $weatherData['city'] }}</p>
       <p>Temperature: {{ $weatherData['temperature'] }}°C</p>
   </body>
   </html>
   ```

   `error.blade.php`:

   ```blade.php
   <!DOCTYPE html>
   <html>
   <head>
       <title>Error</title>
   </head>
   <body>
       <h1>Error</h1>
       <p>{{ $message }}</p>
   </body>
   </html>
   ```

**Step 4: Define Routes**

1. **What is it?**

   Routes map URLs to controller methods.

2. **How to Do It?**

   In `routes/web.php`, define a route that points to the `getWeather` method in the `WeatherController`:

   ```php
   Route::get('/get-weather', 'WeatherController@getWeather');
   ```

**Step 5: Make a Request**

1. **What is it?**

   You make a request by accessing a URL.

2. **How to Do It?**

   You can now visit `/get-weather` in your browser and enter a city name. The controller will use Laravel's HTTP client to fetch weather data from the API and display it on the `weather.blade.php` view.


### **Localisation In Laravel**
---
Certainly! Let's walk through Laravel Localization step by step with a real-life example of a professional project.

**Scenario: Localizing a Blog Platform**

Imagine you're building a blog platform that you want to make available in both English and Spanish. Here's how you can implement Laravel Localization:

**Step 1: Publish Language Files**

1. **What is it?**

   Laravel provides language files that contain translations for various phrases in your application.

2. **How to Do It?**

   In your terminal, run:

   ```bash
   php artisan vendor:publish --tag=laravel-lang
   ```

   This command publishes Laravel's default language files to your `resources/lang` directory.

**Step 2: Configure the Locale**

1. **What is it?**

   The locale determines which language your application should use.

2. **How to Do It?**

   In `config/app.php`, set the `'locale'` to your desired default language, e.g., `'en'` for English:

   ```php
   'locale' => 'en',
   ```

**Step 3: Define Translation Strings**

1. **What is it?**

   Translation strings are the phrases you want to translate.

2. **How to Do It?**

   Open `resources/lang/en/messages.php` (or create a new one for Spanish, `resources/lang/es/messages.php`). Define translation strings like this:

   ```php
   return [
       'welcome' => 'Welcome to our Blog',
       'read_more' => 'Read More',
   ];
   ```

**Step 4: Use Translation Strings in Views**

1. **What is it?**

   You use translation strings in your views.

2. **How to Do It?**

   In your Blade view, use the `@lang` directive to display translated text:

   ```blade.php
   <h1>@lang('messages.welcome')</h1>
   <a href="/post/1">@lang('messages.read_more')</a>
   ```

   This displays "Welcome to our Blog" and "Read More" in the respective languages.

**Step 5: Use Translation Strings in Controllers**

1. **What is it?**

   You can retrieve translation strings programmatically in your controllers or PHP code.

2. **How to Do It?**

   In your controller or PHP code, use the `trans` function:

   ```php
   $welcomeMessage = trans('messages.welcome');
   $readMoreText = trans('messages.read_more');
   ```

**Step 6: Pluralization**

1. **What is it?**

   Pluralization is handling singular and plural forms.

2. **How to Do It?**

   Define translation strings with plural forms in `messages.php`:

   ```php
   'apple' => '{0} No apples|{1} :count apple|[2,*] :count apples',
   ```

   Use them with the `trans_choice` function:

   ```php
   $appleMessage = trans_choice('messages.apple', 0); // "No apples"
   $appleMessage = trans_choice('messages.apple', 1); // "1 apple"
   $appleMessage = trans_choice('messages.apple', 5); // "5 apples"
   ```

   This allows you to handle pluralization correctly.

**Step 7: Switching Locale Dynamically**

1. **What is it?**

   You may want users to switch between languages dynamically.

2. **How to Do It?**

   Create a language switcher in your view, and use a route to change the locale. For example:

   ```blade.php
   <a href="{{ route('setLocale', 'en') }}">English</a>
   <a href="{{ route('setLocale', 'es') }}">Español</a>
   ```

   In your routes, define a route to set the locale:

   ```php
   Route::get('setLocale/{locale}', 'LocalizationController@setLocale')->name('setLocale');
   ```

   Then, in your `LocalizationController`, set the locale:

   ```php
   public function setLocale($locale)
   {
       app()->setLocale($locale);
       return redirect()->back();
   }
   ```

   This allows users to switch between English and Spanish dynamically.

**Summary:**

Laravel Localization is essential for making your application accessible to users in different languages and regions. It allows you to define translation strings, use them in views and code, handle pluralization, and even switch between languages dynamically. This is crucial for creating a user-friendly, global web application.

### **Laravel Mail**
---

Certainly! Let's explore Laravel Mail step by step with easy explanations and a real-life example for beginners.

**Laravel Mail in Simple Terms**:

- **What is Mail in Laravel?**

  Laravel's Mail feature allows you to send email notifications from your application. It's like having a built-in email sender for your web application.

- **Why Use It?**

  You can use Laravel Mail to send various types of emails, including welcome emails, password reset links, order confirmations, and more. It's essential for keeping users informed and engaged.

Now, let's dive into the key aspects of Laravel Mail using a real-life example:

**Scenario: Sending a Welcome Email to New Users**

Imagine you're building a registration system for a blog platform, and you want to send a welcome email to new users when they sign up.

**Step 1: Configure the Sender**

1. **What is it?**

   You need to set up the sender's email address and name.

2. **How to Do It?**

   In `config/mail.php`, configure the sender details:

   ```php
   'from' => [
       'address' => 'noreply@example.com',
       'name' => 'Your App',
   ],
   ```

**Step 2: Configure the View**

1. **What is it?**

   You need to create an email template.

2. **How to Do It?**

   Create an email view file, e.g., `welcome.blade.php`, in the `resources/views/emails` directory. Design your email template.

   ```blade.php
   <p>Welcome to Our Blog Platform!</p>
   <p>Thank you for joining our community.</p>
   ```

**Step 3: View Data**

1. **What is it?**

   You can pass data to your email view.

2. **How to Do It?**

   In your controller, prepare the data you want to send to the view:

   ```php
   $data = [
       'username' => 'John',
   ];
   ```

**Step 4: Sending the Email**

1. **What is it?**

   You send the email using Laravel's `Mail` facade.

2. **How to Do It?**

   In your controller, use the `Mail` facade to send the email:

   ```php
   use Illuminate\Support\Facades\Mail;
   use App\Mail\WelcomeEmail;

   Mail::to('john@example.com')->send(new WelcomeEmail($data));
   ```

   Here, `WelcomeEmail` is a Mailable class we'll create next.

**Step 5: Create a Mailable Class**

1. **What is it?**

   A Mailable class defines how the email should be constructed.

2. **How to Do It?**

   Run this command to create a Mailable class:

   ```bash
   php artisan make:mail WelcomeEmail
   ```

   This generates a `WelcomeEmail.php` file in the `app/Mail` directory.

**Step 6: Configure the Mailable**

1. **What is it?**

   You define how the email should be built in the Mailable class.

2. **How to Do It?**

   In `WelcomeEmail.php`, configure the sender, subject, and attach the view data:

   ```php
   public function build()
   {
       return $this->from('noreply@example.com')
                   ->subject('Welcome to Our Blog')
                   ->view('emails.welcome')
                   ->with([
                       'username' => $this->data['username'],
                   ]);
   }
   ```

   We're using the view we created earlier and passing the `$data` array to it.

**Step 7: Sending Attachments**

1. **What is it?**

   You can attach files to your emails.

2. **How to Do It?**

   In your Mailable class, use the `attach` method:

   ```php
   public function build()
   {
       return $this->from('noreply@example.com')
                   ->subject('Welcome to Our Blog')
                   ->view('emails.welcome')
                   ->with([
                       'username' => $this->data['username'],
                   ])
                   ->attach(public_path('files/welcome.pdf'));
   }
   ```

   This attaches the `welcome.pdf` file to the email.

**Step 8: Sending Inline Attachments**

1. **What is it?**

   You can embed images or files within your email content.

2. **How to Do It?**

   In your Mailable class, use the `embed` method:

   ```php
   public function build()
   {
       return $this->from('noreply@example.com')
                   ->subject('Welcome to Our Blog')
                   ->view('emails.welcome')
                   ->with([
                       'username' => $this->data['username'],
                   ])
                   ->attach(public_path('files/welcome.pdf'), [
                       'as' => 'welcome.pdf',
                   ])
                   ->embed(public_path('images/logo.png'), 'logo');
   }
   ```
**Note:** The email would look like this:
```sql
From: noreply@example.com
Subject: Welcome to Our Blog

-- HTML Content --
<p>Welcome to Our Blog!</p>
<p>Thank you for joining our community.</p>
-- HTML Content --

-- Embedded Image --
<img src="cid:logo" alt="Logo">
-- Embedded Image --

-- Attachments --
Attachment: welcome.pdf
```

   This embeds the `logo.png` image in your email.

**Step 9: Customizing Headers, Tags, and Metadata**

1. **What is it?**

   You can customize email headers, add tags for categorization, and set metadata.

2. **How to Do It?**

   In your Mailable class, use methods like `withSwiftMessage`, `tag`, and `metadata`:

 ```php
   public function build()
   {
       return $this->from('noreply@example.com')
                   ->

subject('Welcome to Our Blog')
                   ->view('emails.welcome')
                   ->with([
                       'username' => $this->data['username'],
                   ])
                   ->withSwiftMessage(function ($message) {
                       $message->getHeaders()
                               ->addTextHeader('X-Custom-Header', 'Hello');
                   })
                   ->tag(['registration', 'welcome'])
                   ->metadata([
                       'user_id' => 123,
                       'account_type' => 'free',
                   ]);
   }
```
**Note:** The email would look like this:

```css
From: noreply@example.com
Subject: Welcome to Our Blog
X-Custom-Header: Hello
Tags: registration, welcome
Metadata: {"user_id":123,"account_type":"free"}

-- HTML Content --
<p>Welcome to Our Blog!</p>
<p>Thank you for joining our community.</p>
-- HTML Content --

```
**Step 10: Sending the Email**

1. **What is it?**

   You send the email with all configurations in place.

2. **How to Do It?**

   In your controller, use the `Mail` facade to send the email:

   ```php
   use Illuminate\Support\Facades\Mail;
   use App\Mail\WelcomeEmail;

   Mail::to('john@example.com')->send(new WelcomeEmail($data));
   ```

   This sends the welcome email to the user.

**Summary:**

Laravel Mail is a powerful tool for sending various types of emails in your web application. You configure the sender, create email views, pass data to them, send attachments, customize headers and metadata, and more. This example demonstrates sending a welcome email to new users, but you can adapt these concepts to other email notifications in your professional projects.

### **Custom Email**
---
**Step 1: Generate a Custom Mail Notification**

Run the following command to generate a custom mail notification class:

```bash
php artisan make:mail NewCommentNotification
```

This command will create a `NewCommentNotification.php` file in the `app/Mail` directory.

**Step 2: Configure the Mail Notification**

In the generated `NewCommentNotification.php` file, you can configure the mail notification. Here's an example configuration:

```php
<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewCommentNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $comment;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param Comment $comment
     */
    public function __construct($user, $comment)
    {
        $this->user = $user;
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@example.com')
                    ->subject('New Comment Notification')
                    ->markdown('emails.new-comment-notification');
    }
}
```

In this example:

- We pass the user and comment data to the constructor so they can be used in the email content.
- The `build` method defines the email's sender, subject, and the Markdown template `emails.new-comment-notification`.

**Step 3: Create a Markdown Email Template**

Next, you should create a Markdown email template. Create a new Blade Markdown file named `new-comment-notification.blade.php` in the `resources/views/emails` directory. This is where you design the email content.

Here's a simple example of the template:

```blade.php
@component('mail::message')
# New Comment Notification

Hi {{ $user->name }},

You have received a new comment on your blog post.

Comment:
{{ $comment->content }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
```

This template uses the `mail::message` component to structure the email. It displays the user's name, the new comment's content, and a closing message.

**Step 4: Send the Custom Mail Notification**

In your application logic (e.g., when a new comment is added to a post), you can send the custom mail notification like this:

```php
use Illuminate\Support\Facades\Mail;
use App\Mail\NewCommentNotification;

// ...

$user = User::find(1); // Replace with the actual user receiving the notification
$comment = Comment::find(1); // Replace with the actual comment

Mail::to($user->email)->send(new NewCommentNotification($user, $comment));
```

This code sends the `NewCommentNotification` mail to the specified user's email address with the user and comment data.


### **Notification In Laravel**
---
Certainly! Let's create a custom database notification in Laravel using the `php artisan notification:table` command. We'll assume you want to notify a user when they receive a new follower on a social media platform in a professional project. Here's how you can do it:

**Step 1: Generate the Notification Table Migration**

Run the following command to generate the migration for the notification table:

```bash
php artisan notifications:table
```

This command will generate a migration file for the notification table. You can find it in the `database/migrations` directory.

**Step 2: Run the Migration**

Next, run the migration to create the notification table in your database:

```bash
php artisan migrate
```

This will create the `notifications` table in your database.

**Step 3: Create a Custom Notification**

Now, create a custom notification class. You can use the following command to generate it:

```bash
php artisan make:notification NewFollowerNotification
```

This command will create a `NewFollowerNotification.php` file in the `app/Notifications` directory.

**Step 4: Configure the Notification**

In the generated `NewFollowerNotification.php` file, you can configure the notification. Here's an example configuration:

```php
<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NewFollowerNotification extends Notification
{
    public $follower;

    public function __construct($follower)
    {
        $this->follower = $follower;
    }

    public function toDatabase($notifiable)
    {
        return [
            'follower_id' => $this->follower->id,
            'follower_name' => $this->follower->name,
        ];
    }
}
```

In this example:

- We pass the follower data to the constructor so it can be used in the notification.
- The `toDatabase` method defines the data to be stored in the `notifications` table. In this case, we store the follower's ID and name.

**Step 5: Use the Custom Notification**

In your application logic (e.g., when a user gains a new follower), you can send the custom notification like this:

```php
use App\Notifications\NewFollowerNotification;

// ...

$user->notify(new NewFollowerNotification($follower));
```

This code sends the `NewFollowerNotification` to the specified user with the follower data.

**Step 6: Retrieve Notifications**

You can retrieve a user's notifications from the `notifications` table and display them in your application. For example, you might show a list of notifications in the user's profile.

Here's how you can retrieve unread notifications for a user:

```php
$unreadNotifications = auth()->user()->unreadNotifications;
```

You can then loop through these notifications and display them as needed.

### **DB Notification In Read unRead**
---
Certainly! Let's complete the example of a database notification system in Laravel, including displaying notifications in a Blade file, marking them as read, and allowing users to mark them as read when clicked.

**Step 1: Generate the Notification Table**

We've already covered this step. You can refer to the previous response to create the `notifications` table.

**Step 2: Generate a Custom Notification**

We've already generated the `NewFollowerNotification` class. You can refer to the previous response for the code example.

**Step 3: Use the Custom Notification**

In your application logic (e.g., when a user gains a new follower), send the custom notification like this:

```php
use App\Notifications\NewFollowerNotification;

// ...

$user->notify(new NewFollowerNotification($follower));
```

**Step 4: Display Notifications in a Blade File**

Create a Blade view (e.g., `notifications.blade.php`) to display the user's notifications. Here's how to loop through and display them:

```blade.php
@extends('layouts.app') {{-- Use your layout file here --}}

@section('content')
<div class="container">
    <h1>Notifications</h1>
    
    @forelse($notifications as $notification)
        <div class="notification {{ $notification->read_at ? 'read' : 'unread' }}">
            <p>{!! $notification->data['message'] !!}</p>
            <small>{{ $notification->created_at->diffForHumans() }}</small>
            @if(!$notification->read_at)
                <a href="{{ route('markAsRead', $notification->id) }}" class="mark-as-read">Mark as Read</a>
            @endif
        </div>
    @empty
        <p>No notifications</p>
    @endforelse
</div>
@endsection
```

In this Blade view:

- We loop through the `$notifications` variable, which should be passed from your controller.
- Each notification is displayed with a message, timestamp, and a "Mark as Read" link if it's unread.
- When clicking "Mark as Read," it will send a request to the `markAsRead` route.

**Step 5: Mark Notifications as Read**

Define a route and a controller method to handle marking notifications as read:

```php
// routes/web.php
Route::get('/mark-as-read/{id}', 'NotificationController@markAsRead')->name('markAsRead');
```

```php
// app/Http/Controllers/NotificationController.php
public function markAsRead($id)
{
    $notification = auth()->user()->notifications()->where('id', $id)->first();

    if ($notification) {
        $notification->markAsRead();
    }

    return redirect()->back();
}
```

This code marks a notification as read when the user clicks the "Mark as Read" link.

**Step 6: Retrieve and Pass Notifications to the Blade View**

In your controller, retrieve the user's notifications and pass them to the Blade view:

```php
use Illuminate\Support\Facades\Auth;

// ...

public function index()
{
    $user = Auth::user();
    $notifications = $user->notifications()->latest()->paginate(10); // Change the pagination settings as needed

    return view('notifications', compact('notifications'));
}
```

Now, when you visit the `/notifications` route (or your preferred route), you'll see the user's notifications displayed. Users can mark notifications as read, and unread notifications will have a "Mark as Read" link.

### **SMS notifications To User**
---
Sending SMS notifications in a Laravel project typically involves using an SMS gateway service. These services allow you to send SMS messages programmatically. In this example, we'll use Twilio, a popular SMS gateway. Here's how to send SMS notifications to users in a Laravel professional project:

**Step 1: Set Up a Twilio Account**

1. Sign up for a Twilio account: Go to the [Twilio website](https://www.twilio.com/) and create an account.

2. Get your Twilio credentials: After signing in, you'll find your Account SID and Auth Token in your Twilio Dashboard. Keep these secure; you'll need them to send SMS messages.

3. Obtain a Twilio phone number: Purchase a Twilio phone number that you can use to send SMS messages. You can do this from your Twilio Dashboard.

**Step 2: Install the Twilio SDK**

In your Laravel project, install the Twilio SDK using Composer:

```bash
composer require twilio/sdk
```

**Step 3: Configure Twilio in Laravel**

In your `.env` file, add your Twilio credentials:

```env
TWILIO_SID=your_twilio_account_sid
TWILIO_AUTH_TOKEN=your_twilio_auth_token
TWILIO_PHONE_NUMBER=your_twilio_phone_number
```

Then, in your `config/services.php` file, add the Twilio configuration:

```php
'twilio' => [
    'sid' => env('TWILIO_SID'),
    'token' => env('TWILIO_AUTH_TOKEN'),
    'from' => env('TWILIO_PHONE_NUMBER'),
],
```

**Step 4: Create a Notification**

Generate a new notification class for SMS notifications:

```bash
php artisan make:notification SMSNotification
```

In the generated `SMSNotification.php` file, customize it to send SMS messages. For example:

```php
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\NexmoMessage;

class SMSNotification extends Notification
{
    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)
            ->content('This is your SMS notification message.');
    }
}
```

Here, we're using the Nexmo message provider, but you can replace it with Twilio by using `TwilioMessage` instead.

**Step 5: Use the SMS Notification**

In your application logic (e.g., when you want to send an SMS notification), use the notification like this:

```php
use App\Notifications\SMSNotification;

// ...

$user->notify(new SMSNotification());
```

This code sends an SMS notification to the user.

**Step 6: Send SMS Notifications from Events**

You can also send SMS notifications from events in your Laravel project. For example, when a user signs up, you can trigger an event that sends a welcome SMS. First, create an event and listener:

```bash
php artisan make:event UserRegistered
php artisan make:listener SendWelcomeSMS --event=UserRegistered
```

In the `SendWelcomeSMS` listener, send the SMS notification:

```php
use App\Notifications\SMSNotification;

public function handle(UserRegistered $event)
{
    $user = $event->user;
    $user->notify(new SMSNotification());
}
```

Dispatch this event when a user registers.

With these steps, you can send SMS notifications to users in your Laravel professional project using the Twilio SMS gateway or any other SMS gateway service you prefer. Remember to adapt the code to your specific project needs and requirements.

### **SMS notifications To User By [Vonage website](https://www.vonage.com/)**
---
Certainly! To send SMS notifications using the Vonage (formerly Nexmo) SMS gateway with the `laravel/vonage-notification-channel` package, you can follow these steps. In this example, we'll create a professional project code to send SMS notifications.

**Step 1: Install Required Packages**

Install the `laravel/vonage-notification-channel` package along with `guzzlehttp/guzzle` for HTTP requests:

```bash
composer require laravel/vonage-notification-channel guzzlehttp/guzzle
```

**Step 2: Set Up a Vonage Account**

1. Sign up for a Vonage account: Go to the [Vonage website](https://www.vonage.com/) and create an account.

2. Get your Vonage API credentials: After signing in, you'll find your API Key and API Secret in your Vonage Dashboard. Keep these secure; you'll need them to send SMS messages.

**Step 3: Configure Vonage in Laravel**

In your `.env` file, add your Vonage API credentials:

```env
VONAGE_API_KEY=your_vonage_api_key
VONAGE_API_SECRET=your_vonage_api_secret
VONAGE_PHONE_NUMBER=your_vonage_phone_number
```

**Step 4: Create a Notification**

Generate a new notification class for SMS notifications:

```bash
php artisan make:notification SMSNotification
```

In the generated `SMSNotification.php` file, customize it to send SMS messages using the Vonage notification channel:

```php
use Illuminate\Notifications\Notification;
use NotificationChannels\Vonage\VonageMessage;

class SMSNotification extends Notification
{
    public function toVonage($notifiable)
    {
        return VonageMessage::create()
            ->content('This is your SMS notification message.');
    }
} 

 // OR
 use Illuminate\Notifications\Messages\VonageMessage;

class SMSNotification extends Notification
{
    protected $content;
    protected $from;

    public function __construct($content, $from = null)
    {
        $this->content = $content;
        $this->from = $from;
    }

    public function toVonage($notifiable): VonageMessage
    {
        $message = (new VonageMessage)->content($this->content);

        if ($this->from) {
            $message->from($this->from);
        }

        return $message;
    }
}

```

**Step 5: Use the SMS Notification**

In your application logic (e.g., when you want to send an SMS notification), use the notification like this:

```php
use App\Notifications\SMSNotification;

// ...

$user->notify(new SMSNotification());

// or
$user->notify(new SMSNotification('Dynamic SMS content', '15554443333'));
```
From: 15554443333
Message: Dynamic SMS content


This code sends an SMS notification to the user using the Vonage SMS gateway.

**Step 6: Send SMS Notifications from Events**

You can also send SMS notifications from events in your Laravel project. For example, when a user signs up, you can trigger an event that sends a welcome SMS. First, create an event and listener:

```bash
php artisan make:event UserRegistered
php artisan make:listener SendWelcomeSMS --event=UserRegistered
```

In the `SendWelcomeSMS` listener, send the SMS notification:

```php
use App\Notifications\SMSNotification;

public function handle(UserRegistered $event)
{
    $user = $event->user;
    $user->notify(new SMSNotification());
}
```
Dispatch this event when a user registers.

### **Laravel Package Development**
---
Package development in the context of Laravel, and in software development in general, refers to the process of creating reusable and distributable bundles of code, known as packages or libraries, that extend the functionality of a software framework or application. These packages can contain code, configuration files, views, assets, and more. Laravel, being a popular PHP web framework, encourages package development to modularize and share functionality across different Laravel projects.

**Step 1: Create a New Laravel Package**

Start by creating a new Laravel package using Composer. Replace `vendorname` and `packagename` with your own vendor and package names.

```bash
composer create-package vendorname/packagename
```

**Step 2: Package Directory Structure**

Inside the package directory, you should have a typical Laravel package directory structure, including `src` for your package's source code, and `resources` for any views, assets, or configuration files.

```plaintext
packagename/
    ├── src/
    │   ├── PackagenameServiceProvider.php
    │   └── ...
    ├── resources/
    │   ├── views/
    │   └── ...
    └── ...
```

**Step 3: Create the Service Provider**

Inside the `src` directory, create a service provider. This provider will be used to register your package's components with Laravel.

```php
// src/PackagenameServiceProvider.php

namespace Vendorname\Packagename;

use Illuminate\Support\ServiceProvider;

class PackagenameServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // View
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'packagename');

            // Route
           $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

            // Migration
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

            // publishes 
            $this->publishes([
                __DIR__.'/../public' => public_path('vendor/courier'),
            ], 'public');

            // Language
              $this->loadTranslationsFrom(__DIR__.'/../lang', 'courier');
              //  For this Language, using like This
              echo trans('courier::messages.welcome');

              // Publishing File Groups
                $this->publishes([
                    __DIR__.'/../config/package.php' => config_path('package.php')
                ], 'courier-config');
            
                $this->publishes([
                    __DIR__.'/../database/migrations/' => database_path('migrations')
                ], 'courier-migrations');

    }

    public function register()
    {
        // Register any package-specific services or bindings here
    }
}
```

**Step 4: Create Views**

Inside the `resources/views` directory, you can create Blade views that your package will use. For example, let's create a simple welcome view.

```php
// resources/views/welcome.blade.php

<h1>Welcome to My Package</h1>
```

**Step 5: Publish Configuration (Optional)**

If your package has configuration files, you can publish them using Artisan. For example, if you have a `config.php` file inside your package's `config` directory:

```bash
php artisan vendor:publish --tag=packagename-config
```

**Step 6: Register the Service Provider**

In your Laravel application's `config/app.php`, add your package's service provider to the `providers` array.

```php
'providers' => [
    // ...
    Vendorname\Packagename\PackagenameServiceProvider::class,
],
```

**Step 7: Use the Package in Your Laravel Application**

Now, you can use the package in your Laravel application. For example, you can create a route to display the welcome view from your package.

```php
// routes/web.php

Route::get('/welcome', function () {
    return view('packagename::welcome');
});
```

**Step 8: Publish Assets (Optional)**

If your package has assets (CSS, JavaScript, etc.), you can publish them using Artisan. For example, if you have assets in your package's `public` directory:

```bash
php artisan vendor:publish --tag=packagename-assets --force
```

**Step 9: Test Your Package**

You should write tests for your package using Laravel's testing facilities. This ensures that your package functions as expected and allows you to catch any issues early on.

**Step 10: Share Your Package (Optional)**

If you want to share your package with the Laravel community, you can consider publishing it on Packagist and GitHub.

### **Processes :  invoking, asynchronous & concurrent process**
---
In Laravel, the term "processes" typically refers to the execution of tasks or operations within the framework. Let me break down the processes you mentioned and provide explanations with some basic code examples:

1. **Invoking Process**:
   - Invoking a process in Laravel means triggering a specific action, usually through an HTTP request. This can be done through routes, controllers, and views.
   
   Example:
   ```php
   // Define a route that invokes a controller method
   Route::get('/example', 'ExampleController@index');

   // Controller method to handle the request
   public function index()
   {
       // Your code logic here
   }
   ```

2. **Asynchronous Process**:
   - An asynchronous process in Laravel allows you to perform tasks in the background without blocking the main application flow. This is often achieved using Laravel's built-in queue system, which utilizes tools like Redis or database for queuing and processing jobs.

   Example:
   ```php
   // Queue a job for asynchronous processing
   dispatch(new SomeJob);
   ```

3. **Concurrent Process**:
   - Concurrent processing in Laravel refers to the ability to handle multiple requests or tasks simultaneously. Laravel's underlying server (e.g., Apache or Nginx) typically manages concurrency, allowing multiple users to interact with your application concurrently.

   Example:
   ```php
   // Laravel handles concurrent requests by default
   ```

### **Queue In Laravel**
---

In Laravel, a queue is a mechanism for performing tasks or jobs asynchronously. It allows you to offload time-consuming and non-blocking tasks, such as sending emails, processing images, or generating reports, to be executed in the background without slowing down your main application.

Here's a step-by-step guide to using queues in Laravel:

1. **Setting Up Laravel Queue**:
   - To use queues, you need to configure your Laravel application. Laravel supports multiple queue drivers like Redis, Beanstalk, and more. Choose one and configure it in your `.env` file.

   Example `.env` configuration for Redis:
   ```env
   QUEUE_CONNECTION=redis
   ```

2. **Creating a Job**:
   - Jobs are the individual tasks that you want to run asynchronously. You can generate a new job using Laravel's artisan command:

   ```
   php artisan make:job SendEmail
   ```

3. **Defining the Job Logic**:
   - Inside the generated job class (`SendEmail` in this example), define the task you want to perform. For instance, sending an email.

   ```php
   public function handle()
   {
       // Your email sending logic here
   }
   ```

4. **Dispatching the Job**:
   - To enqueue a job for processing, you can dispatch it. This can be done from anywhere in your application.

   ```php
   dispatch(new SendEmail);
   ```

5. **Running the Queue Worker**:
   - Laravel provides a queue worker that processes jobs from the queue. Run the worker using the `queue:work` artisan command:

   ```
   php artisan queue:work
   ```

6. **Monitoring and Configuration**:
   - You can monitor the queue status and configure various settings in Laravel's `config/queue.php` file. You can also set up retry and failure strategies for jobs.

Now, here's a simple example of using a queue in a Laravel project:

```php
// Create a new job
php artisan make:job SendEmail

// Define the email sending logic in the job class

public function handle()
{
    // Send an email
    Mail::to('example@example.com')->send(new WelcomeEmail);
}

// Dispatch the job
dispatch(new SendEmail);
```

In this example, when you dispatch the `SendEmail` job, it will be processed asynchronously in the background by the queue worker, allowing your main application to remain responsive.

### **Rate Limiting**
---

**Rate Limiting in Laravel for Beginners**:

Rate limiting is a way to control how often users or clients can make requests to your Laravel application. It's like setting a speed limit on a road to ensure safe and fair usage. In Laravel, you can implement rate limiting to prevent abuse or overuse of your application's resources, such as API endpoints.

Here's how to understand and implement rate limiting step by step:

**1. Concept of Rate Limit**:
   - Rate limiting sets a maximum number of requests a user or client can make within a specific time period (e.g., 10 requests per minute).


**2. Options**:
   - When setting up rate limiting, you define options like:
     - The key for the rate limit: A unique identifier for this rate limit.
     - The maximum number of requests allowed.
     - The time period for the limit (in minutes).

 **3. Middleware Configuration**:
   - Laravel's rate limiting middleware is already included by default. To configure it, open the `app/Http/Kernel.php` file and add the `throttle` middleware to the `$middlewareGroups` array:

   ```php
   protected $middlewareGroups = [
       'web' => [
           // Other middleware...
           \Illuminate\Routing\Middleware\ThrottleRequests::class,
       ],
   ];
   ```

 **4. Defining Rate Limiting Options**:
   - Next, you need to define the rate limiting options in your routes or controllers. This includes the maximum number of requests and the time frame (in minutes) for rate limiting.

   ```php
   Route::middleware('throttle:api_rate_limit,10,1')->group(function () {
       Route::get('/api/resource', 'ApiController@getResource');
   });
   ```

   In this example, `rate_limit` is the key you define for this rate limit configuration, and `1` specifies that the user is limited to one request within the time frame.

 **5. ustomizing Response**:
   - Laravel will automatically handle rate-limited requests by responding with an error message if the limit is exceeded. However, you can customize the response in the `app/Exceptions/Handler.php` file:

   ```php
   protected function render($request, Throwable $exception)
   {
       if ($exception instanceof ThrottleRequestsException) {
           return response()->json(['error' => 'Too many requests. Please try again later.'], 429);
       }

       return parent::render($request, $exception);
   }
   ```

 **6. Testing Rate Limiting**:
   - To test rate limiting, you can use tools like Postman or cURL to send multiple requests within the specified time frame. You should observe that once the limit is reached, you'll receive a `429 Too Many Requests` response.

Here's a simple example of rate limiting applied to an API route:

```php
Route::middleware('throttle:api_rate_limit,5,1')->group(function () {
    Route::get('/api/resource', 'ApiController@getResource');
});
```

In this example, `api_rate_limit` is the key, `5` is the maximum number of requests allowed, and `1` is the time frame (in minutes).

#### **Rate Limiting Explanation**
---

In Laravel, a rate limiter is a mechanism that helps control the rate of incoming requests from a user or IP address. It prevents abuse, protects your application from potential attacks, and ensures fair usage of resources.

Here's a beginner-friendly explanation of rate limiting in the context of an e-commerce project:

1. **What is Rate Limiting?**
   Rate limiting is like a traffic cop for your web application. It sets rules on how quickly users can make requests to your server. This is crucial to prevent one user or a malicious bot from overwhelming your server with too many requests in a short time.

2. **Why Use Rate Limiting in E-commerce?**
   Imagine someone trying to flood your server with rapid requests to manipulate prices, check product availability, or perform other actions too quickly. Rate limiting safeguards against such scenarios, ensuring a fair and controlled flow of requests.

3. **Implementing Rate Limiting in Laravel:**

   - **Define a Rate Limiter:**
     In Laravel, you can define a rate limiter in the `AppServiceProvider` or a service provider specific to your feature. Use the `RateLimiter` facade to set rules.

   ```php
   use Illuminate\Cache\RateLimiting\Limit;
   use Illuminate\Support\Facades\RateLimiter;

   // Inside boot method of a service provider
   RateLimiter::for('checkout', function ($request) {
       return Limit::perMinute(5); // Allow 5 requests per minute
   });
   ```

   - **Apply Rate Limiter to a Route:**
     Apply the rate limiter to a route by using the middleware.

   ```php
   Route::middleware(['throttle:checkout'])->group(function () {
       // Your e-commerce routes go here
   });
   ```
    This example limits the checkout-related routes to 5 requests per minute for each user. Adjust the rate limits based on your specific requirements and route usage within your e-commerce project.

   This ensures that the checkout routes are subject to the rate limiter.

4. **Testing Rate Limiting:**
   To see it in action, try accessing your e-commerce routes more frequently than the defined limit. You should encounter a response indicating that you've exceeded the rate limit.

5. **Adjusting and Customizing:**
   You can tweak the rate limits based on your application's needs. Laravel allows you to set limits per minute, per hour, etc.

   ```php
   // Example: Allow 10 requests per hour
   return Limit::perHour(10);
   ```

   You can customize error messages and response codes to inform users when they hit a rate limit.

By implementing rate limiting, you're enhancing the security and stability of your Laravel e-commerce project, ensuring it operates smoothly even under high loads.

#### **More Explanation about Rate Limit**
---
In Laravel, 'throttle' refers to a middleware that helps control the rate at which users can access certain routes. It's like a speed limit for requests, preventing users from making too many requests in a short time. This is important to ensure fair usage of your application and protect it from potential abuse or attacks.

**Easy Explanation:**

Imagine you're in a line to buy concert tickets, and the organizer wants to make sure everyone gets a chance. They set a rule: "Only one person can buy tickets every 2 minutes." If someone tries to buy tickets too quickly, they'll be asked to wait. In Laravel, 'throttle' does a similar job for your website's routes.

**How It Works:**

1. **Middleware Setup:**
   Laravel provides the 'throttle' middleware that you can apply to specific routes.

2. **Setting the Pace:**
   You decide how many requests a user can make within a certain time frame. For example, "Allow 3 requests per minute."

3. **Applying to Routes:**
   You attach 'throttle' to your routes. If a user exceeds the allowed pace, Laravel slows them down, making them wait before accessing the route again.

**Example Code:**

```php
// Inside your routes/web.php or route file

Route::middleware(['throttle:3,1'])->group(function () {
    // Your routes go here
    Route::get('/buy-tickets', 'TicketController@buy');
    // Add more routes as needed
});
```

This example sets a rate limit of 3 requests per minute (3 in the first parameter) with a 1-minute delay (1 in the second parameter). It means a user can make 3 requests in a minute, but if they try to make a 4th request within that minute, they'll have to wait for the next minute.

In simple terms, 'throttle' helps manage the flow of visitors to your routes, preventing anyone from overwhelming your server with too many requests too quickly.

### **Task Scheduling**
---

**Task Scheduling in Laravel - Simplified Explanation**:

Think of task scheduling in Laravel like setting up automated reminders or chores for your Laravel application. These reminders can be things like sending emails, cleaning up files, or performing routine tasks. You set a schedule, and Laravel takes care of executing these tasks automatically.

**Step-by-Step Guide**:

**1. Identify a Task to Automate**:
   - Start by identifying a task in your Laravel project that you want to automate. For example, let's say you want to send a daily email to your users.

**2. Define the Task**:
   - Determine what the task should do. In our example, the task is to send a daily email.

**3. Create an Artisan Command**:
   - In Laravel, you create an Artisan command to define the task. Think of it as giving your task a name and a set of instructions. Use this command to encapsulate the logic for the task.

```bash
   php artisan make:command SendDailyEmail

   public function handle()
{
    // Get the list of users you want to send emails to
    $users = User::where('subscribed', true)->get();

    // Loop through the users and send a daily email
    foreach ($users as $user) {
        // Use Laravel's built-in Mail facade to send an email
        Mail::to($user->email)->send(new DailyEmail());

        // Log the email sent for monitoring purposes
        Log::info("Sent a daily email to {$user->name} at {$user->email}");
    }
}

```

#### All The Steps
---

**1. Concepts**:
   - Task scheduling is about automating repetitive tasks that your Laravel application needs to perform at specified times or intervals.

**2. Scheduling Configuration**:
   - Laravel's task scheduling is configured in the `app/Console/Kernel.php` file. This is where you define the tasks and their schedules.

**3. Task Definitions**:
   - You can define tasks as Artisan commands or closures (anonymous functions). Artisan commands are predefined actions you can run, while closures allow you to define custom actions.

**4. Schedule Definition**:
   - Use the `$schedule` property within the `Kernel.php` file to define the tasks and their schedules. You specify the frequency and timing for each task.

**5. Cron Syntax**:
   - Task scheduling in Laravel uses the familiar Cron syntax to define when tasks should run. This syntax includes minute, hour, day, month, and day of the week fields.

**6. Example**:
   - Here's an example of how to schedule a task to run every day at midnight:

   ```php
   protected function schedule(Schedule $schedule)
   {
       $schedule->command('email:send')->dailyAt('00:00');
   }
   ```

   In this example, `email:send` is an Artisan command that will run every day at midnight.

**7. Running the Scheduler**:
   - You need to set up a Cron job on your server to run Laravel's scheduler. This job calls the `schedule:run` Artisan command at regular intervals to check for scheduled tasks.

**8. Monitoring and Logging**:
   - Laravel provides logs and notifications to help you monitor task scheduling and track any errors or failures.

**9. Advanced Scheduling**:
   - Laravel's task scheduling offers advanced features like task retries, preventing task overlap, and even customizing the output and notifications for scheduled tasks.

**10. Real-World Use Cases**:
    - Common use cases for task scheduling include sending daily emails, performing database backups, and clearing old cache files.

Implementing task scheduling in Laravel allows you to automate routine maintenance and repetitive tasks, making your application more efficient and reliable.

Here's a basic example of scheduling a custom task in Laravel's `Kernel.php` file:

```php
protected function schedule(Schedule $schedule)
{
    $schedule->call(function () {
        // Your custom task logic here
    })->daily();
}
```

In this example, a custom closure is scheduled to run daily. You can replace the closure with any custom logic you need.

### **Queue in Laravel Practically**
---
**What are Queues in Laravel:**

In Laravel, Queues are like virtual assistants for your web application. Imagine you're running an online store, and when a customer places an order, there's a lot of behind-the-scenes work to do, like sending emails, updating inventory, and more. Queues help you handle these tasks without slowing down your application's response time.

**Easy Explanation:**

Think of Queues as a to-do list for your web app. When a customer places an order, instead of doing everything right away and making them wait, you add tasks to a list. Your app can then work on these tasks in the background, like a helpful assistant, while your customer happily moves on.

**How Queues Work in Laravel:**

1. **Adding Tasks to the Queue:**
   When an event occurs (e.g., a new order), instead of doing all related tasks immediately, you add them to the queue.

2. **Background Processing:**
   Laravel's Queue system takes care of processing these tasks in the background. It's like your app having a separate team working on these tasks without affecting the user experience.

3. **Completion Notification:**
   Once a task is completed, the user can be notified (e.g., order confirmation email sent), ensuring a smooth experience without delays.

**Applying Queues in an E-commerce Project:**

Let's say a customer places an order in your online store. Instead of handling everything instantly, you can use queues to perform tasks like sending order confirmation emails and updating inventory in the background.

**Example Code:**

1. **Define a Job:**
   Create a job class that represents a specific task, like sending an order confirmation email.

   ```php
   // Run this command to create a new job
   php artisan make:job SendOrderConfirmation
   ```

2. **Job Logic:**
   Define the logic for sending the order confirmation email in your job class.

 Let's implement a simple example logic for sending an order confirmation email within the `handle` function of the `SendOrderConfirmation` job. In this example, I'll assume that your order details include `customer_name`, `order_number`, and `total_amount`.

```php
// Inside the SendOrderConfirmation.php job file

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\OrderConfirmationMail; // Assuming you have a Mailable class for order confirmation
use Illuminate\Support\Facades\Mail;

class SendOrderConfirmation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;

    /**
     * Create a new job instance.
     *
     * @param  array  $order
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Logic to send order confirmation email

        $customerName = $this->order['customer_name'];
        $orderNumber = $this->order['order_number'];
        $totalAmount = $this->order['total_amount'];
        $email = $this->order['email'];

        // Example: Send order confirmation email using a Mailable
        Mail::to($email)
            ->send(new OrderConfirmationMail($customerName, $orderNumber, $totalAmount));
    }
}
```



3. **Dispatch the Job:**
   In your controller or wherever the order is processed, dispatch the job to the queue.

Now, in the example above, I've assumed that your `OrderConfirmationMail` Mailable class accepts parameters for `customerName`, `orderNumber`, and `totalAmount`. Adjust the `OrderConfirmationMail` class accordingly:

```php
// Inside the OrderConfirmationMail.php Mailable file

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $customerName;
    public $orderNumber;
    public $totalAmount;

    /**
     * Create a new message instance.
     *
     * @param  string  $customerName
     * @param  string  $orderNumber
     * @param  float  $totalAmount
     * @return void
     */
    public function __construct($customerName, $orderNumber, $totalAmount)
    {
        $this->customerName = $customerName;
        $this->orderNumber = $orderNumber;
        $this->totalAmount = $totalAmount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.order_confirmation')
                    ->with([
                        'customerName' => $this->customerName,
                        'orderNumber' => $this->orderNumber,
                        'totalAmount' => $this->totalAmount,
                    ])
                    ->subject('Order Confirmation');
    }
}
```

Ensure you have a corresponding Blade view file (`order_confirmation.blade.php`) inside the `resources/views/emails/` directory to customize the email content based on these parameters.

This example demonstrates a basic structure for sending an order confirmation email with order details using Laravel's Mailables and Queues. You can further enhance and customize it based on your specific needs and email content.

Now, create a Blade view file `order_confirmation.blade.php` inside the `resources/views/emails/` directory with the content for your order confirmation email. Here's a simple example:

```blade
<!-- Inside resources/views/emails/order_confirmation.blade.php -->

<p>Dear {{ $order['customer_name'] }},</p>

<p>Thank you for your order (Order ID: {{ $order['order_id'] }}).</p>

<p>Order Details:</p>
<ul>
    @foreach($order['items'] as $item)
        <li>{{ $item['name'] }} - {{ $item['quantity'] }} x ${{ $item['price'] }}</li>
    @endforeach
</ul>

<p>Thank you for shopping with us!</p>
```

Adjust the placeholders and content based on your actual order details structure.

Now, when you dispatch the `SendOrderConfirmation` job in your controller, it will send an order confirmation email using Laravel's queue system, providing a professional and customizable email experience for your e-commerce website.

4. **Queue Worker:**
   Run the queue worker to process jobs in the background.

   ```bash
   php artisan queue:work
   ```

Now, when a customer places an order, the order confirmation email task is added to the queue. The queue worker processes this task in the background, ensuring a seamless and responsive user experience in your e-commerce project.

#### **More Clarification of Queue**
---
Absolutely, let's break it down in an even simpler way:

**Imagine Your Online Store as a Busy Shop:**

1. **Customer Places an Order:**
   - A customer comes to your online store and places an order.
   - Instead of making them wait while you do everything right away, you write down what needs to be done.

2. **To-Do List (Queue) is Created:**
   - You create a to-do list (queue) for tasks related to the order, like sending an email, updating inventory, etc.
   - This list is like a helper (queue) that will take care of tasks in the background.

3. **Background Helpers (Queue Workers) Get to Work:**
   - You have virtual helpers (queue workers) who start working on the tasks in the background.
   - They send emails, update inventory, and do other tasks without bothering the customer.

4. **Customer Can Move On:**
   - While the helpers are busy, your customer happily moves on with their day.
   - They don't have to wait for everything to be done immediately.

**Applying Queues in Your Online Store:**

Let's make it real for your online store:

1. **Task (Job) Creation:**
   - When someone places an order, instead of doing everything on the spot, you create individual tasks (jobs) like sending order confirmation emails.

2. **Job Logic:**
   - You define what each task (job) should do. For example, the job for sending an order confirmation email contains the logic to create and send the email.

3. **Adding to the Helper's List (Dispatching):**
   - You tell your virtual helper (queue) about these tasks. For instance, "Hey, there's a job to send an order confirmation email."

4. **Background Helpers (Queue Workers) Start Working:**
   - Your virtual helpers (queue workers) pick up these tasks and start working on them quietly in the background.

5. **Customer Gets Notified:**
   - Once the task is done, your customer can be notified. For instance, they receive the order confirmation email.

**Super Simple Code Example:**

```php
// Create a job (task)
php artisan make:job SendOrderConfirmation

// Inside SendOrderConfirmation.php
public function handle()
{
    // Logic to send order confirmation email
    // ...
}

// In your controller
use App\Jobs\SendOrderConfirmation;

public function placeOrder()
{
    // Order processing logic

    // Add the job to the to-do list (dispatch)
    SendOrderConfirmation::dispatch($order);
}
```

By using queues in your online store, you make sure that things get done without keeping your customers waiting. It's like having invisible helpers taking care of tasks so that your customers can have a smooth shopping experience.


### **String**
---
Laravel includes a variety of functions for manipulating string values. Many of these functions are used by the framework itself; however, you are free to use them in your own applications if you find them convenient.

In Laravel, working with strings is made more convenient and powerful through the use of the `Illuminate\Support\Str` class. This class provides a wide range of string manipulation methods that simplify common string operations. Here are some essential methods and examples of how to use them:

1. **`Str::length($string)`**:
   - Returns the length (number of characters) of a string.

   ```php
   $length = Str::length("Hello, Laravel"); // $length = 14
   ```

2. **`Str::lower($string)`**:
   - Converts a string to lowercase.

   ```php
   $lower = Str::lower("Hello, Laravel"); // $lower = "hello, laravel"
   ```

3. **`Str::upper($string)`**:
   - Converts a string to uppercase.

   ```php
   $upper = Str::upper("Hello, Laravel"); // $upper = "HELLO, LARAVEL"
   ```

4. **`Str::title($string)`**:
   - Converts a string to title case (each word capitalized).

   ```php
   $title = Str::title("hello, laravel"); // $title = "Hello, Laravel"
   ```

5. **`Str::ucfirst($string)`**:
   - Converts the first character of a string to uppercase.

   ```php
   $ucfirst = Str::ucfirst("hello, laravel"); // $ucfirst = "Hello, laravel"
   ```

6. **`Str::camel($string)`**:
   - Converts a string to camelCase.

   ```php
   $camel = Str::camel("hello_world"); // $camel = "helloWorld"
   ```

7. **`Str::snake($string, $delimiter = '_')`**:
   - Converts a string to snake_case.

   ```php
   $snake = Str::snake("Hello, Laravel"); // $snake = "hello_laravel"
   ```

8. **`Str::slug($string, $separator = '-')`**:
   - Generates a URL-friendly "slug" from a string.

   ```php
   $slug = Str::slug("Hello, Laravel"); // $slug = "hello-laravel"
   ```

9. **`Str::startsWith($string, $prefix)`**:
   - Checks if a string starts with a given prefix.

   ```php
   $startsWith = Str::startsWith("Hello, Laravel", "Hello"); // $startsWith = true
   ```

10. **`Str::endsWith($string, $suffix)`**:
    - Checks if a string ends with a given suffix.

    ```php
    $endsWith = Str::endsWith("Hello, Laravel", "Laravel"); // $endsWith = true
    ```
Certainly! Here are some more useful string manipulation methods provided by `Illuminate\Support\Str` in Laravel:

11. **`Str::limit($string, $limit = 100, $end = '...')`**:
    - Truncates a string to a specified length and appends an optional ending.

    ```php
    $truncated = Str::limit("This is a long text", 10); // $truncated = "This is a..."
    ```

12. **`Str::plural($string, $count = 2)`**:
    - Pluralizes a string based on a count.

    ```php
    $plural = Str::plural("apple", 3); // $plural = "apples"
    ```

13. **`Str::singular($string)`**:
    - Singularizes a string.

    ```php
    $singular = Str::singular("apples"); // $singular = "apple"
    ```

14. **`Str::random($length = 16)`**:
    - Generates a random string of the specified length.

    ```php
    $random = Str::random(8); // Generates an 8-character random string
    ```

15. **`Str::replace($search, $replace, $subject)`**:
    - Replaces all occurrences of a search string with a replacement in a given subject string.

    ```php
    $replaced = Str::replace("quick", "slow", "The quick brown fox"); // $replaced = "The slow brown fox"
    ```

16. **`Str::contains($haystack, $needles)`**:
    - Checks if a string contains any of the given substrings.

    ```php
    $contains = Str::contains("Hello, world", ["world", "universe"]); // $contains = true
    ```

17. **`Str::before($string, $search)`**:
    - Gets the portion of a string before the first occurrence of a given search string.

    ```php
    $before = Str::before("Hello, world", ","); // $before = "Hello"
    ```

18. **`Str::after($string, $search)`**:
    - Gets the portion of a string after the first occurrence of a given search string.

    ```php
    $after = Str::after("Hello, world", ","); // $after = " world"
    ```
Certainly! Here are more useful string manipulation methods provided by `Illuminate\Support\Str` in Laravel without repeating the ones mentioned earlier:

19. **`Str::replaceFirst($search, $replace, $subject)`**:
    - Replaces the first occurrence of a search string with a replacement in a given subject string.

    ```php
    $replacedFirst = Str::replaceFirst("apple", "banana", "apple, apple, cherry"); // $replacedFirst = "banana, apple, cherry"
    ```

20. **`Str::replaceLast($search, $replace, $subject)`**:
    - Replaces the last occurrence of a search string with a replacement in a given subject string.

    ```php
    $replacedLast = Str::replaceLast("apple", "banana", "apple, apple, cherry"); // $replacedLast = "apple, banana, cherry"
    ```

21. **`Str::startsWithAny($string, array $prefixes)`**:
    - Checks if a string starts with any of the values in the provided array.

    ```php
    $startsWithAny = Str::startsWithAny("Hello, world", ["Hi", "Hello", "Hey"]); // $startsWithAny = true
    ```

22. **`Str::endsWithAny($string, array $suffixes)`**:
    - Checks if a string ends with any of the values in the provided array.

    ```php
    $endsWithAny = Str::endsWithAny("Hello, world", ["world", "universe", "planet"]); // $endsWithAny = true
    ```

23. **`Str::pluralStudly($string, $count = 2)`**:
    - Generates a plural, studly (PascalCase) form of a string based on a count.

    ```php
    $pluralStudly = Str::pluralStudly("apple", 3); // $pluralStudly = "Apples"
    ```

24. **`Str::singularStudly($string)`**:
    - Generates a singular, studly (PascalCase) form of a string.

    ```php
    $singularStudly = Str::singularStudly("apples"); // $singularStudly = "Apple"
    ```

25. **`Str::beforeLast($string, $search)`**:
    - Gets the portion of a string before the last occurrence of a given search string.

    ```php
    $beforeLast = Str::beforeLast("apple, banana, cherry", ","); // $beforeLast = "apple, banana"
    ```

26. **`Str::afterLast($string, $search)`**:
    - Gets the portion of a string after the last occurrence of a given search string.

    ```php
    $afterLast = Str::afterLast("apple, banana, cherry", ","); // $afterLast = " cherry"
    ```
Certainly! Here are more `Illuminate\Support\Str` methods in Laravel that haven't been mentioned yet:

27. **`Str::startsWithAll($string, array $prefixes)`**:
    - Checks if a string starts with all of the values in the provided array.

    ```php
    $startsWithAll = Str::startsWithAll("Hello, world", ["Hello", "world"]); // $startsWithAll = true
    ```

28. **`Str::endsWithAll($string, array $suffixes)`**:
    - Checks if a string ends with all of the values in the provided array.

    ```php
    $endsWithAll = Str::endsWithAll("Hello, world", ["Hello", "world"]); // $endsWithAll = false
    ```

29. **`Str::replaceArray($search, array $replace, $subject)`**:
    - Replaces a given array of search values with an array of replace values in the given subject string.

    ```php
    $replacedArray = Str::replaceArray(':name', ['John', 'Doe'], 'My name is :name :last'); // $replacedArray = "My name is John Doe"
    ```

30. **`Str::ascii($value, $language = 'en')`**:
    - Transliterates a UTF-8 encoded string to ASCII characters.

    ```php
    $ascii = Str::ascii("Café"); // $ascii = "Cafe"
    ```

31. **`Str::pluralStudly($string, $count = 2)`**:
    - Generates a plural, studly (PascalCase) form of a string based on a count.

    ```php
    $pluralStudly = Str::pluralStudly("apple", 3); // $pluralStudly = "Apples"
    ```

32. **`Str::singularStudly($string)`**:
    - Generates a singular, studly (PascalCase) form of a string.

    ```php
    $singularStudly = Str::singularStudly("apples"); // $singularStudly = "Apple"
    ```

33. **`Str::padBoth($string, $length, $padding)`**:
    - Pads both sides of a string with a specified padding character.

    ```php
    $padded = Str::padBoth("123", 5, "0"); // $padded = "01230"
    ```

### **Fluent String**
---
Certainly! I'll provide examples for some of the most important methods from the Fluent Strings category:

1. **`after($search)`**:
   - Gets the portion of a string that comes after the first occurrence of a given search string.

   ```php
   $after = Str::of("Hello, world")->after(", "); // $after = "world"
   ```

2. **`before($search)`**:
   - Gets the portion of a string that comes before the first occurrence of a given search string.

   ```php
   $before = Str::of("Hello, world")->before(", "); // $before = "Hello"
   ```

3. **`contains($needles)`**:
   - Checks if the string contains any of the given substrings.

   ```php
   $contains = Str::of("Hello, world")->contains(["Hello", "universe"]); // $contains = true
   ```

4. **`explode($delimiter, $limit = null)`**:
   - Splits a string into an array using a delimiter.

   ```php
   $parts = Str::of("apple,banana,cherry")->explode(","); // $parts = ["apple", "banana", "cherry"]
   ```

5. **`replace($search, $replace)`**:
   - Replaces all occurrences of a search string with a replacement.

   ```php
   $replaced = Str::of("The quick brown fox")->replace("quick", "lazy"); // $replaced = "The lazy brown fox"
   ```

6. **`startsWith($needles)`**:
   - Checks if the string starts with any of the given prefixes.

   ```php
   $startsWith = Str::of("Hello, world")->startsWith(["Hi", "Hello", "Hey"]); // $startsWith = true
   ```

7. **`length()`**:
   - Returns the length (number of characters) of the string.

   ```php
   $length = Str::of("Hello, world")->length(); // $length = 12
   ```

8. **`limit($limit, $end = '...')`**:
   - Truncates the string to a specified length and appends an optional ending.

   ```php
   $limited = Str::of("This is a long text")->limit(10); // $limited = "This is a..."
   ```

9. **`upper()`**:
   - Converts the string to uppercase.

   ```php
   $upper = Str::of("Hello, world")->upper(); // $upper = "HELLO, WORLD"
   ```

10. **`lower()`**:
    - Converts the string to lowercase.

    ```php
    $lower = Str::of("Hello, world")->lower(); // $lower = "hello, world"
    ```
Certainly! Here are more important Fluent Strings methods without any repetition:

11. **`basename($suffix = '')`**:
    - Gets the trailing part of a path, similar to the PHP `basename` function.

    ```php
    $baseName = Str::of("/path/to/file.txt")->basename(".txt"); // $baseName = "file"
    ```

12. **`dirname()`**:
    - Gets the directory name from a path.

    ```php
    $dirName = Str::of("/path/to/file.txt")->dirname(); // $dirName = "/path/to"
    ```

13. **`replaceFirst($search, $replace)`**:
    - Replaces the first occurrence of a search string with a replacement.

    ```php
    $replacedFirst = Str::of("apple, apple, cherry")->replaceFirst("apple", "banana"); // $replacedFirst = "banana, apple, cherry"
    ```

14. **`replaceLast($search, $replace)`**:
    - Replaces the last occurrence of a search string with a replacement.

    ```php
    $replacedLast = Str::of("apple, apple, cherry")->replaceLast("apple", "banana"); // $replacedLast = "apple, banana, cherry"
    ```

15. **`singular()`**:
    - Converts the string to its singular form.

    ```php
    $singular = Str::of("apples")->singular(); // $singular = "apple"
    ```

16. **`plural()`**:
    - Converts the string to its plural form.

    ```php
    $plural = Str::of("apple")->plural(); // $plural = "apples"
    ```

17. **`camel()`**:
    - Converts the string to camelCase.

    ```php
    $camel = Str::of("hello_world")->camel(); // $camel = "helloWorld"
    ```

18. **`snake($delimiter = '_')`**:
    - Converts the string to snake_case.

    ```php
    $snake = Str::of("HelloWorld")->snake(); // $snake = "hello_world"
    ```

19. **`ucfirst()`**:
    - Converts the first character of the string to uppercase.

    ```php
    $ucfirst = Str::of("hello, world")->ucfirst(); // $ucfirst = "Hello, world"
    ```

20. **`ucsplit($delimiter = ' ', $limit = null)`**:
    - Splits a string into an array using a delimiter and converts the first character of each word to uppercase.

    ```php
    $ucsplit = Str::of("hello world")->ucsplit(); // $ucsplit = ["Hello", "World"]
    ```

Certainly! Here are more important Fluent Strings methods without any repetition:

21. **`start($prefix)`**:
    - Prepends a string with a given prefix if it doesn't already start with it.

    ```php
    $prefixed = Str::of("world")->start("Hello, "); // $prefixed = "Hello, world"
    ```

22. **`endsWith($needles)`**:
    - Checks if the string ends with any of the given suffixes.

    ```php
    $endsWith = Str::of("Hello, world")->endsWith(["world", "universe"]); // $endsWith = true
    ```

23. **`containsAll($needles)`**:
    - Checks if the string contains all of the given substrings.

    ```php
    $containsAll = Str::of("Hello, world")->containsAll(["Hello", "world"]); // $containsAll = true
    ```

24. **`is($value)`**:
    - Compares the string to another string to check if they are equal.

    ```php
    $isEqual = Str::of("Hello, world")->is("Hello, world"); // $isEqual = true
    ```

25. **`trim($characters = null)`**:
    - Removes leading and trailing whitespace (or specified characters) from the string.

    ```php
    $trimmed = Str::of("  Hello, world  ")->trim(); // $trimmed = "Hello, world"
    ```

26. **`slice($start, $length = null)`**:
    - Retrieves a portion of the string, starting from a specified position and optionally with a specified length.

    ```php
    $sliced = Str::of("Hello, world")->slice(7, 5); // $sliced = "world"
    ```

27. **`replaceMatches($pattern, $replacement)`**:
    - Replaces all occurrences of a regular expression pattern with a replacement.

    ```php
    $replacedMatches = Str::of("apple, banana, cherry")->replaceMatches("/a\w+/", "fruit"); // $replacedMatches = "fruit, fruit, fruit"
    ```

28. **`scan($pattern, $callback = null)`**:
    - Searches the string for matches to a regular expression pattern and optionally applies a callback function to each match.

    ```php
    $matches = Str::of("The price is $10 and $20.")->scan("/\$\d+/", function ($match) {
        return (int)str_replace('$', '', $match);
    });
    // $matches = [10, 20]
    ```


## DATABASE
---
Laravel has made processing with database very easy. Laravel currently supports following 4 databases −

MySQL
Postgres
SQLite
SQL Server

Database
---
Almost every modern web application interacts with a database. Laravel makes interacting with databases extremely simple across a variety of supported databases using raw SQL, a fluent query builder, and the Eloquent ORM. Currently, Laravel provides first-party support for five databases:

MariaDB 10.3+ (Version Policy)
MySQL 5.7+ (Version Policy)
PostgreSQL 10.0+ (Version Policy)
SQLite 3.8.8+
SQL Server 2017+ (Version Policy)

### RAW SQL QUERY
---
The DB facade provides methods for each type of query: select, update, insert, delete, and statement.

```bash
use Illuminate\Support\Facades\DB;
SELECT
$users = DB::select('select * from users where active = ?', [1]); // [1] is active value

INSERT
DB::insert('insert into users (id, name) values (?, ?)', [1, 'Marc']);

UPDATE
DB::update(
    'update users set votes = 100 where name = ?',
    ['Anita']
);

DELETE
DB::delete('delete from users where id = ?',[2]);
```
Database Transactions
---
You may use the transaction method provided by the DB facade to run a set of operations within a database transaction. If an exception is thrown within the transaction closure, the transaction will automatically be rolled back and the exception is re-thrown. If the closure executes successfully, the transaction will automatically be committed. You don\'t need to worry about manually rolling back or committing while using the transaction method:
```bash
DB::transaction(function () {
    DB::update('update users set votes = 1');
 
    DB::delete('delete from posts');
});
```

## Database: Query Builder
---
You may use the table method provided by the DB facade to begin a query. The table method returns a fluent query builder instance for the given table, allowing you to chain more constraints onto the query and then finally retrieve the results of the query using the get method:

```bash
DB::table('users')->get();

DB::table('users')
->where('id', $user->id)
->update(['active' => true]);
```

### Aggregate Function
---
The query builder also provides a variety of methods for retrieving aggregate values like count, max, min, avg, and sum.

```bash
DB::table('orders')
    ->where('finalized', 1)
     ->avg('price');
 DB::table('users')->count() or ->max('price');
```
### Select Statements Of Query Builder
---
Select Statement is used to retrive specific column values From database table;
```bash
DB::table('users')
            ->select('name', 'email as user_email')
            ->get();
```
### Raw Expression Of Query Builder
---
* Raw Methods
```bash
$orders = DB::table('orders')
                ->select('department', DB::raw('SUM(price) as total_sales'))
                ->groupBy('department')
                ->havingRaw('SUM(price) > ?', [2500])
                ->get();
```

### Joins Of Query Builder
---
Inner Join will be used only join that method add with -> (chaining);

```bash
$users = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();
```

### Left Join / Right Join Clause
---
```bash
$users = DB::table('users')
            ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
            ->get();
 
$users = DB::table('users')
            ->rightJoin('posts', 'users.id', '=', 'posts.user_id')
            ->get();
```
### Where Clauses of Query Builder
---
Multiple Condition is used in query builder by where();
```bash
$users = DB::table('users')->where('votes', 100)->get();
```

With Operator
>= , <>, 'like','T%'
```bash
DB::table('users')
        ->where('name', 'like', 'T%')
        ->get();
```
or 
* Multiple Condition may also with array

```bash
$users = DB::table('users')->where([
    ['status', '=', '1'],
    ['subscribed', '<>', '1'],
])->get();
```
* orWhere Clauses for or condition in query
---
```bash
$users = DB::table('users')
                    ->where('votes', '>', 100)
                    ->orWhere('name', 'John')
                    ->get();

// another query 
                $users = DB::table('users')
            ->where('votes', '>', 100)
            ->orWhere(function($query) {
                $query->where('name', 'Abigail')
                      ->where('votes', '>', 50);
            })
            ->get();

            same as raw query follow as

select * from users where votes > 100 or (name = 'Abigail' and votes > 50)

// another query

$users = DB::table('users')
           ->where('name', '=', 'John')
           ->where(function ($query) {
               $query->where('votes', '>', 100)
                     ->orWhere('title', '=', 'Admin');
           })
           ->get();

           same as
select * from users where name = 'John' and (votes > 100 or title = 'Admin')

```

### Where not Clause
---
The whereNot and orWhereNot methods may be used to negate a given group of query constraints.
```bash
$products = DB::table('products')
                ->whereNot(function ($query) {
                    $query->where('clearance', true)
                          ->orWhere('price', '<', 10);
                })
                ->get();
```
### Additional Where Clauses
---
```bash
->whereBetween('votes', [1, 100]) for between query
->whereNotBetween('votes', [1, 100]) for not between query
->whereIn('id', [1, 2, 3]) for keyword In query
->whereNotIn('id', [1, 2, 3]) for keyword Not In query
 ->whereNull('updated_at') for null constraints value
 ->whereNotNull('updated_at') for not null constraints value
 ->whereDate('created_at', '2016-12-31') for the specific date
```

### Ordering, Grouping, Limit & Offset
---
orderBy : The orderBy method allows you to sort the results of the query by a given column.
It may also multiple Ordering ->orderBy();
```bash
$users = DB::table('users')
                ->orderBy('name', 'desc')->get();
```

* The latest & oldest Methods

latest() or oldest() is for ordering by date.
```bash
$user = DB::table('users')->latest()->first();
```
* The groupBy & having Methods
```bash
$users = DB::table('users')
                ->groupBy('account_id')
                ->having('account_id', '>', 100)->get();
```

* Limit & Offset
The limit() and offset() methods are used to define perspectively skip() and take() methods in laravel.

```bash
$users = DB::table('users')->skip(10)->take(5)->get();

or it may also used follow as

$users = DB::table('users')->offset(10)->limit(5)->get();
```

### Insert Statements in Query Builder
---
The query builder also provides an insert method that may be used to insert records into the database table. The insert method accepts an array of column names and values:

```bash
DB::table('users')->insert([
    'email' => 'kayla@example.com',
    'votes' => 0
]);

or multiple records by passing as arrrays of arrays

DB::table('users')->insert([
    ['email' => 'picard@example.com', 'votes' => 0],
    ['email' => 'janeway@example.com', 'votes' => 0],
]);
```
### Update Statements in Query Builder
---
 the query builder can also update existing records using the update method. The update method.
 ```bash
 $affected = DB::table('users')
              ->where('id', 1)
              ->update(['votes' => 1]);
 ```
 Update Or Insert
 Sometimes you may want to update an existing record in the database or create it if no matching record exists.
 ```bash
 DB::table('users')
    ->updateOrInsert(
        ['email' => 'john@example.com', 'name' => 'John'],
        ['votes' => '2']
    );
 ```
 ### Delete Statements in Query Builder
 ---
 The query builder's delete method may be used to delete records from the table. The delete method returns the number of affected rows.
 ```bash
 $deleted = DB::table('users')->delete();
$deleted = DB::table('users')->where('votes', '>', 100)->delete();

to remove entire table with stracture and all records
DB::table('users')->truncate();
 ```
 ## Eloquent ORM
 ---
Eloquent ORM (Object Relation Mapper) is easy to use for users who know how to use objects in PHP. The ORM is an important feature of the Laravel framework, considered a powerful and expensive feature of Laravel. The ORM works with database objects and is used to make relationships with database tables. Each table of the database is mapped with a particular eloquent model. The model object contains various methods to retrieve and update data from the database table. Eloquent ORM can be used with multiple databases by implementing ActiveMethod. This feature makes database-related tasks, such as defining relationships, simpler by defining the database tables.

#### Is "DB Model" worked with Qeury Builder / Raw Sql Query ?
---
We won't have to use Model if we're using Query Builder / Raw Sql Query.

```bashP
Using Model in ORM
$users = Users::get(['first_name']);

Using Query Builder
$users = DB::table('users')->get(['first_name']);
```

#### Eloquent Model Conventions
---

It is known that ELOQEUNT ORM is used for MODEL.

```bash
class Flight extends Model
{
}
```
#### Table Names
---
If your model's corresponding database table does not fit this convention, you may manually specify the model's table name by defining a table property on the model:

```bash
class Flight extends Model
{ 
   # corresponding table name 'flights';
   # for not corresponding, use following.
    protected $table = 'my_flights';
}
or
 # corresponding table Model User;
class UserModel extends Model
{ 
   # for not corresponding Model, use following.
     protected $table = 'users';
}
```

#### Primary Keys
---
The eloquent model considers that each table has a primary key named 'id'. We can override this convention by providing a different name to the $primarykey attribute.

```bash
class Flight extends Model
{ 
   protected $primaryKey = 'flight_id';
   
}
```

#### Retrieving Models for Select  in ORM
---
It may be used in Blade/controller file by calling Model Namespace.
The model's all method will retrieve all of the records from the model's associated database table.
```bash
use App\Models\Flight;
# $flights = Flight::all();
foreach (Flight::all() as $flight) {
    echo $flight->name;
}
```
#### Building Queries
---
We can add additional constraints to queries and then invoke the get method to retrieve the results.The First Method or Constraints must be joined with model by scope resulotion operator(::).the next constraints or methods will use chainging operator (->).
```bash
$flights = Flight::where('active', 1)->orderBy('name')->take(10)->get();

or 

Flight::orderBy('name')->get();

```
#### Chunking Results - chunk()
---
Your application may run out of memory if you attempt to load tens of thousands of Eloquent records via the all or get methods. Instead of using these methods, the chunk method may be used to process large numbers of models more efficiently.

```bash
Flight::orderBy('id')->chunk(200, function ($flights) {
    foreach ($flights as $flight) {
    }
});

or it may be used in following system
 $users = User::all();
      $chunkedUsers = $users->chunk(10);
      foreach ($chunkedUsers as $records) {
         foreach($records as $user) {
            echo $user->id."=>".$user->name."";
         }
      }

```
Chunk may be used in query builder
```bash
DB::table('users')->orderBy('id')->chunk(100, function ($users) {
    foreach ($users as $user) {
        echo $user->id."=>".$user->name." ";
         }
      });
```
#### Retrieving Single Models / Aggregates
---
In addition to retrieving all of the records matching a given query, you may also retrieve single records using the "find", "first", or "firstWhere" methods.

```bash
 Retrieve a model by its primary key...
Flight::find(1);

# Retrieve the first model matching the query constraints.

Flight::where('active', 1)->first();
same as
Flight::firstWhere('active', 1);
```
#### Not Found Exception in find() or fist()
---
The findOrFail and firstOrFail methods will retrieve the first result of the query; however, if no result is found, an Illuminate\Database\Eloquent\ModelNotFoundException will be thrown:

```bash
 Flight::findOrFail(1);
 Flight::where('legs', '>', 3)->firstOrFail();
```

In Retrieving with Aggregates Function

```bash
$count = Flight::where('active', 1)->count();
$max = Flight::where('active', 1)->max('price');
```

### Select specifice data of some column with their specific condition with ORM


```php
  
                 $data = Page::where('about_status', '0')
                         ->orWhere('faq_status', '0')
                         ->orWhere('contact_status', '0')
                        ->select('about_details', 'faq_details', 'contact_details')
                          ->get();

        
```

### Inserting Models/Insert Method with ORM
---
To insert a new record into the database, you should instantiate a new model instance and set attributes on the model. Then, call the save method on the model instance.
It's not mandatory to save $fillable or $guard Properties for object instantiate of Model class.

```bash
  public function store(Request $request)
    {
        # Validate the request...
 
        $flight = new Flight; # or new Flight()
        $flight->name = $request->name;
        $flight->email = $request->email;
        $flight->save();
    }
```
Note : The model's "created_at" and "updated_at" timestamps will automatically be set when the save method is called, so there is no need to set them manually.

### UPDATE IN ELOQUENT ORM
---
We should call the model's save method in Update. Again, the "updated_at" timestamp will automatically be updated.
```BASH
$flight = Flight::find(1);
$flight->name = 'Paris to London';
$flight->email = 'm.karimcu@gmail.com';
$flight->save();
```
#### Mass Updates
---
 all flights that are active and have a destination of San Diego will be marked as delayed.

```bash
Flight::where('active', 1)
      ->where('destination', 'San Diego')
      ->update(['delayed' => 1]);
```
Note : The update method expects an array of column and value pairs representing the columns that should be updated. The update method returns the number of affected rows.

### Mass Assignment in Eloquent ORM
---
You may use the create method to "save" a new model using a single PHP statement.
```bash
$flight = Flight::create([
    'name' => 'London to Paris',
    'email' => 'm.karimcu@gmail.com',
]);
```
* Note : However, before using the create method, you will need to specify either a "fillable" or "guarded" property on your model class

### fillable vs $guard methods
---
The guarded attribute is the opposite of fillable attributes. In Laravel, fillable attributes are used to specify those fields which are to be mass assigned. Guarded attributes are used to specify those fields which are not mass assignable.
```bash
protected $guard = [] // all fields will be  mass assigned
protected $fillable = ['name','email'] // Only email & name will be  mass assigned but not others.
```
### Upserts In Eloquent ORM
---
Occasionally, you may need to update an existing model or create a new model if no matching model exists. Like the firstOrCreate method, the updateOrCreate.

```bash
$flight = Flight::updateOrCreate(
    ['departure' => 'Oakland', 'destination' => 'San Diego'],
    ['price' => 99, 'discounted' => 1]
);
```
Note : if a flight exists with a departure location of Oakland and a destination location of San Diego, its price and discounted columns will be updated.

### Deleting Models In Eloquent ORM
---
To delete a model, you may call the delete method on the model instance.
```bash
$flight = Flight::find(1);
$flight->delete();
or
Flight::find(1)->delete();

 or 
 Truncate to remove all records with stractures
 Flight::truncate();
```

#### Deleting An Existing Model By Its Primary Key
---
In addition to accepting the single primary key, the destroy method will accept multiple primary keys, an array of primary keys, or a collection of primary keys:
```bash
Flight::destroy(1);
Flight::destroy(1, 2, 3);
Flight::destroy([1, 2, 3]);
Flight::destroy(collect([1, 2, 3]));
```

#### Deleting Models Using Queries
---
In this example, we will delete all flights that are marked as inactive. Like mass updates, mass deletes will not dispatch model events for the models that are deleted.

```bash
$deleted = Flight::where('active', 0)->delete();
```

### Eloquent: Table Relationships
---
Database hase 3 types of Table Relationships.

#### One To One RelationShip
---
A one-to-one relationship in a database occurs when each row in table 1 has only one related row in table 2.

![Alt Text](https://i.ibb.co/pdTYYBt/one-to-one-relationship.webp "One to One Relationship")

#### One To Many RelationShip
---
A one-to-many relationship occurs when one record in table 1 is related to one or more records in table 2.

![Alt Text](https://i.ibb.co/6WB4gf3/one-to-many-relationship.webp "One To Many RelationShip")

#### Many To Many RelationShip
---
This type of relationship exists when each of the records of the first table can be associated with one or more records of the second table, as well as a single record of the second table may be related to one or more records of the first table. A Many-to-Many relationship is formed by two one-to-many relationships that are connected by an ‘associate table’ or ‘linking table.’ By having fields that are the primary keys of the other two tables, the bridging table connects two tables. The following example will help us comprehend this.

![Alt Text](https://i.ibb.co/RzmCBBS/word-image185.png "Many To Many RelationShip")

or 

two table and associated table/junction table/bridging table.
![Alt Text](https://i.ibb.co/sJwbtPP/many-to-many-relationship-o1.webp "Many To Many RelationShip")


Junction table/bridging Table of Many To Many RelationShip

![Alt Text](https://i.ibb.co/ctHVM6j/many-to-many-relationship-junction-table-o2.webp "Junction table of Many To Many RelationShip")

 * hasOne() for one to one relation table to access data
a User model might be associated with one Phone model. To define this relationship, we will place a phone method on the User model. The phone method should call the hasOne method and return its result.

```bash
class User extends Model
{
    public function phone()
    {
        // Get the phone associated with the user.
        return $this->hasOne(Phone::class);
        or better return $this->hasOne(Phone::class,'foreign_key','local_key'); 
        // foreign_key defines phone table and local key defines user table.
        // foreign_key = user_id , local_key = id of user table.
    }
}
```
Note : The first argument passed to the hasOne method (phone()) is the name of the related model class. Once the relationship is defined, we may retrieve the related record using Eloquent's dynamic properties.

```bash
// to retrieve data from phones table by user id.
$phone = User::find(1)->phone;
```

#### Defining The Inverse Of The Relationship
---
So, we can access the Phone model from our User model. Next, let's define a relationship on the Phone model that will let us access the user that owns the phone. We can define the inverse of a hasOne relationship using the belongsTo method:
```bash
class Phone extends Model
{
     * Get the user that owns the phone.
    public function user()
    {
        return $this->belongsTo(User::class);
        or
         return $this->belongsTo(User::class, 'foreign_key'); // foreign_key = user_id
    }
}
```
Note : If the parent model does not use id as its primary key, or you wish to find the associated model using a different column, you may pass a third argument to the belongsTo method specifying the parent table's custom key:
```bash
return $this->belongsTo(User::class, 'foreign_key', 'owner_key');
```
### One To Many Relationship
---

```bash
class Post extends Model
{
     * Get the comments for the blog post.
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
```
Important Note : Eloquent will automatically determine the proper foreign key column for the Comment model. By convention, Eloquent will take the "snake case" name of the parent model and suffix it with _id. So, in this example, Eloquent will assume the foreign key column on the Comment model is post_id.

 * To Retreive Data from above Relation
 ---
 ```bash
 $comments = Post::find(1)->comments; // ->comments is method name from above
 ```

 Since all relationships also serve as query builders, you may add further constraints to the relationship query by calling the comments method and continuing to chain conditions onto the query:

 ```bash
 $comment = Post::find(1)->comments()
                    ->where('title', 'foo')
                    ->first();
 ```

 Like the hasOne method, you may also override the foreign and local keys by passing additional arguments to the hasMany method:
 ```bash

return $this->hasMany(Comment::class, 'foreign_key');
return $this->hasMany(Comment::class, 'foreign_key', 'local_key');
 ```
 ### One To Many (Inverse) / Belongs To
 Now that we can access all of a post's comments, let's define a relationship to allow a comment to access its parent post. To define the inverse of a hasMany relationship, define a relationship method on the child model which calls the belongsTo method.

 ```bash
 
class Comment extends Model
{
     * Get the post that owns the comment.
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
 ```
 Once the relationship has been defined, we can retrieve a comment's parent post by accessing the post "dynamic relationship property":
 ```bash
$comment = Comment::find(1);
return $comment->post->title;
 ```
 Note : In the example above, Eloquent will attempt to find a Post model that has an id which matches the post_id column on the Comment model.
 Or 

 ```bash
 return $this->belongsTo(Post::class, 'foreign_key');
 ```

 Note : If your parent model does not use "id" as its primary key, or you wish to find the associated model using a different column, you may pass a third argument to the belongsTo method specifying your parent table's custom key:

 ```bash
 * Get the post that owns the comment.
public function post()
{
    return $this->belongsTo(Post::class, 'foreign_key', 'owner_key');
}
 ```

 #### Querying Belongs To Relationships
 ---
 When querying for the children of a "belongs to" relationship, you may manually build the where clause to retrieve the corresponding Eloquent models:
 ```bash
 $posts = Post::where('user_id', $user->id)->get();
 $posts = Post::whereBelongsTo($user)->get();
 ```
 ### Has One Of Many Of Eloquent Relationship
 ---
```bash

 * Get the user\'s most recent order.
public function latestOrder()
{
    return $this->hasOne(Order::class)->latestOfMany();
}

 * Get the user\'s oldest order.

public function oldestOrder()
{
    return $this->hasOne(Order::class)->oldestOfMany();
}
```

## Many To Many Relationships
---
Many-to-many relations are slightly more complicated than hasOne and hasMany relationships. An example of a many-to-many relationship is a user that has many roles and those roles are also shared by other users in the application. For example, a user may be assigned the role of "Author" and "Editor"; however, those roles may also be assigned to other users as well. So, a user has many roles and a role has many users.

Remember, since a role can belong to many users, we cannot simply place a user_id column on the roles table. This would mean that a role could only belong to a single user. In order to provide support for roles being assigned to multiple users, the role_user table is needed. We can summarize the relationship's table structure like so.

```bash
users
    id - integer
    name - string
 
roles
    id - integer
    name - string
 
role_user // junction/linking/associated table
    user_id - integer
    role_id - integer
```

Many-to-many relationships are defined by writing a method that returns the result of the belongsToMany method.
```bash

class User extends Model
{
     * The roles that belong to the user.
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
```
Once the relationship is defined, you may access the user's roles using the roles dynamic relationship property:
```bash
$user = User::find(1); // for single/primary key data
 
foreach ($user->roles as $role) {
    //
}
to retrieve data ,use
$roles = User::find(1)->roles()->orderBy('name')->get();
```
To determine the table name of the relationship's intermediate table, Eloquent will join the two related model names in alphabetical order. However, you are free to override this convention. You may do so by passing a second argument to the belongsToMany method:
```bash
return $this->belongsToMany(Role::class, 'role_user');
```
In addition to customizing the name of the intermediate table, you may also customize the column names of the keys on the table by passing additional arguments to the belongsToMany method.
```bash
return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
```
#### Defining The Inverse Of The Relationship
---
To define the "inverse" of a many-to-many relationship, you should define a method on the related model which also returns the result of the belongsToMany method.
```bash
class Role extends Model
{
     * The users that belong to the role.
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
```

### Retrieving Intermediate Table Columns
let's assume our User model has many Role models that it is related to. After accessing this relationship, we may access the intermediate table using the pivot attribute on the models:

```bash
$user = User::find(1);
foreach ($user->roles as $role) {
    echo $role->pivot->created_at;
}
```
Notice that each Role model we retrieve is automatically assigned a pivot attribute. This attribute contains a model representing the intermediate table.

By default, only the model keys will be present on the pivot model. If your intermediate table contains extra attributes, you must specify them when defining the relationship:
```bash
return $this->belongsToMany(Role::class)->withPivot('active', 'created_by');
```
If the user has to retrieve the standard timestamps in the fields updated_at, created_at in the attribute of the pivot table which is used along with timestamps.
```bash
Return
$this -> belongs ToMany (Role::class)
->with Timestamps ()
->with Pivot( ‘updated_by’, ‘created_by’);
```
#### Filtering Queries Via Intermediate Table Columns
---
You can also filter the results returned by belongsToMany relationship queries using the wherePivot, wherePivotIn, wherePivotNotIn, wherePivotBetween, wherePivotNotBetween, wherePivotNull, and wherePivotNotNull methods when defining the relationship:
```bash
return $this->belongsToMany(Role::class)
                ->wherePivot('approved', 1);
```
Ordering Queries Via Intermediate Table Columns
```bash
return $this->belongsToMany(Badge::class)
                ->where('rank', 'gold')
                ->orderByPivot('created_at', 'desc');
```
Defining Custom Intermediate Table Models

[to know more about pivot](https://laravel.com/docs/9.x/eloquent-relationships#filtering-queries-via-intermediate-table-columns)

* See The Diagram How Pivote works with the two tables.
Role Table data
![alt text](https://i.ibb.co/zng7Yyr/role-pivote.png "Role Table Data")

* and with The User table
![alt text](https://i.ibb.co/2SjhZPV/user-pivote.png "User Table Data")

* See The intermediate Table on role and user tables
![alt text](https://i.ibb.co/KzRvLtR/user-role-pivote.png "User Table Data")

<!-- This Section will be discussed later -->

<!-- Polymorphic Relation can be added here -->

### Querying Relationship Existence
---
When retrieving model records, you may wish to limit your results based on the existence of a relationship. For example, imagine you want to retrieve all blog posts that have at least one comment. To do so, you may pass the name of the relationship to the has and orHas methods:

```bash
// Retrieve all posts that have at least one comment...
$posts = Post::has('comments')->get();
```
You may also specify an operator and count value to further customize the query:

```bash
// Retrieve all posts that have three or more comments...
$posts = Post::has('comments', '>=', 3)->get();
```
Nested has statements may be constructed using "dot" notation. For example, you may retrieve all posts that have at least one comment that has at least one image:
```bash
// Retrieve posts that have at least one comment with images...
$posts = Post::has('comments.images')->get();
```

If you need even more power, you may use the whereHas and orWhereHas methods to define additional query constraints on your has queries, such as inspecting the content of a comment:
```bash
use Illuminate\Database\Eloquent\Builder;
 
// Retrieve posts with at least one comment containing words like code%...
$posts = Post::whereHas('comments', function (Builder $query) {
    $query->where('content', 'like', 'code%');
})->get();
 
// Retrieve posts with at least ten comments containing words like code%...
$posts = Post::whereHas('comments', function (Builder $query) {
    $query->where('content', 'like', 'code%');
}, '>=', 10)->get();
```
### Querying Relationship Absence
---
When retrieving model records, you may wish to limit your results based on the absence of a relationship. For example, imagine you want to retrieve all blog posts that don't have any comments. To do so, you may pass the name of the relationship to the doesntHave and orDoesntHave methods:
```bash
$posts = Post::doesntHave('comments')->get();
```
If you need even more power, you may use the whereDoesntHave and orWhereDoesntHave methods to add additional query constraints to your doesntHave queries, such as inspecting the content of a comment:
```bash
$posts = Post::whereDoesntHave('comments', function (Builder $query) {
    $query->where('content', 'like', 'code%');
})->get();
```

## PolyMorphic Relation in Eloquent ORM
---
A polymorphic relationship allows the child model to belong to more than one type of model using a single association. For example, imagine you are building an application that allows users to share blog posts and videos. In such an application, a Comment model might belong to both the Post and Video models.

#### The diagram of Polymorphic Relationship
---
* One To One Polymorphic Relationship
![alt text](https://i.ibb.co/1X0hsx6/one-one-polymorphic.png "One To One Polymorphic Relationship")

* One To Many Polymorphic Relationship
![alt Text](https://i.ibb.co/xLwxw08/one-many-polymorphic.png "One To Many Polymorphic Relationship")

![alt Text](https://i.ibb.co/C58f222/many-to-many-rpoly.png "Many To Many Polymorphic Relationship")

![alt Text](https://i.ibb.co/CKN2Vq6/Laravel-Many-to-Many-Polymorphic-Relationship-Example.webp "Many To Many Polymorphic Relationship")




### Many To Many PolyMorphic Relation
----
A large number of Polymorphic relationships are also a little difficult to grasp. For example, if you have posts, videos, and tag tables, you’ll need to connect them all to meet your needs, such as having many tags on each post and the same for videos. In addition, several tags are associated with multiple posts or videos. However, we can easily accomplish this with just one table, “taggables.
[To Know Details ,Click Here](https://www.codesolutionstuff.com/laravel-many-to-many-polymorphic-relationship/)

#### Model Structure
---


### Eager Loading
---
When accessing Eloquent relationships as properties, the related models are "lazy loaded". This means the relationship data is not actually loaded until you first access the property. However, Eloquent can "eager load" relationships at the time you query the parent model.


```bash
<?php

class Book extends Model
{
    /**
     * Get the author that wrote the book.
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
```

```bash
$books = Book::all();
foreach ($books as $book) {
    echo $book->author->name;
}
```
 if we have 25 books, the code above would run 26 queries: one for the original book, and 25 additional queries to retrieve the author of each book.

Thankfully, we can use eager loading to reduce this operation to just two queries. When building a query, you may specify which relationships should be eager loaded using the with method:
```bash
$books = Book::with('author')->get();
foreach ($books as $book) {
    echo $book->author->name;
}

To eager Load several pass an array of relationships to the with method:

$books = Book::with(['author', 'publisher'])->get();
```
#### Nested Eager Load
---
To eager load a relationship's relationships, you may use "dot" syntax. For example, let's eager load all of the book's authors and all of the author's personal contacts:
```bash
$books = Book::with('author.contacts')->get();

To do nested eager Load several pass an array of relationships to the with method:
$books = Book::with([
    'author' => [
        'contacts',
        'publisher',
    ],
])->get();
```
#### Nested Eager Loading morphTo Relationships
----
[to know about this ,Click Here](https://laravel.com/docs/9.x/eloquent-relationships#eager-loading)

#### Eager Loading Specific Columns
---
Eloquent allows you to specify which columns of the relationship you would like to retrieve:
```bash
$books = Book::with('author:id,name,book_id')->get();
```
Note : When using this feature, you should always include the "id" column and any relevant foreign key columns in the list of columns you wish to retrieve.

#### Eager Loading By Default
---
```bash
   // The relationships that should always be loaded.

     protected $with = ['author'];
 
    // Get the author that wrote the book.

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
 ```
If you would like to remove an item from the `$with` property for a single query, you may use the without method:
```bash
$books = Book::without('author')->get();
$books = Book::withOnly('genre')->get(); // withonly is to override with 
```
#### Constraining Eager Loads
---
Sometimes you may wish to eager load a relationship but also specify additional query conditions for the eager loading query. You can accomplish this by passing an array of relationships to the with method where the array key is a relationship name and the array value is a closure that adds additional constraints to the eager loading query:
```bash
$users = User::with(['posts' => function ($query) {
    $query->where('title', 'like', '%code%');
    or it may use
     $query->orderBy('created_at', 'desc');
     or it may use
     $query->where('is_active',1);
}])->get();
```

## Inserting & Updating Related Models for PolyMorphic
---
#### The save Method 
---
Next, let's examine the model definitions needed to build this relationship:

```bash
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 # Comment Model Class
class Comment extends Model
{
    
    # Get the parent commentable model (post or video).
    
    public function commentable()
    {
        return $this->morphTo();
    }
}

# Post MOdel Class
 
class Post extends Model
{
   
     # Get all of the post's comments.
     
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}

 # Video Model Class
class Video extends Model
{
   
     # Get all of the video's comments.
  
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
```

```bash
use App\Models\Comment;
use App\Models\Post;
 
$comment = new Comment(['message' => 'A new comment.']);
 
$post = Post::find(1);
 
$post->comments()->save($comment);
same as 
$comment = $post->comments()->create([
    'message' => 'A new comment.',
]);

or Multiple data saving
$post->comments()->saveMany([
    new Comment(['message' => 'A new comment.']),
    new Comment(['message' => 'Another new comment.']),
]);
same as
$post->comments()->createMany([
    ['message' => 'A new comment.'],
    ['message' => 'Another new comment.'],
]);
```
### Database: Pagination
In Laravel, database pagination allows you to divide a large result set into smaller "pages," making it more manageable to display and navigate through data. Laravel provides a clean and straightforward way to implement pagination. Here are the main methods and concepts related to database pagination in Laravel:

1. **Paginating Query Results:**

   To paginate the results of a query, you can use the `paginate` method on the query builder or Eloquent model.

   ```php
   // Query builder example
   $results = DB::table('your_table')->paginate(10);

   // Eloquent model example
   $results = YourModel::paginate(10);
   ```

   This will retrieve 10 records per page from the specified table or model.

2. **Displaying Paginated Results in Blade Views:**

   In your Blade view, you can use the `links` method provided by the paginated result to render pagination links.

   ```blade
   {{-- Displaying results --}}
   @foreach ($results as $result)
       {{-- Your result display logic --}}
   @endforeach

   {{-- Display pagination links --}}
   {{ $results->links() }}
   ```

   The `links` method generates HTML links for pagination.

3. **Customizing the Number of Results Per Page:**

   You can customize the number of results per page by passing the desired count to the `paginate` method.

   ```php
   $results = DB::table('your_table')->paginate(20);
   ```

4. **Customizing the Query Parameter for Page Number:**

   By default, Laravel uses the `page` query parameter for page number. You can customize this by using the `onEachSide` method.

   ```php
   $results = DB::table('your_table')->paginate(10)->onEachSide(5);
   ```

   The `onEachSide` method determines how many additional page links are shown on each side of the current page link.

5. **Getting Paginated Results in Controller:**

   If you need to pass paginated results to a view from a controller:

   ```php
   public function index()
   {
       $results = DB::table('your_table')->paginate(10);

       return view('your_view', ['results' => $results]);
   }
   ```

6. **Manually Creating a Paginator Instance:**

   If you need more control, you can manually create a paginator instance:

   ```php
   use Illuminate\Pagination\Paginator;

   $paginator = new Paginator($items, $perPage, $currentPage);
   ```

   Here, `$items` is the collection of items to paginate, `$perPage` is the number of items per page, and `$currentPage` is the current page.

In addition to the `paginate` method, Laravel provides `simplePaginate` and `cursorPaginate` methods for handling pagination in slightly different ways. Let's explore each method:

7. **`paginate` Method:**

The `paginate` method is used for traditional pagination where the paginated data is returned along with the pagination links.

```php
$perPage = 10;

// Eloquent model example
$results = YourModel::paginate($perPage);
```

In your Blade view:

```blade
@foreach ($results as $result)
    {{-- Your result display logic --}}
@endforeach

{{ $results->links() }}
```

8. **`simplePaginate` Method:**

The `simplePaginate` method is similar to `paginate` but only returns the next and previous links, making it more suitable for simple paginations without the need for numbered page links.

```php
$perPage = 10;

// Eloquent model example
$results = YourModel::simplePaginate($perPage);
```

In your Blade view:

```blade
@foreach ($results as $result)
    {{-- Your result display logic --}}
@endforeach

{{ $results->links() }}
```

9. **`cursorPaginate` Method:**

The `cursorPaginate` method is used for cursor-based pagination. Instead of relying on page numbers, it uses "cursors" to navigate through the data. This is often more efficient for large datasets.

```php
$perPage = 10;

// Eloquent model example
$results = YourModel::cursorPaginate($perPage);
```

In your Blade view:

```blade
@foreach ($results as $result)
    {{-- Your result display logic --}}
@endforeach

{{ $results->links() }}
```

#### Differences:

- `paginate` and `simplePaginate` are based on traditional page numbers, while `cursorPaginate` uses cursor-based pagination.
  
- `paginate` returns the paginated data along with all the pagination links, while `simplePaginate` returns only the next and previous links.

- `cursorPaginate` is often more efficient for large datasets as it doesn't rely on offset calculations.

#### Choosing Between Them:

- Use `paginate` for typical paginations with numbered page links.

- Use `simplePaginate` when you don't need or want to show all the page numbers and just need next and previous links.

- Use `cursorPaginate` for large datasets where efficient cursor-based navigation is preferred.

Choose the method that best fits your specific use case and performance requirements.

#### **Database : Soft Delete, Restore and Parmanently Delete**
---
Certainly! In Laravel, implementing a professional product delete, soft delete, and restore functionality involves using Laravel's Eloquent ORM along with database migrations and controllers. Soft delete is a way to "mark" a record as deleted without actually removing it from the database.

1. **Soft Deletes:**
   Laravel's Eloquent supports soft deletes out of the box. Add the `SoftDeletes` trait to your `Product` model:

   ```php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
Schema::table('flights', function (Blueprint $table) {
    $table->softDeletes();
});
 
Schema::table('flights', function (Blueprint $table) {
    $table->dropSoftDeletes();
});
   ```

   Also, don't forget to add a `deleted_at` column to your `products` table. If it's not already there, you can create a migration:

   ```bash
   php artisan make:migration add_deleted_at_to_products_table --table=products
   ```

   In the generated migration file, add:

   ```php
   public function up()
   {
       Schema::table('products', function ($table) {
           $table->softDeletes();
       });
   }
   ```

   Then run:

   ```bash
   php artisan migrate
   ```

3. **Controller:**
   In your controller, implement methods for delete, soft delete, restore, and permanently delete.

   ```php
   namespace App\Http\Controllers;

   use App\Models\Product;
   use Illuminate\Http\Request;

   class ProductController extends Controller
   {
       // Soft delete
       public function softDelete($id)
       {
           $product = Product::find($id);
           $product->delete();

           return redirect()->route('products.index')
               ->with('success', 'Product soft deleted successfully.');
       }

       // Restore soft deleted product
       public function restore($id)
       {
           Product::withTrashed()->where('id', $id)->restore();

           return redirect()->route('products.index')
               ->with('success', 'Product restored successfully.');
       }

       // Permanently delete from bin box
       public function deleteFromBin($id)
       {
           Product::withTrashed()->where('id', $id)->forceDelete();

           return redirect()->route('products.index')
               ->with('success', 'Product permanently deleted.');
       }
   }

   public function forceDeleteFromHistory($id)
   {
       // Force delete from soft delete history
       Product::withTrashed()->find($id)->history()->forceDelete();

       return redirect()->back()->with('success', 'Product permanently deleted from history.');
   }

   public function restoreFromHistory($id)
   {
       // Restore from soft delete history
       Product::withTrashed()->find($id)->history()->restore();

       return redirect()->back()->with('success', 'Product restored from history successfully.');
   }


   ```

4. **Routes:**
   Define routes for your controller methods in `routes/web.php` or `routes/api.php`.

   ```php
   use App\Http\Controllers\ProductController;

   Route::delete('/products/{id}/soft-delete', [ProductController::class, 'softDelete']);
   Route::patch('/products/{id}/restore', [ProductController::class, 'restore']);
   Route::delete('/products/{id}/delete-from-bin', [ProductController::class, 'deleteFromBin']);

Route::put('/product/restore/history/{id}', [ProductController::class, 'restoreFromHistory']);
Route::delete('/product/force-delete/history/{id}', [ProductController::class, 'forceDeleteFromHistory']);
   ```

5. **View:**
   Create a view to display your products and buttons for soft delete, restore, and permanently delete.

   ```blade
   <!-- Display products -->
   @foreach($products as $product)
       <tr>
           <td>{{ $product->name }}</td>
           <td>{{ $product->description }}</td>
           <td>
               <!-- Soft delete button -->
               <form action="{{ url("/products/{$product->id}/soft-delete") }}" method="post">
                   @csrf
                   @method('delete')
                   <button type="submit">Soft Delete</button>
               </form>
               <!-- Restore button -->
               <form action="{{ url("/products/{$product->id}/restore") }}" method="post">
                   @csrf
                   @method('patch')
                   <button type="submit">Restore</button>
               </form>
               <!-- Permanently delete button -->
               <form action="{{ url("/products/{$product->id}/delete-from-bin") }}" method="post">
                   @csrf
                   @method('delete')
                   <button type="submit">Delete from Bin</button>
               </form>
           </td>
       </tr>
   @endforeach
   ```

#### **More**
Certainly! Laravel provides additional methods for working with soft deleted records, especially when using the `SoftDeletes` trait. Here are examples with `history()->restore()`, `history()->forceDelete()`, `withTrashed()`, `trashed()`, and `onlyTrashed()`:

1. **Restore Method (`history()->restore()`):**

   Laravel provides the `restore` method, which you can use on a query builder to restore soft-deleted records.

   ```php
   // Restore a single soft-deleted product by ID
   Product::withTrashed()->find($id)->restore();

   // Restore all soft-deleted products
   Product::withTrashed()->restore();
   ```

2. **Force Delete Method (`history()->forceDelete()`):**

   The `forceDelete` method is used to permanently remove a record, even if it's soft-deleted.

   ```php
   // Permanently delete a single soft-deleted product by ID
   Product::withTrashed()->find($id)->forceDelete();

   // Permanently delete all soft-deleted products
   Product::withTrashed()->forceDelete();
   ```

3. **withTrashed() and trashed():**

   The `withTrashed` method retrieves all records, including soft-deleted ones, while `trashed` is used to filter only soft-deleted records.

   ```php
   // Retrieve all products, including soft-deleted ones
   $products = Product::withTrashed()->get();

   // Retrieve only soft-deleted products
   $trashedProducts = Product::onlyTrashed()->get();
   ```

4. **onlyTrashed():**

   The `onlyTrashed` method is used to retrieve only soft-deleted records.

   ```php
   // Retrieve only soft-deleted products
   $trashedProducts = Product::onlyTrashed()->get();
   ```

Here's an updated example of the controller methods to include these functionalities:

```php
use App\Models\Product;

public function restoreProduct($id)
{
    // Restore soft deleted product
    Product::withTrashed()->find($id)->restore();

    return redirect()->back()->with('success', 'Product restored successfully.');
}

public function deleteFromBin($id)
{
    // Permanent delete (from bin)
    Product::withTrashed()->find($id)->forceDelete();

    return redirect()->back()->with('success', 'Product permanently deleted.');
}

public function allProducts()
{
    // Retrieve all products, including soft-deleted ones
    $products = Product::withTrashed()->get();

    // Retrieve only soft-deleted products
    $trashedProducts = Product::onlyTrashed()->get();

    return view('products.index', compact('products', 'trashedProducts'));
}
```

Now, you can use these methods in your routes to perform various actions on your Laravel products. Adjust the examples based on your application's specific needs.


## Mail Sending laravel 8 and 9 version
---
Step on how to send email or mail from localhost using laravel 9 apps:

Step 1 – Install Laravel 9 App.

Step 2 – Configuration SMTP in .env

Step 3 – Create Mailable Class

Step 4 – Add Email Send Route

Step 5 – Create Directory And Blade View

Step 6 – Create Email Controller

Step 7 – Run Development Server

Step 2 :
In first step, you have to add send mail configuration with mail driver, mail host, mail port, mail username, mail password so laravel 8/9 will use those sender configuration for sending email. So you can simply add as like following.
```bash
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=mygoogle@gmail.com
MAIL_PASSWORD=rrnnucvnqlbsl
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=mygoogle@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```
Step 3 : 
```bash
php artisan make:mail Mail/NotifyMail
```
Open the file and update the code below.
```bash
<?php

namespace App\Mail\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;

class Websitemail extends Mailable
{
    use Queueable, SerializesModels;
    public $subject,$body,$pdf;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail_subject,$mail_body,$mail_pdf)
    {
       $this->subject = $mail_subject;
       $this->body = $mail_body;
       $this->pdf = $mail_pdf;
    }


    /**
     * Get the attachments for the message.
     *
     * @return array
     */
  
    public function build()
    {
       return $this->view('mail.mail')->with([
        'subject'=>$this->subject // this is for dynamic subject in  calling the class
       ]);

       or 
       return $this->subject('Test Email')->view('email.email'); // no dynamic Subject

       or 
        return $this->view('mail.invoiceEmail')->attachData($this->pdf, 'customer-invoice.pdf', [
            'mime' => 'application/pdf',
        ]);
    }
}
```
Note : By whatever name you will create an email template. That you want to send. Do not forget to add an email template name in build class of the above created notifymail class.

Step 4:
In next step, we will create email template named mail.blade.php inside resources/views/emails directory. That’s why we have added view name email

Step 4 – Add Send Email Route
```bash
Route::get('send-email', [SendEmailController::class, 'index']);
```
Step 5 – Create Directory And Blade View
```bash
<!DOCTYPE html>
<html>
<head>
 <title>Laravel 9 Send Email Example</title>
</head>
<body>
 
 <h1>This is test mail from Tutsmake.com</h1>
 <p>Laravel 9 send email example</p>
 
</body>
</html> 
```
Step 6
Use The mail in Controller.for example like following. Or With PDF , use the following.
```bash
use Barryvdh\DomPDF\Facade\Pdf;
$pdf = Pdf::loadView('pdf.invoice', compact('billingName', 'date', 'orderId', 'selectedProducts', 'totalPrice'));

//*MAIL SEND
 Mail::to(auth()->user()->email)->send(new Websitemail($subject,$message, $pdf->output())); // if the pdf needs to send.

 // this error handling for if failed while mailing

  if (Mail::failures()) {
           return response()->Fail('Sorry! Please try again latter');
      }else{
           return response()->success('Great! Successfully send in your mail');
         }
```
## Database : Migrations
---
The Laravel Schema facade provides database agnostic support for creating and manipulating tables across all of Laravel's supported database systems. Typically, migrations will use this facade to create and modify database tables and columns.

You may use the make:migration Artisan command to generate a database migration. The new migration will be placed in your database/migrations directory. Each migration filename contains a timestamp that allows Laravel to determine the order of the migrations:
```bash
php artisan make:migration create_flights_table
```
#### Migration Structure
---
A migration class contains two methods: up and down. The up method is used to add new tables, columns, or indexes to your database, while the down method should reverse the operations performed by the up method.
```bash
<?php

return new class extends Migration
{
     * Run the migrations.
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }
     * Reverse the migrations.

    public function down()
    {
        Schema::drop('flights');
    }
};
```
#### Setting The Migration Connection
----
If your migration will be interacting with a database connection other than your application's default database connection, you should set the $connection property of your migration:
```bash

 # The database connection that should be used by the migration.

protected $connection = 'my_db'; // used to connect another database in this table
 # Run the migrations.
public function up()
{
    //
}
```
#### What is Migration?

In Laravel, migration is the process of version controlling your database schema. It allows you to modify your database structure using PHP code rather than SQL. Laravel migrations use an incremental and deterministic approach, and they provide a simple way to create and modify database tables.

#### Timestamps in Migrations

Laravel migrations follow a timestamp-based naming convention to ensure the order of execution. The migration file names include a timestamp to indicate when the migration was created.

#### **CLI Commands:**
---

#### 1. **Creating a Migration:**
   To create a new migration file, use the `make:migration` Artisan command:

   ```bash
   php artisan make:migration create_table_name
   ```

   Example:

   ```bash
   php artisan make:migration create_users_table
   ```

#### 2. **Adding a Field:**
   To add a new field to an existing table, use the `add` method in the `up` method of the migration:

   ```php
   public function up()
   {
       Schema::table('table_name', function (Blueprint $table) {
           $table->string('new_column');
       });
   }
   ```

#### 3. **Dropping a Field:**
   To drop an existing field from a table, use the `dropColumn` method:

   ```php
   public function up()
   {
       Schema::table('table_name', function (Blueprint $table) {
           $table->dropColumn('column_to_drop');
       });
   }
   ```

#### 4. **Changing a Column:**
   To change the definition of an existing column, use the `change` method:

   ```php
   public function up()
   {
       Schema::table('table_name', function (Blueprint $table) {
           $table->string('column_to_change')->nullable()->change();
       });
   }
   ```

#### 5. **Modifying Column Datatype:**
   To modify the datatype of an existing column, use the `modify` method:

   ```php
   public function up()
   {
       Schema::table('table_name', function (Blueprint $table) {
           $table->bigInteger('column_to_modify')->change();
       });
   }


  // More 

       public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->string('amenities_id',20)->change();
            $table->string('ptype_id',20)->change();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->unsignedBigInteger('amenities_id')->change();
            $table->integer('ptype_id')->unsigned()->change();
        });
    }

   ```

#### 6. **Raw MySQL Query:**
   If you need to execute a raw MySQL query, you can use the `statement` method:

   ```php
   public function up()
   {
       DB::statement('ALTER TABLE table_name ADD new_column INT');
   }
   ```

### Running Migrations:

#### 1. **Migrate Up:**
   To run all pending migrations, use the following command:

   ```bash
   php artisan migrate
   ```

#### 2. **Rollback:**
   To rollback the last database migration, use the following command:

   ```bash
   php artisan migrate:rollback
   ```

#### 3. **Status:**
   To view the status of migrations, including whether they are up or down, use the following command:

   ```bash
   php artisan migrate:status
   ```

#### 7. **Renaming a Column:**
   To rename an existing column, use the `renameColumn` method:

   ```php
   public function up()
   {
       Schema::table('table_name', function (Blueprint $table) {
           $table->renameColumn('old_column_name', 'new_column_name');
       });
   }
   ```

#### 8. **Adding Foreign Key:**
   To add a foreign key constraint, use the `foreign` method:

   ```php
   public function up()
   {
       Schema::table('child_table', function (Blueprint $table) {
           $table->foreign('parent_id')->references('id')->on('parent_table')->onDelete('cascade');
       });
   }
   ```

#### 9. **Dropping Foreign Key:**
   To drop a foreign key constraint, use the `dropForeign` method:

   ```php
   public function up()
   {
       Schema::table('child_table', function (Blueprint $table) {
           $table->dropForeign(['parent_id']);
       });
   }
   ```

#### 10. **Composite Index:**
   To create a composite index, use the `index` method with an array of columns:

   ```php
   public function up()
   {
       Schema::table('table_name', function (Blueprint $table) {
           $table->index(['column1', 'column2']);
       });
   }
   ```

#### 11. **Unique Constraint:**
   To add a unique constraint to a column, use the `unique` method:

   ```php
   public function up()
   {
       Schema::table('table_name', function (Blueprint $table) {
           $table->unique('column_name');
       });
   }
   ```

#### 12. **Dropping a Table:**
   To drop an existing table, create a new migration file and use the `dropIfExists` method:

   ```php
   public function up()
   {
       Schema::dropIfExists('table_name');
   }
   ```

#### 13. **Using Raw Queries for Table Creation:**
   If you need to use a raw SQL query for table creation, you can use the `DB::statement` method:

   ```php
   public function up()
   {
       DB::statement('CREATE TABLE table_name (id INT, name VARCHAR(255))');
   }
   ```

#### **Running Migrations:**
---

#### 4. **Rollback Specific Batch:**
   To rollback migrations in a specific batch, use the `--batch` option:

   ```bash
   php artisan migrate:rollback --batch=3
   ```

#### 5. **Rollback and Migrate Fresh:**
   To rollback all migrations and run them again, use the following commands:

   ```bash
   php artisan migrate:refresh
   ```

#### 14. **Rollback the Last Batch:**
To rollback the last batch of migrations, you can use the `--step` option:

```bash
php artisan migrate:rollback --step=1
```

This will rollback the last batch of migrations.

#### 15. **Rollback All Batches:**
To rollback all batches of migrations and revert the database to its initial state, you can use the `reset` command:

```bash
php artisan migrate:reset
```

#### 16. **Rollback and Migrate Specific Migration:**
If you want to rollback and then migrate up to a specific migration, you can use the `--to` option:

```bash
php artisan migrate:rollback --to=20231118123456
```

Replace `20231118123456` with the timestamp of the migration you want to rollback to.

#### 17. **Rollback and Migrate Fresh (Including Seeds):**
To rollback all migrations, run them again, and re-run all seeders, you can use the `--seed` option with the `refresh` command:

```bash
php artisan migrate:refresh --seed
```

#### 18. **Reset Migrations and Seed Database:**
To reset all migrations, drop all tables, and re-run all migrations and seeders, you can use the following command:

```bash
php artisan migrate:reset --seed
```

#### 19. **View Migration Status:**
To view the status of migrations and check which ones have been run, you can use the `migrate:status` command:

```bash
php artisan migrate:status
```

#### 20. **Re-run the Last Migration:**
If you need to re-run the last migration, you can use the `--path` option with the `migrate` command:

```bash
php artisan migrate --path=/database/migrations/20231118123456_create_example_table.php
```

Replace `20231118123456_create_example_table.php` with the filename of your last migration.

#### 21. **Rollback and Migrate All Batches:**
To rollback all batches and re-run all migrations, you can use the `refresh` command:

```bash
php artisan migrate:refresh
```
#### 25. **Renaming a Table:**
   To rename an existing table, use the `rename` method:

   ```php
   public function up()
   {
       Schema::rename('old_table_name', 'new_table_name');
   }
   ```

#### 26. **Migrate in a Specific Environment:**
   To run migrations in a specific environment (e.g., testing), use the `--env` option:

   ```bash
   php artisan migrate --env=testing
   ```

#### 27. **Create Table If Not Exists:**
   To create a table only if it doesn't exist, use the `create` method with the `ifNotExists` option:

   ```php
   public function up()
   {
       Schema::create('table_name', function (Blueprint $table) {
           $table->ifNotExists();
           // ... other columns
       });
   }
   ```
#### 31. **Show Raw SQL Queries:**
   To display the raw SQL queries without actually running the migrations, use the `--pretend` option:

   ```bash
   php artisan migrate --pretend
   ```

   This command will output the SQL statements that would be executed if the migrations were run without actually modifying the database.

#### 32. **Show Raw SQL Queries with Seed:**
   If you want to see the raw SQL queries for seeding as well, you can combine the `--pretend` option with the `--seed` option:

   ```bash
   php artisan migrate --pretend --seed
   ```

   This will show you the SQL queries for both migrations and seeders.

#### 33. **Show Raw SQL Queries for a Specific Migration:**
   If you want to see the raw SQL queries for a specific migration, you can use the `--pretend` option with the `--path` option:

   ```bash
   php artisan migrate --pretend --path=/database/migrations/20231118123456_create_example_table.php
   ```

   Replace `20231118123456_create_example_table.php` with the filename of your specific migration.


### Database : Tables
---
To create a new database table, use the create method on the Schema facade. The create method accepts two arguments: the first is the name of the table, while the second is a closure which receives a "Blueprint" object that may be used to define the new table:

Dependency Object : In software engineering, dependency injection (Blueprint) is a design pattern in which an object (Blueprint) or function receives other objects ($table) or functions that it (Blueprint) depends on.
```bash
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->boolean('is_available')->default(true);
            $table->date('manufacture_date');
            $table->dateTime('expiry_date_time');
            $table->uuid('uuid')->unique();
            $table->string('sku')->unique();
            $table->index('name');
            $table->point('location')->nullable();
            $table->virtualAs('quantity * price');
            $table->storedAs('total_price', 'quantity * price');
            $table->comment('A comment about the product');
            $table->string('custom_collation_column')->collation('utf8mb4_bin');
            $table->json('images')->nullable();
            $table->decimal('discounted_price', 10, 2)->nullable();
            $table->dateTime('discount_start')->nullable();
            $table->dateTime('discount_end')->nullable();
            $table->json('multiple_images')->nullable();
            $table->foreignId('category_id')->constrained('categories'); // or
            $table->foreignId('category_id')->constrained()->onUpdate('cascade'); // or
            $table->foreignId('category_id')->constrained()->onDelete('restrict')->onUpdate('restrict');
            $table->foreign(['user_id', 'post_id'])->references(['id', 'post_id'])->on('users_posts')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('sub_sub_category_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->integer('brand_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('brand_id')->constrained('brands', 'brand_id');
            $table->foreignId('supplier_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('category_id'); // Unsigned big integer for the foreign key
            $table->foreignId('warehouse_id')->constrained('warehouses');
            $table->unsignedBigInteger('user_id');
            $table->softDeletes();
            $table->float('weight')->nullable();
            $table->float('length')->nullable();
            $table->float('width')->nullable();
            $table->float('height')->nullable();
            $table->decimal('average_rating', 3, 2)->nullable();
            $table->integer('total_ratings')->nullable();
            $table->json('variations')->nullable();
            $table->string('url')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamp('downloaded_at')->nullable();
             $table->timestamps(0);


            // Foreign key constraint for UnsignedBigInteger('user_id')

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        
        });

        // Sample data
        DB::table('products')->insert([
            'name' => 'Professional Product',
            'description' => 'This is a product with additional professional features.',
            'price' => 129.99,
            'quantity' => 25,
            'manufacture_date' => '2022-05-01',
            'expiry_date_time' => '2023-05-01 10:00:00',
            'uuid' => Str::uuid(),
            'sku' => 'PRO789',
            'location' => DB::raw('POINT(4, 7)'),
            'category_id' => 3, // Assuming 'categories' table has category with id 3
            'brand_id' => 3, // Assuming 'brands' table has brand with id 3
            'supplier_id' => 1, // Assuming 'suppliers' table has supplier with id 1
            'warehouse_id' => 1, // Assuming 'warehouses' table has warehouse with id 1
            'created_at' => now(),
            'updated_at' => now(),
            'weight' => 5.0,
            'length' => 15.0,
            'width' => 8.0,
            'height' => 12.0,
            'average_rating' => 4.8,
            'total_ratings' => 80,
            'variations' => json_encode(['Color' => ['Silver', 'Gold'], 'Size' => ['Medium', 'X-Large']]),
            'url' => 'https://example.com/professional-product',
            'downloaded_at' => now(),
            'status' => 'active',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

```
Note : When creating the table, you may use any of the schema builder's column methods to define the table's columns.

#### Checking For Table / Column Existence
----
You may check for the existence of a table or column using the hasTable and hasColumn methods:
```bash
if (Schema::hasTable('users')) {
    // The "users" table exists...
    Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->timestamps();
});
}
 
if (Schema::hasColumn('users', 'email')) {
    // The "users" table exists and has an "email" column...
}
```
#### Database Connection & Table Options
---
If you want to perform a schema operation on a database connection that is not your application's default connection, use the connection method.
```bash
Schema::connection('sqlite')->create('users', function (Blueprint $table) {
    $table->id();
});
```
#### Updating Tables
---
To rename an existing database table, use the rename method:
```bash
use Illuminate\Support\Facades\Schema;
 
Schema::rename($from, $to);
# To drop an existing table, you may use the drop or dropIfExists methods:
Schema::drop('users');
 
Schema::dropIfExists('users');
```
### Columns 
---
The schema builder blueprint offers a variety of methods that correspond to the different types of columns you can add to your database tables. Each of the available methods are listed in the table below:
#### bigIncrements() ,id() and increments()
---
The bigIncrements , increments and id method create an auto-incrementing UNSIGNED BIGINT (primary key) equivalent column. increments and id() and method is also same as bigIncrements() with just simple difference in the following.
```bash
# bigIncrements() takes BIGINT(20)
$table->bigIncrements('id'); 
# id() methods takes INT(10)
$table->id();  # not user defined column name.
# same as 
$table->increments('my_id'); # user defined int(10) column name
```
#### bigInteger()
---

The bigInteger method creates a "BIGINT" equivalent column(without primary key , auth-increments and UNSIGNED):
```bash
$table->bigInteger('votes');
```
#### boolean()
---
The boolean method creates a BOOLEAN equivalent column:
```bash
# tinyint(1) for true false checking.
$table->boolean('confirmed');
```
#### dateTime()
---
The dateTime method creates a DATETIME equivalent column with an optional precision (total digits):
```bash
$table->dateTime('created_at', $precision = 0);
```
#### date()
---
The date method creates a DATE equivalent column:
```bash
$table->date('created_at');
```
#### Difference Date, Datetime and timestamp

---
DATE : The DATE type is used for values with a date part but no time part. MySQL retrieves and displays DATE values in 'YYYY-MM-DD' format. The supported range is '1000-01-01' to '9999-12-31'.

DATETIME : The DATETIME type is used for values that contain both date and time parts. MySQL retrieves and displays DATETIME values in 'YYYY-MM-DD hh:mm:ss' format. The supported range is '1000-01-01 00:00:00' to '9999-12-31 23:59:59'.

TIMESTAMP : The TIMESTAMP data type is used for values that contain both date and time parts. TIMESTAMP has a range of '1970-01-01 00:00:01' UTC to '2038-01-19 03:14:07' UTC.

#### decimal()
---
The decimal method creates a DECIMAL equivalent column with the given precision (total digits) and scale (decimal digits):
```BASH
$table->decimal('amount', $precision = 8, $scale = 2); 
# Output decimal(8,2) means amount is 232452.50
```

NOTE : 
```bash
[Full Documentation of Database all data types](https://zetcode.com/mysql/datatypes/)

or follow the link below.

https://www.w3resource.com/mysql/mysql-data-types.php
```
Float has 32 bit (4 bytes) with 8 places accuracy.
Double has 64 bit (8 bytes) with 16 places accuracy.

#### enum()
---
The enum method creates a ENUM equivalent column with the given valid values:
```bash
$table->enum('difficulty', ['easy', 'hard']);
```

#### float()
---
The float method creates a FLOAT equivalent column with the given precision (total digits) and scale (decimal digits):
```bash
$table->float('amount', 8, 2);
```

#### foreignId()
---
The foreignId method creates an UNSIGNED BIGINT equivalent column:
```bash
$table->foreignId('user_id');
```

#### foreignIdFor()
---
The foreignIdFor method adds a {column}_id UNSIGNED BIGINT equivalent column for a given model class:
```bash
$table->foreignIdFor(User::class);

```

#### constrained()
---
Create a foreign key constraint on this column referencing the "id" column of the conventionally related table.It will show the record list in the column of the related table.
```bash
$table->foreignIdFor(User::class)->constrained();
```
In Laravel migrations, there are several ways to define foreign key constraints using the `foreignId` and `constrained` methods. Here are the commonly used ways:

#### Basic Foreign Key

```php
$table->foreignId('category_id')->constrained();
```

In this example, Laravel assumes that the foreign key column (`category_id`) references the `id` column in the related table (`categories`). This is suitable when the column and table names follow the Laravel convention.

#### Specify Column Name

```php
$table->foreignId('category_id')->constrained('categories', 'cat_id');
```

In this example, we explicitly specify that the foreign key column (`category_id`) references the `cat_id` column in the related table (`categories`). This is useful when the column names differ.

#### Cascade On Delete

```php
$table->foreignId('category_id')->constrained()->onDelete('cascade');
```

This example adds a cascade on delete constraint. If a row in the related table (`categories`) is deleted, the corresponding rows in the current table (`products`) will be deleted as well.

#### Cascade On Update

```php
$table->foreignId('category_id')->constrained()->onUpdate('cascade');
```

Similar to the cascade on delete, this example adds a cascade on update constraint. If the primary key value is updated in the related table (`categories`), the corresponding foreign key values in the current table (`products`) will be updated as well.

#### Restrict On Delete/Update

```php
$table->foreignId('category_id')->constrained()->onDelete('restrict')->onUpdate('restrict');
```

In this example, the restrict option prevents deletion or update of a row in the related table (`categories`) if there are corresponding rows in the current table (`products`). This is the default behavior if you don't specify `onDelete` or `onUpdate`.

These are some common ways to define foreign key constraints in Laravel migrations. Choose the method that best fits your requirements and naming conventions.

#### json()
---
The json method creates a JSON equivalent column:
```bash
$table->json('options'); # longtext data type
```

#### longText()
---
The longText method creates a LONGTEXT equivalent column:

```bash
$table->longText('description');
```

#### mediumInteger()
The mediumInteger method creates a MEDIUMINT equivalent column:
```bash
$table->mediumInteger('votes');
```

#### mediumText()
---
The mediumText method creates a MEDIUMTEXT equivalent column:
```bash
$table->mediumText('description');
```

#### morphs()
---
The morphs method is a convenience method that adds a {column}_id UNSIGNED BIGINT equivalent column and a {column}_type VARCHAR equivalent column.


This method is intended to be used when defining the columns necessary for a polymorphic Eloquent relationship. In the following example, taggable_id and taggable_type columns would be created:
```bash
$table->morphs('taggable');
```

#### rememberToken()
---
The rememberToken method creates a nullable, VARCHAR(100) equivalent column that is intended to store the current "remember me" authentication token:
```bash
$table->rememberToken();
```

#### set()
---
The set method creates a SET equivalent column with the given list of valid values:
```bash
$table->set('flavors', ['strawberry', 'vanilla']);
```

#### smallIncrements()
---
The smallIncrements method creates an auto-incrementing UNSIGNED SMALLINT equivalent column as a primary key:
```bash
$table->smallIncrements('id');
```

#### smallInteger()
---
The smallInteger method creates a SMALLINT equivalent column:
```bash
$table->smallInteger('votes');
```

#### softDeletes()
---
The softDeletes method adds a nullable deleted_at TIMESTAMP equivalent column with an optional precision (total digits). This column is intended to store the deleted_at timestamp needed for Eloquent's "soft delete" functionality:
```bash
$table->softDeletes($column = 'deleted_at', $precision = 0);
```

#### string()
---
The string method creates a VARCHAR equivalent column of the given length:
```bash
$table->string('name', 100);
```

#### text()
---
The text method creates a TEXT equivalent column:
```bash
$table->text('description');
```

#### time()
---
The time method creates a TIME equivalent column with an optional precision (total digits):
```bash
$table->time('sunrise', $precision = 0);
```

#### timestamp()
---
The timestamp method creates a TIMESTAMP equivalent column with an optional precision (total digits):
```bash
$table->timestamp('added_at', $precision = 0);
```

#### timestamps()
---
The timestamps method creates created_at and updated_at TIMESTAMP equivalent columns with an optional precision (total digits):
```bash
$table->timestamps($precision = 0);
```

#### tinyIncrements()
---
The tinyIncrements method creates an auto-incrementing UNSIGNED TINYINT equivalent column as a primary key:
```bash
$table->tinyIncrements('id');
```

#### tinyInteger()
---
The tinyInteger method creates a TINYINT equivalent column:
```bash
$table->tinyInteger('votes');
```

#### tinyText()
---
The tinyText method creates a TINYTEXT equivalent column:
```bash
$table->tinyText('notes');
```

#### unsignedBigInteger()
---
The unsignedBigInteger method creates an UNSIGNED BIGINT equivalent column:
```bash
$table->unsignedBigInteger('votes');
```

#### unsignedDecimal()
---
The unsignedDecimal method creates an UNSIGNED DECIMAL equivalent column with an optional precision (total digits) and scale (decimal digits):
```bash
$table->unsignedDecimal('amount', $precision = 8, $scale = 2);
```

#### unsignedInteger()
---
The unsignedInteger method creates an UNSIGNED INTEGER equivalent column:
```bash
$table->unsignedInteger('votes');
```

#### unsignedMediumInteger()
---
The unsignedMediumInteger method creates an UNSIGNED MEDIUMINT equivalent column:
```bash
$table->unsignedMediumInteger('votes');
```

#### unsignedSmallInteger()
---
The unsignedSmallInteger method creates an UNSIGNED SMALLINT equivalent column:
```bash
$table->unsignedSmallInteger('votes');
```

#### unsignedTinyInteger()
---
The unsignedTinyInteger method creates an UNSIGNED TINYINT equivalent column:
```bash
$table->unsignedTinyInteger('votes');
```
### Indexes
---
The Laravel schema builder supports several types of indexes. The following example creates a new email column and specifies that its values should be unique. To create the index, we can chain the unique method onto the column definition:

```bash
  $table->string('email')->unique();
```
You may even pass an array of columns to an index method to create a compound (or composite) index:
```bash
$table->index(['account_id', 'created_at']);
```
you may pass a second argument to the method to specify the index name yourself:
```bash
$table->unique('email', 'unique_email'); # Custom Index Name
```
to drop index
```bash
 $table->dropIndex(['state']);
```
### Foreign Key Constraints
---
Laravel also provides support for creating foreign key constraints, which are used to force referential integrity at the database level. For example, let's define a user_id column on the posts table that references the id column on a users table:
```bash
 $table->unsignedBigInteger('user_id');
 $table->string('name');
 $table->foreign('user_id')->references('id')->on('users');
```
But in XML System

```bash
Post XML data using JavaScript
$.ajax({
  type: "POST",
  url: "https://reqbin.com/echo/post/xml",
  data: "", 
  contentType: "text/xml",
  dataType: "text",
  success: function (result) {
    console.log(result);
  },
  error: function (result, status) {
    console.log(result);
  }
});
```
When using the foreignId method to create your column, the example above can be rewritten like so:

```bash
$table->foreignId('user_id')->constrained();
```
If your table name does not match Laravel's conventions, you may specify the table name by passing it as an argument to the constrained method:
```bash
    $table->foreignId('user_id')->constrained('users');
```
You may also specify the desired action for the "on delete" and "on update" properties of the constraint:
```bash
$table->foreignId('user_id')
      ->constrained()
      ->onUpdate('cascade')
      ->onDelete('cascade');
```
#### Dropping Foreign Keys
---
Foreign key constraints use the same naming convention as indexes. In other words, the foreign key constraint name is based on the name of the table and the columns in the constraint, followed by a "_foreign" suffix:

```bash
$table->dropForeign('posts_user_id_foreign');
```
Alternatively, you may pass an array containing the column name that holds the foreign key to the dropForeign method. The array will be converted to a foreign key constraint name using Laravel's constraint naming conventions:
```bash
$table->dropForeign(['user_id']);
```
### Database: Seeding
---
It generates fake or dummy data for you and incorporate the data in the database table. With it, you can simultaneously create a single seeder or multiple seeders. You can test your laravel app with the data, which seems real to some extent.

Laravel includes the ability to seed your database with data using seed classes. All seed classes are stored in the database/seeders directory. By default, a DatabaseSeeder class is defined for you. From this class, you may use the call method to run other seed classes, allowing you to control the seeding order.

#### Writing Seeder
---
To generate a seeder, execute the make:seeder Artisan command.
```bash
php artisan make:seeder UserSeeder
```
As an example, let's modify the default DatabaseSeeder class and add a database insert statement to the run method:
```bash
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
```

#### Using Model Factories
---
you can use model factories to conveniently generate large amounts of database records.
For example, let's create 50 users that each has one related post:
```bash
public function run()
{
    User::factory()
            ->count(50)
            ->hasPosts(1)
            ->create();
}
```
#### Calling Additional Seeders
---
Within the DatabaseSeeder class, you may use the call method to execute additional seed classes.
The call method accepts an array of seeder classes that should be executed:
```bash
public function run()
{
    $this->call([
        UserSeeder::class,
        PostSeeder::class,
        CommentSeeder::class,
    ]);
}
```
#### Running Seeders
---
You may execute the db:seed Artisan command to seed your database. By default, the db:seed command runs the Database\Seeders\DatabaseSeeder class, which may in turn invoke other seed classes. However, you may use the --class option to specify a specific seeder class to run individually:
```bash
php artisan db:seed # all seeder files running 
php artisan db:seed --class=UserSeeder # Specific single seeder file running
```
You may also seed your database using the migrate:fresh command in combination with the --seed option, which will drop all tables and re-run all of your migrations. This command is useful for completely re-building your database. The --seeder option may be used to specify a specific seeder to run:
```bash
php artisan migrate:fresh seed # all seeder files running 
php artisan  migrate:fresh --seed --seeder=UserSeeder # Specific single seeder file running
```
To force the seeders to run without a prompt, use the --force flag:
```bash
php artisan db:seed --force
```

### **Database : Redis**
---
* What is Redis : 
Redis is a NoSQL database which follows the principle of key-value store. The key-value store provides ability to store some data called a value, inside a key. You can recieve this data later only if you know the exact key used to store it.


Redis is a flexible, open-source (BSD licensed), in-memory data structure store, used as database, cache, and message broker. Redis is a NoSQL database so it facilitates users to store huge amount of data without the limit of a Relational database.

Redis supports various types of data structures like strings, hashes, lists, sets, sorted sets, bitmaps, hyperloglogs and geospatial indexes with radius queries.

* Redis Architecture : 
There are two main processes in Redis architecture.
1. Redis Client.
2. Redis Server.

 These client and server can be on same computer or two different computers.

Redis Diagram.

![alt text](https://static.javatpoint.com/redis/images/what-is-redis.png "Redis client and server connection").

Diagram of How Redis works from cache.
![alt text](https://static.javatpoint.com/redis/images/what-is-redis1.png "Redis client and server connection")

Redis server is used to store data in memory . It controls all type of management and forms the main part of the architecture. You can create a Redis client or Redis console client when you install Redis application or you can use.

#### Features of Redis :
---
Following is the list of main features of Redis:

1. **In-Memory Data Storage:**
   - Redis stores data in memory, allowing for extremely fast read and write operations.

2. **Key-Value Store:**
   - Data is stored as key-value pairs, making it simple and efficient for various data structures.

3. **Data Structures:**
   - Supports various data structures like strings, hashes, lists, sets, and sorted sets, providing flexibility in data modeling.

4. **Persistence Options:**
   - Offers different persistence options, allowing data to be saved to disk for durability or used purely in-memory for high-performance scenarios.

15. **Simple Configuration:**
    - Configuration is usually straightforward, and Redis can be easily integrated into various applications.

Redis's combination of speed, versatility, and features makes it a powerful choice for caching, real-time analytics, messaging systems, and many other applications where fast and scalable data storage is crucial.

#### Redis Get and Set Methods
---
Certainly! In Laravel, you can use Redis for caching by utilizing the `get` and `set` methods provided by Laravel's Redis facade. Below is a simple example of using these methods:

1. **Setting a value in Redis:**

   ```php
   // Assuming you are in a controller or a service

   use Illuminate\Support\Facades\Redis;

   public function setRedisValue()
   {
       // Key for the value in Redis
       $key = 'example_key';

       // Value to be stored in Redis
       $value = 'Hello, Redis!';

       // Set the value in Redis with an optional expiration time (in seconds)
       Redis::set($key, $value);
   }
   ```

   In this example, the `set` method is used to store a value in Redis with a specified key.

2. **Getting a value from Redis:**

   ```php
   // Assuming you are in a controller or a service

   use Illuminate\Support\Facades\Redis;

   public function getRedisValue()
   {
       // Key to retrieve the value from Redis
       $key = 'example_key';

       // Get the value from Redis
       $value = Redis::get($key);

       // Check if the value exists
       if ($value === null) {
           // Value does not exist in Redis
           return 'Value not found in Redis.';
       }

       return $value;
   }
   ```

   The `get` method is used to retrieve a value from Redis based on the specified key. The method returns `null` if the key is not found, so you can check for that condition.

Remember to configure your Laravel application to use Redis as the cache driver in the `.env` file:

```dotenv
CACHE_DRIVER=redis
```

This is a basic example, and you can customize it based on your specific use case. Additionally, you may want to explore more advanced features of Redis, such as setting expiration times, using Redis hashes for more complex data structures, and handling cache invalidation strategies.

#### **Using In Professional**

Installing Redis : 
```bash
composer require predis/predis
```
When the installation is complete, we can find our Redis configuration settings in config/database.php. In the file, you will see a redis array containing the Redis server. By default, the client is set to phpredis, and since predis is being used in this tutorial, the client will be changed to predis:
```bash
'redis' => [

  'client' => env('REDIS_CLIENT', 'predis'),

  'options' => [
      'cluster' => env('REDIS_CLUSTER', 'redis'),
      'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
  ],

  'default' => [
      'url' => env('REDIS_URL'),
      'host' => env('REDIS_HOST', '127.0.0.1'),
      'password' => env('REDIS_PASSWORD', null),
      'port' => env('REDIS_PORT', '6379'),
      'database' => env('REDIS_DB', '0'),
  ],

],
```
You can modify the default settings to your own custom settings depending on your URL and add a password, but for this tutorial, we won’t be doing that.

After that is done, go ahead to register your REDIS_CLIENT in the .env file:


Here's a basic example of how you can integrate Laravel with Redis for a product cache in an ecommerce site. Make sure you have the `predis/predis` package installed.

1. **Install Redis and Predis Package:**
   
   ```bash
   composer require predis/predis
   ```

2. **Configure Laravel to use Redis:**

   Open your `.env` file and set the `CACHE_DRIVER` and `REDIS_*` variables.

   ```dotenv
   CACHE_DRIVER=redis
   REDIS_HOST=127.0.0.1
   REDIS_PASSWORD=null
   REDIS_PORT=6379
   ```

3. **Create a Cache Key for Products:**

   In your controller or service where you retrieve product data, create a cache key for the products.

   ```php
   // ProductController.php

   use Illuminate\Support\Facades\Cache;

   public function getProducts()
   {
       $cacheKey = 'products.all';

       // Check if the data is already in the cache
       if (Cache::has($cacheKey)) {
           $products = Cache::get($cacheKey);
       } else {
           // If not, fetch the data from the database
           $products = Product::all();

           // Store the data in the cache for 10 minutes (adjust as needed)
           Cache::put($cacheKey, $products, 10 * 60);
       }

       return view('products.index', ['products' => $products]);
   }
   ```

   This example caches the product data for 10 minutes. You can adjust the cache duration based on your requirements.

4. **Clearing Cache:**

   When you update or add new products, make sure to clear the cache to reflect the changes.

   ```php
   Cache::forget('products.all');
   ```

This basic example demonstrates how to use Redis as a cache for product data in Laravel. It's important to adapt this to your specific needs and consider additional caching strategies based on the data access patterns in your application.

Remember, caching introduces the challenge of keeping the cache in sync with the actual data, so always clear or update the cache when the underlying data changes.

### Eloquent: Collections
---
Defining Laravel collections:

Laravel collections can be regarded as modified versions of PHP arrays. They are located in the Illuminate\Support\Collection class directory and provide a wrapper to work with data arrays.

```bash
use App\Models\User;
 
$users = User::where('active', 1)->get();
 
foreach ($users as $user) {
    echo $user->name;
}
```
However, as previously mentioned, collections are much more powerful than arrays and expose a variety of map / reduce operations that may be chained using an intuitive interface. For example, we may remove all inactive models and then gather the first name for each remaining user:
```bash
$names = User::all()->reject(function ($user) {
    return $user->active === false;
})->map(function ($user) {
    return $user->name;
});
```
The Illuminate\Support\Collection class provides a fluent, convenient wrapper for working with arrays of data. For example, check out the following code. We'll use the collect helper to create a new collection instance from the array, run the strtoupper function on each element, and then remove all empty elements:
```bash
$collection = collect(['taylor', 'abigail', null])->map(function ($name) {
    return strtoupper($name);
})->reject(function ($name) {
    return empty($name);
});
```
#### Creating Collections
---
As mentioned above, the collect helper returns a new Illuminate\Support\Collection instance for the given array. So, creating a collection is as simple as:
```bash
$collection = collect([1, 2, 3]); # collect() is just for example function to check collection methods
by model 
User::all()->toJson();
```
#### Available Methods
---
For the majority of the remaining collection documentation, we'll discuss each method available on the Collection class. Remember, all of these methods may be chained to fluently manipulate the underlying array. Furthermore, almost every method returns a new Collection instance, allowing you to preserve the original copy of the collection when necessary:
```bash
all
average
avg
chunk
chunkWhile
collapse
collect
combine
concat
contains
containsOneItem
containsStrict
count
countBy
crossJoin
dd
diff
diffAssoc
diffKeys
doesntContain
dump
duplicates
duplicatesStrict
each
eachSpread
every
except
filter
first
firstOrFail
firstWhere
flatMap
flatten
flip
forget
forPage
get
groupBy
has
hasAny
implode
intersect
intersectByKeys
isEmpty
isNotEmpty
join
keyBy
keys
last
lazy
macro
make
map
mapInto
mapSpread
mapToGroups
mapWithKeys
max
median
merge
mergeRecursive
min
mode
nth
only
pad
partition
pipe
pipeInto
pipeThrough
pluck
pop
prepend
pull
push
put
random
range
reduce
reduceSpread
reject
replace
replaceRecursive
reverse
search
shift
shuffle
skip
skipUntil
skipWhile
slice
sliding
sole
some
sort
sortBy
sortByDesc
sortDesc
sortKeys
sortKeysDesc
sortKeysUsing
splice
split
splitIn
sum
take
takeUntil
takeWhile
tap
times
toArray
toJson
transform
undot
union
unique
uniqueStrict
unless
unlessEmpty
unlessNotEmpty
unwrap
value
values
when
whenEmpty
whenNotEmpty
where
whereStrict
whereBetween
whereIn
whereInStrict
whereInstanceOf
whereNotBetween
whereNotIn
whereNotInStrict
whereNotNull
whereNull
wrap
zip
```
```bash
   $sidebar = new sidebarAdvertisement();
     dd($sidebar->all());
      $sidebar->dd();   # returns "select * from `sidebar_advertisements`"
$sidebar_ad->except([4,5]);
  $sidebar_ad->count();

```
#### [Click Here To Know More About Collection](https://laravel.com/docs/9.x/collections)

### Eloquent: Mutators, Accessors & Casting
---

laravel mutator and accessor also called setter and getter method. These two concepts are used when we get db value by model and save values throw modal."Accessors create a custom attribute on the object which you can access as if it were a database column."
"Mutator is a way to change data when it is going set into database table.".

Attribute:
Each methods of model or Column of Model Table is an attribute.

Mutators:
Mutators are used to modify the value of an attribute before it is stored in the database. To define a mutator, you need to create a method with the naming convention "set{AttributeName}Attribute". For example, if you have an attribute named "email", you can define a mutator for it like this:

```bash
public function setEmailAttribute($value) :  Attribute //
{
    $this->attributes['email'] = strtolower($value);
}

This mutator converts the email value to lowercase before storing it in the database.
# or

 protected function dateOfBirth(): Attribute  # date_of_birth , updated_at updatedAt , subCategory = sub_category
    {
        return new Attribute(
            get: fn ($value) =>  Carbon::parse($value)->format('m/d/Y'), # 12/05/2023
            set: fn ($value) =>  Carbon::parse($value)->format('Y-m-d'), # 2023-12-05
        );
    }

    # In Controller 
     public function create()
    {
        $input = [
            'name' => 'Hardik',
            'email' => 'hardik2@gmail.com',
            'password' => bcrypt('123456'),
            'date_of_birth' => '07/21/1994'
        ];
        $user = User::create($input);
        dd($user);
    }

 # or 

 class Product extends Model
{
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value * 100;
    }
}

$product = new Product;
$product->price = 10; # 10 * 100
$product->save();
```

Accessors:
Accessors are used to retrieve the value of an attribute after it has been retrieved from the database. To define an accessor, you need to create a method with the naming convention "get{AttributeName}Attribute". For example, if you have an attribute named "full_name", you can define an accessor for it like this:

```bash
public function getFullNameAttribute()
{
    return "{$this->first_name} {$this->last_name}";
}

This accessor concatenates the first_name and last_name attributes to create a full name.
 Retrieve Data.
 $user = new User();
 $user->full_name;  # full_name from getFullNameAttribute (full_name) method
```
Attribute Casting:
Attribute casting allows you to define how a model attribute should be cast to and from a certain data type. This is useful when you want to ensure that the attribute is always of a certain data type, such as an integer or boolean. To define attribute casting, you need to define a protected $casts property on your model class. For example
```bash
protected $casts = [
    'is_admin' => 'boolean',
    'age' => 'integer',
   'created_at' => 'datetime:Y-m-d',
    'updated_at' => 'datetime',
];
```
Notes : This defines the is_admin attribute as a boolean and the age attribute as an integer. This ensures that any value stored in these attributes will be cast to the appropriate data type when retrieved from the database.


Full Example of Mutator, Accessors and Attribute Casting.
```bash
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $casts = [
        'is_admin' => 'boolean',
        'age' => 'integer',
        'address' => 'array',
        'phone_number' => 'string',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }


    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    public function setAgeAttribute($value)
    {
        $this->attributes['age'] = $value < 0 ? 0 : $value;
    }
}

Notes : getter Method/get attribute for retrieving data from db table is called mutator.setter Method/set attribute for storing data is called accessor.
cast is data type by which system data is stored in column/attribute.
```

### Eloquent: API Resources
---
* What does API Resources mean?

**API Resources** acts as a transformation layer that sits between our Eloquent models and the JSON responses that are actually returned by our API.

**API resources** present a way to easily transform our models into JSON responses.

The Steps to use API Resource

1. create a resource class
```bash
php artisan make:resource UserResource
```
2. 
create a resource collection using either
```bash
php artisan make:resource Users --collection
php artisan make:resource UserCollection
```
3. Creating the book resource

Before we move on to create theBooksController, let’s create a book resource class. We’ll make use of the artisan command make:resource to generate a new book resource class. By default, resources will be placed in the app/Http/Resources directory of our application.

```bash
$ php artisan make:resource BookResource
```

Once that is created, let’s open it and update the toArray() method as below:

```bash
app/Http/Resources/BookResource.php
 public function toArray($request)
    {
      return [
        'id' => $this->id,
        'title' => $this->title,
        'description' => $this->description,
        'created_at' => (string) $this->created_at,
        'updated_at' => (string) $this->updated_at,
        'user' => $this->user,
        'ratings' => $this->ratings,
      ];
    }
```
As the name suggests, this will transform the resource into an array.

We can access the model properties directly from the $this variable.

Now we can make use of the BookResource class in our controller.

4. Creating the book controller

Let’s create the BookController. For this, we’ll make use of the API controller generation feature

```bash
$ php artisan make:controller BookController --api
```

Next, open it up and paste the following code into it:

```bash
app/Http/Controllers/BookController.php
    use App\Book;
    use App\Http\Resources\BookResource;

// ...

    public function index()
    {
      return BookResource::collection(Book::with('ratings')->paginate(25));
    }

    public function store(Request $request)
    {
      $book = Book::create([
        'user_id' => $request->user()->id,
        'title' => $request->title,
        'description' => $request->description,
        'comments' => CommentResource::collection($this->comments), # included a relationship
      ]);

      return new BookResource($book);
    }

    public function show(Book $book) # Book::findOrFail(primary_key); primary_key = id Route::get('show-book/{book}')

    {
      return new BookResource($book);
    }

    public function update(Request $request, Book $book)
    {
      // check if currently authenticated user is the owner of the book
      if ($request->user()->id !== $book->user_id) {
        return response()->json(['error' => 'You can only edit your own books.'], 403);
      }

      $book->update($request->only(['title', 'description']));

      return new BookResource($book);
    }

    public function destroy(Book $book)
    {
      $book->delete();

      return response()->json(null, 204);
    }
```


**Difference between Normal Controller and API Resource:**

A normal controller typically directly fetches data from the database and returns it as a JSON or HTML response. It might not follow a consistent structure and might expose internal data structures to the outside world.

On the other hand, using an API resource helps in:

1. **Data Transformation:** You can define exactly how the data should be presented, making it consistent and structured.
2. **Customization:** You can control which fields to include or exclude in the API response.
3. **Relationships:** You can easily include related data along with the main resource data.
4. **Reusability:** Resources can be reused across multiple endpoints, ensuring a consistent data format.
5. **Versioning:** It makes versioning of your API responses easier by encapsulating the data transformation logic.

In summary, API resources offer a more structured and controlled way to expose your data, especially in an API context, compared to a traditional controller approach.

**Functionalities :**

The *index()* method fetches and returns a list of the books that have been added.

The *store()* method creates a new book with the ID of the currently authenticated user along with the details of the book, and persists it to the database. Then we return a book resource based on the newly created book.

The *show()* method accepts a Book model (we are using route model binding here) and simply returns a book resource based on the specified book.

The *update()* method first checks to make sure the user trying to update a book is the owner of the book . If the user is not the owner of the book, we return an appropriate error message and set the HTTP status code to 403. Otherwise we update the book with the new details and return a book resource with the updated details.

Lastly, the *destroy()* method deletes a specified book from the database. Since the specified book has been deleted and no longer available, we set the HTTP status code of the response returned to 204.





### ELOQUENT : Serialization

In Laravel, Eloquent is the built-in ORM (Object-Relational Mapping) that simplifies database interactions by allowing you to work with database records as if they were regular PHP objects. Eloquent provides a powerful and intuitive way to perform database operations, including retrieving, storing, updating, and deleting records.

Eloquent serialization is a feature that allows you to easily convert Eloquent model instances into different data formats, such as JSON or arrays, so that you can send them as responses in your API or use them in other parts of your application.

Let's explain Eloquent serialization step by step for beginner-level developers:

1. **Understanding Eloquent Models**:
   - In Laravel, each database table is typically associated with an Eloquent model. These models represent the structure and behavior of your data.

2. **Serializing Data**:
   - Serialization is the process of converting a complex data structure, like an Eloquent model, into a format that can be easily represented or transmitted. This format is often a JSON or array representation of the data.

3. **Eloquent Serialization Methods**:
   - Eloquent provides two primary methods for serializing data: `toArray()` and `toJson()`.
     - `toArray()`: This method converts the Eloquent model instance and its related data into an array.
     - `toJson()`: This method converts the Eloquent model instance and its related data into a JSON string.

4. **Basic Usage**:
   - Let's say you have an Eloquent model representing a "User" and you want to serialize a user's data:
   
   ```php
   // Fetch a user record
   $user = User::find(1);

   // Convert the user model to an array
   $userArray = $user->toArray();

   // Convert the user model to JSON
   $userJson = $user->toJson();
   ```

   Now, `$userArray` will contain the user's data as an associative array, and `$userJson` will contain the user's data as a JSON string.

5. **Customizing Serialization**:

   - You can customize how your models are serialized by defining a `toArray()` method in your Eloquent model. This method allows you to specify which attributes should be included and how they should be formatted. For example:

   ```php
   class User extends Model
   {
       public function toArray()
       {
           return [
               'id' => $this->id,
               'name' => $this->name,
               'email' => $this->email,
               // Add more attributes as needed
           ];
       }
   }
   ```

6. **Related Models and Eager Loading**:
   - When you have relationships between models (e.g., a User has many Posts), Eloquent allows you to easily include related data in the serialized output using eager loading. This helps avoid the N+1 query problem. For example:

   ```php
   $userWithPosts = User::with('posts')->find(1);

   // Serialize the user with their posts
   $userArrayWithPosts = $userWithPosts->toArray();
   ```

   In this example, the `posts` relationship is eager loaded, so the serialized user data will also include an array of their posts.

7. **Response Formatting**:
   - You can use the serialized data to send responses in your API controllers, making it easy to return data in a consistent format.

   ```php
   public function getUserData($userId)
   {
       $user = User::find($userId);
       return response()->json($user->toArray());
   }
   ```

   This code fetches a user by ID and returns their data as a JSON response.

## Eloquent: Factories
---
In Laravel, factories are used to generate fake data for your application's database records during development and testing. They are especially useful when you need to populate your database with sample data for testing purposes or when you want to quickly create records for use in your application.

**[Faker all Methods and attributes Link](https://github.com/fzaninotto/Faker)**

1. First, make sure you have a `Product` model created. If you don't have one, you can create it using the following command:

```bash
php artisan make:model Product
php artisan make:migration create_table_products

public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description');
        $table->decimal('price', 10, 2);
        $table->integer('quantity');
        $table->string('brand');
        $table->string('manufacturer');
        $table->string('category');
        $table->string('color');
        $table->string('size');
        $table->string('weight');
        $table->string('material');
        $table->string('condition');
        $table->boolean('is_available')->default(true);
        $table->string('image_path')->nullable();
        $table->timestamps();
    });
}

```

2. Next, create a factory for the `Product` model. You can generate a factory using the following command:

```bash
php artisan make:factory ProductFactory
```

3. Open the generated `ProductFactory.php` file located in the `database/factories` directory and define your factory. Here's an example factory file for the `Product` model:

```php
// database/factories/ProductFactory.php

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\User; // Assuming you have a User model for the seller

$factory->define(Product::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName(),
        'last_name'=> $faker->lastName(),
        'name' => $faker->sentence(3),
        'email' => $faker->unique()->safeEmail, // Generates a unique email address
        'password' => bcrypt('password'), // Sets a static password (useful for testing)
        'description' => $faker->paragraph(4),
        'category' = Category::inRandomOrder()->first(),
        'subCategory' = SubCategory::where('category_id', $category->id)->inRandomOrder()->first(),
        'price' => $faker->randomFloat(2, 10, 1000), // Example: 256.75 // random floating-point number between $10 and $1000.random floating-point number between $10 and $1000.
        'quantity' => $faker->numberBetween(1, 100),
        'seller_id' => User::inRandomOrder()->first()->id, // Assign a random seller from the User model
        'category' => $faker->randomElement(['Electronics', 'Clothing', 'Home & Kitchen', 'Books', 'Toys']), // Category::inRandoOrder()->first()->id 
        'brand' => $faker->word,
        'rating' => $faker->randomFloat(1, 1, 5),
        'seller' => $faker->company,
        'image' => $faker->imageUrl(400, 400, 'product', true),
        'start_time' => $faker->dateTimeBetween('-1 month', 'now'), // Random start time within the last month
        'end_time' => $faker->dateTimeBetween('now', '+6 months'), // Random end time within the next 6 months
        'color' => $faker->colorName,
        'size' => $faker->randomElement(['S', 'M', 'L', 'XL']),
        'weight' => $faker->randomFloat(2, 0.1, 100),
        'material' => $faker->word,
        'condition' => $faker->randomElement(['New', 'Used', 'Featured']),
        'is_available' => $faker->boolean(90), // 90% chance of being available
        'address' => $faker->address, // Example: "123 Main St, Suite 456, New York, NY 10001"
        'email' => $faker->email, // Example: "user@example.com"
        'username' => $faker->unique()->userName, // Generates a unique username
        'created_at' => $faker->dateTime, // Example: "2023-09-15 14:30:00"
        'is_active' => $faker->boolean, // Example: true or false
        'bio' => $faker->text, // $faker->text(200) // Generates random text
        'website' => $faker->url, // Generates a random URL
        'phone_number' => $faker->phoneNumber, // Generates a random phone number
        'address' => $faker->address, // Generates a random address
        'city' => $faker->city, // Generates a random city
        'state' => $faker->state, // Generates a random state
        'zip_code' => $faker->postcode, // Generates a random postal code
        'country' => $faker->country, // Generates a random country name
        'latitude' => $faker->latitude, // Generates a random latitude value
        'longitude' => $faker->longitude, // Generates a random longitude value
        'remember_token' => str_random(10), // Generates a random 10-character string
        'created_at' => now(),
        'created_at' => $faker->dateTimeBetween('-2 years', 'now'), // Generates a random creation date.
        'updated_at' => $faker->dateTimeThisDecade,
        'gallery_images' => json_encode([$faker->imageUrl(), $faker->imageUrl(), $faker->imageUrl()]), // Gallery images as JSON array
    ];
});

```

4. To use this factory, you can use Laravel's Seeder to populate your database with sample product records. Create a seeder using the following command:

```bash
php artisan make:seeder ProductSeeder
```

5. Open the generated `ProductSeeder.php` file in the `database/seeders` directory and use the factory to create product records. For example:

```php
// database/seeders/ProductSeeder.php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Create 50 product records using the ProductFactory  => Product::factory()
        Product::factory()->count(50)->create();
    }
}
```

6. Finally, run the seeder to populate your database with sample products:

```bash
php artisan db:seed --class=ProductSeeder
```

Now, your database will be populated with 50 sample products, each with randomly generated data, making it easier to test and develop your application. You can adjust the number of products created by changing the `count()` method in the seeder file.
 
**Note :** The Information above is enough for basic/beginner level developer. The following about factory is of advanced level studetns.

### Factory Relationship
---
In Laravel, you can use factories to define relationships between models. Let's go through examples of three types of relationships: `hasMany`, `belongsToMany`, and `morphToMany`.

1. **hasMany Relationship**:

In a `hasMany` relationship, one model can have multiple related records in another model. For example, a `User` can have multiple `Post` records.

```php
// User Factory
use App\Models\User;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

// Post Factory
use App\Models\Post;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->paragraph,
        'user_id' => factory(User::class)->create()->id,
    ];
});
```

In the `Post` factory, we associate each post with a user by creating a new user using the `factory(User::class)->create()` method and assigning its `id` to the `user_id` attribute of the post.

2. **belongsToMany Relationship**:

In a `belongsToMany` relationship, two models are related through an intermediate table. For example, `User` and `Role` models may have a many-to-many relationship.

```php
// Role Factory
use App\Models\Role;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});

// User Factory (with belongsToMany relationship)
use App\Models\User;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->afterCreating(User::class, function ($user, $faker) {
    $user->roles()->attach(factory(Role::class, 2)->create()->pluck('id'));
});
```

In the `User` factory, we define a `belongsToMany` relationship with the `Role` model. After creating a user, we attach two random roles to the user.

3. **morphToMany Relationship**:

In a `morphToMany` relationship, a model can belong to multiple other models on a single association. For example, a `Comment` can belong to both `Post` and `Video` models.

```php
// Comment Factory
use App\Models\Comment;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->paragraph,
    ];
});

// Post and Video Factories (with morphToMany relationship)
use App\Models\Post;
use App\Models\Video;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
    ];
});

$factory->define(Video::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
    ];

});

$factory->afterCreating(Post::class, function ($post, $faker) {
    $post->comments()->attach(factory(Comment::class, 3)->create()->pluck('id'), ['commentable_type' => Post::class]);
});

$factory->afterCreating(Video::class, function ($video, $faker) {
    $video->comments()->attach(factory(Comment::class, 3)->create()->pluck('id'), ['commentable_type' => Video::class]);
});

```

In the above code, we define a `morphToMany` relationship between `Comment`, `Post`, and `Video`. After creating a `Post` or `Video`, we attach three random comments to them, specifying the `commentable_type` to indicate whether it's associated with a `Post` or a `Video`.

### Factory Polymorphice RelationShip
---
Certainly! Polymorphic relationships in Laravel allow you to associate a model with multiple other models on a single association. They are typically used when you have multiple models that can belong to or associate with another model. I'll provide examples of each type of polymorphic relationship with factories.

**1. Polymorphic One-to-One Relationship:**

In this example, we'll have a `Comment` model that can be associated with various types of content (e.g., `Post` and `Video`).

```php
// CommentFactory.php
$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence,
        'commentable_id' => factory(App\Post::class)->create()->id,
        'commentable_type' => 'App\Post',
    ];
});
```

**2. Polymorphic One-to-Many Relationship:**

Let's assume a `Tag` model that can be associated with various types of content.

```php
// TagFactory.php
$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});

// PostFactory.php
$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
    ];
});

// VideoFactory.php
$factory->define(App\Video::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'url' => $faker->url,
    ];
});
```

**3. Polymorphic Many-to-Many Relationship:**

In this example, we'll create a `Tag` model that can be associated with both `Post` and `Video` models.

```php
// TagFactory.php
$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});

// PostFactory.php
$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
    ];
});

// VideoFactory.php
$factory->define(App\Video::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'url' => $faker->url,
    ];
});

// TaggableFactory.php
$factory->define(App\Taggable::class, function (Faker $faker) {
    return [
        'tag_id' => function () {
            return factory(App\Tag::class)->create()->id;
        },
        'taggable_id' => function () {
            $taggableType = $faker->randomElement(['App\Post', 'App\Video']);
            return factory($taggableType)->create()->id;
        },
        'taggable_type' => $taggableType,
    ];
});
```

**4. Polymorphic Has Many Relationship:**

In this example, we'll create a `Comment` model that can have multiple comments on various types of content.

```php
// CommentFactory.php
$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence,
    ];
});

// PostFactory.php
$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
    ];
});

// VideoFactory.php
$factory->define(App\Video::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'url' => $faker->url,
    ];
});
```
These examples demonstrate various types of polymorphic relationships using factories in Laravel. You can use these factories to generate test data for your polymorphic relationships easily.


## Architecture Concepts : Request Lifecycle, Service Container, Service Providers, Facades
---


  ### Foreign id set with table in laravel
---
The code must be write with unsignedBigInteger('user_id')->unsigned() . like the following
```bash
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('news_id')->unsigned();
            $table->text('comment');
           
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('news_id')->references('id')->on('news_posts')->onDelete('cascade');
            $table->enum('status',[1,0])->default(0);
            $table->timestamps();
```

### manage a crud of a comment with database in laravel using ajax
---

Managing a CRUD (Create, Read, Update, Delete) system for comments in Laravel using Ajax involves setting up routes, controllers, models, and JavaScript code to handle the interactions. Below, I'll provide you with a step-by-step guide and example code snippets to achieve this. Please note that this is a high-level overview, and you might need to adjust the code according to your project's specific needs.

**Step 1: Set up the database**

Create a migration for the comments table:

```bash
php artisan make:migration create_comments_table
```

Edit the migration file to define the structure of the comments table:

```php
// database/migrations/xxxx_xx_xx_create_comments_table.php

public function up()
{
    Schema::create('comments', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('post_id');
        $table->text('body');
        $table->timestamps();
    });
}
```

Run the migration to create the comments table:

```bash
php artisan migrate
```

**Step 2: Create the Comment model**

Generate a Comment model:

```bash
php artisan make:model Comment
```

Define the relationships in the Comment model:

```php
// app/Models/Comment.php

class Comment extends Model
{
    protected $fillable = ['user_id', 'post_id', 'body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
```

**Step 3: Set up routes**

Define routes for CRUD operations in the `routes/web.php` file:

```php
Route::resource('comments', CommentController::class)->middleware('auth');
```

**Step 4: Create the CommentController**

Generate a CommentController:

```bash
php artisan make:controller CommentController
```

Implement the CRUD operations in the controller:

```php
// app/Http/Controllers/CommentController.php

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // Validation

        $comment = Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $request->post_id,
            'body' => $request->body,
        ]);

        return response()->json($comment);
    }

    public function update(Request $request, Comment $comment)
    {
        // Validation

        $comment->update(['body' => $request->body]);

        return response()->json($comment);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response()->json(['message' => 'Comment deleted']);
    }
}
```

**Step 5: Create the Blade view**

Create a Blade view to display comments and handle Ajax interactions:

```html
<!-- resources/views/posts/show.blade.php -->

<div id="comments">
    <!-- Display existing comments here -->
</div>

<form id="comment-form">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <textarea name="body" placeholder="Add a comment"></textarea>
    <button type="submit">Submit</button>
</form>

<script>
    // Use JavaScript to handle AJAX requests and update the UI
</script>
```

**Step 6: Implement JavaScript for AJAX**

In your JavaScript code, you can use libraries like Axios or jQuery to send AJAX requests to the server for creating, updating, and deleting comments. Update the `script` tag in the Blade view to include your AJAX logic.

Here's a simplified example using Axios:

```html
<!-- resources/views/posts/show.blade.php -->

<!-- ... existing HTML ... -->

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    const commentForm = document.getElementById('comment-form');
    const commentsContainer = document.getElementById('comments');

    commentForm.addEventListener('submit', async (event) => {
        event.preventDefault();

        const formData = new FormData(commentForm);
        const response = await axios.post('/comments', formData);

        // Update the UI with the new comment
        const newComment = response.data;
        const commentElement = document.createElement('div');
        commentElement.innerHTML = `<p>${newComment.body}</p>`;
        commentsContainer.appendChild(commentElement);

        commentForm.reset();
    });

    // Implement similar logic for updating and deleting comments using AJAX
</script>
```
### CRUD system for comments in Laravel using
---

Managing a CRUD (Create, Read, Update, Delete) system for comments in Laravel using AJAX involves several components, including routes, controllers, models, views, and JavaScript. Below, I'll provide you with a step-by-step guide along with code examples for each component.

Assuming you have a model named `Comment` to represent the comments and a table named `comments` in your database.

1. **Routes (routes/web.php):**

```php
Route::get('/comments', 'CommentController@index'); // To fetch all comments
Route::post('/comments', 'CommentController@store'); // To create a new comment
Route::put('/comments/{id}', 'CommentController@update'); // To update a comment
Route::delete('/comments/{id}', 'CommentController@destroy'); // To delete a comment
```

2. **Controller (app/Http/Controllers/CommentController.php):**

```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return response()->json($comments);
    }

    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->save();
        
        return response()->json($comment);
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->content = $request->input('content');
        $comment->save();

        return response()->json($comment);
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return response()->json(['message' => 'Comment deleted']);
    }
}
```

3. **Blade View (resources/views/comments.blade.php):**

```html
<!DOCTYPE html>
<html>
<head>
    <title>Comments</title>
</head>
<body>
    <div>
        <h1>Comments</h1>
        <form id="addCommentForm">
            <input type="text" id="commentContent" placeholder="Add a comment">
            <button type="submit">Add Comment</button>
        </form>
    </div>
    <ul id="commentList">
        <!-- Comments will be displayed here dynamically -->
    </ul>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Fetch and display comments
            function fetchComments() {
                $.ajax({
                    url: '/comments',
                    type: 'GET',
                    success: function (data) {
                        var commentsHtml = '';
                        data.forEach(function (comment) {
                            commentsHtml += '<li>' + comment.content +
                                            ' <button class="deleteBtn" data-id="' + comment.id + '">Delete</button></li>';
                        });
                        $('#commentList').html(commentsHtml);
                    }
                });
            }

            fetchComments(); // Initial fetch

            // Add a new comment
            $('#addCommentForm').submit(function (e) {
                e.preventDefault();
                var content = $('#commentContent').val();

                $.ajax({
                    url: '/comments',
                    type: 'POST',
                    data: { content: content },
                    success: function () {
                        $('#commentContent').val('');
                        fetchComments(); // Fetch and update the list
                    }
                });
            });

            // Delete a comment
            $(document).on('click', '.deleteBtn', function () {
                var id = $(this).data('id');
                
                $.ajax({
                    url: '/comments/' + id,
                    type: 'DELETE',
                    success: function () {
                        fetchComments(); // Fetch and update the list
                    }
                });
            });
        });
    </script>
</body>
</html>
```

This example provides you with a basic implementation of a comment CRUD system in Laravel using AJAX. The provided code assumes that you have already set up the necessary database migrations, models, and have included jQuery for AJAX functionality. Remember that this is a simplified example, and in a real-world scenario, you might want to implement additional validation, error handling, and security measures.


### Laravel Set Notification with Read Unread Methods

Setting up user review notifications and implementing read and unread notifications functionality in the admin dashboard of a Laravel application involves several steps. I'll guide you through the process and provide code examples along the way.

**Step 1: Create Notification**

First, let's create a notification for user reviews. Run the following command to generate a new notification:

```bash
php artisan make:notification UserReviewNotification
```

This will create a new notification class at `app/Notifications/UserReviewNotification.php`.

In this notification class, you can customize the content of the notification message. For example:

```php
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class UserReviewNotification extends Notification
{
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('A new review has been posted.')
            ->action('View Review', url('/reviews/' . $this->reviewId))
            ->line('Thank you for using our service!');
    }
}
```

**Step 2: Trigger Notification**

When a new review is posted, you'll need to trigger the notification. This might be done in your review controller or wherever reviews are stored. For instance:

```php
use App\Notifications\UserReviewNotification;

// After saving a new review
$user->notify(new UserReviewNotification($reviewId));
```

**Step 3: Admin Dashboard**

Now, let's set up the admin dashboard to display both read and unread notifications.

Assuming you have a route and a controller method for your admin dashboard, you can fetch the notifications like this:

```php
use Illuminate\Support\Facades\Auth;

public function adminDashboard()
{
    $user = Auth::user(); // Assuming the admin is logged in
    $unreadNotifications = $user->unreadNotifications;
    $readNotifications = $user->readNotifications;

    return view('admin.dashboard', compact('unreadNotifications', 'readNotifications'));
}
```

**Step 4: Display Notifications in the View**

In your admin dashboard view, you can iterate through the notifications to display them:

```html
<!-- Unread notifications -->
@foreach ($unreadNotifications as $notification)
    <div class="notification unread">
        {!! $notification->data['message'] !!}
        <a href="{{ route('mark.notification.read', ['id' => $notification->id]) }}">Mark as Read</a>
    </div>
@endforeach

<!-- Read notifications -->
@foreach ($readNotifications as $notification)
    <div class="notification read">
        {!! $notification->data['message'] !!}
    </div>
@endforeach
```

**Step 5: Mark Notification as Read**

Create a route and controller method to mark a notification as read:

```php
public function markNotificationAsRead($id)
{
    $notification = auth()->user()->notifications()->where('id', $id)->first();
    
    if ($notification) {
        $notification->markAsRead();
    }

    return redirect()->back();
}
```

**Step 6: Styling and AJAX (Optional)**

You can enhance the user experience by using AJAX to mark notifications as read without refreshing the page and by styling the notifications to fit your application's design.

Remember that this is a high-level guide, and you might need to adapt the code to fit your specific application structure and requirements.

### Mail and Databse Notification sent togather
---

```bash
<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppraisalGoalPublish extends Notification implements ShouldQueue
{
    use Queueable;

    private $sender;
    private $reviewPeriod;
    private $name;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($sender, $reviewPeriod)
    {
        $this->sender = $sender;
        $this->reviewPeriod = $reviewPeriod;
        $this->name = $this->sender->first_name.' '.$this->sender->last_name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->view(
            'your.view.path', ['name' => $this->name, 'reviewPeriod' => $this->reviewPeriod]
        );
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'sender' => $this->sender->id,
            'receiver' => $notifiable->id,
            'message' => 'The employee with the code $userCode and name ' . $this->name . ' has published his/her goals for the review Period '. $this->reviewPeriod .' for your approval. Thanks'
        ];
    }
}
```

* in controller file your can handle by following
```bash
$details = [

    'full_name' => $FirstName. ' ' . $LastName
];

$user->notify(new \App\Notifications\AppraisalGoalPublish($details));

# OR
 $user = User::where('role','admin')->get(); // to send to admin dashboard only.

Notification::send($user,new NewCommentNotification($details));

// Here , Custom Notification objects wil be enclosed of how many arguments is declared in the constructor   __construct($sender, $reviewPeriod);

```

* Send The data in Blade file via the following method
```bash
    public function toArray($notifiable)  //  this mehod can be **toDatabase($notifiable)**
    {
        return [
            'message'=>"New Comment added on the News",
            // 'reviewText'=>$this->ReviewInfo,
        ];
    }
```

* Use in Blade file 
```bash
# unReadNotifcation

     @php
$reviewcount = Auth::user()->unreadNotifications()->count()
     @endphp

# all UnReadNotification will  be looped here untill click or Read them.

but if want to delete from notice box after read of click the notification , must use the loop like this 

   @forelse ($user->unreadNotifications as $item)
        @php
            $item->markAsRead();
        @endphp 

@php
$user = Auth::user();
@endphp
         
         # all notification will  be looped here.

    @forelse($user->notifications as $notifiaction)
        <!-- item-->
        <a href="{{ route('pending.review') }}" class="dropdown-item notify-item">
            <div class="notify-icon bg-secondary">
                <i class="mdi mdi-heart"></i>
            </div>
            <p class="notify-details">{{ $notifiaction->data['message'] }}
                <b>Admin</b>
                <small class="text-muted"> {{ Carbon\Carbon::parse($notifiaction->created_at)->diffForHumans() }} </small>
            </p>
        </a>
     @empty

    @endforelse

    </div>
  
 **Note** :  {{ $notifiaction->data['message'] }} 

  above, data is column name of notification table and message of json text of data column field that means the message key of this return mentioned avobe in custom totification class method.
    return [
            'message'=>"New Comment added on the News",
            // 'reviewText'=>$this->ReviewInfo,
        ];
```

### all blade directives in laravel using with example

Blade is the templating engine used in Laravel, a popular PHP framework. Blade provides an elegant syntax for creating views and templates in Laravel applications. Here are some commonly used Blade directives with examples:

1. **{{ }}**: The double curly braces are used to escape and output content as HTML entities. This prevents cross-site scripting (XSS) attacks.

   Example:
   ```blade
   <p>Hello, {{ $name }}</p>
   ```

2. **{!! !!}**: The double curly braces with an exclamation mark allow you to output content as raw HTML. Use this directive with caution, as it doesn't automatically escape the content and may expose your application to XSS attacks.

   Example:
   ```blade
   <p>{!! $rawHtml !!}</p>
   ```

3. **@if, @else, @elseif, @endif**: These directives are used for conditional statements in Blade templates.

   Example:
   ```blade
   @if($isAdmin)
       <p>Welcome, Admin!</p>
   @else
       <p>Welcome, Guest!</p>
   @endif
   ```

4. **@unless**: This directive is used to perform the opposite of an `@if` condition. It executes the enclosed code block unless the condition is true.

   Example:
   ```blade
   @unless($loggedIn)
       <p>Please log in to continue.</p>
   @endunless
   ```

5. **@for, @foreach, @while**: These directives are used for looping through data.

   Example using `@foreach`:
   ```blade
   <ul>
       @foreach($items as $item)
           <li>{{ $item }}</li>
       @endforeach
   </ul>
   ```

6. **@forelse, @empty**: The `@forelse` directive works like `@foreach`, but it has a special `@empty` directive block that is executed if the loop is empty.

   Example:
   ```blade
   <ul>
       @forelse($items as $item)
           <li>{{ $item }}</li>
       @empty
           <li>No items available.</li>
       @endforelse
   </ul>
   ```

7. **@include**: This directive is used to include subviews or partials within your main views.

   Example:
   ```blade
   @include('partials.header')
   ```

8. **@yield, @section, @show, @extends**: These directives are used for creating and extending layouts.

   Example using `@yield` and `@section`:
   ```blade
   <!-- layout.blade.php -->
   <html>
       <head>
           <title>@yield('title')</title>
       </head>
       <body>
           @yield('content')
       </body>
   </html>

   <!-- page.blade.php -->
   @extends('layouts.layout')

   @section('title', 'Page Title')

   @section('content')
       <p>This is the page content.</p>
   @endsection
   ```

9. **@push, @stack**: These directives are used to push content onto a stack within a layout, allowing you to insert scripts or stylesheets at specific points.

   Example using `@push` and `@stack`:
   ```blade
   <!-- layout.blade.php -->
   <html>
       <head>
           @stack('styles')
       </head>
       <body>
           @yield('content')
           @stack('scripts')
       </body>
   </html>

   <!-- page.blade.php -->
   @extends('layouts.layout')

   @push('styles')
       <link rel="stylesheet" href="styles.css">
   @endpush

   @push('scripts')
       <script src="script.js"></script>
   @endpush
   ```

10. **@guest and @auth** Blade contains authentication directives that could be used to determine if the current user is authenticated or not.

```bash
@guest
    // The user is not authenticated...
@endguest
@auth
    // The user is authenticated...
@endauth
```

These are some of the most commonly used Blade directives in Laravel. They allow you to build dynamic and interactive views for your application.

11. **@forelse**The forelse directive is a special kind of loop. It is a foreach directive combined with the empty directive. Take a look at the following example:

```bash
@if ($blogs->count())
  @foreach ($blogs as $blog)
    <li>{{ $blog->title }}</li>
  @endforeach
@else
  <p>There are no blogs.</p>
@endif
```
12.**@inject**, The @inject directive is one of my faviourite directive and used on most places in my applications. The @inject directive used to retrieve a service from the Laravel’s Service Container and inject into your view.

The first argument passed to this directive is a variable name the service will be placed into, while the second argument is the class or interface of the service you want to inject.

```bash
@inject('menu', 'App\Services\MenuService')

// then in your view

{!! $menu->render() !!}

```

### Custom Blade Directive with Making Service Provider

Sure, I can provide you with an example of how to create a custom service provider to register custom Blade directives and then use those directives in a Blade template.

Step 1: Create the Custom Service Provider
Let's create a custom service provider called `CustomBladeDirectivesServiceProvider` where we'll define our custom Blade directives.

1. Create the service provider:
Run the following command to create a new service provider:
```sh
php artisan make:provider CustomBladeDirectivesServiceProvider
```

2. Open the generated `CustomBladeDirectivesServiceProvider.php` file located in the `app/Providers` directory. Inside the `boot` method, you can define your custom Blade directives:
```php
namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class CustomBladeDirectivesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::directive('datetime', function ($expression) {
            return "<?php echo \Carbon\Carbon::parse($expression)->format('Y-m-d H:i:s'); ?>";
        });

    
        Blade::directive('uppercase', function ($expression) {
            return "<?php echo strtoupper($expression); ?>";
        });


# @ifenv: Conditional check based on the environment.
        Blade::directive('ifenv', function ($expression) {
    return "<?php if(app()->environment($expression)): ?>";
});

Blade::directive('endifenv', function () {
    return "<?php endif; ?>";
});

# @ifenv: Conditional check based on the environment. End


# @repeat: Repeats the content within the directive a certain number of times.
Blade::directive('repeat', function ($expression) {
    list($count, $content) = explode(',', $expression, 2);
    return "<?php echo str_repeat($content, $count); ?>";
});

# @datetime is alternative of carbon datetitme 
 Blade::directive('datetime', function ($expression) {
        return "<?php echo with($expression)->format('Y-m-d H:i:s'); ?>";
    });

# @isadmin directive Start
    Blade::directive('isadmin', function () {
        return "<?php if(auth()->user() && auth()->user()->isAdmin()): ?>";
    });

    Blade::directive('endisadmin', function () {
        return "<?php endif; ?>";
    });

    # @isadmin directive Start

    }

    public function register()
    {
        //
    }
}
```

Step 2: Register the Service Provider
Add your custom service provider to the `providers` array in the `config/app.php` configuration file:
```php
'providers' => [
    // ...
    App\Providers\CustomBladeDirectivesServiceProvider::class,
],
```

Step 3: Using the Custom Blade Directives in a View
Now you can use the custom Blade directives in your Blade templates.

Create a new Blade view file, for example, `custom.blade.php`, and add the following content:
```blade

@extends('layouts.app')

@section('content')
    <p>Current date and time: @datetime(now())</p>
    <p>Uppercase text: @uppercase('hello world')</p>
@endsection

# @ifenv: Conditional check based on the environment.
@ifenv('local')
    <p>This is a local environment.</p>
@endifenv


# @repeat: Repeats the content within the directive a certain number of times.
@repeat(3, '<p>Repeated content</p>')


<p>Current date and time: @datetime(now())</p>

@isadmin
    <p>You are an admin user.</p>
@endisadmin

```

In this example, the `@datetime` directive formats the current date and time, and the `@uppercase` directive converts the provided text to uppercase.

Remember to adjust the layout and include the `@yield('content')` directive in your layout file (`layouts/app.blade.php` in this example).

After creating the view and layout, you can visit the route associated with the view to see the custom Blade directives in action.

That's it! You've created a custom service provider to register custom Blade directives and used those directives in a Blade template within the Laravel framework.

### Page title setup dynamically

```bash

@yield('title');  # in home Page

@section('title', $news->news_title) # in different Pages

```

### Validation In Laravel

Create Public Method for both of crating and updating data.
in the following the concenated id ($requestForm->id)

```bash
 public function PermissionValidation($requestForm)
    {
      return   $requestForm->validate([
            'name'=>'required|unique:permissions,name,' . $requestForm->id, 
            'group_name'=>'required',
        ],[
            'name.required'=> 'permission name must be filled up',
            'name.unique'=>'The permission Name already Exist, Try with another name'
        ],
    );
    }

    # Or separate ID parameter

     public function PermissionValidation($requestForm, $id == null)
    {
      return   $requestForm->validate([
            'name'=>'required|unique:permissions,name,' . $id, 
            'group_name'=>'required',
        ],[
            'name.required'=> 'permission name must be filled up',
            'name.unique'=>'The permission Name already Exist, Try with another name'
        ],
    );
    }

    #or alternative system. We Know that one column validation rules can be declared in array ['required','email',Rule::unique('users', 'email')->ignore($id),]. like the following.

    $requestForm->validate(
        ['email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($id),
            ],
            ]
            );
```
In Blade File to show the error

```bash
<div class="form-group col-md-6 mb-3">
                <label for="inputEmail4" class="form-label">Roles Name </label>
                <input type="text" value={{ old('name') }} name="name" class="form-control" id="inputEmail4" placeholder="Add Roles">
                @error('name')
                <div class="alert alert-danger w-100 text-center bg-white m-1">{{ $message }}</div>
            @enderror
            </div>
```

### how to checked related checkbox  by clicking a single checkbox and not checked all by one in foreach loop in laravel.

It seems like you want to achieve a "check all" functionality for the related checkboxes within a specific group, rather than checking all checkboxes across all groups. To implement this, you need to make sure that each group checkbox is responsible for toggling only the checkboxes within its own group. Here's how you can achieve this in Laravel using jQuery:

Assuming you have a foreach loop in your Laravel Blade view that generates group checkboxes and associated permission checkboxes:

```html
@foreach($groups as $group)
    <input type="checkbox" class="group_name" data-group-id="{{ $group->id }}">
    <label>{{ $group->name }}</label>

    @foreach($group->permissions as $permission)
        <input type="checkbox" class="permission_checkbox group_{{ $group->id }}" name="permission[]" value="{{ $permission->id }}">
        <label>{{ $permission->name }}</label>
    @endforeach
@endforeach
```

In the above code, we've added the `data-group-id` attribute to the group checkbox and used a `group_{{ $group->id }}` class for the permission checkboxes associated with each group.

Now, you can update your jQuery script to handle the "check all" functionality within each group:

```javascript
$('.group_name').on('click', function() {
    var groupId = $(this).data('group-id');
    var permissionCheckboxes = $('.permission_checkbox.group_' + groupId);

    permissionCheckboxes.prop('checked', $(this).is(':checked'));
});

# To select all combobox by one click , another example in the following

  $('#customckeck15').click(function(){
            if ($(this).is(':checked')) {
                $('input[type = checkbox]').prop('checked',true);
            }else{
                 $('input[type = checkbox]').prop('checked',false);
            }
         });
```

This script listens for the click event on each `.group_name` checkbox. When a group checkbox is clicked, it extracts the `data-group-id` attribute to determine the associated group's ID. Then, it selects all permission checkboxes with the class `.permission_checkbox` and the specific group class (e.g., `.group_1`, `.group_2`, etc.) and sets their checked status to match the checked status of the group checkbox.

With this setup, when you click a group checkbox, it will toggle the related permission checkboxes within that specific group, without affecting other groups' checkboxes.

### Laravel Database data access from a table and related data based on parent  data.

```bash

Suppose Permissions\'s Group Name and Permission name by Group Name.

      @php
          $idkey = 0;
          $forkey=0;
      @endphp

      @foreach ($role_has_permissions_group as $groupkey =>  $permissions_group_name)
          
      
         <div class="row">
            <div class="col-3">
                <div class="form-check mb-2 form-check-primary">
                    <input class="form-check-input group_name" data-group-id="{{ $groupkey }}" type="checkbox" value="" id="customckeck{{ $idkey++ }}">
                    <label class="form-check-label" for="customckeck{{ $forkey++ }}">
                        {{ $permissions_group_name->group_name }}
                    </label>
                </div>
            </div>

            @php
                $group_wise_permission_name = App\Models\User::GroupByPermissionName($permissions_group_name->group_name);
            @endphp

            <div class="col-9">
                @foreach ($group_wise_permission_name as $key => $permission_name)
                    
               
                <div class="form-check mb-2 form-check-primary">
                    <input class="form-check-input permission_checkbox group_{{ $groupkey }}" name="permission[]" type="checkbox" value="{{ $permission_name->id }}" id="customckeck{{ $permission_name->id }}">
                    <label class="form-check-label" for="customckeck{{ $permission_name->id }}">

                        {{ $permission_name->name }}

                    </label>
                </div>

                @endforeach
                
                <br>

            </div>
            
        </div>

        @endforeach
```
### how to Redirect to role wise dashboard after a different login page and back to their own login page after the session close in the Laravel.

To achieve role-based redirection in Laravel after login and returning to the respective login page after session closure, you can follow these steps:

1. **Set Up Multiple Login Routes and Redirects:**
    In your `routes/web.php` file, define different login routes for each user role. Also, specify the routes to redirect users to after successful login.

```php
Route::group(['middleware' => 'guest'], function () {
    // Admin login route
    Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm');
    Route::post('/admin/login', 'Auth\AdminLoginController@login');
    
    // User login route
    Route::get('/user/login', 'Auth\UserLoginController@showLoginForm');
    Route::post('/user/login', 'Auth\UserLoginController@login');
});
```

2. **Create Custom Login Controllers:**
    Create separate controller classes for each user role. Make sure these controllers extend Laravel's built-in `App\Http\Controllers\Auth\LoginController` and override the `$redirectTo` property.

```php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/dashboard'; // Redirect after login

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

class UserLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/user/dashboard'; // Redirect after login

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
```

3. **Implement Custom Logout Functionality:**
    Customize the logout functionality to redirect users back to their respective login pages after session closure. You can do this by overriding the `logout` method in your `LoginController`.

```php
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Existing code
    
    public function logout(Request $request)
    {
        $redirectTo = '/'; // Default redirect
        
        if (Auth::guard('admin')->check()) {
            $redirectTo = '/admin/login'; // Admin logout
        } elseif (Auth::guard('web')->check()) {
            $redirectTo = '/user/login'; // User logout
        }
        
        $this->guard()->logout();
        $request->session()->invalidate();
        
        return redirect($redirectTo);
    }
}
```

4. **Update Middleware for Dashboard Access:**
    Use middleware to ensure that only authenticated users with the appropriate roles can access their respective dashboards.

```php
Route::middleware(['auth:admin', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', 'AdminController@dashboard');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', 'UserController@dashboard');
});
```

5. **Implement Role Middleware:**
    Create a custom middleware to check the user's role and grant or deny access accordingly. You can create a middleware using the `php artisan make:middleware RoleMiddleware` command.

```php
public function handle($request, Closure $next, $role)
{
    if ($role === 'admin' && Auth::guard('admin')->check()) {
        return $next($request);
    } elseif ($role === 'user' && Auth::guard('web')->check()) {
        return $next($request);
    }

    abort(403, 'Unauthorized');
}
```

Remember to adjust namespaces and class names according to your application's structure. This example assumes you have separate guards for admin and user (you might need to define these guards in your `config/auth.php` file). Also, don't forget to implement the actual dashboard controller actions.

Always make sure to test thoroughly to ensure everything works as intended.

### how to Redirect to role wise dashboard after a different login page and back to their own login page after the session close in the Laravel breeze package.

To achieve role-based redirection after a different login page and returning to their own login page after the session closes using the Laravel Breeze package, you can follow these steps:

1. **Set Up Role-based Redirection:**

   In Laravel Breeze, you can customize the redirection logic in the `Authenticate.php` middleware. This middleware handles the redirection after successful login. To redirect users based on their roles, you can modify the `handle` method in `app/Http/Middleware/Authenticate.php`:

   ```php
   public function handle($request, Closure $next, ...$guards)
   {
       $guards = empty($guards) ? [null] : $guards;

       foreach ($guards as $guard) {
           if (Auth::guard($guard)->check()) {
               $user = Auth::guard($guard)->user();
               if ($user->hasRole('admin')) {
                   return redirect('/admin/dashboard'); // Redirect to admin dashboard
               } elseif ($user->hasRole('user')) {
                   return redirect('/user/dashboard'); // Redirect to user dashboard
               }
           }
       }

       return $next($request);
   }
   ```

   This code snippet assumes that you have a `hasRole` method in your User model to check the user's role.

2. **Return to Specific Login Page:**

   To redirect users back to their respective login pages after the session closes, you can customize the login path in the `LoginController.php` of Laravel Breeze:

   ```php
   protected function loggedOut(Request $request)
   {
       return redirect()->route('login'); // Redirect to the general login page
   }
   ```

   In this example, it redirects users to the general login page. You can modify this method to redirect users to different login pages based on their roles.

Remember to adjust the route names, URLs, and role-checking logic to match your application's structure and requirements.

3. **Session Timeout Handling:**

   To handle the session timeout, you might need to customize the behavior in Laravel's built-in authentication system. Specifically, you can modify the `App\Http\Middleware\AuthenticateSession.php` middleware to achieve this.

   ```php
   protected function redirectTo($request)
   {
       if (! $request->expectsJson()) {
           if (Auth::check()) {
               $user = Auth::user();
               if ($user->hasRole('admin')) {
                   return route('admin.login'); // Redirect admin to admin login
               } elseif ($user->hasRole('user')) {
                   return route('user.login'); // Redirect user to user login
               }
           }
       }
   }
   ```

   This code will redirect users to their respective login pages when their session times out.

Please make sure to adjust the code according to your specific routes, roles, and folder structures. It's also important to ensure that your authentication system and role management are properly set up before implementing these changes.

### how to controll admin panel base on role and permission in laravel?

Controlling the admin panel based on roles and permissions in Laravel involves a multi-step process. You can utilize packages like Spatie Laravel Permissions and create middleware to handle role and permission checks. Here's a step-by-step guide:

1. **Install and Configure Spatie Laravel Permissions:**
   Install the package using Composer:
   
   ```bash
   composer require spatie/laravel-permission
   ```

   After installation, run the migration to create the necessary tables:

   ```bash
   php artisan migrate
   ```

   In your `config/auth.php` file, set the user provider to use the `eloquent` provider.

   ```php
   'providers' => [
       'users' => [
           'driver' => 'eloquent',
           'model' => App\Models\User::class,
       ],
   ],
   ```

2. **Define Roles and Permissions:**
   In your `User` model, use the `HasRoles` and `HasPermissions` traits provided by the package:

   ```php
   use Spatie\Permission\Traits\HasRoles;
   use Spatie\Permission\Traits\HasPermissions;

   class User extends Authenticatable
   {
       use HasRoles, HasPermissions;
       
       // ...
   }
   ```

   Define roles and permissions in your application. You can do this in a seeder or directly in a migration:

   ```php
   use Spatie\Permission\Models\Role;
   use Spatie\Permission\Models\Permission;

   // Create roles
   $adminRole = Role::create(['name' => 'admin']);
   $userRole = Role::create(['name' => 'user']);

   // Create permissions
   $manageUsers = Permission::create(['name' => 'manage users']);
   $managePosts = Permission::create(['name' => 'manage posts']);

   // Assign permissions to roles
   $adminRole->givePermissionTo([$manageUsers, $managePosts]);
   ```

3. **Create Middleware for Role and Permission Checks:**
   Create a middleware to check for roles and permissions. This middleware can be used to protect routes and actions that require specific roles or permissions.

   ```bash
   php artisan make:middleware CheckRolePermission
   ```

   In the `handle` method of the middleware, perform the role and permission checks:

   ```php
   public function handle($request, Closure $next, ...$rolesAndPermissions)
   {
       $user = Auth::user();

       if (! $user->hasAnyRole($rolesAndPermissions) && ! $user->hasAnyPermission($rolesAndPermissions)) {
           abort(403, 'Unauthorized action.');
       }

       return $next($request);
   }
   ```

4. **Apply Middleware to Routes:**
   Apply the custom middleware to routes that require specific roles or permissions.

   ```php
   Route::middleware(['auth', 'role-permission:admin,manage users'])->group(function () {
       // Your admin panel routes here
   });
   ```

5. **Use Middleware in Controllers:**
   In your controller methods, use the middleware to protect specific actions:

   ```php
   public function manageUsers()
   {
       // This action is only accessible to users with the "admin" role or the "manage users" permission
   }
   ```

By following these steps, you can control access to your admin panel based on roles and permissions using the Spatie Laravel Permissions package. Remember to adjust the role and permission names, middleware, and routes according to your application's requirements.


### Error Handling In Laravel
---

As of my last knowledge update in September 2021, Laravel 8 was the latest version available. However, I can still provide you with information about error handling and custom error pages in Laravel, although the specifics might change if Laravel 10 is released after my last update.

In Laravel, you can handle various types of errors and create custom error pages to provide a better user experience. Common HTTP errors like 404 (Not Found) and 500 (Internal Server Error) can be customized to display user-friendly messages or views.

Here's how you can handle and customize these errors in Laravel:

1. **Customizing Error Views:**
   Laravel allows you to create custom error views for different HTTP error codes. These views are located in the `resources/views/errors` directory. You can create blade view files for specific error codes, such as `404.blade.php` for the 404 error and `500.blade.php` for the 500 error. Customize these views according to your design and messaging preferences.

2. **Exception Handling:**
   Laravel's `App\Exceptions\Handler` class is responsible for handling exceptions and converting them into HTTP responses. You can customize how exceptions are handled in the `render` method of this class. To handle specific exceptions, you can check the type of exception and return a custom response. For example:

   ```php
   public function render($request, Throwable $exception)
   {
       if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
           return response()->view('errors.404', [], 404);
       }

       // Handle other exceptions...

       return parent::render($request, $exception);
   }
   ```

3. **Registering Custom Error Pages:**
   You can also register custom error pages in your `app/Providers/AppServiceProvider.php` file's `boot` method using the `View::share` method:

   ```php
   public function boot()
   {
       $this->registerErrorViews();

       // Other boot logic...
   }

   protected function registerErrorViews()
   {
       view()->share('errorCode', ''); // Set a default value

       view()->composer('errors.404', function ($view) {
           $view->with('errorCode', 404);
       });

       // Add similar composers for other error views...
   }
   ```


Remember to customize the handling of each exception based on your application's requirements.

4. **Maintenance Mode:**

You can put your application into maintenance mode by running the `php artisan down` command. This will display a maintenance mode view when users access your application.

```bash
php artisan down --message="We're doing some maintenance. Please check back later."
```

5. **Customizing Maintenance Mode Page:**

You can customize the maintenance mode page by modifying the `resources/views/errors/503.blade.php` view.


As of my last knowledge update in September 2021, Laravel 10 had not been released yet. The latest version available at that time was Laravel 8. However, I can provide you with information on how error handling and custom error pages are typically implemented in Laravel. Keep in mind that some details might have changed in newer versions, so it's always a good idea to consult the official Laravel documentation for the most up-to-date information.

In Laravel, you can handle various types of errors and customize error pages using the following steps:

1. **Handling Exceptions:**

Laravel provides a powerful exception handling mechanism through the `App\Exceptions\Handler` class. You can customize this class to handle different types of exceptions. Here's how you can define custom exception handling:

First, create a new exception class if needed:

```bash
php artisan make:exception CustomException
```

Then, open the `app\Exceptions\Handler.php` file and update the `report` and `render` methods to handle your custom exceptions and other built-in exceptions:

```php
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    // ...

    public function render($request, Exception $exception)
    {
        if ($exception instanceof CustomException) {
            return response()->view('errors.custom', [], 500);
        }

        return parent::render($request, $exception);
    }

    // ...


 # OR alternative 


    public function render($request, Exception $exception)
{
    if ($this->isHttpException($exception)) {
        if ($exception->getStatusCode() == 404) {
            return response()->view('errors.' . '404', [], 404);
        }
        if ($exception->getStatusCode() == 500) {
            return response()->view('errors.' . '500', [], 500);
        }
    }
    return parent::render($request, $exception);
}


    # OR alternative 

    public function register(): void
{

   $this->renderable(function (NotFoundHttpException $e, Request $request) {



        if ($request->is('api/*')) {
            return response()->json([
                'message' => 'Record not found.'
            ], 404);
        }


    });


}
}
# OR ALTERNATIVE 

public function render($request, Throwable $exception)
{
    if ($exception instanceof NotFoundHttpException) {
        return response()->view('errors.404', [], 404);
    }

    if ($exception instanceof \PDOException) {
        return response()->view('errors.500', [], 500);
    }

    return parent::render($request, $exception);
}


```


Inside the `errors` directory, create Blade view files for different error codes. For example:

- `resources/views/errors/404.blade.php` for the 404 error page.
- `resources/views/errors/500.blade.php` for the 500 error page.

Customize these views as needed, adding your own HTML, CSS, and design elements.

3. **Error Logging:**

Laravel also supports error logging out of the box. You can configure error logging in the `.env` file using the `LOG_CHANNEL` and related settings.

For example, to log errors to the `daily` log channel, add or update the following in your `.env` file:

```env
LOG_CHANNEL=daily
```

4. **Using Route Closures for Error Pages (Optional):**

In some cases, you might want to return custom error pages directly from your routes. You can do this using route closures:

```php
Route::get('/404', function () {
    return view('errors.404');
});

Route::get('/500', function () {
    return view('errors.500');
});

```

5. **HTTP Exceptions (404, 500, etc.):**

Laravel provides the abort() function to throw HTTP exceptions. You can use this function to return a specific HTTP response with a status code and a message.

```BASH

// For a 404 Not Found error
if (!$user) {
    abort(404, 'User not found');
}

// For a 500 Internal Server Error
if ($errorCondition) {
    abort(500, 'Something went wrong');
}

```

### how to get a database html data in laravel with various Format

In this example, strip_tags($post->content) removes all HTML tags from the post's content, and then Str::limit is applied to the stripped content. The use of {!! !!} around the Str::limit output ensures that the HTML is not escaped, allowing it to be rendered as HTML.
```bash
@foreach($posts as $post)
    <div class="post">
        <h2>{{ $post->title }}</h2>
        <p>{!! Str::limit(strip_tags($post->content), 150,'...') !!}</p> // '...' is optional parameter . it can be used like ''
         or
          <p>{!! Str::words(strip_tags($post->content), 150,'') !!}</p>
    </div>
@endforeach

```

### polymorphic relationship  tags in news , video  and photo gallery table in laravel
---

Setting up a polymorphic relationship in Laravel for a news portal project where tags can be associated with news articles, videos, and photo galleries involves a few steps. Polymorphic relationships allow a single relationship to be used for multiple types of models. Here's how you can achieve this:

Let's assume you have three tables/models: `News`, `Video`, and `PhotoGallery`, and you want to associate tags with each of these models.

1. **Database Setup:**

You'll need a table to store tags and a pivot table to manage the relationships. Create the necessary migration files:

```bash
php artisan make:migration create_tags_table
php artisan make:migration create_taggables_table
```

In the `create_tags_table` migration:

```php
public function up()
{
    Schema::create('tags', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->timestamps();
    });
}
```

In the `create_taggables_table` migration:

```php
public function up()
{
    Schema::create('taggables', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('tag_id');
        $table->unsignedBigInteger('taggable_id');
        $table->string('taggable_type');
        $table->timestamps();
        
        $table->unique(['tag_id', 'taggable_id', 'taggable_type']);
        
        $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
    });

}

 # OR alternative

    public function up()
{
    Schema::create('taggables', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('tag_id');
        $table->unsignedBigInteger('taggable_id');
        $table->string('taggable_type');
        $table->timestamps();
    });
}
```

Run the migrations:

```bash
php artisan migrate
```

2. **Models Setup:**

In each of your models (`News`, `Video`, `PhotoGallery`), you'll define the polymorphic relationship with the `Tag` model.

```php
use Illuminate\Database\Eloquent\Model;

# In your Tag model, define the morphedByMany relationship:

class Tag extends Model
{
    // ...

   public function taggable()
{
    return $this->morphTo();
}

# or alternative 

public function news()
{
    return $this->morphedByMany('App\News', 'taggable');
}

public function videos()
{
    return $this->morphedByMany('App\Video', 'taggable');
}

public function photoGalleries()
{
    return $this->morphedByMany('App\PhotoGallery', 'taggable');
}



}


class News extends Model
{
    // ...

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}

class Video extends Model
{
    // ...

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}

class PhotoGallery extends Model
{
    // ...

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
```

3. **Creating and Retrieving Tags:**

You can now use these relationships to attach and retrieve tags for each model.

```php
$news = News::find(1);
$news->tags()->attach([1, 2, 3]); // Attach tags to the news article

$tags = $news->tags; // Retrieve tags associated with the news article

// Similarly, for Video and PhotoGallery
$video = Video::find(1);
$video->tags()->attach([2, 3, 4]);

$photoGallery = PhotoGallery::find(1);
$photoGallery->tags()->attach([1, 4, 5]);

# or alternative 
// Attaching tags to a model
$news = News::find(1);
$news->tags()->attach($tagIds);

// Retrieving tags for a model
$news = News::find(1);
$tags = $news->tags;

```

4. **Retrieving Models by Tag:**

You can also retrieve models associated with a specific tag.

```php
$tag = Tag::find(1);

$newsWithTag = $tag->news; // Retrieve news articles with this tag
$videosWithTag = $tag->videos; // Retrieve videos with this tag
$photoGalleriesWithTag = $tag->photoGalleries; // Retrieve photo galleries with this tag
```

That's the basic setup for a polymorphic relationship involving tags and multiple types of models in a Laravel news portal project. You can customize and expand upon this foundation to suit your specific project requirements.

### public function tags() **: MorphToMany** why used that type of class with : colon in laravel ?

The : MorphToMany after the method declaration indicates the return type of the method, which is a hint for developers and IDEs to understand the expected return type.

```bash
public function tags() : MorphToMany
{
    return $this->morphToMany(Tag::class,'taggable');
};
```
Regarding the : MorphToMany in the method declaration, it's optional and not strictly necessary for the code to work correctly. It's a type hint that helps you and your IDE understand the expected return type of the method. Laravel will still establish the relationship correctly even if you omit the : MorphToMany type hint. However, including it can improve code readability and help catch potential type-related errors during development.

In Wrap up : The : MorphToMany type hint is optional but can be helpful for code clarity and type safety.

### Using Polymorphic In Blade File (CRUD)

If you want to display the previously associated tags as a comma-separated list in a single input field for editing news, you can follow these steps:

1. Store or Create File.
```php
 public function AllPhotoGallery(){

        $photo = PhotoGallery::latest()->get();
        return view('backend.photo.all_photo',compact('photo'));

    } // End Method 

    # In above blade file set the code like the following
                       <td>
                        @php
                            $allTags = $item->tags->pluck('name')->toArray();
                        @endphp
                        @foreach ($allTags as $tag)
                            <span class="badge fill-round bg-primary">{{ $tag }}</span>
                        @endforeach
                    </td>


public function store(Request $request)
{
 $gallery = PhotoGallery::create([
                    'photo_gallery'=>$save_url,
                    'post_date'=>Carbon::now()->format('D F Y'),
                ]);

    // Attach tags
     // data set in input like international,national,business . it is used if the input tag is 
     <input type="text" name="tags"  class="selectize-close-btn" value="{{ old('tags') }}"> tag name will be store as string.

     if stored input value in  array  name="tags[]" ,
     we get the tags ,

     $tags = $request->tags.

     Otherwise

     $tags = explode(',', $request->input('tags'));

    foreach ($tags as $tagName) {
        $tag = Tag::insertGetId(['name' => $tagName]);
        $gallery ->tags()->attach($tag);
    }

    return redirect()->route('news.index')->with('success', 'News created successfully');
}
```
1. Retrieve the existing tags associated with the news item in your controller:

```php
$news = News::findOrFail($id);
$existingTags = $news->tags->pluck('name')->implode(',');
```

2. Pass the `$existingTags` variable to your Blade view:

```php
return view('news.edit', compact('news', 'existingTags'));
```

3. In your Blade view's edit form, populate the input field with the existing tags:

```html
<form method="POST" action="{{ route('news.update', $news->id) }}">
    <!-- ... other fields ... -->
        <input type="text" name="tags" value="{{ $existingTags }}" class="form-control">
    <!-- ... submit button ... -->
</form>
```

4. In your update method of the controller, you can handle updating the tags as follows:

```php
    public function AllVideoGallery(){

        $video = VideoGallery::latest()->get();
        return view('backend.video.all_video',compact('video'));

    } // End Method 


    public function AddVideoGallery(){
        return view('backend.video.add_video');
    } // End Method 


   public function StoreVideoGallery(Request $request){


      $videoGallery =  VideoGallery::create([

            'video_title' => $request->video_title,
            'video_url' => $request->video_url, 
        ]);

        $tags = explode(',',$request->input('tags'));
        $tagIds = [];
        foreach ($tags as  $tag) {
            $storeTag = Tag::firstOrCreate(['name'=>trim($tag)]);
            $tagIds[] = $storeTag->id;
        }
        $videoGallery->tags()->attach($tagIds);

         $notification = array(
            'message' => 'Video Inserted Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('all.video.gallery')->with($notification);


    }// End Method



    public function EditVideoGallery($id){

        $video = VideoGallery::findOrFail($id);
        $existing_tags = $video->tags->pluck('name')->implode(',');
        // dd($existing_tags);
        return view('backend.video.edit_video',compact('video','existing_tags'));

    }// End Method


    public function UpdateVideoGallery(Request $request){

        $video_id = $request->id;
        $videoImage = VideoGallery::findOrFail($video_id);
        $prev_tags = $videoImage->tags->pluck('id')->toArray();

        VideoGallery::findOrFail($video_id)->update([

            'video_title' => $request->video_title,
            'video_url' => $request->video_url,  
            
        ]);

        return redirect()->route('all.video.gallery')->with($notification);


        //    $videoImage->tags()->detach();
          $tags = explode(',', $request->input('tags'));
          $tagID=[];
          foreach ($tags as $tagName) {
              $tag = Tag::firstOrCreate(['name' => $tagName]);
              $tagID[]=$tag->id;
          };
  
          $videoImage->tags()->sync($tagID);
          // Delete the tag that is associated with video image
          Tag::whereIn('id',$prev_tags)->has('videoGallary','=',0)->delete();

        return redirect()->route('all.video.gallery')->with($notification);

        }

     public function DeleteVideoGallery($id){

        $photo = VideoGallery::findOrFail($id);
        $tagIds = $photo->tags->pluck('id')->toArray();

        $photo->tags()->detach();
        VideoGallery::findOrFail($id)->delete();

        Tag::whereIn('id',$tagIds)->has('videoGallary','=',0)->delete();

        return redirect()->back()->with($notification); 

    }// End Method 

```
Note : Apologies for any confusion. In the context of `Tag::whereIn('id', $tagIds)->has('news', '=', 0)->delete();`, the `0` is not related to an index. It represents the count of related news articles.

The line of code `->has('news', '=', 0)` is checking for tags that have zero related news articles. It's not referring to an index but rather specifying a condition for filtering tags based on the count of related news articles.

In Laravel's Eloquent ORM, the `has` method is used to filter results based on the existence of related records. In this case, it's being used to filter tags that have no related news articles (i.e., their count is zero).

So, the entire line of code is essentially saying "delete tags that are in the given `$tagIds` array and have no related news articles (count equals 0)." It's part of the process of cleaning up unused tags from the `tags` table.
