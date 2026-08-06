document.addEventListener(
    "DOMContentLoaded",
    function(){


        /*
        ===================================
        Dashboard Animation
        ===================================
        */


        const cards = document.querySelectorAll(
            ".stat-card, .menu-card"
        );


        cards.forEach(
            (card,index)=>{


                card.style.opacity="0";

                card.style.transform=
                "translateY(20px)";


                setTimeout(()=>{


                    card.style.transition=
                    "all .5s ease";


                    card.style.opacity="1";


                    card.style.transform=
                    "translateY(0)";


                },100 * index);



            }
        );




        /*
        ===================================
        Hover Effect
        ===================================
        */


        const menuCards =
        document.querySelectorAll(
            ".menu-card"
        );


        menuCards.forEach(card=>{


            card.addEventListener(
                "mouseenter",
                ()=>{

                    card.style.cursor="pointer";

                }
            );


        });




        /*
        ===================================
        Auto Refresh Notification
        ===================================
        */


        const activity =
        document.querySelector(
            ".activity-card"
        );


        if(activity){


            console.log(
                "Dashboard Admin Desa Jatisari aktif"
            );


        }



});