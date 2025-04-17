# Phonebook App

A simple Laravel-based phonebook application that allows users to manage their contacts and share them with other registered users. The app runs inside Docker for easy setup and deployment.

## 🐳 Docker Setup

### Prerequisites
- [Docker](https://www.docker.com/) installed

### Getting Started

1. **Clone the repo:**
   ```bash
   git clone https://github.com/LukasC0D/phonebook.git
   cd phonebook/backend

2. **Copy .env file:**
   ```bash
   cp .env.example .env
   cd ../docker
   cp .env.example .env

3. **Installation:**
   ```bash
    sudo chmod +x ./init && ./init
    docker-compose up -d --build

4. **Generate app key:**
   ```bash
   docker-compose exec backend php artisan key:generate

5. **Run migrations and seeder:**
   ```bash
   docker-compose exec backend php artisan migrate --seed

   Visit the app at: http://localhost:81

