document.addEventListener('DOMContentLoaded', function () {
    const links = document.querySelectorAll('.nav-link');

    links.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const page = this.getAttribute('data-link');

            fetch('ajax.php?page=' + page)
                .then(res => res.text())
                .then(html => {
                    document.getElementById('content').innerHTML = html;
                    window.history.pushState(null, '', page);
                })
                .catch(err => console.error('Load error:', err));
        });
    });

    window.addEventListener('popstate', () => {
        const path = window.location.pathname.replace(/^\/+|\/+$/g, '');
        fetch('ajax.php?page=' + path)
            .then(res => res.text())
            .then(html => {
                document.getElementById('content').innerHTML = html;
            });
    });
});
