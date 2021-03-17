<?php if ($args) : ?>
    <div class="buttons py-3">
        <?php foreach ($args as $button) : ?>
            <?php

            if (!empty($button['link'])) {

                $button['link']['icon'] = !empty($button['icon']) ? $button['icon'] : '';
                $button['link']['attr'] = !empty($button['download']) ? 'download' : '';

                if($button['style'] === 'link') {
                    get_template_part('template-parts/components/link', '', $button['link']);
                } else {
                    get_template_part('template-parts/components/button', '', $button['link']);
                }
            }

            ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
