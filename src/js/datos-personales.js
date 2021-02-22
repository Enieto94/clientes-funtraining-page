async function updateUser(userToUpdate) {
    try {
        const serverResponse = await axios.put(`${API_URL}/users/auth/me`, userToUpdate, { headers: { 'Authorization': `Bearer ${getCookie("token")}` } });
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
    const password = $('#password').val();

    /**
     * TO DO validate void inputs, except password
     */

    if (identification === "") {
        Swal.fire({
            icon: 'error',
            title: 'El campo no puede ir vacío',
            text: "Diligencie el campo identificacion"
        });
    } else if (age === "") {
        Swal.fire({
            icon: 'error',
            title: 'El campo no puede ir vacío',
            text: "Diligencie el campo Edad"
        });
    } else if (weight === "") {
        Swal.fire({
            icon: 'error',
            title: 'El campo no puede ir vacío',
            text: "Diligencie el campo Edad"
        });

    }else if (email === "") {
        Swal.fire({
            icon: 'error',
            title: 'El campo no puede ir vacío',
            text: "Diligencie el campo Correo"
        });

    }else if (cellphone === "") {
        Swal.fire({
            icon: 'error',
            title: 'El campo no puede ir vacío',
            text: "Diligencie el campo Celular"
        });

    }else if (wounds === "") {
        Swal.fire({
            icon: 'error',
            title: 'El campo no puede ir vacío',
            text: "Diligencie el campo Lesiones"
        });

    }else{
        let userToUpdate = {
            identification,
            name,
            age,
            weight,
            email,
            cellphone,
            wounds
        }
    
        if (password !== "") {
            userToUpdate.password = password;
        }
    
        const userEditted = await updateUser(userToUpdate);
    
        user = userEditted;
        localStorage.setItem("user", JSON.stringify(user));
    
        Swal.fire({
            icon: 'success',
            title: 'Datos actualizados correctamente',
            text: "Tu información ha sido actualizada de forma satisfactoria."
        });
        
        $('#password').val("");
    }

    
});