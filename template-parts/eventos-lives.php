<section id="eventos-lives" class="eventos-lives">
<?php
if (have_rows('eventos_&_lives')) :
    while (have_rows('eventos_&_lives')) : the_row();
        echo '<div class="eventos-lives__dados">';
        $titulo = get_sub_field('titulo');
        if ($titulo) {
            echo '<h2>' . esc_html($titulo) . '</h2>';
        }

        if (have_rows('dados')) :
            while (have_rows('dados')) : the_row();
                $dado = get_sub_field('dado');
                $descricao = get_sub_field('descricao');
        
                if (strpos($dado, 'anos') !== false || strpos($dado, '+') !== false) {
                    $partes = preg_split('/\s*(anos|\+)\s*/', $dado, -1, PREG_SPLIT_DELIM_CAPTURE);
        
                    echo '<article>';
                    foreach ($partes as $parte) {
                        if (!empty($parte)) {
                            $parteLimpa = trim($parte);
                            if (is_numeric($parteLimpa)) {
                                echo '<span data-number="' . $parteLimpa . '">'.$parteLimpa - 10 .' </span>';
                            } else {
                                echo '<span> ' . $parteLimpa . ' </span>';
                            }
                        }
                    }
                    echo '<p>' . $descricao . '</p>';
                    echo '</article>';
                } else {
                    echo '<article><span>' . $dado . '</span><p>' . $descricao . '</p></article>';
                }
            endwhile;
        endif;
        echo '</div>';

        echo '<div class="eventos-lives__texto-imagem">
            <div class="eventos-lives__texto">';
        $texto_1 = get_sub_field('texto_1');
        if ($texto_1) {
            echo '<article>' . $texto_1 . '</article>';
        }

        $texto_2 = get_sub_field('texto_2');
        if ($texto_2) {
            echo '<article>' . $texto_2 . '</article>';
        }
        echo '</div>';

        $imagem_destaque = get_sub_field('imagem_destaque');
        $video_destaque = get_sub_field('video_destaque');
        if ($imagem_destaque && !$video_destaque) {
            echo '<figure><img src="' . esc_url($imagem_destaque['url']) . '" alt="' . esc_attr($imagem_destaque['alt']) . '" /></figure>';
        } elseif($video_destaque) {
            echo '<figure><video muted loading="lazy" poster="' . esc_url($imagem_destaque['url']) . '">
                <source src="' . esc_url($video_destaque) . '" type="video/mp4">
              </video></figure>';
        }

        echo '</div>';

        $videos = get_sub_field('videos');
        if ($videos) {
            echo '<div class="eventos-lives__lives"><div class="eventos-lives__container">';
            foreach ($videos as $video) {
                if (strpos($video['url'], 'mp4') !== false) {
                    echo '<figure><video loading="lazy"><source src="' . esc_url($video['url']) . '" type="video/mp4"></video></figure>';
                } else {
                    echo '<figure><img src="' . esc_url($video['url']) . '" alt="" /></figure>';
                }
            }
            echo '</div></div>';
        }

        echo '<div class="wrapper-full eventos-lives__especialista">';
        $imagem_destaque_2 = get_sub_field('imagem_destaque_2');
        if ($imagem_destaque_2) {
            echo '<figure><img src="' . esc_url($imagem_destaque_2) . '" alt="" /></figure>';
        }

        $texto_destaque = get_sub_field('texto_destaque');
        if ($texto_destaque) {
            echo '<article>' . $texto_destaque . '</article>';
        }
        echo '</div>';

        echo '<div class="eventos-lives__texto-carrosel">';
        $texto_carrosel = get_sub_field('texto_carrosel');
        if ($texto_carrosel) {
            echo '<article>' . $texto_carrosel . '</article>';
        }

        $imagens_carrosel = get_sub_field('imagens_carrosel');
        if ($imagens_carrosel) {
            echo '<div class="eventos-lives__carrosel">';
            foreach ($imagens_carrosel as $imagem) {
                if (strpos($imagem, 'mp4') !== false) {
                    echo '<figure><video loading="lazy"><source src="' . esc_url($imagem) . '" type="video/mp4"></video></figure>';
                } else {
                    echo '<figure><img src="' . esc_url($imagem) . '" alt="" /></figure>';
                }
            }
            echo '</div>';
        }
        echo '</div>';

        if (have_rows('depoimentos')) :
            echo '<div class="eventos-lives__testimonials"><div class="eventos-lives__testimonials-container">';
            while (have_rows('depoimentos')) : the_row();
                $depoimento_texto = get_sub_field('texto');
                $depoimento_autor = get_sub_field('autor');

                echo '<blockquote>';
                echo '<p>' . esc_html($depoimento_texto) . '</p>';
                echo '<cite>' . esc_html($depoimento_autor) . '</cite>';
                echo '</blockquote>';
            endwhile;
            echo '</div></div>';
        endif;

        // Get logos
        $logos = get_sub_field('logos');
        if ($logos) {
            echo '<div class="eventos-lives__logos"><div class="logos-container">';
            foreach ($logos as $logo) {
                echo '<figure><img src="' . esc_url($logo['url']) . '" alt="" /></figure>';
            }
            echo '</div></div>';
        }

    endwhile;
endif;
?>
</section>