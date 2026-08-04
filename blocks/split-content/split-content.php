<?php
    $content         = get_field( 'content' );
    $image           = get_field( 'image' );
    $alignment       = get_field( 'content_alignment' );
    $image_order     = ( 'left' === $alignment ) ? 'col--last' : '';
    $content_spacing = ( 'right' === $alignment ) ? 'lg:pl-md' : '';
    $preview_image   = bb_block_preview_image_src( $block );
?>

<?php if (bb_is_block_preview($block)): ?>

    <div class="block-preview"><img src="<?php echo bb_block_preview_image_src($block); ?>" /></div>

<?php else: ?>

    <section class="section section--split-content section--spaced">
        <div class="container">
            <div class="row items-center">
                <?php if ($image): ?>
                    <div class="col col--xs-12 col--sm-12 col--md-6 col--lg-6 <?php echo esc_attr( $image_order ); ?>">
                        <?php echo wp_get_attachment_image($image, 'full'); ?>
                    </div>             
                <?php endif; ?>
                <?php if ($content): ?>
                    <div class="col col--xs-12 col--sm-12 col--md-6 col--lg-6">
                        <div class="<?php echo esc_attr( trim( $content_spacing . ' sm:pt-sm' ) ); ?>">
                            <?php echo $content; ?>
                        </div>             
                    </div>           
                <?php endif; ?>
            </div>
        </div>
    </section>

<?php endif; ?>
