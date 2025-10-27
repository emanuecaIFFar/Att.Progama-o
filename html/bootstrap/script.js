// Toggle de "active" na sidebar (visual apenas)
document.querySelectorAll('.iffed-sidebar .nav-link').forEach(link => {
  link.addEventListener('click', (e) => {
    document.querySelectorAll('.iffed-sidebar .nav-link').forEach(l => l.classList.remove('active'));
    e.currentTarget.classList.add('active');
  });
});

// Ação do botão "Entrar" (placeholder)
document.querySelector('.btn-entrar')?.addEventListener('click', () => {
  alert('Ação de login ainda não implementada.');
});
