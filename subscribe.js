$('#subscribe-form').submit(function(e) {
    e.preventDefault();
    $.ajax({
        url: 'subscribe.php',
        method: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(response) {
            if (response.status === 'subscribed') {
                alert('Subscribed successfully!');
            } else if (response.status === 'already_subscribed') {
                alert('You are already subscribed.');
            } else {
                alert('Failed to subscribe.');
            }
        }
    });
});