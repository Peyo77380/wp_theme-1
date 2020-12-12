'use strict';

document.addEventListener( 'DOMContentLoaded', sliderInit );


function sliderInit () {


    let sliderContainer = document.querySelector('.recent_posts_slider');

    let sliderSheets = sliderContainer.querySelectorAll('.recent_posts_slider_preview');


    const slide = (sheets) => {
        sheets.forEach(sheet => {
            
            let transformProperty = sheet.style.transform;

            let transformX = transformProperty.substring(12, ( transformProperty.length - 2 ) );

            if (transformX == "" ) {
                transformX = 0 
            } else {
                transformX = parseInt( transformX) 
            };

            transformX += 100;
            
            if (transformX >= ( sheets.length * 100) ) {
                transformX = 0;
            }
            sheet.style.transform = "translateX(-" + transformX + "%)";
        
        });
    };


    let timer = setInterval(
        function () {
            slide (sliderSheets)
        },
        4000
    );



}
