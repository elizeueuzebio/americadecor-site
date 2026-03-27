<?php
/*
Template Name: Projetos
*/
get_header();

$projects = americadecor_get_projects_data(6);
?>
<main id="conteudo">
  <section class="page-hero">
    <div>
      <p class="section-kicker">Prova visual</p>
      <h1>Ambientes reais para inspirar a escolha do seu projeto.</h1>
      <p>
        Veja aplicacoes em residencias e ambientes corporativos para encontrar referencias proximas
        ao seu espaco e decidir com mais seguranca.
      </p>
      <ul class="pill-list">
        <li>Residencial</li>
        <li>Corporativo</li>
        <li>Fachadas</li>
        <li>Automacao</li>
      </ul>
      <div class="hero-actions">
        <a class="button button-primary" href="<?php echo esc_url(americadecor_whatsapp_url('Ola, vi os projetos e quero um projeto parecido para o meu ambiente.')); ?>">Quero um projeto parecido</a>
        <a class="button button-secondary" href="<?php echo esc_url(americadecor_page_url('persianas-sob-medida/')); ?>">Comparar linhas e ambientes</a>
      </div>
    </div>
    <img src="<?php echo esc_url(americadecor_image_uri('suite-horizontal-motorizada.jpg')); ?>" alt="Suite com persiana motorizada em grande abertura" fetchpriority="high" />
  </section>

  <section class="page-section">
    <div class="page-section-header">
      <p class="section-kicker">Projetos reais</p>
      <h2>Referencias que mostram acabamento, conforto e praticidade no dia a dia.</h2>
    </div>
    <div class="project-grid">
      <?php foreach ($projects as $project) : ?>
        <article class="project-card reveal">
          <img src="<?php echo esc_url($project['image']); ?>" alt="<?php echo esc_attr($project['alt']); ?>" loading="lazy" />
          <div class="project-card-content">
            <h3><?php echo esc_html($project['title']); ?></h3>
            <p><?php echo esc_html($project['excerpt']); ?></p>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="page-section">
    <div class="page-section-header">
      <p class="section-kicker">Como estas referencias ajudam</p>
      <h2>Use estes projetos para escolher com mais seguranca.</h2>
    </div>
    <div class="info-grid">
      <article class="info-card reveal">
        <h3>Mostrar o tipo de ambiente</h3>
        <p>Fica mais facil visualizar um projeto parecido com o seu espaco.</p>
      </article>
      <article class="info-card reveal">
        <h3>Explicar a escolha do modelo</h3>
        <p>Voce entende por que cada solucao faz sentido em cada aplicacao.</p>
      </article>
      <article class="info-card reveal">
        <h3>Apontar o proximo passo</h3>
        <p>Quando encontrar uma referencia ideal, o proximo passo e pedir orientacao ou orcamento.</p>
      </article>
    </div>
  </section>

  <section class="cta-banner">
    <div>
      <p class="section-kicker">Proximo passo</p>
      <h2>Quero um projeto parecido com este.</h2>
      <p>Envie seu ambiente e receba a indicacao do modelo mais adequado.</p>
    </div>
    <div class="hero-actions">
      <a class="button button-primary" href="<?php echo esc_url(americadecor_whatsapp_url('Ola, vi os projetos e quero um projeto parecido para o meu ambiente.')); ?>">Quero um projeto parecido</a>
      <a class="button button-secondary" href="<?php echo esc_url(americadecor_page_url('persianas-sob-medida/')); ?>">Ver linhas e ambientes</a>
    </div>
  </section>
</main>
<?php
get_footer();
