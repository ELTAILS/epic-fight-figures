document.getElementById('form').addEventListener('submit', function(e) {
    e.preventDefault();

    const nome = document.getElementById('nome').value;
    const senha = document.getElementById('senha').value;
    const email = document.getElementById('email').value;
    const url = '/epic-fight-figures/public/';
    // console.log(nome,senha,email);
    fetch('registro-salvar', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            nome, 
            senha, 
            email
        })
    }).then(response => response.json())
    .then(data =>{
        alert('Cadastro realizado com sucesso!');
        window.location.href = url;
    })
    .catch(erro => {
        console.error('Erro: ' + erro);
        alert("Ocorreu um erro ao cadastrar");
    });
})