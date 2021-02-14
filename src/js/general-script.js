function Api(httpMethod, endpointUrl, dataToSend = [], authorization = true) {
	const API_URL = 'http://localhost:8000/api';
	// const API_URL = 'https://api.funtraining.net/api';

	// let token = getTokenFromCookie();
	let token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTYxMzA2MTk5OSwiZXhwIjoxNjEzMDY1NTk5LCJuYmYiOjE2MTMwNjE5OTksImp0aSI6Ino1TXY5aG82aU5BN0l0S2UiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.jrF5kqF_5jR2DNgFfNGbp2JpDA-MC0bt6qAHxDsOV6Q';
	let headersConfig = {
		'Content-Type': 'application/json',
		'Authorization': 'Bearer ' . token,
	};
	let fetchBody = [];

	if (!authorization) {
		headersConfig = {
			'Content-Type': 'application/json',
		}
	};

	if (dataToSend !== []) {
		fetchBody = JSON.stringify(dataToSend);
	}

	let config = {
		headers: headersConfig,
		method: httpMethod,
		body: fetchBody,
	};

	return fetch(`${API_URL}${endpointUrl}`, config)
	.then((response) => response.json())
	.then((data) => {
		if (data.error) {
			throw error;
		}
		return data;
	})
	.catch(error => {
		return error;
	});
}

$('#btnEnviar').click(async function (e) {
	let titulo = $('#title').val();
	let color = $('#color').val();
	let inicio = $('#start').val();
	let fin = $('#end').val();
	const correo = $('#correo').val();

	try {
		// const { name, email, created_at } = await ApiCall(
		const newEvent = await ApiCall(
			'/events',
			'POST',
			{
				title: titulo,
				color: color,
				start: inicio,
				end: fin
			}
			
			);
			// alert(`Hola ${name}, gracias por suscribirte.`);
			swal("Datos registrados", `Hola ${newEvent.name}, gracias por suscribirte a nuestro newsletter`, "success");
	
			console.log("NEWSLETTER: ", newEvent);
		

	} catch (error) {
		swal("Error", `${newEvent.name}, el registro ya existe `, "error");
		console.warn(error);
	}
});