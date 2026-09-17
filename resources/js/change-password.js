document.querySelector('#change-password-btn').addEventListener('click', () => {
  document.querySelectorAll('.item').forEach(item => {
    item.classList.toggle('hidden');
  });
});