function habilitar(valor) {
    var status = document.getElementById('buttonCadastrar').disabled;
  
    if (valor == 'sim' && status == true) {
      document.getElementById('buttonCadastrar').disabled = false;
    } else {
      document.getElementById('buttonCadastrar').disabled = true;
    }
}

function adicionarSelectPrato() {
    const select_prato = document.getElementById('select-prato');

    const newDiv = document.createElement('div');
    newDiv.className = 'mb-3 col-4 px-2 d-flex justify-content-between';

    const newSelect = document.createElement('select');
    newSelect.className = 'form-select';
    newSelect.name = 'idprato[]';
    newSelect.required = true;

    newSelect.innerHTML = `<option value="" disabled selected>Selecione um prato</option>`;
    
    const addButton = document.getElementById('add-prato');
    select_prato.insertBefore(newDiv, addButton);

    fetch('controllers_admin/busca_pratos.php')
        .then(response => response.text())
        .then(data => {
            const pratos = JSON.parse(data);
            pratos.forEach(prato => {
                const option = document.createElement('option');
                option.value = prato.idprato;
                option.textContent = prato.prato;
                newSelect.appendChild(option);
            });
        });
    
    const removeButton = document.createElement('button');
    removeButton.type = 'button';
    removeButton.className = 'btn btn-outline-danger ms-1';
    removeButton.innerText = '-';
    removeButton.onclick = function() {
        select_prato.removeChild(newDiv);
    };

    newDiv.appendChild(newSelect);
    newDiv.appendChild(removeButton);
}

function adicionarSelectAcompanhamento() {
    const select_acompanhamento = document.getElementById('select-acompanhamento');

    const newDiv = document.createElement('div');
    newDiv.className = 'mb-3 col-4 px-2 d-flex justify-content-between';

    const newSelect = document.createElement('select');
    newSelect.className = 'form-select';
    newSelect.name = 'idacompanhamento[]';
    newSelect.required = true;

    newSelect.innerHTML = `<option value="" disabled selected>Selecione um acompanhamento</option>`;
    
    const addButton = document.getElementById('add-acompanhamento');
    select_acompanhamento.insertBefore(newDiv, addButton);

    fetch('controllers_admin/busca_acompanhamentos.php')
        .then(response => response.text())
        .then(data => {
            const acompanhamentos = JSON.parse(data);
            acompanhamentos.forEach(acompanhamento => {
                const option = document.createElement('option');
                option.value = acompanhamento.idacompanhamento;
                option.textContent = acompanhamento.acompanhamento;
                newSelect.appendChild(option);
            });
        });

    const removeButton = document.createElement('button');
    removeButton.type = 'button';
    removeButton.className = 'btn btn-outline-danger ms-1';
    removeButton.innerText = '-';
    removeButton.onclick = function() {
        select_acompanhamento.removeChild(newDiv);
    };

    newDiv.appendChild(newSelect);
    newDiv.appendChild(removeButton);
}

function adicionarSelectSobremesa() {
    const select_sobremesa = document.getElementById('select-sobremesa');

    const newDiv = document.createElement('div');
    newDiv.className = 'mb-3 col-4 px-2 d-flex justify-content-between';

    const newSelect = document.createElement('select');
    newSelect.className = 'form-select';
    newSelect.name = 'idsobremesa[]';
    newSelect.required = true;

    newSelect.innerHTML = `<option value="" disabled selected>Selecione uma sobremesa</option>`;
    
    const addButton = document.getElementById('add-sobremesa');
    select_sobremesa.insertBefore(newDiv, addButton);

    fetch('controllers_admin/busca_sobremesas.php')
        .then(response => response.text())
        .then(data => {
            const sobremesas = JSON.parse(data);
            sobremesas.forEach(sobremesa => {
                const option = document.createElement('option');
                option.value = sobremesa.idsobremesa;
                option.textContent = sobremesa.sobremesa;
                newSelect.appendChild(option);
            });
        });

    const removeButton = document.createElement('button');
    removeButton.type = 'button';
    removeButton.className = 'btn btn-outline-danger ms-1';
    removeButton.innerText = '-';
    removeButton.onclick = function() {
        select_sobremesa.removeChild(newDiv);
    };

    newDiv.appendChild(newSelect);
    newDiv.appendChild(removeButton);
}

function removerBotao(tipo, id) {
    const element = document.getElementById(tipo + '-' + id);
    if (element) {
        element.remove();
    }
}