<?php
get_header();
?>
<main id="conteudo">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <section class="page-hero page-hero--single">
        <div>
          <p class="section-kicker">Projeto</p>
          <h1><?php the_title(); ?></h1>
          <?php if (has_excerpt()) : ?>
            <p><?php echo esc_html(get_the_excerpt()); ?></p>
          <?php endif; ?>
        </div>
      </section>

      <section class="page-section">
        <?php if (has_post_thumbnail()) : ?>
          <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" style="width:100%; border-radius:22px; margin-bottom:24px;" />
        <?php endif; ?>
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
        <div class="hero-actions">
          <a class="button button-primary" href="<?php echo esc_url(americadecor_whatsapp_url('Ola, vi este projeto e quero algo parecido para o meu ambiente.')); ?>">Quero um projeto parecido</a>
          <a class="button button-secondary" href="<?php echo esc_url(americadecor_page_url('projetos/')); ?>">Voltar para projetos</a>
        </div>
      </section>
    <?php endwhile; ?>
  <?php endif; ?>
</main>
<?php
get_footer();
