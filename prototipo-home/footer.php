    <?php $contact_channels = americadecor_get_contact_channels(); ?>
    <footer class="site-footer">
      <div class="footer-brand">
        <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr(americadecor_get_setting('company_name')); ?>">
          <img class="footer-logo" src="<?php echo esc_url(americadecor_image_uri('logo-america-decor-horizontal.svg')); ?>" alt="<?php echo esc_attr(americadecor_get_setting('company_name')); ?>" width="1600" height="400" loading="lazy" />
        </a>
        <p>Persianas, automacao e manutencao para mais conforto, controle de luz e praticidade no dia a dia.</p>
      </div>
      <div>
        <strong>Contato</strong>
        <ul class="contact-channels contact-channels-compact">
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
        <p>E-mail: <a href="<?php echo esc_url('https://mail.google.com/mail/?view=cm&fs=1&to=' . rawurlencode(americadecor_get_setting('email'))); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html(americadecor_get_setting('email')); ?></a></p>
        <div class="contact-social-actions">
          <a class="button button-social" href="<?php echo esc_url(americadecor_get_setting('instagram_url')); ?>" target="_blank" rel="noopener noreferrer">
            <img src="<?php echo esc_url(americadecor_image_uri('icon-instagram.svg')); ?>" alt="" width="64" height="64" loading="lazy" />
            <span>Instagram</span>
          </a>
        </div>
      </div>
      <div>
        <strong>Navegacao</strong>
        <p><a href="<?php echo esc_url(americadecor_page_url('manutencao/')); ?>">Manutencao</a></p>
        <p><a href="<?php echo esc_url(americadecor_page_url('automacao/')); ?>">Automacao</a></p>
        <p><a href="<?php echo esc_url(americadecor_page_url('persianas-sob-medida/')); ?>">Persianas</a></p>
      </div>
      <div>
        <strong>Endereco</strong>
        <p><?php echo esc_html(americadecor_get_setting('address_line')); ?><br /><?php echo esc_html(americadecor_get_setting('address_city_state')); ?></p>
      </div>
      <div class="site-footer-bottom">
        <p>Desenvolvido por Elizeu Euzebio</p>
      </div>
    </footer>

    <?php $mobile_cta = americadecor_get_mobile_cta(); ?>
    <a class="mobile-cta" href="<?php echo esc_url($mobile_cta['url']); ?>">
      <?php echo esc_html($mobile_cta['label']); ?>
    </a>

    <?php wp_footer(); ?>
  </body>
</html>
