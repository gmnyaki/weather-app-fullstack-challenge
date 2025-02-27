# Weather App Fullstack Challenge

This project is a submission for the Fullstack Challenge, showcasing a user list with real-time weather data. Built with Laravel for the backend and Vue.js for the frontend, it integrates the OpenWeatherMap API to fetch weather details based on user locations. The application uses Redis for caching weather data to ensure it’s no older than 1 hour, improving performance and reducing API calls. The frontend is styled with Tailwind CSS for a modern, responsive design, and the project includes comprehensive setup instructions for Docker, project dependencies, and running tests. Error handling ensures graceful degradation during API failures, and unit tests validate both backend and frontend functionality.

---

## Features

- **User List**: Displays a list of users with their current weather.
- **Weather Modal**: Clicking a user opens a modal with detailed weather information.
- **Redis Caching**: Weather data is cached for up to 1 hour to improve performance.
- **Error Handling**: Gracefully handles external API failures.
- **Tailwind CSS**: Modern and responsive frontend design.
- **Unit Tests**: Includes tests for both backend and frontend.

---

## Screenshots

![Image](https://github.com/user-attachments/assets/2249fac9-3b20-4de6-98dd-a80bec57fc44)
![Image](https://github.com/user-attachments/assets/5fbc70c7-2d34-4dc1-aa37-b6c62bedf08b)
![Image](https://github.com/user-attachments/assets/0acfcb22-67e9-484d-b382-f5556dc71942)
![Image](https://github.com/user-attachments/assets/71815863-7dc6-4e7d-819f-de677f83fb6e)


---

## Technologies Used

- **Backend**: Laravel, Redis
- **Frontend**: Vue.js, Tailwind CSS
- **APIs**: OpenWeatherMap API

---

## Setup Instructions

### Prerequisites

- Docker
- PHP 8.x
- Node.js 18.x
- Composer
- Redis

---

## Backend Setup

```sh
cd api
cp .env.example .env
docker compose up -d
docker exec -it fullstack-challenge-app-1 bash
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
```

The backend API will be available at:

Open your browser and visit : [http://localhost](http://localhost)

```sh
php artisan test
```

## Frontend Setup

Navigate to the `/frontend` folder:

```sh
cd frontend
npm install
npm run dev
```

Open your browser and visit:

[http://localhost:5173](http://localhost:5173)

   
