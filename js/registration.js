const container = document.querySelector('.container')

function validation_email(email) {
    const regexp = "^[_A-Za-z0-9-+]+(\\.[_A-Za-z0-9-]+)*@" +
        "[A-Za-z0-9-]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$"
    const arr = Array.from(email.matchAll(regexp))
    return arr.length !== 0
}

function validation_password(password) {
    const regexp = "(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{6,}"
    const arr = Array.from(password.matchAll(regexp))
    return arr.length !== 0
}

function validation_passwords(password_one, password_two) {
    return password_one === password_two
}

container.addEventListener('click', (event) => {
    let target = event.target
    const email = document.querySelector('.registration__form_input-value-email')
    const password_one = document.querySelector('.registration__form_input-value-password-one')
    const password_two = document.querySelector('.registration__form_input-value-password-two')
    const message = document.querySelector('.message')
    const row_menu = document.querySelector('.row_menu')

    if (target.classList.contains('registration__form_button-link')) {
        const message__text = document.querySelector('.message__text')
        if (validation_email(email.value) &&
            validation_password(password_one.value) &&
            validation_passwords(password_one.value, password_two.value)) {
            let pass_array
            const promise = new Promise((resolve) => {
                fetch('passwords.json').then(response => {
                    return response.json()
                }).then(data => {
                    pass_array = data.wrong_passwords
                    resolve()
                })
            })
            promise.then(() => {
                let password_valid = true
                for (const p of pass_array) {
                    if (password_one.value === p) password_valid = false
                }
                if (password_valid) {
                    message__text.innerText = 'ПОЗДРАВЛЯЕМ!\r\n\r\n Вы успешно зарегистрировались в системе!\r\n Ваш логин: ' +
                        email.value;
                    message.classList.add('visible');
                    message__text.classList.add('finished');
                } else {
                    password_one.classList.add('border_red')
                    password_two.classList.add('border_red')
                    if (message__text.innerText === '') {
                        message__text.innerText = 'Введённый пароль входит в перечень запрещённых паролей,' +
                            ' пожалуйста придумайте другой пароль.';
                    }
                    message.classList.add('visible')
                    message.classList.add('error')
                }
            })
        } else {
            row_menu.classList.add('row_menu-opacity')
            if (!validation_email(email.value)) {
                email.classList.add('border_red')
                if (message__text.innerText === '') {
                    message__text.innerText = 'Неправильно написана электронная почта.\r\n'
                }
                message.classList.add('visible')
                message.classList.add('error')
            }
            if (!validation_password(password_one.value)) {
                password_one.classList.add('border_red')
                password_two.classList.add('border_red')
                if (message__text.innerText === '') {
                    message__text.innerText = '\r\n' + 'Пароль должен состоять из латинских прописных' +
                        ' и строчных букв и цифр длиной не менее 6 символов.\r\n'
                }
                message.classList.add('visible')
                message.classList.add('error')
            }
            if (!validation_passwords(password_one.value, password_two.value)) {
                password_one.classList.add('border_red')
                password_two.classList.add('border_red')
                if (message__text.innerText === '') {
                    message__text.innerText = '\r\n' + 'Неверно подтверждён введённый пароль.'
                }
                message.classList.add('visible')
                message.classList.add('error')
            }
        }
    } else {
        document.querySelector('.message__text').innerText = ''
        message.classList.remove('visible')
        message.classList.remove('error')
        row_menu.classList.remove('row_menu-opacity')
    }
})