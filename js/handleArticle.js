function toPageTop(){
   let btn = document.getElementById("PageTop");
    
   btn.addEventListener("click",()=>{
        let scrollOptions = {
            top: 0,
            behavior: 'smooth'
        };
        window.scrollTo(scrollOptions);
   });
}