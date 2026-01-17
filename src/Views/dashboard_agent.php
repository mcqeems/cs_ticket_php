<div class="row mb-4">
	<div class="col">
		<h2><i class="bi bi-headset"></i> Support Agent Dashboard</h2>
		<p class="text-muted">Welcome back, <?= htmlspecialchars($_SESSION['user_name']) ?>!</p>
	</div>
</div>

<!-- Statistics Cards -->
<div class="row mb-4">
	<div class="col-md-4">
		<div class="card text-white bg-warning mb-3">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-center">
					<div>
						<h6 class="card-title text-uppercase mb-0">Assigned to Me</h6>
						<h2 class="mb-0">0</h2>
					</div>
					<div>
						<i class="bi bi-person-check" style="font-size: 3rem; opacity: 0.5;"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card text-white bg-info mb-3">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-center">
					<div>
						<h6 class="card-title text-uppercase mb-0">In Progress</h6>
						<h2 class="mb-0">0</h2>
					</div>
					<div>
						<i class="bi bi-arrow-repeat" style="font-size: 3rem; opacity: 0.5;"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card text-white bg-success mb-3">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-center">
					<div>
						<h6 class="card-title text-uppercase mb-0">Closed Today</h6>
						<h2 class="mb-0">0</h2>
					</div>
					<div>
						<i class="bi bi-check-circle" style="font-size: 3rem; opacity: 0.5;"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Quick Actions -->
<div class="row mb-4">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header bg-dark text-white">
				<h5 class="mb-0"><i class="bi bi-lightning"></i> Quick Actions</h5>
			</div>
			<div class="card-body">
				<div class="d-flex gap-2 flex-wrap">
					<a href="index.php?action=tickets&filter=assigned" class="btn btn-primary">
						<i class="bi bi-list-check"></i> My Tickets
					</a>
					<a href="index.php?action=tickets&filter=unassigned" class="btn btn-warning">
						<i class="bi bi-inbox"></i> Unassigned Tickets
					</a>
					<a href="index.php?action=knowledge_base" class="btn btn-success">
						<i class="bi bi-book"></i> Knowledge Base
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- My Tickets -->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header bg-primary text-white">
				<h5 class="mb-0"><i class="bi bi-ticket"></i> My Assigned Tickets</h5>
			</div>
			<div class="card-body">
				<div class="alert alert-info">
					<i class="bi bi-info-circle"></i> No tickets assigned to you yet.
				</div>
			</div>
		</div>
	</div>
</div>