<div class="card">
	<div class="card-header bg-primary text-white">
		<h3 class="mb-0"><i class="bi bi-people-fill"></i> Users Management</h3>
	</div>
	<div class="card-body">
		<?php if (empty($users)): ?>
			<div class="alert alert-info">
				<i class="bi bi-info-circle"></i> No users found in the database.
			</div>
		<?php else: ?>
			<div class="d-flex justify-content-between align-items-center mb-3">
				<p class="text-muted mb-0">
					<strong>Total users:</strong> <?= count($users) ?>
				</p>
				<button class="btn btn-success btn-sm">
					<i class="bi bi-plus-circle"></i> Add New User
				</button>
			</div>

			<div class="table-responsive">
				<table class="table table-hover table-striped">
					<thead class="table-dark">
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $counter = 1; ?>
						<?php foreach ($users as $user): ?>
							<tr>
								<td><?= $counter++ ?></td>
								<td><?= htmlspecialchars($user['name'] ?? 'N/A') ?></td>
								<td><?= htmlspecialchars($user['email'] ?? 'N/A') ?></td>
								<td>
									<a href="index.php?action=user_detail&id=<?= $user['_id'] ?? $counter - 1 ?>"
										class="btn btn-sm btn-primary">
										<i class="bi bi-eye"></i> View
									</a>
									<button class="btn btn-sm btn-warning">
										<i class="bi bi-pencil"></i> Edit
									</button>
									<button class="btn btn-sm btn-danger">
										<i class="bi bi-trash"></i> Delete
									</button>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		<?php endif; ?>
	</div>
</div>