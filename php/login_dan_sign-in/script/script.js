document.querySelector('.username-form').addEventListener('input', function () {
    const placeholderUsername = document.querySelector('.username-placeholder');
    
    if (this.value === '') {
      placeholderUsername.classList.remove('active-username');
    } else {
      placeholderUsername.classList.add('active-username');
    }
});

document.querySelector('.pw-form').addEventListener('input', function () {
    const placeholderPassword = document.querySelector('.pw-placeholder');
    
    if (this.value === '') {
      placeholderPassword.classList.remove('active-pw');
    } else {
      placeholderPassword.classList.add('active-pw');
    }
});

document.querySelector('.email-form').addEventListener('input', function () {
    const placeholderEmail = document.querySelector('.email-placeholder');
    
    if (this.value === '') {
      placeholderEmail.classList.remove('active-email');
    } else {
      placeholderEmail.classList.add('active-email');
    }
});