# CS Ticket System - Customer Support Ticketing System

A fully functional customer service ticket management system built with PHP and MongoDB.

## Features

### Authentication & Authorization
- ✅ User registration and login
- ✅ Role-based access control (Admin, Support Agent, Client)
- ✅ Session management
- ✅ Password hashing with bcrypt

### Ticket Management
- ✅ Create, view, and manage support tickets
- ✅ Ticket status workflow (Open → In Progress → Closed)
- ✅ Priority levels (Low, Normal, High, Urgent)
- ✅ Department-based routing
- ✅ Help topic categorization
- ✅ Ticket assignment to support agents
- ✅ Conversation threads with replies
- ✅ Internal notes (staff-only comments)
- ✅ Activity history and audit trail

### Role-Based Dashboards
- ✅ **Admin Dashboard**: System statistics, all tickets, user management
- ✅ **Support Agent Dashboard**: Assigned tickets, department queue
- ✅ **Client Dashboard**: Personal tickets, create ticket, help resources

### Additional Features
- ✅ Department management
- ✅ Help topics linked to departments
- ✅ Ticket filtering and search
- ✅ Real-time statistics
- ✅ Responsive Bootstrap 5 UI
- ✅ MongoDB NoSQL database

## Tech Stack

- **Backend**: PHP 7.4+
- **Database**: MongoDB 4.0+
- **Frontend**: Bootstrap 5, Bootstrap Icons
- **Libraries**: MongoDB PHP Driver

## Installation

### Prerequisites
- PHP 7.4 or higher
- MongoDB 4.0 or higher
- Composer
- Web server (Apache/Nginx)

### Setup Steps

1. **Clone the repository**
   ```bash
   cd /var/www/cs_ticket
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Configure MongoDB**
   - Ensure MongoDB is running on `localhost:27017`
   - Database name: `cs_ticket`
   - Update connection in `src/Configs/Database.php` if needed

4. **Seed the database**
   ```bash
   php seed_database.php
   ```

5. **Configure web server**
   - Point document root to `/var/www/cs_ticket`
   - Ensure `index.php` is accessible

6. **Access the application**
   - Open browser: `http://localhost/cs_ticket` or your configured URL

## Default Accounts

After seeding, you can login with:

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@csticket.com | password123 |
| Support Agent | budi@csticket.com | password123 |
| Client | ahmad@gmail.com | password123 |

## Database Structure (MongoDB Collections)

### users
- User accounts with roles (admin, support_agent, client)
- Includes authentication credentials and profile information

### departments
- Support departments (Technical Support, Billing, Customer Service, Sales)
- Each agent is assigned to a department

### help_topics
- Categorization of ticket types
- Linked to specific departments

### tickets
- Main ticket records with status, priority, assignments
- Contains: ticket_number, subject, message, status, priority

### ticket_replies
- Conversation messages on tickets
- Supports internal notes (staff-only)

### ticket_history
- Activity audit trail
- Logs all ticket actions (created, replied, status changed, assigned)

### knowledge_base
- Self-service support articles
- Categories: FAQ, Support, Maintenance

## Usage Guide

### For Clients
1. Register or login with client credentials
2. Create a new ticket from dashboard
3. Select department and help topic
4. Describe your issue in detail
5. Track ticket status and receive replies
6. Browse knowledge base for self-help

### For Support Agents
1. Login with agent credentials
2. View assigned tickets from dashboard
3. Reply to tickets and update status
4. Add internal notes for team collaboration
5. Close tickets when resolved

### For Administrators
1. Login with admin credentials
2. View system-wide statistics
3. Manage all tickets across departments
4. Access user management
5. Configure departments and help topics
6. Monitor agent performance

## API Endpoints

### Public Routes (No Authentication)
- `?action=login` - Login page
- `?action=register` - Registration page

### Authenticated Routes
- `?action=dashboard` - Role-based dashboard
- `?action=tickets` - Ticket list with filters
- `?action=ticket_create` - Create new ticket form
- `?action=ticket_detail&id=X` - View ticket details
- `?action=ticket_reply` - Add reply (POST)
- `?action=ticket_update_status` - Change status (POST)
- `?action=ticket_assign` - Assign to agent (POST)

### Admin Only Routes
- `?action=users` - User management
- `?action=departments` - Department management
- `?action=help_topics` - Help topic management

### AJAX API
- `?action=api_help_topics&department_id=X` - Get help topics by department (JSON)

## File Structure

```
/var/www/cs_ticket/
├── index.php                 # Main application entry point
├── composer.json             # Dependencies
├── seed_database.php         # Database seeder
├── src/
│   ├── Configs/
│   │   └── Database.php      # MongoDB connection
│   ├── Controllers/
│   │   ├── AuthController.php
│   │   ├── DashboardController.php
│   │   ├── TicketController.php
│   │   └── UserController.php
│   ├── Models/
│   │   ├── AuthModel.php
│   │   ├── TicketModel.php
│   │   ├── DepartmentModel.php
│   │   ├── HelpTopicModel.php
│   │   └── UserModel.php
│   └── Views/
│       ├── login.php
│       ├── register.php
│       ├── dashboard_admin.php
│       ├── dashboard_agent.php
│       ├── dashboard_client.php
│       ├── ticket_list.php
│       ├── ticket_create.php
│       ├── ticket_detail.php
│       ├── users_list.php (admin only)
│       └── user_detail.php
└── vendor/                   # Composer dependencies
```

## Security Features

- ✅ Password hashing with bcrypt
- ✅ Role-based access control
- ✅ Session-based authentication
- ✅ Input validation and sanitization
- ✅ XSS protection with htmlspecialchars()
- ✅ MongoDB ObjectId validation
- ✅ Permission checks on all routes

## Future Enhancements

- Email notifications for ticket updates
- File attachment support
- Advanced search and filtering
- Ticket escalation rules
- SLA (Service Level Agreement) tracking
- Reports and analytics
- Email-to-ticket functionality
- Multi-language support
- REST API for mobile apps

## License

This project is developed for educational purposes.

## Support

For issues or questions, create a support ticket in the system or contact the administrator.

---

**Last Updated**: January 18, 2026
