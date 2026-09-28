let hideAnimes = document.querySelector('#hide-animes');
let hideMangas = document.querySelector('#hide-mangas');

hideAnimes.addEventListener('click', () => {
  document.querySelector('#anime-index').classList.toggle('hidden');
  hideAnimes.textContent = hideAnimes.textContent == "Show all" ? "Hide all" : "Show all";
  document.querySelector('#hiding-animes').classList.toggle('hidden');
});

hideMangas.addEventListener('click', () => {
  document.querySelector('#manga-index').classList.toggle('hidden');
  hideMangas.textContent = hideMangas.textContent == "Show all" ? "Hide all" : "Show all";
  document.querySelector('#hiding-mangas').classList.toggle('hidden');
});