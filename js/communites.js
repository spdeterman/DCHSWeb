/**
 * Created by Bensly on 4/2/2015.
 */
(function(){
    //alert("This is working.")

    function hideAllButFirst(){
        $('#v-nav>div.tab-content').hide();
    }
})();

$(function() {
    var items = $('#v-nav>ul>li').each(hideTabs);

    function hideTabs() {
        $(this).click(function () {

            items.removeClass('current');
            $(this).addClass('current');


            $('#v-nav>div.tab-content').hide().eq(items.index($(this))).show('fast');

            window.location.hash = $(this).attr('tab');
        });
    }

});
