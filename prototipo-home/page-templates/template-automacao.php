<?php
/*
Template Name: Automacao
*/
get_header();
?>
<main id="conteudo">
  <section class="page-hero">
    <div>
      <p class="section-kicker">Conforto com acionamento inteligente</p>
      <h1>Automacao de persianas para ganhar conforto, controle e valorizacao do ambiente.</h1>
      <p>
        Motorizacao faz sentido quando simplifica a rotina, melhora o controle da luz e
        eleva o padrao do projeto. A America Decor especifica a solucao e entrega a instalacao pronta para uso.
      </p>
      <ul class="pill-list">
        <li>Alexa</li>
        <li>Google Home</li>
        <li>Controle remoto</li>
        <li>App</li>
      </ul>
      <div class="hero-actions">
        <a class="button button-primary" href="<?php echo esc_url(americadecor_whatsapp_url('Ola, quero automatizar minha persiana e entender a melhor opcao.')); ?>">Quero automatizar meu ambiente</a>
        <a class="button button-secondary" href="<?php echo esc_url(americadecor_page_url('projetos/')); ?>">Ver aplicacoes praticas</a>
      </div>
    </div>
    <img src="<?php echo esc_url(americadecor_image_uri('automacao-persiana-motorizada-poster.jpg')); ?>" alt="Persiana motorizada em dormitorio com abertura automatica" fetchpriority="high" />
  </section>

  <section class="page-section">
    <div class="page-section-header">
      <p class="section-kicker">Beneficios que o cliente percebe</p>
      <h2>Automacao funciona melhor quando o ganho e pratico e imediato.</h2>
    </div>
    <div class="info-grid">
      <article class="info-card reveal">
        <h3>Mais conforto</h3>
        <p>Reduz esforco no uso diario e facilita o acionamento em ambientes de rotina intensa.</p>
      </article>
      <article class="info-card reveal">
        <h3>Mais valor no projeto</h3>
        <p>Eleva a percepcao de sofisticacao e reforca o padrao de acabamento do ambiente.</p>
      </article>
      <article class="info-card reveal">
        <h3>Mais controle</h3>
        <p>Facilita o ajuste de luz, privacidade e temperatura em diferentes horarios.</p>
      </article>
    </div>
  </section>

  <section class="page-section split-highlight">
    <div class="split-highlight-content">
      <p class="section-kicker">Aplicacoes reais</p>
      <h2>Acionamento motorizado para rotinas, grandes vaos e ambientes de uso frequente.</h2>
      <p>
        Controle as persianas por controle remoto, aplicativo ou assistente de voz e
        ganhe mais praticidade no dia a dia.
      </p>
      <ul class="check-list">
        <li>Residencias com rotina programada</li>
        <li>Quartos com escurecimento rapido</li>
        <li>Escritorios com incidencia solar forte</li>
        <li>Horizontais premium e madeira com acionamento motorizado</li>
        <li>Grandes vaos e fachadas com acionamento facilitado</li>
      </ul>
    </div>
    <div class="media-proof-card">
      <video controls preload="metadata" playsinline poster="<?php echo esc_url(americadecor_image_uri('automacao-persiana-motorizada-poster.jpg')); ?>">
        <source src="<?php echo esc_url(get_theme_file_uri('/assets/media/automacao-persiana-motorizada.mp4')); ?>" type="video/mp4" />
      </video>
      <p class="media-caption">Video real de persiana motorizada em dormitorio, mostrando abertura automatica e controle de luz no uso diario.</p>
    </div>
  </section>

  <section class="page-section">
    <div class="page-section-header">
      <p class="section-kicker">Duvidas frequentes</p>
      <h2>O que vale verificar antes de automatizar.</h2>
    </div>
    <div class="info-grid">
      <article class="info-card reveal">
        <h3>Da para automatizar o que ja existe?</h3>
        <p>Em muitos casos, sim. A viabilidade depende do modelo, da estrutura e do tipo de acionamento ja instalado.</p>
      </article>
      <article class="info-card reveal">
        <h3>Com o que e compativel?</h3>
        <p>Trabalhamos com solucoes compativeis com controle remoto, aplicativo e integracoes como Alexa e Google Home.</p>
      </article>
      <article class="info-card reveal">
        <h3>Quando vale a pena?</h3>
        <p>Faz mais sentido em ambientes com uso frequente, grandes aberturas, dormitorios e projetos com proposta premium.</p>
      </article>
    </div>
  </section>

  <section class="cta-banner">
    <div>
      <p class="section-kicker">Pronto para automatizar?</p>
      <h2>Conte o tipo de abertura e como voce quer acionar a persiana.</h2>
      <p>Com essas informacoes ja da para orientar motor, compatibilidade e faixa de solucao.</p>
    </div>
    <div class="hero-actions">
      <a class="button button-primary" href="<?php echo esc_url(americadecor_whatsapp_url('Ola, quero entender como automatizar minhas persianas.')); ?>">Quero avaliar a automacao ideal</a>
      <a class="button button-secondary" href="<?php echo esc_url(americadecor_page_url('projetos/')); ?>">Ver projetos com automacao</a>
    </div>
  </section>
</main>
<?php
get_footer();
