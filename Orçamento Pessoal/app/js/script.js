
class Despesa {
    constructor(ano, mes, dia, tipo, descricao, valor) {
        this.ano = ano
        this.mes = mes
        this.dia = dia
        this.tipo = tipo
        this.descricao = descricao
        this.valor = valor
    }

    validarDados() {
        for (let i in this) {
            if (this[i] == undefined || this[i] == '' || this[i] == null) {
                return false
            }
        }
        return true
    }
}

class Bd {
    constructor() {
        let id = localStorage.getItem('id')
        if (id === null) {
            localStorage.setItem('id', 0)
        }
    }

    getProximoId() {
        let proximoId = localStorage.getItem('id')
        return parseInt(proximoId) + 1
    }

    gravar(d) {
        let id = this.getProximoId()
        localStorage.setItem(id, JSON.stringify(d))
        localStorage.setItem('id', id)
    }

    recuperarTodosRegistros() {
        //array de despesas
        let despesas = Array()

        let id = localStorage.getItem('id')
        //Recuperar todas as despesas cadastradas em localStorage
        for (let i = 1; i <= id; i++) {
            //recuperar a despesa 
            let despesa = JSON.parse(localStorage.getItem(i))

            //existe a possibilidade de haver indices removidos
            //nesses casos vamos pular esse índices
            if (despesa == null) {
                continue
            }
            despesa.id = i
            despesas.push(despesa)
        }
        return despesas
    }

    pesquisar(despesa) {

        let despesasFiltradas = Array()
        despesasFiltradas = this.recuperarTodosRegistros()

        if (despesa.ano != "") {
            despesasFiltradas = despesasFiltradas.filter(d => d.ano == despesa.ano)
        }

        if (despesa.mes != "") {
            despesasFiltradas = despesasFiltradas.filter(d => d.mes == despesa.mes)
        }
        
        if (despesa.dia != "") {
            despesasFiltradas = despesasFiltradas.filter(d => d.dia == despesa.dia)
        }
        
        if (despesa.tipo != "") {
            despesasFiltradas = despesasFiltradas.filter(d => d.tipo == despesa.tipo)
        }

        if (despesa.descricao != "") {
            despesasFiltradas = despesasFiltradas.filter(d => d.descricao == despesa.descricao)
        }

        if (despesa.valor != "") {
            despesasFiltradas = despesasFiltradas.filter(d => d.valor == despesa.valor)
        }

        return despesasFiltradas
    }

    remover(id){
        localStorage.removeItem(id)
    }
}

let bd = new Bd()

function cadastrarDespesa() {
    let ano = document.getElementById('ano').value
    let mes = document.getElementById('mes').value
    let dia = document.getElementById('dia').value
    let tipo = document.getElementById('tipo').value
    let descricao = document.getElementById('descricao').value
    let valor = document.getElementById('valor').value

    let despesa = new Despesa(ano, mes, dia, tipo, descricao, valor)

    if (despesa.validarDados()) {
        bd.gravar(despesa)
        document.getElementById('modal_titulo').innerHTML = "Registro inserido com Sucesso"
        document.getElementById('modal_titulo_div').className = "modal-header text-success"
        document.getElementById('modal_conteudo').innerHTML = "Despesa cadastrada com sucesso!"
        document.getElementById('modal_btn').innerHTML = "Voltar"
        document.getElementById('modal_btn').className = "btn btn-success"

        //dialog de sucesso
        $('#modalRegistraDespesa').modal('show')

        this.ano.value = ""
        this.mes.value = ""
        this.dia.value = ""
        this.tipo.value = ""
        this.descricao.value = ""
        this.valor.value = ""

    } else {
        document.getElementById('modal_titulo').innerHTML = "Erro ao inserir o registro"
        document.getElementById('modal_titulo_div').className = "modal-header text-danger"
        document.getElementById('modal_conteudo').innerHTML = "Erro na gravação, verifique se todos os campos foram preenchidos corretamente!"
        document.getElementById('modal_btn').innerHTML = "Voltar e Corrigir"
        document.getElementById('modal_btn').className = "btn btn-danger"
        $('#modalRegistraDespesa').modal('show')
    }

}

function carregaListaDespesas(despesas = Array(), filtro = false) {

    if(despesas.length == 0 && filtro == false){
        despesas = bd.recuperarTodosRegistros()
    }

    let listaDespesas = document.getElementById('listaDespesas')
    listaDespesas.innerHTML = ''

    //percorrer o array despeas, listando cada despesa de forma dinâmica
    despesas.forEach(function (d) {
        //criando a linha (tr)
        let linha = listaDespesas.insertRow()
        //criar as colunas (td)
        linha.insertCell(0).innerHTML = `${d.dia}/${d.mes}/${d.ano}`
        //ajustar o tipo
        switch (d.tipo) {
            case '1': d.tipo = "Alimentação"
                break
            case '2': d.tipo = "Educação"
                break
            case '3': d.tipo = "Lazer"
                break
            case '4': d.tipo = "Saúde"
                break
            case '5': d.tipo = "Transporte"
                break
        }
        linha.insertCell(1).innerHTML = d.tipo
        linha.insertCell(2).innerHTML = d.descricao
        linha.insertCell(3).innerHTML = d.valor

        let btn = document.createElement("button")
        btn.className = 'btn btn-danger'
        btn.innerHTML = '<i class= "fas fa-times"></id>'
        btn.id = `id_despesas_${d.id}`
        btn.onclick = function(){
            let id = this.id.replace('id_despesas_', '')
            bd.remover(id)
            window.location.reload()
        }
        linha.insertCell(4).append(btn)
    })
}

function pesquisarDespesa() {

    let ano = document.getElementById('ano').value
    let mes = document.getElementById('mes').value
    let dia = document.getElementById('dia').value
    let tipo = document.getElementById('tipo').value
    let descricao = document.getElementById('descricao').value
    let valor = document.getElementById('valor').value

    let despesa = new Despesa(ano, mes, dia, tipo, descricao, valor)


    let despesas = bd.pesquisar(despesa)

    carregaListaDespesas(despesas, true)
}