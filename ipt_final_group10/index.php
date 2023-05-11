<!DOCTYPE html>
<html>
<head>
    <title>Home</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>

<body>
    <br><br>

    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="button-row text-left">
                    <a class="btn btn-primary" href="viewuser.php">View Users</a>
                    <span style="padding: 0px 10px;"></span>
                    <a class="btn btn-success" href="gtranslateAPI.php">My Translation</a>
                    <span style="padding: 0px 10px;"></span>
                    <a class="btn btn-info" href="wordsAPI.php">Word Look-up</a>
                    <span style="padding: 0px 10px;"></span>
                    <a class="btn btn-danger" href="logout.php">Logout</a>
                </div>
            </div>
        </div>

        <h2 style="font-weight: bold; font-size: 35px">My Translation and Words Lookup App</h2><br>

        <div class="row">
            <div class="col-md-6">
                <h3>"About My Translation and Words Look-up "</h3>
                <p style= "font-size: 17px">
                    The My Translation provides a simple programmatic interface for translating an arbitrary string into
                    any supported language using state-of-the-art Neural Machine Translation. It is highly responsive,
                    so websites and applications can integrate with Translation API for fast, dynamic translation of source
                    text from the source language to a target language (such as French to English).
                    Language detection is also available in cases where the source language is unknown.
                    The underlying technology is updated constantly to include improvements
                    from Google research teams, which results in better translations and new languages and language pairs. 
                    And Words Lookup lets you retrieve information about English words, including definitions, Look up tens of 
                    thousands of words in the English dictionary.

                </p>
            </div>

            <div class="col-md-6">
                <img src="../ipt/logo.png" alt="logo.png" class="img-responsive" width="400" height="100" style="display:block; margin: 0 auto;">
            </div>
        </div>

        <br><br>
    </div>

</body>
</html>
