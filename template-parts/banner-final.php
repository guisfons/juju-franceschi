<?php
$banner = get_field('banner_final');
$texto = get_field('chamada_final');

if ($banner) {
?>
<section class="banner-final" style="background-image: url(<?php echo $banner; ?>);">
    <article><?php echo $texto; ?></article>
</section>
<?php }?>