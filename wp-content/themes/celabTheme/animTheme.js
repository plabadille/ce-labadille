/* Script de nettoyage des noeuds */
function clean(node)
{
    for(var n = 0; n < node.childNodes.length; n ++)
    {
        var child = node.childNodes[n];
        if
        (
            child.nodeType === 8
            ||
            (child.nodeType === 3 && !/\S/.test(child.nodeValue))
        )
        {
            node.removeChild(child);
            n --;
        }
        else if(child.nodeType === 1)
        {
            clean(child);
        }
    }
}

clean(document);

/* Script pour retarder l'affichage des sous-titres du header. */
window.onload=function(){
    setTimeout(function(){
        document.querySelector("#sloganAlign>h2:first-of-type").style.visibility ="visible";
    }, 5000);
    setTimeout(function(){
        document.querySelector("#sloganAlign>h2:nth-of-type(2)").style.visibility ="visible";
    }, 10000);
};