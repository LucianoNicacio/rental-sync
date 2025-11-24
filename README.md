# RentalSync

Property management system with calendar sync, automated messaging, and booking management. Laravel 12 + Vue 3.

🚧 **In Development** - Building API-first architecture for portfolio

## Tech Stack

**Backend:** Laravel 12, MySQL, Redis, Sanctum, Pest  
**Frontend:** Vue 3, Pinia, FullCalendar, Tailwind (coming Week 3)

## Features (Planned)

- Multi-tenant property & unit management
- Booking system with conflict detection
- Google Calendar & iCal sync
- Automated guest messaging
- Queue-based background jobs
- RESTful API with 30+ endpoints
- Vue.js dashboard

## Progress

**Week 1:** ✅ Database schema (teams, properties, units)  
**Week 2:** Calendar sync, message automation, testing  
**Week 3:** Vue frontend, deployment

## Installation
```bash
git clone https://github.com/yourusername/rental-sync.git
cd rental-sync
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
```

## Why This Project?

Demonstrates Laravel expertise:
- API design & external integrations
- Complex business logic (calendar conflicts)
- Queue processing & event-driven architecture
- Production-ready code with tests

---

**Built by Luciano** • [LinkedIn](https://linkedin.com/in/Luciano-Nicacio)
