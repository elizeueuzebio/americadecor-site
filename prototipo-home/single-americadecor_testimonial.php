<?php
get_header();
?>
<main id="conteudo">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <section class="page-hero page-hero--single">
        <div>
          <p class="section-kicker">Depoimento</p>
          <h1><?php the_title(); ?></h1>
          <?php if (has_excerpt()) : ?>
            <p><?php echo esc_html(get_the_excerpt()); ?></p>
          <?php endif; ?>
        </div>
      </section>

      <section class="page-section">
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
        <div class="hero-actions">
          <a class="button button-primary" href="<?php echo esc_url(americadecor_whatsapp_url('Ola, vi o depoimento e quero atendimento para o meu ambiente.')); ?>">Pedir atendimento</a>
          <a class="button button-secondary" href="<?php echo esc_url(americadecor_page_url()); ?>">Voltar para a home</a>
        </div>
      </section>
    <?php endwhile; ?>
  <?php endif; ?>
</main>
<?php
get_footer();
