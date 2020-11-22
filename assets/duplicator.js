var i = 0;

function duplicate() {
    var original = document.getElementById('duplicator' + i);
    var clone = original.cloneNode(true);
    clone.id = "duplicator" + ++i;
    clone.onclick = duplicate;
    original.parentNode.appendChild(clone);
}