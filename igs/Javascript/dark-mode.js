let dark = document.getElementById("dark");
dark.onclick = function ()
{
    document.body.classList.toggle("dark-theme");
    if (document.body.classList.contains("dark-theme"))
    {
        dark.src = "../Assets/icon/sun.png";
    }
    else
    {
        dark.src = "../Assets/icon/moon.png";
    }
}