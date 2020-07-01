function fazerPesquisa(){

    var pesquisa, filtro, tabela, tr, td, i, valorTexto;

    pesquisa = document.getElementById("pesquisa");
    filtro = pesquisa.value.toUpperCase();
    tabela = document.getElementById("tabela");
    tr = tabela.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++){

        td = tr[i].getElementsByTagName("td")[0];
        if (td){
            valorTexto = td.textContent || td.innerText;
            if (valorTexto.toUpperCase().indexOf(filtro) > -1){
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }

    }

}

