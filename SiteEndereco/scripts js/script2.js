function enviarForm() {
    var form = document.getElementById('conteudo');
    var data = {};
    data['nome_estab'] = form.nome_estab.value;
    data['estab'] = form.estab.value;
    data['rua'] = form.rua.value;
    data['numero'] = form.numero.value;
    data['bairro'] = form.bairro.value;
    data['cidade'] = form.cidade.value;
    console.log(JSON.stringify(data));
    fetch('http://localhost/EnderecosBackEnd/conteudo', {
        method: 'POST',
        body: JSON.stringify(data)
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