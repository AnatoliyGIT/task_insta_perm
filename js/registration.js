const container = document.querySelector('.container')

function add_prompt(className, element) {
    const div = document.createElement('div')
    div.className = className
    element.insertAdjacentElement('afterbegin', div)
    const text = document.createElement('p')
    text.className = 'registration__form_input-label_prompt-text'
    div.appendChild(text)
    return text
}

function remove_all_elements(elements) {
    if (elements) {
        for (const element of elements) {
            element.parentNode.removeChild(element)
        }
    }
}

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
    const icons = document.querySelectorAll('i')
    let target = event.target
    const prompts = document.querySelectorAll('.registration__form_input-label_prompt')
    remove_all_elements(prompts)
    const email = document.querySelector('.registration__form_input-value-email')
    const password_one = document.querySelector('.registration__form_input-value-password-one')
    const password_two = document.querySelector('.registration__form_input-value-password-two')
    const message = document.querySelector('.message')

    for (const icon of icons) {
        if (target.parentNode === icon.parentNode) {
            icon.classList.remove('far')
            icon.classList.add('fas');
            const text_prompt = add_prompt('registration__form_input-label_prompt', target)
            if (icon.classList.contains('registration__form_input-prompt-icon_email')) {
                text_prompt.innerHTML = 'Введите эл. почту, пример: adress@yandex.ru'
            }
            if (icon.classList.contains('registration__form_input-prompt-icon_password-one')) {
                text_prompt.innerHTML = 'Введите пароль. Он должен содержать: Буквы латинского алфавита и цифры.' +
                    ' Иметь хотябы одну строчную букву, одну заглавную букву, одну цифру.' +
                    ' А также состоять не менее чем из 6 символов'
            }
            if (icon.classList.contains('registration__form_input-prompt-icon_password-two')) {
                text_prompt.innerHTML = 'Повторите пароль'
            }
        } else {
            icon.classList.remove('fas')
            icon.classList.add('far')
            email.classList.remove('border_red')
            password_one.classList.remove('border_red')
            password_two.classList.remove('border_red')
        }
    }
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
                    message__text.innerText = 'Введённый пароль входит в перечень запрещённых паролей,' +
                        ' пожалуйста придумайте другой пароль.'
                    message.classList.add('visible')
                    message.classList.add('error')
                }
            })
        } else {
            if (!validation_email(email.value)) {
                email.classList.add('border_red')
                message__text.innerText = message__text.innerText + 'Неправильно написана электронная почта.\r\n'
                message.classList.add('visible')
                message.classList.add('error')
            }
            if (!validation_password(password_one.value)) {
                password_one.classList.add('border_red')
                password_two.classList.add('border_red')
                if (message__text.innerText) message__text.innerText = message__text.innerText + '\r\n'
                message__text.innerText = message__text.innerText + 'Пароль должен состоять из латинских прописных' +
                    ' и строчных букв и цифр длиной не менее 6 символов.\r\n'
                message.classList.add('visible')
                message.classList.add('error')
            }
            if (!validation_passwords(password_one.value, password_two.value)) {
                password_one.classList.add('border_red')
                password_two.classList.add('border_red')
                if (message__text.innerText) message__text.innerText = message__text.innerText + '\r\n'
                message__text.innerText = message__text.innerText + 'Неверно подтверждён введённый пароль.'
                message.classList.add('visible')
                message.classList.add('error')
            }
        }
    } else {
        document.querySelector('.message__text').innerText = ''
        message.classList.remove('visible')
        message.classList.remove('error')
    }
})