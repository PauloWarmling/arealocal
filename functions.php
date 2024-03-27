<?php


/**
 * Pega dados do formulário para realizar um post
 *
 * @param 
 * @return 
 */
function submit_post_form() {
    $titulo = isset($_POST['post-title'] )? sanitize_text_field($_POST['post-title']) : '';
    $conteudo = isset($_POST['post-content']) ? wp_kses_post($_POST['post-content']) : '';
    
    if (!empty($titulo) && !empty($conteudo) && !empty($_FILES['post-image']['name'])) {
        $nova_postagem = array(
            'post_title'    => $titulo,
            'post_content'  => $conteudo,
            'post_status'   => 'publish',
            'post_type'     => 'post'
        );

        $postagem_id = wp_insert_post($nova_postagem);

        if (!is_wp_error($postagem_id)) {
            // Verifica se uma imagem foi enviada
            if (isset($_FILES['post-image']) && !empty($_FILES['post-image']['name'])) {
                require_once(ABSPATH . 'wp-admin/includes/image.php');
                require_once(ABSPATH . 'wp-admin/includes/file.php');
                require_once(ABSPATH . 'wp-admin/includes/media.php');

                // Manipula o upload da imagem
                $attachment_id = media_handle_upload('post-image', $postagem_id);

                 // Define a imagem como imagem destacada do post
                 if (!is_wp_error($attachment_id)) {
                    set_post_thumbnail($postagem_id, $attachment_id);
                } else {
                    echo 'erro no upload da imagem';
                }
            }
            wp_redirect(home_url());
            exit;
        } else {
            echo 'Erro criação da postagem';
        }
    } else {
        // Exiba uma mensagem de erro caso algum campo esteja vazio
        wp_die( 'Todos os campos são obrigatórios.' );
    }
}
add_action( 'admin_post_submit_post_form', 'submit_post_form' );
add_action( 'admin_post_nopriv_submit_post_form', 'submit_post_form' );


/**
 * Carrega os scripts da aplicação
 *
 * @param 
 * @return 
 */
function load_script(){
    wp_enqueue_style('template' , get_template_directory_uri() . '/css/template.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'load_scripts');
?>