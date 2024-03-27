<footer>
    <!-- Listagem de posts -->
        <div class="post-list">
            
            <?php
                $cont = 1;
                // Query para recuperar os posts
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 9 // Número de posts por página
                );
                $query = new WP_Query($args);

                // Loop para exibir os posts
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post(); ?>
                        <article>
                            <?php '<img>' . the_post_thumbnail() . '</img>';?>
                            <h2> <?php the_title(); ?> </h2>
                            <?php the_content(); ?>
                            <div class="numeracao">
                                <?php echo $cont; ?>
                            </div>
                        </article>
                    <?php 
                    $cont++; 
                    endwhile;
                    wp_reset_postdata(); // Restaura os dados originais do post global
                else :
                    echo 'Nenhum post encontrado.';
                endif;
            ?>
        </footer>
    </div>
</body>
</html>