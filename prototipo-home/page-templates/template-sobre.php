<?php
/*
Template Name: Sobre
*/
get_header();

$company_name = americadecor_get_setting('company_name');
?>
<main id="conteudo">
  <section class="page-hero page-hero--single">
    <div>
      <p class="section-kicker">Quem e a <?php echo esc_html($company_name); ?></p>
      <h1>Experiencia, atendimento consultivo e execucao com padrao premium.</h1>
      <p>
        A America Decor atende clientes que buscam conforto, acabamento, praticidade e seguranca na escolha.
        Sao mais de 35 anos orientando manutencao, motorizacao e projetos sob medida com atendimento proximo e execucao cuidadosa.
      </p>
    </div>
  </section>

  <section class="page-section">
    <div class="metric-grid">
      <article class="info-card reveal">
        <strong>35+</strong>
        <p>Anos de experiencia aplicados em persianas, instalacao, manutencao e pos-venda.</p>
      </article>
      <article class="info-card reveal">
        <strong>Premium</strong>
        <p>Atendimento com orientacao tecnica, acabamento bem resolvido e percepcao de valor premium.</p>
      </article>
      <article class="info-card reveal">
        <strong>Residencial</strong>
        <p>Projetos sob medida para salas, quartos, varandas e ambientes de alto padrao.</p>
      </article>
      <article class="info-card reveal">
        <strong>Corporativo</strong>
        <p>Solucoes para escritorios, fachadas, construtoras e padronizacao de ambientes.</p>
      </article>
    </div>
  </section>

  <section class="page-section split-highlight">
    <img src="<?php echo esc_url(americadecor_image_uri('instalacao-porta-balcao.jpg')); ?>" alt="Instalacao tecnica em porta-balcao de grande abertura" loading="lazy" />
    <div class="split-highlight-content">
      <p class="section-kicker">Como trabalhamos</p>
      <h2>Atendimento consultivo, acabamento premium e suporte do inicio ao pos-venda.</h2>
      <p>
        A America Decor atende projetos residenciais e corporativos com orientacao tecnica,
        especificacao correta, instalacao cuidadosa e acompanhamento depois da entrega.
      </p>
      <ul class="check-list">
        <li>Orientacao tecnica antes do fechamento</li>
        <li>Selecao de linha conforme o ambiente</li>
        <li>Execucao alinhada com acabamento e durabilidade</li>
      </ul>
    </div>
  </section>

  <section class="page-section split-highlight">
    <img src="<?php echo esc_url(americadecor_image_uri('fachada-america-decor.jpg')); ?>" alt="Fachada da loja America Decor" loading="lazy" />
    <div class="split-highlight-content">
      <p class="section-kicker">Loja fisica</p>
      <h2>A fachada da loja reforca proximidade, confianca e continuidade no atendimento.</h2>
      <p>
        Alem da execucao em campo, a America Decor tambem transmite seguranca por ter presenca fisica,
        atendimento proximo e operacao real para acompanhar o cliente do orcamento ao pos-venda.
      </p>
      <ul class="check-list">
        <li>Referencia fisica para atendimento e relacionamento</li>
        <li>Mais confianca na hora de fechar o projeto</li>
        <li>Mais seguranca para fechar com quem acompanha o projeto de ponta a ponta</li>
      </ul>
    </div>
  </section>

  <section class="page-section">
    <div class="page-section-header">
      <p class="section-kicker">Compromissos da marca</p>
      <h2>O que voce pode esperar ao falar com a America Decor.</h2>
    </div>
    <div class="info-grid">
      <article class="info-card reveal">
        <h3>Orientacao clara</h3>
        <p>O cliente entende o que esta comprando, por que aquela linha faz sentido e como sera atendido.</p>
      </article>
      <article class="info-card reveal">
        <h3>Confianca visual</h3>
        <p>Ambientes bem fotografados, sem excesso de efeitos, com estetica limpa e premium.</p>
      </article>
      <article class="info-card reveal">
        <h3>Pos-venda relevante</h3>
        <p>Manutencao e suporte reforcam credibilidade e continuidade no atendimento.</p>
      </article>
    </div>
  </section>

  <section class="cta-banner">
    <div>
      <p class="section-kicker">Proximo passo</p>
      <h2>Fale com a America Decor e receba orientacao para o seu projeto.</h2>
      <p>Se voce ja sabe o que precisa ou quer ajuda para escolher, o proximo passo e simples.</p>
    </div>
    <div class="hero-actions">
      <a class="button button-primary" href="<?php echo esc_url(americadecor_whatsapp_url('Ola, quero falar com a ' . $company_name . ' sobre meu ambiente.')); ?>">Falar com a <?php echo esc_html($company_name); ?></a>
      <a class="button button-secondary" href="<?php echo esc_url(americadecor_page_url('projetos/')); ?>">Ver referencias</a>
    </div>
  </section>
</main>
<?php
get_footer();
