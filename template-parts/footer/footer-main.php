<div class="footer-top">
    <canvas id="stars" width="300" height="300"></canvas>
</div>
<div class="footer-bottom">
    <div class="footer-bottom-content container">
        <div class="row">
            <div class="footer-left-container col-8">
                <?php 
                    if ( is_active_sidebar( 'footer-1' ) ) {
                        dynamic_sidebar( 'footer-1' );
                    }
                ?>
                <?php 
                    if ( is_active_sidebar( 'footer-2' ) ) {
                        dynamic_sidebar( 'footer-2' );
                    }
                ?>
                <?php 
                    if ( is_active_sidebar( 'footer-3' ) ) {
                        dynamic_sidebar( 'footer-3' );
                    }
                ?>
                <?php 
                    if ( is_active_sidebar( 'footer-4' ) ) {
                        dynamic_sidebar( 'footer-4' );
                    }
                ?>
            </div>
            <div class="footer-right-container col-4">
                <?php 
                    if ( is_active_sidebar( 'footer-contact' ) ) {
                        dynamic_sidebar( 'footer-contact' );
                    }
                ?>
            </div>
        </div>
    </div>
</div>