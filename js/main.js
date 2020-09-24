function toggleMenu() {
    var menu = document.getElementById('menu-toggle');
    menu.innerText = menu.innerText == 'menu' ? 'close' : 'menu';
    var menuBox = document.getElementById('qa-nav-main');
    menuBox.classList.toggle('active');
}
function toggleSearch() {
    var search = document.getElementById('search-toggle');
    search.classList.toggle('active');
    search.innerText = search.innerText == 'search' ? 'arrow_back' : 'search';
    var searchBox = document.getElementById('qa-search');
    searchBox.classList.toggle('active');
}
function toggleUser() {
    var userBox = document.getElementById('qa-nav-user');
    userBox.classList.toggle('active');
}