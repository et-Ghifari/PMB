function triggerClick()
{
    document.querySelector('#profilImage').click();
}

function displayImage(e)
{
    if (e.files[0])
    {
        var reader = new FileReader();

        reader.onload = function(e)
        {
            document.querySelector('#profilDisplay').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}