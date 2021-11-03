<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Form-Input Tag/Label List</h1>
    <a href="https://github.com/Rasalas/tag-list">
        <p>Auf Github</p>
    </a>
    <form action="output.php" method="post">
        <div name="it-giants" class="tag-container">
            <div data-value="Charles Babbage" class="tag">Charles Babbage</div>
            <div data-value="Alan Turing" class="tag">Alan Turing</div>
            <div data-value="Ada Lovelace" class="tag active">Ada Lovelace</div>
            <div data-value="Konrad Zuse" class="tag">Konrad Zuse</div>
            <div data-value="Steve Jobs" class="tag">Steve Jobs</div>
            <div data-value="Steve Wozniak" class="tag">Steve Wozniak</div>
            <div data-value="Larry Page" class="tag">Larry Page</div>
            <div data-value="Sergey Brin" class="tag">Sergey Brin</div>
            <div data-value="Robert Noyce" class="tag">Robert Noyce</div>
            <div data-value="Gordon Moore" class="tag">Gordon Moore</div>
            <div data-value="Bill Gates" class="tag">Bill Gates</div>
            <div data-value="Grace Hopper" class="tag active">Grace Hopper</div>
            <div data-value="Whitney Wolfe Herd" class="tag active">Whitney Wolfe Herd</div>
            <div data-value="Paul Allen" class="tag">Paul Allen</div>
            <div data-value="Elon Musk" class="tag">Elon Musk</div>
            <div data-value="Linus Torvalds" class="tag">Linus Torvalds</div>
            <div data-value="Jeff Bezos" class="tag">Jeff Bezos</div>
            <div data-value="Drew Houston" class="tag">Drew Houston</div>
            <div data-value="Jack Dorsey" class="tag">Jack Dorsey</div>
        </div>
        <input type="submit" value="Submit">
    </form>
    <script src="js/TagList.js"></script>
    <script>
        function domReady(fn) {
            // If we're early to the party
            document.addEventListener("DOMContentLoaded", fn);
            // If late; I mean on time.
            if (document.readyState === "interactive" || document.readyState === "complete") {
                fn();
            }
        }

        domReady(() => {

            new TagList('div[name=it-giants]')

        });
    </script>
</body>

</html>
<style>