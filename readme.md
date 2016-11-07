# Easy View Presenters for Laravel 5

[![Build Status](https://travis-ci.org/gocrew/laravel-presenter.svg)](https://travis-ci.org/gocrew/laravel-presenter)
[![Latest Stable Version](https://poser.pugx.org/gocrew/laravel-presenter/v/stable)](https://packagist.org/packages/gocrew/laravel-presenter)
[![Latest Unstable Version](https://poser.pugx.org/gocrew/laravel-presenter/v/unstable)](https://packagist.org/packages/gocrew/laravel-presenter)
[![License](https://poser.pugx.org/gocrew/laravel-presenter/license)](https://packagist.org/packages/gocrew/laravel-presenter)

![Repo Picture](https://images.unsplash.com/photo-1440339738560-7ea831bf5244?q=80&fm=jpg&h=200&w=800&fit=crop)

## Installation

Add Presenter to your composer.json file:

```js
"require": {
    "gocrew/laravel-presenter": "~1.0"
}
```

Now, run a composer update on the command line from the root of your project:

    composer update

### Registering the Package

Include the service provider within `app/config/app.php`. The service povider is needed for the generator artisan command.

```php
'providers' => [
    ...
    gocrew\LaravelPresenter\PresenterServiceProvider::class
    ...
];
```

## Usage

First, generate a presenter
```bash
php artisan make:presenter [presenter name]
```

Here's an example of a presenter.
```php
use gocrew\LaravelPresenter\Presenter;

class UserPresenter extends Presenter {

    public function name()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    public function joined()
    {
        return $this->created_at->diffForHumans();
    }

}
```

Next, on your entity, pull in the gocrew\LaravelPresenter\Presentable trait, which will instantiate the presenter class automatically for you.

```php

use gocrew\LaravelPresenter\Presentable;

class User extends Eloquent {

    use Presentable;

    protected $presenter = App\UserPresenter::class;

}
```

And that is all you have to do. Now you can do the following:
```
<p>Hi, {{ $user->present()->name }}</p>
```

## License

The contents of this repository is released under the [MIT license](http://opensource.org/licenses/MIT).
