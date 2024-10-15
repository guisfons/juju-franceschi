<section id="palestras" class="palestras">
    <?php
    if (have_rows('palestras')):
        while (have_rows('palestras')): the_row();
            $titulo = get_sub_field('titulo');
            $texto = get_sub_field('texto');

            echo '<h2>' . $titulo . '</h2>';
            echo '<article>' . $texto . '</article>';
            echo '<span>Conheça os temas</span>';

            if (have_rows('temas')):
                echo '<div class="palestras__container">';
                while (have_rows('temas')) : the_row();
                    $tema = get_sub_field('tema');
                    $cor = get_sub_field('cor');
                    
                    echo
                    '<article class="palestras__tema" data-color="' . $cor . '" style="color: ' . $cor . '">
                        <svg viewBox="0 0 435 436" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M434 218C434 337.848 337.068 435 217.5 435C97.9325 435 1 337.848 1 218C1 98.152 97.9325 1 217.5 1C337.068 1 434 98.152 434 218Z" stroke="' . $cor . '" stroke-width="2"/></svg>
                        ' . $tema . '
                    </article>';
                endwhile;
                echo '</div>';
            endif;
        endwhile;
    endif;
    ?>
</section>

<?php
if (have_rows('palestras')):
    while (have_rows('palestras')): the_row();
        $projetos_sociais = get_sub_field('projetos_sociais');
        if ($projetos_sociais):
            echo '<section id="projetos-sociais" class="palestras-projetos">';
            echo '<span class="palestras-projetos__title">PROJETOS SOCIAIS</span>';
            echo '<div class="palestras-projetos__container">';
            foreach ($projetos_sociais as $projeto):
                echo '<div class="palestras-projetos__projeto">';
                echo '<figure><img src="'.$projeto['imagem'].'" alt="Foto do projeto '.$projeto['titulo'].'"></figure>';
                echo '<article><h4>' . $projeto['titulo'] . '</h4>' . $projeto['texto'];
                $link = $projeto['link'];
                if (!empty($link) && is_array($link)):
                    echo '<a href="' . esc_url($link['url']) . '" target="_blank">' . esc_html($link['title']) . '</a>';
                endif;
                echo '</article></div>';
            endforeach;
            echo '</div>';
            echo '<div class="palestras-projetos__nav">';
            echo '<button type="button" class="palestras-projetos__nav--prev"><svg width="20" height="35" viewBox="0 0 20 35" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.7171 0.0250319C17.9767 0.0250892 18.2304 0.102127 18.4462 0.246403C18.6621 0.390682 18.8302 0.595718 18.9295 0.835587C19.0288 1.07545 19.0547 1.33937 19.004 1.59396C18.9533 1.84856 18.8282 2.0824 18.6446 2.26591L3.3942 17.5163L18.6446 32.7667C18.8837 33.0142 19.016 33.3457 19.013 33.6899C19.01 34.034 18.8719 34.3632 18.6286 34.6065C18.3852 34.8499 18.056 34.9879 17.7119 34.9909C17.3678 34.9939 17.0362 34.8616 16.7887 34.6225L0.609954 18.4438C0.363899 18.1977 0.225671 17.8639 0.225671 17.5158C0.225671 17.1678 0.363899 16.834 0.609955 16.5879L16.7887 0.409157C16.9106 0.2873 17.0554 0.190655 17.2147 0.124744C17.374 0.0588377 17.5447 0.0249556 17.7171 0.0250319Z" fill="white"/></svg></button>';
            echo '<button type="button" class="palestras-projetos__nav--next"><svg width="20" height="35" viewBox="0 0 20 35" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.28292 34.975C2.02332 34.9749 1.76957 34.8979 1.55375 34.7536C1.33794 34.6093 1.16976 34.4043 1.07048 34.1644C0.971197 33.9245 0.945278 33.6606 0.995998 33.406C1.04672 33.1514 1.1718 32.9176 1.35542 32.7341L16.6058 17.4837L1.35542 2.23334C1.11634 1.9858 0.984048 1.65426 0.987038 1.31013C0.990029 0.965995 1.12806 0.636804 1.37141 0.393456C1.61476 0.150108 1.94395 0.0120732 2.28808 0.00908282C2.63222 0.00609239 2.96376 0.138385 3.2113 0.377467L19.39 16.5562C19.6361 16.8023 19.7743 17.1361 19.7743 17.4842C19.7743 17.8322 19.6361 18.166 19.39 18.4121L3.2113 34.5908C3.08936 34.7127 2.94461 34.8093 2.78532 34.8753C2.62603 34.9412 2.45531 34.975 2.28292 34.975Z" fill="white"/></svg></button>';
            echo '</div>';
            echo '</section>';
        endif;
    endwhile;
endif;
?>