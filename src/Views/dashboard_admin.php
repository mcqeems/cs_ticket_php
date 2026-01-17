<div class="row mb-4">
	<div class="col">
		<h2><i class="bi bi-speedometer2"></i> Admin Dashboard</h2>
		<p class="text-muted">Welcome back, <?= htmlspecialchars($_SESSION['user_name']) ?>!</p>
	</div>
</div>

<!-- Statistics Cards -->
<div class="row mb-4">
	<div class="col-md-3">
		<div class="card text-white bg-primary mb-3">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-center">
					<div>
						<h6 class="card-title text-uppercase mb-0">Total Tickets</h6>
						<h2 class="mb-0">0</h2>
					</div>
					<div>
						<i class="bi bi-ticket-perforated" style="font-size: 3rem; opacity: 0.5;"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card text-white bg-warning mb-3">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-center">
					<div>
						<h6 class="card-title text-uppercase mb-0">Open Tickets</h6>
						<h2 class="mb-0">0</h2>
					</div>
					<div>
						<i class="bi bi-exclamation-circle" style="font-size: 3rem; opacity: 0.5;"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
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
	<div class="col-md-3">
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
					<a href="index.php?action=ticket_create" class="btn btn-primary">
						<i class="bi bi-plus-circle"></i> Create Ticket
					</a>
					<a href="index.php?action=users" class="btn btn-info">
						<i class="bi bi-people"></i> Manage Users
					</a>
					<a href="index.php?action=departments" class="btn btn-secondary">
						<i class="bi bi-building"></i> Departments
					</a>
					<a href="index.php?action=help_topics" class="btn btn-secondary">
						<i class="bi bi-tags"></i> Help Topics
					</a>
					<a href="index.php?action=knowledge_base" class="btn btn-success">
						<i class="bi bi-book"></i> Knowledge Base
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Recent Activity -->
<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header bg-primary text-white">
				<h5 class="mb-0"><i class="bi bi-clock-history"></i> Recent Tickets</h5>
			</div>
			<div class="card-body">
				<div class="alert alert-info">
					<i class="bi bi-info-circle"></i> No tickets yet. System is ready to receive tickets.
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-header bg-secondary text-white">
				<h5 class="mb-0"><i class="bi bi-people"></i> Active Agents</h5>
			</div>
			<div class="card-body">
				<div class="alert alert-info mb-0">
					<i class="bi bi-info-circle"></i> Loading agent data...
				</div>
			</div>
		</div>
	</div>
</div>