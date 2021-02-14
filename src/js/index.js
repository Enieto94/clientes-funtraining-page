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
            const serverResponse = await axios.post(`${API_URL}/auth/login`, { email, password });
            const data = serverResponse.data;
            console.log("[SERVER RESPONSE]: ", JSON.stringify(data.token, 0, 2));
            setCookie("token", data.token);

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