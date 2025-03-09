const sectors = {
    createSpan : function(id, building){
        document.getElementById('buildingsList').innerHTML += "<span id=\"buildings_" + id + "\">" +
            "<input type=\"hidden\" value=\"" + id + "\" name=\"buildings[" + id + "]\" />" +
            "<span class=\"badge bg-primary m-1\">"+
            "<span class=\"align-middle pe-2\">" + building + "</span>" +
            "<span class=\"align-top\">" +
            "<button type=\"button\" class=\"btn-close\" onclick=\"sectors.remove(" + id + ")\"></button>" +
            "</span></span></span>";
    },
    select : function(){
        var lst = document.getElementById('select_buildings');
        var id = lst.options[lst.selectedIndex].value;
        var building = lst.options[lst.selectedIndex].text;
        lst.options[lst.selectedIndex].style.display = "none";
        lst.value = -1;
        sectors.createSpan(id, building);
    },
    remove : function(id){
        document.querySelector("#select_buildings option[value='" + id + "']").style.display = "block";
        document.getElementById('buildings_' + id).remove();
    },
    add : function(id){
        var option = document.querySelector("#select_buildings option[value='" + id + "']");
        option.style.display = "none";
        document.getElementById('select_buildings').value = -1;
        sectors.createSpan(id, option.text);
    }
}

window.sectors = sectors;