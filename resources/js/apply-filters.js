let applyFilter = document.querySelector('#apply-filter-btn');

applyFilter.addEventListener('click', () => {
  document.querySelector('#anime-filter-form').submit();
  document.querySelector('#manga-filter-form').submit();
});