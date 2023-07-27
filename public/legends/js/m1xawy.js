/*
$('.register input[name="email"]').parent().css({"width" : "49%" , "display" : "inline-block" , "float" : "left"});
$('.register input[name="emailVerify"]').parent().css({"width" : "49%" , "display" : "inline-block" , "float" : "right"});
$('.register input[name="password"]').parent().css({"width" : "49%" , "display" : "inline-block" , "float" : "left"});
$('.register input[name="passwordVerify"]').parent().css({"width" : "49%" , "display" : "inline-block" , "float" : "right"});
$('.register input[name="captcha[input]"]').css({"margin-top" : "20px"});
*/

if ( window.location.pathname == '/' ){
    $('.topMenu ul.menu li:first-child').addClass('active');

}else {
    $(function(){
        var current = location.pathname;
        $('.topMenu ul.menu li a').each(function(){
            var $this = $(this);
            if($this.attr('href').indexOf(current) !== -1){
                $this.parent().addClass('active');
            }
        })
    });
}

if (document.location.pathname.indexOf("/auth/logout-page.html") == 0) {
    $(function () {
        setTimeout(function() {
            window.location.replace("/");
        }, 0);
    });
}

console.log("Powered by: PserverCMS | Coded by KoKsPfLaNzE"), console.log("Designer: @m1xawy | m1xawy#9363"), console.log("for Ambition")

