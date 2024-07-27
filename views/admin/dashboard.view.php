<?php require base_path("views/admin/layouts/header.php"); ?>

<div class="row">
    <div class="card">
        <div class="card-header">
            <p class="card-title">Hello <?= $_SESSION["user"]["name"] ?? "Guest"; ?> Welcome to the home page.</p>

            <?php 
            echo "<pre>";
            print_r($users);
            echo "</pre>";
            echo "-------";
            echo "<pre>";
            print_r($user_metas);
            echo "</pre>";
            echo "-------";
            echo "<pre>";
            print_r($userType);
            echo "</pre>";
            ?>

        </div>
    </div>
</div>

<?php require base_path("views/admin/layouts/footer.php"); ?>