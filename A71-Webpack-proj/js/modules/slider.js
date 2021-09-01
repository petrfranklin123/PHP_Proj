function slider(){
     //---------------- слайдер 2 ----------------//

     var slides = document.querySelectorAll(".offer__slide"),
     prev = document.querySelector(".offer__slider-prev"),
     next = document.querySelector(".offer__slider-next"),
     current_slides = document.querySelector("#current"),
     total_slides = document.querySelector("#total"),
     slidesWrapper = document.querySelector(".offer__slider-wrapper"),
     slidesField = document.querySelector(".offer__slider-inner"),
     // в данной конструкции мы получаем ширину блока со слайдами
     //таким образом мы можем обратиться к любым стилям на странице 
     width = window.getComputedStyle(slidesWrapper).width,
     slider = document.querySelector(".offer__slider");
 
 var sliderIndex = 1;
 var offset = 0;
 //стилизация полосы прокрутки катринок
 slidesField.style.width = 100 * slides.length + "%";
 slidesField.style.display = "flex";
 slidesField.style.transition = "0.5s all";
 //обрезка содержимого 
 slidesWrapper.style.overflow = "hidden";
 
 //устанавливаем одинаковую ширину (ширину окна предка) для каждого слайда
 slides.forEach((slide) =>{
     slide.style.width = width;
 });
 //начальное значение слайдера 
 setNachZnach();
 
 slider.style.position = "relative";
 
 //создаем элемент 
 var indicators = document.createElement("ol"),
     dots = [];
 indicators.classList.add('carousel-indicators');
 //добавляем элемент 
 slider.append(indicators);
 
 //добавляем навигацию
 for(var i = 0; i < slides.length; i++){
     var dot = document.createElement("li");
     //добавляем элементу атрибут с конкретным индексом 
     dot.setAttribute('data-slide-to', i + 1);
     dot.classList.add("dot");
 
     if(i == 0){
         dot.style.opacity = 1;
     }
 
     indicators.append(dot);
     dots.push(dot);
 }
 
 
 
 
 next.addEventListener("click", ()=>{
     if(offset == +width.replace(/\D/g, "") * (slides.length - 1)){
         offset = 0;
     }else{
         offset += +width.replace(/\D/g, "");
     }
     slidesField.style.transform = `translateX(-${offset}px)`;
 
     if(sliderIndex == slides.length){
         sliderIndex = 1;
     }else{
         sliderIndex++;
     }
 
     if(slides.length < 10){
         current_slides.textContent = `0${sliderIndex}`;
     }else{
         current_slides.textContent = sliderIndex;
     }
 
     dots.forEach(dot => dot.style.opacity = "0.5");
     dots[sliderIndex - 1].style.opacity = "1";
 
 });
 
 prev.addEventListener("click", ()=>{
     if(offset == 0){
         offset = +width.replace(/\D/g, "") * (slides.length - 1);
     }else{
         offset -= +width.replace(/\D/g, "");
     }
     slidesField.style.transform = `translateX(-${offset}px)`;
 
     if(sliderIndex == 1){
         sliderIndex = slides.length;
     }else{
         sliderIndex--;
     }
 
     if(slides.length < 10){
         current_slides.textContent = `0${sliderIndex}`;
     }else{
         current_slides.textContent = sliderIndex;
     }
 
     dots.forEach(dot => dot.style.opacity = "0.5");
     dots[sliderIndex - 1].style.opacity = "1";
 });
 
 /*dots.forEach(dot =>{
     dot.addEventListener("click", e =>{
         var slideTo = e.target.getAttribute('data-slide-to');
 
         sliderIndex = slideTo;
 
         offset = +width.slice(0, width.length - 2) * (slideTo - 1);
         slidesField.style.transform = `translateX(-${offset}px)`;
 
         if(slides.length < 10){
             current_slides.textContent = `0${sliderIndex}`;
         }else{
             current_slides.textContent = sliderIndex;
         }
 
         dots.forEach(dot => dot.style.opacity = "0.5");
         dots[sliderIndex - 1].style.opacity = "1";
     });
 });*/
 
 indicators.addEventListener("click", e =>{
     //получаем все элементы класса dot вложенные в indicator
     if(e.target.className == "dot"){
         //записываем значение атрибута в переменную
         var slideTo = e.target.getAttribute('data-slide-to');
         //переприсваиваем значение sliderIndex
         sliderIndex = slideTo;
         //первым множетелем выступает ширина видимого блока, второй индекс картинки
         offset = +width.replace(/\D/g, "") * (slideTo - 1);
         //перемещение в заданную ширину
         slidesField.style.transform = `translateX(-${offset}px)`;
 
         if(slides.length < 10){
             current_slides.textContent = `0${sliderIndex}`;
         }else{
             current_slides.textContent = sliderIndex;
         }
 
         //сначала присваиваем всем индикаторам полупрозрачность 
         dots.forEach(dot => dot.style.opacity = "0.5");
         //следом раскрываем конкретный 
         dots[sliderIndex - 1].style.opacity = "1";
     }
 });
 
 //установка начального значения 
 function setNachZnach(){
     offset = 0;
     sliderIndex = 1;
     slidesField.style.transform = `translateX(-${offset}px)`;
     current_slides.textContent = `0${sliderIndex}`;
 }
 
}

module.exports = slider;