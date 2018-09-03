$(function(){
$('.cross').click(function(){
    $(this).parent().parent().remove();
    var totalRes = $('#resourseTotal').text() - 1;
    $('#resourseTotal').text(totalRes);
    //border-left:5px solid #5cf442;
    if(totalRes == "0")
    {
        $("#border").removeAttr("style");
        $('#border').addClass('borderedit');
        $('#border').css({"padding": "10px",
             "display": "inline-block", 
             "margin":"10px", 
             "border-radius":"10px",
             "border-right-color": "#0c235a",
             "border-right-width": "2px",
             "border-right-style": "solid",

             "border-bottom-color": "#0c235a",
             "border-bottom-width": "2px",
             "border-bottom-style": "solid",

             "border-top-color": "#0c235a",
             "border-top-width": "2px",
             "border-top-style": "solid",

             "border-left-color": "#5cf442",
             "border-left-width": "5px",
             "border-left-style": "solid",
        });
    }
});});