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

    document.querySelector('[data-mask="cep"]').addEventListener('blur', function () {
        const cep = this.value.replace(/\D/g,'');
        if (cep.length !== 8) {
            return;
        }
        fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then(res => res.json())
            .then(data => {
                if (!data.erro) {
                    document.getElementById('street').value = data.logradouro || '';
                    document.getElementById('neighborhood').value = data.bairro || '';
                    document.getElementById('city').value = data.localidade || '';
                    document.getElementById('state').value = data.uf || '';

                    document.getElementById('number').focus();
                } else {
                    alert('CEP não encontrado.');
                }
            })
            .catch(() => alert('Falha ao consultar CEP'))
    });
});

