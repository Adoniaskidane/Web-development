

let i=0;
let img=['imgs/pexels-1.jpg','imgs/pexels-2.jpg','imgs/pexels-3.jpg','imgs/pexels-4.jpg','imgs/pexels-5.jpg'];
let time=2000;

function changeimg(){
    //Get the left and the right box.
    let left=document.getElementsByClassName("section-A");
    let right=document.getElementsByClassName("section-B");

    let currentimg=`url(${img[i]})`
    left[0].style.backgroundImage=currentimg;

    if(i<img.length-1){
        i++
    }
    else{
        i=0;
    }


    
       setTimeout("changeimg()",time);
}

window.onload=changeimg();


    // let pos=0;
    // function image(){
    // //Get the left and the right box.
    // let left=document.getElementsByClassName("section-A");
    // let right=document.getElementsByClassName("section-B");

    // let img=['imgs/pexels-1.jpg','imgs/pexels-2.jpg','imgs/pexels-3.jpg','imgs/pexels-4.jpg','imgs/pexels-5.jpg','imgs/pexels-6.jpg'];
    // let currentimg=`url(${img[pos]})`
    // left[0].style.backgroundImage=currentimg;
    // console.log(pos);
    // pos++
    // if(pos===img.length)
    // {
    //     pos=0;
        
    // }
    // }

    // function mov()
    // {
    //     //image();
    //     setTimeout(image());
    // }




