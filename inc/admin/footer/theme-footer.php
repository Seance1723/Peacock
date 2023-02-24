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
    <h1>Theme Options - Footer</h1>
    <?php if(isset($_GET['settings-updated']) && $_GET['settings-updated']) { ?>
        <div class="updated"><p>Settings saved.</p></div>
    <?php } ?>
    <form method="post" action="options.php">
        <?php settings_fields('footer_options_group'); ?>
        <?php $options = get_option('footer_options'); ?>
        <table class="form-table">
            <tr>
                <th scope="row"><label for="copyright_text">Copyright Text</label></th>
                <td>
                    <textarea name="copyright_text" id="copyright_text" rows="5" cols="50"><?php
                        if(isset($options['copyright_text'])) {
                            echo esc_textarea($options['copyright_text']);
                        }
                    ?></textarea>
                    <p class="description">This text will be displayed in the footer of your site.</p>
                </td>
            </tr>
        </table>
        <?php submit_button('Save Changes'); ?>
    </form>
</div>
