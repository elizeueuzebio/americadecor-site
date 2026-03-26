# América Decor - Base de Implantação

## Estrutura
- `index.html`: home comercial principal
- `persianas-sob-medida.html`: linha de produto principal
- `automacao.html`: automação e motorização
- `manutencao.html`: manutenção, reparo e higienização
- `projetos.html`: referências e aplicações
- `sobre.html`: institucional
- `contato.html`: orçamento e contato
- `404.html`: página de erro
- `styles.css`: base visual compartilhada
- `script.js`: menu mobile, reveal leve e formulários para WhatsApp
- `site.webmanifest`, `robots.txt`, `sitemap.xml`: utilitários de publicação

## Observações para publicar
- Atualizar URLs canônicas e Open Graph se a estrutura final de rotas mudar.
- Se o site entrar em WordPress, cada arquivo HTML pode virar um template/página.
- O número principal de WhatsApp está centralizado em `script.js` e nos links fixos das páginas.
- Se houver mais de um número comercial real, definir regra clara por serviço antes de duplicar CTAs.

## Itens que ainda valem evoluir
- Converter imagens para WebP ou AVIF.
- Integrar formulário com CRM ou WhatsApp API oficial, se necessário.
- Adicionar analytics, eventos de conversão e pixels só depois de fechar a arquitetura final.
- Adaptar cabeçalho/rodapé para partials no stack real, evitando repetição manual.
