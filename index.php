<?php get_header() ?>
<main>
    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="submit_post_form">
        <fieldset>
            <legend>Formulário para Postagem</legend>

            <div class="input-wrapper">
                <label for="post-title">Título do post</label>
                <input type="text" id="post-title" name="post-title" required>
            </div>

            <div class="input-wrapper">
                <label for="post-content">Conteúdo do post</label>
                <textarea id="post-content" name="post-content" required></textarea>
            </div>

            <div class="input-wrapper">
                <label for="post-image">Imagem Destacada</label>
                <input type="file" id="post-image" name="post-image" accept="image/*">
            </div>
            
        </fieldset>

        <div class="button-wrapper">
            <input type="submit" value="Enviar">
        </div>

    </form>    
</main>
<?php get_footer() ?>
