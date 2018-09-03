$(function(){
 $('#pd').on('change', function(){
  if($('#pd').prop('checked')){
        $('#application').removeAttr('disabled');
        $("#application").show("slow");
  }else{
        $('#application').attr('disabled', 'disabled');
        $("#application").hide("slow");
  }
 });
});

$(function(){
 $('#pdgoogle').on('change', function(){
  if($('#pdgoogle').prop('checked')){
        
        if($('#inputpdgoogle').prop('checked')){

        
            $("#btngoogle").show("slow");
            $("#fio").show("slow");
            $("#phone").show("slow");
            $("#inn").show("slow");
            $("#snils").show("slow");
            $("#pasport").show("slow");
            $("#card_number").show("slow");
            $("#captcha").show("slow");

            $('#btngoogle').removeAttr('disabled');

            if(($('#fio').val() == ''))
            {
                  $('#fio').removeAttr('disabled');   
            }
            else{
                  $('#fio').css('background','#A9A9A9');
            }
            if(($('#phone').val() == ''))
            {
                  $('#phone').removeAttr('disabled');
            }
            else{
                  $('#phone').css('background','#A9A9A9');
            }
            if(($('#inn').val() == ''))
            {
                  $('#inn').removeAttr('disabled');
            }
            else{
                  $('#inn').css('background','#A9A9A9');
            }
            if(($('#snils').val() == ''))
            {
                  $('#snils').removeAttr('disabled');
            }
            else{
                  $('#snils').css('background','#A9A9A9');
            }
            if(($('#pasport').val() == ''))
            {
                  $('#pasport').removeAttr('disabled');
            }
            else{
                  $('#pasport').css('background','#A9A9A9');
            }     
            if(($('#card_number').val() == ''))
            {
                  $('#card_number').removeAttr('disabled');
            }
            else{
                  $('#card_number').css('background','#A9A9A9');
            }
            
    



  }}else{
            $("#btngoogle").hide("slow");
            $("#fio").hide("slow");
            $("#phone").hide("slow");
            $("#inn").hide("slow");
            $("#snils").hide("slow");
            $("#pasport").hide("slow");
            $("#card_number").hide("slow");
            $("#captcha").hide("slow");

            $('#btngoogle').attr('disabled', 'disabled');
            $('#fio').attr('disabled', 'disabled');
            $('#phone').attr('disabled', 'disabled');
            $('#inn').attr('disabled', 'disabled');
            $('#snils').attr('disabled', 'disabled');
            $('#pasport').attr('disabled', 'disabled');
            $('#card_number').attr('disabled', 'disabled');


  }
 });
});

$(function(){
 $('#pdvk').on('change', function(){
  if($('#pdvk').prop('checked')){
        $('#btnvk').removeAttr('disabled');        
        $("#btnvk").show("slow");
  }else{
        $('#btnvk').attr('disabled', 'disabled');
        $("#btnvk").hide("slow");
  }
 });
});
$(function(){
 var chbx = $('.formsignin :checkbox').on('change', function(){
       //console.log('Value: ' + $(this).val() + '\n' + 'ID: ' + $(this).attr('id') + '\n' + 'Index: ' + chbx.index(this));
       if($(this).val() == "on"){
            $(".btnsaveData").show("slow");
            $('.btnsaveData').removeAttr('disabled');

       }
       else{
            $(".btnsaveData").hide("slow");
            $('.btnsaveData').attr('disabled', 'disabled');
       }
 })
})

$(function(){
 $('#inputpdgoogle').on('change', function(){
  if($('#inputpdgoogle').prop('checked')){
        if($('#pdgoogle').prop('checked')){

        $("#btngoogle").show("slow");
            $("#fio").show("slow");
            $("#phone").show("slow");
            $("#inn").show("slow");
            $("#snils").show("slow");
            $("#pasport").show("slow");
            $("#card_number").show("slow");
            $("#captcha").show("slow");

            $('#btngoogle').removeAttr('disabled');
            
            if(($('#fio').val() == ''))
            {
                  $('#fio').removeAttr('disabled');   
            }
            else{
                  $('#fio').css('background','#A9A9A9');
            }
            if(($('#phone').val() == ''))
            {
                  $('#phone').removeAttr('disabled');
            }
            else{
                  $('#phone').css('background','#A9A9A9');
            }
            if(($('#inn').val() == ''))
            {
                  $('#inn').removeAttr('disabled');
            }
            else{
                  $('#inn').css('background','#A9A9A9');
            }
            if(($('#snils').val() == ''))
            {
                  $('#snils').removeAttr('disabled');
            }
            else{
                  $('#snils').css('background','#A9A9A9');
            }
            if(($('#pasport').val() == ''))
            {
                  $('#pasport').removeAttr('disabled');
            }
            else{
                  $('#pasport').css('background','#A9A9A9');
            }     
            if(($('#card_number').val() == ''))
            {
                  $('#card_number').removeAttr('disabled');
            }
            else{
                  $('#card_number').css('background','#A9A9A9');
            }
    
            
  }}else{
            $("#btngoogle").hide("slow");
            $("#fio").hide("slow");
            $("#phone").hide("slow");
            $("#inn").hide("slow");
            $("#snils").hide("slow");
            $("#pasport").hide("slow");
            $("#card_number").hide("slow");
            $("#captcha").hide("slow");

            $('#btngoogle').attr('disabled', 'disabled');
            $('#fio').attr('disabled', 'disabled');
            $('#phone').attr('disabled', 'disabled');
            $('#inn').attr('disabled', 'disabled');
            $('#snils').attr('disabled', 'disabled');
            $('#pasport').attr('disabled', 'disabled');
            $('#card_number').attr('disabled', 'disabled');

  }
 });
});