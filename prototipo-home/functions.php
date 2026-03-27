<?php
if (! defined('ABSPATH')) {
    exit;
}

const AMERICADECOR_WHATSAPP = '5511942244263';

function americadecor_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', [
        'height' => 400,
        'width' => 1600,
        'flex-height' => true,
        'flex-width' => true,
        'unlink-homepage-logo' => true,
    ]);
    add_theme_support('html5', ['search-form', 'gallery', 'caption', 'style', 'script']);
    register_nav_menus([
        'primary' => 'Menu principal',
    ]);
}
add_action('after_setup_theme', 'americadecor_setup');

function americadecor_get_theme_defaults(): array
{
    return [
        'company_name' => 'America Decor',
        'company_tagline' => 'Manutencao, motorizacao e persianas sob medida',
        'whatsapp_number' => AMERICADECOR_WHATSAPP,
        'whatsapp_label' => '(11) 94224-4263',
        'whatsapp_number_secondary' => '5511995728107',
        'whatsapp_label_secondary' => '(11) 99572-8107',
        'phone_number' => '551131677837',
        'phone_display' => '(11) 3167-7837',
        'business_whatsapp_number' => '551131677837',
        'business_whatsapp_label' => '(11) 3167-7837',
        'instagram_url' => 'https://www.instagram.com/persianasamericadecor/',
        'email' => 'contato@americadecor.com.br',
        'address_line' => 'Rua Jesuino Arruda, 780',
        'address_city_state' => 'Itaim Bibi, Sao Paulo - SP',
        'google_rating' => '4,5',
        'google_review_count' => '128',
        'home_hero_kicker' => 'Manutencao, motorizacao e persianas sob medida em Sao Paulo',
        'home_hero_title' => 'Sua persiana travou, perdeu desempenho ou precisa evoluir?',
        'home_hero_text' => 'Avaliamos, consertamos e indicamos se vale reparar, automatizar ou renovar, direto no WhatsApp.',
        'home_metric_years' => '35+',
        'home_metric_years_label' => 'Anos de experiencia',
        'home_metric_service_title' => 'Sao Paulo',
        'home_metric_service_label' => 'Capital e regiao',
        'home_metric_cta_title' => 'Atendimento',
        'home_metric_cta_label' => 'Residencial e corporativo',
    ];
}

function americadecor_get_setting(string $key): string
{
    $defaults = americadecor_get_theme_defaults();
    return (string) get_theme_mod($key, $defaults[$key] ?? '');
}

function americadecor_sanitize_text(string $value): string
{
    return sanitize_text_field($value);
}

function americadecor_sanitize_textarea(string $value): string
{
    return sanitize_textarea_field($value);
}

function americadecor_sanitize_whatsapp(string $value): string
{
    return preg_replace('/\D+/', '', (string) $value);
}

function americadecor_customize_register(WP_Customize_Manager $wp_customize): void
{
    $wp_customize->add_section('americadecor_company', [
        'title' => 'America Decor - Empresa',
        'priority' => 30,
    ]);

    $company_fields = [
        'company_name' => ['label' => 'Nome da empresa', 'sanitize' => 'americadecor_sanitize_text'],
        'company_tagline' => ['label' => 'Linha de apoio da marca', 'sanitize' => 'americadecor_sanitize_text'],
        'whatsapp_number' => ['label' => 'WhatsApp em formato numerico', 'sanitize' => 'americadecor_sanitize_whatsapp'],
        'whatsapp_label' => ['label' => 'WhatsApp exibido', 'sanitize' => 'americadecor_sanitize_text'],
        'whatsapp_number_secondary' => ['label' => 'WhatsApp secundario numerico', 'sanitize' => 'americadecor_sanitize_whatsapp'],
        'whatsapp_label_secondary' => ['label' => 'WhatsApp secundario exibido', 'sanitize' => 'americadecor_sanitize_text'],
        'phone_number' => ['label' => 'Telefone numerico', 'sanitize' => 'americadecor_sanitize_whatsapp'],
        'phone_display' => ['label' => 'Telefone fixo exibido', 'sanitize' => 'americadecor_sanitize_text'],
        'business_whatsapp_number' => ['label' => 'WhatsApp Business numerico', 'sanitize' => 'americadecor_sanitize_whatsapp'],
        'business_whatsapp_label' => ['label' => 'WhatsApp Business exibido', 'sanitize' => 'americadecor_sanitize_text'],
        'instagram_url' => ['label' => 'URL do Instagram', 'sanitize' => 'esc_url_raw', 'type' => 'url'],
        'email' => ['label' => 'E-mail', 'sanitize' => 'sanitize_email'],
        'address_line' => ['label' => 'Endereco', 'sanitize' => 'americadecor_sanitize_text'],
        'address_city_state' => ['label' => 'Cidade, estado e complemento', 'sanitize' => 'americadecor_sanitize_text'],
        'google_rating' => ['label' => 'Nota media no Google', 'sanitize' => 'americadecor_sanitize_text'],
        'google_review_count' => ['label' => 'Total de avaliacoes no Google', 'sanitize' => 'americadecor_sanitize_text'],
    ];

    foreach ($company_fields as $key => $config) {
        $wp_customize->add_setting($key, [
            'default' => americadecor_get_theme_defaults()[$key],
            'sanitize_callback' => $config['sanitize'],
        ]);

        $wp_customize->add_control($key, [
            'section' => 'americadecor_company',
            'label' => $config['label'],
            'type' => $config['type'] ?? 'text',
        ]);
    }

    $wp_customize->add_section('americadecor_home', [
        'title' => 'America Decor - Home',
        'priority' => 31,
    ]);

    $home_fields = [
        'home_hero_kicker' => ['label' => 'Kicker da home', 'type' => 'text', 'sanitize' => 'americadecor_sanitize_text'],
        'home_hero_title' => ['label' => 'Titulo da home', 'type' => 'text', 'sanitize' => 'americadecor_sanitize_text'],
        'home_hero_text' => ['label' => 'Texto principal da home', 'type' => 'textarea', 'sanitize' => 'americadecor_sanitize_textarea'],
        'home_metric_years' => ['label' => 'Metricas - destaque 1', 'type' => 'text', 'sanitize' => 'americadecor_sanitize_text'],
        'home_metric_years_label' => ['label' => 'Metricas - rotulo 1', 'type' => 'text', 'sanitize' => 'americadecor_sanitize_text'],
        'home_metric_service_title' => ['label' => 'Metricas - destaque 2', 'type' => 'text', 'sanitize' => 'americadecor_sanitize_text'],
        'home_metric_service_label' => ['label' => 'Metricas - rotulo 2', 'type' => 'text', 'sanitize' => 'americadecor_sanitize_text'],
        'home_metric_cta_title' => ['label' => 'Metricas - destaque 3', 'type' => 'text', 'sanitize' => 'americadecor_sanitize_text'],
        'home_metric_cta_label' => ['label' => 'Metricas - rotulo 3', 'type' => 'text', 'sanitize' => 'americadecor_sanitize_text'],
    ];

    foreach ($home_fields as $key => $config) {
        $wp_customize->add_setting($key, [
            'default' => americadecor_get_theme_defaults()[$key],
            'sanitize_callback' => $config['sanitize'],
        ]);

        $wp_customize->add_control($key, [
            'section' => 'americadecor_home',
            'label' => $config['label'],
            'type' => $config['type'],
        ]);
    }
}
add_action('customize_register', 'americadecor_customize_register');

function americadecor_register_post_types(): void
{
    register_post_type('americadecor_project', [
        'labels' => [
            'name' => 'Projetos',
            'singular_name' => 'Projeto',
            'add_new_item' => 'Adicionar projeto',
            'edit_item' => 'Editar projeto',
        ],
        'public' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-format-gallery',
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail'],
        'has_archive' => false,
        'rewrite' => ['slug' => 'projeto'],
    ]);

    register_post_type('americadecor_testimonial', [
        'labels' => [
            'name' => 'Depoimentos',
            'singular_name' => 'Depoimento',
            'add_new_item' => 'Adicionar depoimento',
            'edit_item' => 'Editar depoimento',
        ],
        'public' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-testimonial',
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail'],
        'has_archive' => false,
        'rewrite' => ['slug' => 'depoimento'],
    ]);
}
add_action('init', 'americadecor_register_post_types');

function americadecor_get_fallback_projects(): array
{
    return [
        [
            'title' => 'Quarto com blackout sob medida',
            'excerpt' => 'Projeto pensado para escurecimento eficiente, privacidade e uma rotina de descanso muito mais confortavel.',
            'image' => americadecor_image_uri('quarto-blackout-premium.jpg'),
            'alt' => 'Quarto com blackout sob medida',
        ],
        [
            'title' => 'Celular premium com acabamento leve',
            'excerpt' => 'Aplicacao voltada para sofisticacao, conforto termico e sensacao de projeto exclusivo.',
            'image' => americadecor_image_uri('produto-plissada-premium.jpg'),
            'alt' => 'Projeto com persiana celular premium',
        ],
        [
            'title' => 'Dormitorio com janela integrada',
            'excerpt' => 'Aplicacao residencial pensada para conforto visual, vedacao mais limpa e composicao alinhada ao espaco.',
            'image' => americadecor_image_uri('janela-integrada-suite.jpg'),
            'alt' => 'Dormitorio com janela integrada e acabamento sob medida',
        ],
        [
            'title' => 'Area externa com protecao solar',
            'excerpt' => 'Solucao aplicada em espaco amplo para reduzir incidencia direta sem perder elegancia visual.',
            'image' => americadecor_image_uri('projeto-piscina-persiana.jpg'),
            'alt' => 'Area de lazer com protecao solar',
        ],
        [
            'title' => 'Escritorio com horizontais premium',
            'excerpt' => 'Aplicacao corporativa com leitura mais arquitetonica, controle fino de luz e visual executivo.',
            'image' => americadecor_image_uri('escritorio-horizontal-wide.jpg'),
            'alt' => 'Escritorio com persiana horizontal premium',
        ],
        [
            'title' => 'Porta-balcao com persiana motorizada',
            'excerpt' => 'Projeto voltado para praticidade no dia a dia, abertura ampla e acionamento mais confortavel.',
            'image' => americadecor_image_uri('suite-porta-balcao-motorizada.jpg'),
            'alt' => 'Porta-balcao com persiana motorizada',
        ],
    ];
}

function americadecor_get_projects_data(int $limit = 6): array
{
    $query = new WP_Query([
        'post_type' => 'americadecor_project',
        'posts_per_page' => $limit,
        'post_status' => 'publish',
        'no_found_rows' => true,
    ]);

    if (! $query->have_posts()) {
        return array_slice(americadecor_get_fallback_projects(), 0, $limit);
    }

    $projects = [];

    while ($query->have_posts()) {
        $query->the_post();
        $projects[] = [
            'title' => get_the_title(),
            'excerpt' => get_the_excerpt() ?: wp_trim_words(wp_strip_all_tags(get_the_content()), 20),
            'image' => get_the_post_thumbnail_url(get_the_ID(), 'large') ?: americadecor_image_uri('home-hero-sala-premium.jpg'),
            'alt' => get_the_title(),
        ];
    }

    wp_reset_postdata();

    return $projects;
}

function americadecor_get_fallback_testimonials(): array
{
    return [
        [
            'name' => 'Rafaela Rodrigues',
            'content' => 'Sem palavras, produtos de primeira linha, com acabamento impecavel. Nota mil, amei o trabalho de voces. Super recomendo.',
            'role' => 'Acabamento impecavel',
        ],
        [
            'name' => 'Denise Cohen',
            'content' => 'Sou cliente deles ha anos. Sempre fui muito bem atendida. Preco honesto, sempre entregam no prazo combinado, com produtos de altissima qualidade.',
            'role' => 'Altissima qualidade',
        ],
        [
            'name' => 'Valmir Tavares',
            'content' => 'Excelente profissional tanto no atendimento como na execucao dos servicos. Produtos com alto padrao de qualidade.',
            'role' => 'Profissionalismo',
        ],
    ];
}

function americadecor_get_testimonials_data(int $limit = 3): array
{
    $query = new WP_Query([
        'post_type' => 'americadecor_testimonial',
        'posts_per_page' => $limit,
        'post_status' => 'publish',
        'no_found_rows' => true,
    ]);

    if (! $query->have_posts()) {
        return array_slice(americadecor_get_fallback_testimonials(), 0, $limit);
    }

    $testimonials = [];

    while ($query->have_posts()) {
        $query->the_post();
        $testimonials[] = [
            'name' => get_the_title(),
            'content' => wp_trim_words(wp_strip_all_tags(get_the_content()), 28),
            'role' => get_the_excerpt() ?: 'Cliente ' . americadecor_get_setting('company_name'),
        ];
    }

    wp_reset_postdata();

    return $testimonials;
}

function americadecor_asset_version(string $relative_path): string
{
    $path = get_theme_file_path($relative_path);

    if (file_exists($path)) {
        return (string) filemtime($path);
    }

    return wp_get_theme()->get('Version');
}

function americadecor_enqueue_assets(): void
{
    wp_enqueue_style(
        'americadecor-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap',
        [],
        null
    );

    wp_enqueue_style(
        'americadecor-site',
        get_theme_file_uri('/assets/css/site.css'),
        ['americadecor-fonts'],
        americadecor_asset_version('/assets/css/site.css')
    );

    wp_enqueue_script(
        'americadecor-site',
        get_theme_file_uri('/assets/js/site.js'),
        [],
        americadecor_asset_version('/assets/js/site.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'americadecor_enqueue_assets');

function americadecor_image_uri(string $filename): string
{
    return get_theme_file_uri('/assets/images/' . ltrim($filename, '/'));
}

function americadecor_page_url(string $path = ''): string
{
    return home_url('/' . ltrim($path, '/'));
}

function americadecor_whatsapp_url(string $message): string
{
    $number = americadecor_get_setting('whatsapp_number') ?: AMERICADECOR_WHATSAPP;
    return 'https://wa.me/' . preg_replace('/\D+/', '', $number) . '?text=' . rawurlencode($message);
}

function americadecor_whatsapp_url_for(string $number, string $message): string
{
    return 'https://wa.me/' . preg_replace('/\D+/', '', $number) . '?text=' . rawurlencode($message);
}

function americadecor_tel_url(string $number): string
{
    return 'tel:+' . preg_replace('/\D+/', '', $number);
}

function americadecor_get_contact_channels(): array
{
    $company_name = americadecor_get_setting('company_name');
    $message = 'Ola, quero um orcamento com a ' . $company_name . '.';

    return [
        [
            'icon' => 'icon-whatsapp.svg',
            'label' => 'WhatsApp principal',
            'display' => americadecor_get_setting('whatsapp_label'),
            'href' => americadecor_whatsapp_url($message),
        ],
        [
            'icon' => 'icon-whatsapp.svg',
            'label' => 'WhatsApp adicional',
            'display' => americadecor_get_setting('whatsapp_label_secondary'),
            'href' => americadecor_whatsapp_url_for(americadecor_get_setting('whatsapp_number_secondary'), $message),
        ],
        [
            'icon' => 'icon-phone.svg',
            'label' => 'Telefone',
            'display' => americadecor_get_setting('phone_display'),
            'href' => americadecor_tel_url(americadecor_get_setting('phone_number')),
        ],
        [
            'icon' => 'icon-whatsapp.svg',
            'label' => 'WhatsApp Business',
            'display' => americadecor_get_setting('business_whatsapp_label'),
            'href' => americadecor_whatsapp_url_for(americadecor_get_setting('business_whatsapp_number'), $message),
        ],
    ];
}

function americadecor_is_current(string $slug): bool
{
    if ($slug === '' || $slug === '/') {
        return is_front_page();
    }

    return is_page($slug);
}

function americadecor_get_blind_model_page(?string $slug = null): ?array
{
    if ($slug === null || $slug === '') {
        $slug = get_queried_object_id() ? (string) get_post_field('post_name', get_queried_object_id()) : '';
    }

    $models = [
        'persiana-rolo' => [
            'name' => 'Rolo',
            'seo_title' => 'Persiana Rolo',
            'seo_description' => 'Persiana Rolo sob medida para tela solar, blackout e automacao em residencias e empresas. Peca orientacao especializada.',
            'seo_image' => 'escritorio-persiana-rolo.jpg',
            'topbar_text' => 'Persiana Rolo sob medida para tela solar, blackout e automacao',
            'topbar_label' => 'Pedir orcamento da Rolo',
            'whatsapp_message' => 'Ola, quero um orcamento para persiana Rolo.',
            'hero_kicker' => 'Modelo mais versatil',
            'hero_title' => 'Persiana Rolo sob medida para quem quer controle de luz com leitura limpa.',
            'hero_text' => 'E a linha mais versatil da categoria: funciona muito bem em tela solar, translucida ou blackout, atende residencias e empresas e se adapta com facilidade a vaos maiores.',
            'hero_image' => 'escritorio-persiana-rolo.jpg',
            'hero_alt' => 'Persiana Rolo com tela solar em ambiente corporativo',
            'pills' => ['Tela solar', 'Blackout', 'Grandes vaos', 'Automatizavel'],
            'benefits_kicker' => 'O que ela entrega',
            'benefits_title' => 'Por que a Rolo costuma ser a escolha mais direta.',
            'benefits' => [
                ['title' => 'Versatilidade real', 'text' => 'A mesma familia atende tela solar, translucida e blackout sem mudar a logica de instalacao.'],
                ['title' => 'Visual limpo', 'text' => 'O desenho discreto combina com projetos residenciais e corporativos sem pesar na decoracao.'],
                ['title' => 'Pronta para automacao', 'text' => 'Aceita motorizacao com boa leitura estetica, o que amplia conforto sem complicar o conjunto.'],
            ],
            'contexts_kicker' => 'Onde ela faz mais sentido',
            'contexts_title' => 'Onde a Rolo costuma funcionar melhor.',
            'contexts' => [
                ['title' => 'Escritorios e consultorios', 'text' => 'Tela solar reduz reflexos, melhora conforto visual e preserva leitura contemporanea do ambiente.'],
                ['title' => 'Salas e areas sociais', 'text' => 'Entrega controle solar eficiente sem bloquear totalmente a entrada de luz natural.'],
                ['title' => 'Quartos com blackout', 'text' => 'Na versao blackout, ajuda a escurecer o ambiente e reforca a sensacao de conforto no descanso.'],
            ],
            'related_kicker' => 'Compare outras linhas',
            'related_title' => 'Se a Rolo nao for a leitura certa, compare estas alternativas.',
            'related' => [
                ['title' => 'Double Vision', 'text' => 'Melhor quando o cliente quer dosar luz e privacidade com um visual decorativo mais presente.', 'slug' => 'persiana-double-vision'],
                ['title' => 'Silhouette', 'text' => 'Faz mais sentido quando a meta e sofisticacao visivel e percepcao premium logo no primeiro olhar.', 'slug' => 'persiana-silhouette'],
                ['title' => 'Voltar para a visao geral', 'text' => 'Compare todas as linhas e entenda rapidamente qual faz mais sentido para cada ambiente.', 'slug' => 'persianas-sob-medida'],
            ],
            'cta_kicker' => 'Proximo passo',
            'cta_title' => 'Envie o ambiente e a medida aproximada para validar tecido, abertura e acionamento.',
            'cta_text' => 'Com isso ja orientamos a composicao ideal para o projeto.',
        ],
        'persiana-double-vision' => [
            'name' => 'Double Vision',
            'seo_title' => 'Persiana Double Vision',
            'seo_description' => 'Persiana Double Vision sob medida para regular luz e privacidade com efeito visual marcante. Solicite orientacao especializada.',
            'seo_image' => 'persiana-double-vision.jpg',
            'topbar_text' => 'Double Vision para luz ajustavel, privacidade e visual contemporaneo',
            'topbar_label' => 'Pedir orcamento da Double Vision',
            'whatsapp_message' => 'Ola, quero um orcamento para persiana Double Vision.',
            'hero_kicker' => 'Controle visual refinado',
            'hero_title' => 'Persiana Double Vision para ajustar luz e privacidade com efeito visual marcante.',
            'hero_text' => 'Ela e indicada para quem quer mais liberdade ao longo do dia e um desenho mais presente na decoracao, sem perder leveza.',
            'hero_image' => 'persiana-double-vision.jpg',
            'hero_alt' => 'Persiana Double Vision em ambiente residencial',
            'pills' => ['Controle gradual', 'Visual moderno', 'Salas', 'Suites'],
            'benefits_kicker' => 'O que ela entrega',
            'benefits_title' => 'O ponto forte da Double Vision e o controle visual da luz.',
            'benefits' => [
                ['title' => 'Ajuste gradual', 'text' => 'As faixas alternadas ajudam a regular claridade e privacidade com mais liberdade ao longo do dia.'],
                ['title' => 'Resultado marcante', 'text' => 'E uma linha que aparece mais na decoracao e transmite modernidade de forma imediata.'],
                ['title' => 'Uso intuitivo', 'text' => 'O ajuste entre faixas e facil de perceber, o que ajuda o cliente a entender o beneficio rapidamente.'],
            ],
            'contexts_kicker' => 'Onde ela faz mais sentido',
            'contexts_title' => 'Onde a Double Vision costuma entregar melhor resultado.',
            'contexts' => [
                ['title' => 'Salas integradas', 'text' => 'Cria um resultado decorativo mais interessante e ajuda a controlar incidencia de luz sem pesar no ambiente.'],
                ['title' => 'Suites e dormitorios', 'text' => 'Funciona bem quando o cliente quer privacidade com luz filtrada e visual mais elegante.'],
                ['title' => 'Apartamentos contemporaneos', 'text' => 'Combina especialmente com projetos de linguagem limpa e janelas amplas em areas sociais.'],
            ],
            'related_kicker' => 'Compare outras linhas',
            'related_title' => 'Se voce quiser comparar com outras logicas de uso, comece por estas.',
            'related' => [
                ['title' => 'Rolo', 'text' => 'Mais versatil para tela solar e blackout, com desenho mais discreto e uso muito amplo.', 'slug' => 'persiana-rolo'],
                ['title' => 'Silhouette', 'text' => 'Mais premium, com luz mais suave e percepcao de acabamento superior.', 'slug' => 'persiana-silhouette'],
                ['title' => 'Voltar para a visao geral', 'text' => 'Veja como cada linha se encaixa em sala, quarto, escritorio e projetos especiais.', 'slug' => 'persianas-sob-medida'],
            ],
            'cta_kicker' => 'Proximo passo',
            'cta_title' => 'Mande uma foto do vao e o efeito desejado para validar se a Double Vision e a melhor escolha.',
            'cta_text' => 'Com imagem, medida aproximada e objetivo de uso, ja orientamos a especificacao.',
        ],
        'persiana-silhouette' => [
            'name' => 'Silhouette',
            'seo_title' => 'Persiana Silhouette',
            'seo_description' => 'Persiana Silhouette sob medida para projetos premium com luz suave, privacidade e acabamento sofisticado. Solicite orientacao especializada.',
            'seo_image' => 'persianas-silhouette.jpg',
            'topbar_text' => 'Silhouette para projetos premium com luz suave e acabamento sofisticado',
            'topbar_label' => 'Pedir orcamento da Silhouette',
            'whatsapp_message' => 'Ola, quero um orcamento para persiana Silhouette.',
            'hero_kicker' => 'Linha de maior valor percebido',
            'hero_title' => 'Persiana Silhouette para projetos em que conforto visual e acabamento precisam aparecer.',
            'hero_text' => 'E a linha indicada quando o ambiente pede luz suave, privacidade com leveza e percepcao premium ja no primeiro olhar.',
            'hero_image' => 'persianas-silhouette.jpg',
            'hero_alt' => 'Persiana Silhouette em ambiente premium',
            'pills' => ['Premium', 'Luz suave', 'Privacidade', 'Design'],
            'benefits_kicker' => 'O que faz dela uma linha premium',
            'benefits_title' => 'O diferencial da Silhouette esta na forma como ela valoriza o ambiente.',
            'benefits' => [
                ['title' => 'Luz mais suave', 'text' => 'O tratamento da claridade deixa o ambiente mais elegante e confortavel, sem agressividade visual.'],
                ['title' => 'Privacidade com leveza', 'text' => 'Ajuda a proteger o ambiente sem fechar demais a composicao e sem pesar no resultado final.'],
                ['title' => 'Acabamento sofisticado', 'text' => 'E a linha certa para quando a apresentacao do produto precisa comunicar padrao superior.'],
            ],
            'contexts_kicker' => 'Onde ela faz mais sentido',
            'contexts_title' => 'Onde a Silhouette mostra melhor o seu valor.',
            'contexts' => [
                ['title' => 'Salas sofisticadas', 'text' => 'Ajuda a valorizar a decoracao com uma leitura mais leve e refinada da entrada de luz.'],
                ['title' => 'Suites premium', 'text' => 'Combina bem com projetos de descanso que pedem elegancia, conforto visual e discricao.'],
                ['title' => 'Ambientes corporativos de alto padrao', 'text' => 'Faz sentido em espacos em que o acabamento tambem compoe a imagem da marca ou do escritorio.'],
            ],
            'related_kicker' => 'Compare outras linhas',
            'related_title' => 'Se a prioridade for outra, compare com estas linhas.',
            'related' => [
                ['title' => 'Rolo', 'text' => 'Mais objetiva, versatil e direta para tela solar, blackout e projetos de decisao rapida.', 'slug' => 'persiana-rolo'],
                ['title' => 'Double Vision', 'text' => 'Melhor para quem quer controle gradual da luz com visual moderno e mais presenca decorativa.', 'slug' => 'persiana-double-vision'],
                ['title' => 'Voltar para a visao geral', 'text' => 'Compare todas as linhas e veja qual faz mais sentido para cada tipo de ambiente.', 'slug' => 'persianas-sob-medida'],
            ],
            'cta_kicker' => 'Proximo passo',
            'cta_title' => 'Se o objetivo e um resultado mais sofisticado, envie o ambiente para validar a melhor composicao.',
            'cta_text' => 'Com foto, medida aproximada e horario de maior incidencia de luz, ja orientamos a especificacao.',
        ],
    ];

    return $models[$slug] ?? null;
}

function americadecor_get_navigation_items(): array
{
    return [
        [
            'label' => 'Home',
            'url' => americadecor_page_url(),
            'current' => is_front_page(),
        ],
        [
            'label' => 'Manutencao',
            'url' => americadecor_page_url('manutencao/'),
            'current' => americadecor_is_current('manutencao'),
        ],
        [
            'label' => 'Automacao',
            'url' => americadecor_page_url('automacao/'),
            'current' => americadecor_is_current('automacao'),
        ],
        [
            'label' => 'Persianas',
            'url' => americadecor_page_url('persianas-sob-medida/'),
            'current' => americadecor_is_current('persianas-sob-medida') || americadecor_get_blind_model_page() !== null,
        ],
        [
            'label' => 'Projetos',
            'url' => americadecor_page_url('projetos/'),
            'current' => americadecor_is_current('projetos'),
        ],
        [
            'label' => 'Sobre',
            'url' => americadecor_page_url('sobre/'),
            'current' => americadecor_is_current('sobre'),
        ],
        [
            'label' => 'Contato',
            'url' => americadecor_page_url('contato/'),
            'current' => americadecor_is_current('contato'),
        ],
    ];
}

function americadecor_render_primary_nav(): void
{
    echo '<nav class="site-nav" id="menu-principal" aria-label="Principal">';

    if (has_nav_menu('primary')) {
        wp_nav_menu([
            'theme_location' => 'primary',
            'container' => false,
            'menu_class' => 'site-nav-list',
            'fallback_cb' => false,
        ]);
    } else {
        foreach (americadecor_get_navigation_items() as $item) {
            $current = $item['current'] ? ' aria-current="page"' : '';
            echo '<a href="' . esc_url($item['url']) . '"' . $current . '>' . esc_html($item['label']) . '</a>';
        }
    }

    echo '</nav>';
}

function americadecor_get_topbar_data(): array
{
    $company_name = americadecor_get_setting('company_name');

    $model = americadecor_get_blind_model_page();
    if ($model) {
        return [
            'text' => $model['topbar_text'],
            'label' => $model['topbar_label'],
            'url' => americadecor_whatsapp_url($model['whatsapp_message']),
        ];
    }

    if (is_front_page()) {
        return [
            'text' => 'Atendimento em Sao Paulo | Manutencao, motorizacao e projetos sob medida',
            'label' => 'Avaliar persiana no WhatsApp',
            'url' => americadecor_whatsapp_url('Ola, quero avaliar uma persiana com defeito e entender a melhor solucao.'),
        ];
    }

    if (is_page('persianas-sob-medida')) {
        return [
            'text' => 'Persianas sob medida para residencias, empresas e projetos especiais',
            'label' => 'Falar com especialista',
            'url' => americadecor_whatsapp_url('Ola, quero avaliar persianas sob medida.'),
        ];
    }

    if (is_page('automacao')) {
        return [
            'text' => 'Motorizacao de persianas com mais conforto, praticidade e integracao inteligente',
            'label' => 'Quero automatizar',
            'url' => americadecor_whatsapp_url('Ola, quero avaliar automacao para persianas.'),
        ];
    }

    if (is_page('manutencao')) {
        return [
            'text' => 'Manutencao, higienizacao e reparo para recuperar o desempenho das persianas',
            'label' => 'Pedir avaliacao',
            'url' => americadecor_whatsapp_url('Ola, preciso de manutencao ou reparo em persianas.'),
        ];
    }

    if (is_page('projetos')) {
        return [
            'text' => 'Projetos reais para inspirar salas, quartos, varandas e ambientes corporativos',
            'label' => 'Quero um projeto parecido',
            'url' => americadecor_whatsapp_url('Ola, vi os projetos e quero um projeto parecido para o meu ambiente.'),
        ];
    }

    if (is_page('sobre')) {
        return [
            'text' => '35+ anos em persianas, instalacao, manutencao e projetos sob medida',
            'label' => 'Falar com a America Decor',
            'url' => americadecor_whatsapp_url('Ola, quero falar com a ' . $company_name . ' sobre meu ambiente.'),
        ];
    }

    if (is_page('contato')) {
        return [
            'text' => 'Contato simplificado para orcamento, automacao, manutencao e projetos',
            'label' => 'WhatsApp direto',
            'url' => americadecor_whatsapp_url('Ola, quero um orcamento com a ' . $company_name . '.'),
        ];
    }

    return [
        'text' => $company_name . ' | Persianas sob medida, automacao e manutencao',
        'label' => 'Falar no WhatsApp',
        'url' => americadecor_whatsapp_url('Ola, quero falar com a ' . $company_name . '.'),
    ];
}

function americadecor_get_mobile_cta(): array
{
    $company_name = americadecor_get_setting('company_name');

    if (is_front_page()) {
        return [
            'label' => 'Avaliar persiana',
            'url' => americadecor_whatsapp_url('Ola, quero avaliar uma persiana com defeito e entender a melhor solucao.'),
        ];
    }

    $model = americadecor_get_blind_model_page();
    if ($model) {
        return [
            'label' => 'WhatsApp',
            'url' => americadecor_whatsapp_url($model['whatsapp_message']),
        ];
    }

    if (is_page('persianas-sob-medida')) {
        return [
            'label' => 'Pedir projeto',
            'url' => americadecor_whatsapp_url('Ola, quero avaliar persianas sob medida.'),
        ];
    }

    if (is_page('automacao')) {
        return [
            'label' => 'Automatizar',
            'url' => americadecor_whatsapp_url('Ola, quero avaliar automacao para persianas.'),
        ];
    }

    if (is_page('manutencao')) {
        return [
            'label' => 'Avaliar defeito',
            'url' => americadecor_whatsapp_url('Ola, preciso de manutencao ou reparo em persianas.'),
        ];
    }

    if (is_page('projetos')) {
        return [
            'label' => 'Quero parecido',
            'url' => americadecor_whatsapp_url('Ola, vi os projetos e quero um projeto parecido para o meu ambiente.'),
        ];
    }

    if (is_page('sobre')) {
        return [
            'label' => 'Falar no WhatsApp',
            'url' => americadecor_whatsapp_url('Ola, quero falar com a ' . $company_name . '.'),
        ];
    }

    if (is_page('contato')) {
        return [
            'label' => 'Pedir orcamento',
            'url' => americadecor_whatsapp_url('Ola, quero um orcamento com a ' . $company_name . '.'),
        ];
    }

    return [
        'label' => 'WhatsApp',
        'url' => americadecor_whatsapp_url('Ola, quero um orcamento para persianas.'),
    ];
}

function americadecor_get_seo_data(): array
{
    $company_name = americadecor_get_setting('company_name');

    $default = [
        'title' => $company_name,
        'description' => 'Persianas sob medida, automacao, instalacao e manutencao com foco em atendimento premium.',
        'url' => home_url(add_query_arg([], $GLOBALS['wp']->request ?? '')),
        'image' => americadecor_image_uri('home-hero-sala-premium.jpg'),
        'json_ld' => null,
    ];

    if (is_front_page()) {
        return [
            'title' => $company_name . ' | Manutencao, Motorizacao e Persianas Sob Medida',
            'description' => 'Manutencao de persianas, motorizacao e projetos sob medida em Sao Paulo. Avalie sua persiana pelo WhatsApp e descubra se vale reparar, automatizar ou renovar.',
            'url' => americadecor_page_url(),
            'image' => americadecor_image_uri('home-hero-sala-premium.jpg'),
            'json_ld' => [
                '@context' => 'https://schema.org',
                '@graph' => [
                    [
                        '@type' => 'WebSite',
                        'name' => americadecor_get_setting('company_name'),
                        'url' => americadecor_page_url(),
                    ],
                    [
                        '@type' => 'LocalBusiness',
                        'name' => americadecor_get_setting('company_name'),
                        'url' => americadecor_page_url(),
                        'telephone' => '+'. americadecor_get_setting('whatsapp_number'),
                        'email' => americadecor_get_setting('email'),
                        'description' => 'Manutencao de persianas, motorizacao e projetos sob medida em Sao Paulo, com atendimento consultivo e instalacao profissional.',
                        'address' => [
                            '@type' => 'PostalAddress',
                            'streetAddress' => americadecor_get_setting('address_line'),
                            'addressLocality' => 'Sao Paulo',
                            'addressRegion' => 'SP',
                            'postalCode' => '04535-001',
                            'addressCountry' => 'BR',
                        ],
                        'areaServed' => 'Sao Paulo',
                    ],
                ],
            ],
        ];
    }

    $model = americadecor_get_blind_model_page();
    if ($model) {
        $current_slug = (string) get_post_field('post_name', get_queried_object_id());
        return [
            'title' => $model['seo_title'] . ' | ' . $company_name,
            'description' => $model['seo_description'],
            'url' => americadecor_page_url($current_slug . '/'),
            'image' => americadecor_image_uri($model['seo_image']),
            'json_ld' => [
                '@context' => 'https://schema.org',
                '@type' => 'Service',
                'serviceType' => $model['seo_title'] . ' sob medida',
                'provider' => [
                    '@type' => 'LocalBusiness',
                    'name' => americadecor_get_setting('company_name'),
                    'url' => americadecor_page_url(),
                ],
                'areaServed' => 'Sao Paulo',
                'url' => americadecor_page_url($current_slug . '/'),
                'description' => $model['seo_description'],
            ],
        ];
    }

    if (is_page('persianas-sob-medida')) {
        return [
            'title' => 'Persianas Sob Medida | ' . $company_name,
            'description' => 'Escolha persianas sob medida por ambiente, controle de luz, privacidade e estetica. Atendimento consultivo e instalacao premium com a ' . $company_name . '.',
            'url' => americadecor_page_url('persianas-sob-medida/'),
            'image' => americadecor_image_uri('escritorio-persiana-rolo.jpg'),
            'json_ld' => [
                '@context' => 'https://schema.org',
                '@type' => 'Service',
                'serviceType' => 'Persianas sob medida',
                'provider' => [
                    '@type' => 'LocalBusiness',
                    'name' => americadecor_get_setting('company_name'),
                    'url' => americadecor_page_url(),
                ],
                'areaServed' => 'Sao Paulo',
                'url' => americadecor_page_url('persianas-sob-medida/'),
                'description' => 'Consultoria, especificacao e instalacao de persianas sob medida para residencias e empresas.',
            ],
        ];
    }

    if (is_page('automacao')) {
        return [
            'title' => 'Automacao e Motorizacao | ' . $company_name,
            'description' => 'Automacao e motorizacao de persianas com integracao para controle remoto, smartphone, Alexa e Google Home. Projeto consultivo com a ' . $company_name . '.',
            'url' => americadecor_page_url('automacao/'),
            'image' => americadecor_image_uri('automacao-persiana-motorizada-poster.jpg'),
            'json_ld' => [
                '@context' => 'https://schema.org',
                '@type' => 'Service',
                'serviceType' => 'Automacao e motorizacao de persianas',
                'provider' => [
                    '@type' => 'LocalBusiness',
                    'name' => americadecor_get_setting('company_name'),
                    'url' => americadecor_page_url(),
                ],
                'areaServed' => 'Sao Paulo',
                'url' => americadecor_page_url('automacao/'),
                'description' => 'Automacao de persianas com integracao para controle remoto, aplicativo, Alexa e Google Home.',
            ],
        ];
    }

    if (is_page('manutencao')) {
        return [
            'title' => 'Manutencao, Reparo e Higienizacao | ' . $company_name,
            'description' => 'Servicos de manutencao, reparo, reforma e higienizacao de persianas com atendimento profissional e facil acionamento via WhatsApp.',
            'url' => americadecor_page_url('manutencao/'),
            'image' => americadecor_image_uri('manutencao-tecnica-remaster.jpg'),
            'json_ld' => [
                '@context' => 'https://schema.org',
                '@type' => 'Service',
                'serviceType' => 'Manutencao, reparo e higienizacao de persianas',
                'provider' => [
                    '@type' => 'LocalBusiness',
                    'name' => americadecor_get_setting('company_name'),
                    'url' => americadecor_page_url(),
                ],
                'areaServed' => 'Sao Paulo',
                'url' => americadecor_page_url('manutencao/'),
                'description' => 'Servicos de manutencao, reparo, reforma e higienizacao de persianas e sistemas de acionamento.',
            ],
        ];
    }

    if (is_page('projetos')) {
        return [
            'title' => 'Projetos e Referencias | ' . $company_name,
            'description' => 'Veja referencias de aplicacao para persianas sob medida, automacao e solucoes premium da ' . $company_name . ' em ambientes residenciais e corporativos.',
            'url' => americadecor_page_url('projetos/'),
            'image' => americadecor_image_uri('suite-horizontal-motorizada.jpg'),
            'json_ld' => null,
        ];
    }

    if (is_page('sobre')) {
        return [
            'title' => 'Sobre a ' . $company_name,
            'description' => 'Conheca a ' . $company_name . ', especializada em persianas sob medida, automacao e manutencao com atendimento consultivo em Sao Paulo.',
            'url' => americadecor_page_url('sobre/'),
            'image' => americadecor_image_uri('instalacao-porta-balcao.jpg'),
            'json_ld' => null,
        ];
    }

    if (is_page('contato')) {
        return [
            'title' => 'Contato e Orcamento | ' . $company_name,
            'description' => 'Entre em contato com a ' . $company_name . ' para orcamento de persianas sob medida, automacao, instalacao, manutencao e projetos especiais.',
            'url' => americadecor_page_url('contato/'),
            'image' => americadecor_image_uri('fachada-america-decor.jpg'),
            'json_ld' => [
                '@context' => 'https://schema.org',
                '@type' => 'ContactPage',
                'name' => 'Contato ' . americadecor_get_setting('company_name'),
                'url' => americadecor_page_url('contato/'),
                'mainEntity' => [
                    '@type' => 'LocalBusiness',
                    'name' => americadecor_get_setting('company_name'),
                    'telephone' => '+'. americadecor_get_setting('whatsapp_number'),
                    'email' => americadecor_get_setting('email'),
                    'address' => [
                        '@type' => 'PostalAddress',
                        'streetAddress' => americadecor_get_setting('address_line'),
                        'addressLocality' => 'Sao Paulo',
                        'addressRegion' => 'SP',
                        'postalCode' => '04535-001',
                        'addressCountry' => 'BR',
                    ],
                ],
            ],
        ];
    }

    return $default;
}

function americadecor_output_meta(): void
{
    $seo = americadecor_get_seo_data();
    ?>
    <meta name="theme-color" content="#6b4424" />
    <link rel="canonical" href="<?php echo esc_url($seo['url']); ?>" />
    <meta name="description" content="<?php echo esc_attr($seo['description']); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="<?php echo esc_attr(americadecor_get_setting('company_name')); ?>" />
    <meta property="og:title" content="<?php echo esc_attr($seo['title']); ?>" />
    <meta property="og:description" content="<?php echo esc_attr($seo['description']); ?>" />
    <meta property="og:url" content="<?php echo esc_url($seo['url']); ?>" />
    <meta property="og:image" content="<?php echo esc_url($seo['image']); ?>" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo esc_attr($seo['title']); ?>" />
    <meta name="twitter:description" content="<?php echo esc_attr($seo['description']); ?>" />
    <meta name="twitter:image" content="<?php echo esc_url($seo['image']); ?>" />
    <link rel="icon" href="<?php echo esc_url(get_theme_file_uri('/assets/images/favicon.svg')); ?>" type="image/svg+xml" />
    <link rel="manifest" href="<?php echo esc_url(get_theme_file_uri('/site.webmanifest')); ?>" />
    <?php if ($seo['json_ld']) : ?>
        <script type="application/ld+json"><?php echo wp_json_encode($seo['json_ld'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?></script>
    <?php endif; ?>
    <?php
}
add_action('wp_head', 'americadecor_output_meta', 1);

function americadecor_filter_document_title(string $title): string
{
    $seo = americadecor_get_seo_data();
    return $seo['title'] ?: $title;
}
add_filter('pre_get_document_title', 'americadecor_filter_document_title');

function americadecor_map_page_templates(string $template): string
{
    $map = [
        'persianas-sob-medida' => '/page-templates/template-persianas.php',
        'persiana-rolo' => '/page-templates/template-modelo-persiana.php',
        'persiana-double-vision' => '/page-templates/template-modelo-persiana.php',
        'persiana-silhouette' => '/page-templates/template-modelo-persiana.php',
        'automacao' => '/page-templates/template-automacao.php',
        'manutencao' => '/page-templates/template-manutencao.php',
        'projetos' => '/page-templates/template-projetos.php',
        'sobre' => '/page-templates/template-sobre.php',
        'contato' => '/page-templates/template-contato.php',
    ];

    foreach ($map as $slug => $file) {
        if (is_page($slug)) {
            $path = get_theme_file_path($file);
            if (file_exists($path)) {
                return $path;
            }
        }
    }

    return $template;
}
add_filter('template_include', 'americadecor_map_page_templates', 20);
