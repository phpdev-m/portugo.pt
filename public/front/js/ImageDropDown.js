/*global jQuery: false, document: false */
(function ($) { 
    function createDropDown() {
        var source = $('.countrydd select'),
            selected = source.find('option:selected'),
            options = $('option', source);
        $('.countrydd').append('<dl id="target" class="dropdown"></dl>');
        $('#target').append(
            '<dt><a href="#" class="sprite_flag sprite_flag_' +
            selected.val() +
            '"><span class="value">' +
            selected.val() +
            '</span></a></dt>'
        );
        $("#target").append('<dd><ul></ul></dd>');

        options.each(function () {
            var valueSel = $(this).val(),
                valueNam = $(this).text();

            if (valueSel === '') {
                valueSel = 'seperator';
            }

            $("#target dd ul").append(
                '<li class="sprite_flag sprite_flag_' +
                valueSel +
                '"><a href="#">' +
                valueNam +
                '<span class="value">' +
                valueSel +
                '</span></a></li>'
            );
        });
        source.hide();
    }
    createDropDown();

    $('.dropdown dt').click(function () {
		
        $(".dropdown dd ul").toggle();
    });
    $(document).bind('click', function (e) {
		
        var clicked = $(e.target);
        if (!clicked.parents().hasClass('dropdown')) {
            $('.dropdown dd ul').hide();
        }
    });
    $(".dropdown dd ul li a").click(function () {
		
        var text = $(this).html(),
            newClass = $(this).parent().attr('class');
			
        $(".dropdown dt a").attr('class', newClass);
        $(".dropdown dd ul").hide();
        var flg = $(".countrydd select").val($(this).find("span.value").html());
		
    });
}(jQuery));
