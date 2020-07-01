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
