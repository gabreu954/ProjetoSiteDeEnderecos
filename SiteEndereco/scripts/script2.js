function enviarForm() {
    var conteudo = document.getElementById('conteudo');
    var data = {};
    data['nome_estab'] = conteudo.nome_estab.value;
    data['estab'] = conteudo.estab.value;
    data['rua'] = conteudo.rua.value;
    data['numero'] = conteudo.numero.value;
    data['bairro'] = conteudo.bairro.value;
    data['cidade'] = conteudo.cidade.value;
    console.log(data);
    fetch('http://localhost/EnderecosBackEnd/conteudo', {
        method: 'POST',
        body: data
    })
        .then((response) => {
            if (response.ok) {
                return response.json()
            } else {
                return Promise.reject({ status: res.status, statusText: res.statusText });
            }
        })
        .then((data) => console.log(data))
        .catch(err => console.log('Error message:', err.statusText));
}

var submitBtn = document.querySelector('button');

submitBtn.addEventListener('submit', enviarForm);
