//schovanie a ukazanie filtru pri @media

const toggleBtn = document.getElementById('turnFilterBtn');
const filter = document.querySelector('.product-filter');

toggleBtn.addEventListener('click', () => {
    filter.classList.toggle('show');
    toggleBtn.textContent = filter.classList.contains('show') ? 'Hide Filter' : 'Show Filter';
});

