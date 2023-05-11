<?php

// Supported languages
$languages = array(
    'en' => 'English',
    'tl' => 'Tagalog',
    'es' => 'Spanish',
    'fr' => 'French',
    'de' => 'German',
    'it' => 'Italian',
    'ja' => 'Japanese',
    'ko' => 'Korean',
    'pt' => 'Portuguese',
    'ru' => 'Russian',
);

// Default languages are English for source and French for target
$source_language = 'en';
$target_language = 'fr';

if (isset($_POST['translate'])) {
    $source_text = $_POST['source_text'];
    $source_language = $_POST['source_language'];
    $target_language = $_POST['target_language'];

    $translate_curl = curl_init();

    curl_setopt_array($translate_curl, [
        CURLOPT_URL => "https://google-translate1.p.rapidapi.com/language/translate/v2",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "source={$source_language}&q={$source_text}&target={$target_language}",
        CURLOPT_HTTPHEADER => [
            "Accept-Encoding: application/gzip",
            "X-RapidAPI-Host: google-translate1.p.rapidapi.com",
            "X-RapidAPI-Key: 3c52a35e3amshed9b72e656e32abp1201c2jsn7f622d2f6625",
            "content-type: application/x-www-form-urlencoded"
        ],
    ]);

    $translation_response = curl_exec($translate_curl);
    $translation_err = curl_error($translate_curl);

    curl_close($translate_curl);

    if ($translation_err) {
        echo "cURL Error #:" . $translation_err;
    } else {
        $translation = json_decode($translation_response, true);
        if (isset($translation['error']) || !isset($translation['data']['translations'][0]['translatedText'])) {
            $translated_text = "Unable to translate. Please try again with correct words.";
        } else {
            $translated_text = $translation['data']['translations'][0]['translatedText'];
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Translation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<br><br>
<div class="container">
<a href="index.php" class="btn btn-secondary mb-3 mr-2">Back</a>
    <h2>My Translation</h2><br>
    <form method="post">
        <div class="form-group">
            <label for="source_language">Source Language:</label>
            <select class="form-control" name="source_language" id="source_language">
                <?php foreach ($languages as $language => $name) { ?>
                    <option value="<?php echo $language; ?>" <?php if($source_language==$language){echo 'selected';} ?>>
                        <?php echo $name; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="target_language">Target Language:</label>
            <select class="form-control" name="target_language" id="target_language">
                <?php foreach ($languages as $language => $name) { ?>
                    <option value="<?php echo $language; ?>" <?php if($target_language==$language){echo 'selected';} ?>>
                        <?php echo $name; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="source_text">Source Text:</label>
            <textarea class="form-control" name="source_text" id="source_text"
                      placeholder="Enter text to translate"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="translate">Translate</button>
    </form><br><br>
    <?php if (isset($_POST['translate'])){ ?>
<div class="panel panel-default">
<div class="panel-heading">Translation Result</div>
<div class="panel-body"><?php echo $translated_text; ?></div>
</div>
<?php } ?>
</div>
</body>
</html>