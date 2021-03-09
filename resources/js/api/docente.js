import axios from 'axios';

const listado_docente_URL = 'ajax/docentes';

function getDocentes() {
    return axios.get(listado_docente_URL);

}
function retrievePOSTdocentes() {
    return axios.post(listado_docente_URL,{
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
        }
    });
}

function destroyDELETEdocente(id) {
    return axios.delete('docentes/' + id, {

        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
        }
    });
}

function updateDocente(docente) {
    return axios.patch('docentes/' , docente, {
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
        }
    });
}

export { getDocentes, retrievePOSTdocentes, destroyDELETEdocente, updateDocente };
