## APIs

- prefix `api/`
- example errors

```
{
  "message": "The given data was invalid.",
  "errors": {
    "key": [
      "The passport has already been taken."
    ],
    "inn_code": [
      "The inn code has already been taken."
    ]
  }
}
```

## Generate docs

`php artisan scribe:generate`

Url to documentation `/docs`.
If documents outdated, need remove folder __storage/docs__
Or run command with key `--force`: `php artisan scribe:generate --force`

## Start Project
1. command `composer install`
2. create a database and specify settings for `.env`
3. `php artisan migrate`
4. `php artisan db:seed`
5. `php artisan passport:install`

## Errors

Personal access client not found. Please create one. - php artisan passport:client --personal

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.
