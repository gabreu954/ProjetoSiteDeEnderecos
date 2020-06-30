window.onload = function () {


    fetch('http://localhost/EnderecosBackEnd/conteudo')
        .then(
            response => response.json()
        )
        .then(
            data => {
                data.forEach(endereco => {
                    let linha = tabela.insertRow(-1);

                    let nome_estab = linha.insertCell(0);
                    let estab = linha.insertCell(1);
                    let rua = linha.insertCell(2);
                    let numero = linha.insertCell(3);
                    let bairro = linha.insertCell(4);
                    let cidade = linha.insertCell(5);

                    nome_estab.innerHTML = endereco.nome_estab;
                    estab.innerHTML = endereco.estab;
                    rua.innerHTML = endereco.rua;
                    numero.innerHTML = endereco.numero;
                    bairro.innerHTML = endereco.bairro;
                    cidade.innerHTML = endereco.cidade;
                }
                )


            }
        )

}
function enviarForm() {
    var form = document.getElementById('cadastro');
    var data = {};
    data['nome_estab'] = form.nome_estab.value;
    data['estab'] = form.estab.value;
    data['rua'] = form.rua.value;
    data['numero'] = form.numero.value;
    data['bairro'] = form.bairro.value;
    data['cidade'] = form.cidade.value;
    console.log(JSON.stringify(data));
    fetch('http://localhost/EnderecosBackEnd/enderecos', {
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