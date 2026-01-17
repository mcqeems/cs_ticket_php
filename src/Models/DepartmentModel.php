<?php
namespace App\Models;

use MongoDB\Client;
use App\Configs\Database;
use MongoDB\BSON\ObjectId;

class DepartmentModel
{
	private $collection;
	private $db;

	public function __construct()
	{
		$this->db = Database::getDatabase();
		$this->collection = $this->db->departments;
	}

	/**
	 * Get all departments
	 */
	public function getAll($activeOnly = true)
	{
		$query = $activeOnly ? ['status' => 'active'] : [];
		return $this->collection->find($query)->toArray();
	}

	/**
	 * Get department by ID
	 */
	public function getById($id)
	{
		try {
			return $this->collection->findOne(['_id' => new ObjectId($id)]);
		} catch (\Exception $e) {
			return null;
		}
	}

	/**
	 * Get agents by department
	 */
	public function getAgentsByDepartment($departmentId)
	{
		try {
			$agents = $this->db->users->find([
				'role' => 'support_agent',
				'department_id' => new ObjectId($departmentId),
				'status' => 'active'
			])->toArray();

			return $agents;
		} catch (\Exception $e) {
			return [];
		}
	}

	/**
	 * Get all agents (for admin)
	 */
	public function getAllAgents()
	{
		return $this->db->users->find([
			'role' => ['$in' => ['support_agent', 'admin']],
			'status' => 'active'
		])->toArray();
	}
}
?>