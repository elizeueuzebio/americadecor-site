<?php
/*
Template Name: Contato
*/
get_header();

$company_name = americadecor_get_setting('company_name');
$company_email = americadecor_get_setting('email');
$contact_channels = americadecor_get_contact_channels();
?>
<main id="conteudo">
  <section class="page-hero page-hero--single">
    <div>
      <p class="section-kicker">Contato direto</p>
      <h1>Peca seu orcamento com o minimo de atrito.</h1>
      <p>
        Solicite orcamento, automacao, manutencao ou orientacao para o seu projeto.
      </p>
    </div>
  </section>

  <section class="page-section">
    <div class="contact-layout">
      <aside class="contact-card">
        <p class="section-kicker">Canais principais</p>
        <h3>Fale com a America Decor</h3>
        <ul class="contact-channels">
          <?php foreach ($contact_channels as $channel) : ?>
            <li class="contact-channel">
              <span class="contact-channel-icon" aria-hidden="true">
                <img src="<?php echo esc_url(americadecor_image_uri($channel['icon'])); ?>" alt="" width="64" height="64" loading="lazy" />
              </span>
              <div class="contact-channel-copy">
                <span class="contact-channel-label"><?php echo esc_html($channel['label']); ?></span>
                <a class="contact-channel-link" href="<?php echo esc_url($channel['href']); ?>"><?php echo esc_html($channel['display']); ?></a>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
        <p><strong>E-mail:</strong> <span><?php echo esc_html(americadecor_get_setting('email')); ?></span></p>
        <div class="contact-email-actions">
          <a class="button button-secondary" href="<?php echo esc_url('https://mail.google.com/mail/?view=cm&fs=1&to=' . rawurlencode(americadecor_get_setting('email'))); ?>" target="_blank" rel="noopener noreferrer">Abrir no Gmail</a>
          <button class="button button-tertiary" type="button" data-copy-text="<?php echo esc_attr(americadecor_get_setting('email')); ?>" data-copy-target="#email-status-wp">Copiar e-mail</button>
          <a class="button button-tertiary" href="mailto:<?php echo esc_attr(americadecor_get_setting('email')); ?>">Abrir app de e-mail</a>
        </div>
        <div class="contact-social-actions">
          <a class="button button-social" href="<?php echo esc_url(americadecor_get_setting('instagram_url')); ?>" target="_blank" rel="noopener noreferrer">
            <img src="<?php echo esc_url(americadecor_image_uri('icon-instagram.svg')); ?>" alt="" width="64" height="64" loading="lazy" />
            <span>Instagram</span>
          </a>
        </div>
        <p class="form-status" id="email-status-wp" role="status" aria-live="polite"></p>
        <p><strong>Endereco:</strong> <?php echo esc_html(americadecor_get_setting('address_line')); ?>, <?php echo esc_html(americadecor_get_setting('address_city_state')); ?></p>
        <ul>
          <li>Orcamentos residenciais e corporativos</li>
          <li>Automacao e motorizacao</li>
          <li>Manutencao, reparo e higienizacao</li>
        </ul>
      </aside>

      <form
        class="quote-form js-whatsapp-form"
        data-whatsapp-form="true"
        data-phone="<?php echo esc_attr(americadecor_get_setting('whatsapp_number')); ?>"
        data-title="Solicitacao de contato - <?php echo esc_attr($company_name); ?>"
        novalidate
      >
        <div class="form-field">
          <label for="contato-nome">Seu nome</label>
          <input id="contato-nome" name="nome" type="text" placeholder="Ex.: Mariana" autocomplete="name" required />
        </div>

        <div class="form-field">
          <label for="contato-telefone">WhatsApp</label>
          <input id="contato-telefone" name="whatsapp" type="tel" inputmode="tel" placeholder="Ex.: (11) 99999-9999" required />
        </div>

        <div class="form-field">
          <label for="contato-servico">Servico de interesse</label>
          <select id="contato-servico" name="servico" required>
            <option value="">Selecione</option>
            <option>Persianas sob medida</option>
            <option>Automacao</option>
            <option>Motorizacao</option>
            <option>Manutencao / reparo</option>
            <option>Higienizacao / reforma</option>
            <option>Projeto corporativo</option>
          </select>
        </div>

        <div class="form-field">
          <label for="contato-ambiente">Tipo de ambiente</label>
          <select id="contato-ambiente" name="ambiente" required>
            <option value="">Selecione</option>
            <option>Sala</option>
            <option>Quarto</option>
            <option>Home office / escritorio</option>
            <option>Varanda</option>
            <option>Fachada / area externa</option>
            <option>Projeto corporativo</option>
            <option>Outro</option>
          </select>
        </div>

        <div class="form-field">
          <label for="contato-regiao">Cidade ou bairro</label>
          <input id="contato-regiao" name="regiao" type="text" placeholder="Ex.: Itaim Bibi, Sao Paulo" required />
        </div>

        <div class="form-field form-field-full">
          <label for="contato-detalhes">Detalhes do projeto ou problema</label>
          <textarea id="contato-detalhes" name="detalhes" rows="6" placeholder="Ex.: Quero persianas blackout para dois quartos e automacao na sala." required></textarea>
        </div>

        <p class="form-status" role="status" aria-live="polite"></p>

        <div class="form-actions">
          <button class="button button-primary" type="submit">Enviar para WhatsApp</button>
          <a class="button button-secondary" href="<?php echo esc_url('https://mail.google.com/mail/?view=cm&fs=1&to=' . rawurlencode($company_email)); ?>" target="_blank" rel="noopener noreferrer">Enviar pelo Gmail</a>
          <button class="button button-tertiary" type="button" data-copy-text="<?php echo esc_attr($company_email); ?>" data-copy-target="#email-status-wp">Copiar e-mail</button>
        </div>
      </form>
    </div>
  </section>

  <section class="page-section">
    <div class="page-section-header">
      <p class="section-kicker">Ajuda antes do envio</p>
      <h2>O que informar para receber resposta melhor.</h2>
    </div>
    <div class="info-grid">
      <article class="info-card reveal">
        <h3>Tipo de ambiente</h3>
        <p>Sala, quarto, escritorio, fachada ou projeto corporativo ajudam a orientar a solucao certa com mais rapidez.</p>
      </article>
      <article class="info-card reveal">
        <h3>Objetivo principal</h3>
        <p>Blackout, controle solar, privacidade, automacao ou reparo ja reduzem etapas no atendimento.</p>
      </article>
      <article class="info-card reveal">
        <h3>Localizacao</h3>
        <p>Regiao ou cidade ajudam a entender cobertura e logistica desde o primeiro contato.</p>
      </article>
    </div>
  </section>
</main>
<?php
get_footer();
