async function updateUser(userToUpdate) {
    try {
        const serverResponse = await axios.put(`${API_URL}/users/${user.id}`, userToUpdate, { headers: { 'Authorization': `Bearer ${getCookie("token")}` } });
        return serverResponse.data;

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
};

async function main() {
    $('#edit-id').val(user.id);
    $('#identification').val(user.identification);
    $('#name').val(user.name);
    $('#age').val(user.age);
    $('#weight').val(user.weight);
    $('#email').val(user.email);
    $('#cellphone').val(user.cellphone);
    $('#wounds').val(user.wounds);
}
main();


$('#update-user').submit(async function (event) {
    event.preventDefault();

    const identification = $('#identification').val();
    const name = $('#name').val();
    const age = $('#age').val();
    const weight = $('#weight').val();
    const email = $('#email').val();
    const cellphone = $('#cellphone').val();
    const wounds = $('#wounds').val();


    const userEditted = await updateUser({
        identification,
        name,
        age,
        weight,
        email,
        cellphone,
        wounds
    });

    user = userEditted;
    localStorage.setItem("user", JSON.stringify(user));

    Swal.fire({
        icon: 'success',
        title: 'Datos actualizados correctamente',
        text: "Tu información ha sido actualizada de forma satisfactoria."
    });
});