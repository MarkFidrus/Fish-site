let toTopContainers = document.getElementsByClassName('toTop');
let toTop = document.getElementById('toTop');

for (const item of toTopContainers)
{
    item.addEventListener('scroll', function (){
        if (item.scrollTop > 200)
        {
            toTop.style.display = 'block';
        }
        else
        {
            toTop.style.display = 'none';
        }

        document.getElementById('toTop').addEventListener('click', () => {
            item.scrollTo(0,0);
        });
    });
}

