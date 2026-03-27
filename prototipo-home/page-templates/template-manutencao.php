<?php
/*
Template Name: Manutencao
*/
get_header();
?>
<main id="conteudo">
  <section class="page-hero">
    <div>
      <p class="section-kicker">Persiana travando ou com defeito?</p>
      <h1>Manutencao de persianas com avaliacao rapida e orientacao honesta.</h1>
      <p>
        Se a persiana travou, rasgou, perdeu estabilidade ou o acionamento falhou,
        a America Decor avalia o problema e orienta se o melhor caminho e reparar, motorizar ou substituir.
      </p>
      <ul class="pill-list">
        <li>Reparo</li>
        <li>Reforma</li>
        <li>Higienizacao</li>
        <li>Troca de pecas</li>
      </ul>
      <div class="hero-actions">
        <a class="button button-primary" href="<?php echo esc_url(americadecor_whatsapp_url('Ola, quero avaliar uma persiana com defeito e entender a melhor solucao.')); ?>">Quero avaliar minha persiana</a>
        <a class="button button-secondary" href="#diagnostico">Ver como funciona a avaliacao</a>
      </div>
    </div>
    <img src="<?php echo esc_url(americadecor_image_uri('manutencao-tecnica-remaster.jpg')); ?>" alt="Tecnico avaliando persiana para manutencao e ajuste" fetchpriority="high" />
  </section>

  <section class="page-section">
    <div class="page-section-header">
      <p class="section-kicker">Problemas mais comuns</p>
      <h2>Seu caso pode ser avaliado com rapidez.</h2>
    </div>
    <div class="info-grid">
      <article class="info-card reveal">
        <h3>Nao abre ou nao recolhe direito</h3>
        <p>Avaliamos mecanismo, alinhamento e acionamento para recuperar o uso normal da persiana.</p>
      </article>
      <article class="info-card reveal">
        <h3>Tecido sujo ou desgaste visual</h3>
        <p>Higienizacao tecnica e reforma ajudam a recuperar aparencia e prolongar a vida util.</p>
      </article>
      <article class="info-card reveal">
        <h3>Motor ou acionamento falhando</h3>
        <p>Falhas em motorizacao podem ser corrigidas ou direcionadas para um upgrade mais confiavel.</p>
      </article>
    </div>
  </section>

  <section class="page-section split-highlight" id="diagnostico">
    <img src="<?php echo esc_url(americadecor_image_uri('manutencao-instalacao-remaster.jpg')); ?>" alt="Tecnico da America Decor realizando ajuste tecnico em persiana" loading="lazy" />
    <div class="split-highlight-content">
      <p class="section-kicker">Diagnostico rapido</p>
      <h2>Com foto, modelo aproximado e sintoma principal, a triagem fica muito mais objetiva.</h2>
      <p>
        Informe o tipo de persiana, o sintoma principal, a cidade e se ja existe motorizacao.
        Isso acelera a triagem e ajuda a orientar reparo, motorizacao ou substituicao com mais precisao.
      </p>
      <ul class="check-list">
        <li>Menos troca de mensagens</li>
        <li>Orientacao inicial mais precisa</li>
        <li>Agendamento tecnico mais assertivo</li>
      </ul>
    </div>
  </section>

  <section class="page-section">
    <div class="page-section-header">
      <p class="section-kicker">Servicos desta frente</p>
      <h2>Organizacao clara do escopo.</h2>
    </div>
    <div class="info-grid">
      <article class="info-card reveal">
        <h3>Manutencao corretiva</h3>
        <p>Ajuste de mecanismo, acionamento, alinhamento, troca de pecas e recuperacao funcional.</p>
      </article>
      <article class="info-card reveal">
        <h3>Higienizacao tecnica</h3>
        <p>Limpeza com foco em conservacao, aspecto visual e durabilidade do produto.</p>
      </article>
      <article class="info-card reveal">
        <h3>Reforma e revitalizacao</h3>
        <p>Quando vale mais recuperar do que substituir, com analise orientada pela America Decor.</p>
      </article>
    </div>
  </section>

  <section class="cta-banner">
    <div>
      <p class="section-kicker">Pronto para avaliar?</p>
      <h2>Envie uma foto e descreva o defeito para acelerar o atendimento.</h2>
      <p>Quanto mais contexto do problema, mais facil orientar reparo, motorizacao ou substituicao.</p>
    </div>
    <div class="hero-actions">
      <a class="button button-primary" href="<?php echo esc_url(americadecor_whatsapp_url('Ola, minha persiana precisa de manutencao ou reparo. Vou enviar foto e detalhes do defeito.')); ?>">Enviar foto do problema</a>
      <a class="button button-secondary" href="<?php echo esc_url(americadecor_page_url('automacao/')); ?>">Ver opcoes de motorizacao</a>
    </div>
  </section>
</main>
<?php
get_footer();
