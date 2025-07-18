$(document).ready(function() {
    $('#loginTypeTab button[data-bs-toggle="pill"]').on('shown.bs.tab', function (e) {
        console.log('Tab shown:', e.target.id);
        console.log('Previous tab:', e.relatedTarget ? e.relatedTarget.id : 'None');
    });

    $('form').on('submit', function(event) {
        var accountId = $(this).find('input[name="account_id"]').val();
        var username = $(this).find('input[name="username"]').val();
        var password = $(this).find('input[name="password"]').val();

        if (!accountId || !username || !password) {
            alert('Please enter Account ID, Username, and Password.');
            event.preventDefault();
            return false;
        }
    });
});