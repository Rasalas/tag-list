<?php



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .tag-container {
            --bg-color-active: #008000;
            --bg-color-active-hover: #356fa1;
            --txt-color-active: #fff;
            --bg-color-inactive: #2b5579;
            --bg-color-inactive-hover: #039d03;
            --txt-color-inactive: #fff;
        }

        div.tag {
            min-width: 60px;
            width: fit-content;
            overflow: hidden;
            height: 30px;
            text-align: center;
            color: var(--txt-color-inactive);
            background-color: var(--bg-color-inactive);
            margin: 0.5em;
            padding: 0 0.8em 0 0.8em;
            border-radius: 7px;
            cursor: pointer;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        div.tag:hover {
            background-color: var(--bg-color-active-hover);
            ;
        }

        div.tag.active {
            color: var(--txt-color-active);
            background-color: var(--bg-color-active);
        }

        div.tag.active:hover {
            background-color: var(--bg-color-inactive-hover);
            ;
        }

        div.tag-container {
            background: #e9e9e9;
            min-width: 400px;
            min-height: 260px;
            max-width: 600px;
            display: flex;
            flex-wrap: wrap;
            align-content: flex-start;
        }
    </style>
</head>

<body>
    <form action="output.php" method="post">
        <div name="informatik-giganten" class="tag-container">
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
        <input type="submit" value="senden">
    </form>

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
            let id = 0;

            function addHiddenInput(context, container, id) {
                if(!context.classList.contains('active')){
                    context.classList.add('active');
                }
                

                hiddeninput_container = container.querySelector('span')
                if (hiddeninput_container === null) {
                    hiddeninput_container = container.insertAdjacentElement('afterBegin', document.createElement('span'));
                }

                let h_input = document.createElement('input')
                h_input.type = 'hidden';
                let container_name = container.getAttribute('name') || 'tags';
                h_input.name = `${container_name}[]` ;
                h_input.setAttribute('data-tagid', id);
                context.setAttribute('data-tagid', id++);
                h_input.value = context.dataset.value || context.innerHTML;
                hiddeninput_container.insertAdjacentElement('beforeEnd', h_input)
            }

            function removeHiddenInput(context, container) {
                context.classList.remove('active');
                container.querySelector(`span input[data-tagid='${context.dataset.tagid}']`).remove();
            }

            let container = document.querySelector('div.tag-container')
            container.querySelectorAll('div.tag.active').forEach(el => {
                addHiddenInput(el,container,id++);
            });

            let tags = document.querySelectorAll('div.tag');
            tags.forEach(el => {
                el.addEventListener('click', function() {

                    if (this.classList.contains('active')) {
                        // remove from input list
                        removeHiddenInput(this, container);
                    } else {
                        // add to input list
                        addHiddenInput(this, container, id++);
                    }

                });
            });
        });
    </script>
</body>

</html>
<style>