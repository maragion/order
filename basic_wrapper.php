
<!DOCTYPE html>
<html lang="<?= \1\Language::$code ?>" dir="<?= l('direction') ?>" class="h-100">
<head>
    <title><?= \1\Title::get() ?></title>
    <base href="<?= SITE_URL; ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <?php if(!settings()->main->se_indexing): ?>
        <meta name="robots" content="noindex">
    <?php endif ?>

    <link rel="alternate" href="<?= SITE_URL . \1\Router::$original_request ?>" hreflang="x-default" />
    <?php if(count(\1\Language::$active_languages) > 1): ?>
        <?php foreach(\1\Language::$active_languages as $language_name => $language_code): ?>
            <?php if(settings()->main->default_language != $language_name): ?>
                <link rel="alternate" href="<?= SITE_URL . $language_code . '/' . \1\Router::$original_request ?>" hreflang="<?= $language_code ?>" />
            <?php endif ?>
        <?php endforeach ?>
    <?php endif ?>

    <?php if(!empty(settings()->main->favicon)): ?>
        <link href="<?= UPLOADS_FULL_URL . 'main/' . settings()->main->favicon ?>" rel="shortcut icon" />
    <?php endif ?>

    <link href="<?= ASSETS_FULL_URL . 'css/' . \1\ThemeStyle::get_file() . '?v=' . PRODUCT_CODE ?>" id="css_theme_style" rel="stylesheet" media="screen,print">
    <?php foreach(['custom.css', 'link-custom.css', 'animate.min.css'] as $file): ?>
        <link href="<?= ASSETS_FULL_URL . 'css/' . $file . '?v=' . PRODUCT_CODE ?>" rel="stylesheet" media="screen">
    <?php endforeach ?>

    <?= \1\Event::get_content('head') ?>

    <?php if(!empty(settings()->custom->head_js)): ?>
        <?= settings()->custom->head_js ?>
    <?php endif ?>

    <?php if(!empty(settings()->custom->head_css)): ?>
        <style><?= settings()->custom->head_css ?></style>
    <?php endif ?>
</head>

<body class="<?= l('direction') == 'rtl' ? 'rtl' : null ?>  <?= in_array(\1\Router::$controller_key, ['login', 'register']) ? \1\Router::$controller_key . '-background' : null ?> <?= \1\ThemeStyle::get() == 'dark' ? 'c_darkmode' : null ?>" data-theme-style="<?= \1\ThemeStyle::get() ?>">

  <?php require THEME_PATH . 'views/partials/admin_impersonate_user.php' ?>
<?php require THEME_PATH . 'views/partials/announcements.php' ?>
<?php require THEME_PATH . 'views/partials/cookie_consent.php' ?>

<main class="1-animate 1-animate-fill-none 1-animate-fade-in py-4">
    <div class="container">
        <div class="d-flex flex-column align-items-center">
            <div class="col-xs-12 col-sm-10 col-md-8 col-lg-5">

                <div class="mb-4 text-center">
                    <a href="<?= url() ?>" class="text-decoration-none text-dark">
                        <?php if(settings()->main->{'logo_' . \1\ThemeStyle::get()} != ''): ?>
                            <img src="<?= \1\Uploads::get_full_url('logo_' . \1\ThemeStyle::get()) . settings()->main->{'logo_' . \1\ThemeStyle::get()} ?>" class="img-fluid navbar-logo" alt="<?= l('global.accessibility.logo_alt') ?>" />
                        <?php else: ?>
                            <span class="h3"><?= settings()->main->title ?></span>
                        <?php endif ?>
                    </a>
                </div>

                <div class="card" style="border-radius: 0.5rem;">
                    <div class="card-body " style="padding: 2rem;">
                        <?= $this->views['content'] ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

<?= \1\Event::get_content('modals') ?>

<?php require THEME_PATH . 'views/partials/js_global_variables.php' ?>

<?php foreach(['libraries/jquery.slim.min.js', 'libraries/popper.min.js', 'libraries/bootstrap.min.js', 'custom.js', 'libraries/fontawesome.min.js', 'libraries/fontawesome-solid.min.js', 'libraries/fontawesome-brands.modified.js'] as $file): ?>
    <script src="<?= ASSETS_FULL_URL ?>js/<?= $file ?>?v=<?= PRODUCT_CODE ?>"></script>
<?php endforeach ?>

<?= \1\Event::get_content('javascript') ?>
</body>
</html>
