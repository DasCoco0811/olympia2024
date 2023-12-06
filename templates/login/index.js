import './index.html.twig'

function backend() {
    let backend = document.getElementById('backend').value;
    console.log('backend();')
    if (backend === "admin") {
        document.getElementById('adminjs').setAttribute('value', '/admin');
        document.getElementById('b1').click();
    }else if (backend === "referee"){
        document.getElementById('adminjs').setAttribute('value', '/referee');
        document.getElementById('b1').click();
    }
}