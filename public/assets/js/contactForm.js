export async function handleSubmit(event) {
    event.preventDefault();

    const formData = new FormData(event.target);
    const formErrors = document.getElementById('formErrors');
    const formSuccess = document.getElementById('formSuccess');
    formErrors.innerHTML = '';
    formSuccess.innerHTML = '';

    try {
        const response = await fetch('/send', {
            method: 'POST',
            body: formData
        });
        const result = await response.json();

        if (result.errors) {
            for (let field in result.errors) {
                formErrors.innerHTML += `<p>${result.errors[field]}</p>`;
            }
        } else if (result.success) {
            formSuccess.innerHTML = `<p>${result.success}</p>`;
        }
    } catch (error) {
        formErrors.innerHTML = `<p>Erro ao enviar o formulário</p>`;
    }
}
