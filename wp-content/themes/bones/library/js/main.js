/* Autor: Ondaweb | Comunicação Digital */
function updateViewportDimensions() {
  var w = window, d = document, e = d.documentElement, g = d.getElementsByTagName('body')[0], x = w.innerWidth || e.clientWidth || g.clientWidth, y = w.innerHeight || e.clientHeight || g.clientHeight;
  return { width: x, height: y };
}
var viewport = updateViewportDimensions();
var waitForFinalEvent = (function () {
  var timers = {};
  return function (callback, ms, uniqueId) {
    if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
    if (timers[uniqueId]) { clearTimeout(timers[uniqueId]); }
    timers[uniqueId] = setTimeout(callback, ms);
  };
})();
var timeToWaitForLast = 100;
function loadGravatars() {
  viewport = updateViewportDimensions();
  if (viewport.width >= 768) {
    jQuery('.comment img[data-gravatar]').each(function () {
      jQuery(this).attr('src', jQuery(this).attr('data-gravatar'));
    });
  }
} // end function
/* Ondaweb regular jQuery */
jQuery(document).ready(function ($) {

  /*  ANIMAÇÕES*/

  function init() {
    // start up after 2sec no matter what
    window.setTimeout(function () {
      start();
    }, 1000);
  }
  // fade in experience
  function start() {

    $('.animate.start').find('.fadeInUp').css({ bottom: 0, opacity: 1 });
    $('.animate.start').find('.fadeInRight').css({ right: 0, opacity: 1 });
    $('.animate.start').find('.fadeInLeft').css({ left: 0, opacity: 1 });
    $('.animate.start').find('h2.page-title').css({ bottom: 0, opacity: 1 });
    $('.animate.start').find('h1.page-title').css({ bottom: 0, opacity: 1 });
    $('.animate.start').find('.desc-title').css({ bottom: 0, opacity: 1 });
    $('.animate.start').find('h3').css({ bottom: 0, opacity: 1 });
    $('.animate.start').find('h1').css({ bottom: 0, opacity: 1 });
    $('.animate.start').find('h2').css({ bottom: 0, opacity: 1 });
    $('.animate.start').find('p').css({ bottom: 0, opacity: 1 });
    $('.animate.start').find('img').css({ bottom: 0, opacity: 1 });
    $('.animate.start').find('a').css({ bottom: 0, opacity: 1 });

  }

  $(window).load(function () {
    // fade in page
    init();
  });

  $(window).scroll(function () {
    var scrollCenter = $(window).height() / 2;
    $(".animate").each(function () {
      var workOffsetTop = $(this).offset().top - $(document).scrollTop();
      var workOffsetBot = workOffsetTop + $(this).height();
      if (workOffsetTop > scrollCenter) {

      } else if (workOffsetBot < scrollCenter) {

      } else {

        $(this).find('h2').css({ bottom: 0, opacity: 1 });
        $(this).find('.fadeInUp').css({ bottom: 0, opacity: 1 });
        $(this).find('.fadeInRight').css({ right: 0, opacity: 1 });
        $(this).find('.fadeInLeft').css({ left: 0, opacity: 1 });
        $(this).find('h1.page-title').css({ bottom: 0, opacity: 1 });
        $(this).find('.desc-title').css({ bottom: 0, opacity: 1 });
        $(this).find('h3').css({ bottom: 0, opacity: 1 });
        $(this).find('h1').css({ bottom: 0, opacity: 1 });
        $(this).find('h2').css({ bottom: 0, opacity: 1 });
        $(this).find('p').css({ bottom: 0, opacity: 1 });
        $(this).find('img').css({ bottom: 0, opacity: 1 });
        $(this).find('a').css({ bottom: 0, opacity: 1 });

      };
    });
  });

  var swiper = new Swiper('.swiper-container', {
    slidesPerView: 'auto',
    centeredSlides: true,
    paginationClickable: true,
    //spaceBetween: 5000,
    autoplay: {
      delay: 8000,
    },
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true,
    },
    //loop: true,
    // breakpoints: {
    //     // when window width is <= 320px
    //     1024: {
    //       slidesPerView: 2,
    //     },
    //     // when window width is <= 480px
    //     768: {
    //       slidesPerView: 1,
    //       spaceBetween: 20
    //     }
    //   }
  });

  // Menu mobile
  $('.js-active-menu').on('click', function() {
    $('.c-menu').toggleClass('is-active');
  });

  // Anima header
  $(window).on('scroll', function() {
    let header = $('.js-header');
    let $this = $(this);

    if ($this.scrollTop() != 0) {
      header.addClass('is-active');
    } else {
      header.removeClass('is-active');
    }
  });

  // Remove action
  $('.js-no-action').on('click', function(e) {
    e.preventDefault();
  });

  // ADD current menu
  $('.js-current').parent().parent().parent().find('.js-no-action').addClass('c-menu__current');

  // Active lang menu
  $('.js-lang').on('click', function() {
    $('.c-menu__lang-container').toggleClass('is-active');
    $(this).toggleClass('is-active');
  })

  // ANIMA MENU
  /* $('#menu-principal a').click(function(e){
       e.preventDefault();
       var anchor = $(this).attr('href');
       var marginTop = 80;
       var top = $(anchor).offset().top - marginTop;
       $('body').animate({ scrollTop: top }, 'slow');
   });*/
  // end.

  // SHOW E HIDE 
  /*$('.abre-post').on('click', function(e){
     if($(this).hasClass('active') ){
       $(this).removeClass('active').parent().find('.content-post').slideUp();
     } else {
         $('.abre-post').removeClass('active');
         $('.content-post').slideUp();
         $(this).addClass('active');
         $(this).parent().find('.content-post').slideDown();
     }
   });*/
  // end.

  // PLACEHOLDER  
  $('.placeholder input, .placeholder textarea').each(function () {
    var dataName;
    dataName = $(this).attr('data-name');
    $(this).before('<span>' + dataName + '</span>');
  });

  $('.placeholder input').parent().each(function () {  // busca o span e o input e adiciona a div
    $(this).find('span, input').wrapAll('<div class="styleInput" />')
  });

  $('.placeholder textarea').parent().each(function () { // busca o span e o input e adiciona a div
    $(this).find('span, textarea').wrapAll('<div class="styleInput" />')
  });

  $('.styleInput').click(function () {
    $(this).find('input, textarea').focus();
  });

  $('.styleInput input, .styleInput textarea').focus(function () {
    $(this).parent().find('span').hide();
  });

  $('.styleInput input, .styleInput textarea').blur(function () {
    if ($(this).val() == '' || $(this).val() == '__/__/____' || $(this).val() == '___.___.___-__' || $(this).val() == '(__) ____-_____' || $(this).val() == '(__) ____-____') {
      $(this).parent().find('span').show();
    }
  });
  // end.

  // BXSLIDER 
  /*$('.bxslider').bxSlider({
      mode: 'fade',
      pager: false,
      controls: false,
      pause: 4000
  });*/
  // end.

  // TRANSFORMA GALEIRA PARA BXSLIDER (opção em pho disponível na functions.php)
  /*transformaGaleria('#gallery-1');
  $('#gallery-1 a').attr('class', 'fancybox-button');
  $('#gallery-1 a').attr('rel', 'fancybox-button');

  $('.galeriabx').bxSlider({
      minSlides: 2,
      maxSlides: 2,
      slideWidth: 360,
      slideMargin: 10
  });

  $(".fancybox-button").fancybox({
      prevEffect      : 'none',
      nextEffect      : 'none',
      closeBtn        : false,
      helpers     : {
          title   : { type : 'inside' },
          buttons : {}
      }
  });*/
  // end.

  // BT MATERIAL
  /*$('.btnTopo').click(function(){
    $('html, body').animate({scrollTop: 0},'slow');
  });*/
  // end.

  // BLOCKQUOTE
  /*$('blockquote').wrapAll('<div class="blockquote-wrap" />');
  $('blockquote').before('<div class="blockquote-before"> &ldquo; </div>');
  $('blockquote').after('<div class="blockquote-after"> &rdquo; </div>');
  var altura = $('blockquote').height();
  $('.blockquote-after').attr('style', 'padding-top:' + altura + 'px');*/
  // end.

  // PERSONALIZAR INPUT FILE
  /*$('#anexo').change(function(){
       var arquivo = $(this).val();     
       parteArquivo =   arquivo.split('\\');
       $('#arquivo').html(parteArquivo[parteArquivo.length-1]);
   });*/
  // end.

  // VALIDATE
  /*$('#formulario-contato').validate({
    rules:{
      assunto:{ required: true },
      nome:{ required: true },
      email:{ required: true, email: true },
      mensagem: { required: true }
    },
    messages:{
      assunto: { required: "*" },
      nome: { required: "*" },
      email:{ required: "*", email: "<sup>x</sup>" },
      mensagem: { required: "*" }
    }
  });*/
  // end.

  // MASKED INPUT
  /*$(function($){
      $(".data").mask("99/99/9999");
      $(".cpf").mask("999.999.999-99");
      $(".cep").mask("99999-999");
      $(".cnpj").mask("99.999.999/9999-99")
  });
  $(function($){
    $('.telefone').focusout(function(){
      var phone, element;
      element = $(this);
      element.unmask();
      phone = element.val().replace(/\D/g, '');
      if(phone.length > 10) {
        element.mask("(99) 99999-999?9");
      } else {
        element.mask("(99) 9999-9999?9");
      }
    }).trigger('focusout');
  });*/
  // end.

  loadGravatars();

}); /* end of as page load scripts */

// TRANSFORMA GALERIA PARA BXSLIDER
/*function transformaGaleria(galeria){
    var gal = jQuery(galeria).html();
    jQuery(galeria).html('');
    jQuery(galeria).append('<ul class="galeriabx">');
    jQuery(galeria).find('ul').append(gal);

    jQuery(galeria).find('dl').each(function(){
       var dl = jQuery(this).html();
       jQuery(this).after('<li>' + dl + '</li>');
       jQuery(this).remove();
    });
    jQuery(galeria).find('br').remove();
};*/
  // end.
