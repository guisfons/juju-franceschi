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