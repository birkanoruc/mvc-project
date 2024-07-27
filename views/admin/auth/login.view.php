<?php require base_path("views/admin/layouts/guest/header.php"); ?>

<form class="space-y-6" action="/admin/login" method="POST">

<div class="col-xl-12 mb-2">
    <label for="email" class="form-label text-default">E-Posta Adresi</label>
    <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="E-Posta adresinizi girin..." required>
    <?php if (isset($errors["email"])) : ?>
        <p class="text-danger text-xs mt-2"><?= $errors["email"] ?></p>
    <?php endif; ?>
</div>

<div class="col-xl-12 mb-2">
    <label for="password" class="form-label text-default d-block">Şifre</label>
    <div class="input-group">
        <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Şifrenizi girin..." required>
        <button class="btn btn-light" type="button" onclick="createpassword('password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
    </div>
    <?php if (isset($errors["password"])) : ?>
        <p class="text-danger text-xs mt-2"><?= $errors["password"] ?></p>
    <?php endif; ?>
</div>

<div class="col-xl-12 d-grid mb-2">
    <button type="submit" class="btn btn-lg btn-primary">Oturum Aç</button>
</div>

<?php if (isset($errors["login"])) : ?>
    <p class="text-danger text-xs mt-2"><?= $errors["login"] ?></p>
<?php endif; ?>

</form>

<?php require base_path("views/admin/layouts/guest/footer.php"); ?>