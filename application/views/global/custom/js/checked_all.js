function cli(Obj){
    var collid = document.getElementById("all_check")
    var coll = document.getElementsByName(Obj)
    if (collid.checked){
     for(var i = 0; i < coll.length; i++)
       coll[i].checked = true;
    }else{
     for(var i = 0; i < coll.length; i++)
       coll[i].checked = false;
    }
}