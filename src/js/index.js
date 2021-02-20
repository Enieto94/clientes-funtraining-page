$("#btn-login").click(async function (event) {
    // event.preventDefault();
    const email = $("#email").val();
    const password = $('#password').val();

    if (email === "") {
        Swal.fire({
            icon: 'error',
            title: 'Campo requerido!',
            text: "Ingresa tu correo electrónico."
        });

    } else if (!validarEmail(email)) {
        Swal.fire({
            icon: 'error',
            title: 'Correo electrónico incorrecto!',
            text: "Ingresa un correo electrónico valido."
        });

    } else if (password === "") {
        Swal.fire({
            icon: 'error',
            title: 'Campo requerido!',
            text: "Ingresa tu contraseña."
        });

    } else {

        try {
            const serverResponse = await axios.post(`${API_URL}/users/login`, { email, password });
            const token = serverResponse.data;
            console.log("[SERVER RESPONSE]: ", JSON.stringify(token.token, 0, 2));
            setCookie("token", token.token);

            const {data} = await axios.get(`${API_URL}/users/auth/me`, { headers: { 'Authorization': `Bearer ${token.token}` } });
            localStorage.setItem("user", JSON.stringify(data));

            window.location.href = '/agenda/';

        } catch (error) {
            console.warn("ERROR: ", error);
            if (error.response.status === 401) {
                Swal.fire({
                    icon: 'error',
                    title: 'Credenciales incorrectas',
                    text: "Lo sentimos, tu correo o contraseña no coinciden. Revisalos y vuelve a intentarlo."
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Problema interno.',
                    text: "Lo sentimos, ha surgido un problema interno. Intentalo más tarde"
                });
            }
        }
    }
});