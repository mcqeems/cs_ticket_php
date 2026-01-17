<?php
namespace App\Controllers;

class DashboardController
{
	public function index()
	{
		$role = $_SESSION['user_role'] ?? 'client';

		// Load different dashboard based on role
		switch ($role) {
			case 'admin':
				$this->adminDashboard();
				break;
			case 'support_agent':
				$this->agentDashboard();
				break;
			case 'client':
			default:
				$this->clientDashboard();
				break;
		}
	}

	private function adminDashboard()
	{
		$viewPath = __DIR__ . '/../Views/dashboard_admin.php';
		include $viewPath;
	}

	private function agentDashboard()
	{
		$viewPath = __DIR__ . '/../Views/dashboard_agent.php';
		include $viewPath;
	}

	private function clientDashboard()
	{
		$viewPath = __DIR__ . '/../Views/dashboard_client.php';
		include $viewPath;
	}
}
?>