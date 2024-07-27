<?php require base_path("views/admin/layouts/header.php"); ?>

<div class="row">
    <div class="card">
        <div class="card-header">
            <p class="card-title">Hello <?= $_SESSION["user"]["name"] ?? "Guest"; ?> Welcome to the home page.</p>
        </div>
    </div>
</div>

<?php require base_path("views/admin/layouts/footer.php"); ?>