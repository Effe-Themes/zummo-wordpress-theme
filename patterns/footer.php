<?php
/**
 * Title: footer
 * Slug: zummo/footer
 * Categories: hidden
 * Inserter: no
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|60"}},"background":{"backgroundImage":{"url":"<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/footer-bg.png","id":145,"source":"file","title":"footer-bg"},"backgroundPosition":"50% 0"}},"layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"60%"} -->
<div class="wp-block-column" style="flex-basis:60%"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"75%","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2 class="wp-block-heading"><?php echo __('Building connections, driving success—one project at a time.', 'zummo');?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2 class="wp-block-heading"><?php echo __('Pages', 'zummo');?></h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul class="wp-block-list"><!-- wp:list-item -->
<li><?php echo __('About Us', 'zummo');?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php echo __('Services', 'zummo');?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php echo __('Projects', 'zummo');?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php echo __('Testimonials', 'zummo');?></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2 class="wp-block-heading"><?php echo __('Legal', 'zummo');?></h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul class="wp-block-list"><!-- wp:list-item -->
<li><?php echo __('Privacy Policy', 'zummo');?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php echo __('Conditions', 'zummo');?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php echo __('Contact Us', 'zummo');?></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"var:preset|spacing|30"} -->
<div style="height:var(--wp--preset--spacing--30)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"align":"left"} -->
<p class="has-text-align-left"><?php echo __('Proudly powered by WordPress | Designed by: <a href="https://effethemes.com/" target="_blank" rel="noreferrer noopener">Effe Themes</a>', 'zummo');?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->