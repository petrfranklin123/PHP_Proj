import tabs from './modules/tabs';
import modal, { openModal } from './modules/modal';
import timer from './modules/timer';
import cards from './modules/cards';
import calc from './modules/calc';
import slider from './modules/slider';
import forms from './modules/forms';


window.addEventListener('DOMContentLoaded', () =>{

    
    var modalTimerId = setTimeout(()=> openModal('.modal', modalTimerId), 50000);


    tabs('.tabheader__item', '.tabcontent', '.tabheader__items','tabheader__item_active');
    modal('[data-modal]', '.modal', modalTimerId);
    timer('.timer', '2021-09-11');
    cards();
    calc();
    slider({
        container: ".offer__slider",
        nextArrow: ".offer__slider-next",
        prevArrow: ".offer__slider-prev",
        slide: ".offer__slide",
        totalContainer: "#total",
        currentContainer: "#current",
        wrapper: ".offer__slider-wrapper",
        field: ".offer__slider-inner"
    });
    forms('form', modalTimerId);
});