window._ = require('lodash');
window.Popper = require('popper.js').default;

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.Vue = require('vue');
// 加载Element UI 库
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
// import { Loading } from 'element-ui';
Vue.use(ElementUI);

/**
 * 为了实现在选择不同日期的时候, 方便的加载依然有效的时间片段
 */
import getAvailableTimeSlots from './_tools.js';
window.moment = require('moment');

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

$(document).ready(function(){
    // 联系我们功能
    if($('#submit-contact-us-btn').length > 0){
        let theSubmitButton = $('#submit-contact-us-btn');
        theSubmitButton.on('click',function(e){
            e.preventDefault();
            let inputs = $('input');
            let names = [];
            let values = [];
            $.each(inputs, function(idx, input){
                let theInput = $(input);
                if(theInput.attr('name')){
                    names.push(theInput.attr('name'));
                    values.push(theInput.val());
                }
            });

            theSubmitButton.addClass('is-loading');
            axios.post('/contact-us',{
                lead:{
                    name: $('#input-name').val(),
                    email: $('#input-email').val(),
                    phone: $('#input-phone').val(),
                    message: $('#input-message').val()
                }
            }).then(function(res){
                if(res.data.error_no == 100){
                    // 成功
                    $('#txt-on-success').css('display','block');
                    theSubmitButton.css('display','none');
                }else{
                    $('#txt-on-fail').css('display','block');
                }
                theSubmitButton.removeClass('is-loading');
                // 检查是否需要把最新的留言放到Testimonials中
                if($('.testimonials-list').length > 0){
                    let testimonials = $('.testimonials-list');
                    let h = '<p><span class="has-text-link">' +$('#input-name').val()+ ':</span> ' + $('#input-message').val() + '</p>';
                    testimonials.prepend($(h));
                }
            })
        });
    }
    if($('.count').length > 0 ){
        $('.count').each(function () {
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    }

    if($('.slick-img').length > 0) {
        $('.slick-img').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows:false,
            focusOnSelect:true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }

    if($('.date-picker-btn').length > 0){
        $('.date-picker-btn').on('click',function(e){
            e.preventDefault();
            let selected = $(this).data('value'); // 客人选定的日期
            $('#booking-date').val(selected).trigger('change'); // 触发日期改变的事件即可
            // 显示modal
            $('#modalBookingForm').modal('show');
        });
    }

    // 当日期左右按钮选择的时候
    if($('.change-select-date-btn').length > 0){
      $('.change-select-date-btn').on('click',function(e){
        e.preventDefault();
        // 是前一天还是往后挪一天
        let current = moment($('#booking-date').val(),'YYYY-MM-DD');
        let yesterday = moment().add(-1,'day');
        let newDate = null;
        let canUpdate = true;
        if($(this).data('type') === 'prev'){
            newDate = current.subtract(1,'d');  // 前一天
            if(newDate.isBefore(yesterday)){
                // 最早预定不能晚于昨天
                canUpdate = false;
            }
        }else{
            newDate = current.add(1,'d');   // 后一天
        }
        if(canUpdate){
            $('#booking-date').val(newDate.format('YYYY-MM-DD')).trigger('change');
        }
      });
    }

    // 监听当前选定的日期的值发生变化时的事件
    if($('#booking-date').length > 0){
      $('#booking-date').on('change',function(e){
        let productUuid = $('#booking-room').val();
        let selected = $(this).val();
        // 检查选定的日期, 有哪些可以选定的时间段. 此处为自定义的一个小工具方法, 采用Promise机制来实现
        getAvailableTimeSlots(
            selected,
            productUuid,
            $('#booking-time')
        ).then(res=>{
            if(res.error_no === 100){
              $('.book-input input').val('');
              $('#booking-date').val(selected);
            }else{
                alert('No vacancy, please try another day!');
            }
        });
      });
    }

    if($('.bookingCancelbtn').length>0){
        $('.bookingCancelbtn').on('click',function (e) {
            e.preventDefault();
            $('#modalBookingForm').modal('hide');
            $('#modalBookingForm input').val('');
    })
    }

});
