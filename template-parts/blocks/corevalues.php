<?php
$cv_repeater = get_field('cv_repeater', 'option');
$corevalues_title = get_sub_field('corevalues_title');
if ($cv_repeater): ?>
    <section class="corevalues">
        <div class="container fade-in-on-scroll">
            <div class="row">
                <div class="offset-4 col-8">
                    <div class="corevalues__title-container">
                        <h2><?= $corevalues_title; ?></h2>
                    </div>
                </div>
            </div>
            <div class="row desktop-layout">
                <!-- Titles -->
                <div class="col-4">
                    <div class="cv-titles">
                        <?php foreach ($cv_repeater as $index => $cv): ?>
                            <h3 class="cv-title <?php echo $index === 0 ? 'active' : ''; ?>" data-index="<?php echo $index; ?>">
                                <?php echo esc_html($cv['cv_title']); ?>
                            </h3>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- Messages -->
                <div class="col-8">
                    <div class="cv-messages">
                        <?php foreach ($cv_repeater as $index => $cv): ?>
                            <div class="cv-message <?php echo $index === 0 ? 'active' : ''; ?>"
                                data-index="<?php echo $index; ?>">
                                <?php echo wp_kses_post($cv['cv_message']); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Mobile Accordion -->
            <!-- Mobile Accordion -->
            <div class="mobile-layout">
                <?php foreach ($cv_repeater as $index => $cv): ?>
                    <div class="cv-accordion-item">
                        <h3 class="cv-title" data-index="<?php echo $index; ?>">
                            <?php echo esc_html($cv['cv_title']); ?>
                            <span class="chevron"></span>
                        </h3>
                        <div class="cv-message">
                            <?php echo wp_kses_post($cv['cv_message']); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const titles = document.querySelectorAll('.desktop-layout .cv-title');
            const messages = document.querySelectorAll('.desktop-layout .cv-message');

            titles.forEach(title => {
                title.addEventListener('click', function () {
                    const index = this.dataset.index;
                    titles.forEach(t => t.classList.remove('active'));
                    messages.forEach(m => m.classList.remove('active'));
                    this.classList.add('active');
                    document.querySelector(`.cv-message[data-index="${index}"]`).classList.add(
                        'active');
                });
            });

            // Mobile accordion behavior
            document.querySelectorAll('.mobile-layout .cv-title').forEach(title => {
                title.addEventListener('click', function () {
                    const message = this.nextElementSibling;
                    this.classList.toggle('active');
                    message.classList.toggle('active');
                });
            });
        });
    </script>
<?php endif; ?>