<?php
$banner = get_field('banner');

if ($banner) {
    $logo_principal = $banner['logo_principal'];
    $frase = $banner['frase'];
    $logos = $banner['logos'];
}
?>
<section class="banner">
    <span class="banner__cursor">
        <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/img/cursor.webp" alt="Cursor vídeo">
        <svg width="62" height="71" viewBox="0 0 62 71" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.29492 6.60079V64.8489C2.29492 68.3655 5.68367 70.6034 8.49697 68.877L58.3052 39.0816C60.7348 37.611 60.7348 33.7747 58.3052 32.3041L8.49697 2.50873C5.68367 0.846322 2.29492 3.08417 2.29492 6.60079Z" stroke="white" stroke-width="3" stroke-miterlimit="10"/></svg>
    </span>

    <div class="banner__dinamic">
        <figure class="banner__logo"><img src="<?php echo $logo_principal; ?>" alt="Logo do banner"></figure>
        <cite class="banner__frase"><?php echo $frase; ?></cite>
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