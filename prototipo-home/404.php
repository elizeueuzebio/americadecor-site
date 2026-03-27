<?php
get_header();
?>
<main id="conteudo">
  <section class="page-hero page-hero--single">
    <div>
      <p class="section-kicker">Erro 404</p>
      <h1>Esta pagina nao esta disponivel.</h1>
      <p>
        O conteudo que voce procurou pode ter sido movido, atualizado ou removido.
        Volte para a home ou fale no WhatsApp para chegar rapidamente em manutencao, automacao ou persianas sob medida.
      </p>
      <div class="hero-actions">
        <a class="button button-primary" href="<?php echo esc_url(americadecor_page_url()); ?>">Voltar para a home</a>
        <a class="button button-secondary" href="<?php echo esc_url(americadecor_whatsapp_url('Ola, nao encontrei a pagina que eu queria e preciso de ajuda.')); ?>">Falar no WhatsApp</a>
      </div>
    </div>
  </section>
</main>
<?php
get_footer();
