<?php
namespace App\Controllers;

use App\Models\UserModel;

class UserController
{
	public function index()
	{
		$model = new UserModel();
		$users = $model->getData();

		// Load the view
		$viewPath = __DIR__ . '/../Views/users_list.php';
		include $viewPath;
	}

	public function detail($userId)
	{
		$model = new UserModel();
		$users = $model->getData();

		// Find user by index (simple approach for now)
		$user = null;
		if ($userId !== null && isset($users[$userId])) {
			$user = $users[$userId];
		} else if ($userId !== null && is_numeric($userId) && $userId > 0 && $userId <= count($users)) {
			$user = $users[$userId - 1];
		}

		// Load the user detail view
		$viewPath = __DIR__ . '/../Views/user_detail.php';
		include $viewPath;
	}
}
?>