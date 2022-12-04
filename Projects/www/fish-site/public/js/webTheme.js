let sections = document.getElementsByTagName('section');

window.onload = () => {
    currentWebTheme();
    document.getElementById('header').classList.add(localStorage.getItem('webTheme'));
    for (const section of sections) {
        section.classList.add(localStorage.getItem('webTheme'));
    }
}

function currentWebTheme()
{
    if (!localStorage.getItem('webTheme'))
    {
        createWebTheme();
    }
    return localStorage.getItem('webTheme');
}

function createWebTheme()
{
    localStorage.setItem('webTheme', 'origin');
}

let webThemeValue = localStorage.getItem('webTheme');

if (webThemeValue === 'origin')
{
    document.getElementById('styleCheckBox').checked = false;
}
else
{
    document.getElementById('styleCheckBox').checked = true;
}

document.getElementById('styleCheckBox').addEventListener('click', (event ) => {
    document.getElementById('header').classList.remove(localStorage.getItem('webTheme'));
    for (const section of sections) {
        section.classList.remove(localStorage.getItem('webTheme'));
    }
    if (event.target.checked)
    {
        localStorage.setItem('webTheme', 'dark');
    }
    else
    {
        localStorage.setItem('webTheme', 'origin');
    }
    document.getElementById('header').classList.add(localStorage.getItem('webTheme'));
    for (const section of sections) {
        section.classList.add(localStorage.getItem('webTheme'));
    }
});

