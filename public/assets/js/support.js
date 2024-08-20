
$('#stars li').on('mouseover', function() {
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e) {
        if (e < onStar) {
            $(this).addClass('hover');
        } else {
            $(this).removeClass('hover');
        }
    });

}).on('mouseout', function() {
    $(this).parent().children('li.star').each(function(e) {
        $(this).removeClass('hover');
    });
});


$('#stars li').on('click', function() {
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');

    for (i = 0; i < stars.length; i++) {
        $(stars[i]).removeClass('selected');
    }

    for (i = 0; i < onStar; i++) {
        $(stars[i]).addClass('selected');
    }

    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "";
    if (ratingValue > 2) {
        msg = "Thanks! You rated this " + ratingValue + " stars.";
    } else {
        msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
    }
    $('#rating').val(ratingValue);
    responseMessage(msg);
});


function responseMessage(msg) {
    $('.rating-box').hide();
    $('.success-box').show();
    $('.success-box div.text-message').html(msg);
}

$(".blog-button").click(function() {
    var title = $("#title").val();
    var description = $("#description").val();
    var name = $("#name").val();
    var email = $("#email").val();
    var rating = $("#rating").val();

    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z.-]+\.[a-zA-Z]{2,4}$/;

    if (title == "") {
        document.getElementById('title').style.backgroundColor = '#ffc6c6';
        document.getElementById("title").focus();
        return false;
    } else {
        document.getElementById('title').style.backgroundColor = '#fff';
    }

    if (description == "") {
        document.getElementById('description').style.backgroundColor = '#ffc6c6';
        document.getElementById("description").focus();
        return false;
    } else {
        document.getElementById('description').style.backgroundColor = '#fff';
    }

    if (name == "") {
        document.getElementById('name').style.backgroundColor = '#ffc6c6';
        document.getElementById("name").focus();
        return false;
    } else {
        document.getElementById('name').style.backgroundColor = '#fff';
    }

    if (email == "") {
        document.getElementById('email').style.backgroundColor = '#ffc6c6';
        document.getElementById("email").focus();
        return false;
    } else if (!emailPattern.test(email)) {
        document.getElementById('email').style.backgroundColor = '#ffc6c6';
        document.getElementById("email").focus();

        return false;
    } else {
        document.getElementById('email').style.backgroundColor = '#fff';
    }

    if (rating == "") {
        $('.rating-box').show();
        $('.rating-box div.text-message').html("Please rate us to Submit your Review.");
        $('#rating-box').focus();
        return false;
    } else {
        document.getElementById('rating').style.backgroundColor = '#fff';
    }
});
