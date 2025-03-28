<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?><?php wp_title(''); ?></title>
    <!-- Version: 1.3.3 -->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <?php if (is_active_sidebar('header-widgets')) : ?>
            <div class="header-widgets">
                <?php dynamic_sidebar('header-widgets'); ?>
            </div>
        <?php endif; ?>

        <?php if (is_home() || is_front_page()) : ?>
            <p>&nbsp;</p>
            <h1><?php bloginfo('name'); ?> <span><?php bloginfo('description'); ?></span></h1>
        <?php else : ?>
            <p><?php bloginfo('name'); ?> <span><?php bloginfo('description'); ?></span></p>
            <h1><?php the_title(); ?></h1>
        <?php endif; ?>
    </header>

    <nav>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'main-nav',
            'container'      => 'ul', // Setzt das Container-Element auf <ul> und entfernt das <div>
            'menu_class'     => 'menu container', // Klasse direkt für das <ul>
        ));
        ?>
    </nav>

    <main>
        <div class="content">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div><?php the_content(); ?></div>
                    </article>
                    <?php
                endwhile;
            else :
                ?>
                <p><?php esc_html_e('Keine Beiträge gefunden.', 'textdomain'); ?></p>
                <?php
            endif;
            ?>
        </div>

        <?php if (is_active_sidebar('sidebar')) : ?>
            <aside class="sidebar">
                <?php dynamic_sidebar('sidebar'); ?>
            </aside>
        <?php endif; ?>
    </main>

    <footer>
        <?php if (is_active_sidebar('footer-widgets')) : ?>
            <div class="footer-widgets">
                <?php dynamic_sidebar('footer-widgets'); ?>
            </div>
        <?php endif; ?>

        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> <span><?php bloginfo('description'); ?></span></p>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
