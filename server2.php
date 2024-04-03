<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fatch API</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <div class="Main-Box">
        <?php
        // This function is used to fatch data from API............
        function fetchData($url) {
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $Promish = curl_exec($curl);
            curl_close($curl);
            return json_decode($Promish, true);
        }

        //  First We have to Fetch  sends Data at list.........
        $Sends = fetchData('https://jsonplaceholder.typicode.com/posts?_limit=5');

        foreach ($Sends as $Take) {
            echo '<div class="post">';
            echo '<h2>' . $Take['title'] . '</h2>';
            echo '<p>' . $Take['body'] . '</p>';
            // Add data-postid attribute
            echo '<button class="btn" data-postid="' . $Take['id'] . '">Show Comments</button>'; 
            echo '<button class="hideBtn" data-postid="' . $Take['id'] . '">Hide Comments</button>';
            $Replay = fetchData('https://jsonplaceholder.typicode.com/comments?postId=' . $Take['id']);
            
            foreach ($Replay as $Shows) {
                echo '<div class="comment post-' . $Take['id'] . '">'; 
                echo '<strong>' . $Shows['name'] . '</strong><br>';
                echo '<em>' . $Shows['email'] . '</em><br>';
                echo '<p>' . $Shows['body'] . '</p>';
                echo '</div>';
            }
            
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
