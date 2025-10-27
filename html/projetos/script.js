// Validação simples do formulário com feedback visual
const form = document.getElementById('formContato');
const formMsg = document.getElementById('formMsg');

if (form) {
  form.addEventListener('submit', (e) => {
    e.preventDefault();

    // checagem básica
    const nome = document.getElementById('nome');
    const email = document.getElementById('email');
    const mensagem = document.getElementById('mensagem');

    if (!nome.value.trim() || !email.validity.valid || !mensagem.value.trim()) {
      formMsg.textContent = 'Por favor, preencha nome, e-mail válido e mensagem.';
      formMsg.style.color = '#ff8a8a';
      return;
    }

    // Sucesso (demo)
    formMsg.textContent = 'Mensagem enviada! (demonstração — sem back-end)';
    formMsg.style.color = '#9be29b';

    // Se quiser limpar depois:
    // form.reset();
  });
}
