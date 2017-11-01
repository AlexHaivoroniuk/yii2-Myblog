$(document).on("click", '.reg', function (e) {
    e.preventDefault();
    $('.form').html('Loading...');
    $.ajax({
        url: '/site/register',
        type: 'get',
        async: false,
        success: function (res) {
            $('.form').html(res);
           // console.log('Всё хорошо!!!');
        },
        error: function (res) {
            console.log('Bad!!!');
        }
    });
});
