function popup(mylink) {
    if (! window.focus)return true;
    var href;
    if (typeof(mylink) == 'string') href=mylink;
    else href=mylink.href;
    var myWindow = window.open("", "MsgWindow", "width = 310, height = 100");
    myWindow.document.write("<p style='text-align: center;'>This site using Cookies did you accept them ?</p>" +
                             "<p style='text-align: center;'>Close the window if you agree this.</p> ");
    return false;
}

