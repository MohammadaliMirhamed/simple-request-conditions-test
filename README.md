## Quick Start
- Create a copy from ```.env.example``` and name it as ```.env```
- ```composer install```
- ```./vendor/bin/sail up```
- ```./vendor/bin/sail artisan migrate```
- then the application serve over the ```http://localhost:8000```
- import ```team-blue-test.postman_collection.json``` into postman
- prepar your postman's ```ENV```, then try it

### notice :
endpoints of this project is protecting by a auth system,
for fast try you can remove the ```['auth:api']``` middleware from process route

## Code
in this project following concepts has been used :
- Service Pattern
- SOILD Princples
- Dependency Injection

## Telescope
after registration as user go to ``` /app/Providers/TelescopeServiceProvider.php ```
then add your user's email in ``` gate ``` method:
```
 /**
     * Register the Telescope gate.
     *
     * This gate determines who can access Telescope in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewTelescope', function ($user) {
            return in_array($user->email, [
                'name@example.com',
            ]);
        });
    }
```
after that open the ```/telescope``` route to monitor your application.

## What's Run
- Laravel
- Telescope (Application monitoring)
- Redis
- MariaDB
- Docker
