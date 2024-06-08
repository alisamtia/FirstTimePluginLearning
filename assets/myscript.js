window.addEventListener('load', function(){


    //store tabs variable
    var tabs=document.querySelectorAll("ul.nav-tabs > li");

    for(i=0; i<tabs.length;i++){
        tabs[i].addEventListener("click", switchTab);
    }

    //function to switchTabs
    function switchTab(event){
        event.preventDefault();

        //Removing Active class from already active tab and panel
        document.querySelector("ul.nav-tabs li.active").classList.remove("active");
        document.querySelector(".tab-pane.active").classList.remove("active");


        clickedTab=event.currentTarget;
        target=event.target;
        activePaneID=target.getAttribute("href");
        
        //adding active class on tab and panel
        clickedTab.classList.add("active");
        document.querySelector(activePaneID).classList.add("active");

        // console.log(activePaneID);
    }
    
});