<?php
/**
 * Theme Admin.
 *
 * @since 1.0.1
 *
 * @package Peacock
 */

?>


<div class="wrap peacock-theme-option">
    <div class="theme-header">
        <div class="branding">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/codetrait-light.png' ?>" alt="Logo">
        </div><!-- ./branding -->
    </div><!-- ./theme-header -->
    <div class="theme-option-body">
        <div class="d-flex align-items-start">
            <div class="admin-nav nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active" id="v-pills-header-tab" data-bs-toggle="pill" data-bs-target="#v-pills-header" type="button" role="tab" aria-controls="v-pills-header" aria-selected="true">
                    <ul class="p-0 m-0">
                        <li class="mb-2">
                            <span>
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/header.svg' ?>" >
                            </span>
                            <span class="nav-header">Header</span>
                        </li>
                        <li>
                            <span class="sub-text">Change header style, Logo & Favicon</span>
                        </li>
                    </ul>
                </button>
                <button class="nav-link" id="v-pills-footer-tab" data-bs-toggle="pill" data-bs-target="#v-pills-footer" type="button" role="tab" aria-controls="v-pills-footer" aria-selected="false">
                    <ul class="p-0 m-0">
                        <li  class="mb-2">
                            <span>
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/footer.svg' ?>" >
                            </span>
                            <span class="nav-header">Footer</span>
                        </li>
                        <li>
                            <span class="sub-text">Change Footer styles</span>
                        </li>
                    </ul>
                </button>
            </div><!-- ./admin-nav -->
            <div class="admin-body tab-content w-100" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-header" role="tabpanel" aria-labelledby="v-pills-header-tab" tabindex="0">
                    <?php include_once( get_template_directory() . '/inc/admin/favicon/theme-favicon.php' ); ?>
                    <hr/>
                    <?php //include_once( get_template_directory() . '/inc/admin/logo/theme-logo.php' ); ?>
                </div>
                <div class="tab-pane fade" id="v-pills-footer" role="tabpanel" aria-labelledby="v-pills-footer-tab" tabindex="0">
                    <?php include_once( get_template_directory() . '/inc/admin/themeOpt-logo.php' ); ?>
                </div>
            </div><!-- ./admin-body -->
        </div>
    </div><!-- ./theme-option-body -->
    
</div>
