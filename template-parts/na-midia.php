<section id="na-midia" class="na-midia">
    <h2 class="na-midia__title">Na mídia</h2>
<?php
if (have_rows('na_midia')) :
    echo '<div class="na-midia__container">';
    while (have_rows('na_midia')) : the_row();
        $imagem_de_fundo = get_sub_field('imagem_de_fundo');
        if ($imagem_de_fundo) {
            echo '<div class="na-midia__item" style="background-image: url(' . esc_url($imagem_de_fundo) . ');">';
        } else {
            echo '<div class="na-midia__item">';
        }

        $titulo = get_sub_field('titulo');
        if ($titulo) {
            echo '<span>' . esc_html($titulo) . '</span>';
        }

        $link = get_sub_field('link');
        if ($link) {
            echo '<a href="' . esc_url($link) . '" target="_blank">confira a matéria</a>';
        }
        echo '</div>';
    endwhile;
    echo '</div>';
endif;
?>
</section>