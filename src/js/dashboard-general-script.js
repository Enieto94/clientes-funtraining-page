async function getAuthenticatedUserInfo() {
    try {
        const serverResponse = await axios.get(`${API_URL}/users/auth/me`, { headers: { 'Authorization': `Bearer ${getCookie("token")}` } });
        const authenticatedUserInfo = serverResponse.data;
        return authenticatedUserInfo;

    } catch (error) {
        console.warn("ERROR: ", error);
        if (error.response.status === 401) {
            window.location.href = '/';
            console.log(error);
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Problema interno.',
                text: "Lo sentimos, ha surgido un problema interno. Intentalo más tarde"
            });
        }
    }
}

async function setUpAuthenticatedUser() {
    const authenticatedUserInfo = await getAuthenticatedUserInfo();
    localStorage.setItem("user", JSON.stringify(authenticatedUserInfo));
    user = authenticatedUserInfo;
};

let user = JSON.parse(localStorage.getItem('user'));

if (user === null) {
    setUpAuthenticatedUser();
}

$('#btn-logout').click(async function (event) {
    try {
        await axios.post(`${API_URL}/users/logout`, {}, { headers: { 'Authorization': `Bearer ${getCookie("token")}` } });
        deleteCookie("token");

        user = null;
        localStorage.getItem('user', '');
        localStorage.removeItem('user');

        window.location.href = "/";

    } catch (error) {
        console.warn("ERROR: ", error);
        if (error.response.status === 401) {
            window.location.href = "/";
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Problema interno.',
                text: "Lo sentimos, ha surgido un problema interno. Intentalo más tarde"
            });
        }
    }
});