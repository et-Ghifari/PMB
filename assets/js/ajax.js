var keyword   = document.getElementById('keyword');
var userTable = document.getElementById('userTable');

keyword.addEventListener('keyup', function () {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            userTable.innerHTML = xhr.responseText;
        }
    }

    xhr.open('GET', 'ajaxUser.php?keyword=' + keyword.value, true);
    xhr.send();
});