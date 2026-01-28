# CS Ticket System

A modern customer support ticketing system built with PHP and MongoDB. Simple, fast, and easy to use.

## What It Does

This system helps you manage customer support tickets efficiently:
- **Clients** create and track their support tickets
- **Support Agents** respond to tickets and help customers
- **Admins** manage everything - users, departments, and system settings

## Key Features

✅ **Ticket Management**
- Create tickets with priority levels (Low, Normal, High, Urgent)
- Track ticket status: Open → In Progress → Closed
- Reply with messages and attach internal notes for staff
- View complete conversation history

✅ **Smart Organization**
- Department-based ticket routing (Technical, Billing, Sales, etc.)
- Help topics for categorizing issues
- Assign tickets to specific support agents
- Search and filter tickets easily

✅ **Knowledge Base**
- Self-service help articles
- Categories and tags for easy navigation
- Agents can create and manage articles
- Track article views

✅ **User Roles**
- **Client**: Create tickets, view own tickets, browse knowledge base
- **Support Agent**: Handle assigned tickets, create articles, add internal notes
- **Admin**: Full system control - manage users, departments, and all tickets

✅ **Dashboard for Everyone**
- Real-time ticket statistics
- Quick access to common actions
- Role-specific views

## Built With

- **PHP 7.4+** - Server-side logic
- **MongoDB** - Fast NoSQL database
- **Bootstrap 5** - Modern, responsive design

## Quick Start

### What You Need
- PHP 7.4 or higher
- MongoDB 4.0 or higher
- Composer
- A web server (Apache or Nginx)

### Installation

1. **Navigate to the project folder**
   ```bash
   cd /var/www/cs_ticket
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Set up the database**
   - Make sure MongoDB is running on `localhost:27017`
   - Run the seeder to create sample data:
   ```bash
   php seed_database.php
   ```

4. **Start using it**
   - Open your browser and go to: `http://localhost/cs_ticket`

### Test Accounts

Use these credentials to login and explore:

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@csticket.com | password123 |
| Support Agent | budi@csticket.com | password123 |
| Client | ahmad@gmail.com | password123 |

## How to Use

### For Customers (Clients)
1. **Register** or **Login** with your account
2. Click **Create New Ticket** from your dashboard
3. Choose a department and describe your issue
4. Track your ticket status and receive responses
5. Browse the **Knowledge Base** for quick answers

### For Support Agents
1. **Login** to see your assigned tickets
2. Click on a ticket to view details
3. Reply to customers or add internal notes for your team
4. Update ticket status as you work on it
5. Create helpful articles in the Knowledge Base

### For Administrators
1. **Login** to access the admin dashboard
2. View system-wide statistics
3. Manage users - create, edit, or remove accounts
4. Set up departments and help topics
5. Oversee all tickets across the system
6. Monitor support agent performance

## Understanding Ticket Flow

```
Client Creates Ticket
       ↓
Ticket is Open (Yellow)
       ↓
Agent Starts Working → In Progress (Blue)
       ↓
Issue Resolved → Closed (Green)
```

**Ticket Priority Levels:**
- 🟢 Low - Can wait
- ⚪ Normal - Standard support
- 🟡 High - Needs attention soon
- 🔴 Urgent - Drop everything!

**What's in a Ticket:**
- Ticket number (e.g., TKT-2026-00001)
- Subject and description
- Department and help topic
- Assigned agent
- Conversation thread
- Activity history

## Database Overview

The system uses MongoDB with these collections:

| Collection | What It Stores |
|------------|---------------|
| **users** | User accounts with roles (admin, support_agent, client) |
| **departments** | Support departments (Technical, Billing, Sales, etc.) |
| **help_topics** | Types of issues customers can report |
| **tickets** | All support tickets with their details |
| **ticket_replies** | Conversation messages on tickets |
| **ticket_history** | Activity log for tracking changes |
| **knowledge_base** | Self-help articles and FAQs |

## Main Routes

### Everyone Can Access
- `/` or `?action=dashboard` - Your dashboard (based on role)
- `?action=login` - Login page
- `?action=register` - Create new account
- `?action=logout` - Sign out

### Ticket Operations
- `?action=tickets` - List tickets (filtered by your role)
- `?action=ticket_create` - Create a new ticket
- `?action=ticket_detail&id=X` - View ticket details
- `?action=ticket_reply` - Add a reply (POST)
- `?action=ticket_update_status` - Change ticket status (POST)
- `?action=ticket_assign` - Assign to agent (POST)

### Knowledge Base
- `?action=knowledge_base` - Browse articles
- `?action=kb_view&id=X` - Read an article
- `?action=kb_create` - Create article (Agent/Admin only)
- `?action=kb_edit&id=X` - Edit article
- `?action=kb_delete` - Delete article (POST)

### User Management (Admin Only)
- `?action=users` - Manage users
- `?action=user_create` - Add new user
- `?action=user_edit&id=X` - Edit user
- `?action=departments` - Manage departments
- `?action=help_topics` - Manage help topics

### Your Profile
- `?action=profile` - View/edit your profile
- `?action=profile_update` - Save profile changes (POST)


## Security Features

✅ **Password Security** - Bcrypt hashing for all passwords  
✅ **Session Management** - Secure login sessions  
✅ **Role-Based Access** - Users only see what they should  
✅ **Input Validation** - Protects against bad data  
✅ **XSS Protection** - All output is sanitized  
✅ **Access Control** - Every page checks permissions

## Configuration

Edit `src/Configs/Database.php` if your MongoDB is not on localhost:

```php
$client = new MongoDB\Client("mongodb://localhost:27017");
$database = $client->cs_ticket;  // Database name
```

