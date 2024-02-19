// Slide show

    // Slide sort
    const rightbtn = document.querySelector('.fa-chevron-right')
    const leftbtn = document.querySelector('.fa-chevron-left')
    let index = 0
    const imgNumber = document.querySelectorAll('.slider-content-left-top img')
    console.log (imgNumber.length)
    rightbtn.addEventListener("click", function(){
        index = index + 1
        document.querySelector(".slider-content-left-top").style.right = index * 100 + "%"
        if(index>imgNumber.length-1){
            index = 0 
        }
    })

    leftbtn.addEventListener("click", function(){
        document.querySelector(".slider-content-left-top").style.right = index * 100 + "%"
        index = index - 1
        if(index<=0){
            index = imgNumber.length -1
        }
    })

    // Slide bottom 
    const imgNumberbot = document.querySelectorAll('.slider-content-left-bottom li')
    imgNumberbot.forEach(function(imgbot,index){
        imgbot.addEventListener("click", function(){
            removeActive ()
            document.querySelector(".slider-content-left-top").style.right = index * 100 + "%"  
            imgbot.classList.add("active")
        })
    })
        // Remove active (Click border top remove)
        function removeActive() {
            let imgactive = document.querySelector('.active') 
            imgactive.classList.remove("active")
        }


    // Slide Animation
    function imgAuto () {
        index = index + 1
        if(index>imgNumber.length-1){
            index = 0 
        }
        removeActive ()
        document.querySelector(".slider-content-left-top").style.right = index * 100 + "%"
        console.log (index)
        imgNumberbot[index].classList.add("active")
    }

setInterval(imgAuto,4000)