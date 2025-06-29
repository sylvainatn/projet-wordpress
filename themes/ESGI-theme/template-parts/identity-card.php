<section class="identity-card">
    <?= get_custom_logo() ?>
    <h1> <?= get_bloginfo('name') ?></h1>
    <h2> <?= get_bloginfo('description') ?></h2>
    <footer>
        <ul>
            <?php
            $social_networks = esgi_get_social_networks();
            foreach ($social_networks as $network => $url) : ?>
                <li>
                    <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener">
                        <?= esgi_getIcon($network) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </footer>
</section>