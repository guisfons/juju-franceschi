<?php
get_header();

// Banner
loadModulesCssForTemplate('banner.min.css');
get_template_part('template-parts/banner');

// Sobre
get_template_part('template-parts/sobre');

// Boxes
get_template_part('template-parts/boxes');

// Eventos & Lives
get_template_part('template-parts/eventos-lives');

// Palestras
get_template_part('template-parts/palestras');

// Na mídia
get_template_part('template-parts/na-midia');

// Publicidade
get_template_part('template-parts/publicidade');

// Banner
get_template_part('template-parts/banner-final');

get_footer();
