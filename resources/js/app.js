import './bootstrap';

const formatDocument = value => {
    value = value.replace(/\D/g, '').slice(0, 11);
    value = value.replace(/(\d{3})(\d)/, '$1.$2');
    value = value.replace(/(\d{3})(\d)/, '$1.$2');
    value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
    return value;
};

const formatDate = value => {
    value = value.replace(/\D/g, '').slice(0, 8);
    value = value.replace(/(\d{2})(\d)/, '$1/$2');
    value = value.replace(/(\d{2})(\d)/, '$1/$2');
    return value;
};

const formatCep = value => {
    value = value.replace(/\D/g, '').slice(0, 8);
    value = value.replace(/(\d{5})(\d)/, '$1-$2');
    return value;
};

document.addEventListener('input', e => {
    let classList = e.target.classList
    if (classList.contains('cpf-mask')) {
        e.target.value = formatDocument(e.target.value);
    } else if (classList.contains('date-mask')) {
        e.target.value = formatDate(e.target.value);
    } else if (classList.contains('cep-mask')) {
        e.target.value = formatCep(e.target.value);
    }
});

document.addEventListener('paste', e => {
    let classList = e.target.classList
    if (classList.contains('cpf-mask')) {
        e.preventDefault();
        const paste = (e.clipboardData || window.clipboardData).getData('text');
        e.target.value = formatDocument(paste);
    } else if (classList.contains('date-mask')) {
        e.preventDefault();
        const paste = (e.clipboardData || window.clipboardData).getData('text');
        e.target.value = formatDate(paste);
    } else if (classList.contains('cep-mask')) {
        e.target.value = formatCep(e.target.value);
    }
});
