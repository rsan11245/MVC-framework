$(document).ready(function() {
    $('.form-register').submit(function (e){
        e.preventDefault()
        let name = $('#name')
        let email = $('#email')
        let password = $('#password')
        let passwordConfirm = $('#passwordConfirm')

        if (password.val().length < 4) {
            changeLabel(password, 'Пароль слишком короткий' , {"color": 'red'})
        }
        else if (password.val() !== passwordConfirm.val()) {
            changeLabel(passwordConfirm, 'Пароли должны совпадать' , {"color": 'red'})
        } else {
            let formData = new FormData()
            formData.append('name', name.val())
            formData.append('email', email.val())
            formData.append('password', password.val())
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (result) {
                    console.log(result)
                }
            })
        }
    })

    $('#logout').click(function (e) {
        let formData = new FormData()
        formData.append('logout', 'logout')
        $.ajax({
            type: 'post',
            url: '/logout',
            contentType: false,
            cache: false,
            processData: false,
            data: formData,
            success: function (result) {
                window.location.href = '/login';
            }
        })
    })
})

function changeLabel(elem, text, style = {}) {
    let label = elem.next('label')
    label.text(text)
    for (let key in style) {
        label.css(key, style[key])
        console.log(style[key])
    }
}