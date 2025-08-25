import './bootstrap';

document.addEventListener("DOMContentLoaded", () => {
    const maskFunctions = {
        cpf: value => value.replace(/\D/g, '').slice(0,11)
            .replace(/(\d{3})(\d)/,'$1.$2')
            .replace(/(\d{3})(\d)/,'$1.$2')
            .replace(/(\d{3})(\d{1,2})$/,'$1-$2'),
        date: value => value.replace(/\D/g, '').slice(0,8)
            .replace(/(\d{2})(\d)/,'$1/$2')
            .replace(/(\d{2})(\d)/,'$1/$2'),
        cep:  value => value.replace(/\D/g, '').slice(0,8)
            .replace(/(\d{5})(\d)/,'$1-$2')
    };

    document.querySelectorAll('[data-mask]').forEach(input => {
        const type = input.dataset.mask;

        const applyMask = () => {
            input.value = maskFunctions[type](input.value);
        };

        input.addEventListener('input', applyMask);
        input.addEventListener('paste', e => {
            e.preventDefault();
            const paste = (e.clipboardData || window.clipboardData).getData('text');
            input.value = maskFunctions[type](paste);
        });
    });
});
