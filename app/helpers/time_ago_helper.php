<?php
  function get_time_ago($postCreated,$updated_at) {

  // Checks database if updated_at has value
  $time_to_be_converted = strtotime($updated_at) <= 0 ? $postCreated : $updated_at;
  
  // Convert time since january 1 1970 GMT
  $converted_time = strtotime($time_to_be_converted);

  // Get time difference
  $time_difference = time() - $converted_time;
  
  // Return if time difference is less than one
  if($time_difference < 1) {
    if($time_to_be_converted === $updated_at) {
      return 'Edited post less than 1 second ago';
    } else {
      return 'Posted less than 1 second ago';
    }
  }
  
  $condition = [
    60 * 60 * 24 * 30 * 12  => 'year',
    60 * 60 * 24 * 30       => 'month',
    60 * 60 * 24            => 'day',
    60 * 60                 => 'hour',
    60                      => 'minute',
    1                       => 'second',
  ];
  /* Loops the condition and 
   * return the first $key & value that matches
   * the if statement.
   */
  foreach($condition as $secs => $str) {
    $divide = $time_difference / $secs;

    if($divide >= 1) {
      $time = round($divide);

      if($time_to_be_converted === $updated_at) {
        return 'Edited post about ' . $time . ' ' . $str . ($time > 1 ? 's' : '') . ' ago';
      } else {
        return 'Posted about ' . $time . ' ' . $str . ($time > 1 ? 's' : '') . ' ago';
      }
    }
  }
} 
