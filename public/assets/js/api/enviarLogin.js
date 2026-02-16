document.getElementById('form').addEventListener('submit', function(e) {
    e.preventDefault();

    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;
    const url = '/epic-fight-figures/public/';
    //console.log(email,senha);
    fetch('usuarioLogar', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            email,
            senha
        })
    }).then(response => response.json())
    .then(data => {
        window.location.href = url;
    })
    .catch(erro => {
        console.error('Erro: ' + erro);
        alert('Ocorreu um erro no login');
    })
})