<?php
$number = 5;

echo "<table style='border-collapse: collapse;'>";
echo "<tr><th>Number</th><th>Result</th></tr>";

for ($i = 1; $i <= 10; $i++) {
  echo "<tr>";
  echo "<td style='border: 1px solid black; padding: 5px;'>$number × $i</td>";
  echo "<td style='border: 1px solid black; padding: 5px;'>" . ($number * $i) . "</td>";

  echo "</tr>";
}

echo "</table>";
?>