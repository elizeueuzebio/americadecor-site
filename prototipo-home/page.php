<?php
get_header();
?>
<main id="conteudo">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <section class="page-hero page-hero--single">
        <div>
          <p class="section-kicker">Pagina</p>
          <h1><?php the_title(); ?></h1>
          <?php if (has_excerpt()) : ?>
            <p><?php echo esc_html(get_the_excerpt()); ?></p>
          <?php endif; ?>
        </div>
      </section>

      <section class="page-section">
        <div class="page-section-header">
          <h2>Conteudo</h2>
        </div>
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
      </section>
    <?php endwhile; ?>
  <?php endif; ?>
</main>
<?php
get_footer();
