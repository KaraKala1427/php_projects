// Ниже реализована модальное окно на чистом JS (ОТКРЫТИЕ и ЗАКРЫТИЕ и кнопка ОК) 
var test = document.querySelector(".test");
var overlay = document.querySelector(".overlay");
var close = document.querySelector(".modal-close-js");
var ok = document.querySelector("#send_number");

test.addEventListener('click', function(event) {
    event.preventDefault();
    // console.log("clicked");

    var modal_name = test.getAttribute('data-modal');
    var modal = document.querySelector('.js-modal[data-modal="' + modal_name + '"]');
    modal.classList.add('show');
    overlay.classList.add('show');
    document.getElementById("result").innerHTML = "";
    document.getElementById("result").classList.remove('show');
});

close.addEventListener('click', function() {
    let parent = this.parentNode;
    parent.classList.remove('show');
    overlay.classList.remove('show');
});

ok.addEventListener('click', function() {
    document.getElementById("result").classList.add('show');
    let parent = this.parentNode.parentNode;
    parent.classList.remove('show');
    overlay.classList.remove('show');

})

// Ниже реализована альтернатива модальное окно на Jquery (ОТКРЫТИЕ и ЗАКРЫТИЕ) 
// Сперва думал что сделаю это все на Jquery , птм на задание увидел что JS попап и подумал надо на чистом JS
// поэтому остановился и начал писать на чистом Js  

// $('.open-modal').click(function(event) {
//     event.preventDefault();
//     var mdname = $(this).attr('data-modal');
//     console.log(mdname);
//     var md = $('.js-modal[data-modal = "' + mdname + '"]');
//     md.addClass("show");
//     $('.overlay').addClass('show')
// });

// $('.modal-close-js').click(function() {
//     $(this).parent('.js-modal').removeClass('show');
//     $('.overlay.show').removeClass('show');
// });


// Ниже передаю порядок числа фиббоначи на файл php

$(document).ready(function() {
    $('#send_number').click(function() {
        var fib_number = $('#fib_number').val();
        // console.log(fib_number);
        $.ajax({
            url: "fibonacci.php",
            type: "POST",
            data: {
                'fib_number': fib_number,
            },
            success: function(data) {
                $('#result').html(data);
                $('#fib_number').val('');
                // console.log(data);
            }
        });


    });
});