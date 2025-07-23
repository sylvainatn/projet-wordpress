<section class="team-section">
    <h3><?php echo esc_html(get_theme_mod('esgi_team_title', 'Our Team')); ?></h3>
    <ul>
        <?php for ($i = 1; $i <= 4; $i++) : 
            $image_id = get_theme_mod("esgi_team_image_$i");
            $position = get_theme_mod("esgi_team_position_$i");
            $phone = get_theme_mod("esgi_team_phone_$i");
            $email = get_theme_mod("esgi_team_email_$i");
            
            // Valeurs par défaut
            $default_images = [
                1 => 'png/5.png',
                2 => 'png/6.png',
                3 => 'png/7.png',
                4 => 'png/8.png'
            ];
            $default_positions = [
                1 => 'Sales Manager',
                2 => 'Event planner',
                3 => 'Designer',
                4 => 'CEO'
            ];
            $default_phones = [
                1 => '+33 1 53 31 25 23',
                2 => '+33 1 53 31 25 24',
                3 => '+33 1 53 31 25 20',
                4 => '+33 1 53 31 25 25'
            ];
            $default_emails = [
                1 => 'sales@company.com',
                2 => 'plan@company.com',
                3 => 'design@company.com',
                4 => 'ceo@company.com'
            ];
        ?>
        <li>
            <?php if ($image_id) : 
                echo wp_get_attachment_image($image_id, 'medium', false, ['alt' => esc_attr($position)]);
            else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/src/images/<?php echo $default_images[$i]; ?>" alt="<?php echo esc_attr($position ?: $default_positions[$i]); ?>">
            <?php endif; ?>
            
            <h4><?php echo esc_html($position ?: $default_positions[$i]); ?></h4>
            <p>
                <?php echo esc_html($phone ?: $default_phones[$i]); ?><br>
                <?php if ($email || $default_emails[$i]) : ?>
                    <a href="mailto:<?php echo esc_attr($email ?: $default_emails[$i]); ?>">
                        <?php echo esc_html($email ?: $default_emails[$i]); ?>
                    </a>
                <?php endif; ?>
            </p>
        </li>
        <?php endfor; ?>
    </ul>
</section>