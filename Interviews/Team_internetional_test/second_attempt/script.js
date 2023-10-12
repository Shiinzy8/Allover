$(document).ready(function(){
    $(".specific").hover(function(){
            $(".hidden").css("display", "block");
        }, function(){
            $(".hidden").css("display", "none");
        });

    $(".hidden").hover(function(){
            $(this).css("display", "block");
            $(".tooltip").css("visibility", "visible");
         }, function(){
            $(this).css("display", "none");
            $(".tooltip").css("visibility", "hidden");
            $(".tooltip").text("Copy to clipboardpied");
         });

    var attr = $(".specific").data("copy");

    if (typeof attr === typeof undefined || attr === false) {
        attr = $(".specific").innterText;
    }

    $(".hidden").click(function(){
            var val = "Copied";
            $(".tooltip").text("Copied");
            navigator.clipboard.writeText(attr);
        });
});
