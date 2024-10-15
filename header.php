<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	<?php
		wp_head();

		global $current_user;
		wp_get_current_user();
	?>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!-- Assets -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/favicon/apple-touch-icon.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/favicon/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/favicon/favicon-16x16.png'); ?>">
    <link rel="manifest" href="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/favicon/site.webmanifest'); ?>">
    <link rel="mask-icon" href="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/favicon/safari-pinned-tab.svg'); ?>" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

	<title><?php echo get_bloginfo('name'); ?></title>
	<style>
		.aside__menu-item:hover,
		.aside__social a:hover path,
		.sobre h3,
		.eventos-lives__dados h2,
		.eventos-lives__especialista article h4,
		.palestras h2 {color: <?php echo get_field('cor_destaque_1', 'options'); ?>;}
		.eventos-lives__dados article span {color: <?php echo get_field('cor_destaque_2', 'options'); ?>;}
		.aside__button:hover svg .line {stroke: <?php echo get_field('cor_destaque_1', 'options'); ?>;}
		.gui-cursor {border-color: <?php echo get_field('cor_do_cursor', 'options'); ?>;}
		::-webkit-scrollbar-thumb{background-color: <?php echo get_field('cor_da_barra_de_rolagem', 'options'); ?>;}
	</style>
</head>
<body <?php body_class($post->post_name ?? ''); ?>>
	<div class="loader loader--active" data-color="<?php echo get_field('cor_do_logo_loader', 'options'); ?>"><svg width="38" height="43" viewBox="0 0 38 43" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.679688 21.84C0.679688 19.2 2.79969 17.04 5.39969 17.04C8.07969 17.04 10.1597 19.2 10.1597 21.84C10.1597 24.12 8.59969 25.96 6.43969 26.48C7.11969 26.76 7.83969 26.92 8.59969 26.92C11.5597 26.92 13.0397 24.36 13.0397 19.96V3.68C13.0397 2.72 12.5197 1.68 11.7597 1.12L11.3597 0.799999V0H21.3197V0.799999L20.9997 1.12C20.1997 1.68 19.6797 2.72 19.6797 3.68V17.92C19.6797 25.6 16.1197 29.4 10.4397 29.4C6.55969 29.4 3.39969 27.64 1.55969 24.64C0.999688 23.84 0.679688 22.88 0.679688 21.84Z" fill="<?php echo get_field('cor_do_logo_loader', 'options'); ?>" /><path d="M25.0397 41.88L25.4397 42.16V43H15.4797V42.16L15.8397 41.88C16.6397 41.28 17.1197 40.28 17.1197 39.32V17.68C17.1197 16.72 16.6397 15.68 15.8397 15.12L15.4797 14.8V14H36.9997L37.8397 20.6H36.9997L36.3997 19.76C34.9997 17.8 32.4797 16.48 30.0797 16.48H23.7597V28.08H28.7597C30.7197 28.08 32.1997 26.8 32.4397 24.84V24.76H33.2797V33.88H32.4397V33.8C32.1997 31.84 30.7197 30.56 28.7597 30.56H23.7597V39.32C23.7597 40.28 24.3197 41.28 25.0397 41.88Z" fill="<?php echo get_field('cor_do_logo_loader', 'options'); ?>" /></svg></div>
	<!-- <div class="gui-cursor"></div> -->
	<aside class="aside">
		<a href="/index.html" title="<?php echo get_the_title(); ?>" class="aside__logo">
			<h1>
				<?php echo get_the_title(); ?>
				<img width="355" height="142" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/logo.svg'); ?>" alt="<?php echo get_the_title(); ?>">
			</h1>
		</a>
		<button type="button" class="aside__button" title="Abrir/Fechar Menu">
			<svg width="100" height="100" viewBox="0 0 100 100">
				<path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
				<path class="line line2" d="M 20,50 H 80" />
				<path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
			</svg>
		</button>
		<div class="aside__menu">
			<span>Menu</span>
			<nav class="aside__menu-items">
				<?php
				$header_menu = wp_get_nav_menu_items('Menu');
				if(is_array($header_menu)){
					foreach($header_menu as $key => $menu_item){
						echo '<a title="'. str_replace('*', '', $menu_item->title) .'" href="'.$menu_item->url.'" class="aside__menu-item '. $menu_item->classes[0] . (get_the_ID() == $menu_item->object_id ? ' aside__menu-item--active' : '') .'" target="'.$menu_item->target.'">';
							$menu_title = $menu_item->title;
							if (strpos($menu_item->title, '*') !== false) {
								$menu_title = str_replace('*', '', removerAcentos($menu_item->title));
							}
							echo removerAcentos($menu_title);
						echo '</a>';
					}
				}
				?>
			</nav>
		</div>
		<div class="aside__social">
			<a href="" target="_blank" title="Instagram"><svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.9265 6.24707C9.46967 6.24707 6.60547 9.06189 6.60547 12.5681C6.60547 16.0742 9.42028 18.889 12.9265 18.889C16.4326 18.889 19.2474 16.0248 19.2474 12.5681C19.2474 9.11127 16.3832 6.24707 12.9265 6.24707ZM12.9265 16.6174C10.7042 16.6174 8.87707 14.7903 8.87707 12.5681C8.87707 10.3458 10.7042 8.51867 12.9265 8.51867C15.1487 8.51867 16.9758 10.3458 16.9758 12.5681C16.9758 14.7903 15.1487 16.6174 12.9265 16.6174Z" fill="white"/><path d="M19.4946 7.53119C20.2855 7.53119 20.9267 6.89002 20.9267 6.09909C20.9267 5.30816 20.2855 4.66699 19.4946 4.66699C18.7037 4.66699 18.0625 5.30816 18.0625 6.09909C18.0625 6.89002 18.7037 7.53119 19.4946 7.53119Z" fill="white"/><path d="M23.1982 2.3953C21.9143 1.06196 20.0871 0.370605 18.013 0.370605H7.84018C3.54389 0.370605 0.679688 3.2348 0.679688 7.5311V17.6546C0.679688 19.778 1.37105 21.6052 2.75376 22.9385C4.08709 24.2225 5.86487 24.8644 7.88956 24.8644H17.9636C20.0871 24.8644 21.8649 24.1731 23.1488 22.9385C24.4822 21.6546 25.1735 19.8274 25.1735 17.7039V7.5311C25.1735 5.45702 24.4822 3.67925 23.1982 2.3953ZM23.0007 17.7039C23.0007 19.2348 22.4575 20.4694 21.5686 21.3089C20.6797 22.1484 19.4451 22.5928 17.9636 22.5928H7.88956C6.40808 22.5928 5.17351 22.1484 4.28463 21.3089C3.39574 20.42 2.95129 19.1854 2.95129 17.6546V7.5311C2.95129 6.04962 3.39574 4.81505 4.28463 3.92616C5.12413 3.08665 6.40808 2.64221 7.88956 2.64221H18.0624C19.5439 2.64221 20.7785 3.08665 21.6673 3.97554C22.5068 4.86443 23.0007 6.099 23.0007 7.5311V17.7039Z" fill="white"/></svg></a>
			<a href="" target="_blank" title="Tiktok"><svg width="20" height="23" viewBox="0 0 20 23" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.8821 0H14.5889C14.6287 0.161907 14.6597 0.325868 14.6816 0.49115C14.7946 1.78026 15.3843 2.98088 16.3354 3.85833C17.2866 4.73577 18.5308 5.22695 19.8248 5.23584V8.7295C19.6514 8.78586 19.4694 8.81096 19.2873 8.80363C18.4251 8.7084 17.5704 8.55358 16.7296 8.34028C16.0039 8.06101 15.298 7.73283 14.6167 7.35798V7.82133C14.6167 9.67473 14.6167 11.5837 14.6167 13.4649C14.626 14.2306 14.5764 14.9958 14.4685 15.7539C14.3059 17.0192 13.822 18.2218 13.0628 19.2471C12.3036 20.2723 11.2944 21.086 10.1315 21.6106C9.44813 21.8619 8.74839 22.0663 8.03717 22.2222H6.74906C6.69509 22.1966 6.63935 22.1749 6.58226 22.1574C5.2767 21.9913 4.05031 21.4397 3.05987 20.5731C2.06943 19.7065 1.35992 18.5642 1.02207 17.2922C0.866517 16.7386 0.748863 16.1751 0.669922 15.6056V14.5214C0.771859 14.0117 0.845995 13.502 0.994267 13.0016C1.41192 11.6653 2.21883 10.4841 3.31173 9.60914C4.40462 8.73417 5.73376 8.20525 7.12901 8.09007C7.54602 8.02521 7.96304 8.00667 8.40785 7.9696C8.40785 9.17431 8.40785 10.2863 8.40785 11.4077C8.40785 11.6764 8.26885 11.7135 8.04644 11.7783C7.33593 11.9412 6.63888 12.1581 5.96137 12.427C5.43956 12.6236 4.99124 12.9767 4.67773 13.4378C4.36422 13.899 4.20083 14.4457 4.20991 15.0032C4.17061 15.6355 4.31839 16.2653 4.63482 16.8141C4.95124 17.3629 5.42229 17.8064 5.98917 18.0891C6.50755 18.4097 7.10966 18.5685 7.7187 18.5454C8.32774 18.5223 8.91609 18.3183 9.40869 17.9594C9.77752 17.6953 10.0869 17.3568 10.3167 16.9657C10.5466 16.5747 10.6918 16.1397 10.7431 15.689C10.8539 14.7667 10.9004 13.8377 10.8821 12.9089C10.8821 8.79437 10.8821 4.67674 10.8821 0.556019C10.9099 0.361413 10.8914 0.18534 10.8821 0Z" fill="white"/></svg></a>
			<a href="" target="_blank" title="LinkedIn"><svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.09635 2.83352C5.09605 3.45236 4.84992 4.04573 4.41211 4.4831C3.97431 4.92046 3.38069 5.166 2.76185 5.16569C2.14302 5.16538 1.54965 4.91925 1.11228 4.48145C0.674914 4.04364 0.429378 3.45003 0.429688 2.83119C0.429997 2.21235 0.676126 1.61898 1.11393 1.18162C1.55173 0.74425 2.14535 0.498714 2.76419 0.499024C3.38303 0.499333 3.9764 0.745462 4.41376 1.18327C4.85113 1.62107 5.09666 2.21469 5.09635 2.83352ZM5.16635 6.89352H0.499688V21.5002H5.16635V6.89352ZM12.5397 6.89352H7.89635V21.5002H12.493V13.8352C12.493 9.56519 18.058 9.16852 18.058 13.8352V21.5002H22.6664V12.2485C22.6664 5.05019 14.4297 5.31852 12.493 8.85352L12.5397 6.89352Z" fill="white"/></svg></a>
			<a href="" target="_blank" title="YouTube"><svg width="28" height="21" viewBox="0 0 28 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22.4319 0H5.56804C2.49776 0 0 2.50561 0 5.58539V14.9861C0 18.0658 2.49776 20.5714 5.56804 20.5714H22.4319C25.5022 20.5714 28 18.0658 28 14.9861V5.58539C28 2.50561 25.5022 0 22.4319 0ZM26.8571 14.9861C26.8571 17.4356 24.8719 19.4286 22.4319 19.4286H5.56804C3.12804 19.4286 1.14286 17.4356 1.14286 14.9861V5.58539C1.14286 3.1359 3.12804 1.14286 5.56804 1.14286H22.4319C24.8719 1.14286 26.8571 3.1359 26.8571 5.58539V14.9861Z" fill="white"/><path d="M19.0625 10.0788L11.1454 5.44146C10.9696 5.33855 10.7503 5.33683 10.5725 5.43872C10.3948 5.54055 10.2852 5.72969 10.2852 5.93449V15.208C10.2852 15.4128 10.3948 15.6019 10.5722 15.7037C10.6604 15.7543 10.7586 15.7794 10.8566 15.7794C10.9565 15.7794 11.0561 15.7532 11.1454 15.701L19.0625 11.0648C19.2374 10.9624 19.3452 10.7746 19.3452 10.5718C19.3452 10.3689 19.2377 10.1812 19.0625 10.0788ZM11.428 14.211V6.93146L17.6429 10.5718L11.428 14.211Z" fill="white"/></svg></a>
		</div>
	</aside>
	<header class="header">
		<a href="/index.html" title="<?php echo get_the_title(); ?>" class="header__logo">
			<h1>
				<?php echo get_the_title(); ?>
				<img width="355" height="142" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/logo.svg'); ?>" alt="<?php echo get_the_title(); ?>">
			</h1>
		</a>
		<button type="button" class="header__button" title="Abrir/Fechar Menu">
			<svg width="100" height="100" viewBox="0 0 100 100">
				<path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
				<path class="line line2" d="M 20,50 H 80" />
				<path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
			</svg>
		</button>

		<div class="header__modal">
			<div class="header__menu">
				<span>Menu</span>
				<nav class="header__menu-items">
					<?php
					$header_menu = wp_get_nav_menu_items('Menu');
					if(is_array($header_menu)){
						foreach($header_menu as $key => $menu_item){
							echo '<a title="'. str_replace('*', '', $menu_item->title) .'" href="'.$menu_item->url.'" class="header__menu-item '. $menu_item->classes[0] . (get_the_ID() == $menu_item->object_id ? ' header__menu-item--active' : '') .'" target="'.$menu_item->target.'">';
								$menu_title = $menu_item->title;
								if (strpos($menu_item->title, '*') !== false) {
									$menu_title = str_replace('*', '', removerAcentos($menu_item->title));
								}
								echo removerAcentos($menu_title);
							echo '</a>';
						}
					}
					?>
				</nav>
			</div>
			<div class="header__social">
				<a href="" target="_blank" title="Instagram"><svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.9265 6.24707C9.46967 6.24707 6.60547 9.06189 6.60547 12.5681C6.60547 16.0742 9.42028 18.889 12.9265 18.889C16.4326 18.889 19.2474 16.0248 19.2474 12.5681C19.2474 9.11127 16.3832 6.24707 12.9265 6.24707ZM12.9265 16.6174C10.7042 16.6174 8.87707 14.7903 8.87707 12.5681C8.87707 10.3458 10.7042 8.51867 12.9265 8.51867C15.1487 8.51867 16.9758 10.3458 16.9758 12.5681C16.9758 14.7903 15.1487 16.6174 12.9265 16.6174Z" fill="white"/><path d="M19.4946 7.53119C20.2855 7.53119 20.9267 6.89002 20.9267 6.09909C20.9267 5.30816 20.2855 4.66699 19.4946 4.66699C18.7037 4.66699 18.0625 5.30816 18.0625 6.09909C18.0625 6.89002 18.7037 7.53119 19.4946 7.53119Z" fill="white"/><path d="M23.1982 2.3953C21.9143 1.06196 20.0871 0.370605 18.013 0.370605H7.84018C3.54389 0.370605 0.679688 3.2348 0.679688 7.5311V17.6546C0.679688 19.778 1.37105 21.6052 2.75376 22.9385C4.08709 24.2225 5.86487 24.8644 7.88956 24.8644H17.9636C20.0871 24.8644 21.8649 24.1731 23.1488 22.9385C24.4822 21.6546 25.1735 19.8274 25.1735 17.7039V7.5311C25.1735 5.45702 24.4822 3.67925 23.1982 2.3953ZM23.0007 17.7039C23.0007 19.2348 22.4575 20.4694 21.5686 21.3089C20.6797 22.1484 19.4451 22.5928 17.9636 22.5928H7.88956C6.40808 22.5928 5.17351 22.1484 4.28463 21.3089C3.39574 20.42 2.95129 19.1854 2.95129 17.6546V7.5311C2.95129 6.04962 3.39574 4.81505 4.28463 3.92616C5.12413 3.08665 6.40808 2.64221 7.88956 2.64221H18.0624C19.5439 2.64221 20.7785 3.08665 21.6673 3.97554C22.5068 4.86443 23.0007 6.099 23.0007 7.5311V17.7039Z" fill="white"/></svg></a>
				<a href="" target="_blank" title="Tiktok"><svg width="20" height="23" viewBox="0 0 20 23" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.8821 0H14.5889C14.6287 0.161907 14.6597 0.325868 14.6816 0.49115C14.7946 1.78026 15.3843 2.98088 16.3354 3.85833C17.2866 4.73577 18.5308 5.22695 19.8248 5.23584V8.7295C19.6514 8.78586 19.4694 8.81096 19.2873 8.80363C18.4251 8.7084 17.5704 8.55358 16.7296 8.34028C16.0039 8.06101 15.298 7.73283 14.6167 7.35798V7.82133C14.6167 9.67473 14.6167 11.5837 14.6167 13.4649C14.626 14.2306 14.5764 14.9958 14.4685 15.7539C14.3059 17.0192 13.822 18.2218 13.0628 19.2471C12.3036 20.2723 11.2944 21.086 10.1315 21.6106C9.44813 21.8619 8.74839 22.0663 8.03717 22.2222H6.74906C6.69509 22.1966 6.63935 22.1749 6.58226 22.1574C5.2767 21.9913 4.05031 21.4397 3.05987 20.5731C2.06943 19.7065 1.35992 18.5642 1.02207 17.2922C0.866517 16.7386 0.748863 16.1751 0.669922 15.6056V14.5214C0.771859 14.0117 0.845995 13.502 0.994267 13.0016C1.41192 11.6653 2.21883 10.4841 3.31173 9.60914C4.40462 8.73417 5.73376 8.20525 7.12901 8.09007C7.54602 8.02521 7.96304 8.00667 8.40785 7.9696C8.40785 9.17431 8.40785 10.2863 8.40785 11.4077C8.40785 11.6764 8.26885 11.7135 8.04644 11.7783C7.33593 11.9412 6.63888 12.1581 5.96137 12.427C5.43956 12.6236 4.99124 12.9767 4.67773 13.4378C4.36422 13.899 4.20083 14.4457 4.20991 15.0032C4.17061 15.6355 4.31839 16.2653 4.63482 16.8141C4.95124 17.3629 5.42229 17.8064 5.98917 18.0891C6.50755 18.4097 7.10966 18.5685 7.7187 18.5454C8.32774 18.5223 8.91609 18.3183 9.40869 17.9594C9.77752 17.6953 10.0869 17.3568 10.3167 16.9657C10.5466 16.5747 10.6918 16.1397 10.7431 15.689C10.8539 14.7667 10.9004 13.8377 10.8821 12.9089C10.8821 8.79437 10.8821 4.67674 10.8821 0.556019C10.9099 0.361413 10.8914 0.18534 10.8821 0Z" fill="white"/></svg></a>
				<a href="" target="_blank" title="LinkedIn"><svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.09635 2.83352C5.09605 3.45236 4.84992 4.04573 4.41211 4.4831C3.97431 4.92046 3.38069 5.166 2.76185 5.16569C2.14302 5.16538 1.54965 4.91925 1.11228 4.48145C0.674914 4.04364 0.429378 3.45003 0.429688 2.83119C0.429997 2.21235 0.676126 1.61898 1.11393 1.18162C1.55173 0.74425 2.14535 0.498714 2.76419 0.499024C3.38303 0.499333 3.9764 0.745462 4.41376 1.18327C4.85113 1.62107 5.09666 2.21469 5.09635 2.83352ZM5.16635 6.89352H0.499688V21.5002H5.16635V6.89352ZM12.5397 6.89352H7.89635V21.5002H12.493V13.8352C12.493 9.56519 18.058 9.16852 18.058 13.8352V21.5002H22.6664V12.2485C22.6664 5.05019 14.4297 5.31852 12.493 8.85352L12.5397 6.89352Z" fill="white"/></svg></a>
				<a href="" target="_blank" title="YouTube"><svg width="28" height="21" viewBox="0 0 28 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22.4319 0H5.56804C2.49776 0 0 2.50561 0 5.58539V14.9861C0 18.0658 2.49776 20.5714 5.56804 20.5714H22.4319C25.5022 20.5714 28 18.0658 28 14.9861V5.58539C28 2.50561 25.5022 0 22.4319 0ZM26.8571 14.9861C26.8571 17.4356 24.8719 19.4286 22.4319 19.4286H5.56804C3.12804 19.4286 1.14286 17.4356 1.14286 14.9861V5.58539C1.14286 3.1359 3.12804 1.14286 5.56804 1.14286H22.4319C24.8719 1.14286 26.8571 3.1359 26.8571 5.58539V14.9861Z" fill="white"/><path d="M19.0625 10.0788L11.1454 5.44146C10.9696 5.33855 10.7503 5.33683 10.5725 5.43872C10.3948 5.54055 10.2852 5.72969 10.2852 5.93449V15.208C10.2852 15.4128 10.3948 15.6019 10.5722 15.7037C10.6604 15.7543 10.7586 15.7794 10.8566 15.7794C10.9565 15.7794 11.0561 15.7532 11.1454 15.701L19.0625 11.0648C19.2374 10.9624 19.3452 10.7746 19.3452 10.5718C19.3452 10.3689 19.2377 10.1812 19.0625 10.0788ZM11.428 14.211V6.93146L17.6429 10.5718L11.428 14.211Z" fill="white"/></svg></a>
			</div>
		</div>
	</header>
	<main>