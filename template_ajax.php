<?php get_header();
/*
 Template Name: Test
 */
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <div class="wrap">



                <form method="post"  action="#" id="ajax_form">
                    <p>
                        <label for="name">Ім'я</label>
                        <input class="input_field" name="name" id="name" required type="text">
                    </p>
                    <p>
                        <label for="surname">Прізвище</label>
                        <input class="input_field" name="surname" id="surname" required type="text" ></p>
                    <p><label for="phone">Телефон</label>
                        <input class="input_field"  name="phone" id="phone" required type="tel" ></p>
                    <p><label for="message">Повідомлення</label>
                        <textarea class="input_field" name="message" id="message"  cols="30" rows="10"></textarea></p>
                    <p><label for="file">Завантажте файл</label>
                        <input class="input_field" name="file" id="file"  type="file">
                    </p>
                    <p class="form-submit align-left">
                        <button id="submit" type="submit">Відправити</button>
                    </p>
                    <div class="ajax-reply"></div>

                    <p class="hide success">Ви успішно відправили свої данні</p>
                    <p class="hide error"> Виникла помилка</p>
                </form>


                <h1>Список усіх підписників</h1>

                <?php
                if (have_posts()) :
                    query_posts('post_type=subscriber&showposts=-1');
                    while (have_posts()) : the_post(); ?>
                        <?php $id = get_the_ID();
                        $name = get_post_meta($id, 'name', true);
                        $surname = get_post_meta($id, 'surname', true);
                        $phone = get_post_meta($id, 'phone', true);
                        $message = get_post_meta($id, 'message', true);
                        $file = get_post_meta($id, 'file', true);
                        ?> <br>
                        <div class="post_wrap">
                            <h3><?= $name . ' ' . $surname ?></h3>
                            <p><a class="url fn n" href="tel:<?= $phone ?>"> <?= $phone ?> </a></p>
                            <p><?= $message ?></p>
                            <?php if($file) { ?>
                            <p><a class="url fn n" download="" href="<?= $file ?>">Скачать файл</a></p>
                            <?php } ?>
                        </div>
                    <?php endwhile;
                endif;
                wp_reset_postdata(); ?>


            </div>


        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer();
