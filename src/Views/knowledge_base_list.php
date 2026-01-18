<div class="row mb-4">
	<div class="col-12">
		<div class="d-flex justify-content-between align-items-center">
			<h2>
				<i class="bi bi-book"></i> Knowledge Base
			</h2>
			<?php if (in_array($_SESSION['user_role'], ['admin', 'agent'])): ?>
				<a href="index.php?action=kb_create" class="btn btn-primary">
					<i class="bi bi-plus-circle"></i> Create Article
				</a>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php if (isset($_SESSION['success'])): ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<i class="bi bi-check-circle"></i> <?= $_SESSION['success'] ?>
		<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
	</div>
	<?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<i class="bi bi-exclamation-triangle"></i> <?= $_SESSION['error'] ?>
		<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
	</div>
	<?php unset($_SESSION['error']); ?>
<?php endif; ?>

<!-- Statistics for Admins/Agents -->
<?php if (isset($stats) && $stats): ?>
	<div class="row mb-4">
		<div class="col-md-4">
			<div class="card bg-primary text-white">
				<div class="card-body">
					<h6 class="card-title"><i class="bi bi-file-text"></i> Published Articles</h6>
					<h3 class="mb-0"><?= $stats['total_articles'] ?></h3>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card bg-warning text-white">
				<div class="card-body">
					<h6 class="card-title"><i class="bi bi-file-earmark"></i> Draft Articles</h6>
					<h3 class="mb-0"><?= $stats['total_drafts'] ?></h3>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card bg-success text-white">
				<div class="card-body">
					<h6 class="card-title"><i class="bi bi-eye"></i> Total Views</h6>
					<h3 class="mb-0"><?= number_format($stats['total_views']) ?></h3>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

<!-- Search Bar -->
<div class="row mb-4">
	<div class="col-md-8 mx-auto">
		<form method="GET" action="index.php">
			<input type="hidden" name="action" value="knowledge_base">
			<div class="input-group input-group-lg">
				<input type="text" class="form-control" name="search" placeholder="Search articles..."
					value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
				<button class="btn btn-primary" type="submit">
					<i class="bi bi-search"></i> Search
				</button>
			</div>
		</form>
	</div>
</div>

<!-- Articles List -->
<div class="row">
	<?php if (empty($articles)): ?>
		<div class="col-12">
			<div class="alert alert-info text-center">
				<i class="bi bi-info-circle"></i> No articles found.
				<?php if (in_array($_SESSION['user_role'], ['admin', 'agent'])): ?>
					<a href="index.php?action=kb_create">Create the first article</a>
				<?php endif; ?>
			</div>
		</div>
	<?php else: ?>
		<?php foreach ($articles as $article): ?>
			<div class="col-md-6 col-lg-4 mb-4">
				<div class="card h-100 shadow-sm hover-shadow">
					<div class="card-body">
						<div class="d-flex justify-content-between align-items-start mb-2">
							<span class="badge bg-<?= $article['status'] === 'published' ? 'success' : 'warning' ?>">
								<?= ucfirst($article['status']) ?>
							</span>
							<span class="badge bg-secondary"><?= ucfirst($article['category'] ?? 'general') ?></span>
						</div>
						<h5 class="card-title">
							<a href="index.php?action=kb_view&id=<?= $article['_id'] ?>" class="text-decoration-none">
								<?= htmlspecialchars($article['title']) ?>
							</a>
						</h5>
						<p class="card-text text-muted small">
							<?= substr(strip_tags($article['content']), 0, 150) ?>...
						</p>
						<div class="d-flex justify-content-between align-items-center mt-3">
							<small class="text-muted">
								<i class="bi bi-person"></i> <?= htmlspecialchars($article['author']['name'] ?? 'Unknown') ?>
							</small>
							<small class="text-muted">
								<i class="bi bi-eye"></i> <?= $article['views'] ?? 0 ?> views
							</small>
						</div>
						<?php if (!empty($article['tags'])): ?>
							<div class="mt-2">
								<?php foreach ($article['tags'] as $tag): ?>
									<span class="badge bg-light text-dark">#<?= htmlspecialchars($tag) ?></span>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>
					<div class="card-footer bg-transparent">
						<div class="d-flex justify-content-between align-items-center">
							<small class="text-muted">
								<?php if (isset($article['created_at'])): ?>
									<?= date('M d, Y', $article['created_at']->toDateTime()->getTimestamp()) ?>
								<?php endif; ?>
							</small>
							<div>
								<a href="index.php?action=kb_view&id=<?= $article['_id'] ?>" class="btn btn-sm btn-outline-primary">
									<i class="bi bi-eye"></i> View
								</a>
								<?php
								// Check if user can edit this article
								$canEdit = false;
								if ($_SESSION['user_role'] === 'admin') {
									$canEdit = true;
								} elseif ($_SESSION['user_role'] === 'agent' && isset($article['created_by'])) {
									$canEdit = $article['created_by']->__toString() === $_SESSION['user_id'];
								}
								?>
								<?php if ($canEdit): ?>
									<a href="index.php?action=kb_edit&id=<?= $article['_id'] ?>" class="btn btn-sm btn-outline-warning">
										<i class="bi bi-pencil"></i>
									</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
</div>

<style>
	.hover-shadow {
		transition: box-shadow 0.3s ease-in-out;
	}

	.hover-shadow:hover {
		box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
	}
</style>