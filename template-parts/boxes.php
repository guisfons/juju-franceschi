<section class="boxes">
    <?php
    if ( have_rows('boxes') ) :
        while( have_rows('boxes') ) : the_row();
            $imagem = get_sub_field('imagem_de_fundo');
            $titulo = get_sub_field('titulo');

            echo '<figure class="boxes__card"><img src="'.esc_url($imagem).'" alt="'.$titulo.'"><span>'.$titulo.'</span></figure>';
        endwhile;
    endif; ?>
</section>