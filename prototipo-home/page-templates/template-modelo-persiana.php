<?php
$model = americadecor_get_blind_model_page();

if (! $model) {
    status_header(404);
    get_template_part('404');
    return;
}

get_header();
?>
<main id="conteudo">
  <section class="page-hero">
    <div>
      <p class="section-kicker"><?php echo esc_html($model['hero_kicker']); ?></p>
      <h1><?php echo esc_html($model['hero_title']); ?></h1>
      <p><?php echo esc_html($model['hero_text']); ?></p>
      <ul class="pill-list">
        <?php foreach ($model['pills'] as $pill) : ?>
          <li><?php echo esc_html($pill); ?></li>
        <?php endforeach; ?>
      </ul>
      <div class="hero-actions">
        <a class="button button-primary" href="<?php echo esc_url(americadecor_whatsapp_url($model['whatsapp_message'])); ?>">Quero orcamento da <?php echo esc_html($model['name']); ?></a>
        <a class="button button-secondary" href="<?php echo esc_url(americadecor_page_url('persianas-sob-medida/')); ?>">Comparar com outras linhas</a>
      </div>
    </div>
    <img src="<?php echo esc_url(americadecor_image_uri($model['hero_image'])); ?>" alt="<?php echo esc_attr($model['hero_alt']); ?>" fetchpriority="high" />
  </section>

  <section class="page-section">
    <div class="page-section-header">
      <p class="section-kicker"><?php echo esc_html($model['benefits_kicker']); ?></p>
      <h2><?php echo esc_html($model['benefits_title']); ?></h2>
    </div>
    <div class="info-grid">
      <?php foreach ($model['benefits'] as $item) : ?>
        <article class="info-card reveal">
          <h3><?php echo esc_html($item['title']); ?></h3>
          <p><?php echo esc_html($item['text']); ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="page-section">
    <div class="page-section-header">
      <p class="section-kicker"><?php echo esc_html($model['contexts_kicker']); ?></p>
      <h2><?php echo esc_html($model['contexts_title']); ?></h2>
    </div>
    <div class="info-grid">
      <?php foreach ($model['contexts'] as $item) : ?>
        <article class="info-card reveal">
          <h3><?php echo esc_html($item['title']); ?></h3>
          <p><?php echo esc_html($item['text']); ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="page-section">
    <div class="page-section-header">
      <p class="section-kicker"><?php echo esc_html($model['related_kicker']); ?></p>
      <h2><?php echo esc_html($model['related_title']); ?></h2>
    </div>
    <div class="info-grid">
      <?php foreach ($model['related'] as $item) : ?>
        <?php
        $target_slug = $item['slug'];
        $target_url = $target_slug === 'persianas-sob-medida'
            ? americadecor_page_url('persianas-sob-medida/')
            : americadecor_page_url($target_slug . '/');
        ?>
        <article class="info-card reveal">
          <h3><?php echo esc_html($item['title']); ?></h3>
          <p><?php echo esc_html($item['text']); ?></p>
          <a class="text-link" href="<?php echo esc_url($target_url); ?>">Abrir pagina</a>
        </article>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="cta-banner">
    <div>
      <p class="section-kicker"><?php echo esc_html($model['cta_kicker']); ?></p>
      <h2><?php echo esc_html($model['cta_title']); ?></h2>
      <p><?php echo esc_html($model['cta_text']); ?></p>
    </div>
    <div class="hero-actions">
      <a class="button button-primary" href="<?php echo esc_url(americadecor_whatsapp_url($model['whatsapp_message'])); ?>">Falar da <?php echo esc_html($model['name']); ?> no WhatsApp</a>
      <a class="button button-secondary" href="<?php echo esc_url(americadecor_whatsapp_url('Ola, quero enviar foto e briefing do ambiente para avaliar a linha ' . $model['name'] . '.')); ?>">Enviar briefing do ambiente</a>
    </div>
  </section>
</main>
<?php
get_footer();
