<?php
$banner = get_field('banner');

if ($banner) {
    $logo_principal = $banner['logo_principal'];
    $frase = $banner['frase'];
    $logos = $banner['logos'];
}
?>
<section class="banner">
    <div class="banner__dinamic">
        <figure class="banner__logo"><img src="<?php echo $logo_principal; ?>" alt="Logo do banner"></figure>
        <!-- <cite class="banner__frase"><?php echo $frase; ?></cite> -->
        <div class="banner__dados">
        <?php
        if (have_rows('eventos_&_lives')) : 
            while (have_rows('eventos_&_lives')) : the_row();
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
            endwhile;
        endif;
        ?>
        </div>
        <div class="banner__logos">
            <?php
            if( $logos ):
                $x = 1;
                foreach( $logos as $logo ):
                    echo '<figure><img src="'.$logo.'" alt="Logo '.$x.'"></figure>';
                    $x++;
                endforeach;
            endif;
            ?>
        </div>
    </div>
    <?php get_template_part('template-parts/banner-video'); ?>
</section>