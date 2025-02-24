# Fullstack Challenge

## Requirements
Using Laravel and Vue.js, create an application which shows the weather for a set of users. Instructions are purposely left somewhat open-ended to allow the developer to make some of their own decisions on implementation and design. 

1. Clone this repository (not fork).
1. Chose your own weather API, such as:
   - https://openweathermap.org/api
   - https://www.weather.gov/documentation/services-web-api
1. Show a list of users and their current weather.
   - Add twenty randomized users the seeder process, each having their own unique location (longitude and latitude).
   - The weather update should be no older than 1 hour.
1. Clicking a user should open a modal or screen, which shows that user's detailed weather report.
   - The weather update should be no older than 1 hour.
1. Internal API request(s) to retrieve weather data should take no longer than 500ms.
   - Consider that external APIs could and will take longer than this from time to time and should be accounted for.
1. The availability of external APIs is not guaranteed and should not cause the page to crash.
1. Once completed, send a link of the clone repository to interviewer and let them know how long the exercise took. 

## Things to consider
- Redis is available (Docker service) if you wish to use it.
- Queues, workers, websockets could be useful.
- Feel free to use a frontend UI library such as PrimeVue, Vuetify, Bootstrap, Tailwind, etc. 
- Include anything else you desire to show off your coding chops!

## What we are looking for
- Attention to detail
- Testability
- Best practices
- Design patterns
- This is not a designer test so the frontend does not have to look "good," but of course bonus points if you can make it look appealing.

## To run the local dev environment:

### API
- Navigate to `/api` folder
- Ensure version docker installed is active on host
- Copy .env.example: `cp .env.example .env`
- Start docker containers `docker compose up` (add `-d` to run detached)
- Connect to container to run commands: `docker exec -it fullstack-challenge-app-1 bash`
  - Make sure you are in the `/var/www/html` path
  - Install php dependencies: `composer install`
  - Setup app key: `php artisan key:generate`
  - Migrate database: `php artisan migrate` 
  - Seed database: `php artisan db:seed`
  - Run tests: `php artisan test`
- Visit api: `http://localhost`

### Frontend
- Navigate to `/frontend` folder
- Ensure nodejs v18 is active on host
- Install javascript dependencies: `npm install`
- Run frontend: `npm run dev`
- Visit frontend: `http://localhost:5173`
