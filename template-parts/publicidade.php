<section class="publicidade">
<?php
if (have_rows('publicidade')) :
    while (have_rows('publicidade')) : the_row();

        echo '<div class="publicidade__content">';
        $imagens = get_sub_field('imagens');
        if ($imagens) {
            echo '<div class="publicidade__galeria">';
            // foreach ($imagens as $imagem) {
            //     echo '<figure><img src="' . esc_url($imagem) . '" alt="" /></figure>';
            // }
            echo '<figure><img src="'.esc_url(get_template_directory_uri()).'/assets/img/images.webp" alt=""></figure>';
            echo '</div>';
        }

        $titulo = get_sub_field('titulo');
        if ($titulo) {
            $titulo = '<h3>' . esc_html($titulo) . '</h3>';
        }

        $texto = get_sub_field('texto');
        if ($texto) {
            echo '<article class="publicidade__texto">'. $titulo . wp_kses_post($texto) . '</article>';
        }
        echo '</div>';

        echo '<div class="publicidade__container">';
        $titulo_2 = get_sub_field('titulo_2');
        if ($titulo_2) {
            $titulo_2 = str_replace('  ', '<br>', $titulo_2);
            echo '<span>' . $titulo_2 . '</span>';
        }

        if (have_rows('marcas')) {
            echo '<div class="publicidade__marcas">';
            while (have_rows('marcas')) : the_row();
                $marca_titulo = get_sub_field('titulo');
                $marca_link = get_sub_field('link');
                if ($marca_titulo) {
                    echo '<div class="publicidade__marca"><svg width="227" height="231" viewBox="0 0 227 231" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="1" y="1" width="225" height="229" rx="112.5" stroke="#C07858" stroke-width="2"/></svg>';
                    echo '<span>' . esc_html($marca_titulo) . '</span>';
                    if ($marca_link) {
                        echo '<a href="' . esc_url($marca_link) . '" target="_blank">Visite</a>';
                    }
                    echo '</div>';
                }
            endwhile;
            echo '</div>';
        }
        echo '</div>';

        $marcas_embaixadas = get_sub_field('marcas_embaixadas');
        if ($marcas_embaixadas) {
            echo '<div class="publicidade__marcas-embaixadas"><div class="logos-container">';
            foreach ($marcas_embaixadas as $marca_embaixada) {
                echo '<figure><img src="' . esc_url($marca_embaixada) . '" alt="" /></figure>';
            }
            echo '</div></div>';
        }

    endwhile;
endif;
?>
</section>