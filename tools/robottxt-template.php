<?php
/**
 * Template Name: Robot.txt Checker and Editor
 *
 * This template allows users to check if their website has a robot.txt file and edit it if it exists.
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <div class="container">

            <?php if (isset($_POST['url'])):
                $url = $_POST['url'];
                $robot_url = $url . '/robots.txt';
                $robot_data = @file_get_contents($robot_url);
                $robots_allowed = true;
                $editable = false;
                
                // Check if robot.txt file exists
                if ($robot_data === false) :
                    $robots_allowed = false; ?>
                    <div class="alert alert-warning" role="alert">
                        <strong>Warning:</strong> The website does not have a robots.txt file. Please create one.
                    </div>

                    <div class="form-group">
                        <label for="robot-text">Enter robot.txt code here:</label>
                        <textarea class="form-control" rows="10" id="robot-text" name="robot-text"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>

                <?php else: 
                    $editable = true; ?>

                    <h2>Robot.txt file found:</h2>

                    <div class="form-group">
                        <label for="robot-text">Edit robot.txt code:</label>
                        <textarea class="form-control" rows="10" id="robot-text" name="robot-text"><?php echo $robot_data; ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>

                <?php endif; ?>

            <?php else: ?>

                <form method="POST">

                    <div class="form-group">
                        <label for="url">Enter your website URL:</label>
                        <input type="url" class="form-control" id="url" name="url" placeholder="https://example.com">
                    </div>

                    <button type="submit" class="btn btn-primary">Check robot.txt</button>

                </form>

            <?php endif; ?>

        </div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>
<script>
  // Wait for the page to fully load
  $(document).ready(function() {
  
    // Add event listener for the form submission
    $('form').submit(function(e) {
      e.preventDefault(); // Prevent form from submitting
      
      // Get the input URL
      var inputUrl = $('#input-url').val();
      
      // Send an AJAX request to check if robot.txt exists
      $.ajax({
        url: inputUrl + '/robots.txt',
        type: 'HEAD',
        success: function() {
          // If robot.txt exists, show its content and allow editing
          $.get(inputUrl + '/robots.txt', function(data) {
            // Display the content in the textarea
            $('#robot-txt-content').val(data);
            // Enable the editing of the textarea
            $('#robot-txt-content').prop('readonly', false);
            // Show the download button
            $('#download-btn').show();
            // Hide the "create new" message
            $('#create-new-msg').hide();
          });
        },
        error: function() {
          // If robot.txt doesn't exist, show the "create new" message
          $('#create-new-msg').show();
        }
      });
    });
    
    // Add event listener for the download button click
    $('#download-btn').click(function() {
      // Get the content of the textarea
      var content = $('#robot-txt-content').val();
      // Create a new Blob object with the content
      var blob = new Blob([content], {type: 'text/plain'});
      // Create a new URL for the blob
      var url = URL.createObjectURL(blob);
      // Create a new anchor element to download the file
      var a = document.createElement('a');
      a.download = 'robots.txt';
      a.href = url;
      // Click the anchor element to download the file
      document.body.appendChild(a);
      a.click();
      // Remove the anchor element
      document.body.removeChild(a);
      // Revoke the URL to free up memory
      URL.revokeObjectURL(url);
    });
    
  });
</script>