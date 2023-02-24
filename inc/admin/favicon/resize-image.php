<?php
/**
 * Resize and save an image to multiple sizes.
 *
 * @param string $file_path The path to the original image file.
 * @param array $sizes An array of new sizes to generate, with filenames as keys and sizes as values.
 * @param string $save_path The directory to save the resized images in.
 * @return bool True if all images were resized and saved successfully, false otherwise.
 */
function save_resized_images($file_path, $sizes, $save_path) {
  // Load the original image
  $image = imagecreatefromstring(file_get_contents($file_path));

  // Get the original image dimensions
  $width = imagesx($image);
  $height = imagesy($image);

  // Loop through the new sizes
  foreach($sizes as $filename => $size) {
    // Calculate the new image dimensions
    $new_width = $size;
    $new_height = ($height / $width) * $size;

    // Create a new image with the new dimensions
    $new_image = imagecreatetruecolor($new_width, $new_height);

    // Resize the original image to the new dimensions
    imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    // Save the resized image
    $new_file_path = $save_path . '/' . $filename;
    if (!imagepng($new_image, $new_file_path)) {
      // Failed to save the image, return false
      return false;
    }

    // Free up memory
    imagedestroy($new_image);
  }

  // Free up memory
  imagedestroy($image);

  // All images were resized and saved successfully, return true
  return true;
}
