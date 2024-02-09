# Repository Pattern Implementation in PHP

This repository contains a sample implementation of the repository pattern in PHP, showcasing its benefits and usage.

## Introduction to Repository Pattern

The repository pattern is used to separate concerns, abstract data access, and facilitate easier unit testing.

## Basic Structure

The basic structure of the repository pattern includes a repository interface and a concrete implementation.

## Implementation in a Sample Project

In this repository, we implement the repository pattern for managing users.

## Dependency Injection

Dependency injection is used to inject the repository implementation into consuming classes, promoting loose coupling and easier maintenance.

## CRUD Operations

CRUD operations (Create, Read, Update, Delete) are demonstrated using the repository pattern, showing interaction with the underlying data source.

## Live Coding Session

### Implement Interface

```php
<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function getById($id);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);
}
```

## create example repository

```php
<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getById($id)
    {
        return User::findOrFail($id);
    }

    public function create(array $data)
    {
        return User::create($data);
    }

    public function update($id, array $data)
    {
        $user = $this->getById($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $user = $this->getById($id);
        $user->delete();
    }
}
```

## inject repository in the controller

```php
<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryInterface;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function show($id)
    {
        $user = $this->userRepository->getById($id);
        return view('user.show', compact('user'));
    }
}
```

## bind interface to its implementation

```php
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\UserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
```