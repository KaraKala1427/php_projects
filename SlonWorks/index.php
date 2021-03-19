<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.js" integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" type="text/css" href="slonw.css">
    <title>SlonWorks</title>
</head>

<body>
    <a href=# class="test open-modal" id="test_click" data-modal="popup">Тест</a>

    <div class="modal1 js-modal" data-modal="popup">
        <svg class="modal_close modal-close-js" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"/></svg>
        <p class="modal_title">Введите порядок числа фибоначи</p>
        <center><input type="number" id="fib_number" name="fib_number" min="1" oninput="validity.valid || (value='');"></center>
        <br>
        <center><button id="send_number" class="btn btn-primary">OK</button></center>
        <br>
    </div>
    <center><div id="result"></div></center>
    
    <div class="overlay overlay-modal"></div>


    <script src="script.js"></script>
</body>

</html>