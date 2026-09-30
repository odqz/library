let hideAnimes = document.querySelector('#hide-animes');
let hideMangas = document.querySelector('#hide-mangas');

hideAnimes.addEventListener('click', () => {
  document.querySelector('#anime-index').classList.toggle('hidden');
  hideAnimes.textContent = hideAnimes.textContent == "show" ? "hide" : "show";
  document.querySelector('#hiding-animes').classList.toggle('hidden');
});

hideMangas.addEventListener('click', () => {
  document.querySelector('#manga-index').classList.toggle('hidden');
  hideMangas.textContent = hideMangas.textContent == "show" ?  "hide" : "show";
  document.querySelector('#hiding-mangas').classList.toggle('hidden');
});