<?php
get_header();

$hero_kicker = americadecor_get_setting('home_hero_kicker');
$hero_title = americadecor_get_setting('home_hero_title');
$hero_text = americadecor_get_setting('home_hero_text');
$metric_years = americadecor_get_setting('home_metric_years');
$metric_years_label = americadecor_get_setting('home_metric_years_label');
$metric_service_title = americadecor_get_setting('home_metric_service_title');
$metric_service_label = americadecor_get_setting('home_metric_service_label');
$metric_cta_title = americadecor_get_setting('home_metric_cta_title');
$metric_cta_label = americadecor_get_setting('home_metric_cta_label');
$google_rating = americadecor_get_setting('google_rating');
$google_review_count = americadecor_get_setting('google_review_count');
$maintenance_url = americadecor_whatsapp_url('Ola, quero avaliar uma persiana com defeito e entender a melhor solucao.');
$automation_url = americadecor_whatsapp_url('Ola, quero automatizar minha persiana e entender a melhor opcao.');
$project_url = americadecor_whatsapp_url('Ola, quero solicitar um projeto de persianas sob medida.');
$testimonials = americadecor_get_testimonials_data(3);
?>
<main id="conteudo">
  <section class="hero">
    <div class="hero-copy">
      <p class="section-kicker"><?php echo esc_html($hero_kicker); ?></p>
      <h1><?php echo esc_html($hero_title); ?></h1>
      <p class="hero-text"><?php echo esc_html($hero_text); ?></p>

      <ul class="hero-highlights" aria-label="Diferenciais principais">
        <li>Diagnostico claro para saber se vale reparar, motorizar ou trocar</li>
        <li>Motorizacao com controle remoto, app, Alexa e Google Home</li>
        <li>Projetos sob medida para residencias, arquitetos e construtoras</li>
      </ul>

      <div class="hero-actions">
        <a class="button button-primary" href="<?php echo esc_url($maintenance_url); ?>">Quero avaliar minha persiana</a>
        <a class="button button-secondary" href="#caminhos">Ver formas de atendimento</a>
      </div>

      <dl class="hero-metrics">
        <div>
          <dt><?php echo esc_html($metric_years); ?></dt>
          <dd><?php echo esc_html($metric_years_label); ?></dd>
        </div>
        <div>
          <dt><?php echo esc_html($metric_service_title); ?></dt>
          <dd><?php echo esc_html($metric_service_label); ?></dd>
        </div>
        <div>
          <dt><?php echo esc_html($metric_cta_title); ?></dt>
          <dd><?php echo esc_html($metric_cta_label); ?></dd>
        </div>
      </dl>
    </div>

    <div class="hero-visual" aria-hidden="true">
      <div class="hero-card hero-card-main">
        <img src="<?php echo esc_url(americadecor_image_uri('home-hero-sala-premium.jpg')); ?>" alt="" fetchpriority="high" />
      </div>
      <div class="hero-card hero-card-side">
        <img src="<?php echo esc_url(americadecor_image_uri('manutencao-tecnica-remaster.jpg')); ?>" alt="" loading="eager" />
      </div>
      <div class="hero-floating hero-floating-top">
        <strong>Entrada mais comum</strong>
        <span>Manutencao de persianas com orientacao rapida no WhatsApp.</span>
      </div>
      <div class="hero-floating hero-floating-bottom">
        <strong>Proximo passo certo</strong>
        <span>Se fizer sentido, ja indicamos motorizacao ou um novo projeto sob medida.</span>
      </div>
    </div>
  </section>

  <section class="showcase" id="caminhos">
    <div class="section-heading">
      <p class="section-kicker">Escolha seu caminho</p>
      <h2>Qual atendimento faz mais sentido para voce agora?</h2>
      <p>
        Escolha entre reparo, upgrade de tecnologia ou projeto novo e abra o WhatsApp
        ja com o contexto certo.
      </p>
    </div>

    <div class="page-links">
      <article class="page-link-card page-link-card-emphasis reveal">
        <p class="section-kicker">Entrada principal</p>
        <h2>Manutencao de persianas</h2>
        <p>Para persianas travadas, rasgadas, desalinhadas ou com acionamento comprometido.</p>
        <p><strong>Atendimento rapido em Sao Paulo.</strong> Avaliacao pelo WhatsApp em minutos para evitar troca sem necessidade.</p>
        <ul class="check-list">
          <li>Persianas que nao sobem, nao descem ou travam</li>
          <li>Troca de componentes, regulagem e higienizacao</li>
          <li>Avaliacao honesta para reparar, motorizar ou substituir</li>
        </ul>
        <div class="hero-actions">
          <a class="button button-primary" href="<?php echo esc_url($maintenance_url); ?>">Quero avaliar minha persiana</a>
        </div>
      </article>

      <article class="page-link-card reveal">
        <p class="section-kicker">Upgrade de conforto</p>
        <h2>Motorizacao / automacao</h2>
        <p>Controle sua casa com um toque e ganhe mais conforto, tecnologia e sofisticacao no dia a dia.</p>
        <ul class="check-list">
          <li>Controle remoto, app e comando por voz</li>
          <li>Upgrade indicado para quartos, salas, varandas e grandes vaos</li>
          <li>Tambem avaliamos persianas ja instaladas</li>
        </ul>
        <div class="hero-actions">
          <a class="button button-secondary" href="<?php echo esc_url($automation_url); ?>">Quero automatizar minha persiana</a>
        </div>
      </article>

      <article class="page-link-card reveal">
        <p class="section-kicker">Solucao premium</p>
        <h2>Persianas sob medida</h2>
        <p>Para reformas, apartamentos novos e ambientes que pedem mais estetica, conforto e acabamento.</p>
        <ul class="check-list">
          <li>Controle de luz, privacidade e conforto termico</li>
          <li>Linhas indicadas conforme ambiente e padrao do projeto</li>
          <li>Especificacao, medicao e instalacao profissional</li>
        </ul>
        <div class="hero-actions">
          <a class="button button-secondary" href="<?php echo esc_url($project_url); ?>">Solicitar projeto sob medida</a>
        </div>
      </article>
    </div>
  </section>

  <section class="page-section" id="manutencao-home">
    <div class="page-section-header">
      <p class="section-kicker">Manutencao com diagnostico claro</p>
      <h2>Comece resolvendo o defeito e entenda se vale reparar, motorizar ou renovar.</h2>
      <p>
        Quando a persiana apresenta problema, a decisao certa nem sempre e trocar tudo.
        A America Decor avalia o cenario e orienta a melhor solucao para o uso, o custo e o padrao do ambiente.
      </p>
    </div>
    <div class="split-highlight">
      <img src="<?php echo esc_url(americadecor_image_uri('manutencao-instalacao-remaster.jpg')); ?>" alt="Tecnico realizando manutencao em persiana" loading="lazy" />
      <div class="split-highlight-content">
        <h3>Problemas que atendemos com frequencia</h3>
        <ul class="check-list">
          <li>Persianas travando, tortas ou sem estabilidade no acionamento</li>
          <li>Tecidos, correntes, cordas, suportes e componentes desgastados</li>
          <li>Higienizacao e reforma para recuperar aparencia e desempenho</li>
          <li>Orientacao honesta sobre reparo, motorizacao ou substituicao</li>
        </ul>
        <div class="hero-actions">
          <a class="button button-primary" href="<?php echo esc_url($maintenance_url); ?>">Enviar foto da minha persiana</a>
          <a class="button button-secondary" href="<?php echo esc_url(americadecor_page_url('manutencao/')); ?>">Ver servicos de manutencao</a>
        </div>
      </div>
    </div>
  </section>

  <section class="showcase" id="evolucoes">
    <div class="section-heading">
      <p class="section-kicker">Proximos passos</p>
      <h2>Depois da manutencao, os dois upgrades que mais geram valor.</h2>
      <p>
        Quando a persiana pode evoluir, o proximo passo normalmente esta entre motorizacao
        e um novo projeto sob medida.
      </p>
    </div>

    <div class="page-links page-links-two">
      <article class="page-link-card reveal">
        <p class="section-kicker">Upgrade de conforto</p>
        <h2>Motorizacao / automacao</h2>
        <p>Controle sua rotina com um toque e leve mais conforto, tecnologia e sensacao premium para o ambiente.</p>
        <ul class="check-list">
          <li>Controle remoto, aplicativo e integracao com Alexa e Google Home</li>
          <li>Upgrade indicado para quartos, salas, varandas e grandes vaos</li>
          <li>Em muitos casos, da para motorizar a persiana ja instalada</li>
        </ul>
        <div class="hero-actions">
          <a class="button button-secondary" href="<?php echo esc_url($automation_url); ?>">Quero automatizar minha persiana</a>
          <a class="button button-secondary" href="<?php echo esc_url(americadecor_page_url('automacao/')); ?>">Ver solucoes de automacao</a>
        </div>
      </article>

      <article class="page-link-card reveal">
        <p class="section-kicker">Solucao premium</p>
        <h2>Persianas sob medida</h2>
        <p>Para reformas, apartamentos novos e ambientes que pedem mais estetica, conforto e acabamento.</p>
        <ul class="check-list">
          <li>Rolo para tela solar e blackout com leitura limpa</li>
          <li>Double Vision para controle de luz com presenca decorativa</li>
          <li>Silhouette para projetos de maior valor percebido</li>
        </ul>
        <div class="hero-actions">
          <a class="button button-secondary" href="<?php echo esc_url($project_url); ?>">Solicitar projeto sob medida</a>
          <a class="button button-secondary" href="<?php echo esc_url(americadecor_page_url('persianas-sob-medida/')); ?>">Explorar linhas e ambientes</a>
        </div>
      </article>
    </div>
  </section>

  <section class="testimonials" id="depoimentos">
    <div class="section-heading">
      <p class="section-kicker">Prova social e atendimento</p>
      <h2>Clientes lembram de acabamento, prazo e seguranca na orientacao.</h2>
      <p>
        A percepcao premium depende do resultado no ambiente e da seguranca de receber a solucao certa, sem troca desnecessaria.
      </p>
    </div>

    <div class="metric-grid">
      <article class="info-card reveal">
        <strong><?php echo esc_html($google_rating); ?>/5</strong>
        <p>Google | <?php echo esc_html($google_review_count); ?> avaliacoes de clientes.</p>
      </article>
      <article class="info-card reveal">
        <strong>35+</strong>
        <p>Anos de experiencia em persianas, instalacao e pos-venda.</p>
      </article>
      <article class="info-card reveal">
        <strong>Sao Paulo</strong>
        <p>Atendimento na capital e regiao com foco em resposta rapida.</p>
      </article>
      <article class="info-card reveal">
        <strong>Atendimento</strong>
        <p>Orientacao tecnica, instalacao e pos-venda no mesmo fluxo.</p>
      </article>
      <article class="info-card reveal">
        <strong>Perfil</strong>
        <p>Residencial, arquitetos, construtoras e projetos corporativos.</p>
      </article>
    </div>

    <div class="testimonial-grid">
      <?php foreach ($testimonials as $testimonial) : ?>
        <article class="testimonial-card reveal">
          <strong><?php echo esc_html($testimonial['role']); ?></strong>
          <p>"<?php echo esc_html($testimonial['content']); ?>"</p>
          <span><?php echo esc_html($testimonial['name']); ?></span>
        </article>
      <?php endforeach; ?>
    </div>

    <div class="section-heading section-heading-compact">
      <p class="section-kicker">Como funciona</p>
      <h2>Voce entra por WhatsApp e recebe o proximo passo com clareza.</h2>
    </div>

    <div class="info-grid">
      <article class="info-card reveal">
        <h3>1. Envie foto ou descreva a necessidade</h3>
        <p>O atendimento ja comeca com o contexto certo para evitar troca desnecessaria.</p>
      </article>
      <article class="info-card reveal">
        <h3>2. Receba a indicacao da melhor solucao</h3>
        <p>Indicamos se o caminho e manutencao, motorizacao ou projeto novo.</p>
      </article>
      <article class="info-card reveal">
        <h3>3. Agende a etapa tecnica</h3>
        <p>Quando necessario, avancamos para avaliacao, medicao, instalacao ou suporte.</p>
      </article>
    </div>
  </section>

  <section class="cta-banner" id="orcamento">
    <div>
      <p class="section-kicker">Pronto para avancar?</p>
      <h2>Abra o WhatsApp com a mensagem certa e acelere o atendimento.</h2>
      <p>Escolha se voce quer reparar, automatizar ou iniciar um projeto sob medida.</p>
    </div>
    <div class="hero-actions">
      <a class="button button-primary" href="<?php echo esc_url($maintenance_url); ?>">Avaliar manutencao</a>
      <a class="button button-secondary" href="<?php echo esc_url($automation_url); ?>">Quero automatizar</a>
      <a class="button button-secondary" href="<?php echo esc_url($project_url); ?>">Projeto sob medida</a>
    </div>
  </section>

  <section class="faq">
    <div class="section-heading">
      <p class="section-kicker">Duvidas frequentes</p>
      <h2>Respostas para as duvidas que mais travam a decisao.</h2>
    </div>

    <div class="faq-list">
      <details class="reveal">
        <summary>Vale reparar ou trocar a persiana?</summary>
        <p>Depende do estado da estrutura, do tecido, do acionamento e do objetivo do ambiente. A America Decor avalia e orienta o caminho mais inteligente.</p>
      </details>
      <details class="reveal">
        <summary>Da para motorizar persianas ja instaladas?</summary>
        <p>Em muitos casos, sim. A viabilidade depende do modelo, do acionamento atual e da estrutura disponivel.</p>
      </details>
      <details class="reveal">
        <summary>Voces atendem casas, apartamentos e empresas em Sao Paulo?</summary>
        <p>Sim. A America Decor atende clientes residenciais, corporativos, arquitetos e construtoras na capital e regiao.</p>
      </details>
      <details class="reveal">
        <summary>Arquitetos e construtoras podem contar com esse atendimento?</summary>
        <p>Sim. O atendimento contempla apoio tecnico, especificacao, medicao e execucao para projetos profissionais.</p>
      </details>
    </div>
  </section>
</main>
<?php
get_footer();

