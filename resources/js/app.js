import './bootstrap';

window.deleteModel = async function (path, reload = true) {
    if (confirm("Are you sure?")) {
        try {
            const response = await axios.delete(path);
            console.log(response);
            return response;
        } finally {
            if (reload) {
                location.reload();
            }
        }
    }
}