<?php
// Verifica se há posts
if (have_posts()) {
    // Itera sobre cada post no loop
    while (have_posts()) {
        // Carrega o post atual para uso em loop
        the_post();
?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1><?php the_title(); ?></h1>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
            <?php
            // Verifica se o post tem uma imagem destacada
            if (has_post_thumbnail()) {
            ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php
            }
            ?>
        </article>
<?php
    } // Fim do loop while
} else {
    // Se não houver posts encontrados, exibe uma mensagem
    echo 'Nenhum post encontrado.';
}
?>
