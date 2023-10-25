<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Quotable Tech Test

Full Stack Laravel example of a favourite Movie Quote voting system.

### Task

MQDB: Movie Quotes Database
Our latest venture is to build out the definitive "movie quotes database". This web app will be used by movie lovers to review and vote on which movie quote should be named the "best move quote of all time".

The end goal is to build a community of movie lovers who can interact with each other through the platform, and engage in conversations about their love for movies, however the first step is to build out the "movie quote ranking" feature. This MVP web app should display a list of famous movie quotes, ordered by popularity, which can be voted up and / or down by visitors to the web site.

The list of movie quotes should be re-ordered each time a site visitor submits their vote, to reflect the latest popularity order.

The web app must:
- Present a list of movie quotes, ordered by popularity
- Provide a mechanism for web app visitors to vote a quote up or down, which will affect the
order of the movie quotes.
- Display the movie quotes based on data stored in a SQL database
All data should be persisted in a SQL database, and be fetched/created/updated via HTTP
requests to the Laravel application.

We are not necessarily looking for any user authentication / authorisation here, unless you feel that this is achievable in a short space of time. We would like to discuss how your web app could be extended to achieve this, however.

## Features
- Dockerised via Laravel Sail
- User authentication system via Laravel Sanctum
- Vote once per quote per user
- Quotes are ordered by the number of votes they have received
- Indicators to show which votes have been made by the current user
- Each vote on the UI asynchronously updates the vote count on the server and reorders the list of quotes without requiring a page refresh

## Prerequisites
- Docker
- Composer
- npm

## Installation
- Clone this repository to your local machine
- Copy the `.env.example` file to `.env`
- Run `composer install` to install dependencies
- Run `./vendor/bin/sail up -d` to start the Docker containers
- Run `./vendor/bin/sail artisan key:generate` to generate an application key
- Run `./vendor/bin/sail migrate:fresh --seed` to run the migrations and seed the database
- Run `./vendor/bin/sail test` to run the test suite
- Run `npm run dev` to start front end services

## Usage
- Login via http://localhost
  - username: usera@example.com
  - password: password
- Use the 👍👎 icons to vote for your favourite quotes
