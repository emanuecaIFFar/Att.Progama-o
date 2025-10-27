// Máscara simples para telefone (formato brasileiro)
const celular = document.getElementById('celular');
if (celular) {
  celular.addEventListener('input', () => {
    let v = celular.value.replace(/\D/g, '');
    if (v.length > 11) v = v.slice(0, 11);
    // (99) 99999-9999 ou (99) 9999-9999
    const d1 = v.slice(0, 2);
    const d2 = v.length > 10 ? v.slice(2, 7) : v.slice(2, 6);
    const d3 = v.length > 10 ? v.slice(7, 11) : v.slice(6, 10);
    celular.value =
      v.length > 6
        ? `(${d1}) ${d2}-${d3}`
        : v.length > 2
        ? `(${d1}) ${v.slice(2)}`
        : v.length ? `(${v}` : '';
  });
}

// Máscara para CEP (99999-999)
const cep = document.getElementById('cep');
if (cep) {
  cep.addEventListener('input', () => {
    let v = cep.value.replace(/\D/g, '').slice(0, 8);
    cep.value = v.length > 5 ? `${v.slice(0,5)}-${v.slice(5)}` : v;
  });
}

// Feedback de envio e validação HTML5
const form = document.getElementById('cadastroForm');
const formMsg = document.getElementById('formMsg');

if (form) {
  form.addEventListener('submit', (e) => {
    // Usa validação nativa; se falhar, aborta
    if (!form.checkValidity()) {
      e.preventDefault();
      form.reportValidity();
      formMsg.textContent = 'Por favor, corrija os campos destacados.';
      formMsg.style.color = '#b00020';
      return;
    }
    e.preventDefault();

    // Exemplo de coleta dos dados (sem back-end)
    const data = new FormData(form);
    // console.log(Object.fromEntries(data.entries()));

    // Mensagem de sucesso
    formMsg.textContent = 'Formulário enviado com sucesso 🎉 (demo - sem envio real)';
    formMsg.style.color = '#006400';

    // Opcional: limpar o formulário após “envio”
    // form.reset();
  });

  form.addEventListener('reset', () => {
    formMsg.textContent = '';
  });
}
