<?php
/*
 * Template Name: Page Builder
 * Template Post Type: page, doelgroep, dienst
 */

get_header(); ?>

<?php if (have_rows('pagebuilder')): ?>
        <?php while (have_rows('pagebuilder')):
                the_row(); ?>

                <?php if (get_row_layout() === 'hero_banner'): ?>
                        <?php get_template_part('template-parts/blocks/hero_banner'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'doelgroep_hero'): ?>
                        <?php get_template_part('template-parts/blocks/doelgroep_hero'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'hero_slider'): ?>
                        <?php get_template_part('template-parts/blocks/hero_slider'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'hero_slider_two_cols'): ?>
                        <?php get_template_part('template-parts/blocks/hero_slider_two_cols'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'text_with_image'): ?>
                        <?php get_template_part('template-parts/blocks/text_with_image'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'doelgroep_text_with_image'): ?>
                        <?php get_template_part('template-parts/blocks/doelgroep_text_image'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'service_text_with_image'): ?>
                        <?php get_template_part('template-parts/blocks/service_text_image'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'text_block'): ?>
                        <?php get_template_part('template-parts/blocks/text_block'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'cards_block'): ?>
                        <?php get_template_part('template-parts/blocks/cards'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'text_with_slider'): ?>
                        <?php get_template_part('template-parts/blocks/text_with_slider'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'help_block'): ?>
                        <?php get_template_part('template-parts/blocks/help_block'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'ta_cards'): ?>
                        <?php get_template_part('template-parts/blocks/ta_cards'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'services'): ?>
                        <?php get_template_part('template-parts/blocks/services'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'quotes'): ?>
                        <?php get_template_part('template-parts/blocks/quotes'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'news'): ?>
                        <?php get_template_part('template-parts/blocks/news'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'corevalues'): ?>
                        <?php get_template_part('template-parts/blocks/corevalues'); ?>
                <?php endif; ?>

        <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>