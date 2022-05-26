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

  // Animated

  function animatedOnScroll() {
    $(window).on('scroll', function() {
      const winHeight = $(this).innerHeight();
      const winScroll = $(this).scrollTop() + winHeight;

      $('.js-animated').each(function() {
        const $this = $(this);
        const elTop = $this.offset().top;

        if(winScroll >= elTop + winHeight / 3) {
          $this.addClass('is-visible');
        } else {
          $this.removeClass('is-visible');
        }
      });
    });
  }

  animatedOnScroll();

  function start() {
    $('.js-animated-start').addClass('is-visible');
  }

  $(window).on('load', function() {
    window.setTimeout(function() {
      start();
    }, 1000);
  });

  // Sliders

  var swiper = new Swiper('.js-home-slider', {
    slidesPerView: 'auto',
    autoplay: {
      delay: 8000,
    },
    pagination: {
      el: '.js-home-slider .swiper-pagination',
      type: 'bullets',
      clickable: true,
    },
    navigation: {
      nextEl: ".js-home-slider .button-next",
      prevEl: ".js-home-slider .button-prev",
    },
  });

  var swiper = new Swiper('.js-slider-layout', {
    slidesPerView: 2,
    spaceBetween: 60,
    watchOverflow: true,
    pagination: {
      el: '.js-slider-layout .swiper-pagination',
      type: 'bullets',
      clickable: true,
    },
    breakpoints: {
      768: {
        spaceBetween: 10
      },
      767: {
        slidesPerView: 1
      },
    }
  });

  var swiper = new Swiper('.js-slider-view-more', {
    slidesPerView: 1,
    watchOverflow: true,
    pagination: {
      el: '.js-slider-view-more .swiper-pagination',
      type: 'bullets',
      clickable: true,
    },
  });

  // Menu mobile
  $('.js-active-menu').on('click', function() {
    $('.c-menu').toggleClass('is-active');
    $('html').toggleClass('is-active-menu');
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
  });

  //Ajax vagas
  function searchVacancies() {
    var optionValue = $('select').find('option:selected');
    var valueId = optionValue.val();
    
    $.ajax({
      type: 'POST',
      url: '../wp-content/themes/bones/library/php/busca-vagas.php?acao=busca_vagas',
      data: {
      valueId: valueId
      },
      beforeSend: function() {
        $('#response').css('display', 'flex');
      },
    }).done(function(e){

      $('.js-container-ajax').html(''); // limpa div
      $('.js-container-ajax').append(e); // carrega o conteúdo
    });
  }

  $('.js-search-vacancies').on('change', function() {
    searchVacancies();
  });

  //Ajax lojas
  function searchShops() {
    var optionValue = $('select').find('option:selected');
    var valueId = optionValue.val();
    
    $.ajax({
      type: 'POST',
      url: '../wp-content/themes/bones/library/php/busca-lojas.php?acao=busca_lojas',
      data: {
      valueId: valueId
      },
      beforeSend: function() {
        $('#response').css('display', 'flex');
      },
    }).done(function(e){

      $('.js-container-ajax').html(''); // limpa div
      $('.js-container-ajax').append(e); // carrega o conteúdo
    });
  }

  $('.js-search-shops').on('change', function() {
    searchShops();
  });

  //Ajax ofertas
  $('.c-offers__item:first a').addClass('current-active');

  $('.js-search-offers').on('click', function(i) {
    i.preventDefault();

    $('.current-active').removeClass('current-active');
    $(this).addClass('current-active');
    
    var $optionValue = $(this);
    var valueId = $optionValue.attr('href');

    console.log(valueId)
    
    $.ajax({
      type: 'POST',
      url: '../wp-content/themes/bones/library/php/busca-ofertas.php?acao=busca_ofertas',
      data: {
      valueId: valueId
      },
      beforeSend: function() {
        $('#response').css('display', 'flex');
      },
    }).done(function(e){

      $('.js-container-ajax').html(''); // limpa div
      $('.js-container-ajax').append(e); // carrega o conteúdo
    });
  });

  $(function() {
  
    // Privacy Cookie Alert
    var gdprcookie = getCookie('gdprcookie');
  
    if (gdprcookie != 'yes') {
      $('.c-privacy-alert').removeClass('is-hidden');
    }
  
    function setCookie(cname, cvalue, exdays) {
      var d = new Date();
  
      d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
      var expires = "expires="+d.toUTCString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
  
    function getCookie(cname) {
      var name = cname + "=";
      var ca = document.cookie.split(';');
  
      for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    }
  
  
    // Close cookie alert
    $('.js-close-alert').on('click', function(e) {
      e.preventDefault();
  
      setCookie("gdprcookie", 'yes', 30);
      $(this).parents('.c-privacy-alert').addClass('is-hidden');
    });
  
  });

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
  $(function($){
      $(".data").mask("99/99/9999");
      $(".js-cpf").mask("999.999.999-99");
      $(".js-cep").mask("99999-999");
      $(".cnpj").mask("99.999.999/9999-99")
  });
  $(function($){
    $('.js-telphone').focusout(function(){
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
  });
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
