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

### User List
![User List](/screenshots/user-list.png)

### Weather Modal
![Weather Modal](/screenshots/weather-modal.png)

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

### Backend Setup

1. Navigate to the `/api` folder:
   