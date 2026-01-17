<?php
require 'vendor/autoload.php';

use App\Controllers\UserController;

// Initialize controller
$controller = new UserController();

// Determine the route (you can enhance this with a router later)
$action = $_GET['action'] ?? 'index';

// Start output buffering to capture view content
ob_start();

switch ($action) {
	case 'index':
	case 'users':
		$controller->index();
		break;
	case 'user_detail':
		$userId = $_GET['id'] ?? null;
		$controller->detail($userId);
		break;
	default:
		$controller->index();
		break;
}

// Capture the view content
$content = ob_get_clean();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CS Ticket - Customer Support System</title>
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Bootstrap Icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
	<style>
		body {
			background-color: #f8f9fa;
		}

		.navbar-brand {
			font-weight: bold;
		}

		.content-wrapper {
			min-height: calc(100vh - 200px);
		}
	</style>
</head>

<body>
	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php">
				<i class="bi bi-ticket-perforated"></i> CS Ticket System
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php?action=users">
							<i class="bi bi-people"></i> Users
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php?action=tickets">
							<i class="bi bi-ticket"></i> Tickets
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php?action=settings">
							<i class="bi bi-gear"></i> Settings
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Main Content -->
	<div class="container-fluid content-wrapper py-4">
		<div class="container">
			<?php echo $content; ?>
		</div>
	</div>

	<!-- Footer -->
	<footer class="bg-dark text-white text-center py-3 mt-auto">
		<p class="mb-0">&copy; 2026 CS Ticket System. All rights reserved.</p>
	</footer>

	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>