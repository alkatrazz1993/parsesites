$(document).ready(function () {
    $("#phone").mask("+7(999) - 999-99-99");
	$('#inn').mask('999999999999');
	$('#snils').mask('999-999-999 99');
	$('#pasport').mask('99-99 999999');
	$('#pasport-division').mask('999-999');
	$('#card_number').mask('9999 9999 9999 9999');


$('#fio').blur(function() {
  var pattern = /^([А-ЯЁA-Z]|[А-ЯЁA-Z][\x27а-яёa-z]{1,}|[А-ЯЁA-Z][\x27а-яёa-z]{1,}\-([aА-яЯёЁaA-zZ][\x27а-яёa-z]{1,}|(оглы)|(кызы)))\040[А-ЯЁA-Z][\x27а-яёa-z]{1,}(\040[А-ЯЁA-Z][\x27а-яёa-z]{1,})?$/;

        if((pattern.test($('#fio').val()))) { 
            $('#check').show('slow');
            $('#uncheck').hide('slow');
            $('#checkall').hide('slow').text('');
            $('#btngoogle').removeAttr('disabled'); 
    }else{
            if(($('#fio').val() == ''))
            {
                $('#check').hide('slow');
                $('#btngoogle').removeAttr('disabled'); 
                $('#uncheck').hide('slow');
                 //$('#checkall').show('slow').text('Заполните хоть одно поле');
            }
            else
            {
                //$('#checkall').hide('slow').text('');
                $('#btngoogle').attr('disabled', 'disabled');
                $('#check').hide('slow');
                $('#uncheck').show('slow');  
                //$('#fio').focus();
            }
    }
  
})
$('#phone').blur(function() {
    var str=$('#phone').val();
    var i=str.length-str.replace(/\d/gm,'').length;
if(i == '11')
{
    $('#check_phone').show('slow');
    $('#btngoogle').removeAttr('disabled');   
}
})

$('#inn').blur(function() {
    var str=$('#inn').val();
    var i=str.length-str.replace(/\d/gm,'').length;
if(i == '12')
{
    $('#check_inn').show('slow');
    $('#btngoogle').removeAttr('disabled');   
}
})

$('#snils').blur(function() {
    var str=$('#snils').val();
    var i=str.length-str.replace(/\d/gm,'').length;
if(i == '11')
{
    $('#check_snils').show('slow');
    $('#btngoogle').removeAttr('disabled');   
}
})

$('#pasport').blur(function() {
    var str=$('#pasport').val();
    var i=str.length-str.replace(/\d/gm,'').length;
if(i == '10')
{
    $('#check_pasport').show('slow');
    $('#btngoogle').removeAttr('disabled');   
}
})

$('#card_number').blur(function() {
    var str=$('#card_number').val();
    var i=str.length-str.replace(/\d/gm,'').length;
if(i == '16')
{
    $('#check_card_number').show('slow');
    $('#btngoogle').removeAttr('disabled');   
}
})
//($('#inn').val() != '')||($('#snils').val() != '')||($('#pasport').val() != '')||($('#card_number').val() != '')
/*if($('#inputpdgoogle').prop('checked')){
        if($('#pdgoogle').prop('checked')){
            $('input')(function() {
                if(($('#fio').val() != '')||($('#phone').val() != '')||($('#inn').val() != '')||($('#snils').val() != '')||($('#pasport').val() != '')||($('#card_number').val() != ''))
                {
                    $('#checkall').hide('slow').text('');
                    $('#btngoogle').removeAttr('disabled');    
                }
            })
        }
}*/


    document.getElementById('btngoogle').onclick = function () {
      if(($('#fio').val() == '')&&($('#phone').val() == '')&&($('#inn').val() == '')&&($('#snils').val() == '')&&($('#pasport').val() == '')&&($('#card_number').val() == ''))
            {
                $('#btngoogle').attr('disabled', 'disabled');
                $('#checkall').show().text('Заполните хоть одно поле!');      
            }
            else
            {
                //$('#btngoogle').attr('disabled', 'disabled');
                $('#checkall').hide('slow').text('');
                $('#btngoogle').removeAttr('disabled');
                if ($(".Box").is(":hidden")) {
                    $("#divleft").hide("slow");
                    $("#pdncontent").hide("slow");
                    $("#pdncontentg").hide("slow");
                    $("#pdncontenty").hide("slow");
                    $(".loading-wrap").show("slow");
                    $("#formgoogle").hide("slow");
                    $("#footer").hide("slow");
                    $("#btngroup").hide("slow");
                    $("#header").hide("slow");
                    $("#headerpd").hide("slow");
                    $("#headerpdy").hide("slow");
                    $("#headerpdg").hide("slow");
                    $("#headerpdg").hide("slow");
                    $("#headerpdy").hide("slow");
                    $("#vuln").hide("slow");
                    $("#vulny").hide("slow");
                    $("#vulng").hide("slow");
                    $("#progressdiv").show("slow");
                    //$('#body').animate({'background-color':'grey'},200);


                    timeout = setTimeout( function() {
                    $("#body").addClass('bodystyle');

                }, 75 );
                }       
                    var elem = document.getElementById("progress");
                    var width = 1;
                    var id = setInterval(frame, 83);
                    function frame() {
                        if (width >= 100) {
                        clearInterval(id);
                        } else {
                        width++; 
                        elem.style.width = width + '%';
                        $("#progress").text(width+'%');
                        window.onload=function(){
                            $(".loading-wrap").show("slow");
                            $("#progressdiv").show("slow");
                            elem.style.width = 100 + '%';
                            $("#progress").text(100+'%');
                            $(".loading-wrap").hide("slow");
                            $("#progressdiv").hide("slow");
                            return;
                        }
                        }
                    }

            }      
            
    
        }
});
/*$(document).ready(function () {
    document.getElementById('btnvk').onclick = function () {
        alert('g');
    if ($(".Box").is(":hidden")) {
        $(".loading-wrap").show("slow");
        $("#formvk").hide("slow");
        $("#header").hide("slow");
        $("#headerpdvk").hide("slow");
        
        timeout = setTimeout( function() {
        $("#bodyvk").addClass('bodystyle');

    }, 75 );
    }}
});*/



/*
 var $data = {};
        // переберём все элементы input, textarea и select формы с id="myForm "
        $('#formgoogle').find('input').each(function() {
        // добавим новое свойство к объекту $data
        // имя свойства – значение атрибута name элемента
        // значение свойства – значение свойство value элемента
            var text = $(this).val();
            if(this.name == "fio")
            {
                //$(".textli").text(text);
                //$("#value").text(text);
            } 
        //if (document.readyState === "complete") {

        //}
*/