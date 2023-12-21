var check = true;
function ShowAndHide() {
    if(!check)
    {
        document.getElementById("pass").type = "password";
        document.getElementById("ShowAndHide").innerHTML = "<span class='input-group-text'><i onclick='ShowAndHide()' class='fa fa-eye' ></i></span>";
        check = true;
    }
    else
    {
        document.getElementById("pass").type = "text"; // fa-eye-slash
        document.getElementById("ShowAndHide").innerHTML = "<span class='input-group-text'><i onclick='ShowAndHide()' class='fa fa-eye-slash' ></i></span>";
        check = false;
    }
}
function showhide() {
    if(!check)
    {
        document.getElementById("conf-pass").type = "password";
        document.getElementById("showhide").innerHTML = "<span class='input-group-text'><i onclick='showhide()' class='fa fa-eye' ></i></span>";
        check = true;
    }
    else
    {
        document.getElementById("conf-pass").type = "text"; // fa-eye-slash
        document.getElementById("showhide").innerHTML = "<span class='input-group-text'><i onclick='showhide()' class='fa fa-eye-slash' ></i></span>";
        check = false;
    }
}