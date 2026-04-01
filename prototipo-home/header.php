<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(); ?>
    <script defer src="/_vercel/insights/script.js"></script>
  </head>
  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <a class="skip-link" href="#conteudo">Pular para o conteudo</a>

    <?php $topbar = americadecor_get_topbar_data(); ?>
    <div class="topbar">
      <p><?php echo esc_html($topbar['text']); ?></p>
      <a href="<?php echo esc_url($topbar['url']); ?>">
        <?php echo esc_html($topbar['label']); ?>
      </a>
    </div>

    <header class="site-header">
      <div class="brand-block">
        <?php if (has_custom_logo()) : ?>
          <?php the_custom_logo(); ?>
        <?php else : ?>
          <a class="brand-logo-link" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr(americadecor_get_setting('company_name')); ?>">
            <img class="brand-logo brand-logo-horizontal" src="<?php echo esc_url(americadecor_image_uri('logo-america-decor-horizontal.svg')); ?>" alt="<?php echo esc_attr(americadecor_get_setting('company_name')); ?>" width="1600" height="400" />
            <img class="brand-logo brand-logo-symbol" src="<?php echo esc_url(americadecor_image_uri('logo-america-decor-simbolo.svg')); ?>" alt="" aria-hidden="true" width="500" height="500" />
          </a>
        <?php endif; ?>
      </div>

      <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="menu-principal">
        Menu
      </button>

      <?php americadecor_render_primary_nav(); ?>
    </header>
