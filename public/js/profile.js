$(document).ready(function () {
    let firstNameInput = $('#first_name')
    let lastNameInput = $('#last_name')
    let changeButton = $('.change-profile-data-button')
    let saveChangedButton = $('.save-change-profile-data-button')


    changeButton.on('click', function () {
        firstNameInput.removeAttr('readonly')
        lastNameInput.removeAttr('readonly')
        changeButton.css('display', 'none')
        saveChangedButton.css('display', 'block')
    })


    saveChangedButton.on('click', function () {
        firstNameInput.attr('readonly', 'readonly')
        lastNameInput.attr('readonly', 'readonly')
        if (firstNameInput.val().length > 2 && lastNameInput.val().length > 2) {
            let formData = new FormData()
            formData.append('first_name', firstNameInput.val())
            formData.append('last_name', lastNameInput.val())

            $.ajax({
                type: 'POST',
                url: 'profile/update',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    console.log(res)
                }
            })
        }
    })


    let deleteProfileButton = $(".delete-profile")
    deleteProfileButton.on('click', function (e) {
        e.preventDefault()
        let result = confirm("Вы уверены?")
        let formData = new FormData()
        formData.append(null, null)
        if (result) {
            $.ajax({
                type: 'POST',
                url: 'profile/delete',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    console.log(res)
                }
            })
        }
    })
})