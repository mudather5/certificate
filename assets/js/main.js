$(function() {
    $("h3").css({"margin-top": "7%"});
    $(".computer").css({"margin-top": "7%"});
    $(".head").css({"margin-left": "66%"});
    $(".signup").css({"background": "white", "font-size": "120%"});
    $(".Items").css({"display": "none"});
    $('.login-page h1 span').click(function(){
      $(this).addClass('selected').siblings().removeClass('selected');
      $('.login-page form').hide();
     $('.' + $(this).data('class')).show(100);

    });



    // $("h4").css({"margin": "4%"});
    // 'use strict';

    $('[placeholder]').focus(function(){
      $(this).attr('data-text', $(this).attr('placeholder'));
      $(this).attr('placeholder', '');
    }).blur(function(){
      $(this).attr('placeholder', $(this).attr('data-text'));

    });



});

$( ".signup" ).mouseover(function() {
    $( ".signup" ).css( "background-color", "white" );
  });
  $( ".signup" ).mouseover(function() {
    $( ".signup" ).css( "font-size", "180%");
  });
  

  $( ".signup" ).mouseout(function() {
    $( ".signup" ).css( "background-color", "white" );
  });
  $( ".signup" ).mouseout(function() {
    $( ".signup" ).css( "font-size", "120%" );
  });

  $( ".eye" ).mouseover(function() {
    $( ".eye i" ).css( "color", "#E92969" );
  });
  $( ".eye" ).mouseout(function() {
    $( ".eye i" ).css( "color", "dodgerblue" );
  });


  