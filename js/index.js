//JS functions for the index page

$(function () {
    $("#faded").faded({
        speed: 500,
        crossfade: true,
        autoplay: 10000,
        autopagination: false
    });
    $('#domain-form').jqTransform({
        imgPath: 'images/'
    });
});