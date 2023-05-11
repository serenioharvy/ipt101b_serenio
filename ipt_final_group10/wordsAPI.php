<!DOCTYPE html>
<html>
<head>
  <title>Words Look-Up</title>
  <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
  <a href="index.php" class="btn btn-secondary mb-3 mr-2">Back</a>
    <h1>Words Look-Up</h1>

    <form method="GET" action="wordsAPI.php">
      <div class="form-group">
        <label for="word">Enter a word:</label>
        <input type="text" id="word" name="word" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <?php if (isset($_GET['word'])): ?>
      <hr>
      <h2>Results for "<?php echo $_GET['word']; ?>"</h2>

      <?php
        $curl = curl_init();

        curl_setopt_array($curl, [
          CURLOPT_URL => "https://dictionary-by-api-ninjas.p.rapidapi.com/v1/dictionary?word=" . urlencode($_GET['word']),
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: dictionary-by-api-ninjas.p.rapidapi.com",
            "X-RapidAPI-Key: 940ac005ffmsh206d7ab6288af03p1d7647jsnd33eb8af2bbf"
          ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "<p>cURL Error #:" . $err . "</p>";
        } else {
          echo $response;
        }
      ?>

    <?php endif; ?>
  </div>
</body>
</html>
