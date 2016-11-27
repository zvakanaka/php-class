<?php
  $lifetime = 60 * 60 * 24 * 14;             // 1 fortnight in seconds
  session_set_cookie_params($lifetime, '/');
  session_start();

  if (!isset($_SESSION['investment'])) {
     $investment = '10000';
   } else {
    $investment = $_SESSION['investment'];
  }

  if (!isset($_SESSION['interest_rate'])) {
     $interest_rate = '5';
   } else {
    $interest_rate = $_SESSION['interest_rate'];
  }

  if (!isset($_SESSION['years'])) {
     $years = '5';
   } else {
    $years = $_SESSION['years'];
  }

  if (!isset($_SESSION['monthly'])) {
     $monthly = FALSE; 
   } else {
    $monthly = $_SESSION['monthly'];
  }

  $action = filter_input(INPUT_POST, 'action');
  switch ($action) {
    case 'display_results':
      // get the data from the form
      $_SESSION['investment'] = filter_input(INPUT_POST, 'investment',
              FILTER_VALIDATE_FLOAT);
      $investment = $_SESSION['investment'];

      $_SESSION['interest_rate'] = filter_input(INPUT_POST, 'interest_rate',
              FILTER_VALIDATE_FLOAT);
      $interest_rate = $_SESSION['interest_rate'];

      $_SESSION['years'] = filter_input(INPUT_POST, 'years',
              FILTER_VALIDATE_INT);
      $years = $_SESSION['years'];

      $_SESSION['monthly'] = isset($_POST['monthly']);
      $monthly = $_SESSION['monthly'];

      // validate investment
      if ($investment === FALSE ) {
          $error_message = 'Investment must be a valid number.';
      } else if ( $investment <= 0 ) {
          $error_message = 'Investment must be greater than zero.';
      // validate interest rate
      } else if ( $interest_rate === FALSE )  {
          $error_message = 'Interest rate must be a valid number.';
      } else if ( $interest_rate <= 0 ) {
          $error_message = 'Interest rate must be greater than zero.';
      // validate years
      } else if ( $years === FALSE ) {
          $error_message = 'Years must be a valid whole number.';
      } else if ( $years <= 0 ) {
          $error_message = 'Years must be greater than zero.';
      } else if ( $years > 30 ) {
          $error_message = 'Years must be less than 31.';
      // set error message to empty string if no invalid entries
      } else {
          $error_message = '';
      }

      // if an error message exists, go to the index page
      if ($error_message != '') {
          include('index.php');
          exit();
      }

      // calculate the future value
      $future_value = $investment;
      $terms = ($monthly) ? $years/12 : $years;
      for ($i = 1; $i <= $terms; $i++) {
          $future_value = ($future_value + ($future_value * $interest_rate *.01));
      }

      // apply currency and percent formatting
      $investment_f = '$'.number_format($investment, 2);
      $yearly_rate_f = $interest_rate.'%';
      $future_value_f = '$'.number_format($future_value, 2);
      include('display_results.php');
      break;
    default:
    //set default value of variables for initial page load

    include('future.php');
  }
?>
