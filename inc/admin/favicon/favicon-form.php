<?php
// Save the uploaded favicon image
function save_favicon_image() {
    if (isset($_FILES['favicon_image']) && $_FILES['favicon_image']['error'] == 0) {
        // Get the file extension
        $file_extension = strtolower(pathinfo($_FILES['favicon_image']['name'], PATHINFO_EXTENSION));
        
        // Validate the file extension
        if ($file_extension == 'png' || $file_extension == 'jpg' || $file_extension == 'jpeg' || $file_extension == 'gif') {
            // Create the favicon directory if it does not exist
            $favicon_directory = get_template_directory() . '/assets/images/favicons';
            if (!is_dir($favicon_directory)) {
                wp_mkdir_p($favicon_directory);
            }
            
            // Generate file names
            $original_filename = 'favicon-original.' . $file_extension;
            $small_filename = 'favicon-16x16.png';
            $large_filename = 'favicon-32x32.png';
            
            // Save the original file
            move_uploaded_file($_FILES['favicon_image']['tmp_name'], $favicon_directory . '/' . $original_filename);
            
            // Resize and save the small image
            save_resized_image($favicon_directory . '/' . $original_filename, $favicon_directory . '/' . $small_filename, 16, 16);
            
            // Resize and save the large image
            save_resized_image($favicon_directory . '/' . $original_filename, $favicon_directory . '/' . $large_filename, 32, 32);
            
            // Update the favicon option
            update_option('theme_favicon', array(
                'original' => $original_filename,
                'small' => $small_filename,
                'large' => $large_filename
            ));
        }
    }
}

// Render the favicon form
function render_favicon_form() {
    $favicon = get_option('theme_favicon');
?>
    <h3>Favicon Settings</h3>
    <form method="post" enctype="multipart/form-data">
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Favicon Image</th>
                <td>
                    <input type="file" name="favicon_image">
                    <?php if ($favicon) { ?>
                        <br>
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/favicons/' . $favicon['small']; ?>" alt="Favicon">
                    <?php } ?>
                </td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
<?php
}

// Add the favicon settings page
function add_favicon_settings_page() {
    add_menu_page('Favicon Settings', 'Favicon Settings', 'manage_options', 'favicon-settings', 'render_favicon_form');
}

// Save the favicon image when the form is submitted
if (isset($_POST['submit'])) {
    save_favicon_image();
}

// Enqueue the required styles and scripts for the favicon settings page
function enqueue_favicon_scripts() {
    wp_enqueue_style('admin-favicon', get_template_directory_uri() . '/admin/favicon/favicon.css');
}

add_action('admin_enqueue_scripts', 'enqueue_favicon_scripts');
