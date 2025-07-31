<?php
$file = 'results.txt';
$votes = ['Pancakes' => 0, 'Yorkshire Puddings' => 0];

if (file_exists($file)) {
  $content = file_get_contents($file);
  $votes = json_decode($content, true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Poll Results</title>
  <style>
    body { font-family: Arial, sans-serif; padding: 2em; background: #f7f7f7; }
    .results { max-width: 400px; margin: auto; background: white; padding: 2em; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    h2 { text-align: center; }
    .bar { background: #ddd; border-radius: 4px; overflow: hidden; margin-bottom: 1em; }
    .fill { background: #4caf50; height: 20px; color: white; text-align: center; }
  </style>
</head>
<body>
  <div class="results">
    <h2>Poll Results</h2>
    <?php
      $total = $votes['Pancakes'] + $votes['Yorkshire Puddings'];
      foreach ($votes as $option => $count) {
        $percent = $total ? round(($count / $total) * 100) : 0;
        echo "<p><strong>$option:</strong> $count votes ($percent%)</p>";
        echo "<div class='bar'><div class='fill' style='width: {$percent}%;'>$percent%</div></div>";
      }
    ?>
    <p style="text-align: center;"><a href="index.html">Back to Vote</a></p>
  </div>
</body>
</html>
