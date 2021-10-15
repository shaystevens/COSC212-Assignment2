let adminLoad = (function () {
    "use strict";
    let pub = {};

    function showHide(){
        let divTag = document.getElementById('addDogForm');
        if(divTag.style.display === "none"){
            divTag.style.display = "block";
        }else{
            divTag.style.display = "none";
        }
    }

    function showHideEdit(){
        let divTag = document.getElementById('dogEditForm');
        if(divTag.style.display === "none"){
            divTag.style.display = "block";
        }else{
            divTag.style.display = "none";
        }
    }

    pub.setup = function () {
        document.getElementById('addDogHeader').style.cursor = "pointer";
        document.getElementById('addDogHeader').onclick = showHide;

        if(document.getElementById('editDogHeader') !=null){
            document.getElementById('editDogHeader').style.cursor = "pointer";
            document.getElementById('editDogHeader').onclick = showHideEdit;
        }
    };

    return pub;
}());

$(document).ready(adminLoad.setup);