<?php
$file = 'results.txt';
$votes = ['Pancakes' => 0, 'Yorkshire Puddings' => 0];

// Load existing results
if (file_exists($file)) {
  $content = file_get_contents($file);
  $votes = json_decode($content, true);
}

// Record the new vote
if (isset($_POST['vote'])) {
  $vote = $_POST['vote'];
  if (array_key_exists($vote, $votes)) {
    $votes[$vote]++;
    file_put_contents($file, json_encode($votes));
  }
}

// Redirect to results
header('Location: results.php');
exit();
?>
