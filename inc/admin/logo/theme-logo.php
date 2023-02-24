<?php
/**
 * Theme Admin.
 *
 * @since 1.0.1
 *
 * @package Peacock
 */

 ?>

<div class="wrap">
    <h1>Theme Options - Logo</h1>
    <?php if(isset($_GET['settings-updated']) && $_GET['settings-updated']) { ?>
        <div class="updated"><p>Settings saved.</p></div>
    <?php } ?>
    <form method="post" enctype="multipart/form-data" action="options.php">
        <?php settings_fields('logo_options_group'); ?>
        <?php $options = get_option('logo_options'); ?>
        <table class="form-table">
            <tr>
                <th scope="row">Current Logo</th>
                <td>
                    <?php if(!empty($options['logo_url'])) { ?>
                        <img src="<?php echo esc_url($options['logo_url']); ?>" alt="Current Logo" style="max-width: 200px; max-height: 200px;" />
                    <?php } else { ?>
                        <p>No logo uploaded.</p>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="logo_file">Upload New Logo</label></th>
                <td>
                    <input type="file" name="logo_file" id="logo_file" />
                    <p class="description">The image must be in JPG, PNG, or GIF format and at least 200x200 pixels.</p>
                </td>
            </tr>
        </table>
        <?php submit_button('Save Changes'); ?>
    </form>
</div>
