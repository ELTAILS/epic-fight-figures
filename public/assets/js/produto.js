const btnComprar = document.getElementById('comprar-produto');
const btnCep = document.getElementById('cep')

// console.log(btnComprar,cep);

btnComprar.addEventListener('click',function() {
    const quantidade = document.getElementById('quantidade').value;
    alert(`obrigador por comprar ${quantidade} desse produto`);
});

btnCep.addEventListener('click',function(e){
    e.preventDefault();
    alert("CEP salvo");
});