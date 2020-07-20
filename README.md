# JournalTask
A web application to manage articles posting

# Installation

The application is developed using [Laravel](https://laravel.com/) (PHP Framework), so make sure you meet it's last stable version requirements, also we would need to use a package manager for the front end package we would move with [yarn](https://yarnpkg.com/) in our steps but you can use whatever you want.


To install the application run the following commands

1. clone the repo
``` bash
git clone https://github.com/ScSherifTarek/JournalTask && cd JournalTask
```

2. Install back-end packages
``` bash
composer install
```

3. Install front-end packages
``` bash
yarn
```

4. Setup your enviorment variables, you should setup your database configruations here
``` bash
cp .env.example .env
```

5. Generate APP_KEY
``` bash
php artisan key:generate
```

6. Run our migrations to setup the database tables
``` bash
php artisan migrate
```

7. Compile our assets
``` bash
npm run dev
```

8. As an optional step we made for you a command to make an admin (Samir) for you, run the following command whenever you need one
``` bash
php artisan make:admin
```
run `php artisan help make:admin` to see the other options, you can pass an email and a password if you prefer to

9. As an optional step we have developed a seeder for you so you can work directly with some fake data, to generate some fake records run the following command
``` bash
php artisan db:seed
```

# Description
- Fork the repo to your Github https://help.github.com/en/articles/fork-a-repo.
- Push your work to your forked repo "user-name/JournalTask".
- Create pull request in the original repo "devsquads/JournalTask"

# Story
Samir the chief editor in “legen- wait for it-dary news” asked the journal owner Yehia to make him an appointment with DevSquads their technical partner to ask them for help.
He wants to make an app that would help him manage the articles that being posted by the journalists, Samir is the only one that can delete articles, and approve the articles to be published, every article has a title, description, and author name.


# Requirements
- List of articles sorted by most popular authors ( who has the highest number of published articles).
- Create article.
- Delete article.
- Only Samir can approve/delete articles.
- When an author view all articles, they see their own articles first. 
- Edit README to include the reqired steps to run your application.

# Stack
- Choosing the tech stack is up to you.

# Nice to have
- Tests.
- Organized and well written git commit history.
- E2E tests.

# Task Deadline
- Monday Morning 20/07/2020.
