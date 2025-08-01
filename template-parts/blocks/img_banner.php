<?php
$banner_image = get_sub_field('banner_img');
?>
<section class="image_banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <div class="image_banner__image-container">
                    <img src="<?= $banner_image['url']; ?>" alt="<?= $banner_image['alt']; ?>">
                </div>
            </div>
        </div>
    </div>
</section>