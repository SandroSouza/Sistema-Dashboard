function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');
    sidebar.style.width = sidebar.style.width === '80px' ? '250px' : '80px';
    content.style.marginLeft = content.style.marginLeft === '0px' ? '170px' : '0px';
}
