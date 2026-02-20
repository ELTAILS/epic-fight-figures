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
    .then(response => {
        if(!response.ok){
            throw new Error("Erro HTTP");
        }
        return response.json();
    })
    .then(data => {
        if(data.success){
            window.location.href = url;
        }else{
            alert(data.message);
        }
    })
    .catch(erro => {
        alert("Email ou senha inválidos");
    });
})