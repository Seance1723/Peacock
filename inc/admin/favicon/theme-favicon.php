<?php
/**
 * Theme Admin.
 *
 * @since 1.0.1
 *
 * @package Peacock
 */

?>

<div class="option-inner">
    <div class="inner-header d-flex justify-content-between">
        <h4 class="header">
            Favicon for the website
        </h4>
        <div class="header-msg">
            <?php if(isset($_GET['settings-updated']) && $_GET['settings-updated']) { ?>
                <div class="updated"><p>Settings saved.</p></div>
            <?php } ?>
        </div>
    </div><!-- ./inner-header -->
    <div class="inner-content">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form method="post" enctype="multipart/form-data">
            <p>Current favicon:</p>
            <?php
                $site_url = get_site_icon_url();
                echo $site_url;
                if ($site_url) {
                    ?>
                    <img src="<?php echo $site_url ?>" alt="Current favicon">
                    <?php
                } else {
                    echo '<p>No favicon uploaded yet.</p>';
                }
            ?>

            <p><label for="favicon_url">Upload new favicon:</label></p>
            <p>
                <input type="hidden" name="my_upload_form_nonce" value="<?php echo wp_create_nonce('my_upload_form_nonce'); ?>">
                <input type="file" name="my_file_upload">
            </p>
            
            <p><input type="submit" value="Upload"></p>
        </form>
    </div><!-- ./inner-content -->
</div>

<?php


if (isset($_POST['my_upload_form_nonce']) && wp_verify_nonce($_POST['my_upload_form_nonce'], 'my_upload_form_nonce')) {
    my_upload_form();
}

function my_upload_form() {
    $allowed_file_types = array('image/jpeg', 'image/png');
    $upload_dir = get_template_directory() . '/assets/images/';
    $target_dir = $upload_dir . 'favicon/';
    $target_file = $target_dir . 'favicon.png';
    
    // Create target directory if it doesn't exist
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0755, true);
    }
    
    if (!empty($_FILES['my_file_upload']['tmp_name'])) {
        $file_type = $_FILES['my_file_upload']['type'];
        $file_name = $_FILES['my_file_upload']['name'];
        $file_path = $upload_dir . $file_name;
        $file_size = $_FILES['my_file_upload']['size'];
        $file_tmp = $_FILES['my_file_upload']['tmp_name'];
        
        // Validate file type
        if (!in_array($file_type, $allowed_file_types)) {
            echo 'Sorry, only JPG and PNG files are allowed.';
            return;
        }
        
        // Convert image to PNG if it's a JPG
        if ($file_type == 'image/jpeg') {
            $image = imagecreatefromjpeg($file_tmp);
            imagepng($image, $file_tmp);
            imagedestroy($image);
        }
        
        // Sanitize file name
        $file_name = sanitize_file_name($file_name);
        
        // Resize image to 32x32 and 64x64
        $image = imagecreatefrompng($file_tmp);
        $image_16 = imagescale($image, 16, 16);
        $image_32 = imagescale($image, 32, 32);
        $image_180 = imagescale($image, 180, 180);
        imagesavealpha($image_16, true);
        imagesavealpha($image_32, true);
        imagesavealpha($image_180, true);
        imagedestroy($image);
        
        // Save resized images as favicon-32x32.png and favicon-64x64.png
        $favicon_16_file = $target_dir . 'favicon-16x16.png';
        $favicon_32_file = $target_dir . 'favicon-32x32.png';
        $favicon_180_file = $target_dir . 'apple-touch-icon.png';
        imagepng($image_16, $favicon_16_file);
        imagepng($image_32, $favicon_32_file);
        imagepng($image_180, $favicon_180_file);
        imagedestroy($image_16);
        imagedestroy($image_32);
        imagedestroy($image_180);

        // Move original image to target directory and rename as myupload.png
        if (move_uploaded_file($file_tmp, $target_file)) {
            echo '<div class="updated"><p>The file ' . $file_name . ' has been uploaded.</p></div>';
        } else {
            echo 'Error: Sorry, there was an error uploading your file.';
        }

        // Generate the site.webmanifest file
        $site_url = get_site_url();
        $favicon_url = get_template_directory_uri() . '/assets/images/favicon/';
        $manifest = array(
            'name' => get_bloginfo( 'name' ),
            'short_name' => get_bloginfo( 'name' ),
            'icons' => array(
                array(
                    'src' => $favicon_url . 'favicon-16x16.png',
                    'sizes' => '16x16',
                    'type' => 'image/png',
                ),
                array(
                    'src' => $favicon_url . 'favicon-32x32.png',
                    'sizes' => '32x32',
                    'type' => 'image/png',
                ),
                array(
                    'src' => $favicon_url . 'apple-touch-icon.png',
                    'sizes' => '180x180',
                    'type' => 'image/png',
                ),
            ),
            'start_url' => '/',
            'display' => 'standalone',
        );
        $manifest_json = json_encode( $manifest );
        $manifest_file_path = $target_dir . '/site.webmanifest';
        file_put_contents( $manifest_file_path, $manifest_json );
        
        
    }
}
