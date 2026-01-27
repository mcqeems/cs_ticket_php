<?php
require 'vendor/autoload.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use App\Configs\Database;
use MongoDB\BSON\UTCDateTime; // [FIX] Imported the class here

echo "=== CS Ticket System - Database Seeder ===\n\n";

try {
	$db = Database::getDatabase();

	// Clear existing collections (optional - comment out if you want to keep existing data)
	echo "Clearing existing data...\n";
	$db->users->deleteMany([]);
	$db->departments->deleteMany([]);
	$db->help_topics->deleteMany([]);
	$db->tickets->deleteMany([]);
	$db->ticket_replies->deleteMany([]);
	$db->ticket_history->deleteMany([]);
	$db->knowledge_base->deleteMany([]);

	// 1. Create Roles and Users
	echo "\n1. Creating users...\n";

	$users = [
		[
			'name' => 'Super Admin',
			'email' => 'admin@csticket.com',
			'password' => password_hash('password123', PASSWORD_DEFAULT),
			'role' => 'admin',
			'phone' => '081234567890',
			'status' => 'active',
			'created_at' => new UTCDateTime(), // [FIX] Simplified usage
			'department_id' => null
		],
		[
			'name' => 'Budi (Tech Agent)',
			'email' => 'budi@csticket.com',
			'password' => password_hash('password123', PASSWORD_DEFAULT),
			'role' => 'support_agent',
			'phone' => '081234567891',
			'status' => 'active',
			'created_at' => new UTCDateTime()
		],
		[
			'name' => 'Siti (Billing Agent)',
			'email' => 'siti@csticket.com',
			'password' => password_hash('password123', PASSWORD_DEFAULT),
			'role' => 'support_agent',
			'phone' => '081234567892',
			'status' => 'active',
			'created_at' => new UTCDateTime()
		],
		[
			'name' => 'Rian (CS Agent)',
			'email' => 'rian@csticket.com',
			'password' => password_hash('password123', PASSWORD_DEFAULT),
			'role' => 'support_agent',
			'phone' => '081234567893',
			'status' => 'active',
			'created_at' => new UTCDateTime()
		],
		[
			'name' => 'Ahmad Customer',
			'email' => 'ahmad@gmail.com',
			'password' => password_hash('password123', PASSWORD_DEFAULT),
			'role' => 'client',
			'phone' => '089876543210',
			'status' => 'active',
			'created_at' => new UTCDateTime()
		],
		[
			'name' => 'Dewi Customer',
			'email' => 'dewi@gmail.com',
			'password' => password_hash('password123', PASSWORD_DEFAULT),
			'role' => 'client',
			'phone' => '089876543211',
			'status' => 'active',
			'created_at' => new UTCDateTime()
		],
		[
			'name' => 'Joko Customer',
			'email' => 'joko@gmail.com',
			'password' => password_hash('password123', PASSWORD_DEFAULT),
			'role' => 'client',
			'phone' => '089876543212',
			'status' => 'active',
			'created_at' => new UTCDateTime()
		]
	];

	$userResult = $db->users->insertMany($users);
	echo "✓ Created " . $userResult->getInsertedCount() . " users\n";

	// Get user IDs for later use
	$userIds = $userResult->getInsertedIds();

	// 2. Create Departments
	echo "\n2. Creating departments...\n";

	$departments = [
		[
			'name' => 'Technical Support',
			'description' => 'Handle technical issues and troubleshooting',
			'status' => 'active',
			'created_at' => new UTCDateTime()
		],
		[
			'name' => 'Billing & Finance',
			'description' => 'Payment and billing related inquiries',
			'status' => 'active',
			'created_at' => new UTCDateTime()
		],
		[
			'name' => 'Customer Service',
			'description' => 'General customer support and inquiries',
			'status' => 'active',
			'created_at' => new UTCDateTime()
		],
		[
			'name' => 'Sales & Inquiry',
			'description' => 'Sales questions and product inquiries',
			'status' => 'active',
			'created_at' => new UTCDateTime()
		]
	];

	$deptResult = $db->departments->insertMany($departments);
	echo "✓ Created " . $deptResult->getInsertedCount() . " departments\n";

	// Get department IDs
	$deptIds = $deptResult->getInsertedIds();

	// Assign departments to support agents
	$db->users->updateOne(
		['email' => 'budi@csticket.com'],
		['$set' => ['department_id' => $deptIds[0]]] // Technical Support
	);
	$db->users->updateOne(
		['email' => 'siti@csticket.com'],
		['$set' => ['department_id' => $deptIds[1]]] // Billing
	);
	$db->users->updateOne(
		['email' => 'rian@csticket.com'],
		['$set' => ['department_id' => $deptIds[2]]] // Customer Service
	);
	echo "✓ Assigned departments to agents\n";

	// 3. Create Help Topics
	echo "\n3. Creating help topics...\n";

	$helpTopics = [
		[
			'topic_name' => 'Login Issues / Account Problems',
			'department_id' => $deptIds[0], // Technical Support
			'status' => 'active',
			'created_at' => new UTCDateTime()
		],
		[
			'topic_name' => 'Payment Failed',
			'department_id' => $deptIds[1], // Billing
			'status' => 'active',
			'created_at' => new UTCDateTime()
		],
		[
			'topic_name' => 'Bug Report',
			'department_id' => $deptIds[0], // Technical Support
			'status' => 'active',
			'created_at' => new UTCDateTime()
		],
		[
			'topic_name' => 'General Question',
			'department_id' => $deptIds[2], // Customer Service
			'status' => 'active',
			'created_at' => new UTCDateTime()
		],
		[
			'topic_name' => 'Feature Request',
			'department_id' => $deptIds[0], // Technical Support
			'status' => 'active',
			'created_at' => new UTCDateTime()
		],
		[
			'topic_name' => 'Product Inquiry',
			'department_id' => $deptIds[3], // Sales
			'status' => 'active',
			'created_at' => new UTCDateTime()
		]
	];

	$topicResult = $db->help_topics->insertMany($helpTopics);
	echo "✓ Created " . $topicResult->getInsertedCount() . " help topics\n";

	// 4. Create Knowledge Base Articles
	echo "\n4. Creating knowledge base articles...\n";

	$kbArticles = [
		[
			'title' => 'How to Reset Your Password',
			'content' => '<h2>Forgot Your Password?</h2><p>If you forgot your password, follow these steps:</p><ol><li>Go to the login page</li><li>Click "Forgot Password" link</li><li>Enter your registered email address</li><li>Check your email for reset instructions</li><li>Click the reset link and create a new password</li></ol>',
			'category' => 'faq',
			'status' => 'published',
			'is_public' => true,
			'views' => 0,
			'created_by' => $userIds[0], // Admin
			'created_at' => new UTCDateTime(),
			'tags' => ['password', 'login', 'account']
		],
		[
			'title' => 'Fixing Error 500 - Internal Server Error',
			'content' => '<h2>Error 500 Troubleshooting</h2><p>If you encounter a 500 error, try these steps:</p><ul><li>Refresh the page (Ctrl+F5 or Cmd+Shift+R)</li><li>Clear your browser cache and cookies</li><li>Try using a different browser</li><li>Wait a few minutes and try again</li><li>If the problem persists, contact support</li></ul>',
			'category' => 'support',
			'status' => 'published',
			'is_public' => true,
			'views' => 0,
			'created_by' => $userIds[1], // Tech Agent
			'created_at' => new UTCDateTime(),
			'tags' => ['error', 'troubleshooting', 'technical']
		],
		[
			'title' => 'Weekly Maintenance Schedule',
			'content' => '<h2>System Maintenance</h2><p>Our system undergoes routine maintenance to ensure optimal performance.</p><p><strong>Schedule:</strong></p><ul><li>Day: Every Sunday</li><li>Time: 02:00 AM - 04:00 AM (UTC+7)</li><li>Duration: Approximately 2 hours</li><li>Impact: Limited functionality during maintenance window</li></ul><p>We appreciate your patience during these scheduled maintenance periods.</p>',
			'category' => 'maintenance',
			'status' => 'published',
			'is_public' => true,
			'views' => 0,
			'created_by' => $userIds[0], // Admin
			'created_at' => new UTCDateTime(),
			'tags' => ['maintenance', 'schedule', 'downtime']
		],
		[
			'title' => 'Available Payment Methods',
			'content' => '<h2>Payment Options</h2><p>We accept the following payment methods:</p><ul><li><strong>Bank Transfer:</strong> BCA, Mandiri, BNI</li><li><strong>Credit/Debit Cards:</strong> Visa, Mastercard, JCB</li><li><strong>E-Wallets:</strong> GoPay, OVO, Dana, ShopeePay</li><li><strong>Virtual Account:</strong> All major banks</li></ul><p>All payments are processed securely through our payment gateway partners.</p>',
			'category' => 'faq',
			'status' => 'published',
			'is_public' => true,
			'views' => 0,
			'created_by' => $userIds[2], // Billing Agent
			'created_at' => new UTCDateTime(),
			'tags' => ['payment', 'billing', 'methods']
		]
	];

	$kbResult = $db->knowledge_base->insertMany($kbArticles);
	echo "✓ Created " . $kbResult->getInsertedCount() . " knowledge base articles\n";

	// Create indexes for better performance
	echo "\n5. Creating database indexes...\n";

	$db->users->createIndex(['email' => 1], ['unique' => true]);
	$db->users->createIndex(['role' => 1]);
	echo "✓ Users indexes created\n";

	$db->tickets->createIndex(['ticket_number' => 1], ['unique' => true]);
	$db->tickets->createIndex(['user_id' => 1]);
	$db->tickets->createIndex(['status' => 1]);
	$db->tickets->createIndex(['department_id' => 1]);
	$db->tickets->createIndex(['assigned_to' => 1]);
	echo "✓ Tickets indexes created\n";

	$db->knowledge_base->createIndex(['title' => 'text', 'content' => 'text']);
	$db->knowledge_base->createIndex(['category' => 1]);
	$db->knowledge_base->createIndex(['status' => 1]);
	echo "✓ Knowledge base indexes created\n";

	echo "\n=== Database seeding completed successfully! ===\n\n";
	echo "You can now login with:\n";
	echo "- Admin: admin@csticket.com / password123\n";
	echo "- Agent: budi@csticket.com / password123\n";
	echo "- Client: ahmad@gmail.com / password123\n\n";

} catch (Exception $e) {
	echo "Error: " . $e->getMessage() . "\n";
	exit(1);
}
?>