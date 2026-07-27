const form = document.getElementById('formLogin');
    const mensagemErro = document.getElementById('mensagemErro');

    form.addEventListener('submit', function (evento) {
        evento.preventDefault();

        const nome = document.getElementById('Name').value.trim();
        const email = document.getElementById('Email').value.trim();
        const senha = document.getElementById('Senha').value.trim();

        if (nome === '' || email === '' || senha === '') {
            mensagemErro.style.display = 'block';
        } else {
            mensagemErro.style.display = 'none';
            window.location.href = 'login.html';
        }
    });